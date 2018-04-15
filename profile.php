<?php 

	include("connect.php");
	include("functions.php");
	include("fbfunctions.php");
	
	if(fblogged_in())
	{
	?>
	<head>
		
	<title>Profile Page</title>
	<link rel="stylesheet" href="css/styles.css"  />
	
	</head>
		<h3>You Are Logged In Successfully with FaceBook</h3>
		<a href="logout.php" style="float:right; padding:10px; margin-right:40px; background-color:#eee; color:#333; text-decoration:none;">Logout</a>
	
	<?php 
		
	}
	elseif(logged_in())
	{
	?>
	<head>
		
	<title>Profile Page</title>
	<link rel="stylesheet" href="css/styles.css"  />
	
	</head>
		<h3>You Are Logged In Successfully</h3>
		<a href="logout.php" style="float:right; padding:10px; margin-right:40px; background-color:#eee; color:#333; text-decoration:none;">Logout</a>
	
	<?php 
		
	}
	else
	{
		header("location:login.php");
		exit();
	}

?>