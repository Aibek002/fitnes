<?php
session_start();
require './app/database/connectDB.php';
require './app/database/db.php';
require './path.php';

//echo 'dsd';

$selected = $_SESSION['select-type-food'];

$type = strtolower($selected);
$food = selectAll('food', ['type' => $type]);
$sql = "SELECT * FROM data_registration";
$stmt = $connection->query($sql);
$User = '';
$userInfo = selectOne('users_information_for_calculator', ['id_user' => $User]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (trim($_SESSION['name']) === trim($row['name']))
        $User = $row['id_user'];
}
$user = selectOne('data_registration', ['id_user' => $User]);


//calculator
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nutrition'])) {
    $sql = "SELECT * FROM users_information_for_calculator";
    $stmt = $connection->query($sql);
    $User = '';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $User = $row['id_user'];
    }
    // echo  'dsfd';
    //  prints($User . 'dd');
    // exit();
    if ($user['id_user'] === $User) {
        $params = [
            'goal'          => $_POST['goal-options'],
            'gender'        => $_POST['gender-options'],
            'height'        => trim($_POST['height']),
            'weight'        => trim($_POST['weight']),
            'age'           => trim($_POST['age']),
            'bodyfat'       => $_POST['bodyfat-options'], // Не уверен, нужна ли здесь функция trim
            'activityLevel' => $_POST['activateLevel']    // Не уверен, нужна ли здесь функция trim
        ];
        //print_r($params);
        $id = $user['id_user']; // Поправил на $id
        $goal = $params['goal'];
        $gender = $params['gender'];
        $height = $params['height'];
        $weights = $params['weight'];
        $age = $params['age'];
        $bodyfat = $params['bodyfat'];
        $activateLevel = $params['activateLevel'];
        $id = $_SESSION['id_user'];
        $sql = "UPDATE users_information_for_calculator SET goal = '$goal', gender = '$gender', height = '$height', weight = '$weights', age = '$age', bodyfat = '$bodyfat', activityLevel = '$activityLevel' WHERE id_user =' $id'";
        // echo $sql;
        $_SESSION['goaltext'] =  $params['goal'];
        $_SESSION['gender'] = $params['gender'];;
        $_SESSION['height'] = $params['height'];;
        $_SESSION['weight'] = $params['weight'];;
        $_SESSION['age'] = $params['age'];;
        $_SESSION['bodyfat'] = $params['bodyfat'];;
        $_SESSION['acivityLevel'] = $params['activityLevel'];;
        // exit();
        // Используем параметризированный запрос
        $query = $connection->prepare($sql);
        // Биндим значения к параметрам

        // Выполняем запрос
        $query->execute();
        dbCheckError($query);
        // echo $data['id_user'];
        // exit();
        // Добавляем код для редиректа пользователя
        header('Location: profile.php');
    } else {
        $goal = $_POST['goal-options'];
        $gender = $_POST['gender-options'];
        $height = trim($_POST['height']);
        $weight = trim($_POST['weight']);
        $age = trim($_POST['age']);
        $bodyfat = $_POST['bodyfat-options']; // Не уверен, нужна ли здесь функция trim
        $activateLevel = $_POST['activateLevel'];
        // echo $goal . "." . $gender . "." . $height . "." . $weight . " " . $age . " " . $bodyfat . " " . $set;

        if ($goal === '' || $gender === '' || $height === '' || $weight === '' || $age === '' || $bodyfat === '' || $activateLevel === '' || $set === '') {
            $errMsgEmpty = "Не все поля заполнены!";
            $_SESSION['err_msg'] = $errMsgEmpty;
        } else {
            $data_info = [
                'id_user' => $user['id_user'],
                'goal' => $goal,
                'gender' => $gender,
                'height' => $height,
                'weight' => $weight,
                'age' => $age,
                'bodyfat' => $bodyfat,
                'activityLevel' => $activateLevel,
                'setWeightGoal' => $bodyfat,
                'weightGoal' => $activateLevel,
                // 'weightChangeRate' => $set,





            ];
            if ($user['id_user'] == '') {
                header('location: login.php');
            } else {

                $id =  insert('users_information_for_calculator', $data_info);

                if ($id) {
                    $user = selectOne('users_information_for_calculator', ['id_user' => $id]);
                    header('location: profile.php');
                }
            }
        }
    }
}
// Проверяем, что это страница login.php
if (basename($_SERVER['PHP_SELF']) === 'login.php') {
    $_SESSION['err_msg'] = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $passFir = trim($_POST['passwordFir']);
    $passSec = trim($_POST['passwordSec']);

    if ($email === '' || $name === '' || $passFir === '') {
        // echo $email . " " . $name . " " . $surname . " " . $passFir;
        $errMsgEmpty = "Не все поля заполнены!";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } elseif (mb_strlen($name, 'UTF-8') < 2) {
        $errMsgEmpty = "Имя должно быть не менее 3 символов";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } elseif (mb_strlen($surname, 'UTF-8') < 2) {
        $errMsgEmpty = "Фамилия должна быть не менее 3 символов";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } elseif ($passFir !== $passSec) {
        $errMsgEmpty = "Пароли не совпадают";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } else {
        $request_data = selectOne('data_registration', ['email' => $email]);
        if ($request_data) {
            $errMsgEmpty = "Такой email уже существует!";
            $_SESSION['err_msg'] = $errMsgEmpty;
        } else {
            $pass = $passFir; // Хэшируем пароль
            $data_register = [
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'password' => $pass,
            ];
            $isSubmit = true;
            // print_r($data_register);
            // exit();





            // Генерируем случайное число от 1000 до 9999

                $id = insert('data_registration', $data_register);
                if ($id) {
                    $user = selectOne('data_registration', ['id_user' => $id]);
               //     header('location: Notification.php');
                }
        }
    }
} else {
    $name = '';
    $surname = '';
    $email = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

    // Здесь выполняется ваш код аутентификации и проверки пароля

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if ($email === '' || $pass === '') {

        $errMsgEmpty = "Не все поля заполнены!";
        $_SESSION['err_msg'] = $errMsgEmpty;
    } else {

        $user = selectOne('data_registration', ['email' => $email]);
        $userInfo = selectOne('users_information_for_calculator', ['id_user' => $user['id_user']]);
        // prints($userInfo . "dssd");
        $data = selectOne('users_information_for_calculator', ['id_user' => $user['id_user']]);

        // Сохраняем значение 'goal' в сессии
        $_SESSION['goaltext'] = $data['goal'];
        $_SESSION['gender'] = $data['gender'];
        $_SESSION['height'] = $data['height'];
        $_SESSION['weight'] = $data['weight'];
        $_SESSION['age'] = $data['age'];
        $_SESSION['bodyfat'] = $data['bodyfat'];
        $_SESSION['acivityLevel'] = $data['activityLevel'];
        $_SESSION['id_user'] = $data['id_user'];



        if (empty($userInfo)) {
            // echo $userInfo;
            if ($user['id_user'] == '') {
                $errMsgEmpty = 'логин или пароль не существует';
                $_SESSION['err_msg'] = $errMsgEmpty;
                header('location: login.php');
            } else {
                //     header('location: nutrition-calculator.php');
            }
        } else {
            // prints($userInfo);
            if (trim($user['email']) ===  $email && $pass == trim($storedHash)) {
                $_SESSION['id'] = $user['id_user'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['surname'] = $user['surname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['age'] = $user['age'];

                // echo  $_SESSION['id'] . '/';
                header('location: profile.php');
            } else {
                header('location: login.php');
            }

            // echo 'no data';
        }

        //prints($user);
        if ($user) {
            $storedHash = trim($user['password']);
            // Сравниваем введенный пароль с хешем из базы данных
            if ($pass == trim($storedHash)) {
                $_SESSION['id'] = $user['id_user'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['surname'] = $user['surname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['age'] = $data['age'];

                // echo 'ds' . $_SESSION['age'] . '/id';


                if (trim($user['email']) ===  $email && $pass ==  trim($storedHash) && trim($email) === trim('admin@gmail.com')) {
                    // echo '123';
                    header('location: admin_profile.php');
                } else {
                    header('location: profile.php');
                }
            } else {
                // echo $_POST['password'] . '/' . trim($user['password']);

                $errMsgEmpty = 'логин или пароль не правельный';
                $_SESSION['err_msg'] = $errMsgEmpty;
            }
        }
    }
} else {
    $email = '';
    $pass = '';
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['select-type'])) {
    $selectedOption = $_POST['select-type']; // Получаем выбранное значение из выпадающего списка
    $_SESSION['select-type-food']    = $selectedOption;

    // prints($_POST['name'] . "/");
    // exit();
    switch ($selectedOption) {
        case 'Anything':
            header('Location: anything.php');
            break;
        case 'Paleo':
            header('Location: paleo.php');
            break;
        case 'Vegetarian Vegan':
            header('Location: vegetarian.php');
            break;
        case 'Vegetarian Vegan':
            header('Location: vegan.php');
            break;
        case 'Ketogenic':
            header('Location: ketogenic.php');
            break;

        case 'Mediterranean':
            header('Location: ' . BASE_URL . 'mediterranean.php');
            break;
    }
}


$goal = $_SESSION['goaltext'];
$gender = $_SESSION['gender'];
$height = $_SESSION['height'];
$weight = $_SESSION['weight'];
$age = $_SESSION['age'];
$bodyfat = $_SESSION['bodyfat'];
$activateLevel = $_SESSION['acivityLevel'];

$bmr;
// Рассчитываем базовый метаболизм (BMR) в зависимости от пола
if (trim($gender) == "Male") {
    $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
    //  echo $bmr."svsvs";
} elseif (trim($gender) == "Female") {
    $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
}

// Учитываем уровень физической активности
switch (trim($activityLevel)) {
    case "Sedentary":
        $bmr *= 1.2;
        break;
    case "Lightly Active":
        $bmr *= 1.375;
        break;
    case "Moderately Active":
        $bmr *= 1.55;
        break;
    case "Very Active":
        $bmr *= 1.725;
        break;
    case "Extremely Active":
        $bmr *= 1.9;
        break;
}


// Рассчитываем количество калорий от каждого макронутриента
$carbsCalories = $bmr * 0.45; // 45% калорий от углеводов
$proteinCalories = $bmr * 0.3; // 30% калорий от белков
$fatCalories = $bmr * 0.25; // 25% калорий от жиров

// Преобразуем калории в граммы (1 г белка и углеводов = 4 калории, 1 г жира = 9 калорий)
$carbsGrams = $carbsCalories / 4;
$proteinGrams = $proteinCalories / 4;
$fatGrams = $fatCalories / 9;
$_SESSION['Carbohydrates'] = round($carbsGrams, 2);
$_SESSION['Protein'] = round($proteinGrams, 2);
$_SESSION['Fat'] = round($fatGrams, 2);
$_SESSION['dayKcall'] = round($bmr, 2);

// echo $_SESSION['Carbohydrates'] ."dsvsdvds";
$totalCaloriesPerDay = $bmr;
$totalCaloriesPerWeek = $totalCaloriesPerDay * 7;
$totalCaloriesPerMonth = $totalCaloriesPerDay * 30;

$_SESSION['totalCaloriesPerWeek'] = round($totalCaloriesPerWeek, 2);
$_SESSION['month'] = round($totalCaloriesPerMonth, 2);
