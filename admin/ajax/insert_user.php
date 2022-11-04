<?php 
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php');
include('../../data/escape_string.php');
$dataarray;


//echo 'country - '.$_REQUEST['country'];


//echo '1111111';
$fname = escape_string($_REQUEST['firstname']);
$lname = escape_string($_REQUEST['lastname']);
$email = escape_string($_REQUEST['email']);
$country = $_REQUEST['country'];
$username = escape_string($_REQUEST['username']);
$tpnumber =  escape_string($_REQUEST['tpnumber']);
$tpcountry = escape_string($_REQUEST['tpcountry']);
$amcv = escape_string($_REQUEST['amcv']);
$pwcode = escape_string($_REQUEST['pwcode']);



if(	isset($fname) && $fname !=='' &&
	isset($lname) && $lname !=='' &&
	isset($email) && $email !=='' &&
	isset($country) && $country !=='' &&
	isset($username) && $username !=='')
{
	
	//var_dump('expression1111');
	
	$sql="SELECT * FROM tbl_user WHERE email=?";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($email));
	
	
	if($isExecute)
	{
		$rows = $query->rowCount();
		
		if($rows==0)
		{
			


			//generate reg link 
			$rgLink = generateRegLink($email);

			

			$sql = "INSERT INTO tbl_user(firstname,
										lastname,
										email,
										country,
										username,
										tel_country,
										tel_number,
										reglink,
										amc,
										password,
										account_status) VALUES(?,?,?,?,?,?,?,?,?,?,1)";

			$query = $conn->prepare($sql);
			$isExecute =  $query->execute(array( $fname,
												 $lname,
												 $email,
												 $country,
												 $username,
												 $tpcountry,
												 $tpnumber,
												 $rgLink,
												 $amcv,
												 $pwcode));

			//$query->debugDumpParams();
			    
			if($isExecute == true)
			{	
				

				//email reg link
				//emailRegLink($email,$rgLink,$pwcode);


				$dataarray['result']='success';
				
			}
			else
			{
				$dataarray['result']='failed';
				
			}
		
		}
		else
		{
			$dataarray['result']='exsists';
			
		}
		
		
	}
  	else
	{
		$rows = 0;
		$dataarray['result']='failed';
		
	}
	
	
	
	

}
else
{
	
	
	
}		


echo json_encode($dataarray);	
//mysql_close($dbcon);
	



function generateRegLink($email){

	$reglink='';
	
	//$siteAddress = 'http://demo.ozisolutions.com/amcpdf/';
	$siteAddress = 'http://amchelp.susnathaonline.com/';
	//$siteAddress = 'http://local.amchelp.com/';

	$para_text_encode = base64_encode($email);
	
	
	
	//this is url send to user
	$real_link = "id=123sdsSDcSE33sdYasdfWH&parameter=qw2dqfDKsdn4KrsT9&A8hy=".$para_text_encode."&SN9p=tvsHDW890Kbntdf";
	
	
	$encode_link = base64_encode($real_link);					  
	$reglink = $siteAddress."index.php?doctor=".$encode_link;
	return $reglink;
	
	
	

		
	
	

	
	// if(($_SESSIOn['userdata']['username']!=='amc1') && ($_SESSIOn['userdata']['username']!=='amc2'))
	// {
	// 	$sql = "UPDATE tbl_user SET reglink=? WHERE tbl_user.id=?";
	// 	$query = $conn->prepare($sql);
	// 	$isExecute =  $query->execute(array($link,$userid));
						


	// 	if($isExecute)
	// 	{
	// 		ini_set("sendmail_from","doc@dochelp.net");
	// 		mail($to,$subject,$txt,$headers);
	// 	}
	// 	else
	// 	{
			
	// 	}
	// }
	
}



function emailRegLink($email,$link,$pwcode){

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: dochelp@example.com" . "\r\n" .	"CC: susanthawarnapura@gmail.com";
	
	$to = $email;
	$subject = "Account Activation";
	$txt  = "your account Username - ".$email."<br>";
	$txt .= "your account Password - ".$pwcode."<br>";



	// Please specify your Mail Server - Example: mail.example.com.
	ini_set("SMTP","mail.example.com");

	// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
	ini_set("smtp_port","25");

	// Please specify the return address to use
	ini_set ("sendmail_from","doc@dochelp.net");

	mail($to,$subject,$txt,$headers);



}