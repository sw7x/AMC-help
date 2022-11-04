<?php 

if(!isset($_SESSION['admindata']))
{
	if($directory =='ajax')
	{
		header('location:../index.php');	
	}
	else if($directory =='')
	{
		header('location:index.php');		
	}
}
else
{
	//echo isset($_SESSION['admindata']);
}



?>