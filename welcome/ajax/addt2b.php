<?php
include('../../session.php');
if (isset($_POST['kodegd']))
	{
	include ("db_connection.php");
	// get values
	$kodegd = $_POST['kodegd'];
	$ptgs = $_POST['ptgs'];	
	$tgl = $_POST['tgl'];	
	$amb = $_POST['amb'];
	$incfco = $_POST['incfco'];
	$outfco = $_POST['outfco'];
	$bodyt = $_POST['bodyt'];	
	$bushtm = $_POST['bushtm'];	
	$bushtr = $_POST['bushtr'];
	$opsinc = $_POST['opsinc'];
	$opsout = $_POST['opsout'];	
	$ntholder = $_POST['ntholder'];
	$skun = $_POST['skun'];
	$conn = $_POST['conn'];
	$maxthe=max($incfco,$outfco,$bushtm,$bushtr,$opsinc,$opsout,$ntholder,$skun,$conn);
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
	
		$delta=$maxthe-$amb;
		if ($delta >= 0 && $delta < 10) {$hi_2b = '4';}
		else if ($delta >= 10 && $delta < 12) {$hi_2b = '3';}
		else if ($delta >= 12 && $delta < 15) {$hi_2b = '2';}
		else if ($delta >= 15 ) {$hi_2b = '1';}
		else {$hi_2b = '0';}	
		
		if ($bodyt >= 0 && $bodyt < 83) {$hi_2b_body = '4';}
		else if ($bodyt >= 83 && $bodyt < 85) {$hi_2b_body = '3';}
		else if ($bodyt >= 85 && $bodyt < 90) {$hi_2b_body = '2';}
		else if ($bodyt >= 90 ) {$hi_2b_body = '1';}
		else {$hi_2b_body = '0';}		
	
	$query = "INSERT INTO t2b(kodegd, ptgs, tgl, amb, incfco, outfco, bodyt, bushtm, bushtr, opsinc, opsout, ntholder, skun, conn, idarea, idrayon, area, rayon, alamat, feeder, ufeeder, kapasitas, fasa, merek, noseri, thntrafo, lat, lng, minyak, konstruksi, vector, imp, jlh_jur, jlh_tap, pos_tap, tgl_psg, ket) VALUES('$kodegd', '$ptgs', '$tgl', '$amb', '$incfco', '$outfco', '$bodyt', '$bushtm', '$bushtr', '$opsinc', '$opsout', '$ntholder', '$skun', '$conn', '$login_idarea', '$login_idrayon', '$login_area', '$login_rayon', '$alamat', '$feeder', '$ufeeder', '$kapasitas', '$fasa', '$merek', '$noseri', '$thntrafo', '$lat', '$lng', '$minyak', '$konstruksi', '$vector', '$imp', '$jlh_jur', '$jlh_tap', '$pos_tap', '$tgl_psg', '$ket')";
	if (!$result = mysqli_query($db, $query))
		{
		exit(mysqli_error());
		}

	echo "1 Record Added!";
	$kw = "UPDATE `master` SET `tgl2b` = '$tgl', `hi_2b`='$hi_2b', `maxthe` = '$maxthe', `hi_2b_body`='$hi_2b_body', `therbody` = '$bodyt'  WHERE `kodegd` = '$kodegd'";
    if (!$result = mysqli_query($db, $kw)) {
        exit(mysqli_error());
    }
	}
?>