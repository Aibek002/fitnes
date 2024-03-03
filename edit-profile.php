<?php
// Подключаем файл с функциями для работы с пользователем
include './app/controllers/user.php';

// Проверяем, была ли отправлена форма редактирования профиля
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit-profile"])) {
    // Обновляем данные в сессии на основе введенных пользователем значений
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['surname'] = $_POST['surname'];
    $_SESSION['goaltext'] = $_POST['goal'];
    $_SESSION['height'] = $_POST['height'];
    $_SESSION['weight'] = $_POST['weight'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['bodyfat'] = $_POST['bodyfat'];
    $_SESSION['acivityLevel'] = $_POST['activityLevel'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Edit Profile</title>
</head>

<body>

    <div class="containers">
        <?php if (isset($_SESSION['name'])) : ?>
            <div class="edit-profile">
                <div class="logo-user">
                    <img src="assets\images\UserImage.png" alt="">
                </div>
                <div class="username">
                    <form action="" method="post">
                        <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" placeholder="Enter your name">
                        <input type="text" name="surname" value="<?php echo $_SESSION['surname']; ?>" placeholder="Enter your surname">
                        <input type="text" name="goal" value="<?php echo $_SESSION['goaltext']; ?>" placeholder="Enter your goal">
                        <!-- Добавьте остальные поля редактирования профиля здесь -->
                        <button type="submit" name="edit-profile">Save</button>
                    </form>
                </div>
            </div>
        <?php else : ?>
            <?php echo $_SESSION['name'] . " ."; ?>
            <a href="login.php">login</a>
        <?php endif ?>
    </div>

    <div class="info-users">
        <!-- Отобразите текущие данные профиля пользователя для просмотра и редактирования -->
    </div>

    <?php include './app/include/footer.php'; ?>
</body>

</html>
