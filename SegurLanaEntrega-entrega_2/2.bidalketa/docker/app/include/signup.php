<?php 

	$name = $_POST["izena"];
	$name2 = $_POST["abizena"];
	$nan = $_POST["nan"];
	$email = $_POST["email"];
	$tel = $_POST["telefono"];
	$data = $_POST["data"];
	$pass = $_POST["pasahitza"];
	$pass2 = $_POST["pasahitza2"];
	
	require_once'dbh.php';
	require_once'function.php';
	
	if(emptyInputSignup($name,$name2,$nan,$email,$tel,$data,$pass,$pass2)!==false){
		header("location: ../registro.php?error=emptyinput");
		exit();
	}
	if(invalidUid($name)!==false){
		header("location: ../registro.php?error=invalidUid");
		exit();
	}
	if(invalidUid2($name2)!==false){
		header("location: ../registro.php?error=invalidUid2");
		exit();
	}
	if(invalidEmail($email)!==false){
		header("location: ../registro.php?error=invalidEmail");
		exit();
	}
	if (invalidPass($pass)!==false){
		header("location: ../registro.php?error=invalidPass");
		exit();
	}
	if (passNotMatch($pass,$pass2)!==false){
		header("location: ../registro.php?error=passDontMatch");
		exit();
	}
	if (nanNotCorrect($nan)!==false){
		header("location: ../registro.php?error=errorNan");
		exit();
	}
	if (alreadyExist($conn,$nan)!==false){
		header("location: ../registro.php?error=alreadyExist");
		exit();
	}
	
	createUser($conn,$name,$name2,$tel,$email,$nan,$data,$pass);