<?php
include('../../session.php');
if (isset($_POST['kodegd']))
	{
	include ("db_connection.php");

	// get values

	$kodegd = $_POST['kodegd'];
	$alamat = $_POST['alamat'];
	$kapasitas = $_POST['kapasitas'];
	$feeder = $_POST['feeder'];
	$uruttd = $_POST['uruttd'];
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
	
	$check = "SELECT * FROM master WHERE kodegd = '$kodegd'";
	$rs = mysqli_query($db,$check);
	$data = mysqli_fetch_array($rs, MYSQLI_NUM);
	if($data[0] > 1) {
    echo '<script language="javascript">';
	echo 'alert("Kode gardu already exist!")';
	echo '</script>';
					}
	else
	{
	$query = "INSERT INTO master(kodegd, alamat, kapasitas, idarea, idrayon, area, rayon, feeder, ufeeder, lat, lng, konstruksi, merek, noseri, fasa, thntrafo, jlh_tap, pos_tap, imp, minyak, vector, tgl_psg, jlh_jur, ket) VALUES('$kodegd', '$alamat', '$kapasitas', '$login_idarea', '$login_idrayon', '$login_area', '$login_rayon', '$feeder', '$uruttd', '$lat', '$lng', '$konstruksi', '$merek', '$noseri', '$fasa', '$thntrafo', '$jlh_tap', '$pos_tap', '$imp', '$minyak', '$vector', '$tgl_psg', '$jlh_jur', '$ket')";
	if (!$result = mysqli_query($db, $query))
		{
		exit(mysqli_error());
		}
	}
	}

?>