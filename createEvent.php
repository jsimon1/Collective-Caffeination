<?php
  //createEvent
  include("connect.inc.php");
  if(!isset($_SESSION['fName'])){
    header('Location: landing.php');
  }
  $noLink = false;
  if (isset($_GET['create'])){
    extract($_POST);

    // goes to email from our database and fetches it
    $uemail = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email = '$uemail'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    $location = $loc;
    $uid = $row['id'];
    $img = $row['profile_img'];

    //String manipulation to break up the date into an easy-to-interpret variable
    $firstSpace = strpos($uDate, ' ');
    $day = substr($uDate, 0,$firstSpace);
    $pos = strpos($uDate, ',');
    $month = substr($uDate,$firstSpace+1,$pos-$firstSpace-1);
    $desc = addslashes($desc);

    $monthNum=0;
    if(strcmp($month,'January')==0){
      $monthNum=1;
    }
    else if(strcmp($month,'February')==0){
      $monthNum=2;
    }
    else if(strcmp($month,'March')==0){
      $monthNum=3;
    }
    else if(strcmp($month,'April')==0){
      $monthNum=4;
    }
    else if(strcmp($month,'May')==0){
      $monthNum=5;
    }
    else if(strcmp($month,'June')==0){
      $monthNum=6;
    }
    else if(strcmp($month,'July')==0){
      $monthNum=7;
    }
    else if(strcmp($month,'August')==0){
      $monthNum=8;
    }
    else if(strcmp($month,'September')==0){
      $monthNum=9;
    }
    else if(strcmp($month,'October')==0){
      $monthNum=10;
    }
    else if(strcmp($month,'November')==0){
      $monthNum=11;
    }
    else if(strcmp($month,'December')==0){
      $monthNum=12;
    }
    //echo $monthNum;
    $year = substr($uDate,$pos+1);

    $finalDate = $year.'-'.$monthNum.'-'.$day;

    // Ensures the user has a facebook and echos an error if theirs is not valid
    if(strcmp($row['fb_link'],'No link')==0){
      $noLink = true;
    }
    else{
      // inserts the time entered in the database where we hold the meeting times
      $startingTime = $hour1.' '.$startT;
      $endingTime = $hour2.' '.$endT;
      $query2 = "INSERT INTO events (user_id, image, location, start_time, end_time, description, date) VALUES ('$uid', '$img', '$location', '$startingTime', '$endingTime', '$desc', '$finalDate', '')";
      $result = $mysqli->query($query2);
      header('Location: meetups.php?new');
      //echo $query2;
    }
  }
?>
<!doctype html>
<!-- in this HTML we allow the users to create an event for them to host -->
<head>
  <title>Host an event</title>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <!-- imports websys-site.css -->
    <link type="text/css" rel="stylesheet" href="./css/websys-site.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
</head>

<body class="brown lighten-5">
  <?php include("header.php"); ?>

   <main>
      <div class="container">
        <div class="row">
          <div class="section">
            <div class="col s8 offset-s2">
              <h2 class = "title orange-text text-orange-darken-4">Host an event :)</h2>
              <?php if($noLink){ ?>
              <div class="content">
                <p>Error: An event host must have a valid Facebook link in their profile.</p>
              </div>
              <?php } ?>
            </div>
            <div class="col s8 offset-s2">
              <form action="createEvent.php?create" method="post" class="card-panel">
                <div class="row">
                  <div class="input-field col s12">
                    <!-- Give users options to pick where they want to meet using common areas around campus -->
                    <select name="loc" required>
                      <option value="" disabled selected>Select a location</option>
                      <option value="1">Student Union - Father's Marketplace</option>
                      <option value="2">DCC - Jazmine's</option>
                      <option value="3">Sage - The Beanery Cafe</option>
                      <option value="4">Pittsburgh - The Lally Gally</option>
                      <option value="5">Folsom Library - The Library Cafe</option>
                      <option value="6">EMPAC - Evelyn's Cafe</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                    <!-- user now is allowed to pick a date they want to meet -->
                    <input type="date" name="uDate" id="uDate"class="datepicker">
                    <label>Pick a date</label>
                  </div>
                </div>
                <!-- input for the time to meet - Keeping for now for Firefox implementation
                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="Month" type="number" name = "month" class = "validate">
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Day" type="number" name = "day" class="validate">
                  </div>
                </div>-->

                <!-- allows users to pick a start time -->
                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="Hour" type="number" name="hour1" class="validate">
                    <label>Start time</label>
                  </div>
                  <div class="input-field col s6">
                    <select name="startT">
                      <option value="AM" selected>AM</option>
                      <option value="PM">PM</option>
                    </select>
                  </div>
                </div>
                <!-- allows user to pick end time-->
                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="Hour" type="number" name="hour2" class="validate">
                    <label>End time</label>
                  </div>
                  <div class="input-field col s6">
                    <select name="endT">
                      <option value="AM" selected>AM</option>
                      <option value="PM">PM</option>
                    </select>
                  </div>
                </div>
                <!-- allows user to add some comments about the meeting -->
                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Description" type="text" name="desc" class="validate">
                  </div>
                </div>

                <div class = "row">
                  <div class="col s12 center-align">
                    <button class="waves-effect waves-light btn orange darken-4" type="submit" name="action" value="join_adbeus">Espress-go!</button>
                  </div>
                </div>

              </form>
            </div>
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
    <!-- runs date js after page is rendered -->
    <script>
      $(document).ready(function() {
        $('select').material_select();
      });
      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
      });
    </script>

  </body>
</html>
