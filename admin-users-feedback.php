<?php
session_start();

if(trim($_SESSION['email']) !== 'admin@gmail.com'){

    header('location: profile.php');
   
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>User Feedback</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90% !important;
            margin: 0 5%;
            height: 100vh;
            overflow-y: auto;
            margin-bottom: 200px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;

        }

        th {
            background-color: #f2f2f2;
            font-family: var(--second-family);
            font-weight: 500;
            font-size: 12px;
            color: #718ebf !important;
        }

        td {
            font-family: var(--second-family);
            font-weight: 400;
            font-size: 12px;
            color: #232323 !important;
        }

        .h2 {
            margin: 150px 0px 20px 0;
            text-align: center;


        }

        .back-btn img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40%;
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
    </style>
</head>

<body>


    <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>

    <script src="./assets/js/goBack.js"></script>
    <h2 class="h2">User Feedback</h2>
    <table>
        <tr>
            <th>Email</th>
            <th>Feedback Title</th>
            <th>Feedback</th>
        </tr>
        <?php

        // Подключение к базе данных
        include 'app/database/connectDB.php';

        // SQL-запрос для получения фидбэков
        $sql = "SELECT email, feedbackTitle, feedback FROM feedback_users";
        $stmt = $connection->query($sql);

        // Проверка наличия фидбэков
        if ($stmt->rowCount() > 0) {
            // Вывод каждого фидбэка в виде строки таблицы
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['feedbackTitle'] . '</td>';
                echo '<td>' . $row['feedback'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="3">No feedback found</td></tr>';
        }
        ?>
    </table>
    <?php
    include './app/include/footer-admin.php'
    ?>
</body>

</html>