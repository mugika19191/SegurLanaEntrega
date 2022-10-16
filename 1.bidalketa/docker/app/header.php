<?php
	session_start();
?>
<!DOCTYPE html>
<header>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
	<meta charset ="UTF-8">
	<link rel="stylesheet" href="css/main.css" />
	<script
	src="https://code.jquery.com/jquery-3.6.0.js"
	integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
</head>
<img src="images/Header.png" class="center">
		<div class="contenedor">
			<nav class="menu">
				<ul>
					<li><img src="images/favicon.ico" alt="" width="30" height="30" style="margin:12px 13px"></li>
					<?php
						if (isset($_SESSION["izena"])){
							echo"<li><a href='main.php'>Katalogoa </a></li>";
							echo"<li><a href='kontratua.php'>Gogokoenak</a></li>";
							echo"<li><a href='user.php'>Erabiltzaile</a></li>";
							echo"<li><a href='editatu.php'>AldatuDatuak</a></li>";
							echo"<li><a href='elemaldatu.php'>SortuElementuak</a></li>";
							echo"<li><a href='include/logout.php'>Itxi Sesioa</a></li>";
						}
						else{
							echo"<li><a href='registro.php'>Registroa</a></li>";
							echo"<li><a href='inicioSesion.php'>Hasi Sesioa</a></li>";
						}
					?>
				</ul>
			</nav>
		</div>
		
<body>
