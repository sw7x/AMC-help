<?php 
include('../init.php'); 
include('../dbcon.php');
include('../data/escape_string.php');
$mainarray;
$pagetype='ajax';



$email = $_REQUEST['email'];
$pwcode = $_REQUEST['pwcode'];
$task = $_REQUEST['task'];

if($task =='normal_user')
{
	$sql="UPDATE tbl_user SET password=? WHERE email=?";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($pwcode,$email));
	
	if($isExecute)
	{
		$mainarray['result']=true;
		
		
		
		
		$sql = "SELECT * FROM tbl_user WHERE email=?"; 
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($email));
		$result = $query->fetch(PDO::FETCH_ASSOC);



		$tel = "'".$result['tel_country'].$result['tel_number']."'";
		
		include('../admin/sms.php');
		$client = new Services_Twilio($account_sid, $auth_token);
		$client->account->messages->create(array	( 
													 'To' => '"'.$tel.'"', 
													 'From' => "+17046757068", 
													 'Body' => "dochelp.net Login\n code - ".$pwcode,  )
													 
																					);
		
		
		
	}
	else
	{
		$mainarray['result']=false;
		
	}
	
}
else if($task =='sample_user')
{
	$amcv = $_REQUEST['amc'];
	
	
	if($amcv=='amc1')
	{
		$sql="UPDATE tbl_user SET amc1password=? WHERE email=?";
	}
	else
	{
		$sql="UPDATE tbl_user SET amc2password=? WHERE email=?";
	}
	
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($pwcode,$email));

	
	if($isExecute)
	{
		$mainarray['result']=true;
		
		$sql = "SELECT * FROM tbl_user WHERE email=?"; 
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($email));
		$result = $query->fetch(PDO::FETCH_ASSOC);
		
		$tel = "'".$result['tel_country'].$result['tel_number']."'";
		
		include('../admin/sms.php');
		$client = new Services_Twilio($account_sid, $auth_token);
		$client->account->messages->create(array	( 
													 'To' => '"'.$tel.'"', 
													 'From' => "+17046757068", 
													 'Body' => "dochelp.net\n".$amcv." sample user Login\n code - ".$pwcode,  )
													 
																					);
		
		
		
	}
	else
	{
		$mainarray['result']=false;
		
	}
	
	
}


echo json_encode($mainarray);
?>