<? include './app/controllers/user.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/planer.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Planer</title>
</head>

<body>
    <?
    include './app/include/header.php'
    ?>
    <p class="date">
        Feb 2024
    </p>
    <div class="container text-center">
        <div class="row">
            <?php
            // Определение текущего дня недели и формирование массива дней
            $currentDayOfWeek = date('N') - 1; // 1 - понедельник, ..., 7 - воскресенье
            $daysOfWeek = array();

            // Заполнение массива дней недели, начиная с текущего дня
            for ($i = 0; $i < 7; $i++) {
                $day = date('D', strtotime('this week +' . $i . ' days'));
                $daysOfWeek[] = $day;
            }

            // Отображение ячеек таблицы
            foreach ($daysOfWeek as $day) {
                $class = ($day == date('D')) ? 'today' : ''; // Добавляем класс 'today' для сегодняшнего дня
                echo '<div class="col ' . $class . '">' . $day . ' <strong>' . date('d', strtotime('this week +' . array_search($day, $daysOfWeek) . ' days')) . '</strong></div>';
            }
            ?>
        </div>
        <div class="flex-plan">
            <div class="first-flex">
                <p class="date-plan">
                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="4" cy="4" r="4" fill="#1F64FF" />
                    </svg>
                    <?php echo date('l, d M, Y'); ?>
                </p>
            </div>

            <div class="second-flex">
                <div class="first-box">
                    <div class="date-box"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.0332 3.73112L8.49987 0.533203L15.9665 3.73112M1.0332 3.73112L8.49987 6.92904M1.0332 3.73112V3.7332M15.9665 3.73112L8.49987 6.92904M15.9665 3.73112V12.2665L8.49987 15.4665M15.9665 3.73112L8.49987 6.9332V15.4665M8.49987 6.92904V15.4665M8.49987 6.92904L1.0332 3.7332M8.49987 15.4665L1.0332 12.2665V3.7332" stroke="#26BFBF" stroke-linejoin="round" />
                        </svg>
                        <p>10:30 AM - 11:30 PM</p>
                    </div>
                    <?php
                    // Подключение к базе данных
                    include './app/database/connectDB.php';

                    // Запрос к таблице users_information_for_calculator
                    $sql = "SELECT * FROM users_information_for_calculator WHERE goal = 'Lose Weight'";
                    $stmt = $connection->query($sql);
                    // Проверка наличия данных
                    if ($stmt->rowCount() > 0) {
                        // Если есть пользователи с целью "lose", выводим блюда из таблицы food_lose
                        $foodSql = "SELECT * FROM Food_Lose WHERE type = 'Завтрак'  LIMIT 1";
                        $foodStmt = $connection->query($foodSql);

                        // Проверка наличия блюд
                        if ($foodStmt->rowCount() > 0) {
                            // Выводим таблицу блюд
                            echo '<table>';
                            while ($row = $foodStmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<p class="title">' . $row['type'] . '</p>';
                                echo '<p class="subtitle">' .  '</br>' . $row['name'] . '</p>';
                                echo '<p class="subtitle">' .  'calories : '  . $row['calories'] . '</p>';
                            }
                            echo '</table>';
                        } else {
                            // Если блюда для завтрака не найдены
                            echo '<p>No breakfast found for "lose" goal</p>';
                        }
                    } else {
                        // Если пользователей с целью "lose" не найдено
                        echo '<p>No users found with "lose" goal</p>';
                    }
                    ?>


                </div>
                <div class="second-box">
                    <div class="date-box"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.0332 3.73112L8.49987 0.533203L15.9665 3.73112M1.0332 3.73112L8.49987 6.92904M1.0332 3.73112V3.7332M15.9665 3.73112L8.49987 6.92904M15.9665 3.73112V12.2665L8.49987 15.4665M15.9665 3.73112L8.49987 6.9332V15.4665M8.49987 6.92904V15.4665M8.49987 6.92904L1.0332 3.7332M8.49987 15.4665L1.0332 12.2665V3.7332" stroke="#89AFFF" stroke-linejoin="round" />
                        </svg>
                        <p>12:30 AM - 13:30 PM</p>
                    </div>
                    <?

                    // Запрос к таблице users_information_for_calculator
                    $sql = "SELECT * FROM users_information_for_calculator WHERE goal = 'Lose Weight'";
                    $stmt = $connection->query($sql);
                    // Проверка наличия данных
                    if ($stmt->rowCount() > 0) {
                        // Если есть пользователи с целью "lose", выводим блюда из таблицы food_lose
                        $foodSql = "SELECT * FROM Food_Lose WHERE type = 'Обед'  LIMIT 1";
                        $foodStmt = $connection->query($foodSql);

                        // Проверка наличия блюд
                        if ($foodStmt->rowCount() > 0) {
                            // Выводим таблицу блюд
                            echo '<table>';
                            while ($row = $foodStmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<p class="title">' . $row['type'] . '</p>';
                                echo '<p class="subtitle">' .  '</br>' . $row['name'] . '</p>';
                                echo '<p class="subtitle">' .  'calories : '  . $row['calories'] . '</p>';
                            }
                            echo '</table>';
                        } else {
                            // Если блюда для завтрака не найдены
                            echo '<p>No breakfast found for "lose" goal</p>';
                        }
                    } else {
                        // Если пользователей с целью "lose" не найдено
                        echo '<p>No users found with "lose" goal</p>';
                    }
                    ?>
                </div>
                <div class="third-box">
                    <div class="date-box"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.0332 3.73112L8.49987 0.533203L15.9665 3.73112M1.0332 3.73112L8.49987 6.92904M1.0332 3.73112V3.7332M15.9665 3.73112L8.49987 6.92904M15.9665 3.73112V12.2665L8.49987 15.4665M15.9665 3.73112L8.49987 6.9332V15.4665M8.49987 6.92904V15.4665M8.49987 6.92904L1.0332 3.7332M8.49987 15.4665L1.0332 12.2665V3.7332" stroke="#FFB017" stroke-linejoin="round" />
                        </svg>
                        <p>16:30 AM - 18:30 PM</p>
                    </div>
                    <?

                    // Запрос к таблице users_information_for_calculator
                    $sql = "SELECT * FROM users_information_for_calculator WHERE goal = 'Lose Weight'";
                    $stmt = $connection->query($sql);
                    // Проверка наличия данных
                    if ($stmt->rowCount() > 0) {
                        // Если есть пользователи с целью "lose", выводим блюда из таблицы food_lose
                        $foodSql = "SELECT * FROM Food_Lose WHERE type = 'Ужин'  LIMIT 1";
                        $foodStmt = $connection->query($foodSql);

                        // Проверка наличия блюд
                        if ($foodStmt->rowCount() > 0) {
                            // Выводим таблицу блюд
                            echo '<table>';
                            while ($row = $foodStmt->fetch(PDO::FETCH_ASSOC)) {

                                echo '<p class="title">' . $row['type'] . '</p>';
                                echo '<p class="subtitle">' .  '</br>' . $row['name'] . '</p>';
                                echo '<p class="subtitle">' .  'calories : '  . $row['calories'] . '</p>';
                            }
                            echo '</table>';
                        } else {
                            // Если блюда для завтрака не найдены
                            echo '<p>No breakfast found for "lose" goal</p>';
                        }
                    } else {
                        // Если пользователей с целью "lose" не найдено
                        echo '<p>No users found with "lose" goal</p>';
                    }
                    ?>
                </div>

            </div>
        </div>
        <? include './app/include/footer.php' ?>
</body>

</html>