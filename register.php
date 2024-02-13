<?php 
include './connectDB/user.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
<body>
<?php 
  include './include/header.php'
  ?>
<main class="form-signin w-50 m-auto">
  <form action="register.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <div class="form-floating">
      <p for="floatingInput"><?=$errMsgEmpty?></p>
    </div>
    <div class="form-floating">
      <input name='name' type="text" class="form-control" id="floatingInput" placeholder="Alex">
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
      <input  name='surname' type="text" class="form-control" id="floatingInput" placeholder="Alexeeva">
      <label for="floatingInput">SurName</label>
    </div>
    <div class="form-floating">
      <input  name='email' type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input  name='passwordFir' type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">New Password</label>
    </div>
    <div class="form-floating">
      <input name='passwordSec' type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">re-Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
  </form>
</main>
</body>
</html>