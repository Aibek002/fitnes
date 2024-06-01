<?php
session_start();

include './app/database/connectDB.php';
include './app/database/db.php';
include './path.php';


if(trim($_SESSION['email']) !== 'admin@gmail.com'){

    header('location: profile.php');
   
   }
// Проверяем, был ли передан параметр id в URL
if (isset($_GET['id'])) {
    // Получаем id пользователя для удаления
    $id = $_GET['id'];

    // Подготавливаем SQL-запрос для удаления пользователя
    $sql = "DELETE FROM ";

    // Определяем, из какой таблицы нужно удалить пользователя
    if (checkIfExists('Food_Lose', $id)) {
        $sql .= "Food_Lose WHERE id = :id";
    } elseif (checkIfExists('Food_Replenish', $id)) {
        $sql .= "Food_Replenish WHERE id = :id";
    } elseif (checkIfExists('Food_Set_Of_Muscles', $id)) {
        $sql .= "Food_Set_Of_Muscles WHERE id = :id";
    } else {
        // Если не удалось определить таблицу, выводим ошибку
        echo 'Не удалось определить таблицу для удаления пользователя.';
        exit; // Прерываем выполнение скрипта
    }

    $stmt = $connection->prepare($sql);

    // Привязываем параметры к подготовленному запросу
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Выполняем запрос
    if ($stmt->execute()) {
        // Успешно удалено
        echo 'Пользователь успешно удален.';
    } else {
        // Обработка ошибки при удалении
        echo 'Произошла ошибка при удалении пользователя.';
    }
} else {
    // В случае отсутствия id в URL
    echo 'Не передан идентификатор пользователя для удаления.';
}
header('location:' .  '/meal-ideas.php');

// Функция для проверки существования пользователя в таблице
function checkIfExists($tableName, $id) {
    global $connection;
    $sql = "SELECT COUNT(*) FROM $tableName WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}
?>
