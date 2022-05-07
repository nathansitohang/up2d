<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
		$idgardu = $_POST['idgardu'];  
		$idgardu = base64_decode($idgardu);
		$idgardu = $idgardu/123678;	
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
		$beban1=$_POST['beban1'];
		$beban2=$_POST['beban2'];
		$kap=$kapasitas;
		
		
		
		if ($kap >0){
		$persen1=ceil(100*$beban1/$kap);
		$persen2=ceil(100*$beban2/$kap);}
		else {$persen1=''; $persen2='';}
	
		if ($persen1 > 0 && $persen1 <= 60) {$hi_beban1 = 4;}
		else if ($persen1 >= 60 && $persen1 < 80) {$hi_beban1 = 3;}
		else if ($persen1 >= 80 && $persen1 < 100) {$hi_beban1 = 2;}
		else if ($persen1 >= 100 ) {$hi_beban1 = 1;}
		else {$hi_beban1 = 0;}

		if ($persen2 > 0 && $persen2 <= 60) {$hi_beban2 = 4;}
		else if ($persen2 >= 60 && $persen2 < 80) {$hi_beban2 = 3;}
		else if ($persen2 >= 80 && $persen2 < 100) {$hi_beban2 = 2;}
		else if ($persen2 >= 100 ) {$hi_beban2 = 1;}
		else {$hi_beban2 = 0;}	
		
		$hi_beban=min($hi_beban1,$hi_beban2);
		
		//netral
		$netral_1=$_POST['netral1']/$kap;
		$netral_2=$_POST['netral2']/$kap;
		$fasan = $fasa;
		if ($fasan==1){$netral1=$netral_1/1.5;$netral2=$netral_2/1.5;}
		else {$netral1=$netral_1;$netral2=$netral_2;}
		
		if ($netral1 > 0 &&  $netral1 <= 10) {$hi_netral1= '4';}
		else if ($netral1 > 10 && $netral1 <= 15) {$hi_netral1 = '3';}
		else if ($netral1 > 15 && $netral1 <= 20) {$hi_netral1 = '2';}
		else if ($netral1 > 20 ) {$hi_netral1 = '1';}
		else {$hi_netral1 = '0';}	
		
		if ($netral2 > 0 &&  $netral2 <= 10) {$hi_netral2= '4';}
		else if ($netral2 > 10 && $netral2 <= 15) {$hi_netral2 = '3';}
		else if ($netral2 > 15 && $netral2 <= 20) {$hi_netral2 = '2';}
		else if ($netral2 > 20 ) {$hi_netral2 = '1';}
		else {$hi_netral2 = '0';}	
		$hi_netral=min($hi_netral1,$hi_netral2);
		
		//fasa
		$maxi_1=$_POST['maxi_1']/$kap;
		$maxi_2=$_POST['maxi_2']/$kap;
		$fasan = $fasa;
		if ($fasan==1){$maxi_1=$maxi_1/1.5;$maxi_2=$maxi_2/1.5;}
		else {$maxi_1=$maxi_1;$maxi_2=$maxi_2;}
		
		if ($maxi_1 > 0 &&  $maxi_1 < 60) {$hi_arus1= '4';}
		else if ($maxi_1 >= 60 && $maxi_1 < 80) {$hi_arus1 = '3';}
		else if ($maxi_1 >= 80 && $maxi_1 < 100) {$hi_arus1 = '2';}
		else if ($maxi_1 >= 100 ) {$hi_arus1 = '1';}
		else {$hi_arus1 = '0';}	
		
		if ($maxi_2 > 0 &&  $maxi_2 < 60) {$hi_arus2= '4';}
		else if ($maxi_2 >= 60 && $maxi_2 < 80) {$hi_arus2= '3';}
		else if ($maxi_2 >= 80 && $maxi_2 < 100) {$hi_arus2 = '2';}
		else if ($maxi_2 >= 100 ) {$hi_arus2 = '1';}
		else {$hi_arus2 = '0';}	
		$hi_arus=min($hi_arus1,$hi_arus2);
		

    // Updaste User details
    $query = "UPDATE master SET alamat = '$alamat', kapasitas= '$kapasitas', feeder= '$feeder', ufeeder = '$ufeeder', lat = '$lat', lng = '$lng', konstruksi = '$konstruksi', merek = '$merek', noseri = '$noseri', fasa='$fasa', thntrafo = '$thntrafo', jlh_tap = '$jlh_tap', pos_tap = '$pos_tap', imp = '$imp', minyak = '$minyak', vector = '$vector', tgl_psg = '$tgl_psg', jlh_jur = '$jlh_jur', ket = '$ket', beban1='$beban1', beban2='$beban2', persen1 = '$persen1', persen2='$persen2', hi_beban1 = '$hi_beban1', hi_beban2='$hi_beban2', hi_beban='$hi_beban', `netral1` = '$netral1',  `netral2` = '$netral2', `hi_netral1`='$hi_netral1', `hi_netral2`='$hi_netral2', `hi_netral`='$hi_netral', `maxi_1` = '$maxi_1',  `maxi_2` = '$maxi_2', `hi_arus1`='$hi_arus1', `hi_arus2`='$hi_arus2', `hi_arus`='$hi_arus' WHERE idgardu = '$idgardu'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error());
    }
}
?>