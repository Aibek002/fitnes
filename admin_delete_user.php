<?php
session_start();

include './app/database/connectDB.php';
include './app/database/db.php';
include './path.php';


if(trim($_SESSION['email']) !== 'admin@gmail.com'){

    header('location: profile.php');
   
   }

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM data_registration WHERE id_user = $id";
    $stmt = $connection->prepare($sql);


    if ($stmt->execute()) {
        echo 'Пользователь успешно удален.';
    } else {
        echo 'Произошла ошибка при удалении пользователя.';
    }
} else {
    echo 'Не передан идентификатор пользователя для удаления.';
}
header('location: /admin-user-edit.php');

?>