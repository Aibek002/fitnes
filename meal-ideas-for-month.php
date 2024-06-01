<?php
session_start();
require './app/database/connectDB.php';
require './app/database/db.php';

require './path.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Month Calendar</title>
    <style>
        .calendar {
            width: 100%;
            border-collapse: collapse;
            margin-top: 160px;
        }

        h1 {
            margin: 130px 0 20px 0;
            text-align: center;
        }

        .calendar,
        th,
        td {
            border: 1px solid white;
            padding: 5px;
            text-align: center;
            margin: 0;
        }

        th {
            background-color: #fff;
        }

        .day-button {
            width: 46px;
            height: 30px;
            /* border-radius: 50%; */
            background-color: #fff;
            cursor: pointer;
            border-color: #5f9ea021;
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

        .back-btn img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40%;
        }

        .random_table {
            width: 100%;
            border-collapse: collapse;
        }

        .random_table th,
        td {
            border: 1px solid #ccc;
        }

     
    
        .container {
            max-width: 100%;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            margin-bottom: 200px;
        }
    </style>
</head>

<body>
    <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>

    <script src="./assets/js/goBack.js"></script>
    <?php
    // Get the current month and year
    $month = date('m');
    $year = date('Y');

    // Number of days in the month
    $numDays = date('t', strtotime("$year-$month-01"));

    // First day of the month
    $firstDay = date('N', strtotime("$year-$month-01"));

    // Create an array of days in the month
    $days = [];
    for ($i = 1; $i <= $numDays; $i++) {
        $days[] = $i;
    }

    // Create an array of days in the week
    $daysOfWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

    echo ' <h1>Month plan Calendar</h1>';
    // Output the calendar table
    echo '<table class="calendar">';
    echo '<tr><th colspan="7">' . date('F Y', strtotime("$year-$month-01")) . '</th></tr>';
    echo '<tr>';
    foreach ($daysOfWeek as $dayOfWeek) {
        echo "<th>$dayOfWeek</th>";
    }
    echo '</tr>';
    echo '<tr>';
    $dayCount = 1;
    for ($i = 1; $i <= 7; $i++) {
        echo '<td>';
        if ($i >= $firstDay && $dayCount <= $numDays) {
            $id = $dayCount;

            echo '<a href="meal-ideas-for-month.php?id=' .  $id . ' "> <button class="day-button">';
            echo $days[$dayCount - 1];
            echo '</button></a>';

            $dayCount++;
        }
        echo '</td>';
    }
    echo '</tr>';
    while ($dayCount <= $numDays) {
        echo '<tr>';
        for ($i = 1; $i <= 7 && $dayCount <= $numDays; $i++) {
            $id = $dayCount;
            echo '<td>';
            echo '<a href="meal-ideas-for-month.php?id=' .  $id . ' "> <button class="day-button">';
            echo $days[$dayCount - 1];
            echo '</button></a>';
            $dayCount++;
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
    <div class="container">

        <?php

        if ($_SESSION['name'] == '') {
            header('Location: /');
            exit;
        }
        $id = $_GET['id'];

        $table = '';
        $type1 = '';
        $type2 = '';
        $type3 = '';

        if ($_SESSION['goaltext'] == 'Lose Weight') {
            $type1 = 'Breakfast';
            $type2 = 'Lunch';
            $type3 = 'Dinner';


            $table = 'Food_Lose';
        } elseif ($_SESSION['goaltext'] == 'Maintain') {
            $type1 = 'Завтрак';
            $type2 = 'Обед';
            $type3 = 'Ужин';
            $table = 'Food_Replenish';
        } elseif ($_SESSION['goaltext'] == 'Build Muscle') {
            $type1 = 'Завтрак';
            $type2 = 'Обед';
            $type3 = 'Ужин';
            $table = 'Food_Set_Of_Muscles';
        }

        // Initialize arrays to store random meals for each type
        $breakfast = [];
        $lunch = [];
        $dinner = [];

        // Fetch a random breakfast
        $sqlBreakfast = "SELECT * FROM $table WHERE type = '$type1' ORDER BY RAND() LIMIT 1";
        $stmtBreakfast = $connection->prepare($sqlBreakfast);
        $stmtBreakfast->execute();
        $breakfast = $stmtBreakfast->fetch(PDO::FETCH_ASSOC);

        // Fetch a random lunch
        $sqlLunch = "SELECT * FROM $table WHERE type = '$type2' ORDER BY RAND() LIMIT 1";
        $stmtLunch = $connection->prepare($sqlLunch);
        $stmtLunch->execute();
        $lunch = $stmtLunch->fetch(PDO::FETCH_ASSOC);

        // Fetch a random dinner
        $sqlDinner = "SELECT * FROM $table WHERE type = '$type3' ORDER BY RAND() LIMIT 1";
        $stmtDinner = $connection->prepare($sqlDinner);
        $stmtDinner->execute();
        $dinner = $stmtDinner->fetch(PDO::FETCH_ASSOC);

        // Check if random meals were found
        if ($breakfast && $lunch && $dinner) {
            // Print the random meals in a table format
            echo "<table class='random_table' border='1'>";
            echo "<tr><th>Meal Type</th><th>Name</th><th>Calories</th><th>Protein</th></tr>";

            echo "<tr>";
            echo "<td>Breakfast</td>";
            echo "<td>" . $breakfast['name'] . "</td>";
            echo "<td>" . $breakfast['calories'] . "</td>";
            echo "<td>" . $breakfast['protein'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Lunch</td>";
            echo "<td>" . $lunch['name'] . "</td>";
            echo "<td>" . $lunch['calories'] . "</td>";
            echo "<td>" . $lunch['protein'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Dinner</td>";
            echo "<td>" . $dinner['name'] . "</td>";
            echo "<td>" . $dinner['calories'] . "</td>";
            echo "<td>" . $dinner['protein'] . "</td>";
            echo "</tr>";

            echo "</table>";
        } else {
            echo "No records found for one or more meal types";
        }

        ?>
    </div>
    <?php
    include './app/include/footer.php';
    ?>
</body>

</html>