<?php
include('../../session.php');
if (isset($_POST['kodegd']))
	{
	include ("db_connection.php");
	// get values
	$kodegd = $_POST['kodegd'];
	$ptgs = $_POST['ptgs'];	
	$tgl = $_POST['tgl'];	
	$pb1 = $_POST['pb1'];
	$pb2 = $_POST['pb2'];
	$pb3 = $_POST['pb3'];	
	$sb1 = $_POST['sb1'];	
	$sb2 = $_POST['sb2'];	
	$sb3 = $_POST['sb3'];
	$pp1 = $_POST['pp1'];
	$pp2 = $_POST['pp2'];	
	$pp3 = $_POST['pp3'];	
	$ps1 = $_POST['ps1'];
	$ps2 = $_POST['ps2'];
	$ps3 = $_POST['ps3'];
$gede = min ($ps1,$ps2,$ps3,$pb1,$pb2,$pb3,$sb1,$sb2,$sb3);
		if ($gede >= 20) {$hi_gd = '4';}
		else if ($gede >= 5 && $gede < 20) {$hi_gd = '3';}
		else if ($gede >= 1 && $gede < 5) {$hi_gd = '2';}
		else if ($gede <= 1 ) {$hi_gd = '1';}
		else {$hi_gd = '0';}
		
	$ss1 = $_POST['ss1'];
	$ss2 = $_POST['ss2'];
	$ss3 = $_POST['ss3'];
	$ss4 = $_POST['ss4'];
	$ss5 = $_POST['ss5'];
	$ss6 = $_POST['ss6'];
$cilik = max ($pp1,$pp2,$pp3,$ss1,$ss2,$ss3,$ss4,$ss5,$ss6);
		if ($cilik >= 0 && $cilik < 0.1) {$hi_cl = '4';}
		else if ($cilik >= 0.1 && $cilik < 0.2) {$hi_cl = '3';}
		else if ($cilik >= 0.2 && $cilik < 0.5 ) {$hi_cl = '2';}
		else if ($cilik >= 0.5 ) {$hi_cl = '1';}
		else {$hi_cl = '0';}	
$hi3b=min($hi_gd,$hi_cl);	
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
	
	$query = "INSERT INTO t3b(kodegd, ptgs, tgl, pb1, pb2, pb3, sb1, sb2, sb3, pp1, pp2, pp3, ps1, ps2, ps3, ss1, ss2, ss3, ss4, ss5, ss6, idarea, idrayon, area, rayon, alamat, feeder, ufeeder, kapasitas, fasa, merek, noseri, thntrafo, lat, lng, minyak, konstruksi, vector, imp, jlh_jur, jlh_tap, pos_tap, tgl_psg, ket) VALUES('$kodegd', '$ptgs', '$tgl', '$pb1', '$pb2', '$pb3', '$sb1', '$sb2', '$sb3', '$pp1', '$pp2', '$pp3', '$ps1', '$ps2', '$ps3', '$ss1', '$ss2', '$ss3', '$ss4', '$ss5', '$ss6', '$login_idarea', '$login_idrayon', '$login_area', '$login_rayon', '$alamat', '$feeder', '$ufeeder', '$kapasitas', '$fasa', '$merek', '$noseri', '$thntrafo', '$lat', '$lng', '$minyak', '$konstruksi', '$vector', '$imp', '$jlh_jur', '$jlh_tap', '$pos_tap', '$tgl_psg', '$ket')";
	if (!$result = mysqli_query($db, $query))
		{
		exit(mysqli_error());
		}

	echo "1 Record Added!";
		$kw = "UPDATE `master` SET `tgl3b` = '$tgl', `hi3b`='$hi3b' WHERE `kodegd` = '$kodegd'";
    if (!$result = mysqli_query($db, $kw)) {
        exit(mysqli_error());
    }
	}
?>