<?php
include('../../session.php');
if (isset($_POST['kodegd']))
	{
	include ("db_connection.php");
	// get values
	$kodegd = $_POST['kodegd'];
	$ptgs = $_POST['ptgs'];	
	$tgl = $_POST['tgl'];	
	$oil = $_POST['oil'];
	$bdv = $_POST['bdv'];
		$alamat = $_POST['alamat'];	
        $feeder = $_POST['feeder'];	
        $ufeeder = $_POST['ufeeder'];	
        $kapasitas = $_POST['kapasitas'];
        $fasa = $_POST['fasa'];
        $merek = $_POST['merek'];
        $noseri = $_POST['noseri'];
        $thntrafo = $_POST['thntrafo'];
        $lat = $_POST['lat']; 	
        $lng = $_POST['lng'];	
        $minyak = $_POST['minyak'];
        $konstruksi = $_POST['konstruksi']; 	
        $vector = $_POST['vector'];
        $imp = $_POST['imp'];
        $jlh_jur = $_POST['jlh_jur'];	
        $jlh_tap = $_POST['jlh_tap']; 	
        $pos_tap = $_POST['pos_tap'];
        $tgl_psg = $_POST['tgl_psg'];	
        $ket = $_POST['ket'];
			
		if ($bdv >= 40) {$hi_bdv = '4';}
		else if ($bdv >= 30 && $bdv < 40) {$hi_bdv = '3';}
		else if ($bdv >= 20 && $bdv < 30) {$hi_bdv = '2';}
		else if ($bdv >= 0 && $bdv < 20) {$hi_bdv = '1';}
		else {$hi_bdv = '0';}	
	
	$query = "INSERT INTO t2a(kodegd, ptgs, tgl, oil, bdv, idarea, idrayon, area, rayon,  alamat, feeder, ufeeder, kapasitas, fasa, merek, noseri, thntrafo, lat, lng, minyak, konstruksi, vector, imp, jlh_jur, jlh_tap, pos_tap, tgl_psg, ket) VALUES('$kodegd', '$ptgs', '$tgl', '$oil', '$bdv', '$login_idarea', '$login_idrayon', '$login_area', '$login_rayon', '$alamat', '$feeder', '$ufeeder', '$kapasitas', '$fasa', '$merek', '$noseri', '$thntrafo', '$lat', '$lng', '$minyak', '$konstruksi', '$vector', '$imp', '$jlh_jur', '$jlh_tap', '$pos_tap', '$tgl_psg', '$ket')";
	if (!$result = mysqli_query($db, $query))
		{
		exit(mysqli_error());
		}

	echo "1 Record Added!";
		//masukkan ke master
	$kw = "UPDATE `master` SET `tgl2a` = '$tgl', `hi_2a_oil`='$oil', `bdv` = '$bdv', `hi_bdv`='$hi_bdv'  WHERE `kodegd` = '$kodegd'";
    if (!$result = mysqli_query($db, $kw)) {
        exit(mysqli_error());
    }
	}
?>