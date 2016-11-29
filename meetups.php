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

              <h3 class="orange-text text-orange-darken-4">Somethings a-brewing</h3>
              <p>Check out these upcoming meetups</p>
              <div class="divider"></div>
              <div class="row">
                <div class="col s12">
                    <div class="row">


                          <div class="col s5 offset-s1">
                            <br>
                            <p class="orange-text text-darken-2">Joseph wants coffee!</p>
                            <div class="card horizontal">
                              <div class="card-image">
                                <a href="http://www.facebook.com"><img src="./images/gaurav.jpg" class="circle responsive-imgs"></a>


                              </div>
                              <div class="card-stacked">
                                <div class="card-content">



                                  <p class="center-align grey-text">3 spots left</p>
                                  <br>
                                  <div class="divider"></div>
                                      <br>

                                      <p class="center-align valign">2PM - 3PM</p>
                                      <p class="center-align valign "><b>NOV 20</b></p>
                                      <p class="center-align valign">Evelyn's Cafe</p>
                                </div>
                              </div>
                            </div>
                          <div  class="center-align">
                            <button class="btn waves-effect waves-light orange darken-4" type="submit" name="action">JOIN</button>
                          </div>
                          </div>

                          <div class="col s5 offset-s1">
                            <br>
                            <p class="orange-text text-darken-2">Joseph wants coffee!</p>
                            <div class="card horizontal">
                              <div class="card-image">
                                <a href="http://www.facebook.com"><img src="./images/gaurav.jpg" class="circle responsive-imgs"></a>


                              </div>
                              <div class="card-stacked">
                                <div class="card-content">



                                  <p class="center-align grey-text">3 spots left</p>
                                  <br>
                                  <div class="divider"></div>
                                      <br>

                                      <p class="center-align valign">2PM - 3PM</p>
                                      <p class="center-align valign "><b>NOV 20</b></p>
                                      <p class="center-align valign">Evelyn's Cafe</p>
                                </div>
                              </div>
                            </div>
                          <div  class="center-align">
                            <button class="btn waves-effect waves-light orange darken-4" type="submit" name="action">JOIN</button>
                          </div>
                          </div>

                          <div class="col s5 offset-s1">
                            <br>
                            <p class="orange-text text-darken-2">Joseph wants coffee!</p>
                            <div class="card horizontal">
                              <div class="card-image">
                                <a href="http://www.facebook.com"><img src="./images/gaurav.jpg" class="circle responsive-imgs"></a>


                              </div>
                              <div class="card-stacked">
                                <div class="card-content">



                                  <p class="center-align grey-text">3 spots left</p>
                                  <br>
                                  <div class="divider"></div>
                                      <br>

                                      <p class="center-align valign">2PM - 3PM</p>
                                      <p class="center-align valign "><b>NOV 20</b></p>
                                      <p class="center-align valign">Evelyn's Cafe</p>
                                </div>
                              </div>
                            </div>
                          <div  class="center-align">
                            <button class="btn waves-effect waves-light orange darken-4" type="submit" name="action">JOIN</button>
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
