<?php 

	
	


	// $servername  = "localhost";
	// $username    = "root";
	// $password    = "";


	$servername  = "localhost";
	$username    = "susnatha_user";
	$password    = "j=Rrns)!ONgl";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=susnatha_amc", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected successfully";
	    
	}catch(PDOException $e){
	    echo "Connection failed: " . $e->getMessage();
	}






	/*
	$dbcon = mysql_connect('mysql505.ixwebhosting.com','ozisolu_amcpdf','amcH8lp') or die('Connection error :'.mysql_error());;
	$db = mysql_select_db('ozisolu_amcpdf',$dbcon) or die('Database error :'.mysql_error()); */

?>

