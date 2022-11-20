<?php 
	session_start();
	if (!isset($_SESSION["izena"])){
		header("location: inicioSesion.php");
	}
	include_once 'header.php';
?>

  <section class="form-register">
    <h4>Aldaketak Egin</h4>
	<form action="include/edit.php" method="post">
		<input class="controls" type="text" name="izena"  placeholder="Izena">
		<input class="controls" type="text" name="abizena"  placeholder="Abizena">
		<input class="controls" type="text" name="email"  placeholder="Email">
		<input class="controls" type="text" name="telefono"  placeholder="Telefono Zenbakia">
		<input class="controls" type="text" name="data"  placeholder="Jaiotze Data:uu/hh/ee">
		<input class="botons" type="submit" value="Aldatu">
	</form>
  </section>
<link rel="stylesheet" href="css/main.css" />
</body>
</html>
