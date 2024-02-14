<?php
session_start();
include('./database/db.php');
include './path.php';

$isSabmit = false;
$errMsgEmpty = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $passFir = trim($_POST['passwordFir']);
    $passSec = trim($_POST['passwordSec']);

    if ($email === '' || $name === '' || $passFir === '') {
        $errMsgEmpty = "не все поля заполнены!";
    } elseif (mb_strlen($name, 'UTF-8') < 2) {
        $errMsgEmpty = "Имя должно быть не менее 3 символов";
    } elseif (mb_strlen($surname, 'UTF-8') < 2) {
        $errMsgEmpty = "Фамилия должно быть не менее 3 символов";
    } elseif ($passFir !== $passSec) {
        $errMsgEmpty = "Пароли не совпадают";
    } else {


        $request_data = selectOne('data_registration', ['email' => $email]);
        if ($request_data) {
            $errMsgEmpty = "Такой email уже существует!";
        } else {
            $data_register = [
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'password' => $passFir,
            ];
            $isSubmit = true; // Предполагаю, что это у вас установка флага, чтобы показать, что данные были отправлены
            $id = insert('data_registration', $data_register); // Вставляем данные и получаем ID
            echo $id;
            $user = selectOne('data_registration', ['id_user' => $id]); // Получаем пользователя по ID
            $_SESSION['id'] = $user['id_user']; // Устанавливаем ID пользователя в сессию
            $_SESSION['name'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['email'] = $user['email'];
            if ($_SESSION('admin')) {
                header('location:' . BASE_URL);
            } else {
                header('location:' . BASE_URL . 'admin/admin.php');
            }
            // Выводим содержимое массива $_SESSION
            // prints($_SESSION);

            // $errMsgEmpty='Пользователь' . "<strong> " . $name ." " . $surname . " </strong>" . 'успешно зарегистрирован!' ;
        }
    }
} else {
}

// $pass=password_hash( $_POST['password'],PASSWORD_DEFAULT);
