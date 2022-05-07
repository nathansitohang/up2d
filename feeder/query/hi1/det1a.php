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
	          Lihat Data Pengukuran Beban Terakhir - <?php echo $kodegd ; ?> <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <input type="hidden" value="<?php echo $id; ?>" id="idgardu" disabled>
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
		$show1 = mysqli_query($db, "SELECT * FROM `t1a` WHERE `kodegd` = '$kodegd' ORDER by `tgl1` DESC LIMIT 1 ");
		$brs = mysqli_fetch_array($show1, MYSQLI_ASSOC);
		$show2 = mysqli_query($db, "SELECT * FROM `t1a` WHERE `kodegd` = '$kodegd' ORDER by `tgl2` DESC LIMIT 1 ");
		$brs2 = mysqli_fetch_array($show2, MYSQLI_ASSOC);
		if ($brs['ptgs1'] !='' || $brs2['ptgs2'] !='' ){
		?>
		

<table width="760"  border="1" cellspacing="0" cellpadding="0">
  <tr align="center">
    <th width="150"><font color="#4f5051">Item</font></th>
    <th colspan="4"><font color="#4f5051">LWBP</font></th>
    <th colspan="4"><font color="#4f5051">WBP</font></th>
  </tr>
  <tr>
    <td><font color="#4f5051">&nbsp;&nbsp;Petugas</font></td>
    <td colspan="4">&nbsp;&nbsp;<?php echo $brs['ptgs1']; ?></td>
    <td colspan="4">&nbsp;&nbsp;<?php echo $brs2['ptgs2']; ?></td>
  </tr>
  <tr>
    <td><font color="#4f5051">&nbsp;&nbsp;Tanggal</font></td>
    <td colspan="4">&nbsp;&nbsp;<?php echo $brs['tgl1']; ?></td>
    <td colspan="4">&nbsp;&nbsp;<?php echo $brs2['tgl2']; ?></td>
  </tr>
  <tr>
    <td rowspan="2"><font color="#4f5051">&nbsp;&nbsp;Arus Incoming</font></td>
    <td width="60" align='center'><font color="#4f5051">R</font></td>
    <td width="60" align='center'><font color="#4f5051">S</font></td>
    <td width="60" align='center'><font color="#4f5051">T</font></td>
    <td width="60" align='center'><font color="#4f5051">N</font></td>
    <td width="60" align='center'><font color="#4f5051">R</font></td>
    <td width="60" align='center'><font color="#4f5051">S</font></td>
    <td width="60" align='center'><font color="#4f5051">T</font></td>
    <td width="60" align='center'><font color="#4f5051">N</font></td>
  </tr>
  <tr>
    <td align='center'><?php echo $brs['ir1']; ?></td>
    <td align='center'><?php echo $brs['is1']; ?></td>
    <td align='center'><?php echo $brs['it1']; ?></td>
    <td align='center'><?php echo $brs['in1']; ?></td>
    <td align='center'><?php echo $brs2['ir2']; ?></td>
    <td align='center'><?php echo $brs2['is2']; ?></td>
    <td align='center'><?php echo $brs2['it2']; ?></td>
    <td align='center'><?php echo $brs2['in2']; ?></td>
  </tr>
  <?php $amp1_r=round(100*$brs['ir1']/$amp,1);
  $amp1_s=round(100*$brs['is1']/$amp,1);
  $amp1_t=round(100*$brs['it1']/$amp,1);
  $amp1_n=round(100*$brs['in1']/$amp,1);
  $amp2_r=round(100*$brs['ir2']/$amp,1);
  $amp2_s=round(100*$brs['is2']/$amp,1);
  $amp2_t=round(100*$brs['it2']/$amp,1);
  $amp2_n=round(100*$brs['in2']/$amp,1);
  ?>
  <tr>
    <td><font color="#4f5051">&nbsp;&nbsp;%Amp</font></td>
    <td class="stopGapCondition"><?php echo $amp1_r; ?></td>
    <td class="stopGapCondition"><?php echo $amp1_s; ?></td>
    <td class="stopGapCondition"><?php echo $amp1_t; ?></td>
    <td class="stopGapCondition2"><?php echo $amp1_n; ?></td>
    <td class="stopGapCondition"><?php echo $amp2_r; ?></td>
    <td class="stopGapCondition"><?php echo $amp2_s; ?></td>
    <td class="stopGapCondition"><?php echo $amp2_t; ?></td>
    <td class="stopGapCondition2"><?php echo $amp2_n; ?></td>
  </tr>
  <tr>
    <td><font color="#4f5051">&nbsp;&nbsp;Beban</font></td>
    <td  colspan="2" align="center"><?php echo $row['beban1']; ?> kVA </td>
	<td class="stopGapCondition"  colspan="2"><?php echo round(100*$row['beban1']/$kaps); ?> </td>
    <td colspan="2" align="center"><?php echo $row['beban2']; ?> kVA </td>
	<td class="stopGapCondition"  colspan="2"><?php echo round(100*$row['beban2']/$kaps); ?> </td>

  </tr>
  <tr>
    <td><font color="#4f5051">&nbsp;&nbsp;%Pincang</font></td>
    <td class="stopGapCondition3" colspan="4"><?php echo $row['imbang']; ?></td>
    <td class="stopGapCondition3" colspan="4"><?php echo $row['imbang2']; ?></td>
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

    if(value >= 0 && value < 60) {
        $this.addClass('baik');
    } else if(value >= 60 && value < 80) {
        $this.addClass('cukup');
    } else if(value >= 80 && value < 100) {
        $this.addClass('kurang');
	} else if(value >= 100) {
        $this.addClass('buruk');
    }	else {
        $this.addClass('belum');
    }

    $this.text($this.text() + '%');
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

    if(value >= 0 && value < 10) {
        $this.addClass('baik');
    } else if(value >= 10 && value < 15) {
        $this.addClass('cukup');
    } else if(value >= 15 && value < 20) {
        $this.addClass('kurang');
	} else if(value >= 20) {
        $this.addClass('buruk');
    }	else {
        $this.addClass('belum');
    }

    $this.text($this.text() + '%');
});
</script>
<script>
$('.stopGapCondition3').each(function() {
    var $this = $(this);
    var value = $this.text();

    if(!/^\s*\d+(\.\d+)?\s*$/.test(value)) {
        $this.addClass('belum');
        return;
    }

    if(value >= 0 && value < 10) {
        $this.addClass('baik');
    } else if(value >= 10 && value < 20) {
        $this.addClass('cukup');
    } else if(value >= 20 && value < 25) {
        $this.addClass('kurang');
	} else if(value >= 25) {
        $this.addClass('buruk');
    }	else {
        $this.addClass('belum');
    }

    $this.text($this.text() + '%');
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
