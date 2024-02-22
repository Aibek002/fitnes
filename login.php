<?php
include 'app/controllers/user.php';
?>
<!DOCTYPE html>
<html lang="en">
<style>

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/register.css">
    <title>Document</title>
</head>

<body>

    <?
    include 'app/include/header.php';
    ?>


    <main>
        <div class="container">
            <div class="text">
                <button type="button" class="back-btn"><img src="assets\images\back-icon.png" width="100%" alt="Back"></button>
                <h1>Sign Up</h1>
                <div class="form-floating">
                <p for="floatingInput"><?= $errMsgEmpty ?></p>
            </div>
            </div>
            <div class="text1">
                <h3>Sign in with Email</h3>
            </div>
            <form action="login.php" method="post">
                
                <div class="input-group">
                    <input name="email" type="email" id="Email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input name='password' type="password" id="Password" placeholder="Password" required>
                </div>
                <button name='button-log' type="submit" class="continue-btn">Continue</button>
            </form>
            
        </div>
    </main>
    <?
    include 'app/include/footer.php';
    ?>


</body>

</html>