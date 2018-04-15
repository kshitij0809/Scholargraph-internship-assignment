<?php
	include("connect.php");
	include("functions.php");
	
	if(logged_in())
	{
		header("location:profile.php");
		exit();
	}
	
	$error = "";
	if(isset($_POST['submit']))
	{
	
	    $email = mysqli_real_escape_string($con, $_POST['email']);
	    $password = mysqli_real_escape_string($con, $_POST['password']);
		$password = trim($_POST['password']);
		if(email_exists($email,$con))
		{
			$result = mysqli_query($con, "SELECT password FROM users WHERE email='$email'");
			$retrievepassword = mysqli_fetch_assoc($result);
			if(password_verify($password, $retrievepassword))
			{
				echo $password;
				echo "<br/>";
				echo $retrievepassword['password'];
				$error = "Password is incorrect";
			}
			else
			{
				$_SESSION['email'] = $email;
				
				
				setcookie("email",$email, time()+3600);
				
				header("location: profile.php");
			}
			
			
		}
		else
		{
			$error = "Email Does not exists";
		}
		
	
	}
?>



<!doctype html>

<html>
	
	<head>
		
	<title>Login Page</title>
	<link rel="stylesheet" href="css/styles.css"  />
	
	</head>
	
	
	<body>
		
		<div id="error" style=" <?php  if($error !=""){ ?>  display:block; <?php } ?> "><?php echo $error; ?></div>
		
		<div id="wrapper">
			
			<div id="menu">
				<a href="index.php">Sign Up</a>
				<a href="login.php">Login</a>
			</div>
			
			<div id="formDiv">
				
				<form method="POST" action="login.php">
				
				<label>Email:</label><br/>
				<input type="text" class="inputFields"  name="email" required/><br/><br/>
				
				
				<label>Password:</label><br/>
				<input type="password" class="inputFields"  name="password" required/><br/><br/>			
				
			   
				<input type="submit" name="submit" class="theButtons" value="login" />

				<a href="fbsignup.php">Sign Up with FaceBook</a>
				
				</form>
			
			</div>
		
		</div>
		
	</body>

</html>