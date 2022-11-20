<?php
	session_start();
	$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

	if (!$token || $token !== $_SESSION['token']) {
		// return 405 http status code
		header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
		exit;
	} else {
		// process the form
		$name = $_POST["izen"];
		$egile = $_POST["egile"];
		$mota = $_POST["mota"];
		$data = $_POST["data"];
		$desk = $_POST["desk"];
		$id= $_GET['iden'];
		require_once'dbh.php';
		require_once'function.php';
		
		if(!empty($name)){
			changeName($conn,$name,$id);
		}
		if(!empty($egile)){
			changeCreator($conn,$egile,$id);
		}
		if(!empty($mota)){
			changeType($conn,$mota,$id);
		}
		if(!empty($desk)){
			changeDes($conn,$desk,$id);
		}
		if(!empty($data)){
			changeDate($conn,$data,$id);
		}	

		header("location: ../element.php?iden=$id");
	}
	