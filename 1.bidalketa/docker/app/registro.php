<?php 
	include_once 'header.php'
?>
  <section class="form-register">
    <h4>Sartu Datuak</h4>
	<form action="include/signup.php" method="post">
		<input class="controls" type="text" name="izena"  placeholder="Izena">
		<input class="controls" type="text" name="abizena"  placeholder="Abizena">
		<input class="controls" type="text" name="nan"  placeholder="NAN">
		<input class="controls" type="text" name="email"  placeholder="Email">
		<input class="controls" type="text" name="telefono"  placeholder="Telefono Zenbakia">
		<input class="controls" type="text" name="data"  placeholder="Jaiotze Data:uu/hh/ee">
		<input class="controls" type="password" name="pasahitza"  placeholder="Pasahitza">
		<input class="controls" type="password" name="pasahitza2"  placeholder="Pasahitza Errepikatu">
		<input class="botons" type="submit" value="Erregistratu">
	</form>
  </section>
<link rel="stylesheet" href="css/main.css" />
</body>
</html>
