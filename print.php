<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Ideas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .container{
        margin: 100px 0;
    }
    .mt-5.mb-4{
        text-align: center;
   }
    .back-btn {
    position: absolute;
    top: 40px;
    left: 30px;
    border: none;
    cursor: pointer;
    border-radius: 50%; 
    overflow: hidden;
    width: 40px;
    height: 40px;
    background-color: #1F64FF;
    z-index: 9999;
    
  }
  
  .back-btn img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 100%;
    max-height: 100%;
  }

</style>
<body>
    
    <div class="container">
    <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png"></button>
    <script src="./assets/js/goBack.js"></script>

        <h1 class="mt-5 mb-4">Submit Data to Table</h1>


        <?php
        // Check if form is submitted
        echo '<table class="table table-bordered mt-4">';

        echo '<tbody>';
        if (($handle = fopen("ml/my_rec.csv", "r")) !== FALSE) {
            $ids = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Skip the first row (header) in the CSV file

                if ($data[2] != 'RecipeId') {
                    $id = 0;
                    echo '<tr>';

                    foreach ($data as $value) {
                        $id = $id + 1;
                        $food[$ids][$id] = $value;
                        if ($id == 2 || $id == 3 || $id == 13 || $id == 8 || $id == 6 || $id == 7 || $id == 5) {
                            continue;
                        } else {

                            echo '<td>' . $value . '</td>';
                        }
                    }
                    $ids += 1;
                    // print_r($food);



                }
            }
            fclose($handle);
        } else {
            echo "Error opening the file.";
        }

        echo '</tbody>';
        echo '</table>';
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button type="submit" class="btn btn-primary">Submit Data</button>
        </form>
        <?php
        // Параметры подключения к базе данных
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                require './app/database/connectDB.php';
                // Путь к CSV-файлу
                $csvFile = "ml/my_rec.csv";

                // Открытие файла на чтение
                if (($handle = fopen($csvFile, "r")) !== FALSE) {

                    // Пропустите первую строку (заголовки)
                    fgetcsv($handle, 1000, ",");

                    // Подготовленное выражение для вставки данных
                    $stmt = $connection->prepare("INSERT INTO `Food_Lose` (type, name,  Recipe_Ingredient_Parts, calories, Carbohydrate_Content, protein, Recipe_Instructions) 
                                VALUES (:type, :name,   :Recipe_Ingredient_Parts, :calories, :Carbohydrate_Content, :protein, :Recipe_Instructions)");

                    // Чтение CSV и вставка данных в базу данных
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        // Преобразуйте данные, если это необходимо
                        $RecipeId = $data[0];
                        $Name = $data[1];
                        $CookTime = $data[2];
                        $PrepTime = $data[7];
                        $TotalTime = $data[4];
                        $RecipeIngredientParts = $data[5];
                        $Calories = $data[8];
                        $FatContent = $data[7];
                        $CarbohydrateContent = $data[8];
                        $ProteinContent = $data[9];
                        $RecipeInstructions = $data[10];

                        // Привязка значений параметров к подготовленному выражению
                        $stmt->bindParam(':type', $RecipeId);
                        // $stmt->bindParam(':Name', $Name);
                        // $stmt->bindParam(':CookTime', $CookTime);
                        $stmt->bindParam(':name', $PrepTime);
                        // $stmt->bindParam(':TotalTime', $TotalTime);
                        $stmt->bindParam(':Recipe_Ingredient_Parts', $RecipeIngredientParts);
                        $stmt->bindParam(':calories', $Calories);
                        // $stmt->bindParam(':FatContent', $FatContent);
                        $stmt->bindParam(':Carbohydrate_Content', $CarbohydrateContent);
                        $stmt->bindParam(':protein', $ProteinContent);
                        $stmt->bindParam(':Recipe_Instructions', $RecipeInstructions);

                        // Выполнение подготовленного выражения
                        if ($stmt->execute()) {
                            $alertMessage = 'New data submited';
                            $jsCode = "alert('$alertMessage');";

                            // Output the JavaScript code within a <script> tag
                            echo "<script>{$jsCode}</script>";
                            // header('location: meal-ideas.php');
                        } else {
                            echo "Error inserting record";
                        }
                    }

                    // Закрытие подготовленного выражения и файла CSV
                    $stmt = null;
                    fclose($handle);
                } else {
                    echo "Error opening the file.";
                }

                // Закрытие соединения с базой данных
                $connection = null;
            } catch (PDOException $e) {
                echo "connectionection failed: " . $e->getMessage();
            }
        }
        ?>

<?php
    include './app/include/footer.php'
    ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-2wcREtBm6Y5BbOspXC2k/CqPHfFn7TKYfBghcBEbkkDBst+85d/d+BpWx9l6tPur" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-26X7s8oTrf9WoGUz+lCJ/o4u5FTj8+KBt+CWUrE9VyQszIKIgj9B1jaXRFxLPGp8" crossorigin="anonymous"></script>
</body>

</html>