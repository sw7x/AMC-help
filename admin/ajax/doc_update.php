<?php 
	$directory ='ajax';
	session_start();
	include('../init.php');
	include('../../dbcon.php'); 
	include('../../data/escape_string.php');
	$mainarray;



	$task = escape_string($_REQUEST['task']);
	$updateid = escape_string($_REQUEST['updateid']);
	
	if($task=='update')
	{
		$docname = escape_string($_REQUEST['docname']);
		if($docname=='')
		{
			$mainarray['result']='failed';
			echo json_encode($mainarray);
			die();
		}
		
		$userid = escape_string($_REQUEST['userid']);
		
		$sql="SELECT * FROM tbl_docs WHERE userid=? AND doc_name=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($userid,$docname));





		
		if($isExecute)
		{
			$rows = $query->rowCount();
			
			if($rows==0)
			{
				$sql = "UPDATE tbl_docs SET doc_name=? WHERE id=?";
				$query = $conn->prepare($sql);
				$isExecute =  $query->execute(array($docname,$updateid));
				
				
				if($isExecute == true)
				{	
					$mainarray['result']='success';
					
					$sql       = "SELECT * FROM tbl_docs WHERE id=?";
					$query     = $conn->prepare($sql);
					$isExecute =  $query->execute(array($updateid));
					$result    = $query->fetch(PDO::FETCH_ASSOC);   



					$mainarray['userinfo']['docname']=$result['doc_name'];
					$mainarray['userinfo']['id']=$result['id'];
					$mainarray['userinfo']['userid']=$result['userid'];
				
				}
				else
				{
					$mainarray['result']='failed';
				}
			
			}
			else
			{
				$mainarray['result']='exsists';
			}
			
			
		}
		else
		{
			$rows = 0;
			$mainarray['result']='failed';
			
		}
		
	}
	if($task=='view')
	{
		$sql = "SELECT * FROM tbl_docs WHERE id=".$updateid;
		$query     = $conn->prepare($sql);
		$isExecute =  $query->execute(array($updateid));
		$result    = $query->fetch(PDO::FETCH_ASSOC);   
		
		$mainarray['result']=true;
		
		$mainarray['docid']=$updateid;
		$mainarray['filename']=$result['filename'];
		$mainarray['docname']=$result['doc_name'];
		$mainarray['user_id']=$result['userid'];
	}
	

echo json_encode($mainarray);

?>

	 
     



 

