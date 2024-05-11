<?php
session_start();
include_once "./config/dbconnect.php";
?>

<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
  <a class="navbar-brand ml-5" href="./index.php">
    <img src="./assets/images/logo.png" width="80" height="80" alt="Swiss Collection">
  </a>
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
  
  <div class="d-flex align-items-center">
    <?php if (isset($_SESSION['admin_fname'])): ?>
        <span class="text-white mr-3">Hello Admin, <?php echo $_SESSION['admin_fname'] . ' ' . $_SESSION['admin_lname']; ?>!</span>
    <?php elseif (isset($_SESSION['user_name'])): ?>
      <span class="text-white mr-3">Hello <?php echo $_SESSION['user_name']; ?>!</span>
    <?php else: ?>
      <span class="text-white mr-3">Hello Guest!</span>
    <?php endif; ?>
    
    <div class="user-cart">
      <?php if (isset($_SESSION['admin_fname']) || isset($_SESSION['admin_lname'])): ?>
        <a href="login/logout.php" style="text-decoration:none;">
          <i class="fa fa-sign-out mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
        </a>
      <?php else: ?>
        <a href="login/login_form.php" style="text-decoration:none;">
          <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
        </a>
      <?php endif; ?>
    </div>
  </div>
</nav>
