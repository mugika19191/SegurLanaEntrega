<?php 
	$item=$_GET['iden'];
	session_start();
	require_once'dbh.php';
	require_once'function.php';
	if (isset($_SESSION["izena"])){
		removeElement($conn,$item,$_SESSION["nan"]);
		header("location: ../kontratua.php");
	}
	else{
		header("location: ../main.php");
	}