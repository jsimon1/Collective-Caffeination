<?php
  include("connect.inc.php");

  //Coming to this page automatically logs the person out.
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
    );
  }
  session_destroy();

  $emailTaken = false;
  if (isset($_GET['new'])){
    extract($_POST);
    $query1 = "SELECT * FROM users WHERE email = '$rpi_email'";
    $res1 = $mysqli->query($query1);
    if ($res1->num_rows != 0){
      $emailTaken = true;
    }
    else{
      $pwd = $password;
      $email = $rpi_email;
      $fName = $first_name;
      $lName = $last_name;
      $fName = addslashes($fName);
      $lName = addslashes($lName);
      $fb = $fb_link;

      //Storing image on the server - code from http://stackoverflow.com/questions/3509333/how-to-upload-save-files-with-desired-name

      $target = "";
      $dir = $_SERVER['DOCUMENT_ROOT'].'/websys/Projects/homeworks/WebSys-Website';
      if(count($_FILES)>0){
        $target = $dir.'/images/'.addslashes($_FILES['profilepic']['name']);
        move_uploaded_file($_FILES['profilepic']['tmp_name'], $target);
      }


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
        $query = "INSERT INTO users (email, password, first_name, last_name, salt, fb_link, profile_img) VALUES ('$email', '$hashedPassword', '$fName', '$lName', '$salt', '$fb', '$target')";
        $returnedQuery= $mysqli->query($query);
        if(!$returnedQuery){
          $mysqli->error;
          echo $query;
        }
        else{
          //Getting id for session handling
          $query1 = "SELECT * FROM users WHERE email = '$email'";
          $result1 = $mysqli->query($query1);
          $row1 = $result1->fetch_assoc();

          session_start();
          $_SESSION['email']=$rpi_email;
          $_SESSION['fName']=$first_name;
          $_SESSION['lName']=$last_name;
          $_SESSION['uid']=$row1['id'];
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
                  <?php if($emailTaken){ ?>
                  <p>An account with that e-mail has already been created.</p>
                  <?php } ?>
                </div>
              </div>
              <div class="col s8 offset-s2">
                <form action="signup.php?new" method="post" class="card-panel" enctype="multipart/form-data">
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
                        <span>File</span>
                        <input type="file" name="profilepic" id="profilepic">
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

    <?php
      include("footer.php");
    ?>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>
