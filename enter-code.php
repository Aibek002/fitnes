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
  <link href="assets/css/re-password.css" rel="stylesheet">
  <title>Submit Code for New Password</title>
</head>

<body>

  
<button type="button" class="back-btn"><img src="assets\images\back.png" alt="Back"></button>


  <main>
    <div class="container">
      <div class="text">
      
        <form action='enter-code.php' method="post">
          <span style="display: inline-block; vertical-align: middle; font-size: 23px; font-weight: bold;">Submit Code </span>
      </div>

      <div class="form-floating">
        <p for="floatingInput"><?= $errMsgEmpty ?></p>
      </div>


      <div id="codeInput">

        <input name='firstnumber' type="text" maxlength="1" id="digit1">
        <input name='secondnumber' type="text" maxlength="1" id="digit2">
        <input name='thirdnumber' type="text" maxlength="1" id="digit3">
        <input name='fourthnumber' type="text" maxlength="1" id="digit4">
      </div>
      <button type="submit" name='enter-code' class="continue-btn">Submit Code</button>
      </form>

    </div>
  </main>


  <script src="./assets/js/goBack.js"></script>

</body>

</html>