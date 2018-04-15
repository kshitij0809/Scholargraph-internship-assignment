<?php

	include("connect.php");
	include("fbfunctions.php");
	if(logged_in())
	{
		header("location:profile.php");
		exit();
	}
	
	$error = "";

	if(isset($_POST['submit']))
	{
		$fname = mysqli_real_escape_string($con, $_POST['fname']);
	    $email = mysqli_real_escape_string($con, $_POST['email']);
	    $password = $_POST['password'];
	    $passwordConfirm = $_POST['passwordConfirm'];
	    

      
		
		
		if(strlen($fname) < 3)
		{
			$error = "First name is too short";
		}
		
		
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error = "Please enter valid email address";
		}
		else if(email_exists($email, $con))
		{
			$error = "Someone is already registered with this email";
		}
		else if(strlen($password) < 8)
		{
			$error = "Password must be greater than 8 characters";
		}
		else if($password !== $passwordConfirm)
		{
			$error = "Password does not match";
		}
		
		else
		{	
				$password = password_hash($password, PASSWORD_DEFAULT);
				
				
					$insertQuery = "INSERT INTO `fbusers`(`fname`, `email`, `password`) VALUES ('$fname','$email','$password')";


					if(mysqli_query($con, $insertQuery))
					{
						
							$error = "You are successfully registered";					
				
				    }
		}
							
	}

?>



<!doctype html>

<html>
	
	<head>
		
	<title>FaceBook Registration Page</title>
	<link rel="stylesheet" href="css/styles.css"  />
	
	</head>
	
	
	<body>
		
		<div id="error" style=" <?php  if($error !=""){ ?>  display:block; <?php } ?> "><?php echo $error; ?></div>
		
		<div id="wrapper">
			
			<div id="menu">
				<a href="fbsignup.php">Sign Up With FaceBook</a>
				<a href="fblogin.php">Login With FaceBook</a>
			</div>
			
			<div id="formDiv">
				
				<form method="POST" action="fbsignup.php" enctype="multipart/form-data">
				
				<label>First Name:</label><br/>
				<input type="text" name="fname" class="inputFields" required/><br/><br/>
				
				
				
				<label>Email:</label><br/>
				<input type="text" name="email"  class="inputFields" required/><br/><br/>

			
				<label>Password:</label><br/>
				<input type="password" name="password" class="inputFields"  required/><br/><br/>
				
				<label>Re-enter Password:</label><br/>
				<input type="password" name="passwordConfirm"  class="inputFields" required/><br/><br/>
			
				
				<input type="submit"  class="theButtons"  name="submit" />

				<a href="index.php">Sign Up Directly</a>
				
				</form>
			
			</div>
		
		</div>
		
	</body>

</html>

