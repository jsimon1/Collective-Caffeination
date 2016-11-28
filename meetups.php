<?php
  include("connect.inc.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="./css/websys-site.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body class="brown lighten-5">
    <?php
      include("header.php");
    ?>
    <main>
      <div class="container">
        <div class="row">
          <div class="section">

              <h3 class="orange-text text-orange-darken-4">Somethings a-brewing!</h3>
              <p>Check out these upcomging meetups</p>
              <div class="divider"></div>
              <div class="row">
                <div class="col s12">
                    <div class="row">
                      <div class="col s4">
                        <div class="card horizontal">
                          <div class="card-image">
                            <img src="./images/gaurav.jpg">
                          </div>
                          <div class="card-stacked">
                            <div class="card-content">
                              <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action center-align">
                              <a href="#">This is a link</a>
                            </div>
                          </div>
                        </div>
                        <div class="card horizontal">
                          <div class="card-image">
                            <img src="./images/gaurav.jpg">
                          </div>
                          <div class="card-stacked">
                            <div class="card-content">
                              <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action center-align">
                              <a href="#">This is a link</a>
                            </div>
                          </div>
                        </div>
                        <div class="card horizontal">
                          <div class="card-image">
                            <img src="./images/gaurav.jpg">
                          </div>
                          <div class="card-stacked">
                            <div class="card-content">
                              <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action center-align">
                              <a href="#">This is a link</a>
                            </div>
                          </div>
                        </div>
                      </div>
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
                <p class="grey-text text-lighten-4">Collective Caffeination is all about joining together. Something something Samm please put something in here.</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright brown darken-4">
            <div class="container">
              Made with &#9749 by WebSys Group 7
            </div>
          </div>
    </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>
