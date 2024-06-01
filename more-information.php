<?php
include './app/controllers/source_user.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .food-container {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .food-detail {
            margin-bottom: 5px;
        }

        img {

            width: 100%;
        }

        .back-btn {
            position: absolute;
            top: 70px;
            left: 30px;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            overflow: hidden;
            width: 40px;
            height: 40px;
            background-color: #1f64ff;
        }

        .calculator {
            margin: 120px 0 0 0;

        }

        .register-logo {
            text-align: center;
        }

        .back-btn img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40%;
        }

        .food-detail-g {
            display: flex;
            justify-content: space-around;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
            background: #f4f4f4;
            width: 100%;
            margin:  20px 0;

        }

        .food-detail-g p {
            font-family: var(--second-family);
            font-weight: 600;
            font-size: 9px;
            line-height: 125%;
            text-align: center;
            color: #000;
            margin: 0;
            padding: 10px;
        }
    </style>
</head>

<body>
    <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>

    <script src="./assets/js/goBack.js"></script>

    <div class="calculator">

        <div class="text">

            <h1 class="register-logo">
                <span style="display: inline-block; vertical-align: middle; font-size: 23px; font-weight: bold;">More Information</span>
            </h1>
            <?php
            // Подключение к базе данных (предположим, что уже есть подключение $connection)
            require "./app/database/connectDB.php";

            // Получение значения параметра id из GET-запроса
            $id = $_GET['id'];

            // SQL-запрос для выбора всех записей из таблицы "food" по переданному id
            $sql = "SELECT * FROM food WHERE id = $id";

            // Выполнение запроса и получение результата
            $result = $connection->query($sql);
            // Проверка наличия данных
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="food-container">';

                    echo '<img src="https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" srcset="">';
                    echo '<div class="food-detail-g"> ' . '<p>' . (int) $_SESSION['Carbohydrates'] . ' g <br>Energy</p>' . '<p>' . (int) $_SESSION['Fat'] . ' g <br> Fat</p>' . '<p>' . (int) $_SESSION['Protein'] . ' g <br> Proteint</p>' . ' </div>';

                    echo '<div class="food-detail"><strong>ID:</strong> ' . $row['id'] . '</div>';
                    echo '<div class="food-detail"><strong>Dish Name:</strong> ' . $row['dish_name'] . '</div>';
                    echo '<div class="food-detail"><strong>Calories:</strong> ' . $row['ingredients'] . '</div>';
                    echo '<div class="food-detail"><strong>Type:</strong> ' . $row['type'] . '</div>';
                    echo '</div>';
                }
            } else {
                echo 'No data found for ID ' . $id;
            }
            ?>
            <?php
    include './app/include/footer.php'
    ?>
</body>

</html>