<?php 
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php'); 
include('../../data/escape_string.php');



$task = $_REQUEST['task'];
$input_username = $_REQUEST['input_username'];
$mainarray;

	
if($task =='username')
{	
	$mainarray['q']='qqqq';

	$successusername = usernamegen($input_username,$_REQUEST['input_username'],$conn);
	$mainarray['successusername'] = $successusername;

}


function usernamegen($input_username,$postusername,$dbConection)
{
	
	$sql = "SELECT * FROM tbl_user WHERE username = ?";
	$query = $dbConection->prepare($sql);//return $input_username;		
	$isExecute = $query->execute(array($input_username));            

	
	if($isExecute)
	{
		$rows = $query->rowCount();
	}
	else
	{
		$rows = -1;
	}

	if($rows==0)
	{
		return $input_username;
	}
	else
	{	
		$input_username = $postusername;
		
		$randcode = getRandomCode();
		
		
		
		
		$_input_username = $input_username.$randcode;
		
		return usernamegen($_input_username,$postusername);
	}

}


function getRandomCode()
{
	$an = "0123456789abcdefghijklmnopqrstuvwxyz";
	$su = strlen($an) - 1;
	
	return 	substr($an, rand(0, $su), 1) .
			substr($an, rand(0, $su), 1) .
			substr($an, rand(0, $su), 1) .
			substr($an, rand(0, $su), 1);
}


echo json_encode($mainarray);