<?php 
include('../init.php'); 
include('../dbcon.php');
include('../data/escape_string.php');
$pagetype='ajax';
//include('redirect.php'); 



$email_in_url = escape_string($_REQUEST['email_parameter']);
$value = $_REQUEST['value'];
$mainarray;

$sql = "SELECT * FROM tbl_user WHERE email=?";
$query = $conn->prepare($sql);
$isExecute =  $query->execute(array($email_in_url));



if($isExecute)
{
	$rows = $query->rowCount(); 
}
else
{
	$rows = 0;
}

$result = $query->fetch(PDO::FETCH_ASSOC);
$DBemail = $result['email'];
$DBpass = $result['password'];
	
if($value =='email')
{	
	$email = $_REQUEST['email'];	
	
	$mainarray['DBemail'] = $DBemail;
	$mainarray['email'] = $email;
	$mainarray['email_in_url'] = $email_in_url;
	/*{	"DBemail":"susanthawarnapura@gmail.com",
	  	  "email":"susanthawarnapura@gmail.com",
   "email_in_url":"susanthawarnapura@gmail.com","result":"failed"}*/
	
	if(($email == $DBemail) && ($email == $email_in_url) && ($rows==1))
	{
		
		$mainarray['result']='success';
		
	}
	else
	{
		
		$mainarray['result']='failed';
	}
	
	
}
else if($value =='pass')
{
	$password = escape_string($_REQUEST['password']);
	
	if($password == $DBpass)
	{

		$mainarray['result']='success';	
		$sql = "UPDATE tbl_user SET account_status = 1 WHERE email=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($email_in_url));
		 
	}
	else
	{
		$mainarray['result']='failed';
	}	
	
}


echo json_encode($mainarray);
?>