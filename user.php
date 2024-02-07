<?php
include 'insert.php';

$isSabmit = false;
$errMsgEmpty = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if ($email === '' || $name === '' || $pass === '') {
        $errMsgEmpty = "не все поля заполнены!";
    } else {
        $data_register = [
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $pass,
        ];
        $isSabmit = true;
        insert('data_registration', $data_register);
    }
} 

// $pass=password_hash( $_POST['password'],PASSWORD_DEFAULT);
