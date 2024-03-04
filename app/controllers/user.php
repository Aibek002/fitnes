<?php
session_start();
include('app\database\connectDB.php');
include('app\database\db.php');
include 'path.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';



$isSubmit = false;
$errMsgEmpty = "";
$errEmail = '';

// Получаем идентификатор пользователя из сессии
$id_user = $_SESSION['id_user'];

// Вызываем функцию selectOne для получения данных из таблицы
// 'users_information_for_calculator' для заданных условий
$data = selectOne('users_information_for_calculator', ['goal'], ['id_user' => $id_user]);
// prints($data);
// Сохраняем значение 'goal' в сессии
$_SESSION['goaltext'] = $data['goal'];
$_SESSION['gender'] = $data['gender'];
$_SESSION['height'] = $data['height'];
$_SESSION['weight'] = $data['weight'];
$_SESSION['age'] = $data['age'];
$_SESSION['bodyfat'] = $data['bodyfat'];
$_SESSION['acivityLevel'] = $data['activityLevel'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-informations'])) {
    $params = [
        'goal'          => $_POST['goal-options'],
        'gender'        => $_POST['gender-options'],
        'height'        => trim($_POST['height']),
        'weight'        => trim($_POST['weight']),
        'age'           => trim($_POST['age']),
        'bodyfat'       => $_POST['bodyfat-options'], // Не уверен, нужна ли здесь функция trim
        'activityLevel' => $_POST['activateLevel']    // Не уверен, нужна ли здесь функция trim
    ];
    $id = $data['id_user']; // Поправил на $id

    // Используем параметризированный запрос
    $sql = "UPDATE users_information_for_calculator SET goal = :goal, gender = :gender, height = :height, weight = :weight, age = :age, bodyfat = :bodyfat, activityLevel = :activityLevel WHERE id_user = :id";
    $query = $connection->prepare($sql);
    // Биндим значения к параметрам
    $query->bindParam(':goal', $params['goal']);
    $query->bindParam(':gender', $params['gender']);
    $query->bindParam(':height', $params['height']);
    $query->bindParam(':weight', $params['weight']);
    $query->bindParam(':age', $params['age']);
    $query->bindParam(':bodyfat', $params['bodyfat']);
    $query->bindParam(':activityLevel', $params['activityLevel']);
    $query->bindParam(':id', $id);
    // Выполняем запрос
    $query->execute();
    dbCheckError($query);

    // Добавляем код для редиректа пользователя
    header('Location: ' . BASE_URL . 'profile.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nutrition'])) {
    $id_users = '';
    $goal = $_POST['goal-options'];
    $gender = $_POST['gender-options'];
    $height = trim($_POST['height']);
    $weight = trim($_POST['weight']);
    $age = trim($_POST['age']);
    $bodyfat = trim($_POST['bodyfat-options']);
    $activateLevel = trim($_POST['activateLevel']);
    $_SESSION['goaltext'] = $goal;
    // echo $_SESSION['goaltext'];
    // $set = trim($_POST['set-goal-options']);

    // echo $goal . "." . $gender . " " . $height . " " . $weight . " " . $age . " " . $bodyfat . " " . $set;

    if ($goal === '' || $gender === '' || $height === '' || $weight === '' || $age === '' || $bodyfat === '' || $activateLevel === '' || $set === '') {
        $errMsgEmpty = "Не все поля заполнены!";
    } else {
        $data_info = [
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

        insert('users_information_for_calculator', $data_info);
        if ($id) {
            $user = selectOne('users_information_for_calculator', ['id_user' => $id]);
            header('location:' . BASE_URL . 'Notification.php');
        }
    }
}


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
    // echo $id . ".1 " . $sql;

    // Вызываем функцию update для обновления пароля
    update('data_registration', $id, $params);

    // Добавляем код для редиректа пользователя
    header('Location: ' . BASE_URL . 'login.php');
    exit(); // Обязательно завершаем выполнение скрипта после редиректа

}



// для проверки кода при изменении пароля
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enter-code'])) {
    $code = $_POST['firstnumber'] . "" . $_POST['secondnumber'] . "" . $_POST['thirdnumber'] . "" . $_POST['fourthnumber'];
    echo  $code . " / " . $_SESSION['code'];
    if ($_SESSION['code'] == $code) {

        header('location:' . BASE_URL . 're-password.php');
    } else {
        $errMsgEmpty = "Code Not Correct";
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
    echo 'send';
    $mail->send();
    echo $_POST['email'];

    header('location:' . BASE_URL . 'enter-code.php');
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $passFir = trim($_POST['passwordFir']);
    $passSec = trim($_POST['passwordSec']);

    if ($email === '' || $name === '' || $passFir === '') {
        echo $email . " " . $name . " " . $surname . " " . $passFir;
        $errMsgEmpty = "Не все поля заполнены!";
    } elseif (mb_strlen($name, 'UTF-8') < 2) {
        $errMsgEmpty = "Имя должно быть не менее 3 символов";
    } elseif (mb_strlen($surname, 'UTF-8') < 2) {
        $errMsgEmpty = "Фамилия должна быть не менее 3 символов";
    } elseif ($passFir !== $passSec) {
        $errMsgEmpty = "Пароли не совпадают";
    } else {
        $request_data = selectOne('data_registration', ['email' => $email]);
        if ($request_data) {
            $errMsgEmpty = "Такой email уже существует!";
        } else {
            $pass = password_hash($passFir, PASSWORD_DEFAULT); // Хэшируем пароль
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
                $user = selectOne('data_registration', ['id_user' => $id]);
                header('location:' . BASE_URL . 'Notification.php');
            }
        }
    }
} else {
    $name = '';
    $surname = '';
    $email = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

    // Здесь выполняется ваш код аутентификации и проверки пароля

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if ($email === '' || $pass === '') {

        $errMsgEmpty = "Не все поля заполнены!";
    } else {
        $user = selectOne('data_registration', ['email' => $email]);
        if ($user) {
            $storedHash = trim($user['password']);
            // Сравниваем введенный пароль с хешем из базы данных
            if (password_verify($pass, $storedHash) === true) {
                $_SESSION['id'] = $user['id_user'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['surname'] = $user['surname'];
                $_SESSION['email'] = $user['email'];
                // prints($_SESSION['name']);

                header('location:' . BASE_URL . 'profile.php');
            } else {
                $errMsgEmpty = 'логин или пароль не правельный';
            }
        }
    }
} else {
    $email = '';
    $pass = '';
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
    $feed = insert('feedback_users', $data_feedback);
    if ($feed) {
        header('location:' . BASE_URL);
    } else {
        echo 'error';
    }
}
