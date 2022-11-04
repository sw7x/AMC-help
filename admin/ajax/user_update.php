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
		$firstname = escape_string($_REQUEST['firstname']);
		$lastname = escape_string($_REQUEST['lastname']);
		$email = escape_string( $_REQUEST['email']);
		$country = $_REQUEST['country'];
		$username = escape_string($_REQUEST['username']);
		$tpcountry = escape_string($_REQUEST['tpcountry']);
		$tpnumber = escape_string($_REQUEST['tpnumber']);
		$amcv = escape_string($_REQUEST['amcv']);
		
		
		
		
		
		
		
		$sql="SELECT * FROM tbl_user WHERE email=? AND id!=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($email,$updateid));
		


		if($isExecute)
		{			
			$rows = $query->rowCount();

			if($rows==0)
			{
				$sql = "UPDATE tbl_user SET 
										firstname=?,
										lastname=?,
										username=?,
										email=?,
										country=?,
										tel_country=?,
										tel_number=?,
										amc=? WHERE id=?";

				$query = $conn->prepare($sql);
				$isExecute =  $query->execute(array($firstname,
													$lastname,
													$username,
													$email,
													$country,
													$tpcountry,
													$tpnumber,
													$amcv,
													$updateid));
		   


				
				if($isExecute == true)
				{	
					$mainarray['result']='success';
					
					$sql = "SELECT * FROM tbl_user WHERE id=?";
					$query = $conn->prepare($sql);
					$isExecute =  $query->execute(array($updateid));
					$result = $query->fetch(PDO::FETCH_ASSOC);    
				
					$mainarray['userinfo']['firstname']=$result['firstname'];
					$mainarray['userinfo']['lastname']=$result['lastname'];
					$mainarray['userinfo']['email']=$result['email'];
					$mainarray['userinfo']['username']=$result['username'];
					$mainarray['userinfo']['tpnumber']=$result['tel_number'];
					$mainarray['userinfo']['tpcountry']=$result['tel_country'];
					$mainarray['amc']=$result['amc'];
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
		$sql = "SELECT * FROM tbl_user WHERE id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($updateid));
		$result = $query->fetch(PDO::FETCH_ASSOC);                

		
		$mainarray['result']=true;
		
		$mainarray['id']=$updateid;
		$mainarray['firstname']=$result['firstname'];
		$mainarray['lastname']=$result['lastname'];
		$mainarray['email']=$result['email'];
		$mainarray['username']=$result['username'];
		$mainarray['tpnumber']=$result['tel_number'];
		$mainarray['tpcountry']=$result['tel_country'];
		$mainarray['country']=$result['country'];
		
		$mainarray['amc']=$result['amc'];
		$mainarray['reg_link']=$result['reglink'];
	}
	

echo json_encode($mainarray);

?>

	 
     



 

