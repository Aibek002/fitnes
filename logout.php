<?php
session_start();
include './path.php';

unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['surname']);
unset($_SESSION['email']);
unset($_SESSION['goaltext']);
unset($_SESSION['gender']);
unset($_SESSION['height']);
unset($_SESSION['weight']);
unset($_SESSION['age']);
unset($_SESSION['bodyfat']);
unset($_SESSION['acivityLevel']);
unset($_SESSION['errmsg']);


header('location: /');
