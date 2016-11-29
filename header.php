<!doctype html>
  <body>
    <div class="navbar-fixed">
      <nav class="brown darken-2">
        <div class="container">
          <div class="nav-wrapper">
            <a href="landing.php" class="brand-logo left"><img src="./images/cc-logo.png"></a>
            <ul class="right hide-on-med-and-down">
              <!-- link to about page -->
              <li><a href="about.php">About</a></li>
              <!-- link to meetups -->
              <li><a href="meetups.php">Meetups</a></li>
              <!-- checks to see if the php -->
              <?php if(isset($_SESSION['fName'])){ ?>
              <!-- link to logout time -->
              <li><a href="landing.php?logout">Logout</a></li>
              <?php }else{ ?>
              <!-- link ot login page -->
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
