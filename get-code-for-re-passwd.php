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



<?
    include './app/include/header.php'
    ?>
<button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back" ></button>

  <main>
    <div class="container">
      <div class="text">
       <h1 class="register-logo">
          <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
            <mask id="mask0_111_120" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="23" height="20">
              <rect width="25.0799" height="10" transform="matrix(0.91707 0.398726 0 1 0 0)" fill="#D9D9D9" />
            </mask>
            <g mask="url(#mask0_111_120)">
              <rect width="25.0799" height="10" transform="matrix(0.91707 -0.398726 0 1 0 0)" fill="#1D3EB3" />
              <rect width="25.0799" height="25.0799" transform="matrix(0.91707 0.398726 -0.91707 0.398726 11.8477 4.54492)" fill="#FAC02B" />
            </g>
          </svg>

          <span class="get-code-title">Forgot password?</span>
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