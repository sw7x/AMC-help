<?php 

$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php'); 
include('../../data/escape_string.php');
$dataarray;
$dataarray['aaaa']='aaaaa';

$id=$_REQUEST['categoryid'];
$dataarray['categoryid'] = $id;


$sql = "SELECT * FROM tbl_category WHERE cid=?";
$query = $conn->prepare($sql);
$isExecute =  $query->execute(array($id));




if($isExecute)
{
	$rows = $query->rowCount();
}
else
{
	$rows = 0;
}

if($rows==1)
{
	
	$result = $query->fetch(PDO::FETCH_ASSOC);        
	$dataarray['category'] = $result['category'];
}
else
{
	
	$dataarray['category']='';
	
}

echo json_encode($dataarray);


?>