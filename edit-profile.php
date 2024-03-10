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
    <title>Update informations</title>
    <style>

    </style>
</head>

<body>
<?
    include './app/include/header.php'
    ?>
    <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>
    <div class="calculator">

        <div class="text">

            <h1 class="register-logo">
                <span style="display: inline-block; vertical-align: middle; font-size: 23px; font-weight: bold;">Update informations</span>
            </h1>
        </div>
        <form action="edit-profile.php" method="post">
            <div class="info">
                <p id="diet-plan"> Current diet type:</p>
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
                    <input value="<? echo $_SESSION['height'] ?>" name='height' type="number" id="height" min="0" step="0.1">
                    <span>cm</span>
                </div>
            </div>

            <div class="info">
                <label for="weight">Weight</label>
                <div class="input-with-suffix">
                    <input value="<? echo $_SESSION['weight'] ?>" name='weight' type="number" id="weight" min="0" step="0.1">
                    <span>kg</span>
                </div>
            </div>


            <div class="info">
                <label for="age">Age</label>
                <div class="input-with-suffix">
                    <input value="<? echo $_SESSION['age'] ?>" name='age' type="number" id="year" min="0" step="0.1">
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
                        <option value="Sedentary" <?php echo ($_SESSION['acivityLevel'] == 'Sedentary') ? 'selected' : ''; ?>>Sedentary</option>
                        <option value="Lightly Active" <?php echo ($_SESSION['acivityLevel'] == 'Lightly Active') ? 'selected' : ''; ?>>Lightly Active</option>
                        <option value="Moderately Active" <?php echo ($_SESSION['acivityLevel'] == 'Moderately Active') ? 'selected' : ''; ?>>Moderately Active</option>
                        <option value="Very Active" <?php echo ($_SESSION['acivityLevel'] == 'Very Active') ? 'selected' : ''; ?>>Very Active</option>
                        <option value="Extremely Active" <?php echo ($_SESSION['acivityLevel'] == 'Extremely Active') ? 'selected' : ''; ?>>Extremely Active</option>
                    </select>

                </div>
            </div>







            <button name="update-informations" type="submit" class="continue-btn"><img src="assets\images\calculate.png">Calculate</button>
        </form>

    </div>
    <script src="assets/js/nutrition-calculator.js"></script>
    <script src="./assets/js/goBack.js"></script>

    <?
    include './app/include/footer.php'
    ?>
</body>

</html>