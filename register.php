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
                <h1>Sign Up</h1>
            </div>
            <div class="text1">
                <h3>Sign up with Email</h3>
            </div>
            <form action="#" method="post">
                <div class="input-group">
                    <input type="Name" id="Name" placeholder="Name" required>
                  </div>
                <div class="input-group">
                    <input type="Username" id="Username" placeholder="Username" required>
                    
                </div>
                <div class="input-group">
                    <input type="email" id="Email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" id="Password" placeholder="Password" required>
                </div>
                <button type="submit" class="continue-btn">Continue</button>
            </form>
            
        </div>
    </main>
    <?
    include './include/footer.php';
    ?>


</body>

</html>