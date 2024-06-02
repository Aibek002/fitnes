<!--  -->
<?php 
require './app/controllers/source_user.php';

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
  <link href="assets/css/register.css" rel="stylesheet">
  <title>Document</title>
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
          <span class="register-title">Sign up</span>
        </h1>

        <div class="text1">
          <p>Already have an account? <a href="/login.php">Log In</a></p>
        </div>
      </div>


      <div class="form-floating">

        <p for="floatingInput"><?php echo $_SESSION['err_msg'] ?></p>
      </div>

      <form action="register.php" method="post">
        <div class="input-group">
          <p>Enter your first name</p>
          <input value='<?= $name ?>' name='name' type="text" id="Name" required>
        </div>
        <div class="input-group">
          <p>Enter your last name</p>
          <input value='<?= $surname ?>' name='surname' type="text" id="Username" required>

        </div>
        <div class="input-group">
          <p>Enter your email</p>
          <input value='<?php echo $email ?>' name='email' type="email" id="Email" required>
        </div>


        <!--  
        <div class="input-group">
          <input  name='code' type="number" id="code" placeholder="code" required>
        </div>
        ---->


        <div class="input-group">
          <p>Creater a password</p>
          <input name='passwordFir' type="password" id="Password" required>
        </div>
        <div class="input-group">
          <p>Confirm a password</p>
          <input name='passwordSec' type="password" id="Password" required>
        </div>
        <button type="submit" name='button-reg' class="continue-btn"><img src="assets\images\user.png">Create account</button>

      </form>


    </div>




  </main>
 

  <script src="./assets/js/goBack.js"></script>

</body>

</html>