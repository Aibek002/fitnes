<?php
include './app/controllers/user.php';

// Проверяем, был ли отправлен запрос на обновление профиля
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_profile"])) {
    // Обработка данных и обновление профиля пользователя
    // Добавьте здесь код для обновления профиля, используя данные из $_POST
    // Например:
    // $name = $_POST['name'];
    // $surname = $_POST['surname'];
    // updateProfile($name, $surname); // Функция для обновления профиля
    // После успешного обновления профиля перенаправьте пользователя на страницу профиля
    // header("Location: profile.php");
    // exit();
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
        <div class="edit-profile">
            <div class="logo-user">
                <img src="assets\images\UserImage.png" alt="">
            </div>
            <div class="username">
                <p class="name"><?php echo $_SESSION['name'] . " " .  $_SESSION['surname'] ?> </p>
                <div class="edit-profiles"><a href="edit-profile.php">Edit Profile</a></div>
            </div>
            <a class='editSvg' href="edit-profile.php">
                <svg  width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 18.0024H3.75L14.81 6.94244L11.06 3.19244L0 14.2524V18.0024ZM2 15.0824L11.06 6.02244L11.98 6.94244L2.92 16.0024H2V15.0824ZM15.37 0.292444C15.2775 0.19974 15.1676 0.126193 15.0466 0.0760114C14.9257 0.02583 14.796 0 14.665 0C14.534 0 14.4043 0.02583 14.2834 0.0760114C14.1624 0.126193 14.0525 0.19974 13.96 0.292444L12.13 2.12244L15.88 5.87244L17.71 4.04244C17.8027 3.94993 17.8762 3.84004 17.9264 3.71907C17.9766 3.59809 18.0024 3.46841 18.0024 3.33744C18.0024 3.20648 17.9766 3.07679 17.9264 2.95582C17.8762 2.83485 17.8027 2.72496 17.71 2.63244L15.37 0.292444Z" fill="black" />
                </svg>
            </a>
        </div>
    </div>

    <div class="info-users">
        <form action="" method="post">
            <div class="GoalText">
                <label for="goal">I want to:</label>
                <input type="text" id="goal" name="goal" value="<?php echo $_SESSION['goaltext']; ?>">
            </div>
            <div class="height">
                <label for="height">Height:</label>
                <input type="text" id="height" name="height" value="<?php echo $_SESSION['height']; ?>">
            </div>
            <div class="weight">
                <label for="weight">Weight:</label>
                <input type="text" id="weight" name="weight" value="<?php echo $_SESSION['weight']; ?>">
            </div>
            <div class="gender">
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" value="<?php echo $_SESSION['gender']; ?>">
            </div>
            <div class="age">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" value="<?php echo $_SESSION['age']; ?>">
            </div>
            <div class="bodyfat">
                <label for="bodyfat">Body Fat:</label>
                <input type="text" id="bodyfat" name="bodyfat" value
