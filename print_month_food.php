<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Random Meals</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-top: 150px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid #ccc;
    }

    th,
    td {
      padding: 6px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
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
  </style>
</head>

<body>
  <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>

  <script src="./assets/js/goBack.js"></script>
  <div class="container">

    <h1>Random Meals</h1>
    <?php
    session_start();
    require './app/database/connectDB.php';
    require './app/database/db.php';

    require './path.php';
    if ($_SESSION['name'] == '') {
      header('Location: /');
      exit;
    }
    $id = $_GET['id'];

    $table = '';
    $type1='';
    $type2='';
    $type3='';

    if ($_SESSION['goaltext'] == 'Lose Weight') {
    $type1='Breakfast';
    $type2='Lunch';
    $type3='Dinner';
  
      
      $table = 'Food_Lose';
    } elseif ($_SESSION['goaltext'] == 'Maintain') {
      $type1='Завтрак';
      $type2='Обед';
      $type3='Ужин';
      $table = 'Food_Replenish';
    } elseif ($_SESSION['goaltext'] == 'Build Muscle') {
      $type1='Завтрак';
      $type2='Обед';
      $type3='Ужин';
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
      echo "<table border='1'>";
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
</body>

</html>