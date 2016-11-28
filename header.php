<!doctype html>
  <body>
    <div class="navbar-fixed">
      <nav class="brown darken-2">
        <div class="container">
          <div class="nav-wrapper">
            <a href="landing.php" class="brand-logo left"><img src="./images/cc-logo.png"></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="about.html">About</a></li>
              <li><a href="meetups.php">Meetups</a></li>
              <?php if(isset($_SESSION['fName'])){ ?>
              <li><a href="landing.php?logout">Logout</a></li>
              <?php }else{ ?>
              <li><a href="login.php">Login</a></li>
              <?php } ?>
              <a class="waves-effect waves-light btn orange darken-4" href="signup.php">Sign Up</a>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </body>
</html>