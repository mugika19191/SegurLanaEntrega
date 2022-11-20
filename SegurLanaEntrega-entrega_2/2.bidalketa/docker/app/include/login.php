<?php
	$user=$_POST["nan"];
	$pass=$_POST["pass"];
	
	require_once 'dbh.php';
	require_once 'function.php';
	
	if(emptyInputLogin($user,$pass)!==false){
		header("location: ../registro.php?error=emptylogin");
		exit();
	}
	loginUser($conn,$user,$pass);