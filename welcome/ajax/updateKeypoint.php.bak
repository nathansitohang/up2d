<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
		$NO = $_POST['NO'];  
		$NO = base64_decode($NO);
		$NO = $NO/123678;	
		
		
		$asal = $_POST['asal'];
		$nmkltr = $_POST['nmkltr'];
		$section= $_POST['section'];
		$ALAMAT= $_POST['ALAMAT'];
		$lat= $_POST['lat'];
		$lon= $_POST['lon'];
		$jns_cb= $_POST['jns_cb'];
		


date_default_timezone_set("Asia/Bangkok");

$tanggal = date("Y-m-d H:i:s");

$ipaddress = $_SERVER['REMOTE_ADDR'];   

		

		

    // Updaste User details
    $query = "UPDATE penyulang SET asal = '$asal',  nmkltr = '$nmkltr', section = '$section',  ALAMAT = '$ALAMAT',
	lat = '$lat',  lon = '$lon', jns_cb = '$jns_cb', tanggal = '$tanggal'	
	
	
	WHERE no = '$NO'";
	
	
	
	
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error());
    }
}
?>