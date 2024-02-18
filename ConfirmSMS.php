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
    <link rel="stylesheet" href="styles.css">
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
                <h3>Enter code from SMS</h3>
                <p>Enter sent code to your number</p>
            </div>
            <form action="#" method="post">
                <div class="input-group">
                  <div class="verification-code">
        <input type="text" id="digit1" maxlength="1" required>
        <input type="text" id="digit2" maxlength="1" required>
        <input type="text" id="digit3" maxlength="1" required>
        <input type="text" id="digit4" maxlength="1" required>
      </div>
                   </div>
                <button type="submit" class="continue-btn">Confirm button</button>
            </form>
            
        </div>
    </main>
    <?
    include './include/footer.php';
    ?>


</body>

</html>