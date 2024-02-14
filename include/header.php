<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32">
        <use xlink:href="#bootstrap"></use>
      </svg>
      <span class="fs-4">FitMe</span>
    </a>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="#" class="nav-link ">Contact</a></li>
      <li class="nav-item"><a href="#" class="nav-link">Fitneses</a></li>
      <li class="nav-item"><a href="#" class="nav-link">AboutUs</a></li>
      <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
      <?php if (isset($_SESSION['id'])) : ?>
        <li class="nav-item"><a href="#" class="nav-link "><?= $_SESSION['name'] . " " . $_SESSION['surname']; ?></a></li>

      <?php else : ?>
        <li class="nav-item"><a href="http://fitnes/register.php" class="nav-link active">Sign up</a></li>
      <?php endif ?>
    </ul>
  </header>
</div>