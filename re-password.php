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
  <title>Re-Password</title>
</head>

<body>


<button type="button" class="back-btn"  onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>

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

          <span class="New-password-title">Re-Password</span>
        </h1>
      </div>
    
      <p class="subtitle">Enter your email </p>
      <p class="subtext">The activation code will be sent via Emil</p>
      <div class="form-floating">
        <p for="floatingInput"><?= $errMsgEmpty ?></p>
      </div>

      <form action="re-password.php" method="post">

      <div class="input-group">
        <input  name='code' type="int" id="code" placeholder="code" required>
        </div>
       
        <div class="input-group">
        <input  name='passw' type="password" id="password" placeholder="new password" required>
        </div>
        
        <div class="input-group">
        <input name='re-passw' type="password" id="password" placeholder="re-password" required>
        </div>
        <button type="submit" name='re-password' class="continue-btn">Submit</button>
      </form>

    </div>
  </main>
 

  <script src="./assets/js/goBack.js"></script>

</body>

</html>