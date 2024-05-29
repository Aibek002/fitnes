<?php
session_start();

include './app/database/connectDB.php';
include './app/database/db.php';
include './path.php';


if($_SESSION['email'] !== 'admin@gmail.com'){
    header('location: profile.php');
   
   }

function checkIfExists($tableName, $id)
{
    global $connection;
    $sql = "SELECT COUNT(*) FROM $tableName WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

// Проверяем, был ли передан параметр id в URL
if (isset($_GET['id'])) {
    // Получаем id продукта для редактирования
    $id = $_GET['id'];

    // Подготавливаем SQL-запрос для получения данных о продукте
    $sql = "SELECT * FROM ";

    // Определяем, из какой таблицы нужно получить данные о продукте
    if (checkIfExists('Food_Lose', $id)) {
        $sql .= "Food_Lose WHERE id = :id";
    } elseif (checkIfExists('Food_Replenish', $id)) {
        $sql .= "Food_Replenish WHERE id = :id";
    } elseif (checkIfExists('Food_Set_Of_Muscles', $id)) {
        $sql .= "Food_Set_Of_Muscles WHERE id = :id";
    } else {
        // Если не удалось определить таблицу, выводим ошибку
        echo 'Не удалось определить таблицу для получения данных о продукте.';
        exit; // Прерываем выполнение скрипта
    }

    $stmt = $connection->prepare($sql);

    // Привязываем параметры к подготовленному запросу
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Выполняем запрос
    if ($stmt->execute()) {
        // Получаем данные о продукте
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Обработка ошибки при получении данных
        echo 'Произошла ошибка при получении данных о продукте.';
        exit; // Прерываем выполнение скрипта
    }
} else {
    // В случае отсутствия id в URL
    echo 'Не передан идентификатор продукта для редактирования.';
    exit; // Прерываем выполнение скрипта
}

// Проверяем, была ли отправлена форма
// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = $_POST['name'];
    $type = $_POST['type'];
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];


    // Подготавливаем SQL-запрос для обновления данных о продукте
    $sql = "UPDATE ";

    // Определяем, в какую таблицу нужно обновить данные о продукте
    if (checkIfExists('Food_Lose', $id)) {
        $sql .= "Food_Lose SET name = '$name', type = '$type',  calories = '$calories', protein = '$protein' WHERE id =' $id'";
    } elseif (checkIfExists('Food_Replenish', $id)) {
        $sql .= "Food_Replenish SET  name = '$name', type = '$type',  calories = '$calories', protein = '$protein' WHERE id =' $id'";
    } elseif (checkIfExists('Food_Set_Of_Muscles', $id)) {
        $sql .= "Food_Set_Of_Muscles SET name = $name, type = $type,  calories = $calories,protein = $protein WHERE id = $id";
    } else {
        // Если не удалось определить таблицу, выводим ошибку
        echo 'Не удалось определить таблицу для обновления данных о продукте.';
        exit; // Прерываем выполнение скрипта
    }

    $stmt = $connection->prepare($sql);




    // Выполняем запрос
    if ($stmt->execute()) {
        // Успешное обновление данных
        echo 'Данные о продукте успешно обновлены.';
        // После обновления происходит перенаправление на страницу с подтверждением обновления или другую необходимую страницу
        // header('Location: /confirmation-page.php');
        exit; // Прерываем выполнение скрипта
    } else {
        // Обработка ошибки при обновлении данных
        echo 'Произошла ошибка при обновлении данных о продукте.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food</title>
    <style>
        form {
            width: 80%;
            margin: 150px 10%;
        }

        .input {
            border-radius: 10px;
            width: 100%;
            height: 50px;
            padding: 0 0 0 20px;
            font-family: var(--font3);
            font-weight: 400;
            font-size: 16px;
            line-height: 150%;
            color: rgba(0, 0, 0, 0.5);
            background: #f6f6f6;
        }

        label {
            font-family: var(--font3);
            font-weight: 600;
            font-size: 16px;
            line-height: 150%;
            color: #424242;
            margin: 5px 0;
        }

        .submit {
            width: 50%;
            height: 40px;
            margin: 20px 25%;
            background: #1f64ff;
            color: white;
            border-radius: 10px;
        }

        .flex-in {
            display: flex;
            gap: 10px;
        }

        .two {
            width: 50%;
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

        .logo {
            text-align: center;
            font-family: var(--font-family);
            font-weight: 700;
            font-size: 24px;
            line-height: 132%;
            letter-spacing: 0.02em;
            text-align: center;
            color: #000;
        }
    </style>
</head>

<body>

    <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>

    <script src="./assets/js/goBack.js"></script>

    <form method="post">
        <h1 class="logo">Edit recipe</h1>
        <label for="name">Name:</label>
        <input class="input" type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required><br><br>
        <label for="type">Type:</label>
        <input class="input" type="text" id="type" name="type" value="<?php echo $product['type']; ?>" required><br><br>
        <div class='flex-in'><label class='two' for="protein">Protein:</label> <label class='two' for="calories">Calories:</label></div>
        <div class='flex-in'>
            <input class="input" type="text" id="protein" name="protein" value="<?php echo $product['protein']; ?>" required><br><br>

            <input class="input" type="text" id="calories" name="calories" value="<?php echo $product['calories']; ?>" required><br><br>
        </div>
        <input class='submit' type="submit" value="Submit">
    </form>
    <?php
include './app/include/footer-admin.php'
?>
</body>

</html>