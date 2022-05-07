<?php
include('../../session.php');
if (isset($_POST['kodegd']))
	{
	include ("db_connection.php");
	// get values
	$kodegd = $_POST['kodegd'];
	$ptgs = $_POST['ptgs'];	
	$tgl = $_POST['tgl'];	
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	$p3 = $_POST['p1'];
	$s1 = $_POST['s1'];
	$s2 = $_POST['s2'];
	$s3 = $_POST['s3'];
	$max = max($p1,$p2,$p3,$s1,$s2,$s3);
	$max = max ($pp1,$pp2,$pp3,$ss1,$ss2,$ss3,$ss4,$ss5,$ss6);
		if ($max >= 0 && $max < 0.3) {$hi3c = '4';}
		else if ($max >= 0.3 && $max < 0.5) {$hi3c = '3';}
		else if ($max >= 0.5 && $max < 0.7 ) {$hi3c = '2';}
		else if ($max >= 0.7 ) {$hi3c = '1';}
		else {$hi3c = '0';}	
		
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
	
	$query = "INSERT INTO t3c(kodegd, ptgs, tgl, p1, p2, p3, s1, s2, s3, idarea, idrayon, area, rayon, alamat, feeder, ufeeder, kapasitas, fasa, merek, noseri, thntrafo, lat, lng, minyak, konstruksi, vector, imp, jlh_jur, jlh_tap, pos_tap, tgl_psg, ket) VALUES('$kodegd', '$ptgs', '$tgl', '$p1', '$p2',  '$p3', '$s1', '$s2', '$s3', '$login_idarea', '$login_idrayon', '$login_area', '$login_rayon', '$alamat', '$feeder', '$ufeeder', '$kapasitas', '$fasa', '$merek', '$noseri', '$thntrafo', '$lat', '$lng', '$minyak', '$konstruksi', '$vector', '$imp', '$jlh_jur', '$jlh_tap', '$pos_tap', '$tgl_psg', '$ket')";
	if (!$result = mysqli_query($db, $query))
		{
		exit(mysqli_error());
		}

	echo "1 Record Added!";
	
		$kw = "UPDATE `master` SET `tgl3c` = '$tgl', `hi3c`='$hi3c' WHERE `kodegd` = '$kodegd'";
    if (!$result = mysqli_query($db, $kw)) {
        exit(mysqli_error());
    }
	}
?>