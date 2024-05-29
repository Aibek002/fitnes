<?php
session_start();
require 'app/controllers/source_user.php';



if ($_SESSION['name'] == '') {
    header('location: login.php');
}

$data = selectOne('users_information_for_calculator', ['id_user' => $_SESSION['id_user']]);
$user_info = selectOne('data_registration', ['id_user' => $_SESSION['id_user']]);


if (trim($_SESSION['email']) == 'admin@gmail.com') {
    header('location: admin_profile.php');
} else {
    if ($data['age'] == '') {
        $_SESSION['errmsg'] = 'Please first write your health information!';
        header('location: nutrition-calculator.php');
    }
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
    <style>
        .second-item {
            display: flex;
            align-items: end;
            height: 90%;
            margin-right: 10px;
        }

        .info {
            font-family: var(--font8);
            font-weight: 800;
            font-size: 39px;
            letter-spacing: -0.02em;
            color: #000;
        }

        .info-gender {
            font-family: var(--font8);
            font-weight: 800;
            font-size: 20px;
            letter-spacing: -0.02em;
            color: #000;
        }

        .title-info {
            font-family: var(--font3);
            font-weight: 400;
            font-size: 16px;
            color: rgb(112 105 105 / 66%);
            margin-bottom: 0;
        }

        .info span {
            font-family: var(--font3);
            font-weight: 400;
            font-size: 16px;
            color: rgb(114 108 108 / 83%);
            margin-bottom: 0;
            text-align: center;
        }

        .age,
        .height,
        .weight,
        .gender {
            display: flex;
            width: 40%;
            height: 103px;
            margin: 10px;
            border-radius: 20px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
            background: white;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .activatyLevel,
        .bodyfat {
            display: flex;
            align-items: center;
            margin: 10px;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            justify-content: space-between;
            width: 90%;
            height: 85px;
            background: white;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .title-info-long {
            font-family: var(--font3);
            font-weight: 400;
            font-size: 16px;
            color: rgb(82 79 79 / 80%);
            margin-bottom: 0;
            text-align: center;
        }

        .info-long {
            font-family: var(--font3);
            font-weight: 800;
            font-size: 24px;
            letter-spacing: -0.02em;
            color: #000000;
            text-align: center;
        }

        .firsts-item,
        .seconds-item,
        .thirds-item,
        .fourths-item {
            width: 48%;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            padding: 20px;
            margin: 1%;
            background: white;
            background-position: center;
            background-repeat: no-repeat;
        }

        .infos,
        .infoss {
            font-family: var(--font8);
            font-weight: 700;
            font-size: 36px;
            letter-spacing: -0.02em;
            color: #000000;
        }

        .infos span,
        .infoss span {
            font-family: var(--font3);
            font-weight: 400;
            font-size: 16px;
            letter-spacing: -0.02em;
            text-align: center;
            color: rgb(62 60 60 / 50%);
        }

        .edit-profile {
            display: flex;
            align-items: center;
            border: 1.5px solid #827e7e;
            padding: 10px 20px;
            height: 100px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
            margin: 20px;
            border-radius: 20px;
            background: #3a3af6;
        }

        .username p {
            font-family: var(--third-family);
            font-weight: 700;
            font-size: 100%;
            margin-bottom: 5%;
            line-height: 79%;
            color: #fff;
        }
    </style>
    <title>Profile</title>
</head>

<body>

    <div class="containers">

        <?php if (isset($_SESSION['name'])) : ?>
       
        <?php else : ?>
            <?php echo $_SESSION['name'] . " ."; ?>
            <a href="login.php">login</a>
        <?php endif ?>
    </div>



    <?php include './app/include/footer.php' ?>
</body>

</html>