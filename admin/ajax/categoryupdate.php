<?php 

$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php'); 
include('../../data/escape_string.php');

$datarray;
$matched;

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];

if(isset($id) && isset($name))
{
	$datarray['id'] = $id;
	
	$sql = "SELECT * FROM tbl_category WHERE parent_id IN(SELECT parent_id FROM tbl_category WHERE cid=?)";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($id));
	$results = $query->fetchAll(PDO::FETCH_ASSOC); 
	
	foreach($results as $result )
	{
		if(strtolower($result['category'])==strtolower($name))
		{
			$matched = true;
			break;	
		}
		else
		{
			$matched = false;
		}
	}
	
	if($matched == false)
	{
		$sql = "UPDATE tbl_category SET category=? WHERE cid=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($name,$id));
		
		
		if($isExecute)
		{
			$datarray['result']=true;
		}
		else
		{
			$datarray['result']=false;
		}
		
	}
	else
	{
		$datarray['result']=NULL;
	}

}
else
{
	
	$datarray['result']=false;
}

echo json_encode($datarray);

?>