<?php
    include "../../config.php";
	include('../../session.php');
		if (!empty($_GET['assesment']) && !empty($_GET['id']) && !empty($_GET['log']) ) {
			if (base64_decode($_GET['log'])/13532 == $kali) {
	 	
		$id_t1a= base64_decode($_GET['assesment']);
		$id_t1a= $id_t1a/(190991*$kali);
		//echo $id_t1a;
		$cek_int_tla = is_int($id_t1a);
		//echo $cek_int_tla;
		//echo "<br>";
		
		
		$id= base64_decode($_GET['id']);
		$id=$id/(24021995*$kali);

		
		
		
		if ($id_t1a<1 || $cek_int_tla != 1 || $id<1  ) {
		echo "<script>window.location = '../../index.php'</script>";
		}
		else {
		

		$kuery = "SELECT * FROM t1a WHERE id_t1a = $id_t1a";
		$hasil = mysqli_query($db, $kuery);
		if (!$hasil) {
		die('Invalid query: ' . mysqli_error());
		}
		$baris = mysqli_fetch_assoc($hasil);
	
	
		$query = "SELECT * FROM master WHERE idgardu = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}
		$row = mysqli_fetch_assoc($result);
		$konstruksi = $baris['konstruksi']; 
		
		if ($konstruksi == 1) { $konstruks = 'Single Pole Tanpa Rak' ;}
		else if ($konstruksi == 2) { $konstruks = 'Single Pole Dengan Rak';}
		else if ($konstruksi == 3) { $konstruks = 'Double Pole' ;}
		else if ($konstruksi == 4) { $konstruks = 'Beton';}
		else if ($konstruksi == 5) { $konstruks = 'Kios';}
		else { $konstruks = 'Belum Pilih'; }
		//Hitung kHA trafo
		$kaps =  $baris['kapasitas'];
		$fasa = $baris['fasa'];
		$kapasitas =  $baris['kapasitas'];
		
		if ($fasa == 1) {$kaps = 1.5*$kaps;} 
		else {$kaps=$kaps;}		
		if ($kaps > 0){$amp = ($kaps*1000)/(sqrt(3)*400);}
		else 
		{$ampe=10^-5; 
		$amp=$ampe;
		}
		$pcn_netral = ceil(100*$baris['in1']/$amp);
		if ($pcn_netral > 0 &&  $pcn_netral <= 10) {$hi_netral= 'Baik';}
		else if ($pcn_netral > 10 && $pcn_netral <= 15) {$hi_netral = 'Cukup';}
		else if ($pcn_netral > 15 && $pcn_netral <= 20) {$hi_netral = 'Kurang';}
		else if ($pcn_netral > 20 ) {$hi_netral = 'Buruk';}
		else {$hi_netral = 'Belum Assesment';}	
		
		//Hitung %outlet per fasa
		$outletr = ceil(100*$baris['ir1']/$amp);
		if($outletr > 0.01){$outlet_r=$outletr;} else {$outlet_r='-';} 
		$outlets = ceil(100*$baris['is1']/$amp);
		if($outlets > 0.01){$outlet_s=$outlets;} else {$outlet_s='-';} 
		$outlett = ceil(100*$baris['it1']/$amp);
		if($outlett > 0.01){$outlet_t=$outlett;} else {$outlet_t='-';} 	
		
		$max_out = max ($outlet_r, $outlet_s, $outlet_t) ;
		if ($max_out >= 0 && $max_out < 60) {$hi_arus= 'Baik';}
		else if ($max_out >= 60 && $max_out < 80) {$hi_arus = 'Cukup';}
		else if ($max_out >= 80 && $max_out < 100) {$hi_arus = 'Kurang';}
		else if ($max_out >= 100 ) {$hi_arus = 'Buruk';}
		else {$hi_arus = 'Belum Assesment';}	

		$vln1=0.001*$baris['vln1']; //tegangan dalam kV
		
		//Hitung beban jurusan A LWBP
		if ($baris['ira1']== 0 && $baris['isa1']== 0 && $baris['ita1']== 0 && $baris['ina1']== 0) {$ira1 = '-'; $isa1 = '-'; $ita1= '-'; $ina1= '-'; $outa= ''; $pcntg_a= '';}
		else {
		$ira1 = $baris['ira1']; 
		$isa1 = $baris['isa1']; 
		$ita1 = $baris['ita1'];
		$ina1 = $baris['ina1'];
		$tot_a = $ira1+$isa1+$ita1; 
		$outa = ceil($tot_a*$vln1);
		if ($kapasitas>0){$pcntg_a = ceil (100*$outa/$kapasitas); } else {$pcntg_a = 'Error!!';}
		}
		
		//Hitung beban jurusan B LWBP
		if ($baris['irb1']== 0 && $baris['isb1']== 0 && $baris['itb1']== 0 && $baris['inb1']== 0) {$irb1 = '-'; $isb1 = '-'; $itb1= '-'; $inb1= '-'; $outb= ''; $pcntg_b= '';}
		else {
		$irb1 = $baris['irb1']; 
		$isb1 = $baris['isb1']; 
		$itb1 = $baris['itb1'];
		$inb1 = $baris['inb1'];
		$tot_b = $irb1+$isb1+$itb1; 
		$outb = ceil($tot_b*$vln1);
		if ($kapasitas>0){$pcntg_b = ceil (100*$outb/$kapasitas);} else {$pcntg_b = 'Error!!';}
		}
		
		//Hitung beban jurusan C LWBP
		if ($baris['irc1']== 0 && $baris['isc1']== 0 && $baris['itc1']== 0 && $baris['inc1']== 0) {$irc1 = '-'; $isc1 = '-'; $itc1= '-';  $inc1= '-';$outc= ''; $pcntg_c= '';}
		else {
		$irc1 = $baris['irc1']; 
		$isc1 = $baris['isc1']; 
		$itc1 = $baris['itc1'];
		$inc1 = $baris['inc1'];
		$tot_c = $irc1+$isc1+$itc1; 
		$outc = ceil($tot_c*$vln1);
		if ($kapasitas>0){$pcntg_c = ceil (100*$outc/$kapasitas);} else {$pcntg_c = 'Error!!';}
		}

		//Hitung beban jurusan D LWBP
		if ($baris['ird1']== 0 && $baris['isd1']== 0 && $baris['itd1']== 0 && $baris['ind1']== 0) {$ird1 = '-'; $isd1 = '-'; $itd1= '-'; $ind1= '-'; $outd= ''; $pcntg_d= '';}
		else {
		$ird1 = $baris['ird1']; 
		$isd1 = $baris['isd1']; 
		$itd1 = $baris['itd1'];
		$ind1 = $baris['ind1'];
		$tot_d = $ird1+$isd1+$itd1; 
		$outd = ceil($tot_d*$vln1);
		if ($kapasitas>0){$pcntg_d = ceil (100*$outd/$kapasitas);} else {$pcntg_d = 'Error!!';}
		}		
		
		//Hitung beban incoming LWBP
		if ($baris['ir1']== 0 && $baris['is1']== 0 && $baris['it1']== 0 && $baris['in1']== 0) {$ir1 = '-'; $is1 = '-'; $it1= '-';  $in1= '-'; $out= ''; $pcntg= '';}
		else {
		$ir1 = $baris['ir1']; 
		$is1 = $baris['is1']; 
		$it1 = $baris['it1'];
		$in1 = $baris['in1'];
		$tot = $ir1+$is1+$it1; 
		$out = ($tot*$vln1);
		if ($kapasitas>0){$pcntg = ceil(100*$out/$kapasitas); $pcn1=100*$out/$kapasitas;} else {$pcntg = 'Error!!';}
		} 
		
		if ($pcn1 >= 0 && $pcn1 < 60) {$hi_beban1 = 'Baik';}
		else if ($pcn1 >= 60 && $pcn1 < 80) {$hi_beban1 = 'Cukup';}
		else if ($pcn1 >= 80 && $pcn1 < 100) {$hi_beban1 = 'Kurang';}
		else if ($pcn1 >= 100 ) {$hi_beban1 = 'Buruk';}
		else {$hi_beban1 = 'Belum Assesment';}
		
		//Hitung ketidakseimbangan beban LWBP
		if($tot == 0) {$imbang='';}
		else if ($fasa == 3){$imbang = ceil(100*(max($ir1,$is1,$it1)-min($ir1,$is1,$it1))/($tot/3));}
		else if ($fasa == 1){$maxinc=max($ir1,$is1,$it1); $min_inc=min($ir1,$is1,$it1); $mininc=$tot-$maxinc; 
		$imbang = ceil(100*($maxinc-$mininc)/($tot/2));}
		else {$imbang = '';}
		
		if ($imbang >= 0 && $imbang < 10) {$hi_imbang1= 'Baik';}
		else if ($imbang >= 10 && $imbang < 20) {$hi_imbang1 = 'Cukup';}
		else if ($imbang >= 20 && $imbang < 25) {$hi_imbang1 = 'Kurang';}
		else if ($imbang >= 25 ) {$hi_imbang1 = 'Buruk';}
		else {$hi_imbang1 = 'Belum Assesment';}	
		

		$vln2=0.001*$baris['vln2']; //tegangan dalam kV
		//Hitung %outlet per fasa WBP
		$outletr2 = ceil(100*$baris['ir2']/$amp);
		if($outletr2 > 0.01){$outlet_r2=$outletr2;} else {$outlet_r2='-';} 
		$outlets2 = ceil(100*$baris['is2']/$amp);
		if($outlets2 > 0.01){$outlet_s2=$outlets2;} else {$outlet_s2='-';} 
		$outlett2 = ceil(100*$baris['it2']/$amp);
		if($outlett2 > 0.01){$outlet_t2=$outlett2;} else {$outlet_t2='-';} 
				//Hitung %outlet NETRAL WBP
		$pcn_netral2 = ceil(100*$baris['in2']/$amp);
		if ($pcn_netral2 > 0 &&  $pcn_netral2 <= 10) {$hi_netral2= 'Baik';}
		else if ($pcn_netral2 > 10 && $pcn_netral2 <= 15) {$hi_netral2 = 'Cukup';}
		else if ($pcn_netral2 > 15 && $pcn_netral2 <= 20) {$hi_netral2 = 'Kurang';}
		else if ($pcn_netral2 > 20 ) {$hi_netral2 = 'Buruk';}
		else {$hi_netral2 = 'Belum Assesment';}	
		
		//Hitung beban jurusan A WBP
		if ($baris['ira2']== 0 && $baris['isa2']== 0 && $baris['ita2']== 0 && $baris['ina2']== 0) {$ira2 = '-'; $isa2 = '-'; $ita2= '-'; $ina2= '-'; $outa2= ''; $pcntg_a2= '';}
		else {
		$ira2 = $baris['ira2']; 
		$isa2 = $baris['isa2']; 
		$ita2 = $baris['ita2'];
		$ina2 = $baris['ina2'];
		$tot_a2 = $ira2+$isa2+$ita2; 
		$outa2 = ceil($tot_a2*$vln2);
		if ($kapasitas>0){$pcntg_a2 = ceil (100*$outa2/$kapasitas); } else {$pcntg_a2 = 'Error!!';}
		}
		
		//Hitung beban jurusan B WBP
		if ($baris['irb2']== 0 && $baris['isb2']== 0 && $baris['itb2']== 0 && $baris['inb2']== 0) {$irb2 = '-'; $isb2 = '-'; $itb2= '-'; $inb2= '-'; $outb2= ''; $pcntg_b2= '';}
		else {
		$irb2 = $baris['irb2']; 
		$isb2 = $baris['isb2']; 
		$itb2 = $baris['itb2'];
		$inb2 = $baris['inb2'];
		$tot_b2 = $irb2+$isb2+$itb2; 
		$outb2 = ceil($tot_b2*$vln2);
		if ($kapasitas>0){$pcntg_b2 = ceil (100*$outb2/$kapasitas);} else {$pcntg_b2 = 'Error!!';}
		}
		
		//Hitung beban jurusan C WBP
		if ($baris['irc2']== 0 && $baris['isc2']== 0 && $baris['itc2']== 0 && $baris['inc2']== 0) {$irc2 = '-'; $isc2 = '-'; $itc2= '-';  $inc2= '-';$outc2= ''; $pcntg_c2= '';}
		else {
		$irc2 = $baris['irc2']; 
		$isc2 = $baris['isc2']; 
		$itc2 = $baris['itc2'];
		$inc2 = $baris['inc2'];
		$tot_c2 = $irc2+$isc2+$itc2; 
		$outc2 = ceil($tot_c2*$vln2);
		if ($kapasitas>0){$pcntg_c2 = ceil (100*$outc2/$kapasitas);} else {$pcntg_c2 = 'Error!!';}
		}

		//Hitung beban jurusan D WBP
		if ($baris['ird2']== 0 && $baris['isd2']== 0 && $baris['itd2']== 0 && $baris['ind2']== 0) {$ird2 = '-'; $isd2 = '-'; $itd2= '-'; $ind2= '-'; $outd2= ''; $pcntg_d2= '';}
		else {
		$ird2 = $baris['ird2']; 
		$isd2 = $baris['isd2']; 
		$itd2 = $baris['itd2'];
		$ind2 = $baris['ind2'];
		$tot_d2 = $ird2+$isd2+$itd2; 
		$outd2 = ceil($tot_d2*$vln2);
		if ($kapasitas>0){$pcntg_d2 = ceil (100*$outd2/$kapasitas);} else {$pcntg_d2 = 'Error!!';}
		}
		
		//Hitung beban incoming WBP
		if ($baris['ir2']== 0 && $baris['is2']== 0 && $baris['it2']== 0 && $baris['in2']== 0) {$ir2 = '-'; $is2 = '-'; $it2= '-';  $in2= '-'; $out2= ''; $pcntg2= '';}
		else {
		$ir2 = $baris['ir2']; 
		$is2 = $baris['is2']; 
		$it2 = $baris['it2'];
		$in2 = $baris['in2'];
		$tot2 = $ir2+$is2+$it2; 
		$out2 = round($tot2*$vln2,2);
		if ($kapasitas>0){$pcntg2 = ceil(100*$out2/$kapasitas); $pcn2=100*$out2/$kapasitas;} else {$pcntg2 = 'Error!!';}
		}
		
		if ($pcn2 >= 0 && $pcn2 <= 60) {$hi_beban2= 'Baik';}
		else if ($pcn2 >= 60 && $pcn2 < 80) {$hi_beban2 = 'Cukup';}
		else if ($pcn2 >= 80 && $pcn2 < 100) {$hi_beban2 = 'Kurang';}
		else if ($pcn2 >= 100 ) {$hi_beban2 = 'Buruk';}
		else {$hi_beban2 = 'Belum Assesment';}		
		
		//Hitung ketidakseimbangan beban LWBP
		if($tot2 == 0) {$imbang2='';}
		else if ($fasa == 3){$imbang2 = ceil(100*(max($ir2,$is2,$it2)-min($ir2,$is2,$it2))/($tot2/3));}
		else if ($fasa == 1){$maxinc2=max($ir2,$is2,$it2); $min_inc2=min($ir2,$is2,$it2); $mininc2=$tot2-$maxinc2; 
		$imbang2 = ceil(100*($maxinc2-$mininc2)/($tot2/2));}
		else {$imbang2 = '';}
		
		if ($imbang2 >= 0 && $imbang2 < 10) {$hi_imbang2= 'Baik';}
		else if ($imbang2 >= 10 && $imbang2 < 20) {$hi_imbang2 = 'Cukup';}
		else if ($imbang2 >= 20 && $imbang2 < 25) {$hi_imbang2 = 'Kurang';}
		else if ($imbang2 >= 25 ) {$hi_imbang2 = 'Buruk';}
		else {$hi_imbang2 = 'Belum Assesment';}	

		$max_out2 = max ($outlet_r2, $outlet_s2, $outlet_t2) ;
		if ($max_out2 >= 0 && $max_out2 < 60) {$hi_arus2= 'Baik';}
		else if ($max_out2 >= 60 && $max_out2 < 80) {$hi_arus2 = 'Cukup';}
		else if ($max_out2 >= 80 && $max_out2 < 100) {$hi_arus2 = 'Kurang';}
		else if ($max_out2 >= 100 ) {$hi_arus2 = 'Buruk';}
		else {$hi_arus2 = 'Belum Assesment';}	
?>		
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    	<link rel="shortcut icon" href="../../img/logo_pln.jpg">

  <title>Detail Pengukuran</title>
  <!-- Bootstrap core CSS-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    	<link rel="shortcut icon" href="../../img/logo_pln.jpg">
</head>

<body>
    <div class="container-fluid" width="50">
			<button type="button" id="Print" class="close"><span aria-hidden="true"><i class="fa fa-print"></i> Print</span></button>
<div >
      <div class="breadcrumb mb-3"  style="width: 52.5rem;" id="cetakini">
                <div class="breadcrumb-body">
   <div class="table-responsive">
      <table  width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
            <td valign="top" class="menuUtamaOff">UIW Sumatera Utara<br>UP3&nbsp<?php echo $row['area']; ?> <br>ULP&nbsp<?php echo $row['rayon']; ?> </td>
         </tr>
      </table>
<br/>
      <table width="400"  border="0" cellpadding="0" cellspacing="0">
         <tr align="left" valign="top">
            <td colspan="2">
               <table width="800"  border="1" cellspacing="0" cellpadding="0">
                  <tr align="center" valign="middle">
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">DATA GARDU DISTRIBUSI </span></strong></font></td>
                  </tr>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;Kode Gardu</strong></font> </td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['kodegd']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Merk</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['merek']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Alamat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['alamat']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Nomor Seri</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['noseri']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Koordinat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['lat'];?>, <?php echo $baris['lng']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Tahun Trafo</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['thntrafo']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Penyulang</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['feeder']; ?>-<?php echo $baris['ufeeder']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jenis Minyak</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['minyak']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Konstruksi</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $konstruks; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Vector Group </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['vector']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Daya (kVA)</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['kapasitas']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Impedansi (%) </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['imp']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah/Posisi Tap</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['jlh_tap']; ?> / <?php echo $baris['pos_tap']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah jurusan</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['jlh_jur']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Fasa </strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['fasa']; ?></td>
                     <td width="150"><font color="#4f5051"><strong>&nbsp;&nbsp;kHA per fasa </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo round($amp,2); ?></td>
                  </tr>
               </table>
      </table>
   </div>
<br/>
   <div class="table-responsive">
      <table  width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
         <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">HASIL ASSESMENT TIER 1 - PENGUKURAN BEBAN</span></strong></font></td>
         </tr>
      </table>
      <table width="800" cellspacing="0" border="1">
	<colgroup width="108"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup span="2" width="70"></colgroup>
	<tr>
		<td  rowspan=4 height="80" align="center" valign=middle><font color="#000000">LWBP</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;Petugas Assesment</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;<?php echo $baris['ptgs1']; ?></font></td>
		<td align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;V l-n</font></td>
		<td align="center" valign=middle><font color="#000000"><?php echo $baris['vln1']; ?></font></td>
		</tr>
	<tr>
		<td  colspan=2 align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;Tanggal Assesment</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;<?php echo $baris['tgl1']; ?></font></td>
		<td align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;cos phi</font></td>
		<td align="center" valign=middle><font color="#000000"><?php echo $baris['pf1']; ?></font></td>
		</tr>
	<tr>
		<td  colspan=4 align="center" valign=middle><font color="#000000">Outgoing</font></td>
		<td  colspan=2 align="center" valign=middle><font color="#000000">Incoming</font></td>
		</tr>
	<tr>
		<td  align="center" valign=middle><font color="#000000">A</font></td>
		<td  align="center" valign=middle><font color="#000000">B</font></td>
		<td  align="center" valign=middle><font color="#000000">C</font></td>
		<td  align="center" valign=middle><font color="#000000">D</font></td>
		<td  align="center" valign=middle><font color="#000000">Amp</font></td>
		<td  align="center" valign=middle><font color="#000000">%outlet</font></td>
	</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">R (Amp)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ira1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $irb1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $irc1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ird1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ir1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outlet_r; ?></font></td>
	</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">S (Amp)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $isa1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $isb1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $isc1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $isd1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $is1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outlet_s; ?></font></td>
		</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">T (Amp)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ita1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $itb1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $itc1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $itd1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $it1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outlet_t; ?></font></td>
	</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">N (Amp)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ina1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $inb1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $inc1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ind1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $in1; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">Beban (kVA)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outa;?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outb;?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outc;?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outd;?></font></td>
		<td  colspan=2 align="center" valign=middle><font color="#000000"><?php echo $out;?></font></td>
	</tr>
		<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">Beban (%)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $pcntg_a;  ?>
		<td  align="center" valign=middle><font color="#000000"><?php echo $pcntg_b;  ?>
		<td  align="center" valign=middle><font color="#000000"><?php echo $pcntg_c;  ?>
		<td  align="center" valign=middle><font color="#000000"><?php echo $pcntg_d;  ?>
		<td  colspan=2 align="center" valign=middle><font color="#000000"><?php echo $pcntg;  ?>
	</tr>
</table>
<br/>
<table width="600" cellspacing="0" border="1">
	<colgroup width="300"></colgroup>
	<colgroup width="200"></colgroup>
	<colgroup width="100"></colgroup>
		<tr>
		<td   valign=middle><font color="#000000">&nbsp;&nbsp;HI - Pembebanan </td>
		<td  align="center" valign=middle><font color="#000000"><?php  echo $hi_beban1;  ?></td>
		<td  align="center" valign=middle><font color="#000000"><?php  echo ' '.ceil($pcn1).' %';  ?></td>
	</tr>		<tr>
		<td   valign=middle><font color="#000000">&nbsp;&nbsp;HI - Ketidakseimbangan beban </td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $hi_imbang1; ?></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo ' '.$imbang.' %';  ?></td>
	</tr>
	<tr>
		<td   valign=middle><font color="#000000">&nbsp;&nbsp;HI - Arus per fasa </td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $hi_arus;  ?></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo 'max: '.$max_out.' %';  ?></td>
	</tr>		<tr>
		<td   valign=middle><font color="#000000">&nbsp;&nbsp;HI - Arus netral </td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $hi_netral;  ?></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo ' '.$pcn_netral.' %';  ?></td>
	</tr>
</table>
<br/>
<table width="800" cellspacing="0" border="1">
	<colgroup width="108"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup span="2" width="70"></colgroup>
<tr>
		<td  rowspan=4 height="80" align="center" valign=middle><font color="#000000">WBP</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;Petugas Assesment</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;<?php echo $baris['ptgs2']; ?></font></td>
		<td align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;V l-n</font></td>
		<td align="center" valign=middle><font color="#000000"><?php echo $baris['vln2']; ?></font></td>
		</tr>
	<tr>
		<td  colspan=2 align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;Tanggal Assesment</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;<?php echo $baris['tgl2']; ?></font></td>
		<td align="left" valign=bottom><font color="#000000">&nbsp;&nbsp;cos phi</font></td>
		<td align="center" valign=middle><font color="#000000"><?php echo $baris['pf2']; ?></font></td>
		</tr>
	<tr>
		<td  colspan=4 align="center" valign=middle><font color="#000000">Outgoing</font></td>
		<td  colspan=2 align="center" valign=middle><font color="#000000">Incoming</font></td>
		</tr>
	<tr>
		<td  align="center" valign=middle><font color="#000000">A</font></td>
		<td  align="center" valign=middle><font color="#000000">B</font></td>
		<td  align="center" valign=middle><font color="#000000">C</font></td>
		<td  align="center" valign=middle><font color="#000000">D</font></td>
		<td  align="center" valign=middle><font color="#000000">Amp</font></td>
		<td  align="center" valign=middle><font color="#000000">%outlet</font></td>
	</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">R (Amp)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ira2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $irb2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $irc2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ird2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ir2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outlet_r2; ?></font></td>
	</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">S (Amp)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $isa2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $isb2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $isc2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $isd2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $is2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outlet_s2; ?></font></td>
		</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">T (Amp)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ita2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $itb2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $itc2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $itd2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $it2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outlet_t2; ?></font></td>
	</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">N (Amp)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ina2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $inb2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $inc2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $ind2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $in2; ?></font></td>
		<td  align="center" valign=middle><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">Beban (kVA)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outa2;?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outb2;?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outc2;?></font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $outd2;?></font></td>
		<td  colspan=2 align="center" valign=middle><font color="#000000"><?php echo $out2;?></font></td>
	</tr>
		<tr>
		<td  height="20" align="center" valign=middle><font color="#000000">Beban (%)</font></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $pcntg_a2;  ?>
		<td  align="center" valign=middle><font color="#000000"><?php echo $pcntg_b2;  ?>
		<td  align="center" valign=middle><font color="#000000"><?php echo $pcntg_c2;  ?>
		<td  align="center" valign=middle><font color="#000000"><?php echo $pcntg_d2;  ?>
		<td  colspan=2 align="center" valign=middle><font color="#000000"><?php echo $pcntg2;  ?>
	</tr>
</table>
	<br/>
<table width="600" cellspacing="0" border="1">
	<colgroup width="300"></colgroup>
	<colgroup width="200"></colgroup>
	<colgroup width="100"></colgroup>
		<tr>
		<td   valign=middle><font color="#000000">&nbsp;&nbsp;HI - Pembebanan </td>
		<td  align="center" valign=middle><font color="#000000"><?php  echo $hi_beban2;  ?></td>
		<td  align="center" valign=middle><font color="#000000"><?php  echo ' '.ceil($pcn2).' %';  ?></td>
	</tr>		<tr>
		<td   valign=middle><font color="#000000">&nbsp;&nbsp;HI - Ketidakseimbangan beban </td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $hi_imbang2; ?></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo ' '.$imbang2.' %';  ?></td>
	</tr>
	<tr>
		<td   valign=middle><font color="#000000">&nbsp;&nbsp;HI - Arus per fasa </td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $hi_arus2;  ?></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo 'max: '.$max_out2.' %';  ?></td>
	</tr>		<tr>
		<td   valign=middle><font color="#000000">&nbsp;&nbsp;HI - Arus netral </td>
		<td  align="center" valign=middle><font color="#000000"><?php echo $hi_netral2;  ?></td>
		<td  align="center" valign=middle><font color="#000000"><?php echo ' '.$pcn_netral2.' %';  ?></td>
	</tr>
</table>	
   </div>
   </div>
   </div>
    </div>    
	</div>
</body>
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
     </div>  
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../../js/sb-admin-datatables.min.js"></script>
    <script src="../../js/modal.js"></script>
         <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//../../js/analytics.js','ga');
            
            ga('create', 'UA-75591362-1', 'auto');
            ga('send', 'pageview');
            
         </script>
	 

		 
		 


<?php }}}
else {
echo "<script>window.location = '../../index.php'</script>";
}
?>
<style>
@media screen {
    #printSection {
        display: none;
    }
}
@media print {
  @page { margin: 0.5; }
  body { margin: 1.6cm; }
  
    body * {
        visibility:hidden;
    }
    #printSection, #printSection * {
        visibility:visible;
    }
    #printSection {
        position:absolute;
        left:50;
        top:20;
    }
}
</style>

<script>
document.getElementById("Print").onclick = function () {
    printElement(document.getElementById("cetakini"));
};

function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script>