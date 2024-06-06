<?php
$servername = "localhost";
$username = "admin";
$password = "Seitzhan767402";
$dbname = "fitnes"; // замените на имя вашей базы данных

try {
    // Создание нового PDO соединения
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    
    // Установка режима ошибок PDO на режим исключений
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected successfully";
} catch (PDOException $e) {
    // Обработка ошибок подключения
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
