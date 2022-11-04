<?php 


if(!isset($_SESSION['userdata']))
{
	if($pagetype =='ajax')
	{
		header('location:../index.php');	
	}
	/*else if($directory =='')
	{
		header('location:index.php');		
	}*/
}
else
{
	//echo isset($_SESSION['admindata']);
}


?>