import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.neighbors import NearestNeighbors
import json
import re
from sklearn.pipeline import Pipeline
from sklearn.preprocessing import FunctionTransformer
import sys
sys.stdout.reconfigure(encoding = 'utf-8')

'''!!! ВЫЧИСЛЯЕМ НОРМЫ КБЖУ !!!'''


def calculate_protein_calories(calorie_goal):
    return calorie_goal * 0.2  # 20% калорий от белков


def calculate_fat_calories(calorie_goal):
    return calorie_goal * 0.3  # 30% калорий от жиров


def calculate_carb_calories(calorie_goal):
    return calorie_goal * 0.5  # 50% калорий от углеводов


def calculate_bmr(weight, height, age, gender):
    gender_lower = gender.lower()  # Convert to lowercase
    if gender_lower == 'male':
        bmr = 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age)
    elif gender_lower == 'female':
        bmr = 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age)
    else:
        raise ValueError("Invalid gender provided. Please enter 'Male' for male or 'Female' for female.")
    return json.dumps(bmr)



def calculate_tdee(bmr,
                   activity_level):  # Это общее количество калорий, которое  организм сжигает в день, учитывая не только БМС, но и уровень физической активности
    activity_multipliers = {
        'sedentary': 1.2,
        'lightly active': 1.375,
        'moderately active': 1.55,
        'very active': 1.725,
        'super active': 1.9
    }
    return bmr * activity_multipliers[activity_level.lower()]


def calculate_calorie_goal(tdee, goal):
    if goal.lower() == 'lose weight':
        calorie_goal = tdee - 500  # Рекомендуется дефицит 500 калорий в день для похудения
    elif goal.lower() == ' maintain':
        calorie_goal = tdee + 500  # Рекомендуется избыток 500 калорий в день для набора веса
    else:
        return None
    return calorie_goal


def exclude_food():
    print(
        "Введите продукты или категории продуктов, которые вы не хотите видеть в своем рационе (введите через запятую):")
    excluded_food = input().strip().lower().split(',')
    excluded_food = [food.strip() for food in excluded_food]
    return excluded_food


''' МЛ МОДЕЛЬ '''


def scaling(dataframe):
    scaler = StandardScaler()
    prep_data = scaler.fit_transform(dataframe.iloc[:, 6:10].to_numpy())
    return prep_data, scaler


def nn_predictor(prep_data):
    neigh = NearestNeighbors(algorithm = 'brute', metric = 'cosine')
    neigh.fit(prep_data)
    return neigh


def build_pipeline(neigh, scaler, params):
    transformer = FunctionTransformer(neigh.kneighbors, kw_args = params)
    pipeline = Pipeline([('std_scaler', scaler), ('NN', transformer)])
    return pipeline


def extract_data(dataframe, ingredient_filter, max_nutritional_values):
    extracted_data = dataframe.copy()
    for column, maximum in zip(extracted_data.columns[6:10], max_nutritional_values):
        extracted_data = extracted_data[extracted_data[column] < maximum]
    if ingredient_filter != None:
        for ingredient in ingredient_filter:
            extracted_data = extracted_data[
                extracted_data['RecipeIngredientParts'].str.contains(ingredient, regex = False)]
    return extracted_data


def apply_pipeline(pipeline, _input, extracted_data):
    return extracted_data.iloc[pipeline.transform(_input)[0]]


''' ВЫЗОВ МЛ ФУНКЦИЙ  '''


def recommend(dataframe, _input, max_nutritional_values, selected_recipes = None,
              ingredient_filter = None, params = {'return_distance': False}, num_recommendations = 3):
    extracted_data = extract_data(dataframe, ingredient_filter, max_nutritional_values)
    prep_data, scaler = scaling(extracted_data)
    neigh = nn_predictor(prep_data)

    # Получаем индексы ближайших соседей
    distances, nearest_indices = neigh.kneighbors(_input, n_neighbors = len(extracted_data))

    # Отбираем только те рецепты, которые соответствуют критериям и отсортированы по близости
    recommended_recipes = extracted_data.iloc[nearest_indices[0]]

    # Инициализируем пустой список для рекомендаций
    recommendations = []

    # Суммируем показатели питательной ценности
    total_values = {'Calories': 0, 'FatContent': 0, 'CarbohydrateContent': 0, 'ProteinContent': 0}

    # Итерируемся по рецептам
    for i in range(len(recommended_recipes)):
        recipe = recommended_recipes.iloc[i]

        # Проверяем, не превышают ли показатели нового рецепта лимиты
        if (total_values['Calories'] + recipe['Calories'] <= max_nutritional_values[0] + 150 and
                total_values['Calories'] + recipe['Calories'] >= max_nutritional_values[0] - 100 and
                total_values['FatContent'] + recipe['FatContent'] <= max_nutritional_values[1] + 5 and
                total_values['FatContent'] + recipe['FatContent'] >= max_nutritional_values[1] - 5 and
                total_values['CarbohydrateContent'] + recipe['CarbohydrateContent'] <= max_nutritional_values[
                    2] + 5 and
                total_values['CarbohydrateContent'] + recipe['CarbohydrateContent'] >= max_nutritional_values[
                    2] - 5 and
                total_values['ProteinContent'] + recipe['ProteinContent'] <= max_nutritional_values[3] + 5 and
                total_values['ProteinContent'] + recipe['ProteinContent'] >= max_nutritional_values[3] - 5):

            # Проверяем, не является ли рецепт повторяющимся
            if selected_recipes is None or recipe['RecipeId'] not in selected_recipes['RecipeId'].values:
                # Добавляем рецепт в список рекомендаций и обновляем суммарные значения
                recommendations.append(recipe)
                total_values['Calories'] += recipe['Calories']
                total_values['FatContent'] += recipe['FatContent']
                total_values['CarbohydrateContent'] += recipe['CarbohydrateContent']
                total_values['ProteinContent'] += recipe['ProteinContent']

                # Если достигнуто необходимое количество рекомендаций, выходим из цикла
                if len(recommendations) == num_recommendations:
                    break

    return pd.DataFrame(recommendations)


def clean_text(text):
    # Убираем скобки и кавычки
    text = re.sub(r'c\(|\)', '', text)
    text = text.replace('"', '').replace("'", '')
    # Разделяем на строки по точкам
    lines = re.split(r'(?<=\.) ', text)
    # Убираем лишние пробелы и переносы строки
    lines = [line.strip() for line in lines]
    # Соединяем обратно в одну строку с новыми абзацами
    cleaned_text = '\n'.join(lines)
    # Убираем запятые после точек
    cleaned_text = re.sub(r'\.\s*,', '.', cleaned_text)
    return cleaned_text

    '''!!! MAIN !!!'''
    # получение переменных
    
weight = float(sys.argv[1])
height = float(sys.argv[2])
age = int(sys.argv[3])
gender = sys.argv[4] # Strip leading/trailing whitespace and capitalize the first letter

activity_level = sys.argv[5]
goal = sys.argv[6]

bmr_json = calculate_bmr(weight, height, age, gender)
bmr = round(float(json.loads(bmr_json)), 2)
if goal.lower() not in ['lose weight', 'maintain']:
    print(goal.lower())
    raise ValueError("Invalid goal provided. Please enter 'Weight Loss' or 'Weight Gain'.")

if bmr is None:
    print("Error: incorrect gender")

tdee = round(calculate_tdee(bmr, activity_level), 2)
calorie_goal = round(calculate_calorie_goal(tdee, goal), 2)
protein_calories = round(calculate_protein_calories(calorie_goal), 2)
fat_calories = round(calculate_fat_calories(calorie_goal), 2)
carb_calories = round(calculate_carb_calories(calorie_goal), 2)
protein_grams = round(protein_calories / 4)
fat_grams = round(fat_calories / 9)
carb_grams = round(carb_calories / 4)
if calorie_goal is None:
    print("Error: incorrect  goal")
    # На будущее
    # excluded = exclude_food()
    # print("Вы решили исключить следующие продукты из своего рациона:", excluded)

data = pd.read_csv('/var/www/fitnesapp/datasets/11.csv')
    # data = pd.read_csv('C:\\Users\\gomon\\PycharmProjects\\FitMe\\datasets\\11.csv')
columns = ['RecipeId', 'Name', 'CookTime', 'PrepTime',
               'TotalTime', 'RecipeIngredientParts', 'Calories',
               'FatContent', 'CarbohydrateContent', 'ProteinContent', 'RecipeInstructions', ]
dataset = data[columns]
    # print('Подбираем рецепты...')
    # !!! надо будет подумать о бд
max_Calories = calorie_goal
max_daily_fat = fat_grams
max_daily_Carbohydrate = carb_grams
max_daily_Protein = protein_grams
max_list = [max_Calories,
                max_daily_fat,
                max_daily_Carbohydrate,
                max_daily_Protein, ]

max_Calories_breakfast = max_Calories / 3
max_Calories_lunch = max_Calories / 3
max_Calories_dinner = max_Calories / 3

max_list_breakfast = [max_Calories_breakfast,
                          max_daily_fat / 3,
                          max_daily_Carbohydrate / 3,
                          max_daily_Protein / 3]

max_list_lunch = [max_Calories_lunch,
                      max_daily_fat / 3,
                      max_daily_Carbohydrate / 3,
                      max_daily_Protein / 3]

max_list_dinner = [max_Calories_dinner,
                       max_daily_fat / 3,
                       max_daily_Carbohydrate / 3,
                       max_daily_Protein / 3]

    # Генерация меню по приёму пищи
    # print("Подбираю завтрак")
extracted_data_breakfast = dataset.copy()
test_input_breakfast = extracted_data_breakfast.iloc[0:1, 6:10].to_numpy()
df_breakfast = recommend(dataset, test_input_breakfast, max_list_breakfast, num_recommendations = 1)
df_breakfast['RecipeIngredientParts'] = df_breakfast['RecipeIngredientParts'].apply(clean_text)
df_breakfast['RecipeInstructions'] = df_breakfast['RecipeInstructions'].apply(clean_text)

    # print("Подбираю обед")
extracted_data_lunch = dataset.copy()
test_input_lunch = extracted_data_lunch.iloc[0:1, 6:10].to_numpy()
df_lunch = recommend(dataset, test_input_lunch, max_list_lunch, selected_recipes = df_breakfast,
                         num_recommendations = 1)
df_lunch['RecipeIngredientParts'] = df_lunch['RecipeIngredientParts'].apply(clean_text)
df_lunch['RecipeInstructions'] = df_lunch['RecipeInstructions'].apply(clean_text)

    # print("Подбираю ужин")
extracted_data_dinner = dataset.copy()
test_input_dinner = extracted_data_dinner.iloc[0:1, 6:10].to_numpy()
df_dinner = recommend(dataset, test_input_dinner, max_list_dinner,
                          selected_recipes = pd.concat([df_breakfast, df_lunch]), num_recommendations = 1)
df_dinner['RecipeIngredientParts'] = df_dinner['RecipeIngredientParts'].apply(clean_text)
df_dinner['RecipeInstructions'] = df_dinner['RecipeInstructions'].apply(clean_text)

    # Объединение всех приёмов в один файл
df_combined = pd.concat([df_breakfast, df_lunch, df_dinner], keys = ['Breakfast', 'Lunch', 'Dinner'])
path = '/var/www/fitnesapp/ml/my_rec.csv'
    # path = 'C:\\Users\\gomon\\PycharmProjects\\FitMe\\datasets\\my_rec.csv'
df_combined.to_csv(path)
print('File combined_menu.csv is saved!')