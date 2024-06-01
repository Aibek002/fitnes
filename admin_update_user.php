<?php
// Подключение к базе данных
session_start();
include './app/database/connectDB.php';
include './app/database/db.php';
include './path.php';


// Проверяем, был ли передан параметр id в URL
if (isset($_GET['id'])) {
    // Получаем id пользователя для изменения
    $id = $_GET['id'];

    // Подготавливаем SQL-запрос для получения данных пользователя
    $sql = "SELECT * FROM data_registration WHERE id_user = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo 'Пользователь не найден.';
        exit; // Прерываем выполнение скрипта
    }
} else {
    // В случае отсутствия id в URL
    echo 'Не передан идентификатор пользователя для обновления данных.';
    exit; // Прерываем выполнение скрипта
}

// Обработка отправленной формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $parram = [
        'name' => $name,
        'surname' => $surname,
        'password' => $password,
        'email' => $email,

    ];

    // Подготавливаем SQL-запрос для обновления данных
    $sqlUpdate = "UPDATE data_registration SET name = :name, surname = :surname, email = :email, password = :password WHERE id_user = :id";
    update('data_registration', $id, $parram);

    header('location:' .  '/admin-user-edit.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<style>
    .logo {
        font-family: var(--font-family);
        font-weight: 600;
        font-size: 22px;
        color: #000;
        margin: 10px 0px 10px 20px;
    }

    form {
        width: 80%;
        margin: 0 0 0 10%;

    }

    input {
        width: 100%;
        border: 1px solid #d8dadc;
        border-radius: 10px;
        /* width: px; */
        height: 56px;
    }

    .conteiner {
        margin: 120px 0 0 0;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        margin-left: 5px;
        background: white;
    }

    .mb-4 span {
        font-family: var(--font-family);
        font-weight: 600;
        font-size: 22px;
        color: #000;
        margin: 4px 6px 11px 0;
    }

    .mb-4 {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .submit {
        background: #0095ff;
        color: white;
    }
</style>

<body>
    <script src="./assets/js/goBack.js"></script>
    <div class="conteiner">
        <h1 class="mb-4"><button onclick="goBack()" style="margin-bottom: 5px;" type="button" class="btn"><svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.35116 8L9.21687 14.2225L7.54129 16L0 8L7.54129 0L9.21687 1.7775L3.35116 8Z" fill="black"></path>
                </svg></button><span>Update user</span> <svg style=" margin-top: -7px;" width="29" height="21" viewBox="0 0 29 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.21916 2.625C6.92851 2.625 5.07157 4.32259 5.07157 6.41667C5.07157 8.51074 6.92853 10.2083 9.21919 10.2083C11.5098 10.2083 13.3667 8.51076 13.3667 6.41667C13.3667 4.32259 11.5098 2.625 9.21916 2.625ZM13.8758 11.218C15.3249 10.0425 16.2382 8.32708 16.2382 6.41667C16.2382 2.87284 13.0956 0 9.21916 0C5.34267 0 2.20016 2.87284 2.20016 6.41667C2.20016 8.32709 3.11342 10.0425 4.56259 11.218C3.58232 11.6684 2.67755 12.2622 1.88722 12.9847C1.53672 13.3051 1.21385 13.6462 0.920057 14.0048C0.261603 14.8084 -0.0484599 15.7041 0.00613768 16.608C0.0598964 17.498 0.460353 18.2948 1.03285 18.9381C2.15944 20.204 4.04842 21 6.02874 21L12.4096 21C14.39 21 16.2789 20.204 17.4055 18.9381C17.978 18.2948 18.3785 17.498 18.4322 16.608C18.4868 15.7041 18.1768 14.8084 17.5183 14.0048C17.2245 13.6462 16.9017 13.3051 16.5512 12.9847C15.7608 12.2622 14.856 11.6684 13.8758 11.218ZM9.21919 12.8333C7.23071 12.8333 5.32368 13.5555 3.91761 14.8409C3.66408 15.0726 3.43063 15.3193 3.21825 15.5785C2.92599 15.9352 2.85919 16.2316 2.87318 16.4633C2.88801 16.7088 3.0016 16.9909 3.26021 17.2815C3.79586 17.8834 4.83738 18.375 6.02874 18.375L12.4096 18.375C13.601 18.375 14.6425 17.8834 15.1782 17.2815C15.4368 16.9909 15.5504 16.7088 15.5652 16.4633C15.5792 16.2316 15.5124 15.9352 15.2201 15.5785C15.0077 15.3193 14.7743 15.0726 14.5208 14.8409C13.1147 13.5555 11.2077 12.8333 9.21919 12.8333ZM18.9501 7.875C18.9501 7.15013 19.5929 6.5625 20.3858 6.5625H27.5643C28.3572 6.5625 29 7.15013 29 7.875C29 8.59988 28.3572 9.1875 27.5643 9.1875H20.3858C19.5929 9.1875 18.9501 8.59988 18.9501 7.875ZM20.3858 13.125C20.3858 12.4001 21.0286 11.8125 21.8215 11.8125H27.5643C28.3572 11.8125 29 12.4001 29 13.125C29 13.8499 28.3572 14.4375 27.5643 14.4375H21.8215C21.0286 14.4375 20.3858 13.8499 20.3858 13.125Z" fill="black"></path>
            </svg></h1>
        <form action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="Name" name="name" value="<?php echo $user['name']; ?>"><br><br>

            <label for="surname">Surname:</label>
            <input type="text" id="Username" name="surname" value="<?php echo $user['surname']; ?>"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="Email" name="email" value="<?php echo "  " . $user['email'] ?>"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="Password" name="password" value="<?php echo trim($user['password'])?>"><br><br>

            <input class='submit' type="submit" value="Update">
        </form>
    </div>
    <?php
include './app/include/footer-admin.php'
?>
</body>

</html>