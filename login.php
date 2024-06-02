<?php

require './app/controllers/source_user.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<style>

</style>

<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>login</title>
</head>

<body>

    <main>
        <button type="button" class="back-btn" onclick="goBack()"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M3 15L11 7M3 15L11 23M3 15H28" stroke="#79A2FF" stroke-width="2" />
</svg></button>
       

        <div class="container">
            <div class="text">
                <h1> <img src="./assets/images/logoType.png" alt="">
                    <span class="login-title">Sign in</span>
                </h1>
                <div class="text1">
                    <p>Don't have an account? <a href="/register.php"> Sign up</a></p>
                </div>
                <div class="form-floating">
                    <p class="errMsg" for="floatingInput"><?php echo  $_SESSION['err_msg'] ?></p>
                </div>
            </div>


            <form action="login.php" method="post">
                <div class="input-group">
                    <p>Email</p>
                    <input name="email" type="email" id="Email" placeholder="Enter your email">
                </div>
                <div class="input-group">
                    <p>Password </p>
                    <div class="password-container">
                        <input name='password' type="password" id="password" class="password-input" placeholder="Enter your password">
                    </div>
                </div>

                <!--                <script src="assets\js\check.js"></script> -->
                <div class="password">
                  
                    <a href="/get-code-for-re-passwd.php" class="parallelText">Forgot Password ?</a>
                </div>
                <button name='button-log' type="submit" class="continue-btn"><img src="assets\images\union-1.png">Log In</button>

            </form>
            <!--
            <div class="or-text">Or</div>
            <div class="social-icons">
                <img src="assets\images\facebook.png" alt="Facebook" class="social-icon">
                <img src="assets\images\google.png" alt="Google" class="social-icon">
            </div>
-->
        </div>
    </main>
<p class="footer-text">© 2024 FitMe.</p>
    <script src="./assets/js/goBack.js"></script>
    
</body>

</html>
