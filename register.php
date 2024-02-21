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
  <link href="assets/css/register.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>

  <?
  include 'app/include/header.php';
  ?>


  <main>
    <div class="container">
      <div class="text">
        <button type="button" class="back-btn"><img src="assets\images\back-icon.png" alt="Back"></button>
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

          <span style="display: inline-block; vertical-align: middle;">Register</span>
        </h1>
      </div>
      <div class="text1">
        <p>Already have an account? <a href="/signinemail.php">Log In</a></p>
      </div>
      <div class="form-floating">
        <p for="floatingInput"><?= $errMsgEmpty ?></p>
      </div>
      <form action="register.php" method="post">
        <div class="input-group">
          <input value='<?= $name ?>' name='name' type="text" id="Name" placeholder="Name" required>
        </div>
        <div class="input-group">
          <input value='<?= $surname ?>' name='surname' type="text" id="Username" placeholder="Surnname" required>

        </div>
        <div class="input-group">
          <input value='<?php echo $email ?>' name='email' type="email" id="Email" placeholder="Email" required>
        </div>
        <div class="input-group">
          <input name='passwordFir' type="password" id="Password" placeholder="Password" required>
        </div>
        <div class="input-group">
          <input name='passwordSec' type="password" id="Password" placeholder="re-Password" required>
        </div>
        <button type="submit" name='button-reg' class="continue-btn">Continue</button>
      </form>

    </div>
  </main>
  <?
  include 'app/include/footer.php';
  ?>


</body>

</html>