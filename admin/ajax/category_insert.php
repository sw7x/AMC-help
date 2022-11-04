<?php 
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php');
include('../../data/escape_string.php');
$dataarray;



$task = $_REQUEST['task'];

if($task == 'task1')
{
	$maincatvalue = $_REQUEST['maincatvalue'];	
	
	$sql="INSERT INTO tbl_category(cid,parent_id,category) VALUES('',0,?)";
  	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($maincatvalue));
	
	if($isExecute)
	{
		$dataarray['query1']=true;
		$dataarray['id'] = $conn->lastInsertId();;
		
	}
	else
	{
		$dataarray['query1']=false;
	}











}

if($task == 'task2')
{
	$maincatvalue = $_REQUEST['maincatvalue'];
	$subcatvalue = $_REQUEST['subcatvalue'];
	
	$sql="INSERT INTO tbl_category(cid,parent_id,category) VALUES('',?,?)";
  	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($maincatvalue,$subcatvalue));
	
	if($isExecute)
	{
		$dataarray['query2']=true;
		$dataarray['id'] = $conn->lastInsertId();
	}
	else
	{
		$dataarray['query2']=false;
	}
	
}


if($task == 'task3')
{
	$maincatvalue = $_REQUEST['maincatvalue'];
	$subcatvalue = $_REQUEST['subcatvalue'];
	$sub_subcatvalue = $_REQUEST['sub_subcatvalue'];
	
	
	
	$sql="INSERT INTO tbl_category(cid,parent_id,category) VALUES('',?,?)";
  	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($subcatvalue,$sub_subcatvalue));
	
	if($isExecute)
	{
		$dataarray['query3']=true;
		$dataarray['id'] = $conn->lastInsertId();
	}
	else
	{
		$dataarray['query3']=false;
	}
	
	
}








echo json_encode($dataarray);






?>