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
  <title>Get Code for Re Password</title>
</head>

<body>

  <?
  include 'app/include/header.php';
  ?>


  <main>
    <div class="container">
      <div class="text">
        <button type="button" class="back-btn"><img src="assets\images\back.png" alt="Back"></button>
<!--        <h1 class="register-logo">
          <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
            <mask id="mask0_111_120" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="23" height="20">
              <rect width="25.0799" height="10" transform="matrix(0.91707 0.398726 0 1 0 0)" fill="#D9D9D9" />
            </mask>
            <g mask="url(#mask0_111_120)">
              <rect width="25.0799" height="10" transform="matrix(0.91707 -0.398726 0 1 0 0)" fill="#1D3EB3" />
              <rect width="25.0799" height="25.0799" transform="matrix(0.91707 0.398726 -0.91707 0.398726 11.8477 4.54492)" fill="#FAC02B" />
            </g>
          </svg>
-->

          <span style="display: inline-block; vertical-align: middle; font-size: 23px; font-weight: bold;">Sign In</span>
        </h1>
      </div>
      <div class="text1">
        <p class="p1">Enter code from Email</p>
        <p class="p2">Enter sent code to your email example@.com</p>
      </div>
      <div class="form-floating">
        <p for="floatingInput"><?= $errMsgEmpty ?></p>
      </div>

      
            <div id="codeInput">
                <input type="text" maxlength="1" id="digit1" oninput="focusNext(this)">
                <input type="text" maxlength="1" id="digit2" oninput="focusNext(this)">
                <input type="text" maxlength="1" id="digit3" oninput="focusNext(this)">
                <input type="text" maxlength="1" id="digit4" oninput="submitCode()">
            </div>
        <button type="submit" name='re-password-code' class="continue-btn">Get Code</button>
      </form>

    </div>
  </main>
  <?
  include 'app/include/footer.php';
  ?>

<script>
  function focusNext(current) {
    if (current.value.length === current.maxLength) {
      var next = current.nextElementSibling;
      if (next == null) return;
      next.focus();
    }
  }

  function submitCode() {
    var code = document.getElementById("digit1").value +
               document.getElementById("digit2").value +
               document.getElementById("digit3").value +
               document.getElementById("digit4").value;
    console.log("Entered code:", code);
    if (code === "1234") {
      window.location.href = "success.html";
    } else {
      alert("Invalid code. Please try again.");
    }
  }
</script>

</body>
</html>