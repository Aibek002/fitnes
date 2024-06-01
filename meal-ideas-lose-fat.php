<?php
include './app/controllers/source_user.php';
session_start();
?>
<!DOCTYPE html>
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
            margin-top: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .row.list {
            border-radius: 15px;
            width: 397px;
            background: white;
            margin-bottom: 200px;


        }

        .col-md-6 {
            border-bottom: 2px solid #fff;
            /* White top border */
            width: 90%;
            /* 80% width */
            margin: 0 auto;
            /* Center the container */
            padding: 0 !important;
            text-align: end;
        }

        .food-item {
            display: flex;
            width: 100%;
        }

        .food-title {
            font-family: var(--font-family);
            font-weight: 500;
            font-size: 14px;
            color: #000;
            text-align: left;
        }

        .food-description {
            font-family: var(--second-family);
            font-weight: 500;
            font-size: 11px;
            color: gray;
            text-align: left;
            padding-left: 5px;
            margin: 0;
        }

        .text-flex {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            width: 100%;
        }

        .img-flex {
            padding: 20px 10px 0 0;

        }

        .back {
            border-radius: 100%;
            background-color: #1f64ff;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px 0 0 20px
        }

        .text-flex-item {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }
        .update-delete{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .update-delete a{
            margin: 0  0 0 5px ;
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
    <rect width="18" height="18" rx="3" fill="#FF7F55" />
    <path d="M3.375 12.9051V14.2499C3.375 14.3493 3.41451 14.4447 3.48484 14.5151C3.55516 14.5854 3.65054 14.6249 3.75 14.6249H5.09475C5.19401 14.6249 5.28922 14.5855 5.3595 14.5154L11.7345 8.14039L9.8595 6.26539L3.4845 12.6404C3.4144 12.7107 3.37502 12.8059 3.375 12.9051ZM11.3175 4.80739L13.1925 6.68239L14.0948 5.78014C14.2354 5.63949 14.3143 5.44876 14.3143 5.24989C14.3143 5.05101 14.2354 4.86028 14.0948 4.71964L13.2803 3.90514C13.1396 3.76453 12.9489 3.68555 12.75 3.68555C12.5511 3.68555 12.3604 3.76453 12.2198 3.90514L11.3175 4.80739Z" stroke="white" />
    </svg></a>
    <?
    include './app/include/header.php'
    ?>

     <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>

    <script src="./assets/js/goBack.js"></script>
    <div class="container">
        <h1 class="text-center mb-4">Lose Weight </h1>
        <div class="row list">
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
                    echo "<div class='text-flex'>";
                    echo '<p class="food-title">' . $row['name'] . '</p>';
                    echo "<div class='text-flex-item'>";
                    echo '<p class="food-description"><strong>Type: <br/> </strong> ' . $row['type'] . '</p>';
                    echo '<p class="food-description"><strong>Calories: <br/>  </strong> ' . $row['calories'] . ' kcal/day</p>';
                    echo '<p class="food-description"><strong>Protein: <br/> </strong> ' . $row['protein'] . ' g</p>';
                    if (trim($_SESSION['name']) == 'admin') {
                        echo '<div class="update-delete">';
                        echo ' <a href="admin_edit_food.php?id=' . $row['id'] . '"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="18" height="18" rx="3" fill="#FF7F55" />
                        <path d="M3.375 12.9051V14.2499C3.375 14.3493 3.41451 14.4447 3.48484 14.5151C3.55516 14.5854 3.65054 14.6249 3.75 14.6249H5.09475C5.19401 14.6249 5.28922 14.5855 5.3595 14.5154L11.7345 8.14039L9.8595 6.26539L3.4845 12.6404C3.4144 12.7107 3.37502 12.8059 3.375 12.9051ZM11.3175 4.80739L13.1925 6.68239L14.0948 5.78014C14.2354 5.63949 14.3143 5.44876 14.3143 5.24989C14.3143 5.05101 14.2354 4.86028 14.0948 4.71964L13.2803 3.90514C13.1396 3.76453 12.9489 3.68555 12.75 3.68555C12.5511 3.68555 12.3604 3.76453 12.2198 3.90514L11.3175 4.80739Z" stroke="white" />
                      </svg></a>';
                        echo  '<a style="color:white;" href="admin_delete_food.php?id=' . $row['id'] . '"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="18" height="18" rx="3" fill="#EE2B2B" />
                            <path d="M5.71125 15.0004C5.37625 15.0004 5.0905 14.8824 4.854 14.6464C4.618 14.4104 4.5 14.1246 4.5 13.7891V4.50035H3.75V3.75035H6.75V3.17285H11.25V3.75035H14.25V4.50035H13.5V13.7891C13.5 14.1341 13.3845 14.4221 13.1535 14.6531C12.922 14.8846 12.6337 15.0004 12.2887 15.0004H5.71125ZM12.75 4.50035H5.25V13.7891C5.25 13.9236 5.29325 14.0341 5.37975 14.1206C5.46625 14.2071 5.57675 14.2504 5.71125 14.2504H12.2887C12.4038 14.2504 12.5095 14.2024 12.606 14.1064C12.702 14.0099 12.75 13.9041 12.75 13.7891V4.50035ZM7.356 12.7504H8.106V6.00035H7.356V12.7504ZM9.894 12.7504H10.644V6.00035H9.894V12.7504Z" fill="white" />
                        </svg></a>';
                        echo '</div>';
                    }

                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                    echo "</div>";

                }
                echo '</div>';
            } else {
                // Если блюда не найдены
                echo '<div class="col"><p class="text-center">No food items found</p></div>';
            }
            ?>
        </div>
    </div>
    <?php
    if (trim($_SESSION['name']) != 'admin') {
        include './app/include/footer.php';
    }
    ?>
    <!-- Подключение Bootstrap JS (необходимо для работы некоторых компонентов Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>