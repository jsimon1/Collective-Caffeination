<?php
	//registration page
	include("connect.inc.php");
	if (isset($_GET['success'])){
		echo "Account created successfully! Please log in to continue.";
	}
	if (isset($_GET['logout'])){
		if (ini_get("session.use_cookies")) {
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
    	);
		}
	session_destroy();
	header('Location: index.php');
	exit;
	}
	if (isset($_GET['new'])){
		extract($_POST);
		$query1 = "SELECT * FROM users WHERE username = '$newUName'";
		$res1 = $mysqli->query($query1);
		if ($res1->num_rows != 0){
			echo "<h1>An account with that username already exists.</h1>";
		}
		else{
			$pwd = $newPwd;
			$uName = $newUName;
			$confirm=$newCon;
			$fName = $newFName;
			$lName = $newLName;
			$fName = addslashes($fName);
			$lName = addslashes($lName);
			$faceLink = $fbLink;
			$twitterLink = $twitLink;
			$allowedChars ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./';
			$charsLen = 63;
			$saltLength = 21;
			$salt = "";
			for($i=0; $i<$saltLength; $i++){
	   			$salt .= $allowedChars[mt_rand(0,$charsLen)];
			}
			$hashedPassword = crypt($pwd, $salt);
			if ($pwd == $confirm){
				$query = "INSERT INTO users (username, password, first_name, last_name, salt, fb_link, twit_link) VALUES ('$uName', '$hashedPassword', '$fName', '$lName', '$salt', '$faceLink', '$twitterLink')";
				$returnedQuery= $mysqli->query($query);
				if(!$returnedQuery){
					$mysqli->error;
					echo $query;
				}
			}
			header("Location: login.php?success");
		}
	}
	if (isset($_GET['login'])){
		extract($_POST);
		$query = "SELECT * FROM users WHERE username = '$uName'";
	//	echo $query;
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		$salt = $row['salt'];
		$checkPwd = crypt($password,$salt);
		if ($checkPwd == $row['password']){
			$success = true;
			session_start();
			$_SESSION['uid']=$row['id'];
			$_SESSION['fName']=$row['first_name'];
			$_SESSION['lName']=$row['last_name'];
			$_SESSION['user']=$row['username'];
			header('Location: index.php');
			exit;
		}
		else{
			$success = false;
		}
	}
/* Code for if we want mobile support
$agent = $_SERVER['HTTP_USER_AGENT'];
$isMobile = false;
if (strpos($agent, 'Windows Phone')!==false || strpos($agent, 'Android')!==false || strpos($agent, 'iPhone')!==false || strpos($agent, 'iPad')!==false || strpos($agent, 'iPod')!==false){
	$isMobile = true;
}
*/

?>
<!doctype html>
<head>
	<title>Login/Registration Page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="main">
		<?php
			if(isset($_GET['new']) && $pwd!=$confirm){ 
		?>
		<h3 align="center">Passwords do not match, please try again.</h3>
		<form action="login.php?new" method="post">
			<table>
				<h3 align="center">Register</h3>
				<tr>
					<td>Username</td>
					<td><input type="text" name="newUName" id="uname" value="<?php echo $newUName;?>" required /></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="newPwd" id="pwd" /></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="newCon" id="confirm" /></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td><input type="text" name="newFName" id="fName" value="<?php echo $newFName; ?>" required /></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" name="newLName" id="lname" value="<?php echo $newLName; ?>" required /></td>
				</tr>
				<tr>
					<td>Facebook Link</td>
					<td><input type="text" name="fbLink" id="fbLink" value="<?php echo $fbLink; ?>" required /></td>
				</tr>
				<tr>
					<td>Twitter Link</td>
					<td><input type="text" name="twitLink" id="twitLink" /></td>
				</tr>
			</table>
			<input type="submit" value="Submit">
		</form>

		<?php }
		else{
		?>
		<form action="login.php?login" method="post">
			<table>
				<?php
					if(isset($_GET['login']) && !$success){
						echo "<h3 align='center'>Incorrect Username or Password.  Please Try Again.</h3>";
					}
				?>
				<h3 align = "center">Login</h3>
				<tr>
					<td>Username</td>
					<td><input type="text" name="uName" /></td>
				</tr>
				<tr>
					<td>Password</td> 
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
			<td><input type="submit" value="Login" /> </td>

		</form>	
		<form action="login.php?new" method="post">
			<table class="matches3">
				<h3 align="center">Register</h3>
				<tr>
					<td>Username</td>
					<td><input type="text" name="newUName" id="uname" required /></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="newPwd" id="pwd" /></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="newCon" id="confirm" /></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td><input type="text" name="newFName" id="uname" required /></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" name="newLName" id="lname" required /></td>
				</tr>
				<tr>
					<td>Facebook Link</td>
					<td><input type="text" name="fbLink" id="fbLink" /></td>
				</tr>
				<tr>
					<td>Twitter Link</td>
					<td><input type="text" name="twitLink" id="twitLink" /></td>
				</tr>
			</table>
			<input type="submit" value="Submit">
		</form>
		<?php } ?>

</body>
</html>