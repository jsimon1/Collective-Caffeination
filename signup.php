<?php
  include("connect.inc.php");
  if (isset($_GET['new'])){
    extract($_POST);
    $query1 = "SELECT * FROM users WHERE email = '$rpi_email'";
    $res1 = $mysqli->query($query1);
    if ($res1->num_rows != 0){
      echo "<h1>An account with that e-mail has already been created.</h1>";
    }
    else{
      $pwd = $password;
      $email = $rpi_email;
      $fName = $first_name;
      $lName = $last_name;
      $fName = addslashes($fName);
      $lName = addslashes($lName);
      //Email Validator
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $allowedChars ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./';
        $charsLen = 63;
        $saltLength = 21;
        $salt = "";
        for($i=0; $i<$saltLength; $i++){
            $salt .= $allowedChars[mt_rand(0,$charsLen)];
        }
        $hashedPassword = crypt($pwd, $salt);
        $query = "INSERT INTO users (email, password, first_name, last_name, salt, fb_link, profile_img) VALUES ('$email', '$hashedPassword', '$fName', '$lName', '$salt', 'No link', 'No link')";
        $returnedQuery= $mysqli->query($query);
        if(!$returnedQuery){
          $mysqli->error;
          echo $query;
        }
        else{
          session_start();
          $_SESSION['email']=$rpi_email;
          $_SESSION['fName']=$first_name;
          $_SESSION['lName']=$last_name;
          header('Location: meetups.php');
          exit;
        }
      }
      else{
        echo "The email entered is not a valid RPI address";
      }
    }
  }
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
              <div class="col s8 offset-s2">
                <h2 class="title orange-text text-orange-darken-4"">Better latte than never!</h2>
                <div class="content">
                  <h5>Sign up and join our community. &#9996</h5>
                </div>
              </div>
              <div class="col s8 offset-s2">
                <form action="signup.php?new" method="post" class="card-panel">
                  <div class="row">
                    <div class="input-field col s6">
                      <input placeholder="First Name" name="first_name" id="first_name" type="text" class="validate">
                    </div>
                    <div class="input-field col s6">
                      <input placeholder="Last Name" name="last_name" id="last_name" type="text" class="validate">
                    </div>
                  </div>
                  <div class="row">
                    <div class="file-field input-field col s12">
                      <div class="btn brown darken-1">
                        <span>Upload</span>
                        <input type="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input placeholder="Upload a picture of yourself" name="profpic" id="profpic" class="file-path validate" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="Your Facebook" name="fb_link" id="fb_link" type="text" class="validate">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="RPI Email" name="rpi_email" id="rpi_email" type="text" class="validate">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="Password (don't forget!)" name="password" id="password" type="password" class="validate">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 center-align">
                      <button class="waves-effect waves-light btn orange darken-4" type="submit" name="action" value="join_adbeus">Espress-go!</button>
                    </div>
                  </div>


                </form>
              </div>
              <div class="col s12 center align"><br><a class="orange-text text-darken-4" href="login.php">Already have an account? Click here to login.</a></div>
            </div>
          </div>
        </div>
      </main>

    <footer class="page-footer  brown darken-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="about.html">About</a></li>
                  <li><a class="grey-text text-lighten-3" href="meetups.html">Meetups</a></li>
                  <li><a class="grey-text text-lighten-3" href="login.html">Log In</a></li>
                  <li><a class="grey-text text-lighten-3" href="signup.html">Sign Up</a></li>
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
