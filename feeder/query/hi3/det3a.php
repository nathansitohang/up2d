<?php
    include "../../../config.php";
	include('../../../session.php');
	


		if($_POST['idgardu']) {
		$id = $_POST['idgardu'];  
		$id = base64_decode($id);
		$id = $id/(78484899*$kali);		
		$query = "SELECT * FROM master WHERE idgardu = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}

        while ($row = @mysqli_fetch_assoc($result)){
		$kodegd = $row['kodegd'];
		    if ($row['konstruksi'] == 1) { $konstruksi = 'Single Pole Tanpa Rak' ;}
   else if ($row['konstruksi'] == 2) { $konstruksi = 'Single Pole Dengan Rak';}
   else if ($row['konstruksi'] == 3) { $konstruksi = 'Double Pole' ;}
   else if ($row['konstruksi'] == 4) { $konstruksi = 'Beton';}
   else if ($row['konstruksi'] == 5) { $konstruksi = 'Kios';}
   else { $konstruksi = 'Belum Pilih'; }
		$kaps =  $row['kapasitas'];
		$fasa = $row['fasa'];
		$kapasitas =  $row['kapasitas'];
		
		if ($fasa == 1) {$kaps = 1.5*$kaps;} 
		else {$kaps=$kaps;}		
		if ($kaps > 0){$amp = ($kaps*1000)/(sqrt(3)*400);}
		else 
		{$ampe=10^-5; 
		$amp=$ampe;
		}
?>



	  <div class="modal-header">
	          Lihat Data Uji Kualitas Minyak Terakhir - <?php echo $kodegd ; ?> <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <input type="hidden" value="<?php echo $id; ?>" id="idgardu" disabled>
		</div>
                <div class="modal-body">
    			<div class="table-responsive">        
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
    <td valign="top" class="menuUtamaOff">Wilayah Sumatera Utara<br>Area&nbsp<?php echo $row['area']; ?> <br>Rayon&nbsp<?php echo $row['rayon']; ?> </td> 
  </tr>
</table><br/>

               <table width="760"  border="1" cellspacing="0" cellpadding="0">
                  <tr align="center" valign="middle">
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">DATA GARDU DISTRIBUSI </span></strong></font></td>
                  </tr>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;Kode Gardu</strong></font> </td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['kodegd']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Merk</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['merek']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Alamat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['alamat']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Nomor Seri</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['noseri']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Koordinat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['lat'];?>, <?php echo $row['lng']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Tahun Trafo</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['thntrafo']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Penyulang</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['feeder']; ?>-<?php echo $row['ufeeder']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jenis Minyak</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['minyak']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Konstruksi</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $konstruksi; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Vector Group </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['vector']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Daya (kVA)</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['kapasitas']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Impedansi (%) </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['imp']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah/Posisi Tap</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['jlh_tap']; ?> / <?php echo $row['pos_tap']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah jurusan</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['jlh_jur']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Fasa </strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['fasa']; ?></td>
                     <td width="150"><font color="#4f5051"><strong>&nbsp;&nbsp;kHA per fasa </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo round($amp,2); ?></td>
                  </tr>
               </table><br/>

			</div>
		<div class="table-responsive">        
		
		<?php
		$show1 = mysqli_query($db, "SELECT * FROM `t3a` WHERE `kodegd` = '$kodegd' ORDER by `tgl` DESC LIMIT 1 ");
		$brs1 = mysqli_fetch_array($show1, MYSQLI_ASSOC);
		if ($brs1['ptgs'] !=''){
		$tap1=max($brs1['tap1a'],$brs1['tap1b'],$brs1['tap1c']);
		$dev1 = ceil(100*abs ($tap1-82.2724)/82.2724);
		$tap2=max($brs1['tap2a'],$brs1['tap2b'],$brs1['tap2c']);
		$dev2 = ceil(100*abs ($tap2-84.4375)/84.4375);	
		$tap3=max($brs1['tap3a'],$brs1['tap3b'],$brs1['tap3c']);
		$dev3 = ceil(100*abs ($tap3-86.6025)/86.6025);
		$tap4=max($brs1['tap4a'],$brs1['tap4b'],$brs1['tap4c']);
		$dev4 = ceil(100*abs ($tap4-88.7676)/88.7676);
		$tap5=max($brs1['tap5a'],$brs1['tap5b'],$brs1['tap5c']);
		$dev5 = ceil(100*abs ($tap5-90.9327)/90.9327);
		?>
		
		
		

<table width="760"  border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="150"> <font color="#4f5051">&nbsp;&nbsp;Petugas</font></td>
    <td colspan="5">&nbsp;&nbsp;<?php echo $brs1['tgl']; ?></td>
  </tr>
  <tr>
    <td><font color="#4f5051">&nbsp;&nbsp;Tanggal</font></td>
    <td colspan="5">&nbsp;&nbsp;<?php echo $brs1['ptgs']; ?></td>
  </tr>
<tr align="center">
<th width="175"><font color="#4f5051"><strong>Item Ukur</strong></th>
<th width="175"><font color="#4f5051">Referensi</th>
<th width="175"><font color="#4f5051">R-T || t-n</th>
<th width="175"><font color="#4f5051">S-T || r-n</th>
<th width="175"><font color="#4f5051">R-S || s-n</th>
<th width="175"><font color="#4f5051">%dev</th>
</tr>
<tr align="center">
<td width="175"><font color="#4f5051"><strong>Tap 1</strong></td>
<td  width="175"><font color="#4f5051">82.2724</td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap1a']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap1b']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap1c']; ?></td>
<td class="dev" width="175"><font color="#4f5051"><?php echo $dev1; ?></td>

</tr>
<tr align="center">
<td width="175"><font color="#4f5051"><strong>Tap 2</strong></td>
<td width="175"><font color="#4f5051">84.4375</td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap2a']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap2b']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap2c']; ?></td>
<td  class="dev" width="175"><font color="#4f5051"><?php echo $dev2; ?></td>
</tr>
<tr align="center">
<td width="175"><font color="#4f5051"><strong>Tap 3</strong></td>
<td width="175"><font color="#4f5051">86.6025</td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap3a']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap3b']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap3c']; ?></td>
<td  class="dev" width="175"><font color="#4f5051"><?php echo $dev3; ?></td>
</tr>
<tr align="center">
<td width="175"><font color="#4f5051"><strong>Tap 4</strong></td>
<td width="175"><font color="#4f5051">88.7676</td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap4a']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap4b']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap4c']; ?></td>
<td class="dev" width="175"><font color="#4f5051"><?php echo $dev4; ?></td>
</tr>
<tr align="center">
<td width="175"><font color="#4f5051"><strong>Tap 5</strong></td>
<td width="175"><font color="#4f5051">90.9327</td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap5a']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap5b']; ?></td>
<td width="175"><font color="#4f5051"><?php echo $brs1['tap5c']; ?></td>
<td  class="dev"width="175"><font color="#4f5051"><?php echo $dev5; ?></td>
</tr>

</table> <br/>
<table width="760"  border="1" cellspacing="0" cellpadding="0">
<tr align="center">
<td width="190"  bgcolor="#0288D1"><font color="#ffffff">Baik</font></td>
<td width="190"  bgcolor="#7CB342"><font color="#ffffff">Cukup</font></td>
<td width="190"  bgcolor="#FFFF00"><font color="#0">Kurang</font></td>
<td width="190"  bgcolor="#FF5252"><font color="#0">Buruk</font></td></font>
</tr>
</table>
<?php } 
?>

		
			    <div class="row">

    </div>
			</div>
			<div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
	  


			    
        <?php } }
?>

<script type="text/javascript">
function view(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=600,width=880,left=10,top=10,resizable=1,maximize=0, scrollbars=1,toolbar=0,menubar=0,location=0,directories=0,status=0')
}
</script>
<script>
$('.dev').each(function() {
    var $this = $(this);
    var value = $this.text();

    if(!/^\s*\d+(\.\d+)?\s*$/.test(value)) {
        $this.addClass('belum');
        return;
    }

    if(value >=0 && value <0.3 ) {
        $this.addClass('baik');
    } else if(value >= 0.3 && value < 0.5){
        $this.addClass('cukup');
    } else if(value >= 0.5 && value < 0.7) {
        $this.addClass('kurang');
	} else if(value >=0.7) {
        $this.addClass('buruk');
    }	else {
        $this.addClass('belum');
    }
    $this.text($this.text() + '%');

});
</script>
<script>
$('.stopGapCondition4').each(function() {
    var $this = $(this);
    var value = $this.text();

    if(!/^\s*\d+(\.\d+)?\s*$/.test(value)) {
        $this.addClass('belum');
        return;
    }

    if(value >=40 ) {
        $this.addClass('baik');
    } else if(value >= 30 && value < 40){
        $this.addClass('cukup');
    } else if(value >=20 && value < 30) {
        $this.addClass('kurang');
	} else if(value >=0 && value < 20) {
        $this.addClass('buruk');
    }	else {
        $this.addClass('belum');
    }

});
</script>

<style>
.baik {
    background-color: #0288D1;
	color: #fff;
}
.cukup {
    background-color: #7CB342;
	color: #fff;
}
.kurang {
    background-color: #FFFF00;
	color: #4f5051;
}
.buruk {
    background-color: #FF5252;
	color: #4f5051;
}
.belum {
    background-color: #fff;
	color: black;
}
td.stopGapCondition {
    text-align: center;
}
td.stopGapCondition2 {
    text-align: center;
}
td.stopGapCondition3 {
    text-align: center;
}
</style>
