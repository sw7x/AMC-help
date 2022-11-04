<?php 
session_start();
unset($_SESSION['admindata']);


header('Location:index.php');

?>