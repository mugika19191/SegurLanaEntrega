<?php
	session_start();
	$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
	if (!$token || $token !== $_SESSION['token']) {
		// return 405 http status code
		header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
		exit;
	} else {
		// process the form
		$name = $_POST["izena"];
		$name2 = $_POST["abizena"];
		$email = $_POST["email"];
		$tel = $_POST["telefono"];
		$data = $_POST["data"];
		
		require_once'dbh.php';
		require_once'function.php';
		session_start();
		/*HAY QUE MIRAR SI ESTAN BIEN LOS DATOS, NO SOLO SI ESTA VACIO O NO*/
		if(empty($name) || invalidUid($name)){
				$name=$_SESSION["izena"];
		}
		if(empty($name2) || invalidUid2($name2)){
				$name2 = $_SESSION["abizena"];
		}
		if(empty($email) || invalidEmail($email)){
				$email =$_SESSION["mail"];
		}	
		if(empty($tel) || invalidTel($tel)){
				$tel = $_SESSION["telefonoa"];
		}	
		if(empty($data)){
				$data = $_SESSION["jaiotzeData"];
		}	
		
		changeUserData($conn,$name,$name2,$tel,$email,$_SESSION["nan"],$data);
	}

	