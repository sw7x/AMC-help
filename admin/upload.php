<?php
session_start();
$page ='';

$directory ='';
include('init.php');
?>  


<?php include('header.php'); ?>


<div id="content"></div>

<script>
load_home();

function load_home()
{
	document.getElementById("content").innerHTML='<object type="text/html" data="file_upload.php" ></object>';
}
</script>

<?php require('footer.php');?>