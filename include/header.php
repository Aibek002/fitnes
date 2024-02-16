<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32">
        <use xlink:href="#bootstrap"></use>
      </svg>
      <span class="fs-4">FitMe</span>
    </a>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="<? echo BASE_URL . 'contact.php' ?>" class="nav-link ">Contact</a></li>
      <li class="nav-item"><a href="<? echo BASE_URL . 'fitneses.php' ?>" class="nav-link">Fitneses</a></li>
      <li class="nav-item"><a href="<? echo BASE_URL . 'about.php' ?>" class="nav-link">AboutUs</a></li>
      <li class="nav-item"><a href="<? echo BASE_URL . 'faqs.php' ?>" class="nav-link">FAQs</a></li>
      <?php if (isset($_SESSION['id'])) : ?>
        <li class="nav-item"><a href="#" class="nav-link"><?php echo $_SESSION['name']; ?></a></li>
        <li class="nav-item"><a href="<?php echo BASE_URL . 'logout.php'; ?>" class="nav-link active">Logout</a></li>
      <?php else : ?>
        <?php if ($_SERVER['REQUEST_URI'] === '/login.php') : ?>
          <li class="nav-item"><a href="<?php echo BASE_URL . 'register.php'; ?>" class="nav-link active">Sign in</a></li>
          <hr />
          <li class="nav-item"><a href="<?php echo BASE_URL . 'login.php'; ?>" class="nav-link"></a></li>
        <?php else : ?>
          <li class="nav-item"><a href="<?php echo BASE_URL . 'register.php'; ?>" class="nav-link active">Sign in</a></li>
          <hr />
          <li class="nav-item"><a href="<?php echo BASE_URL . 'login.php'; ?>" class="nav-link active">Sign up</a></li>
        <?php endif; ?>
      <?php endif; ?>

    </ul>
  </header>
</div>