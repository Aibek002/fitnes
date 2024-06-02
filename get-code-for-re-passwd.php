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
  <link href="assets/css/re-password.css" rel="stylesheet">
  <title>Get Code for Re Password</title>
</head>

<body>




<button type="button" class="back-btn" onclick="goBack()"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M3 15L11 7M3 15L11 23M3 15H28" stroke="#79A2FF" stroke-width="2" />
</svg></button>

  <main>
    <div class="container">
      <div class="text">
       <h1 class="register-logo">
       <img src="./assets/images/logoType.png" alt="">

          <span class="get-code-title">Get code</span>
        </h1>
      </div>
      <div class="text1">
        <p class="p1">Enter your email</p>
        <p class="p2">The activation code will be sent via Email</p>
      </div>
      <div class="form-floating">
        <p for="floatingInput"><?= $errMsgEmpty ?></p>
      </div>
      <form action="get-code-for-re-passwd.php" method="post">
        <div class="input-group">
          <input value='<?php echo $email ?>' name='email' type="email" id="Email"   placeholder="Email">
        </div>
        <button type="submit" name='get-code' class="continue-btn">Get Code</button>
      </form>

    </div>
  </main>

<script src="./assets/js/goBack.js"></script>

</body>

</html>