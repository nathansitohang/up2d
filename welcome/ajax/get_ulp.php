<?php
include("db_connection.php");

$up3 = $_POST['up3'];

$sql = mysqli_query($db, "SELECT * FROM user WHERE idarea='".$up3."' ORDER BY idrayon");

$html = "<option value=''>Pilih</option>";

while($data = mysqli_fetch_array($sql)){ 
	$html .= "<option value='".$data['idrayon']."'>".$data['rayon']."</option>"; 
}

$callback = array('data_ulp'=>$html); 

echo json_encode($callback); 
?>
