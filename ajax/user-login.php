<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('../dbcon.php');
include('../data/escape_string.php');
$pagetype='ajax';




/*----------------------------------------------------------*/

$email = escape_string($_REQUEST['email']);
$value = $_REQUEST['value'];
$mainarray;





if($value =='email')
{
	
	
	$sql = "SELECT * FROM tbl_user WHERE email=? AND account_status=1";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($email));
	
	//$query->debugDumpParams();





	$mainarray['queryemail'] = $sql;
	
	
	if($isExecute)
	{
		$rows = $query->rowCount(); 
	}
	else
	{
		$rows = 0;
	}
	



	
	if($rows==1)
	{
		
		$mainarray['result']='success';
	}
	else
	{
		$mainarray['result']='failed';
	}
	
	
}
else if($value =='sample_account')//if check login time -logout time =4h
{
	$email_para = escape_string($_REQUEST['email_para']);
	$amc_para 	= escape_string($_REQUEST['amc_para']);




	if(	$amc_para != 'amc1' && 	$amc_para != 'amc2' ){
		$mainarray['result']='failed';
		$mainarray['message']='login mismatch in System';
		//var_dump('expression');
	}

	if(	$email_para == '' || 	$email_para == null){
		$mainarray['result']='failed';
		$mainarray['message']='login mismatch in System';
		//var_dump('expression111');
	}

	if(	$email_para == $email){
		//var_dump('expression222');;
		$mainarray['result']='success';
		$mainarray['message']='correct_login';
		$mainarray['redirect']='pdf.php';


		$sql = "SELECT * FROM tbl_user WHERE username=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($amc_para));
		$result = $query->fetch(PDO::FETCH_ASSOC);  


		session_start();
		$_SESSION['userdata'] = array(
										'is_login'=>true,
										'firstname'=>$amc_para,
										//'email'=>$result['email'],
										'userid'=>$result['id'],
										'username'=>$amc_para,
										'logintype'=>'sample');

		//var_dump($_SESSION['userdata']);

	}else{
		$mainarray['result']='failed';
		$mainarray['message']='login mismatch in System';
	}

}
else if($value =='pass')//if check login time -logout time =4h
{
	


	$password = escape_string($_REQUEST['password']);
	
	/*****************************************************************************/
	//$sql = "SELECT * FROM tbl_user WHERE email ='".$email."' AND password ='".$password."' AND account_status=1 AND country='".$location['country']."'";
	$sql = "SELECT * FROM tbl_user WHERE email =? AND password =? AND account_status=1";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($email,$password));
	//$query->debugDumpParams();



	if($query)
	{
		$rows = $query->rowCount(); 
	}
  	else
	{
		$rows = 0;
	}
	
	if($rows == 0)
	{
		$mainarray['log query']=$sql;
		$mainarray['result']='failed';
		$mainarray['message']='wrong_inputs';
		
	}//????????????????????????????country mismatch message
	else if($rows == 1)
	{
		$result = $query->fetch(PDO::FETCH_ASSOC);   
			
		$mainarray['if']=2;	
		
		
		session_start();
		$_SESSION['userdata'] = array(
														'is_login'=>true,
														'firstname'=>$result['firstname'],
														'email'=>$result['email'],
														'userid'=>$result['id'],
														'username'=>$result['username'],
														'logintype'=>'normal',
														
													);
		
		//var_dump($_SESSION['userdata']);
		
		
		$mainarray['result']='success';
		$mainarray['message']='correct_login';
		$mainarray['redirect']='pdf.php';
		
		
	}
	else
	{
		$mainarray['result']='failed';
		$mainarray['message']='login mismatch in System';
		
	}
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	
	
}


echo json_encode($mainarray);
?>