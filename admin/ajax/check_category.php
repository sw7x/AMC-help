<?php
$directory ='ajax';
session_start();
include('../../dbcon.php');
include('../init.php');
$dataarray;

if(isset($_POST['maincatpost']) && !isset($_POST['subcatpost']) && !isset($_POST['sub_subcatpost']))
{
  	//received username value from registration page
  	$main_cat =  $_POST["maincatpost"]; 
	
  	//check username in db
 	$sql="SELECT * from tbl_category WHERE parent_id=0 AND category=?";
  	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($main_cat));
	
  	if($isExecute)
	{
		$main_cat_exist = $query->rowCount(); //records count
	}
  	else
	{
		$main_cat_exist = 0;
	}
	
	
	//if returned value is more than 0, username is not available
	if($main_cat_exist || $main_cat=='')
	{
	  	$dataarray['main'] ='main_0';
	}
	else
	{
	 	$dataarray['main'] ='main_1';
	}
	$dataarray['main->sub->sub'] = '0';
	
}


if(isset($_POST['subcatpost'])  && !isset($_POST['maincatpost']) && !isset($_POST['sub_subcatpost']))
{
  	//received username value from registration page
  	$sub_cat =  $_POST["subcatpost"]; 

  	//check username in db
 	$sql="SELECT * from tbl_category where parent_id!=0 AND category=?";
  	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($sub_cat));
  
  	
  	if($isExecute)
	{
		$sub_cat_exist = $query->rowCount(); //records count
	}
  	else
	{
		$sub_cat_exist = 0;
	}
	
	
	
	//if returned value is more than 0, username is not available
	if($sub_cat_exist || $sub_cat=='')
	{
	  	$dataarray['sub'] = 'sub_0';
	}
	else
	{
	  	$dataarray['sub'] = 'sub_1';
	}
	$dataarray['main->sub->sub'] = '0';
	
}



if(isset($_POST['subcatpost'])  &&  isset($_POST['maincatpost']) && !isset($_POST['sub_subcatpost']))
{
  	//received username value from registration page
  	$sub_cat =  $_POST["subcatpost"]; 
	$main_cat =  $_POST['maincatpost'];
	//$sub_sub_cat =  $_POST['sub_subcatpost'];
	
  	//check username in db
 	$sql="SELECT * from tbl_category where parent_id=? AND category=?";
  	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($main_cat,$sub_cat));
  
  	
  	if($isExecute)
	{
		$sub_cat_exist = $query->rowCount(); //records count
	}
  	else
	{
		$sub_cat_exist = 0;
	}
	
	
	
	$dataarray['sub_cat_exist'] = $sub_cat_exist;
	
	//if returned value is more than 0, username is not available
	if($sub_cat_exist || $sub_cat=='')
	{
	  	$dataarray['main->sub'] = '0';
	}
	else
	{
	  	$dataarray['main->sub'] = '1';
	}
	
	$dataarray['main->sub->sub'] = '0';
	
}


if(isset($_POST['subcatpost'])  &&  isset($_POST['maincatpost']) && isset($_POST['sub_subcatpost']))
{
  	//received username value from registration page
  	$sub_cat =  $_POST["subcatpost"]; 
	$main_cat =  $_POST['maincatpost'];
	$sub_sub_cat =  $_POST['sub_subcatpost'];
	
  	//check username in db
 	$sql="SELECT * from tbl_category where parent_id=? AND category=?";
  	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($sub_cat,$sub_sub_cat));
  
  	if($isExecute)
	{
		$sub_cat_exist = $query->rowCount(); //records count
	}
  	else
	{
		$sub_cat_exist = 0;
	}
	
	
	
	$dataarray['sub_cat_exist'] = $sub_cat_exist;
	
	//if returned value is more than 0, username is not available
	if($sub_cat_exist || $sub_cat=='' || $sub_sub_cat=='')
	{
	  	$dataarray['main->sub->sub'] = '0';
	}
	else
	{
	  	$dataarray['main->sub->sub'] = '1';
	}
	
	
}

if(!isset($_POST['subcatpost'])  &&  isset($_POST['maincatpost']) && isset($_POST['sub_subcatpost']))
{
	$dataarray['main->sub->sub'] = '0';

}

echo json_encode($dataarray);
?>

