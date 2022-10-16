<?php 
	session_start();
	if (!isset($_SESSION["izena"])){
		header("location: inicioSesion.php");
	}
	include_once 'header.php';
?>

<section class="seleccion-main">
	<h4>Erabiltzailearen Informazioa</h4>
	<?php
		require_once'include/dbh.php';
		require_once'include/function.php';
		$_SESSION["nan"];
				echo"<p>";
				echo $_SESSION["nan"];
				echo"</p>";
				echo"<p>";
				echo $_SESSION["izena"];
				echo"</p>";
				echo"<p>";
				echo $_SESSION["abizena"];
				echo"</p>";
				echo"<p>";
				echo $_SESSION["mail"];
				echo"</p>";
				echo"<p>";
				echo $_SESSION["telefonoa"];
				echo"</p>";
				echo"<p>";
				echo $_SESSION["jaiotzeData"];
				echo"</p>";
				echo"<p>";
		?>
</section>
</body>
</header>
</html>