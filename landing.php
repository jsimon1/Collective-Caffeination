<?php
  include("connect.inc.php");
  if(isset($_GET['logout'])){
    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
      );
    }
    session_destroy();
    header('Location: landing.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <!-- imports websys-site.css -->
    <link type="text/css" rel="stylesheet" href="css/websys-site.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <?php
    include('header.php');
  ?>

    <main>
      <!-- loads ladning page image -->
      <div><img src="./images/coffeebanner.jpg" width="100%"></div>
          <div class="container">
            <div class="row">
              <div class="section">
                <div class="row">
                  <div class="col s12 center-align"><a class="waves-effect waves-light btn-large orange darken-4" href="signup.php">Let's get Coffee!</a></div>
                  <div class="col s12 m4">
                    <div class="icon-block">
                      <h2 class="center orange-text"><i class="material-icons">favorite</i></h2>
                      <h5 class="center">Make new friends</h5>

                      <p class="light center-align">Connect with like-minded members of the RPI community over a cup of coffee</p>
                    </div>
                  </div>

                  <div class="col s12 m4">
                    <div class="icon-block">
                      <h2 class="center orange-text"><i class="material-icons">face</i></h2>
                      <h5 class="center">Engage your community</h5>

                      <p class="light center-align">Be a part of the RPI community in a unique and out-of-classroom experience</p>
                    </div>
                  </div>

                  <div class="col s12 m4">
                    <div class="icon-block">
                      <h2 class="center orange-text"><i class="material-icons">lightbulb_outline</i></h2>
                      <h5 class="center">Learn new things</h5>

                      <p class="light center-align">Share interesting thoughts and ideas to and inspire others with your insight</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </main>

    <footer class="page-footer  brown darken-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="about.php">About</a></li>
                  <li><a class="grey-text text-lighten-3" href="meetups.php">Meetups</a></li>
                  <li><a class="grey-text text-lighten-3" href="login.php">Log In</a></li>
                  <li><a class="grey-text text-lighten-3" href="signup.php">Sign Up</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://github.com/miknosaj/WebSys-Website">GitHub</a></li>
                </ul>
              </div>
              <div class="col l6 s12">
                <p class="grey-text text-lighten-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;At our first group project meeting, nearly all of us came with some form of caffeinated beverage in hand, so creating a web application that makes it easier for students to meet over a cup of coffee seemed like something that many RPI students would enjoy and could relate to.</br>
                </br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We knew we wanted to make something to help students at RPI who would not ordinarily meet, get a chance to go outside of their comfort zone and make friends on campus.</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright brown darken-4">
            <div class="container">
              Made with &#9749 by WebSys Group 1
            </div>
          </div>
    </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>
