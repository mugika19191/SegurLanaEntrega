<?php 
	session_start();
	if (!isset($_SESSION["izena"])){
		header("location: inicioSesion.php");
		exit();
	}
	include_once 'header.php';
?>
<script>
	function changepage(id){
		window.location.href = "element.php?iden="+id;
	}
    function remove(id){
        window.location.href = "include/remove.php?iden="+id;
    }
</script>
<section class="form-info">	
	<?php 
	echo "<h4>{$_SESSION['izena']}-en Elementuen Informazioa</h4>";
	?>
	
<div class="seleccion-main">
<?php
		require_once'include/dbh.php';
		require_once'include/function.php';
		$data=getElements($conn,$_SESSION["nan"]);
			while($row=mysqli_fetch_assoc($data)){
                ?>
                <div calss="content">
                    <?php
                        echo "<img src='images/{$row['izen']}.png'/><br>";
                        echo "{$row['izen']}";
                        echo "<br>";
                    ?>
                    <form method="post">
                        <?php  echo"<input type='button' class='button_active' onclick='remove({$row['id']});' value = 'Kendu' />";?>
                        <?php  echo"<input type='button' class='button_active' onclick='changepage({$row['id']});' value = 'Info' />";?>
				    </form>
                    </div>
                <?php
			}
		?>
<?php
    /*BEGIRATU ZEIN BOTOIRI EMAN DION*/
        if (isset($_POST['1'])){
            removeElement($conn,"1",$_SESSION["nan"]);
            echo"<script>";
                echo"window.location.href = 'kontratua.php';";
            echo"</script>";
        }
        elseif (isset($_POST['2'])){
            removeElement($conn,"2",$_SESSION["nan"]);
            echo"<script>";
                echo"window.location.href = 'kontratua.php';";
            echo"</script>";
        }
        elseif (isset($_POST['3'])){
            removeElement($conn,"3",$_SESSION["nan"]);
            echo"<script>";
                echo"window.location.href = 'kontratua.php';";
            echo"</script>";
        }
        elseif (isset($_POST['4'])){
            removeElement($conn,"4",$_SESSION["nan"]);
            echo"<script>";
                echo"window.location.href = 'kontratua.php';";
            echo"</script>";
        }
        elseif (isset($_POST['5'])){
            removeElement($conn,"5",$_SESSION["nan"]);
            echo"<script>";
                echo"window.location.href = 'kontratua.php';";
            echo"</script>";
        }
        elseif (isset($_POST['6'])){
            removeElement($conn,"6",$_SESSION["nan"]);
            echo"<script>";
                echo"window.location.href = 'kontratua.php';";
            echo"</script>";
        }
?>

</div>
</section>
</body>
</header>
</html>

