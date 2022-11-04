<?php 
include('../init.php'); 
include('../dbcon.php');
include('../data/escape_string.php');
$pagetype='ajax';
$mainarray;

	$comment 	= $_REQUEST['comment'];
	$email 		= $_REQUEST['help_email'];
	$userid 	= $_REQUEST['userid'];
	
	
	/*insert query*/	
	$sql = "INSERT INTO tbl_comments(  user_id,
									   comment,
									   user_email) VALUES(?,?,?)";
	
	$mainarray['qq']= $sql;	
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($userid,
										$comment,
										$email));
	

	if($isExecute)
	{
		$mainarray['result']=true;
	}
	else
	{
		$mainarray['result']=false;
	}

	echo json_encode($mainarray);


