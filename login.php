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
    <title>login</title>
</head>

<body>

    <?
    include 'app/include/header.php';
    ?>


    <main>
        <div class="container">
            <div class="text">
                <button type="button" class="back-btn"><img src="assets\images\back-icon.png" width="100%" alt="Back"></button>

                <h1> <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                        <mask id="mask0_111_120" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="23" height="20">
                            <rect width="25.0799" height="10" transform="matrix(0.91707 0.398726 0 1 0 0)" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_111_120)">
                            <rect width="25.0799" height="10" transform="matrix(0.91707 -0.398726 0 1 0 0)" fill="#1D3EB3" />
                            <rect width="25.0799" height="25.0799" transform="matrix(0.91707 0.398726 -0.91707 0.398726 11.8477 4.54492)" fill="#FAC02B" />
                        </g>
                    </svg> <span style="display: inline-block; vertical-align: middle;">Login</span></h1>
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

                <div class="text1">
                    <hr style="width: 200px; background-color:aqua; height:2px">
                    <p>if you forgot your <a href="/re-password.php"> Password </a></p>
                </div>
            </form>

        </div>
    </main>
    <?
    include 'app/include/footer.php';
    ?>


</body>

</html>