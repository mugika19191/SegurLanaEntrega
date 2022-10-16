<?php 
	function emptyInputSignup($name,$name2,$nan,$email,$tel,$data,$pass,$pass2){
		$result;
		if(empty($name) || empty($name2) || empty($nan) || empty($email) || empty($tel) || empty($data) ||empty($pass) || empty($pass2)){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function invalidUid($name){
		$result;
		if(!preg_match("/^[a-zA-Z]*$/",$name)){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function invalidUid2($name2){
		$result;
		if(!preg_match("/^[a-zA-Z]*$/",$name2)){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function invalidPass($pass){
		$uppercase = preg_match('@[A-Z]@', $pass);
		$lowercase = preg_match('@[a-z]@', $pass);
		$number    = preg_match('@[0-9]@', $pass);
		$specialChars = preg_match('@[^\w]@', $pass);
		$result;
		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
			$result=true;
		}else{
			$result=false;
		}
		return $result;
	}
	function invalidEmail($email){
		$result;
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function passNotMatch($pass,$pass2){
		$result;
		if($pass!==$pass2){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function nanNotCorrect($nan){
		$result;
		$zenb=substr($nan,0,-1);
		$letra;
		switch (intval($zenb)%23){
			case 0:
				$letra="T";
				break;
			case 1:
				$letra="R";
				break;
			case 2:
				$letra="W";
				break;
			case 3:
				$letra="A";
				break;
			case 4:
				$letra="G";
				break;
			case 5:
				$letra="M";
				break;
			case 6:
				$letra="Y";
				break;
			case 7:
				$letra="F";
				break;
			case 8:
				$letra="P";
				break;
			case 9:
				$letra="D";
				break;
			case 10:
				$letra="X";
				break;
			case 11:
				$letra="B";
				break;
			case 12:
				$letra="N";
				break;
			case 13:
				$letra="J";
				break;
			case 14:
				$letra="Z";
				break;
			case 15:
				$letra="S";
				break;
			case 16:
				$letra="Q";
				break;
			case 17:
				$letra="V";
				break;
			case 18:
				$letra="H";
				break;
			case 19:
				$letra="L";
				break;
			case 20:
				$letra="C";
				break;
			case 21:
				$letra="K";
				break;
			case 22:
				$letra="E";
				break;
		}
		if(strcmp($letra,$nan[strlen($nan)-1])!==0){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function alreadyExist($conn,$nan){
		$sql="SELECT * FROM erabiltzaile WHERE nan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../registro.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"s",$nan);
		mysqli_stmt_execute($stmt);
		
		$results=mysqli_stmt_get_result($stmt);
		if($row=mysqli_fetch_assoc($results)){
			return $row;
		}
		else{
			$result=false;
			return $result;
		}
		mysqli_stmt_close($stmt);
	}
	function createUser($conn,$name,$name2,$tel,$email,$nan,$data,$pass){
		$sql="INSERT INTO erabiltzaile (izena,abizena,telefonoa,mail,nan,jaiotzeData,pasahitza) VALUES (?,?,?,?,?,?,?);";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../registro.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt,"ssissss",$name,$name2,$tel,$email,$nan,$data,$pass);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		header("location: ../registro.php?error=none");
	}
	function insertItem($conn,$name,$egile,$mota,$desk,$data){
		$sql="INSERT INTO katalogo (izen,egile,mota,`data`,deskribapen) VALUES (?,?,?,?,?);";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../registro.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt,"sssss",$name,$egile,$mota,$data,$desk);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	function emptyInputLogin($user,$pass){
		$result;
		if(empty($pass) || empty($user)){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function invalidData($data){
		$result;
		if(!preg_match("/^[0-9]{4}/(0[1-9]|1[0-2])/(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)){
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}
	function loginUser($conn,$user,$pass){
		$uidexists=alreadyExist($conn,$user);
		
		if($uidexists==false){
			header("location: ../registro.php?error=wronglogin");
			exit();
		}
		$userpass=$uidexists["pasahitza"];
		if(passNotMatch($pass,$userpass)){		
			header("location: ../registro.php?error=wronglogin2");
			exit();
		}
		else {
			session_start();
			$_SESSION["izena"]=$uidexists["izena"];
			$_SESSION["abizena"]=$uidexists["abizena"];
			$_SESSION["nan"]=$uidexists["nan"];
			$_SESSION["telefonoa"]=$uidexists["telefonoa"];
			$_SESSION["mail"]=$uidexists["mail"];
			$_SESSION["jaiotzeData"]=$uidexists["jaiotzeData"];
			$_SESSION["stamp"]=time();
			header("location: ../main.php");
			exit();
		}
		
	}
	function getCatalogue($conn){
		$sql="SELECT * FROM katalogo;";
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../registro.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_execute($stmt);
		
		$results=mysqli_stmt_get_result($stmt);
		
		return $results;
		mysqli_stmt_close($stmt);
	}
	function getElements($conn,$nan){
		$sql="SELECT k.* FROM katalogo k JOIN perfil ON perfil.user=? WHERE k.id=perfil.item GROUP BY k.id;";
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../registro.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"s",$nan);
		mysqli_stmt_execute($stmt);
		
		$results=mysqli_stmt_get_result($stmt);
		
		return $results;
		mysqli_stmt_close($stmt);
	}
	function addElementToUser($conn,$id,$nan){
		$sql="INSERT INTO perfil(user,item) VALUES (?,?);";
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../registro.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"si",$nan,$id);
		mysqli_stmt_execute($stmt);
		//header("location: ../main.php");
		mysqli_stmt_close($stmt);
	}
	function removeElement($conn,$id,$nan){
		$sql="DELETE FROM perfil WHERE user=? AND item=?;";
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			die("database error");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"si",$nan,$id);
		mysqli_stmt_execute($stmt);
		//header("location: ../main.php");
		mysqli_stmt_close($stmt);
	}
	function eliminateElement($conn,$id){
		$sql="DELETE FROM katalogo WHERE id=?;";
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			die("database error");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"i",$id);
		mysqli_stmt_execute($stmt);
		//header("location: ../main.php");
		mysqli_stmt_close($stmt);
	}
	function findElement($conn,$id){
		$sql="SELECT * FROM katalogo WHERE id=?;";
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			die("database error");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"i",$id);
		mysqli_stmt_execute($stmt);
		$results=mysqli_stmt_get_result($stmt);
		return $results;
		mysqli_stmt_close($stmt);
	}
	/*-----------------BORRAR----------------------------------------------------*/
	function invalidTel($tel){
		$result=false;
		if (strlen($tel)!==9){
			$result=true;
		}
		return $result;
	}
	function changeUserData($conn,$name,$name2,$tel,$email,$nan,$data){

		$sql="UPDATE erabiltzaile SET izena=?,abizena=?,telefonoa=?,mail=?,jaiotzeData=? WHERE nan=?;";
		
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../editatu.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"ssisss",$name,$name2,$tel,$email,$data,$nan);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		$uidexists=alreadyExist($conn,$nan);
		
		if($uidexists==false){
			header("location: ../editatu.php?error=wronglogin");
			exit();
		}
		
			session_start();
			$_SESSION["izena"]=$uidexists["izena"];
			$_SESSION["abizena"]=$uidexists["abizena"];
			$_SESSION["nan"]=$uidexists["nan"];
			$_SESSION["telefonoa"]=$uidexists["telefonoa"];
			$_SESSION["mail"]=$uidexists["mail"];
			$_SESSION["jaiotzeData"]=$uidexists["jaiotzeData"];
			header("location: ../user.php");
			exit();
		
		
	}
	function changeName($conn,$name,$id){
		$sql="UPDATE katalogo SET izen=?  WHERE id = ?;";
		
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../elemaldatu.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"si",$name,$id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	function changeCreator($conn,$name,$id){
		$sql="UPDATE katalogo SET egile=?  WHERE id = ?;";
		
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../elemaldatu.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"si",$name,$id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	function changeDate($conn,$date,$id){
		$sql="UPDATE katalogo SET `data` =?  WHERE id = ?;";
		
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../elemaldatu.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"si",$date,$id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	function changeType($conn,$type,$id){
		$sql="UPDATE katalogo SET mota=?  WHERE id = ?;";
		
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../elemaldatu.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"si",$type,$id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	function changeDes($conn,$des,$id){
		$sql="UPDATE katalogo SET deskribapen=?  WHERE id = ?;";
		
		//$sql="SELECT e.* FROM edukia e INNER JOIN kontratazioa k on k.erabiltzaileNan=e.nan WHERE k.erabiltzaileNan=?;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../elemaldatu.php?error=stmtfailed");
			exit();
		}
		
		mysqli_stmt_bind_param($stmt,"si",$des,$id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	function invalidPri($pri){
		$result=true;
		if ( is_numeric($pri) ){
			if($pri>0){
				$result=false;
			} 
		}
		return $result;
	}
