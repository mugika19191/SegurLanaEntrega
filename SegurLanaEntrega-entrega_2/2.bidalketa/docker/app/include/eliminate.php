<?php 
	$item=$_GET['iden'];
	session_start();
	require_once'dbh.php';
	require_once'function.php';
	if (isset($_SESSION["izena"])){
		eliminateElement($conn,$item);
		header("location: ../main.php");
	}
	else{
		header("location: ../main.php");
	}