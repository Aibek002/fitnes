<?php
include './connectDB/user.php';
?>
<!DOCTYPE html>
<html lang="en">
<style>

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <?
    include './include/header.php';
    ?>


    <main>
        <div class="container">
            <div class="text">
                <button type="button" class="back-btn"><img src="back-icon.png" alt="Back"></button>
                <h1>Sign In</h1>
            </div>
            <div class="text1">
                <h3>Sign-in with your phone</h3>
                <p>The activation code will be sent via SMS</p>
            </div>
            <form action="#" method="post">
                <div class="input-group">
                    <select id="country-code">
                        <option value="+7">+7 (KZ)</option>
                        <option value="+1">+1 (USA)</option>
                        <option value="+44">+44 (UK)</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="tel" id="phone" placeholder="Phone Number" required>
                </div>
                <button type="submit" class="continue-btn">Continue</button>
            </form>
            <div class="alternative-sign-in">
                <p>Or</p>
                <button type="button" class="Signemail-btn">Sign in with email</button>
                <a href="#" class="social-link"><img src="facebook-icon.png" alt="Facebook"></a>
                <a href="#" class="social-link"><img src="google-icon.png" alt="Google"></a>
            </div>
        </div>
    </main>
    <?
    include './include/footer.php';
    ?>


</body>

</html>