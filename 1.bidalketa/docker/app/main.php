<?php 
	session_start();
	if (!isset($_SESSION["izena"])){
		header("location: inicioSesion.php");
	}
	include_once 'header.php';
?>
<script> 
    localStorage.removeItem("id");
</script> 
<script>
	function changepage(id){
		window.location.href = "element.php?iden="+id;
	}
    function add(id){
        window.location.href = "include/add.php?iden="+id;
    }
    function eliminate(id){
        window.location.href = "include/eliminate.php?iden="+id;
    }
</script>
<div class="seleccion-main">
<?php
		require_once'include/dbh.php';
		require_once'include/function.php';
		$data=getCatalogue($conn);
			while($row=mysqli_fetch_assoc($data)){
                ?>
                <div calss="content">
                    <?php
                        echo "<img src='images/{$row['izen']}.png'/><br>";
                        echo "{$row['izen']}";
                        echo "<br>";
                        echo "{$row['mota']}";
                    ?>
                    <form method="post">
                        <?php  echo"<input type='button' class='button_active' onclick='add({$row['id']});' value = 'Gehitu' />";?>
                        <?php  echo"<input type='button' class='button_active' onclick='changepage({$row['id']});' value = 'Info' />";?>
                        <?php  echo"<input type='button' class='button_active' onclick='eliminate({$row['id']});' value = 'Ezabatu' />";?>
                    </form>
                    </div>
                <?php
			}
		?>
</div>
</body>
</header>
</html>




