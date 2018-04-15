<?php

	include("connect.php");
	include("functions.php");
	
	

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
				<input type="text" class="inputFields"  value="<?php echo $_SESSION['email'] ?>"  name="email" required/><br/><br/>
				
				
				<label>Password:</label><br/>
				<input type="password" class="inputFields"  value="<?php echo $_SESSION['password'] ?>"  name="password" required/><br/><br/>
				
				<input type="checkbox" name="keep" />
				<label>Keep me logged in</label><br/><br/>
			   
				<input type="submit" name="submit" class="theButtons" value="login" />

				
				
				</form>
			
			</div>
		
		</div>
		
	</body>

</html>