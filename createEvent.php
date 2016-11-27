<?php
  //createEvent 
  include("connect.inc.php");
  if (isset($_GET['success'])){
    //Will go to the page just created
  }
  if (isset($_GET['create'])){
    extract($_POST);

    $uemail = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email = '$uemail'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    $location = $loc;
    $uid = $row['id'];
    $img = $row['profile_img'];

    if(strcmp($row['fb_link'],'No link')==0){
      echo "An event host must enter a valid Facebook link into their profile.";
    }
    else{
      $eTime = $month.'-'.$day.'-'.$hour.'-'.$minute;
      $query2 = "INSERT INTO events (user_id, image, location, start_time) VALUES ('$uid', '$img', '$location', '$eTime')";
      $result = $mysqli->query($query2);
      /*$returnedQuery= $mysqli->query($query);
      if(!$returnedQuery){
        $mysqli->error;
        echo $query;
      }*/
    }
  }
?>
<!doctype html>
<head>
  <title>Create an Event</title>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="./css/websys-site.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
</head>

<body class="brown lighten-5">
    <div class="navbar-fixed">
      <nav class="brown darken-2">
        <div class="container">
          <div class="nav-wrapper">
            <a href="landing.html" class="brand-logo left"><img src="./images/cc-logo.png"></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="about.html">About</a></li>
              <li><a href="meetups.html">Meetups</a></li>
              <li><a href="login.html">Login</a></li>
              <a class="waves-effect waves-light btn orange darken-4" href="signup.html">Sign Up</a>
            </ul>
          </div>
        </div>
      </nav>
    </div>

   <main>
        <div class="container">
          <div class="row">
            <div class="section">
              <div class="col s8 offset-s2">
    <form action="createEvent.php?create" method="post">
      <table>
        <h3 align = "center">Create an Event</h3>
        <tr>
          <td>Location</td>
          <td><select name="loc" required>
              <option></option>
              <option value="0">Student Union - Father's Marketplace</option>
              <option value="1">DCC - Jazmine's</option>
              <option value="2">Sage - The Beanery Cafe</option>
              <option value="3">Pittsburgh - The Lally Gally</option>
              <option value="4">Folsom Library - The Library Cafe</option>
              <option value="5">EMPAC - Evelyn's</option>
            </select>
          </td>
        </tr>
        <?php
          //Looking to the browser since datetime-local might not work with firefox, will need to put it in a fix
          if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $agent = $_SERVER['HTTP_USER_AGENT'];
          }
        ?>
        <tr>
          <td>Month</td> 
          <td><input type="number" name = "month"></td>
          <td>Day</td> 
          <td><input type="number" name = "day"></td>
        </tr>
        <tr>
          <td>Hour</td> 
          <td><input type="number" name = "hour"></td>
          <td>Minute</td> 
          <td><input type="number" name = "minute"></td>
        </tr>
      </table>
      <td><input type="submit" value="Login" /> </td>

    </form> 

</body>
</html>