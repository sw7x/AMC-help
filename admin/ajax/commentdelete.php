<?php 
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php'); 
include('../../data/escape_string.php');
$mainarray;


if(isset($_REQUEST['commmentid']))
{
	$commmentid = $_REQUEST['commmentid'];
	$sql = "SELECT * FROM tbl_comments WHERE id=?";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($commmentid));
	

	
	
	
	if($isExecute)
	{
		$rows = $query->rowCount();
		if($rows==1)
		{
			$sql = "DELETE FROM tbl_comments WHERE id=?";
			$query = $conn->prepare($sql);
			$isExecute2 =  $query->execute(array($commmentid));

			if($isExecute2)
			{
				$mainarray['result']=true;
					
			}
			else
			{
				$mainarray['result']='false1';	
				
			}
			
		}
		else
		{
			
			$mainarray['result']='false2';	
			
		}
	}
	else
	{
		$rows =0;
		$mainarray['result']='false3';
	}
	
	
}









echo json_encode($mainarray);