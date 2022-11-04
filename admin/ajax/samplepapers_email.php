<?php 
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php'); 
include('../../data/escape_string.php');

$task = $_REQUEST['task'];
$mainarray;
$email = $_REQUEST['email'];


//$siteAddress = 'http://demo.ozisolutions.com/amcpdf/';
$siteAddress = 'http://amchelp.susnathaonline.com/';
//$siteAddress = 'http://local.amchelp.com/';



if($task=='generate')
{
				$amcversion = $_REQUEST['amcversion'];
				$user = $_REQUEST['user'];
				$email = $_REQUEST['email'];
				$mainarray['email']=$email;
	
	
				// email=abc@gmail.com-> ZW1haWw9YWJjQGdtYWlsLmNvbQ==
				$para_text = "email=".$email;
				$para_text_encode = base64_encode($para_text);
				
				//amc=amc1 -> YW1jPWFtYzE=
				$amc_text = "amc=".$amcversion;
				$amc_text_encode = base64_encode($amc_text);
				
				
				//this is url send to user
				//$real_link = "index.php?id=123sdsSDcSE33sdYasdfWH&parameter=qw2dqfDKsdn4KrsT9&A8hy=ZW1haWw9c3VzYW50aGF3YXJuYXB1cmFAZ21haWwuY29t&SN9p=tvsHDW890Kbntdf&ptr=YW1jPWFtYzE=";
				$real_link = "id=123sdsSDcSE33sdYasdfWH&parameter=qw2dqfDKsdn4KrsT9&A8hy=".$para_text_encode."&SN9p=tvsHDW890Kbntdf&ptr=".$amc_text_encode;
				
				
				$encode_link = base64_encode($real_link);					  
				$link = $siteAddress."index.php?selected_page=sample-account&doctor=".$encode_link;
				//$link = "localhost/amchelp/index.php?doctor=".$encode_link;
				
				//$link = "localhost/amcpdf3/index.php?doctor=aWQ9MTIzc2RzU0RjU0UzM3NkWWFzZGZXSCZwYXJhbWV0ZXI9cXcyZHFmREtzZG40S3JzVDkmQThoeT1aVzFoYVd3OVlXSmpRR2R0WVdsc0xtTnZiUT09JlNOOXA9dHZzSERXODkwS2JudGRm"
				
				//http://demo.ozisolutions.com/amcpdf/index.php?doctor=aWQ9MTIzc2RzU0RjU0UzM3NkWWFzZGZXSCZwYXJhbWV0ZXI9cXcyZHFmREtzZG40S3JzVDkmQThoeT1aVzFoYVd3OVlXSmpaR1ZtWjBCbmJXRnBiQzVqYjIwPSZTTjlwPXR2c0hEVzg5MEtibnRkZllXMWpQV0Z0WXpFPQ==
				
				
				$mainarray['emaillink'] = $link;
				
				
			
}
else if($task=='send')
{
				$link = $_REQUEST['emaillink'];
				
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: dochelp@example.com" . "\r\n" .	"CC: susanthawarnapura@gmail.com";
				
				$to = $email;
				$subject = "Sample Account";
				$txt = "Sample account Activated Link - ".$link;
				
				ini_set ("sendmail_from","doc@dochelp.net");
				mail($to,$subject,$txt,$headers);
					
				//echo $txt.'<br />';
				//echo '<h3 id="success">Successfully Added data!</h3>';
				
				ini_set("sendmail_from","doc@dochelp.net");
				$isEmailAccepted = mail($to,$subject,$txt,$headers);
				
				$mainarray['isEmailAccepted'] = $isEmailAccepted;

}





echo json_encode($mainarray);