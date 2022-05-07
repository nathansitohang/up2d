<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{

	$feeder = $_POST['feeder'];	
	$tanggal = $_POST['tanggal'];
	$nmr = $_POST['nmr'];
	$trafo = $_POST['trafo'];
	$beban = $_POST['beban'];
	$waktu = $_POST['waktu'];

	$waktuinput = date("Y-m-d H:i:s");

	$ipaddress = $_SERVER['REMOTE_ADDR'];  

    $query = "INSERT INTO pembebanan (waktuinput, ipaddress, tanggal,feeder,nmr,trafo,beban, waktu) VALUES ('$waktuinput','$ipaddress'
	,'$tanggal','$feeder','$nmr','$trafo','$beban','$waktu')";

    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error());
    }
}
?>