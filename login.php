<?php
  include("connect.inc.php");
  $success = true;
  if (isset($_GET['login'])){
    extract($_POST);
    // accesses the database
    $query = "SELECT * FROM users WHERE email = '$rpi_email'";
    //echo $query;
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $salt = $row['salt'];
    // checks the password
    $checkPwd = crypt($password,$salt);
    if ($checkPwd == $row['password']){
      // starts the session
      session_start();
      $_SESSION['email']=$row['email'];
      $_SESSION['fName']=$row['first_name'];
      $_SESSION['lName']=$row['last_name'];
      $_SESSION['uid']=$row['id'];
      header('Location: meetups.php');
      exit;
    }
    else{
      $success = false;
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
      include('header.php');
    ?>
      <main>
        <div class="container">
          <div class="row">
            <div class="section">
              <div class="col s8 offset-s2">
                <span class="title orange-text text-orange-darken-4"><h2>Welcome back!</h2></span>
                <?php if(!$success){ ?>
                <p>Incorrect username or password, please try again.</p>
                <?php } ?>
             </div>
              <div class="col s8 offset-s2">
                <form action="login.php?login" method="post" class="card-panel">
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="RPI Email" name="rpi_email" id="rpi_email" type="text" class="validate">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="Password" name="password" id="password" type="password" class="validate">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12 center-align">
                      <button class="waves-effect waves-light btn orange darken-4" type="submit" name="action" value="join_adbeus">Log In</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col s12 center align"><br><a class="orange-text text-darken-4" href="signup.php">Don't have an account? Click here to Sign up!</a></div>
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
