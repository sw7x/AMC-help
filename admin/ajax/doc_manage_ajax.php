<?php 
	$directory ='ajax';
	session_start();
	include('../../dbcon.php');
	include('../init.php');
	include('../../data/escape_string.php');
	
	$id = $_REQUEST['userid'];//d_userid
	$task = $_REQUEST['task'];//'delete'
	
	if($task =='block')
	{
		$sql = "SELECT status FROM tbl_docs WHERE id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($id));		
		$result = $query->fetch(PDO::FETCH_ASSOC);
		
		if($result['status'] == 0)
		{
			$stat = 0;
			/*change status to 1*/
		}
		else if($result['status'] == 1)
		{
			$stat = 1;			
		}

		$sql = "UPDATE tbl_docs SET status=? WHERE id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($stat,$id));
	

		$sql = "SELECT status FROM tbl_docs WHERE id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($id));		
		$result = $query->fetch(PDO::FETCH_ASSOC);
	
	 
		if($result['status']==1)
		{
		?>	
			<button class="btn btn-danger btn-xs block_docmanage" data-id="<?php echo $id; ?>">
				<span class="glyphicon glyphicon-lock"></span>
			</button>
		<?php  
		} 
		else if($result['status']==0)
		{
		?>
			<button class="btn btn-success btn-xs block_docmanage" data-id="<?php echo $id; ?>">
				<span class="glyphicon glyphicon-ok"></span>
			</button>
		<?php
		 }
		 else
		 {
			echo 'error';
		 }
		 
	
	
	
	}
	
	else if($task =='delete')
	{
		//delete file and 
		$sql = "SELECT filename,username FROM tbl_docs INNER JOIN tbl_user ON tbl_docs.userid=tbl_user.id WHERE tbl_docs.id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($id));		
		$result = $query->fetch(PDO::FETCH_ASSOC);
		
		$dataarray;
		//echo 'username'.$result['username'].'<br />';
		//echo 'filename'.$result['filename'].'<br />';
		
		$del_file_url = "../upload/".$result['username']."/".$result['filename'];
		if(is_dir($del_file_url))
		{
			unlink($del_file_url);
		}
		
		
		//delete record
		$sql = "DELETE FROM tbl_docs WHERE id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($id));
	
		if($query)
		{
			
			$dataarray['result']=true;
		}
		else
		{
			$dataarray['result']=false;
			
		}
	
	echo json_encode($dataarray);
	/*????????check unlink() is success ???????????*/
	}
?>

	
