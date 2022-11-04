<?php 
include('../init.php'); 
include "../dbcon.php";
include('../data/escape_string.php');
//check warning > 0
$dataarray;
$pagetype='ajax';

$ip = $_REQUEST['ip'];
//include('redirect.php'); 



function timetilllastlogged($useremail)
{
	$timeperiod;
	$sql = "SELECT * FROM tbl_user WHERE email=?";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($useremail));
	
	if($isExecute)
	{
		$rows = $query->rowCount();; 
	}
	else
	{
		$rows = 0;
		
	}
	
	
	if($rows==1)
	{
		$t=time();
		if($result['login_time']!==NULL || !isset($result['login_time']))
		{
			$timeperiod = $t - $result['login_time'];	
			
		}
		else
		{
			$timeperiod=-1;
		}
		
		return $timeperiod;
	}
	else
	{
		$timeperiod =-1;
		return $timeperiod;
	}
	
}



if(isset($_SESSION['userdata']) && ($_SESSION['userdata']['logintype']!=='sample'))
{
	$sql = "SELECT * FROM tbl_user where id=?";	
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($_SESSION['userdata']['userid']));


	if($isExecute)
	{
		$rows = $query->rowCount();	
	}
	else
	{
		$rows =0;
	}
	
	if($rows==1)
	{
		$result = $query->fetch(PDO::FETCH_ASSOC); 
		if($result['ipaddress']==$ip)
		{
			if($result['account_status'] == 1)
			{
				$t=time();
				if($result['login_time']!==NULL && isset($result['login_time']))
				{
					$timeperiod = $t - $result['login_time'];	
					if($timeperiod < 60*60*4)
					{
						$dataarray['feedback'] = true;
					}
					else
					{
						$dataarray['feedback'] = false;
					}
				}
				else
				{
					//$timeperiod=-1;
					$dataarray['feedback'] = false;
				}
			}
			else
			{	
				$dataarray['feedback'] = false;
				//$sql = "UPDATE tbl_user SET warnings=0,account_status=0 WHERE id=".$_SESSION['userdata']['userid'];
				//$query = mysql_query($sql );
			}
			
		}
		else
		{
			$dataarray['feedback'] = false;
			
		}
		
	}
	else
	{
		$dataarray['feedback'] = false;
	}
	
}
else
{
	$dataarray['feedback'] = false;
}

echo json_encode($dataarray);
?>