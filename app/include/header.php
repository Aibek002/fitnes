<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      
      <span class="fs-4">FitMe</span>
    </a>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="/" class="nav-link ">Contact</a></li>
      <li class="nav-item"><a href="" class="nav-link">AboutUs</a></li>
      <li class="nav-item"><a href="/feedback.php" class="nav-link">Feedback</a></li>
      <li class="nav-item"><a href="" class="nav-link">FAQs</a></li>
      <?php if (isset($_SESSION['id'])) : ?>
        <li class="nav-item"><a href="#" class="nav-link"><?php echo $_SESSION['name']; ?></a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a></li>
      <?php else : ?>`
        <?php if ($_SERVER['REQUEST_URI'] === '/login.php') : ?>

          <li class="nav-item"><a href="<?php echo BASE_URL . 'register.php'; ?>" class="nav-link active">Sign up</a></li>
        <?php elseif ($_SERVER['REQUEST_URI'] === '/register.php') : ?>
          <hr />
          <li class="nav-item"><a href="<?php echo BASE_URL . 'login.php'; ?>" class="nav-link active">Sign in</a></li>
        <?php else : ?>
          <li class="nav-item"><a href="<?php echo BASE_URL . 'register.php'; ?>" class="nav-link active">Sign up</a></li>
          <hr />
          <li class="nav-item"><a href="<?php echo BASE_URL . 'login.php'; ?>" class="nav-link active">Sign in</a></li>

        <?php endif; ?>
      <?php endif; ?>

    </ul>
  </header>
</div>