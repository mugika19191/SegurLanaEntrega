<?php 
	session_start();
	if (!isset($_SESSION["izena"])){
		header("location: inicioSesion.php");
	}
	include_once 'header.php';
?>
  
<?php 
	$item=$_GET['iden'];
?>
	
<script>
	function changepage(){
		var php = "<?php echo $item; ?>";
		window.location.href = "aldatu1.php?iden="+php;
	}
</script>
<div class="seleccion-main">
	<h4>Informazioa</h4>
	<?php
		require_once'include/dbh.php';
		require_once'include/function.php';
		$data=findElement($conn,$item);
		$itemInfo=mysqli_fetch_assoc($data);
			?>
			<div calss="content">
				<?php
					echo "<img src='images/{$itemInfo['izen']}.png'/><br>";
					echo "<br>";
					echo "{$itemInfo['izen']}";
					echo "<br>";
					echo "<strong>Egilea:</strong> {$itemInfo['egile']}";
					echo "<br>";
					echo "{$itemInfo['mota']}";
					echo "<br>";
					echo "<strong>Publikazioaren hasiera:</strong> {$itemInfo['data']}";
					echo "<br>";
					echo "<strong>Sinopsia</strong>";
					echo "<br>";
					echo "{$itemInfo['deskribapen']}";
					echo "<br>";
				?>
				<form method="post">
					<input type="button" class="button_active" onclick="changepage();" value = "Aldatu" />
				</form>
				</div>
			<?php
		?>
</section>
</body>
</header>
</html>