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



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get-code'])) {
    $code = rand(1000, 9999);
    $_SESSION['code'] = $code;

    $name = htmlentities($_POST['name'] . " " . $_POST['surname']);
    $email = htmlentities($_POST['email']);
    $_SESSION['emailWithConfirm'] = $email;

    $mail = new PHPMailer(true); // Исправлено здесь, добавлен пробел перед `PHPMailer`
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
    echo $_POST['email'];
    // exit();
    header('location:' . BASE_URL . 'register.php');
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

            if ($_SESSION['code'] == $_POST['code']) {
                if ($_SESSION['emailWithConfirm'] == $email) {
                    $id = insert('data_registration', $data_register);
                    if ($id) {
                        $user = selectOne('data_registration', ['id_user' => $id]);
                        header('location:' . BASE_URL . 'login.php');
                    } else {
                        echo "Ошибка при регистрации пользователя";
                    }
                } else {
                    $errMsgEmpty = 'Email не совподают с Email который был отправлен код!';
                }
            } else {
                $errMsgEmpty = 'Код не совподают';
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

                header('location:' . BASE_URL);
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
    $feedback_title = trim($_POST['feedback-title']);
    $feedback_text = trim($_POST['feedback-text']);
    $phone = trim($_POST['phone']);

    $data_feedback = [
        'name' => $_SESSION['name'],
        'feedback_title' => $feedback_title,
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
