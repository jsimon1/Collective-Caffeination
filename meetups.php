<?php
  include("connect.inc.php");

  $signedUp = false;
  $resultSet;

  //Getting signups and extracting necessary data for page
  $querySignups = "SELECT * FROM `signups`";
  $resultSignups = $mysqli->query($querySignups);
  $eventSignups = array();
  while($rowSignups = $resultSignups->fetch_assoc()) {
    if(array_key_exists($rowSignups['event_id'],$eventSignups)){
      $eventSignups[$rowSignups['event_id']]++;
    }
    else{
      $eventSignups[$rowSignups['event_id']] = 1;
    }
  }

  if ((isset($_GET['u']))&&(isset($_GET['e']))){
    //If result set returns anything, person already signed up for event
    $usId = $_GET['u'];
    $eId = $_GET['e'];
    $queryTest = "SELECT * FROM `signups` WHERE user_id = $usId AND event_id = $eId";
    $resultTest = $mysqli->query($queryTest);
    if(mysqli_num_rows($resultTest)==0){
      $querySet = "INSERT INTO signups (user_id, event_id) VALUES ('$usId', '$eId')";
      $resultSet = $mysqli->query($querySet);
    }
    else{
      $signedUp = true;
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
              <?php if (isset($_GET['new'])){ ?>
                <p>Your event was created successfully!</p>
              <?php }
                    if (isset($resultSet)&&($resultSet)){ ?>
                <p>You successfully signed up for the event.</p>
              <?php }
                    if ($signedUp){ ?>
                <p>You already signed up for this event! </p>
              <?php } ?>
              <h3 class="orange-text text-orange-darken-4">Somethings a-brewing</h3>
              <p>Check out these upcoming meetups</p>
              <div class="divider"></div>
              <div class="row">
                <div class="col s12">
                    <div class="row">
                      <?php
                        $usersArr = array();
                        $facebookArr = array();
                        $query = "SELECT * FROM `users`";
                        $result = $mysqli->query($query);
                        while($row = $result->fetch_assoc()) {
                          $usersArr[$row['id']] = $row['first_name'];
                          $facebookArr[$row['id']] = $row['fb_link'];
                        }
                        $query1 = "SELECT * FROM `events` ORDER BY `date`";
                        $result1 = $mysqli->query($query1);
                        while($row1 = $result1->fetch_assoc()) {
                      ?>
                      <!-- Start card -->
                      <div class="col s5 offset-s1">
                        <p class="orange-text text-darken-2"><?php echo $usersArr[$row1['user_id']]; ?> wants coffee!</p>
                        <div class="card horizontal">
                          <div class="card-image">
                            <a href="<?php echo $facebookArr[$row1['user_id']]; ?>"><img src=<?php $absLink = $row1['image'];
                            $cutoff = strpos($row1['image'],'htdocs');
                            $link = substr($row1['image'], $cutoff+7);
                            $finalLink = 'http:\\'.$link;
                            echo $finalLink;?> class='circle responsive-imgs' height='200px' width = '240px'></a>
                          </div>
                          <div class="card-stacked">
                            <div class="card-content">
                              <p class="center-align grey-text"><?php
                                if(isset($eventSignups[$row1['id']])){
                                  $numSpotsTaken = $row1['max_participants']-$eventSignups[$row1['id']];
                                }
                                else{
                                  $numSpotsTaken = $row1['max_participants'];
                                }
                                echo $numSpotsTaken.' spots left';
                              ?></p>
                              <br>
                              <div class="divider"></div>
                                  <br>
                                  <p class="center-align valign"><?php echo $row1['start_time']; ?> - <?php echo $row1['end_time']; ?></p>
                                  <p class="center-align valign "><b><?php
                                    //Preparing table data for nice data layout on the card
                                    $eventDate = $row1['date'];
                                    $eventDateCutoff = substr($eventDate,6);
                                    $divider = strpos($eventDateCutoff,'-');
                                    $eventMonthNum = substr($eventDateCutoff,0,$divider);
                                    $eventDayNum = substr($eventDateCutoff,$divider+1);

                                    $eventMonth = "";
                                    if($eventMonthNum==1){
                                      $eventMonth = "JAN";
                                    }
                                    else if($eventMonthNum==2){
                                      $eventMonth = "FEB";
                                    }
                                    else if($eventMonthNum==3){
                                      $eventMonth = "MAR";
                                    }
                                    else if($eventMonthNum==4){
                                      $eventMonth = "APR";
                                    }
                                    else if($eventMonthNum==5){
                                      $eventMonth = "MAY";
                                    }
                                    else if($eventMonthNum==6){
                                      $eventMonth = "JUN";
                                    }
                                    else if($eventMonthNum==7){
                                      $eventMonth = "JUL";
                                    }
                                    else if($eventMonthNum==8){
                                      $eventMonth = "AUG";
                                    }
                                    else if($eventMonthNum==9){
                                      $eventMonth = "SEP";
                                    }
                                    else if($eventMonthNum==10){
                                      $eventMonth = "OCT";
                                    }
                                    else if($eventMonthNum==11){
                                      $eventMonth = "NOV";
                                    }
                                    else if($eventMonthNum==12){
                                      $eventMonth = "DEC";
                                    }
                                    echo $eventMonth.' '.$eventDayNum;
                                  ?></b></p>
                                  <p class="center-align valign"><?php
                                    if($row1['location']==1){
                                      echo "Father's Marketplace";
                                    }
                                    if($row1['location']==2){
                                      echo "Jazmine's";
                                    }
                                    if($row1['location']==3){
                                      echo "The Beanery Cafe";
                                    }
                                    if($row1['location']==4){
                                      echo "The Lally Gally";
                                    }
                                    if($row1['location']==5){
                                      echo "The Library Cafe";
                                    }
                                    if($row1['location']==6){
                                      echo "Evelyn's Cafe";
                                    }
                                  ?></p><br>

                            </div>
                          </div>
                        </div>
                        <div class=card-panel>
                          <p class="center-align"><?php echo $row1['description']; ?></p>
                        </div>
                      <div  class="center-align">
                      <?php
                        $userID = $_SESSION['uid'];
                        $eventID = $row1['id'];
                        echo "<form action=meetups.php?u=$userID&e=$eventID method=post>";
                      ?>
                          <button class="btn waves-effect waves-light orange darken-4" type="submit" name="action">JOIN</button>
                        </form>
                      </div>
                      </div>
                      <!-- End card -->
                      <?php } ?>
                    </div>
                </div>
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
  </body>
</html>
