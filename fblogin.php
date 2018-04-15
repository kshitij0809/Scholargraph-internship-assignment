<?php
	include("connect.php");
	include("fbfunctions.php");
	
	if(fblogged_in())
	{
		header("location:profile.php");
		exit();
	}
	
	$error = "";
	if(isset($_POST['submit']))
	{
	
	    $email = mysqli_real_escape_string($con, $_POST['email']);
	    $token=$_POST['token'];
	    $password = mysqli_real_escape_string($con, $_POST['password']);
		$password = trim($_POST['password']);
		if(fb_email_exists($email,$con))
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
			else if($token!='fbjwt'){
				$error = "Token is incorrect";
				$_SESSION['token'] =$token;
				echo $_SESSION['token'];

			}
			else
			{
				$_SESSION['email'] = $email;
				$_SESSION['token'] =$token;
				echo $_SESSION['email'];
                echo $_SESSION['token'];
				
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
		
	<title>FB Login Page</title>
	<link rel="stylesheet" href="css/styles.css"  />
	
	</head>
	
	
	<body>
		
		<div id="error" style=" <?php  if($error !=""){ ?>  display:block; <?php } ?> "><?php echo $error; ?></div>
		
		<div id="wrapper">
			
			<div id="menu">
				<a href="fbsignup.php">Sign Up With FaceBook</a>
				<a href="fblogin.php">Login With FaceBook</a>
				<p>FB LOGIN TOKEN IS: fbjwt</p>
			</div>
			
			<div id="formDiv">
				
				<form method="POST" action="fblogin.php">
				
				<label>Email:</label><br/>
				<input type="text" class="inputFields"  name="email" required/><br/><br/>

				<label>FB Token:</label><br/>
				<input type="text" class="inputFields"  name="token" required/><br/><br/>
				
				
				<label>Password:</label><br/>
				<input type="password" class="inputFields"  name="password" required/><br/><br/>			
				
			   
				<input type="submit" name="submit" class="theButtons" value="login" />

				<a href="index.php">Sign Up Directly</a>
				
				</form>
			
			</div>
		
		</div>
		
	</body>

</html>