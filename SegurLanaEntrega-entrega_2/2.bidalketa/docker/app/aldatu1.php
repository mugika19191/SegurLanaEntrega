<?php 
	include_once 'header.php'
?>
<?php 
	$item=$_GET['iden'];
?>
  <section class="form-register">
  	<?php
			if (!isset($_SESSION["izena"])){
				header("location: inicioSesion.php");
			}
		require_once'include/dbh.php';
		require_once'include/function.php';
		$data=findElement($conn,$item);
		$itemInfo=mysqli_fetch_assoc($data);
		?>
    <h4>Aldatu Datuak</h4>
	<?php echo"<form action='include/edit1.php?iden={$item}' method='post'>";
		echo"Izena";
		echo "<input class='controls' type='text' name='izen'  placeholder={$itemInfo['izen']}>";
		echo"Egilea";
		echo"<input class='controls' type='text' name='egile'  placeholder='{$itemInfo['egile']}'>";
		echo"Mota";
		echo"<input class='controls' type='text' name='mota'  placeholder='{$itemInfo['mota']}'>";
		echo"Data";
		echo"<input class='controls' type='text' name='data'  placeholder='{$itemInfo['data']}'>";
		echo"Sinopsia";
		echo"<input class='controls' type='text' name='desk'  placeholder='{$itemInfo['deskribapen']}'>";
		?>
		<input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
		<input class="botons" type="submit" value="Aldatu Datuak">
	</form>
  </section>
</body>
</html>