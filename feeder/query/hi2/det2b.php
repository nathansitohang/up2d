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
	          Lihat Data Hasil Thermovision Terakhir - <?php echo $kodegd ; ?> <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <input type="hidden" value="<?php echo $id; ?>" id="idgardu" disabled>
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
		$show1 = mysqli_query($db, "SELECT * FROM `t2b` WHERE `kodegd` = '$kodegd' ORDER by `tgl` DESC LIMIT 1 ");
		$brs1 = mysqli_fetch_array($show1, MYSQLI_ASSOC);
		if ($brs1['ptgs'] !=''){
		?>
		

<table width="760"  border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="150"> <font color="#4f5051">&nbsp;&nbsp;Petugas</font></td>
    <td colspan="10">&nbsp;&nbsp;<?php echo $brs1['tgl']; ?></td>
  </tr>
  <tr>
    <td><font color="#4f5051">&nbsp;&nbsp;Tanggal</font></td>
    <td colspan="10">&nbsp;&nbsp;<?php echo $brs1['ptgs']; ?></td>
  </tr>
    <tr>
    <td><font color="#4f5051">&nbsp;&nbsp;Suhu Lingkungan</font></td>
    <td colspan="10">&nbsp;&nbsp;<?php echo $brs1['amb']; ?></td>
  </tr>
  <tr>
    <td rowspan="2"><font color="#4f5051">&nbsp;&nbsp;Trafo</font></td>
    <td width="60" colspan="2" align='center'><font color="#4f5051">Inc FCO</font></td>
    <td width="60" colspan="2" align='center'><font color="#4f5051">Out FCO</font></td>
    <td width="60" colspan="2" align='center'><font color="#4f5051">Bushing TM</font></td>
    <td width="60" colspan="2" align='center'><font color="#4f5051">Bushing TR</font></td>
	<td width="60" colspan="2" align='center'><font color="#4f0000">BODY</font></td>
  </tr>
  <tr>
    <td class="stopGapCondition" width="60" align='center'><font color="#4f5051"><?php echo $brs1['incfco']-$brs1['amb']; ?></font></td>
	    <td class="" width="60" align='center'><font color="#4f5051"><?php echo $brs1['incfco']; ?></font></td>
    <td class="stopGapCondition" width="60" align='center'><font color="#4f5051"><?php echo $brs1['outfco']-$brs1['amb']; ?></font></td>
	    <td class="" width="60" align='center'><font color="#4f5051"><?php echo $brs1['outfco']; ?></font></td>
    <td class="stopGapCondition" width="60" align='center'><font color="#4f5051"><?php echo $brs1['bushtm']-$brs1['amb']; ?></font></td>
	    <td class="" width="60" align='center'><font color="#4f5051"><?php echo $brs1['bushtm']; ?></font></td>
    <td class="stopGapCondition" width="60" align='center'><font color="#4f5051"><?php echo $brs1['bushtr']-$brs1['amb']; ?></font></td>
    <td class="" width="60" align='center'><font color="#4f5051"><?php echo $brs1['bushtr']; ?></font></td>   
	<td colspan="2" class="stopGapCondition2" width="60" align='center'><font color="#4f5051"><?php echo $brs1['bodyt']; ?></font></td>
  </tr>
  <tr>
    <td rowspan="2"><font color="#4f5051">&nbsp;&nbsp;PHB-TR</font></td>
    <td width="60" colspan="2" align='center'><font color="#4f5051">Opstic In</font></td>
    <td width="60" colspan="2" align='center'><font color="#4f5051">Opstic Out</font></td>
    <td width="60" colspan="2" align='center'><font color="#4f5051">NT Holder</font></td>
    <td width="60" colspan="2" align='center'><font color="#4f5051">Schoen</font></td>
	<td width="60" colspan="2" align='center'><font color="#4f5051">Konektor JTR</font></td>
  </tr>
  <tr>
    <td class="stopGapCondition" width="60" align='center'><font color="#4f5051"><?php echo $brs1['opsinc']-$brs1['amb']; ?></font></td>
		    <td class="" width="60" align='center'><font color="#4f5051"><?php echo $brs1['opsinc']; ?></font></td>
    <td class="stopGapCondition" width="60" align='center'><font color="#4f5051"><?php echo $brs1['opsout']-$brs1['amb']; ?></font></td>
		    <td class="" width="60" align='center'><font color="#4f5051"><?php echo $brs1['opsout']; ?></font></td>
    <td class="stopGapCondition" width="60" align='center'><font color="#4f5051"><?php echo $brs1['ntholder']-$brs1['amb']; ?></font></td>
		    <td class="" width="60" align='center'><font color="#4f5051"><?php echo $brs1['ntholder']; ?></font></td>
    <td class="stopGapCondition" width="60" align='center'><font color="#4f5051"><?php echo $brs1['skun']-$brs1['amb']; ?></font></td>
		    <td class="" width="60" align='center'><font color="#4f5051"><?php echo $brs1['skun']; ?></font></td>
    <td class="stopGapCondition" width="60" align='center'><font color="#4f5051"><?php echo $brs1['conn']-$brs1['amb']; ?></font></td>
 		    <td class="" width="60" align='center'><font color="#4f5051"><?php echo $brs1['conn']; ?></font></td>
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
$('.stopGapCondition').each(function() {
    var $this = $(this);
    var value = $this.text();

    if(!/^\s*\d+(\.\d+)?\s*$/.test(value)) {
        $this.addClass('belum');
        return;
    }

     if(value >=0 && value <10 ) {
        $this.addClass('baik');
    } else if(value >=10 && value <12) {
        $this.addClass('cukup');
    } else if(value >=12 && value <15) {
        $this.addClass('kurang');
	} else if(value >= 15) {
        $this.addClass('buruk');
    }	else {
        $this.addClass('belum');
    }

});
</script>
<script>
$('.stopGapCondition2').each(function() {
    var $this = $(this);
    var value = $this.text();

    if(!/^\s*\d+(\.\d+)?\s*$/.test(value)) {
        $this.addClass('belum');
        return;
    }

    if(value >=0 && value<83 ) {
        $this.addClass('baik');
    } else if(value >= 83 && value < 85){
        $this.addClass('cukup');
    } else if(value >=85 && value < 90) {
        $this.addClass('kurang');
	} else if(value >=90) {
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
