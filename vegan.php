<?
include './app/controllers/user.php';
include './app/database/connectDB.php';
include './example.php';


$sql = "SELECT * FROM food"; // Замените на ваш SQL-запрос
$result = $connection->query($sql);
// prints($result);
if ($result) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    // echo $_SESSION['id_of_food'] . '/';

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anything food</title>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/print-filter-food.css">
</head>

<body>
    <p class="title">Today‘s Meal Plan</p>
    <div class="flex">
        <div class="first-flex-item">
            <div class="first-items"><svg width="104" height="104" viewBox="0 0 104 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M77.7957 56.554C77.1078 60.8801 75.3571 64.9597 72.7009 68.4259C70.0448 71.892 66.5667 74.636 62.5794 76.4108C58.5922 78.1857 54.2209 78.9357 49.859 78.5935C45.4971 78.2513 41.2813 76.8276 37.591 74.4504C33.9007 72.0732 30.8517 68.8172 28.7182 64.9753C26.5847 61.1333 25.4338 56.8261 25.3689 52.441C25.304 48.0559 26.3273 43.7306 28.3466 39.8542C30.3659 35.9778 33.3178 32.6719 36.9369 30.2341L51.7451 52.222L77.7957 56.554Z" fill="#1BA3F0" />
                    <path d="M77.7957 56.554C77.1078 60.8801 75.3571 64.9597 72.7009 68.4259C70.0448 71.892 66.5667 74.636 62.5794 76.4108C58.5922 78.1857 54.2209 78.9357 49.859 78.5935C45.4971 78.2513 41.2813 76.8276 37.591 74.4504C33.9007 72.0732 30.8517 68.8172 28.7182 64.9753C26.5847 61.1333 25.4338 56.8261 25.3689 52.441C25.304 48.0559 26.3273 43.7306 28.3466 39.8542C30.3659 35.9778 33.3178 32.6719 36.9369 30.2341L51.7451 52.222L77.7957 56.554Z" fill="#1BA3F0" />
                    <path d="M77.7957 56.554C77.1078 60.8801 75.3571 64.9597 72.7009 68.4259C70.0448 71.892 66.5667 74.636 62.5794 76.4108C58.5922 78.1857 54.2209 78.9357 49.859 78.5935C45.4971 78.2513 41.2813 76.8276 37.591 74.4504C33.9007 72.0732 30.8517 68.8172 28.7182 64.9753C26.5847 61.1333 25.4338 56.8261 25.3689 52.441C25.304 48.0559 26.3273 43.7306 28.3466 39.8542C30.3659 35.9778 33.3178 32.6719 36.9369 30.2341L51.7451 52.222L77.7957 56.554Z" fill="#1BA3F0" />
                    <path d="M59.324 26.4158C65.5093 28.1945 70.8496 32.171 74.3431 37.5993C77.8366 43.0277 79.2431 49.5348 78.2987 55.8998L52.2063 51.8395L59.324 26.4158Z" fill="#BE5DE0" />
                    <path d="M38.1087 29.268C41.1841 27.3971 44.615 26.1829 48.1899 25.7003C51.7647 25.2176 55.4076 25.4768 58.8939 26.4618L51.9763 52.0197L38.1087 29.268Z" fill="#FBBC05" />
                </svg></div>
            <div class="text">
                <div class="firsts-text">1643 Calories </div>

                <div class="second-text">
                    <p><? echo (int) $_SESSION['Carbohydrates']; ?> <span> g Carbs ,</span> <? echo (int) $_SESSION['Fat']; ?> <span> g Fat ,</span> <? echo (int) $_SESSION['Protein']; ?> <span> g Protein</span></p>
                </div>
            </div>
            <!-- <div class="more"><a name='' href="#zatemnenie"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10Z" fill="black" />
                        <path d="M6 10C7.10457 10 8 10.8954 8 12C8 13.1046 7.10457 14 6 14C4.89543 14 4 13.1046 4 12C4 10.8954 4.89543 10 6 10Z" fill="black" />
                        <path d="M18 10C19.1046 10 20 10.8954 20 12C20 13.1046 19.1046 14 18 14C16.8954 14 16 13.1046 16 12C16 10.8954 16.8954 10 18 10Z" fill="black" />
                    </svg></a></div> -->
        </div>
        <?


        $sql = 'SELECT * FROM food'; // Используйте одинарные кавычки вокруг имени таблицы
        $result = $connection->query($sql); // Используйте метод query для выполнения запроса
        // Определение функций
        function printMealInfo($mealType, $calories, $imagePath)
        {
            echo "<p class='subtitle'>$mealType</p>";
            echo "<p class='comment'>$calories Kcalories</p>";
            echo "<div class='second-flex-item'>";
            echo "<div class='first-items'>";
            echo "<img src='$imagePath' alt=''>";
            echo "</div>";
            echo "<div class='text'>";
        }

        function printMealItems($food, $timeeating)
        {
            $mealItems = '';

            foreach ($food as $item) {
                if ($item['timeeating'] == $timeeating) {
                    $mealItems .= $item['dish_name'] . "<br>";
                }
            }

            echo "<div class='first-text'>$mealItems</div>";
        }

        function printMealFooter()
        {
            echo "<div class='second-text'>";
            echo "<svg width='11' height='13' viewBox='0 0 11 13' fill='none' xmlns='http://www.w3.org/2000/svg'>";
            // Вставьте ваш путь SVG здесь
            echo "</svg>";
            echo "<h6 class='span'> k/day </h6>";
            echo "<svg width='14' height='14' viewBox='0 0 14 14' fill='none' xmlns='http://www.w3.org/2000/svg'>";
            // Вставьте ваш путь SVG здесь
            echo "</svg>";
            echo "<h6 class='span'> k/day </h6>";
            echo "</div>"; // Закрываем второй текст
            echo "</div>"; // Закрываем блок "more"


        }

        function printMoreLink($row, $link)
        {
            echo "<div class='more'>";
            $ids=$row;
            echo "<a   onclick='handleFruitClick(<?php echo $ids; ?>)' href='$link'>";
            echo '<img src="assets/images/print-food-plan/threedots.png" alt="">';
            // Вставьте ваш путь SVG здесь

            echo "</a>";
            echo "</div>"; // Закрываем блок "more"
        }

        // Основной код
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            // Пример использования функций
            if ($row['type'] == 'Vegetarian Vegan') {
                if ($row['timeeating'] == 'Breakfast') {
                    printMealInfo($row['timeeating'], '350', 'assets/images/print-food-plan/Rectangle 5.png');
                    printMealItems($food, 'Breakfast');
                    printMealFooter();
                    printMoreLink($row['id'],$row['id']);
                    echo "</div>"; // Закрываем блок "second-flex-item"

                    // $id;
                } elseif ($row['timeeating'] == 'Lunch') {
                    printMealInfo($row['timeeating'], '350', 'assets/images/print-food-plan/Rectangle 7.png');
                    printMealItems($food, 'Lunch');
                    printMealFooter();
                    printMoreLink($row['id'],$row['id']);
                    echo "</div>"; // Закрываем блок "second-flex-item"
                    ;
                } elseif ($row['timeeating'] == 'Dinner') {
                    printMealInfo($row['timeeating'], '350', 'assets/images/print-food-plan/Rectangle 6.png');
                    printMealItems($food, 'Dinner');
                    printMealFooter();
                    printMoreLink($row['id'],$row['id']);
                    echo "</div>"; // Закрываем блок "second-flex-item"
                     
                    // $id = $row['id'];
                }
            }
        }

        ?>










    </div>
    <div id="zatemnenie">
        <div id="okno">
            <?
            $sql = "SELECT * FROM food WHERE id = '$id'"; // Используйте одинарные кавычки вокруг имени таблицы
            $result = $connection->query($sql);
            echo $sql . " / ";
            ?>
            <a href="#" class="close">Закрыть окно</a>
        </div>
    </div>


    <div class="end"></div>
<script>
    // JavaScript функция для обработки нажатия на фрукт
function handleFruitClick(fruitId) {
    // Отправляем AJAX запрос на сервер для выполнения SQL-запроса
    fetch(`/getFruitData?id=${fruitId}`)
        .then(response => response.json())
        .then(data => {
            // Обрабатываем полученные данные (например, выводим информацию о фрукте на странице)
            console.log(data);
        })
        .catch(error => {
            console.error('Ошибка при получении данных о фрукте:', error);
        });
}

</script>
</body>

</html>