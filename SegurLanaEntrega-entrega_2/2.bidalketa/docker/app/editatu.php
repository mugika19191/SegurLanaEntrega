<?php 
	session_start();
	if (!isset($_SESSION["izena"])){
		header("location: inicioSesion.php");
	}
	include_once 'header.php';
?>

  <section class="form-register">
    <h4>Aldatu Datuak</h4>
	<form action="include/edit.php" method="post">
		<input class="controls" type="text" name="izena"  placeholder="Izena">
		<input class="controls" type="text" name="abizena"  placeholder="Abizena">
		<input class="controls" type="text" name="telefono"  placeholder="Telefonoa">
		<input class="controls" type="text" name="email"  placeholder="Email">
		<input class="controls" type="text" name="data"  placeholder="Data">
		<input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
		<input class="botons" type="submit" value="Aldatu Datuak">
	</form>
  </section>
</body>
</html>