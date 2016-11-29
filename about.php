<?php
  include("connect.inc.php");
?>
<!DOCTYPE html>
<!-- This is the about page in which we give credit to our group -->
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <!-- import websys-site.css -->
    <link type="text/css" rel="stylesheet" href="./css/websys-site.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
<!-- classes to distinguish how css will edit the page -->
  <body class="brown lighten-5">
    <?php
      include("header.php");
    ?>

    <main>
      <div class="container">
        <div class="row">
          <div class="section">
              <div class="col s10">
                <h3 class="orange-text text-orange-darken-4">What is Collective Caffeination?</h3>
                <h4>Collective Caffeination is a web application where people who do not know each other meet at events facilitated by student and faculty hosts.</h4>
                <h4>Loosely inspired by the concept of <a href="http://www.teawithstrangers.com/">Tea with Strangers</a>, these gatherings encourage reaching out, joining new groups, and developing new communities on campus in a safe and accessible environment.</h4>
              </div>

              <!-- show everyones picture and how they contributed to project -->

                <div class="col s12">
                  <br><br>
                  <div class="divider"></div>
                  <h5 class="orange-text text-orange-darken-4">The Websys Team</h5>
                    <div class="row">

                      <div class="col s3">
                        <div class="card">
                          <div class="card-image">
                            <!-- image of Corey -->
                            <img class="responsive-img" src="./images/Corey.jpg">
                          </div>

                            <div class="card-content">
                              <p class="center-align">Corey Burns</p>
                              <p></br>Corey is a sophomore ITWS student who also plays lacrosse. He likes to play video games and go on hikes with his friends.</br></br><p/>
                            </div>

                        </div>
                      </div>
                      <div class="col s3">
                        <div class="card">
                          <div class="card-image">
                            <!-- image of Jason -->
                            <img class="responsive-img" src="./images/Jason.jpg">
                          </div>

                            <div class="card-content">
                              <p class="center-align">Jason Kim</p>
                              <p></br>Jason is an EMAC senior with a minor in ITWS. Jason is a member of the Photography Club, Red Bull enthusiast, and frequent coffee drinker.</p>
                            </div>



                        </div>
                      </div>
                      <div class="col s3">
                        <div class="card">
                          <div class="card-image">
                            <!-- image of Jeremy -->
                            <img class="responsive-img" width="50" src="./images/Jeremy.jpg">
                          </div>

                            <div class="card-content">
                              <p class="center-align">Jeremy Simon</p>
                              <p><br/>Jeremy is a sophomore ITWS and CS dual who loves back-end coding in PHP and SQL. In his spare time, he enjoys playing guitar and video games.</br></br></p>
                            </div>



                        </div>
                      </div>
                      <div class="col s3">
                        <div class="card">
                          <div class="card-image">
                            <!-- image of Samm -->
                            <img class="responsive-img" src="./images/Samm.jpg">
                          </div>

                            <div class="card-content">
                              <p class="center-align">Samm Katcher</p>
                              <p></br>Samm is a sophomore ITWS student with an affinity for fuzzy socks and warm beverages. In her spare time, she is in the Ballroom Dance Club and the IT Leadership Board.</br></p>
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
                  <!-- link to this page -->
                  <li><a class="grey-text text-lighten-3" href="about.html">About</a></li>
                  <!-- link to the meetups page -->
                  <li><a class="grey-text text-lighten-3" href="meetups.html">Meetups</a></li>
                  <!-- links to the log in page -->
                  <li><a class="grey-text text-lighten-3" href="login.html">Log In</a></li>
                  <!-- link to the signup page -->
                  <li><a class="grey-text text-lighten-3" href="signup.html">Sign Up</a></li>
                  <!-- link to the gitup repo we created -->
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
    <!-- loads javascript at end of page after it has all been rendered -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>
