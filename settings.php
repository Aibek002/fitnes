<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$data = 'fitnes';
$options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
try {
    $connection = new PDO("mysql:host=$host;dbname=$data;charset=utf8;", $user, $pass,$options);
} catch (PDOException $i) {
    die('error');
}
