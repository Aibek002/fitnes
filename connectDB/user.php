<?php
session_start();
include('./database/db.php');
include './path.php';

$isSubmit = false;
$errMsgEmpty = "";
$errEmail='';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $passFir = trim($_POST['passwordFir']);
    $passSec = trim($_POST['passwordSec']);

    if ($email === '' || $name === '' || $passFir === '') {
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
            $id = insert('data_registration', $data_register);
            if ($id) {
                $user = selectOne('data_registration', ['id_user' => $id]);
                // $_SESSION['id'] = $user['id_user'];
                // $_SESSION['name'] = $user['name'];
                // $_SESSION['surname'] = $user['surname'];
                // $_SESSION['email'] = $user['email'];
                header('location:' . BASE_URL . 'login.php');
            } else {
                echo "Ошибка при регистрации пользователя";
            }
        }
    }
} else {
    $name = '';
    $surname = '';
    $email = '';
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
    
// // Проверяем, есть ли уже у нас счетчик в сессии
// if (!isset($_SESSION['login_attempts'])) {
//     // Если нет, инициализируем его и устанавливаем значение 0
//     $_SESSION['login_attempts'] = 0;
// }

// // Увеличиваем счетчик попыток авторизации
// $_SESSION['login_attempts']++;

// // Проверяем количество попыток
// if ($_SESSION['login_attempts'] >= 3) {
//     // Если количество попыток превысило 3, выполните необходимые действия, например, блокируйте доступ пользователя
//     echo "Вы превысили лимит попыток авторизации. Пожалуйста, попробуйте позже.";
//     exit; // Выход из скрипта
// }

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
                header('location:' . BASE_URL);
            } else {
                $errMsgEmpty='логин или пароль не правельный';
            }
        }
    }
}else{
    $email='';
    $pass='';   
}
