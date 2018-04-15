<?php

	include("connect.php");
	include("functions.php");
	?>



<!doctype html>

<html>
	
	<head>
		
	<title>Registration Page</title>
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
				
				<form method="POST" action="index.php" enctype="multipart/form-data">
				
				<label>First Name:</label><br/>
				<input type="text" name="fname" class="inputFields" required/><br/><br/>
				
				
				
				<label>Email:</label><br/>
				<input type="text" name="email"  class="inputFields" required/><br/><br/>

			
				<label>Password:</label><br/>
				<input type="password" name="password" class="inputFields"  required/><br/><br/>
				
				<label>Re-enter Password:</label><br/>
				<input type="password" name="passwordConfirm"  class="inputFields" required/><br/><br/>
			
				
				<input type="submit"  class="theButtons"  name="submit" />

				
				
				</form>
			
			</div>
		
		</div>
		
	</body>

</html>

<!--<form method="POST" action="index.php" enctype="multipart/form-data">The enctype is needed to upload files or images-->
<!--<label>First Name:</label>  Label tag is new in html5-->