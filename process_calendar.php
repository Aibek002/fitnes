<?php
// Проверяем, был ли передан параметр id пользователя в URL
    $userId = $_GET['id']; // Получаем id пользователя из URL

    // Подключаемся к базе данных
    include './app/database/connectDB.php';

    // Проверяем, есть ли запись с goal=Lose Fat для данного пользователя
    $sqlCheckGoal = "SELECT goal FROM users_information_for_calculator WHERE   goal = 'Lose Weight'";
    // echo $sqlCheckGoal;
    $stmtCheckGoal = $connection->prepare($sqlCheckGoal);
    $stmtCheckGoal->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmtCheckGoal->execute();
    if ($_SESSION['name'] == '') {
        header('Location: /');
        exit;
    }
    // Если запись найдена, выбираем случайные меню из Food_Lose
    if ($stmtCheckGoal->rowCount() > 0) {
        // Создаем массив с возможными типами (завтрак, обед, ужин)
        $mealTypes = ['Breakfast', 'Lunch', 'Dinner'];

        // Подготавливаем SQL-запрос для выборки случайных меню
        $sqlRandomMenu = "SELECT * FROM Food_Lose WHERE type = :mealType ORDER BY RAND() LIMIT 1";

        // Выполняем запрос и выводим меню для каждого типа
        foreach ($mealTypes as $type) {
            $stmtRandomMenu = $connection->prepare($sqlRandomMenu);
            $stmtRandomMenu->bindParam(':mealType', $type, PDO::PARAM_STR);
            $stmtRandomMenu->execute();
            $menu = $stmtRandomMenu->fetch(PDO::FETCH_ASSOC);

            // Выводим меню на экран
            echo '<h3>' . $type . ' Menu:</h3>';
            echo '<p>Name: ' . $menu['name'] . '</p>';
            echo '<p>Calories: ' . $menu['calories'] . '</p>';
            echo '<p>Protein: ' . $menu['protein'] . '</p>';
            echo '<hr>';
        }
    } else {
        echo '<p>No record found for "Lose Fat" goal.</p>';
    }

?>
