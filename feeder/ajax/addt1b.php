<?php
include('../../session.php');
if (isset($_POST['kodegd']))
	{
	include ("db_connection.php");
	
	$filename = $_FILES['file']['name'];
	
	$location = 'upload/'.$filename;
	
	$file_extension = pathinfo($location, PATHINFO_EXTENSION);
	$file_extension = strtolower($file_extension);
	
	$image_ext = array("jpg","png","jpeg","gif");

	$response = 0;
	if(in_array($file_extension,$image_ext)){
  // Upload file
	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
    $response = $location;
	}
	}

echo $response;
	
	// get values
	$kodegd = $_POST['kodegd'];
	$ptgs = $_POST['ptgs'];	
	$tgl = $_POST['tgl'];	
	$oil = $_POST['oil'];
	$fisik = $_POST['fisik'];
	$phb = $_POST['phb'];
	$netral = $_POST['netral'];
	$body = $_POST['body'];
	$la = $_POST['la'];
	$ground_max = max($netral, $body, $la);
	
		if ($ground_max > 0 && $ground_max < 5) {$hi_ground= '4';}
		else if ($ground_max >= 5 && $ground_max < 10) {$hi_ground = '3';}
		else if ($ground_max >= 10 && $ground_max < 25) {$hi_ground = '2';}
		else if ($ground_max >= 25 ) {$hi_ground = '1';}
		else {$hi_ground = '0';}	
		
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
	
	
$query = "INSERT INTO t1b(kodegd, ptgs, tgl, oil, fisik, phb, netral, bodyy, la, idarea, idrayon, area, rayon, alamat, feeder, ufeeder, kapasitas, fasa, merek, noseri, thntrafo, lat, lng, minyak, konstruksi, vector, imp, jlh_jur, jlh_tap, pos_tap, tgl_psg, ket) VALUES('$kodegd', '$ptgs', '$tgl', '$oil', '$fisik', '$phb', '$netral', '$body', '$la', '$login_idarea', '$login_idrayon', '$login_area', '$login_rayon', '$alamat', '$feeder', '$ufeeder', '$kapasitas', '$fasa', '$merek', '$noseri', '$thntrafo', '$lat', '$lng', '$minyak', '$konstruksi', '$vector', '$imp', '$jlh_jur', '$jlh_tap', '$pos_tap', '$tgl_psg', '$ket')";	
	
	if (!$result = mysqli_query($db, $query))
		{
		exit(mysqli_error());
		}

	echo "1 Record Added!";
	//masukkan ke master
	$kw = "UPDATE `master` SET `tgl1b` = '$tgl', `hi_1b_oil`='$oil', `hi_1b_fisik` = '$fisik',  `hi_1b_phb` = '$phb', `g_netral` = '$netral', `g_body` = '$body',`g_la` = '$la', `hi_ground` = '$hi_ground'  WHERE `kodegd` = '$kodegd'";
    if (!$result = mysqli_query($db, $kw)) {
        exit(mysqli_error());
    }
	}


?>