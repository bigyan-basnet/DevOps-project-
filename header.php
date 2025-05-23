<!DOCTYPE html>
<html lang="en">

<head>
  <title>Carbook</title>
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />
</head>

<body>
  <header>
    <div class="first-menu-group">
      <a class="navbar-logo" href="index.php">Ezy<span class="rental">Rentals</span></a>
    </div>

    <div class="middle-menu-group">
      <ul class="nav_links">
        <li class="nav-item ">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link">About</a>
        </li>
        <li class="nav-item">
          <a href="services.php" class="nav-link">Services</a>
        </li>
        <li class="nav-item">
          <a href="price.php" class="nav-link">Pricing</a>
        </li>


        <li class="nav-item">
          <a href="contact.php" class="nav-link">Contact</a>
        </li>
      </ul>
    </div>

    <div class="last-menu-group">
      <ul class="nav_links">

        <?php

        session_start();

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
          $first_name = $_SESSION['username'];
          echo "<li class='nav-item'><h2>Welcome, $first_name!</h2></li>";
          echo "<a href='logout.php' name='logout' class='nav-link' >Logout</a>";
        } else {
          echo "<a href='login.php' class='nav-link'>Login</a>";
        }
        ?>

      </ul>
    </div>
    <!-- END nav -->

    <div class="menu-logo">
      <img src="css/images/" alt="" onclick="toggleMenu()" />
    </div>
  </header>



</body>

</html>