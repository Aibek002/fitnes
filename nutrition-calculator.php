<? include './app/controllers/user.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/nutrition-calculator.css" rel="stylesheet">
    <link href="assets/js/nutrition-calculator.js" rel="stylesheet">
    <title>Nutrition Calculator</title>
    <style>

    </style>
</head>

<body>
    <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>
    <div class="calculator">
    <?
     $gender = $_POST["gender-options"];
     $height = $_POST["height"];
     $weight = $_POST["weight"];
     $age = $_POST["age"];
     $activityLevel = $_POST["activateLevel"];
 
     // Рассчитываем базовый метаболизм (BMR) в зависимости от пола
     if ($gender == "Male") {
         $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
     } elseif ($gender == "Female") {
         $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
     }
 
     // Учитываем уровень физической активности
     switch ($activityLevel) {
         case "Sedentary":
             $bmr *= 1.2;
             break;
         case "Lightly Active":
             $bmr *= 1.375;
             break;
         case "Moderately Active":
             $bmr *= 1.55;
             break;
         case "Very Active":
             $bmr *= 1.725;
             break;
         case "Extremely Active":
             $bmr *= 1.9;
             break;
     }
 
     // Выводим результат
      echo '<div class="result">';
      echo 'Your Basal Metabolic Rate (BMR) is: <br><strong>' . round($bmr, 2) . ' kcal/day</strong>';
      echo '</div>';

      // Рассчитываем количество калорий от каждого макронутриента
    $carbsCalories = $bmr * 0.45; // 45% калорий от углеводов
    $proteinCalories = $bmr * 0.3; // 30% калорий от белков
    $fatCalories = $bmr * 0.25; // 25% калорий от жиров

    // Преобразуем калории в граммы (1 г белка и углеводов = 4 калории, 1 г жира = 9 калорий)
    $carbsGrams = $carbsCalories / 4;
    $proteinGrams = $proteinCalories / 4;
    $fatGrams = $fatCalories / 9;

    // Выводим результат
    echo '<div class="result">';
    echo '<h2>Recommended Macronutrient Balance</h2>';
    echo '<p>Carbohydrates: <strong> ' . round($carbsGrams, 2) . ' grams</strong></p>';
    echo '<p>Protein: <strong>' . round($proteinGrams, 2) . ' grams </strong></p>';
    echo '<p>Fat: <strong> ' . round($fatGrams, 2) . ' grams</strong> </p>';
    echo '</div>';
    $totalCaloriesPerDay = $bmr;
    $totalCaloriesPerWeek = $totalCaloriesPerDay * 7;

    // Выводим результат общего количества калорий на неделю
    echo '<div class="result">';
    echo '<p>Total Calories per Week : ';
    echo '<strong>' . round($totalCaloriesPerWeek, 2) . ' kcal/week </strong></p>';
    echo '</div>';
 ?>
        <div class="text">

            <h1 class="register-logo">
                <span style="display: inline-block; vertical-align: middle; font-size: 23px; font-weight: bold;">Nutrition Calculator</span>
            </h1>
        </div>
        <form action="nutrition-calculator.php" method="post">
            <div class="info">
                <p id="diet-plan"> Current diet type: mediterranean</p>
            </div>
            <div class="info">
                <label for="goal">I want to</label>
                <div class="goal-selector">
                    <input type="radio" class="btn-check" name="goal-options" id="goal-option1" value="Lose Weight" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="goal-option1">Lose weight</label>

                    <input type="radio" class="btn-check" name="goal-options" id="goal-option2" value="Build Muscle" autocomplete="off">
                    <label class="btn btn-outline-primary" for="goal-option2">Build muscle</label>

                    <input type="radio" class="btn-check" name="goal-options" id="goal-option4" value="Maintain" autocomplete="off">
                    <label class="btn btn-outline-primary" for="goal-option4">Maintain</label>
                </div>
            </div>

            <div class="info">
                <label for="gender">I am</label>
                <div class="goal-selector-2">
                    <input type="radio" class="btn-check goal-option-2" name="gender-options" id="gender-option1" value="Male" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="gender-option1">Male</label>

                    <input type="radio" class="btn-check goal-option-2" name="gender-options" id="gender-option2" value="Female" autocomplete="off">
                    <label class="btn btn-outline-primary" for="gender-option2">Female</label>
                </div>
            </div>

            <div class="info">
                <label for="height">Height</label>
                <div class="input-with-suffix">
                    <input name='height' type="number" id="height" min="0" step="0.1">
                    <span>cm</span>
                </div>
            </div>

            <div class="info">
                <label for="weight">Weight</label>
                <div class="input-with-suffix">
                    <input name='weight' type="number" id="weight" min="0" step="0.1">
                    <span>kg</span>
                </div>
            </div>


            <div class="info">
                <label for="age">Age</label>
                <div class="input-with-suffix">
                    <input name='age' type="number" id="year" min="0" step="0.1">
                    <span>years</span>
                </div>
            </div>




            <div class="info">
                <label for="goal">Body fat</label>
                <div class="goal-selector">
                    <input type="radio" class="btn-check" name="bodyfat-options" id="bodyfat-options1" value="Low" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="bodyfat-options1">Low</label>

                    <input type="radio" class="btn-check" name="bodyfat-options" id="bodyfat-options2" value="Medium" autocomplete="off">
                    <label class="btn btn-outline-primary" for="bodyfat-options2">Medium</label>

                    <input type="radio" class="btn-check" name="bodyfat-options" id="bodyfat-options3" value="High" autocomplete="off">
                    <label class="btn btn-outline-primary" for="bodyfat-options3">High</label>
                </div>
            </div>

            <div class="info">
                <label for="goal">Activity level</label>
                <div class="goal-selector">
                    <select name='activateLevel' id="goal">
                        <option value="Sedentary">Sedentary</option>
                        <option value="Lightly Active">Lightly Active</option>
                        <option value="Moderately Active">Moderately Active</option>
                        <option value="Very Active">Very Active</option>
                        <option value="Extremely Active">Extremely Active</option>
                    </select>
                </div>
            </div>

            <div class="info">
                <label for="goal">Set a weight goal?</label>
                <div class="goal-selector-2">
                    <input type="radio" class="btn-check" name="set-goal-options" id="set-goal-options1" value="No" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="set-goal-options1"> No thanks </label>
                    <input type="radio" class="btn-check" name="set-goal-options" id="set-goal-options2" value="Yes" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="set-goal-options2">Yeah let’s do it!</label>

                </div>
            </div>

            <!-- <div class="info">
                    <div id="goal-selected">
                        <label for="goalWeight">Enter your goal weight</label>
                        <div class="input-with-suffix">
                            <input type="number" id="goalWeight" min="0" step="0.1">
                            <span>kg</span>
                        </div>
                    </div>
                    <div id="lose">
                        <label for="rate">Weight change rate</label>
                        <p>Lose <input type="number" id="age" min="0" step="1"> kgs per week</p>
                        <p style="font-size:13px; font-weight: light;"> You will reach your goal in <span id="date"></P>
                    </div>
                    <div id="gain">
                        <label for="rate">Weight change rate</label>
                        <p>Gain <input type="number" id="age" min="0" step="1"> kgs per week</p>
                        <p style="font-size:13px; font-weight: light;"> You will reach your goal in <span id="date"></P>
                    </div> -->

    


    <button name="nutrition" type="submit" class="continue-btn"><img src="assets\images\calculate.png">Calculate</button>
    </form>
  
    </div>
    <script src="assets/js/nutrition-calculator.js"></script>
    <script src="./assets/js/goBack.js"></script>
 
    <?
    include './app/include/footer.php'
    ?>
</body>

</html>