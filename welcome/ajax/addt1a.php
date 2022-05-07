<?php
include('../../session.php');
if (isset($_POST['kodegd']))
	{
	include ("db_connection.php");

	// get values
		$kodegd = $_POST['kodegd'];
		$ptgs1 = $_POST['ptgs1'];	
		$tgl1 = $_POST['tgl1'];
		if ($tgl1 == ""){$tgl1 = "1990-01-01";}else {$tgl1 = $tgl1;}
		$vln1 = $_POST['vln1'];
		$ir1 = $_POST['ir1'];
		$is1 = $_POST['is1'];
		$it1 = $_POST['it1'];
		$in1 = $_POST['in1'];
		$pf1 = $_POST['pf1'];
		$ira1 = $_POST['ira1'];
		$isa1 = $_POST['isa1'];
		$ita1 = $_POST['ita1'];
		$ina1 = $_POST['ina1'];
		$irb1 = $_POST['irb1'];
		$isb1 = $_POST['isb1'];
		$itb1 = $_POST['itb1'];
		$inb1 = $_POST['inb1'];
		$irc1 = $_POST['irc1'];
		$isc1 = $_POST['isc1'];
		$itc1 = $_POST['itc1'];
		$inc1 = $_POST['inc1'];	
		$ird1 = $_POST['ird1'];
		$isd1 = $_POST['isd1'];
		$itd1 = $_POST['itd1'];
		$ind1 = $_POST['ind1'];
		$ptgs2 = $_POST['ptgs2'];	
		$tgl2 = $_POST['tgl2'];
		if ($tgl2 == ""){$tgl2 = "1990-01-01";}else {$tgl2 = $tgl2;}
		$vln2 = $_POST['vln2'];	
		$ir2 = $_POST['ir2'];
		$is2 = $_POST['is2'];
		$it2 = $_POST['it2'];
		$in2 = $_POST['in2'];
		$pf2 = $_POST['pf2'];
		$ira2 = $_POST['ira2'];
		$isa2 = $_POST['isa2'];
		$ita2 = $_POST['ita2'];
		$ina2 = $_POST['ina2'];
		$irb2 = $_POST['irb2'];
		$isb2 = $_POST['isb2'];
		$itb2 = $_POST['itb2'];
		$inb2 = $_POST['inb2'];
		$irc2 = $_POST['irc2'];
		$isc2 = $_POST['isc2'];
		$itc2 = $_POST['itc2'];
		$inc2 = $_POST['inc2'];
		$ird2 = $_POST['ird2'];
		$isd2 = $_POST['isd2'];
		$itd2 = $_POST['itd2'];
		$ind2 = $_POST['ind2'];	
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
		$kap = $kapasitas;
		
		if ($fasa == 1) {$kap = 1.5*$kap;} else {$kap=$kap;}
		$pcn1= 100*((($ir1+$is1+$it1)*$vln1)/1000)/$kapasitas;
		$pcn2= 100*((($ir2+$is2+$it2)*$vln2)/1000)/$kapasitas;
		$beban1 = ((($ir1+$is1+$it1)*$vln1)/1000);
		$beban2 = ((($ir2+$is2+$it2)*$vln2)/1000);
		
		if ($pcn1 >= 0 && $pcn1 < 60) {$hi_beban1 = 4;}
		else if ($pcn1 >= 60 && $pcn1 < 80) {$hi_beban1 = 3;}
		else if ($pcn1 >= 80 && $pcn1 < 100) {$hi_beban1 = 2;}
		else if ($pcn1 >= 100 ) {$hi_beban1 = 1;}
		else {$hi_beban1 = 0;}

		if ($pcn2 >= 0 && $pcn2 < 60) {$hi_beban2 = 4;}
		else if ($pcn2 >= 60 && $pcn2 < 80) {$hi_beban2 = 3;}
		else if ($pcn2 >= 80 && $pcn2 < 100) {$hi_beban2 = 2;}
		else if ($pcn2 >= 100 ) {$hi_beban2 = 1;}
		else {$hi_beban2 = 0;}	

		$hi_beban=min($hi_beban1,$hi_beban2);
		
		$tot=$ir1+$is1+$it1;
		if($tot == 0) {$imbang='';}
		else if ($fasa == 3){$imbang = ceil(100*(max($ir1,$is1,$it1)-min($ir1,$is1,$it1))/($tot/3));}
		else if ($fasa == 1){$maxinc=max($ir1,$is1,$it1); $min_inc=min($ir1,$is1,$it1); $mininc=$tot-$maxinc; 
		$imbang = ceil(100*($maxinc-$mininc)/($tot/2));}
		else {$imbang = '';}
		
		if ($imbang >= 0 && $imbang < 10) {$hi_imbang1= '4';}
		else if ($imbang >= 10 && $imbang < 20) {$hi_imbang1 = '3';}
		else if ($imbang >= 20 && $imbang < 25) {$hi_imbang1 = '2';}
		else if ($imbang >= 25 ) {$hi_imbang1 = '1';}
		else {$hi_imbang1 = '0';}	
		
		$tot2=$ir2+$is2+$it2;
		if($tot2 == 0) {$imbang2='';}
		else if ($fasa == 3){$imbang2 = ceil(100*(max($ir2,$is2,$it2)-min($ir2,$is2,$it2))/($tot2/3));}
		else if ($fasa == 1){$maxinc2=max($ir2,$is2,$it2); $min_inc2=min($ir2,$is2,$it2); $mininc2=$tot2-$maxinc2; 
		$imbang2 = ceil(100*($maxinc2-$mininc2)/($tot2/2));}
		else {$imbang2 = '';}
		
		if ($imbang2 >= 0 && $imbang2 < 10) {$hi_imbang2= '4';}
		else if ($imbang2 >= 10 && $imbang2 < 20) {$hi_imbang2 = '3';}
		else if ($imbang2 >= 20 && $imbang2 < 25) {$hi_imbang2 = '2';}
		else if ($imbang2 >= 25 ) {$hi_imbang2 = '1';}
		else {$hi_imbang2 = '0';}	
	
		$hi_imbang=min($hi_imbang1,$hi_imbang2);
	
	//Netral
		$kaps =  $kapasitas;
		
		if ($fasa == 1) {$kaps = 1.5*$kaps;} else {$kaps=$kaps;}		
		if ($kaps > 0){$amp = ($kaps*1000)/(sqrt(3)*400);}
		else 
		{$ampe=10^-5; 
		$amp=$ampe;
		}
		$netral1 = ceil(100*$in1/$amp);
		if ($netral1 > 0 &&  $netral1 <= 10) {$hi_netral1= '4';}
		else if ($netral1 > 10 && $netral1 <= 15) {$hi_netral1 = '3';}
		else if ($netral1 > 15 && $netral1 <= 20) {$hi_netral1 = '2';}
		else if ($netral1 > 20 ) {$hi_netral1 = '1';}
		else {$hi_netral1 = '0';}	
		
		$netral2 = ceil(100*$in2/$amp);
		if ($netral2 > 0 &&  $netral2 <= 10) {$hi_netral2= '4';}
		else if ($netral2 > 10 && $netral2 <= 15) {$hi_netral2 = '3';}
		else if ($netral2 > 15 && $netral2 <= 20) {$hi_netral2 = '2';}
		else if ($netral2 > 20 ) {$hi_netral2 = '1';}
		else {$hi_netral2 = '0';}	
		$hi_netral=min($hi_netral1,$hi_netral2);
	
	
		$maxi_1 = ceil(100*max($ir1, $is1, $it1)/$amp);
		if ($maxi_1 > 0 &&  $maxi_1 < 60) {$hi_arus1= '4';}
		else if ($maxi_1 >= 60 && $maxi_1 < 80) {$hi_arus1 = '3';}
		else if ($maxi_1 >= 80 && $maxi_1 < 100) {$hi_arus1 = '2';}
		else if ($maxi_1 >= 100 ) {$hi_arus1 = '1';}
		else {$hi_arus1 = '0';}	
		$maxi_2 = ceil(100*max($ir2, $is2, $it2)/$amp);
		if ($maxi_2 > 0 &&  $maxi_2 < 60) {$hi_arus2= '4';}
		else if ($maxi_2 >= 60 && $maxi_2 < 80) {$hi_arus2 = '3';}
		else if ($maxi_2 >= 80 && $maxi_2 < 100) {$hi_arus2 = '2';}
		else if ($maxi_2 >= 100 ) {$hi_arus2 = '1';}
		else {$hi_arus2 = '0';}	
		$hi_arus=min($hi_arus1,$hi_arus2);


	$query = "INSERT INTO t1a(kodegd, ptgs1, tgl1, vln1, ir1, is1, it1, in1, pf1, ira1, isa1, ita1, ina1, irb1, isb1, itb1, inb1, irc1, isc1, itc1, inc1, ird1, isd1, itd1, ind1, ptgs2, tgl2, vln2, ir2, is2, it2, in2, pf2, ira2, isa2, ita2, ina2, irb2, isb2, itb2, inb2, irc2, isc2, itc2, inc2, ird2, isd2, itd2, ind2, idarea, idrayon, area, rayon, alamat, feeder, ufeeder, kapasitas, fasa, merek, noseri, thntrafo, lat, lng, minyak, konstruksi, vector, imp, jlh_jur, jlh_tap, pos_tap, tgl_psg, ket) VALUES('$kodegd', '$ptgs1', '$tgl1', '$vln1', '$ir1', '$is1', '$it1', '$in1', '$pf1', '$ira1', '$isa1', '$ita1', '$ina1', '$irb1', '$isb1', '$itb1', '$inb1', '$irc1', '$isc1', '$itc1', '$inc1', '$ird1', '$isd1', '$itd1', '$ind1', '$ptgs2', '$tgl2','$vln2',  '$ir2', '$is2', '$it2', '$in2', '$pf2', '$ira2', '$isa2', '$ita2', '$ina2', '$irb2', '$isb2', '$itb2', '$inb2', '$irc2', '$isc2', '$itc2', '$inc2', '$ird2', '$isd2', '$itd2', '$ind2', '$login_idarea', '$login_idrayon', '$login_area', '$login_rayon', '$alamat', '$feeder', '$ufeeder', '$kapasitas', '$fasa', '$merek', '$noseri', '$thntrafo', '$lat', '$lng', '$minyak', '$konstruksi', '$vector', '$imp', '$jlh_jur', '$jlh_tap', '$pos_tap', '$tgl_psg', '$ket')";
	if (!$result = mysqli_query($db, $query))
		{
		exit(mysqli_error());
		}

	echo "1 Record Added!";
	
	//memasukkan data tier 1 ke master gardu
	$kw = "UPDATE `master` SET `persen1` = '$pcn1', `persen2`='$pcn2', `beban1` = '$beban1',  `beban2` = '$beban2', `tgl1a_1` = '$tgl1', `tgl1a_2` = '$tgl2',`hi_beban1` = '$hi_beban1', `hi_beban2`='$hi_beban2', `hi_beban`='$hi_beban', `imbang` = '$imbang',  `imbang2` = '$imbang2', `hi_imbang1` = '$hi_imbang1', `hi_imbang2`='$hi_imbang2', `hi_imbang`='$hi_imbang', `netral1` = '$netral1',  `netral2` = '$netral2', `hi_netral1`='$hi_netral1', `hi_netral2`='$hi_netral2', `hi_netral`='$hi_netral', `maxi_1` = '$maxi_1',  `maxi_2` = '$maxi_2', `hi_arus1`='$hi_arus1', `hi_arus2`='$hi_arus2', `hi_arus`='$hi_arus'   WHERE `kodegd` = '$kodegd'";
    if (!$result = mysqli_query($db, $kw)) {
        exit(mysqli_error());
    }

	}

?>