<?
        include './app/controllers/user.php';

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Food List</title>
<!-- Подключение Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/header.css">
<style>
    .container {
        margin-top: 50px;
    }

    .food-item {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
        padding: 10px;
    }

    .food-title {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .food-description {
        color: #555;
    }
</style>
</head>
<body>
<?
    include './app/include/header.php'
    ?>
<div class="container">
    <h1 class="text-center mb-4">Food List</h1>
    <div class="row">
        <?php
        // Подключение к базе данных
        include './app/database/connectDB.php';

        // Запрос на выборку всех блюд из таблицы Food_Lose
        $foodSql = "SELECT * FROM Food_Lose";
        $foodStmt = $connection->query($foodSql);

        // Проверка наличия блюд
        if ($foodStmt->rowCount() > 0) {
            // Выводим каждое блюдо в UI
            while ($row = $foodStmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="col-md-6">';
                echo '<div class="food-item">';
                echo '<p class="food-title">' . $row['name'] . '</p>';
                echo '<p class="food-description"><strong>Type:</strong> ' . $row['type'] . '</p>';
                echo '<p class="food-description"><strong>Calories:</strong> ' . $row['calories'] . '</p>';
                echo '<p class="food-description"><strong>Protein:</strong> ' . $row['protein'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            // Если блюда не найдены
            echo '<div class="col"><p class="text-center">No food items found</p></div>';
        }
        ?>
    </div>
</div>
<?
    include './app/include/footer.php'
    ?>
<!-- Подключение Bootstrap JS (необходимо для работы некоторых компонентов Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
