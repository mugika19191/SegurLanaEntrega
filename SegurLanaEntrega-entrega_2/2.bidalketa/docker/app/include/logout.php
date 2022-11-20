<?php
	session_start();
	if ($_SESSION["stamp"]==-1){
		echo '<script>alert("Denbora luzea ezer egin gabe! Saioa itxiko da.")</script>';
	}
	session_unset();
	session_destroy();
	?>
	<script>
		window.location.href = "../inicioSesion.php";
</script>
