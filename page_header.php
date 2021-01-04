<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <!-- <h1 class="logo mr-auto"><a href="index.php">Me &amp; Family</a></h1> -->
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="index.php" class="logo mr-auto"><img src="assets/img/eprescri-logo.png" alt="" class="img-fluid"></a>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/index.php'){ echo 'class="active"';}?> ><a href="/eprescri/index.php">Home</a></li>
        <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/index.php#about'){ echo 'class="active"';}?>  ><a href="/eprescri/index.php#about">About eprescri</a></li>
        <!-- <li><a href="#">Medicines available</a></li>
        <li><a href="#">Medicines' Companies</a></li> -->
        <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/index.php#log-in'){ echo 'class="active"';}?> class="drop-down"><a href="#log-in">Log in</a>
          <ul>
            <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/login.php' && $_GET["type"]=='doctor'){ echo 'class="active"';}?>><a  id="doctor" href="login.php?type=doctor">Log in as Doctor</a></li>
            <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/login.php' && $_GET["type"]=='pharmacy'){ echo 'class="active"';}?>><a  id="pharmacy"href="login.php?type=pharmacy">Log in as Pharmacy</a></li>
            <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/login.php' && $_GET["type"]=='patient'){ echo 'class="active"';}?>><a  id="patient" href="login.php?type=patient">Log in as Patient</a></li>
            <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/login.php' && $_GET["type"]=='company' ){ echo 'class="active"';}?>><a  id="company" href="login.php?type=company">Log in as Company</a></li>
          </ul>
        </li>
        <!-- <li><a href="contact.php">Contact</a></li> -->

      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header>
