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
  <link href="assets/css/register.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>

  <?
  include './include/header.php';
  ?>


  <main>
    <div class="container">
      <div class="text">
        <button type="button" class="back-btn"><img src="back-icon.png" width="100%" alt="Back"></button>
        <h1>Sign Up</h1>
      </div>
      <div class="text1">
        <h3>Sign up with Email</h3>
      </div>
      <div class="form-floating">
      <p for="floatingInput"><?=$errMsgEmpty?></p>
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
  include './include/footer.php';
  ?>


</body>

</html>