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
		require_once'dbh.php';
		require_once'function.php';
		
		if(!empty($name) && !empty($egile) && !empty($mota) && !empty($desk) && !empty($data)){
			insertItem($conn,$name,$egile,$mota,$desk,$data);
		}	

		header("location: ../main.php");
	}
	