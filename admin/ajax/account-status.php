<?php 
	$directory ='ajax';
	session_start();
	include('../../dbcon.php');
	include('../init.php');
	include('../../data/escape_string.php');
	
	$id = $_REQUEST['userid'];//d_userid



	$sql = "SELECT * FROM tbl_user WHERE id=?";
	$query = $conn->prepare($sql);
	$query->execute(array($id));
	$result = $query->fetch(PDO::FETCH_ASSOC);                

	
	if($result['account_status'] == 0)
	{
		/*change status to 1*/
		$sql = "UPDATE tbl_user SET account_status=1 WHERE id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($id));

		
		
		
	}
	else if($result['account_status'] == 1)
	{
		
		/*change status to 0*/
		$sql = "UPDATE tbl_user SET account_status=0 WHERE id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($id));
	}
	
?>



                
<?php 

	$sql = "SELECT * FROM tbl_user WHERE id=?";
	$query = $conn->prepare($sql);
	$query->execute(array($id));
	$result = $query->fetch(PDO::FETCH_ASSOC); 
	
	if($result['account_status']==1)
	{
	?>	
		<a href="" class="disable_user btn btn-danger btn-xs" data-title="Edit" data-id="<?php echo $id;?>"><span class="glyphicon glyphicon-ban-circle"></span></a>
		
	<?php
	}
	else if($result['account_status'] ==0)
	{	
	?>
		<a href="" class="enable_user btn btn-success btn-xs" data-title="Edit" data-id="<?php echo $id;?>"><span class="glyphicon glyphicon-ok"></span></a>
	<?php
	}
	elseif(is_null($result['account_status']))
	{
		echo 'onhold';
	}
	else
	{	
		echo 'error';
	}
?>
                                

								
								
								



