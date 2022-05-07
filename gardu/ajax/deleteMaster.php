<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
		$idgardu = $_POST['idgardu'];  
		$idgardu = base64_decode($idgardu);
		$idgardu = $idgardu/12367;
		$kodegd = $_POST['kodegd'];  
		$kodegd = base64_decode($kodegd);
		$alamat = $_POST['alamat'];
		$kapasitas = $_POST['kapasitas'];
		$feeder = $_POST['feeder'];
		$ufeeder = $_POST['ufeeder'];
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		$konstruksi = $_POST['konstruksi'];
		$merek = $_POST['merek'];
		$noseri = $_POST['noseri'];
		$fasa = $_POST['fasa'];
		$thntrafo = $_POST['thntrafo'];		
		$jlh_tap = $_POST['jlh_tap'];
		$pos_tap = $_POST['pos_tap'];
		$imp = $_POST['imp'];
		$minyak = $_POST['minyak'];
		$vector = $_POST['vector'];
		$tgl_psg = $_POST['tgl_psg'];
		$jlh_jur = $_POST['jlh_jur'];
		$ket = $_POST['ket'];


    // Updaste User details
    $query = "DELETE from master WHERE idgardu = '$idgardu'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error());
    }
	
	$kw1a = "UPDATE t1a SET  status= 0 WHERE kodegd = '$kodegd'";
    if (!$result = mysqli_query($db, $kw1a)) {
        exit(mysqli_error());
    }
	
	$kw1b = "UPDATE t1b SET  status= 0 WHERE kodegd = '$kodegd'";
    if (!$result = mysqli_query($db, $kw1b)) {
        exit(mysqli_error());
    }
	
	$kw2a = "UPDATE t2a SET  status= 0 WHERE kodegd = '$kodegd'";
    if (!$result = mysqli_query($db, $kw2a)) {
        exit(mysqli_error());
    }
	
	$kw2b = "UPDATE t2b SET  status= 0 WHERE kodegd = '$kodegd'";
    if (!$result = mysqli_query($db, $kw2b)) {
        exit(mysqli_error());
    }
	
	$kw3a = "UPDATE t3a SET  status= 0 WHERE kodegd = '$kodegd'";
    if (!$result = mysqli_query($db, $kw3a)) {
        exit(mysqli_error());
    }
	
	$kw3b = "UPDATE t3b SET  status= 0 WHERE kodegd = '$kodegd'";
    if (!$result = mysqli_query($db, $kw3b)) {
        exit(mysqli_error());
    }
	
	$kw3c = "UPDATE t3c SET  status= 0 WHERE kodegd = '$kodegd'";
    if (!$result = mysqli_query($db, $kw3c)) {
        exit(mysqli_error());
    }
}
?>