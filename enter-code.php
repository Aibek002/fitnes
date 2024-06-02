<?php
include 'app/controllers/source_user.php';
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
  <link href="assets/css/enterCode.css" rel="stylesheet">
  <title>Submit Code for New Password</title>
</head>

<body>

  <button type="button" class="back-btn" onclick='goBack()'><svg width="45" height="30" viewBox="0 0 45 30" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M39.3742 14.9995C39.3742 15.2482 39.226 15.4866 38.9623 15.6625C38.6985 15.8383 38.3409 15.937 37.9679 15.937H10.4247L20.6816 22.7738C20.8122 22.8609 20.9159 22.9643 20.9866 23.0781C21.0573 23.1919 21.0937 23.3139 21.0937 23.437C21.0937 23.5602 21.0573 23.6822 20.9866 23.796C20.9159 23.9098 20.8122 24.0132 20.6816 24.1003C20.5509 24.1874 20.3958 24.2565 20.2251 24.3037C20.0544 24.3508 19.8714 24.3751 19.6867 24.3751C19.5019 24.3751 19.3189 24.3508 19.1482 24.3037C18.9775 24.2565 18.8224 24.1874 18.6917 24.1003L6.03548 15.6628C5.90473 15.5758 5.80101 15.4724 5.73024 15.3586C5.65947 15.2447 5.62305 15.1227 5.62305 14.9995C5.62305 14.8763 5.65947 14.7543 5.73024 14.6405C5.80101 14.5267 5.90473 14.4233 6.03548 14.3363L18.6917 5.89876C18.9556 5.72285 19.3135 5.62402 19.6867 5.62402C20.0598 5.62402 20.4177 5.72285 20.6816 5.89876C20.9454 6.07468 21.0937 6.31327 21.0937 6.56204C21.0937 6.81082 20.9454 7.04941 20.6816 7.22533L10.4247 14.062H37.9679C38.3409 14.062 38.6985 14.1608 38.9623 14.3366C39.226 14.5124 39.3742 14.7509 39.3742 14.9995Z" fill="#79A2FF" />
</svg></button>


  <main>
    <div class="container">
      <div class="text">

        <form action='enter-code.php' method="post">
        <span style="display: inline-block; vertical-align: middle; font-size: 23px; font-weight: bold;">Submit Code </span>


      <div class="form-floating">
        <p for="floatingInput"><?php echo $errMsgEmpty ?></p>
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