<?php
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