<?php
session_start();
// Подключение к базе данных
include 'app/database/connectDB.php';
include 'app/database/db.php';


// SQL-запрос для выборки данных из таблицы users_information_for_calculator по ID пользователя
$userData=selectOne('users_information_for_calculator',['id_user'=>$_SESSION['id_user']]);
// Проверка наличия данных
if ($userData) {

    $weight = $userData['weight'];
    $height = $userData['height'];
    $age = $userData['age'];
    $gender = $userData['gender'];
    $activity_level = $userData['activityLevel'];
    $goal = $userData['goal'];


    $command = [
        '/usr/bin/python3', // Путь к Python-интерпретатору
        'ml/ml.py', // Путь к Python-скрипту
        $weight,
        $height,
        $age,
        trim($gender),
        trim($activity_level),
        trim($goal)
    ];
    print_r($command);
    // echo $userData['proteinGrams'] . 'fdsfsdfs';
    // Экранирование аргументов командной строки
    // $escaped_command = array_map('escapeshellarg', $command);

    // // Вызов Python-скрипта с передачей параметров
    // $output = shell_exec(implode(' ', $escaped_command));

   
    header('location: print.php');
    //     // Вывод данных на экран
    //     echo "ID пользователя: {$userData['id_user']} <br>";

} else {
    echo "Данные пользователя не найдены.";
}
?>
