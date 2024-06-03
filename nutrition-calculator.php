<?php
require './app/controllers/source_user.php';
session_start();
if ($_SESSION['name'] == '') {
    header('location: login.php');
}
?>

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
    /* Медиазапрос для настольных устройств */
    @media (min-width: 768px) {
        .mobile-only {
            display: none;
        }

        .desktop-message {
            display: block;
        }


        main {
            display: none;
        }
        body{
            background: #fff;
        }
    }

    /* Медиазапрос для мобильных устройств */
    @media (max-width: 767px) {
        .mobile-only {
            display: block;
        }

        .desktop-message {
            display: none;
        }

        main {
            display: block;
        }
    
    }
</style>
</head>

<body class='body'>
<div class="desktop-message">
        <!-- Сообщение для настольных устройств -->
        <h1>Этот сайт доступен только на мобильных устройствах</h1>
    </div>
    <main>
    <button type="button" class="back-btn" onclick="goBack()"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0_1426_1706)">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.07306 0.355513C1.84404 0.134321 1.53731 0.0119277 1.21893 0.0146943C0.900547 0.017461 0.595989 0.145166 0.37085 0.370305C0.145712 0.595443 0.0180068 0.900001 0.0152402 1.21838C0.0124735 1.53676 0.134867 1.8435 0.356059 2.07251L6.78327 8.49973L0.356059 14.9269C0.240082 15.039 0.147575 15.1729 0.0839355 15.3211C0.020296 15.4692 -0.0132015 15.6286 -0.0146026 15.7898C-0.0160037 15.951 0.0147199 16.1109 0.0757752 16.2602C0.136831 16.4094 0.226995 16.545 0.341008 16.659C0.45502 16.773 0.590598 16.8632 0.739829 16.9242C0.88906 16.9853 1.04896 17.016 1.21019 17.0146C1.37142 17.0132 1.53076 16.9797 1.67891 16.9161C1.82705 16.8524 1.96104 16.7599 2.07306 16.6439L8.50027 10.2167L14.9275 16.6439C15.1565 16.8651 15.4632 16.9875 15.7816 16.9848C16.1 16.982 16.4046 16.8543 16.6297 16.6292C16.8548 16.404 16.9825 16.0995 16.9853 15.7811C16.9881 15.4627 16.8657 15.156 16.6445 14.9269L10.2173 8.49973L16.6445 2.07251C16.8657 1.8435 16.9881 1.53676 16.9853 1.21838C16.9825 0.900001 16.8548 0.595443 16.6297 0.370305C16.4046 0.145166 16.1 0.017461 15.7816 0.0146943C15.4632 0.0119277 15.1565 0.134321 14.9275 0.355513L8.50027 6.78273L2.07306 0.355513Z" fill="#161455" fill-opacity="0.8" />
  </g>
  <defs>
    <clipPath id="clip0_1426_1706">
      <rect width="17" height="17" fill="white" />
    </clipPath>
  </defs>
</svg></button>
    <script src="./assets/js/goBack.js"></script>

    <div class="calculator">

        <div class="text">

            <h1 class="register-logo">
                <span style="display: inline-block; vertical-align: middle; font-size: 23px; font-weight: bold;">Nutrition Calculator</span>
            </h1>
        </div>
        <form action="nutrition-calculator.php" method="post">
            <div class="info">
                <p id="diet-plan"> Current diet type: <?php if (empty($_SESSION['goaltext'])) {
                                                            echo 'Not selected';
                                                        } else {
                                                            $gaol =  $_SESSION['goaltext'];
                                                            echo $goal;
                                                        }
                                                        if ($_SESSION['errmsg'] == '') {
                                                        } else {
                                                            $alertMessage = $_SESSION['errmsg'];
                                                            $jsCode = "alert('$alertMessage');";

                                                            // Output the JavaScript code within a <script> tag
                                                            echo "<script>{$jsCode}</script>";
                                                        }
                                                        ?></p>


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
                    <input <?php echo ($_SESSION['gender'] === 'Male') ? 'selected' : ''; ?> type="radio" class="btn-check goal-option-2" name="gender-options" id="gender-option1" value="Male" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="gender-option1">Male</label>

                    <input <?php echo ($_SESSION['gender'] === 'Female') ? 'selected' : ''; ?> type="radio" class="btn-check goal-option-2" name="gender-options" id="gender-option2" value="Female" autocomplete="off">
                    <label class="btn btn-outline-primary" for="gender-option2">Female</label>
                </div>
            </div>

            <div class="info">
                <label for="height">Height</label>
                <div class="input-with-suffix">
                    <input name='height' type="number" id="height" min="0" value="<?php echo $_SESSION['height']; ?>" step="0.1" value="<? echo  $_SESSION['height']; ?>">
                    <span>cm</span>
                </div>
            </div>

            <div class="info">
                <label for="weight">Weight</label>
                <div class="input-with-suffix">
                    <input name='weight' type="number" id="weight" min="0" value="<?php echo $_SESSION['weight']; ?>" step="0.1" value="<? echo  $_SESSION['weight']; ?>">
                    <span>kg</span>
                </div>
            </div>


            <div class="info">
                <label for="age">Age</label>
                <div class="input-with-suffix">
                    <input name='age' type="number" id="year" min="0" step="0.1" value="<?php echo  $_SESSION['age']; ?>">
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





            <button name="nutrition" type="submit" class="continue-btn"><img src="assets\images\calculate.png">Calculate</button>
        </form>

    </div>
    <script src="assets/js/nutrition-calculator.js"></script>
    <script src="./assets/js/goBack.js"></script>

    </main>
</body>

</html>