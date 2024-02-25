<?php
include 'app/controllers/user.php';
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

    <?
    include 'app/include/header.php';
    ?>


    <main>
        <div class="container">
            <div class="text">
                <button type="button" class="back-btn"><img src="assets\images\vector.png"></button>

                <h1> <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                        <mask id="mask0_111_120" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="23" height="20">
                            <rect width="25.0799" height="10" transform="matrix(0.91707 0.398726 0 1 0 0)" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_111_120)">
                            <rect width="25.0799" height="10" transform="matrix(0.91707 -0.398726 0 1 0 0)" fill="#1D3EB3" />
                            <rect width="25.0799" height="25.0799" transform="matrix(0.91707 0.398726 -0.91707 0.398726 11.8477 4.54492)" fill="#FAC02B" />
                        </g>
                    </svg> <span style="display: inline-block; vertical-align: middle;">Log In</span></h1>

                    <div class="text1">
                        <p>Don't have an account? <a href="/register.php">Register </a></p>
                    </div>


                <div class="form-floating">
                    <p for="floatingInput"><?= $errMsgEmpty ?></p>
                </div>
            </div>
            
            <form action="login.php" method="post">

                <div class="input-group">
                    <p>Email or username</p>
                    <input name="email" type="email" id="Email"required>
                </div>
                <div class="input-group">
                    <p>Password </p>
                    <div class="password-container">
  <input type="password" id="password" class="password-input" placeholder="Enter your password">
</div>
                    
                </div>

                <script src="assets\js\check.js"></script>
                <div class="password">
                <input type="checkbox" id="checkButton">
                <label for="checkButton">Remember Me </label>
                <a href="/get-code-for-re-passwd.php" class="parallelText">Forgot Password ?</a>
                </div>
                <button name='button-re-passwd'  type="submit" class="continue-btn"><img src="assets\images\union-1.png">Continue</button>

            </form>

            <div class="or-text">Or</div>
        <div class="social-icons">
            <img src="assets\images\facebook.png" alt="Facebook" class="social-icon">
            <img src="assets\images\google.png" alt="Google" class="social-icon">
        </div>
        </div>
    </main>
    <?
    include 'app/include/footer.php';
    ?>


</body>

</html>