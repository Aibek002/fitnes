<?php
session_start();
require 'app/database/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


$sql = "SELECT * FROM data_registration";
$stmt = $connection->query($sql);
$User = '';


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (trim($_SESSION['name']) === trim($row['name']))
        $User = $row['id_user'];
}
$user = selectOne('data_registration', ['id_user' => $User]);
$userInfo = selectOne('users_information_for_calculator', ['id_user' => $User]);


//calculator
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nutrition'])) {
    $sql = "SELECT * FROM users_information_for_calculator";
    $stmt = $connection->query($sql);
    $User = selectOne('users_information_for_calculator', ['id_user' => $_SESSION['id_user']]);

    echo "/" . $_SESSION['id_user'] . '/' . $User['id_user'] .  "/";

    if (trim($_SESSION['id_user']) == trim($User['id_user'])) {
        echo $_SESSION['id_user '] . '/' . $User;

        $params = [
            'goal'          => $_POST['goal-options'],
            'gender'        => $_POST['gender-options'],
            'height'        => trim($_POST['height']),
            'weight'        => trim($_POST['weight']),
            'age'           => trim($_POST['age']),
            'bodyfat'       => $_POST['bodyfat-options'], // Не уверен, нужна ли здесь функция trim
            'activityLevel' => $_POST['activateLevel']    // Не уверен, нужна ли здесь функция trim
        ];

        $id = $_SESSION['id_user']; // Поправил на $id
        $goal = $params['goal'];
        $gender = $params['gender'];
        $height = $params['height'];
        $weights = $params['weight'];
        $age = $params['age'];
        $bodyfat = $params['bodyfat'];
        $activateLevel = $params['activityLevel'];
        $sql = "UPDATE users_information_for_calculator SET goal = '$goal', gender = '$gender', height = '$height', weight = '$weights', age = '$age', bodyfat = '$bodyfat', activityLevel = '$activateLevel' WHERE id_user =' $id'";
        $_SESSION['goaltext'] =  $params['goal'];
        $_SESSION['gender'] = $params['gender'];
        $_SESSION['height'] = $params['height'];
        $_SESSION['weight'] = $params['weight'];
        $_SESSION['age'] = $params['age'];
        $_SESSION['bodyfat'] = $params['bodyfat'];;
        $_SESSION['acivityLevel'] = $params['activityLevel'];

        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);

        header('location: profile.php');
    } else {
        echo "fgfd";

        $goal = $_POST['goal-options'];
        $gender = $_POST['gender-options'];
        $height = trim($_POST['height']);
        $weight = trim($_POST['weight']);
        $age = trim($_POST['age']);
        $bodyfat = $_POST['bodyfat-options']; // Не уверен, нужна ли здесь функция trim
        $activateLevel = $_POST['activateLevel'];
        if ($goal === '' || $gender === '' || $height === '' || $weight === '' || $age === '' || $bodyfat === '' || $activateLevel === '' || $set === '') {
            $errMsgEmpty = "Not all fields have been filled in!";
            $_SESSION['err_msg'] = $errMsgEmpty;
        } else {
            $params = [
                'id_user' => $_SESSION['id_user'],
                'goal' => $goal,
                'gender' => $gender,
                'height' => $height,
                'weight' => $weight,
                'age' => $age,
                'bodyfat' => $bodyfat,
                'activityLevel' => $activateLevel,
                'setWeightGoal' => $bodyfat,
                'weightGoal' => $activateLevel,
                // 'weightChangeRate' => $set,





            ];
            $_SESSION['goaltext'] =  $params['goal'];
            $_SESSION['gender'] = $params['gender'];;
            $_SESSION['height'] = $params['height'];;
            $_SESSION['weight'] = $params['weight'];;
            $_SESSION['age'] = $params['age'];;
            $_SESSION['bodyfat'] = $params['bodyfat'];;
            $_SESSION['acivityLevel'] = $params['activityLevel'];;
            if ($user['id_user'] == '') {
                header('location: login.php');
            } else {

                $id =  insert('users_information_for_calculator', $params);
                if ($id) {
                    header('location: profile.php');
                }
            }
        }
    }
}


// Проверяем, что это страница login.php
if (basename($_SERVER['PHP_SELF']) === 'login.php') {
    $_SESSION['err_msg'] = '';
}
if (basename($_SERVER['PHP_SELF']) === 'register.php') {
    $_SESSION['err_msg'] = '';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $passFir = trim($_POST['passwordFir']);
    $passSec = trim($_POST['passwordSec']);

    if ($email === '' || $name === '' || $passFir === '') {
        $errMsgEmpty = "Not all fields have been filled in!";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } elseif (mb_strlen($name, 'UTF-8') < 2) {
        $errMsgEmpty = "The name must be at least three characters long";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } elseif (mb_strlen($surname, 'UTF-8') < 2) {
        $errMsgEmpty = "The last name must be at least three characters long";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } elseif ($passFir !== $passSec) {
        $errMsgEmpty = "Passwords do not match.";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } else {
        $request_data = selectOne('data_registration', ['email' => $email]);
        if ($request_data) {
            $errMsgEmpty = "Such an email already exists!";
            $_SESSION['err_msg'] = $errMsgEmpty;
        } else {
            $pass = $passFir; // Хэшируем пароль
            $data_register = [
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'password' => $pass,
            ];
            $isSubmit = true;





            // Генерируем случайное число от 1000 до 9999

            $id = insert('data_registration', $data_register);
            if ($id) {
                header('location: login.php');
            }
        }
    }
} else {
    $name = '';
    $surname = '';
    $email = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if ($email === '' || $pass === '') {

        $errMsgEmpty = "Not all fields have been filled in!";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } else {

        $users = selectOne('data_registration', ['email' => $email]);
        $_SESSION['id_user'] = $users['id_user'];
        $id_users = $_SESSION['id_user'];
        $data = selectOne('users_information_for_calculator', ['id_user' => $id_users]);

        if (empty($users)) {
            $errMsgEmpty = "The username doesn't exist";
            $_SESSION['err_msg'] = $errMsgEmpty;
            // header('location: register.php');

        } else {

            if (trim($users['email']) ===  $email && $pass == trim($users['password'])) {

                $_SESSION['id'] = $users['id_user'];
                $_SESSION['name'] = $users['name'];
                $_SESSION['surname'] = $users['surname'];
                $_SESSION['email'] = $users['email'];
                $_SESSION['age'] = $data['age'];
                $_SESSION['goaltext'] = $data['goal'];
                $_SESSION['gender'] = $data['gender'];
                $_SESSION['height'] = $data['height'];
                $_SESSION['weight'] = $data['weight'];
                $_SESSION['bodyfat'] = $data['bodyfat'];
                $_SESSION['acivityLevel'] = $data['activityLevel'];

                echo "vsvvf";
                $id_user = $_SESSION['id_user'];
                $userInfos = selectOne('users_information_for_calculator', ['id_user' => $id_user]);

                if (basename($_SERVER['PHP_SELF']) == 'profile.php') {
                    if (trim($_SESSION['email']) == 'admin@gmail.com') {
                        header('location: admin_profile.php');
                    } else {
                        if (empty($userInfos)) {
                            
                            header('location: nutrition-calculator.php');
                        } else {
                            header('location: profile.php');
                        }
                    }
                } else {
                    header('location: profile.php');
                }
            } else {
                // header('location: more.php');
            }
        }




        if ($users) {
            $storedHash = trim($users['password']);
            // echo $pass ."vsvf";
            // Сравниваем введенный пароль с хешем из базы данных
            if ($pass == trim($storedHash)) {
                $_SESSION['id'] = $users['id_user'];
                $_SESSION['name'] = $users['name'];
                $_SESSION['surname'] = $users['surname'];
                $_SESSION['email'] = $users['email'];
                $_SESSION['age'] = $data['age'];

                if (trim($users['email']) ===  $email && $pass ==  trim($storedHash) && $email === trim('admin@gmail.com')) {
                    header('location: admin_profile.php');
                } else {
                    // header('location: profile.php');
                }
            } else {
                if (trim($_POST['password']) !== trim($storedHash)) {
                    $errMsgEmpty = 'The  password you entered is incorrect';
                    $_SESSION['err_msg'] = $errMsgEmpty;
                    // exit();
                } else {
                    $errMsgEmpty = 'The username or password you entered is incorrect';
                    $_SESSION['err_msg'] = $errMsgEmpty;
                }
            }
        } else {
        }
    }
} else {
    $email = '';
    $pass = '';
}




$goal = $_SESSION['goaltext'];
$gender = $_SESSION['gender'];
$height = $_SESSION['height'];
$weight = $_SESSION['weight'];
$age = $_SESSION['age'];
$bodyfat = $_SESSION['bodyfat'];
$activateLevel = $_SESSION['acivityLevel'];

$bmr;
// Рассчитываем базовый метаболизм (BMR) в зависимости от пола
if (trim($gender) == "Male") {
    $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
    //  echo $bmr."svsvs";
} elseif (trim($gender) == "Female") {
    $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
}

// Учитываем уровень физической активности
switch (trim($activityLevel)) {
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


$carbsCalories = $bmr * 0.45; // 45% калорий от углеводов
$proteinCalories = $bmr * 0.3; // 30% калорий от белков
$fatCalories = $bmr * 0.25; // 25% калорий от жиров

$carbsGrams = $carbsCalories / 4;
$proteinGrams = $proteinCalories / 4;
$fatGrams = $fatCalories / 9;
$_SESSION['Carbohydrates'] = round($carbsGrams, 2);
$_SESSION['Protein'] = round($proteinGrams, 2);
$_SESSION['Fat'] = round($fatGrams, 2);
$_SESSION['dayKcall'] = round($bmr, 2);

// echo $_SESSION['Carbohydrates'] ."dsvsdvds";
$totalCaloriesPerDay = $bmr;
$totalCaloriesPerWeek = $totalCaloriesPerDay * 7;
$totalCaloriesPerMonth = $totalCaloriesPerDay * 30;

$_SESSION['totalCaloriesPerWeek'] = round($totalCaloriesPerWeek, 2);
$_SESSION['month'] = round($totalCaloriesPerMonth, 2);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['re-password'])) {
    // Проверяем, совпадает ли введенный код с кодом из сессии


    // Создаем массив параметров для передачи в функцию update
    $params = [
        'password' => $_POST['passw'] // Новый пароль
    ];

    $email = $_SESSION['emailWithConfirm'];
    // Получаем id пользователя по email из сессии
    $sql = "SELECT id_user FROM data_registration WHERE email = ' $email '";


    $query = $connection->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $id = $row['id_user'];

    update('data_registration', $id, $params);

    // Добавляем код для редиректа пользователя
    header('Location: login.php');
}



// для проверки кода при изменении пароля
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enter-code'])) {
    $code = $_POST['firstnumber'] . "" . $_POST['secondnumber'] . "" . $_POST['thirdnumber'] . "" . $_POST['fourthnumber'];
    if ($_SESSION['code'] == $code) {

        header('location: re-password.php');
    } else {
        $errMsgEmpty = "Code is not correct";
        $_SESSION['err_msg'] = $errMsgEmpty;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get-code'])) {
    $code = rand(1000, 9999);
    $name = htmlentities("Aibeksss");
    $email = htmlentities($_POST['email']);
    $_SESSION['code'] = $code;
    $_SESSION['emailWithConfirm'] = $email;

    $mail = new PHPMailer(true); // Исправлено здесь, добавлен пробел перед `PHPMailer`
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'aibekseitzhan002@gmail.com';
    $mail->Password = 'asozyaoflqeljdkf';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $name); // setFrom, а не setForm
    $mail->addAddress($_POST['email']); // Адрес, куда будет отправлено сообщение
    $mail->Subject = "$email subject"; // Здесь вы можете добавить тему письма
    $mail->Body = "Your code is: $code"; // Здесь вы можете добавить содержимое письма, включая код

    $mail->send();


    header('location: enter-code.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-feedback'])) {
    $email = trim($_POST['email']);
    $feedback_text = trim($_POST['msg']);
    $phone = trim($_POST['phone']);

    $data_feedback = [
        'name' => $_POST['name'],
        'feedbackTitle' => $_POST['feedback-title'],
        'email' => $email,
        'feedback' => $feedback_text,
        'tel_number' => $phone,
    ];
    $name = $data_feedback['name'];
    $feed = $data_feedback['feedbackTitle'];
    $em = $data_feedback['email'];
    $fee = $data_feedback['feedback'];
    $tel = $data_feedback['tel_number'];

    $sql = "INSERT INTO feedback_users (name, feedbackTitle, email, feedback, tel_number) 
    VALUES ('$name', '$feed', '$em', '$fee', '$tel')";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    header('location: profile.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['button-feedback-submit'])) {

    // Проверка наличия данных в $_POST
    if (isset($_POST['selected-emojis'], $_POST['selected-reasons'])) {

        $data_feedback = [

            'estimation' => implode(" , ", $_POST['selected-emojis']), // Объединяем выбранные эмодзи в строку
            'support' => implode(", ", $_POST['selected-reasons']),

        ];

        $est = $data_feedback['estimation'];
        $support = $data_feedback['support'];
        print_r($data_feedback);

        $sql = "INSERT INTO support_service (estimation , support) 
        VALUES ('$est', '$support')";
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        header('location: profile.php');


        // Проверка на успешность выполнения запроса и перенаправление на другую страницу


    }
}
$selected = $_SESSION['select-type-food'];

$type = strtolower($selected);
$food = selectAll('food', ['type' => $type]);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['select-type'])) {
    $selectedOption = $_POST['select-type']; // Получаем выбранное значение из выпадающего списка
    $_SESSION['select-type-food']    = $selectedOption;


    switch ($selectedOption) {
        case 'Anything':
            header('Location: anything.php');
            break;
        case 'Paleo':
            header('Location: paleo.php');
            break;
        case 'Vegetarian Vegan':
            header('Location: vegetarian.php');
            break;
        case 'Vegetarian Vegan':
            header('Location: vegan.php');
            break;
        case 'Ketogenic':
            header('Location: ketogenic.php');
            break;

        case 'Mediterranean':
            header('Location: mediterranean.php');
            break;
    }
}
