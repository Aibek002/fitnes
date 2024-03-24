import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.neighbors import NearestNeighbors
from sklearn.pipeline import Pipeline
from sklearn.preprocessing import FunctionTransformer

'''!!! ВЫЧИСЛЯЕМ НОРМЫ КБЖУ !!!'''
def calculate_protein_calories(calorie_goal):
    return calorie_goal * 0.2  # 20% калорий от белков

def calculate_fat_calories(calorie_goal):
    return calorie_goal * 0.3  # 30% калорий от жиров

def calculate_carb_calories(calorie_goal):
    return calorie_goal * 0.5  # 50% калорий от углеводов

def calculate_bmr(weight, height, age, gender): #Базовая метаболическая скорость (БМС) — это количество калорий, которые организм сжигает в состоянии покоя.
    if gender.lower() == 'м':
        bmr = 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age)
    elif gender.lower() == 'ж':
        bmr = 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age)
    else:
        return None
    return bmr

def calculate_tdee(bmr, activity_level): #Это общее количество калорий, которое  организм сжигает в день, учитывая не только БМС, но и уровень физической активности
    activity_multipliers = {
        'сидячий': 1.2,
        'малоактивный': 1.375,
        'умеренно активный': 1.55,
        'очень активный': 1.725,
        'сверхактивный': 1.9
    }
    return bmr * activity_multipliers[activity_level.lower()]

def calculate_calorie_goal(tdee, goal):
    if goal.lower() == 'похудение':
        calorie_goal = tdee - 500  # Рекомендуется дефицит 500 калорий в день для похудения
    elif goal.lower() == 'набор веса':
        calorie_goal = tdee + 500  # Рекомендуется избыток 500 калорий в день для набора веса
    else:
        return None
    return calorie_goal

def exclude_food():
    print("Введите продукты или категории продуктов, которые вы не хотите видеть в своем рационе (введите через запятую):")
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


def recommend(dataframe, _input, max_nutritional_values, ingredient_filter = None,
              params = {'return_distance': False}, num_recommendations = 3):
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
        if (total_values['Calories'] + recipe['Calories'] <= max_nutritional_values[0] and
                total_values['FatContent'] + recipe['FatContent'] <= max_nutritional_values[1] and
                total_values['CarbohydrateContent'] + recipe['CarbohydrateContent'] <= max_nutritional_values[2] and
                total_values['ProteinContent'] + recipe['ProteinContent'] <= max_nutritional_values[3]):

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


'''!!! MAIN !!!'''
'''weight = int(input("Введите ваш вес в килограммах: ").strip())
height = float(input("Введите ваш рост в сантиметрах: ").strip())
age = int(input("Введите ваш возраст в годах: ").strip())
gender = input("Введите ваш пол (м/ж): ").strip()
activity_level = input(
    "Введите ваш уровень активности (сидячий/малоактивный/умеренно активный/очень активный/сверхактивный): ").strip()
goal = input("Введите вашу цель (похудение/набор веса): ").strip()'''

#for test
weight = 75
height = 167
age = 32
gender = 'м'
activity_level = 'малоактивный'
goal = 'похудение'

bmr = round(calculate_bmr(weight, height, age, gender), 2)
if bmr is None:
    print("Ошибка: введен некорректный пол")

tdee = round(calculate_tdee(bmr, activity_level), 2)
calorie_goal = round(calculate_calorie_goal(tdee, goal), 2)
protein_calories = round(calculate_protein_calories(calorie_goal), 2)
fat_calories = round(calculate_fat_calories(calorie_goal), 2)
carb_calories = round(calculate_carb_calories(calorie_goal), 2)
protein_grams = round(protein_calories / 4)
fat_grams = round(fat_calories / 9)
carb_grams = round(carb_calories / 4)
if calorie_goal is None:
    print("Ошибка: введена некорректная цель")
print(f"Ваша базовая метаболическая скорость (BMR) составляет {bmr} калорий в день.")
print(f"Ваша общая энергия, затрачиваемая в течение дня (TDEE), составляет {tdee} калорий в день.")
print(f"Для вашей цели вам следует потреблять {calorie_goal} калорий в день.")
print(f"Белки: {protein_calories} калорий, ({protein_grams} гр.)")
print(f"Жиры: {fat_calories} калорий,({fat_grams} гр.)")
print(f"Углеводы: {carb_calories} калорий, ({carb_grams} гр.)")
print('Составляем ваше меню...')
# На будущее
#excluded = exclude_food()
#print("Вы решили исключить следующие продукты из своего рациона:", excluded)
data = pd.read_csv('C:\\Users\\gomon\\PycharmProjects\\FitMe\\datasets\\11.csv')
dataset = data.copy()
columns = ['RecipeId', 'Name', 'CookTime', 'PrepTime',
           'TotalTime', 'RecipeIngredientParts', 'Calories',
           'FatContent', 'CarbohydrateContent',  'ProteinContent', 'RecipeInstructions', ]
dataset = dataset[columns]
print('Подбираем рецепты...')
# !!! надо будет подумать о бд
max_Calories = calorie_goal
max_daily_fat = fat_grams
max_daily_Carbohydrate = carb_grams
max_daily_Protein = protein_grams
max_list = [max_Calories,
            max_daily_fat,
            max_daily_Carbohydrate,
            max_daily_Protein,]

extracted_data = dataset.copy()
test_input = extracted_data.iloc[0:1, 6:10].to_numpy()
path = 'C:\\Users\\gomon\\PycharmProjects\\FitMe\\datasets\\my_rec.csv'
print('Генерируем файл...')
recommend(dataset, test_input, max_list).to_csv(path, index=False)
print('Файл сохранён!')