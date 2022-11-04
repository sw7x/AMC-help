<?php
include "dbcon.php";
session_start();


if(isset($_SESSION['userdata']) && ($_SESSION['userdata']['logintype']!=='sample'))
{
	
	$t=time();
	$sql 	= "UPDATE tbl_user SET logout_time=? WHERE id=?"; 
	$query 	= $conn->prepare($sql);
	$isExecute = $query->execute($t,$_SESSION['userdata']['userid']);

	
	if($isExecute)
	{
		
	}
	else
	{
		
	}
}


unset($_SESSION['userdata']);



header('Location: index.php');
?>