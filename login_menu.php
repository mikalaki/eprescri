<li <?php if($_SERVER['PHP_SELF'] == '/eprescri/index.php#log-in'){ echo 'class="active"';}?> class="drop-down"><a href="#log-in">Log in</a>
  <ul>
    <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/login.php' && $_GET["type"]=='doctor'){ echo 'class="active"';}?>><a  id="doctor" href="login.php?type=doctor">Log in as Doctor</a></li>
    <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/login.php' && $_GET["type"]=='pharmacy'){ echo 'class="active"';}?>><a  id="pharmacy"href="login.php?type=pharmacy">Log in as Pharmacy</a></li>
    <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/login.php' && $_GET["type"]=='patient'){ echo 'class="active"';}?>><a  id="patient" href="login.php?type=patient">Log in as Patient</a></li>
    <li <?php if($_SERVER['PHP_SELF'] == '/eprescri/login.php' && $_GET["type"]=='company' ){ echo 'class="active"';}?>><a  id="company" href="login.php?type=company">Log in as Company</a></li>
  </ul>
</li>
