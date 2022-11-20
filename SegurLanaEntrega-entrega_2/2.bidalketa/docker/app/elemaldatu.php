<?php 
	include_once 'header.php'
?>

  <section class="form-register">
  	<?php
			if (!isset($_SESSION["izena"])){
				header("location: inicioSesion.php");
			}
		require_once'include/dbh.php';
		require_once'include/function.php';
		?>
    <h4>Sortu Elementua</h4>
	<?php echo"<form action='include/create.php' method='post'>";
		echo"Izena";
		echo "<input class='controls' type='text' name='izen'  placeholder='Izena'>";
		echo"Egilea";
		echo"<input class='controls' type='text' name='egile'  placeholder='Egilea'>";
		echo"Mota";
		echo"<input class='controls' type='text' name='mota'  placeholder='Mota'>";
		echo"Data";
		echo"<input class='controls' type='text' name='data'  placeholder='Data'>";
		echo"Sinopsia";
		echo"<input class='controls' type='text' name='desk'  placeholder='Deskribapena'>";
		?>
		<input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
		<input class="botons" type="submit" value="Sortu">
	</form>
  </section>
</body>
</html>
