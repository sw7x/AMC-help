<?php 
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php');
include('../../data/escape_string.php');

$mainarray;

$filename = $_REQUEST['filename'];
$docname = $_REQUEST['docname'];
$userid = $_REQUEST['userid'];
$categoryid = $_REQUEST['categoryid'];

$mainarray['docname'] = $docname;
$mainarray['userid'] = $userid;

$sql = "SELECT * FROM tbl_user INNER JOIN tbl_docs ON tbl_user.id=tbl_docs.userid WHERE tbl_user.id=?";
$query = $conn->prepare($sql);
$isExecute =  $query->execute(array($userid));
              

if($isExecute)
{
	$rows = $query->rowCount();
}
else
{
	$rows = 0;
}


$result = $query->fetch(PDO::FETCH_ASSOC);
$mainarray['user'] = $result['username'];
$mainarray['rows']=$rows; 

if($rows>=20)
{
	$mainarray['filecount']='invalid';
}
else
{
	$mainarray['filecount']='valid';
	
	$sql = "SELECT * FROM tbl_user INNER JOIN tbl_docs ON tbl_user.id=tbl_docs.userid WHERE tbl_user.id=? AND filename=?";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($userid,$filename));
	


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
		$mainarray['filenamevalidity']='valid';
	}
	else
	{
		$mainarray['filenamevalidity']='invalid';	
	}
}
///check same filename same user????????????????????????
$mainarray['a'] = '////';
echo json_encode($mainarray);
?>