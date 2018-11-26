<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="login2.css" />
</head>
	<body>
	<?php
	require('db.php');
	session_start();
	// If form submitted, insert values into the database.
	if (isset($_POST['username'])){
	        // removes backslashes
		$username = stripslashes($_REQUEST['username']);
	        //escapes special characters in a string
		$username = mysqli_real_escape_string($con,$username);
		$password = $_REQUEST['password'];

		//Checking is user existing in the database or not
	        $query = "SELECT * FROM user WHERE name='$username' ";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));

		$numofrows = mysqli_num_rows($result);

		$row = mysqli_fetch_assoc($result);
	
	        if($password == $row['password']){
		    	$_SESSION['username'] = $username;
				$highscore = $row['highscore'];
				echo $highscore;
				$_SESSION['highscore'] = $highscore;
	            // Redirect user to game play
		    	header("Location: https://matchingcolor.000webhostapp.com/");
	        }else{
					echo "<div class='form'>
				<h3>Username/password is incorrect.</h3>
				<br/><p>Click here to <a href='login2.php'>Login</a></p></div>";

			}
			///////////////////////////////////////////////////////////
	    }elseif (isset($_REQUEST['username_s'])){
              // removes backslashes
      	$username_s = stripslashes($_REQUEST['username_s']);
		//escapes special characters in a string
      	$username_s = mysqli_real_escape_string($con,$username_s); 
        $password_s = stripslashes($_REQUEST['password_s']);
        $password_s = mysqli_real_escape_string($con,$password_s);
      	$REpassword_s = stripslashes($_REQUEST['REpassword_s']);
      	$REpassword_s = mysqli_real_escape_string($con,$REpassword_s);

		$chk = "SELECT * FROM user WHERE name = '$username_s'";
			if ($con->query($chk)->num_rows == 0){
		//		$stmt->execute(); //add
				if( ($REpassword_s == $password_s) ){
					$query = "INSERT INTO user (name, password) VALUES ('$username_s', '$password_s')";
					$result = mysqli_query($con,$query);
					if($result){
						echo "<div class='form'>
					  <h3>You are registered successfully.</h3>
					  <p>Auto reloading <a href='login2.php'>page</a></p>";
					  header("refresh:3;url=login2.php");
					}

				 }else {
					echo "<div class='form'>
						  <h3>Password do not match</h3>
                      <br/>
                      <p>Auto reloading <a href='login2.php'>page</a></p>
                      </div>";
					header("refresh:3;url=login2.php");
              }
			}else{
				echo "<div class='form'>
						  <h3>Username has been used! Choose another name</h3>
                      <br/>
                      <p>Auto reloading <a href='login2.php'>page</a></p>
                      </div>";
					header("refresh:3;url=login2.php");
			}
        	
          }else{
		?>	
		
			<div class="form-structor">
	<form class = "signup" name="registration" action="" method="post">
		<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>

		<div class="form-holder">
			<input type="text" name="username_s" class="input" placeholder="Username" required />
			<input type="password" name="password_s" class="input" placeholder="Password" required />
			<input type="password" name="REpassword_s" class="input" placeholder="Enter your password again" required />
		</div>
		<button class="submit-btn">Sign up</button>
	</form>
	
	<form class = "login slide-up" action="" method="post" name="login">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Login</h2>
			<div class="form-holder">
				<input type="text" name="username" class="input" placeholder="Username" required />
				<input type="password" name="password" class="input" placeholder="Password" required />
			</div>
				<input type="submit" name="submit" class="submit-btn" value="Login" />

		</div>
	</form>
		</div>


		<?php 
		} 
	?>
	<script language="javascript" src="login2.js"></script>

</body>
</html>