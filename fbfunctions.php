<?php 
	
	function fb_email_exists($email, $con)
	{
		
		$result = mysqli_query($con,"SELECT id FROM fbusers WHERE email='$email'");
		
		if(mysqli_num_rows($result) == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	
	function fblogged_in()
	{

			if((isset($_SESSION['email']) || isset($_COOKIE['email']))&& (isset($_SESSION['token'])))
			{
				return true;
			}
			else
			{
				return false;
			}
	}

?>


