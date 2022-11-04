<?php 
$mainarray;
$mainarray['sw']='sw';


include('../init.php'); 
include('../dbcon.php');
include('../data/escape_string.php');
$page = 'pdf_generator';
$pagetype='ajax';




if(!isset($_SESSION['userdata']))
{
	//header('Location: ../index.php?status='.base64_encode(nologin)."'");	
}
else
{

	$id = $_REQUEST['id'];
	$mainarray['id']=$id;
	$sql = "SELECT * FROM tbl_docs WHERE userid=? AND filename=?";
	
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($id,$_REQUEST['filename']));
	$result = $query->fetch(PDO::FETCH_ASSOC);                
	
	
	
	if($result === FALSE)
	{ 
		//die(mysql_error()); // TODO: better error handling
		//////////////
	}
	
	
	
	
	$mainarray['doc_name'] = $result['doc_name'];
	$mainarray['username'] = $_SESSION['userdata']['username'];
	$mainarray['filename'] = $_REQUEST['filename'];
}

echo json_encode($mainarray);


/*
$mainarray['sdasds']='ssssss';
echo json_encode($mainarray);
*/

?>

