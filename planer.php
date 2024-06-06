<?php
session_start();

include './app/controllers/source_user.php';
include './app/database/connectDB.php';

if ($_SESSION['name'] == '') {
    header('location: /');
}
$data = selectOne('users_information_for_calculator', ['id_user' => $_SESSION['id_user']]);
$user_info = selectOne('data_registration', ['id_user' => $_SESSION['id_user']]);
if ($data['age'] == '') {
    $_SESSION['errmsg'] = 'Please first write your health information!';
    header('location: nutrition-calculator.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/planer.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .flex-cont {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding-bottom: 10px;
        }

        .flex-a {
            display: block;
            justify-content: baseline;
        }

        .subtitle {
            line-height: 13px;
        }

        .date-box {
            align-items: center !important;
            justify-content: space-between !important;
            width: 90% !important;

        }

        .date-box div {
            display: flex;
        }

        /* Popup container - can be anything you want */
        .modal {
            position: fixed;
            width: 100%;
            height: 100vh;
            left: 0;
            top: 0;
            background: rgba(0, 0, 0, .3);
            display: grid;
            justify-content: center;
            align-items: center;
            overflow-y: auto;
            visibility: hidden;
            opacity: 0;

            transition: opacity .4s, visibility .4s;
            z-index: 9999;

        }

        .modal__box {
            width: 80%;
            padding: 40px;
            margin: 0 10%;
            z-index: 1;
            background: white;
            box-shadow: 20px 10px 26px -5px rgba(0, 0, 0, 0.42);
            transform: scale(0);

            transition: transform .8s;

        }

        .modal.open {
            visibility: visible;
            opacity: 1;
        }

        .modal.open .modal__box {
            transform: scale(1);
        }

        #close {
            border: 0;
            border-color: white;
            background: white;
            margin: 0 0% 10% 90%;
        }
    </style>
    <title>Planer</title>
</head>

<body>

    <p class="date">

        <?php echo date('M, Y'); ?>
    </p>
    </p>
    <div class="container text-center">
        <div class="row">
            <?php
            if ($_SESSION['name'] == '') {
                header('Location: /');
                exit;
            }

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
                echo '<a href="meal-ideas-for-month.php?day=' . $day . '" class="col ' . $class . '">' . $day . ' <strong>' . date('d', strtotime('this week +' . array_search($day, $daysOfWeek) . ' days')) . '</strong></a>';
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

                    <div class="date-box">


                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.0332 3.73112L8.49987 0.533203L15.9665 3.73112M1.0332 3.73112L8.49987 6.92904M1.0332 3.73112V3.7332M15.9665 3.73112L8.49987 6.92904M15.9665 3.73112V12.2665L8.49987 15.4665M15.9665 3.73112L8.49987 6.9332V15.4665M8.49987 6.92904V15.4665M8.49987 6.92904L1.0332 3.7332M8.49987 15.4665L1.0332 12.2665V3.7332" stroke="#26BFBF" stroke-linejoin="round" />
                        </svg>
                        <p>10:30 AM - 11:30 PM</p>


                    </div>
                    <?php
                    include './app/database/connectDB.php';


                    $id = $_SESSION['id_user'];
                    $goal = trim($_SESSION['goaltext']);

                    $sql = "SELECT * FROM users_information_for_calculator WHERE id_user = $id AND goal = '$goal' ";

                    $stmt = $conn->query($sql);

                    if (!$stmt) {
                        echo "Ошибка выполнения запроса: " . $conn->errorInfo()[2];
                    } else {
                        $foodSql = "SELECT * FROM Food_Lose WHERE type = 'Завтрак'  LIMIT 1";
                        $foodStmt = $conn->query($foodSql);
                        while ($row = $foodStmt->fetch(PDO::FETCH_ASSOC)) {

                            echo '<p class="title"> B</p>';
                            echo '<p class="subtitle">' .  '</br>' . $row['name'] . '</p>';
                            echo '<a href="planer.php?id=' . $row['id'] . '"><button class="btn" id="open-modal">
                            <div class="flex-cont"><p class="subtitles">' .  'gramm : '  . $row['protein'] . '</p>';
                            echo '<p class="subtitles">' .  'carbohydrate : '  . $row['Carbohydrate_Content'] . '</p>';
                            echo '<p class="subtitles">' .  'calories : '  . $row['calories'] . '</p></div>    </button></a>';
                        }
                    }


                    ?>


                </div>
                <div class="second-box">
                    <div class="date-box">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.0332 3.73112L8.49987 0.533203L15.9665 3.73112M1.0332 3.73112L8.49987 6.92904M1.0332 3.73112V3.7332M15.9665 3.73112L8.49987 6.92904M15.9665 3.73112V12.2665L8.49987 15.4665M15.9665 3.73112L8.49987 6.9332V15.4665M8.49987 6.92904V15.4665M8.49987 6.92904L1.0332 3.7332M8.49987 15.4665L1.0332 12.2665V3.7332" stroke="#89AFFF" stroke-linejoin="round" />
                        </svg>
                        <p>12:30 AM - 13:30 PM</p>
                    </div>
                    <?php
                    $sql = "SELECT * FROM users_information_for_calculator WHERE id_user = $id AND goal = '$goal' ";
                    $stmt = $conn->query($sql);
                    if (!$stmt) {
                        echo "Ошибка выполнения запроса: " . $conn->errorInfo()[2];
                    } else {
                        $foodSql = "SELECT * FROM Food_Lose WHERE type = 'Обед'  LIMIT 1";
                        $foodStmt = $conn->query($foodSql);
                        while ($row = $foodStmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<p class="title">' . $row['type'] . '</p>';
                            echo '<p class="subtitle">' .  '</br>' . $row['name'] . '</p>';
                            echo '<a href="planer.php?id=' . $row['id'] . '"><button class="btn" id="open-modal">
                            <div class="flex-cont"><p class="subtitles">' .  'gramm : '  . $row['protein'] . '</p>';
                            echo '<p class="subtitles">' .  'carbohydrate : '  . $row['Carbohydrate_Content'] . '</p>';
                            echo '<p class="subtitles">' .  'calories : '  . $row['calories'] . '</p></div>    </button></a>';
                        }
                    }

                    ?>
                </div>
                <div class="third-box">
                    <div class="date-box"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.0332 3.73112L8.49987 0.533203L15.9665 3.73112M1.0332 3.73112L8.49987 6.92904M1.0332 3.73112V3.7332M15.9665 3.73112L8.49987 6.92904M15.9665 3.73112V12.2665L8.49987 15.4665M15.9665 3.73112L8.49987 6.9332V15.4665M8.49987 6.92904V15.4665M8.49987 6.92904L1.0332 3.7332M8.49987 15.4665L1.0332 12.2665V3.7332" stroke="#FFB017" stroke-linejoin="round" />
                        </svg>
                        <p>16:30 AM - 18:30 PM</p>
                    </div>
                    <?php

                    $sql = "SELECT * FROM users_information_for_calculator WHERE id_user = $id AND goal = '$goal' ";
                    // echo $sql   ;

                    $stmt = $conn->query($sql);

                    if (!$stmt) {
                        echo "Ошибка выполнения запроса: " . $conn->errorInfo()[2];
                    } else {
                        $foodSql = "SELECT * FROM Food_Lose WHERE type = 'Ужин'  LIMIT 1";
                        $foodStmt = $conn->query($foodSql);
                        while ($row = $foodStmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<p class="title">' . $row['type'] . '</p>';
                            echo '<p class="subtitle">' .  '</br>' . $row['name'] . '</p>';
                            echo '<a href="planer.php?id=' . $row['id'] . '"><button class="btn" id="open-modal">
                            <div class="flex-cont"><p class="subtitles">' .  'gramm : '  . $row['protein'] . '</p>';
                            echo '<p class="subtitles">' .  'carbohydrate : '  . $row['Carbohydrate_Content'] . '</p>';
                            echo '<p class="subtitles">' .  'calories : '  . $row['calories'] . '</p></div>    </button></a>';
                        }
                    }

                    ?>
                </div>

            </div>
            <?php include './app/include/footer.php' ?>

            <div class="modal" id='modal'>
                <div class="modal__box">

                    <button id='close'><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.252721 0.275367C0.414748 0.113778 0.634384 0.023016 0.863382 0.023016C1.09238 0.023016 1.31202 0.113778 1.47404 0.275367L7.48848 6.28098L13.5029 0.275367C13.6085 0.161784 13.7429 0.0787509 13.8918 0.0350156C14.0407 -0.00871975 14.1987 -0.011538 14.3491 0.0268579C14.4995 0.0652538 14.6367 0.143443 14.7463 0.253186C14.8559 0.362929 14.9339 0.500163 14.972 0.65043C15.0105 0.800428 15.0078 0.958014 14.9642 1.10662C14.9206 1.25522 14.8377 1.38935 14.7242 1.4949L8.7098 7.50051L14.7242 13.5061C14.838 13.6116 14.9211 13.7457 14.9649 13.8944C15.0087 14.0431 15.0116 14.2009 14.9731 14.3511C14.9347 14.5012 14.8563 14.6383 14.7464 14.7477C14.6365 14.8572 14.4991 14.935 14.3486 14.973C14.1984 15.0115 14.0406 15.0088 13.8918 14.9653C13.7429 14.9217 13.6086 14.839 13.5029 14.7257L7.48848 8.72004L1.47404 14.7257C1.31013 14.878 1.09346 14.9609 0.869569 14.9571C0.645679 14.9532 0.432006 14.8628 0.273461 14.7049C0.115331 14.5466 0.0248198 14.3333 0.0209522 14.1097C0.0170846 13.8862 0.100161 13.6698 0.252721 13.5061L6.26715 7.50051L0.252721 1.4949C0.0908956 1.33311 0 1.1138 0 0.885132C0 0.65647 0.0908956 0.437156 0.252721 0.275367Z" fill="#868686" />
                        </svg></button>
                    <h2>More Information</h2>
                    <p>
                        <?php


                        $sql = "SELECT * FROM users_information_for_calculator WHERE id_user = $id AND goal = '$goal' ";
                        echo $sql   ;

                        $stmt = $conn->query($sql);

                        if (!$stmt) {
                            echo "Ошибка выполнения запроса: " . $conn->errorInfo()[2];
                        } else {
                            $id = $_GET['id'];
                            $foodSql = "SELECT * FROM Food_Lose WHERE id=$id ";
                            $foodStmt = $conn->query($foodSql);
                            while ($row = $foodStmt->fetch(PDO::FETCH_ASSOC)) {
                                echo $row['Recipe_Instructions'] . '</p>';
                            }
                        }
                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);
                        
                        ?>
                    <p></p>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('modal'); // Обращаемся к модальному окну
                const isOpen = localStorage.getItem('modalOpen'); // Проверяем значение ключа 'modalOpen'
                if (isOpen === 'true') {
                    modal.classList.add('open'); // Добавляем класс 'open' для отображения модального окна
                }
            });

            document.getElementById('open-modal').addEventListener('click', function() {
                const modal = document.getElementById('modal'); // Обращаемся к модальному окну
                modal.classList.add('open'); // Открываем модальное окно
                localStorage.setItem('modalOpen', 'true'); // Сохраняем состояние в localStorage
            });
            document.getElementById('close').addEventListener('click', function() {
                const modal = document.getElementById('modal'); // Обращаемся к модальному окну
                modal.classList.remove('open'); // Открываем модальное окно
                window.location.href = 'planer.php';

            });

            document.querySelector('#modal .modal__box').addEventListener('click', event => {
                event._isClickWithinModal = true;
            });
            document.getElementById('modal').addEventListener('click', event => {
                if (event._isClickWithinModal) return;
                event.currentTarget.classList.remove('open');
            });
        </script>

</body>

</html>