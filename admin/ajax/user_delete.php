<?php
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php');
include('../../data/escape_string.php');
$dataarray;

$userid = $_REQUEST['userid'];
//echo 'userid'.$userid;

$sql_user   = "SELECT * FROM tbl_user WHERE id=?";
$query_user = $conn->prepare($sql_user);
$isExecute =  $query_user->execute(array($userid));
if($isExecute)
{
	$user_rows = $query_user->rowCount();
}
else
{
	$user_rows = 0;
}




$sql_userdocs = "SELECT * FROM tbl_user INNER JOIN tbl_docs ON tbl_user.id=tbl_docs.userid WHERE tbl_user.id=?";
$query__userdocs = $conn->prepare($sql_userdocs);
$isExecute =  $query__userdocs->execute(array($userid));

if($isExecute)
{
	$userdocs_rows = $query__userdocs->rowCount();
}
else
{
	$userdocs_rows = 0;
}


if($user_rows==0)
{
	$dataarray['result']=false;
} 
else
{
	if($userdocs_rows==0)
	{
		//delete docs and user
		$sql_ud = "DELETE FROM tbl_user WHERE id=?";
		$query_ud = $conn->prepare($sql_ud);
		$isExecute =  $query_ud->execute(array($userid));
		if($query_ud)
		{
			$dataarray['result']=true;	
		}
		else
		{
			$dataarray['result']=false;
		}
	} 
	else
	{
		//delete only user
		$sql_u = "DELETE tbl_user,tbl_docs FROM tbl_user INNER JOIN tbl_docs ON tbl_user.id=tbl_docs.userid WHERE tbl_user.id=?";
		$query_u = $conn->prepare($sql_u);
		$isExecute =  $query_u->execute(array($userid));

		if($query_u)
		{
			$dataarray['result']=true;	
		}
		else
		{
			$dataarray['result']=false;
		}
		
	}

	
}



//echo $sql;


echo json_encode($dataarray);

?>











