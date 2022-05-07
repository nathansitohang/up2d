
	<?php
	include("db_connection.php");
   
    $query="SELECT * from user where idarea = '".$_POST["up3"]."' AND idrayon IS NOT NULL";
	$result = mysqli_query($db, $query);
	if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
	?>
	
	<option value="0">--Pilih Unit--</option><br>
	<?php
				
				while ($row = @mysqli_fetch_array($result)){	
   
    ?>
        <option value="<?php echo $row["idrayon"] ?>"><?php echo $row["rayon"] ?></option><br>
   
    <?php
    }
    ?>