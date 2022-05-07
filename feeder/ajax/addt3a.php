<?php
include('../../session.php');
if (isset($_POST['kodegd']))
	{
	include ("db_connection.php");
	// get values
	$fasa = $_POST['fasa'];
	$kodegd = $_POST['kodegd'];
	$ptgs = $_POST['ptgs'];	
	$tgl = $_POST['tgl'];	
	$tap1a = $_POST['tap1a'];
	$tap1b = $_POST['tap1b'];
	$tap1c = $_POST['tap1c'];
	$tap1 = ($tap1a+$tap1b+$tap1c)/3;
	$dev1 = 100*abs ($tap1-82.2724)/82.2724;
	$tap2a = $_POST['tap2a'];	
	$tap2b = $_POST['tap2b'];	
	$tap2c = $_POST['tap2c'];
	$tap2 = ($tap2a+$tap2b+$tap2c)/3;
	$dev2 = 100*abs ($tap2-84.4375)/84.4375;
	$tap3a = $_POST['tap3a'];
	$tap3b = $_POST['tap3b'];	
	$tap3c = $_POST['tap3c'];
	$tap3 = ($tap3a+$tap3b+$tap3c)/3;
	$dev3 = 100*abs ($tap3-86.6025)/86.6025;
	$tap4a = $_POST['tap4a'];
	$tap4b = $_POST['tap4b'];
	$tap4c = $_POST['tap4c'];
	$tap4 = ($tap4a+$tap4b+$tap4c)/3;
	$dev4 = 100*abs ($tap4-88.7676)/88.7676;	
	$tap5a = $_POST['tap5a'];
	$tap5b = $_POST['tap5b'];
	$tap5c = $_POST['tap5c'];
	$tap5 = ($tap5a+$tap5b+$tap5c)/3;
	$dev5 = 100*abs ($tap5-90.9327)/90.9327;
	$dev = max ($dev1,$dev2,$dev3,$dev4,$dev5);
		if ($dev >= 0 && $dev < 0.3) {$hi3a = '4';}
		else if ($dev >= 0.3 && $dev < 0.5) {$hi3a = '3';}
		else if ($dev >= 0.5 && $dev < 0.7) {$hi3a = '2';}
		else if ($dev >= 0.7 ) {$hi3a = '1';}
		else {$hi3a = '0';}
	
	$alamat = $_POST['alamat'];	
        $feeder = $_POST['feeder'];	
        $ufeeder = $_POST['ufeeder'];	
        $kapasitas = $_POST['kapasitas'];
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
	
	$query = "INSERT INTO t3a(kodegd, ptgs, tgl, tap1a, tap1b, tap1c, tap2a, tap2b, tap2c, tap3a, tap3b, tap3c, tap4a, tap4b, tap4c, tap5a, tap5b, tap5c, idarea, idrayon, area, rayon, alamat, feeder, ufeeder, kapasitas, fasa, merek, noseri, thntrafo, lat, lng, minyak, konstruksi, vector, imp, jlh_jur, jlh_tap, pos_tap, tgl_psg, ket) VALUES('$kodegd', '$ptgs', '$tgl', '$tap1a', '$tap1b', '$tap1c', '$tap2a', '$tap2b', '$tap2c', '$tap3a', '$tap3b', '$tap3c', '$tap4a', '$tap4b', '$tap4c', '$tap5a', '$tap5b', '$tap5c', '$login_idarea', '$login_idrayon', '$login_area', '$login_rayon', '$alamat', '$feeder', '$ufeeder', '$kapasitas', '$fasa', '$merek', '$noseri', '$thntrafo', '$lat', '$lng', '$minyak', '$konstruksi', '$vector', '$imp', '$jlh_jur', '$jlh_tap', '$pos_tap', '$tgl_psg', '$ket')";
	if (!$result = mysqli_query($db, $query))
		{
		exit(mysqli_error());
		}

	echo "1 Record Added!";
		$kw = "UPDATE `master` SET `tgl3a` = '$tgl', `hi3a`='$hi3a' WHERE `kodegd` = '$kodegd'";
    if (!$result = mysqli_query($db, $kw)) {
        exit(mysqli_error());
    }
	}
?>