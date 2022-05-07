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
?>

	  <div class="modal-header">
	          Lihat Hasil Thermovision - <?php echo $kodegd ; ?> <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <input type="hidden" value="<?php echo $id; ?>" id="idgardu" disabled>
		</div>
                <div class="modal-body">
    			<div class="table-responsive">        
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
    <td valign="top" class="menuUtamaOff">Wilayah Sumatera Utara<br>Area&nbsp<?php echo $row['area']; ?> <br>Rayon&nbsp<?php echo $row['rayon']; ?> </td> 
  </tr>
</table>
<table width="400"  border="0" cellpadding="1" cellspacing="0">
<tr> <td> &nbsp </td> </tr> </table>
<table width="400"  border="0" cellpadding="1" cellspacing="0">
<tr align="left" valign="top"><td colspan="2">
<table width="760"  border="1" cellspacing="0" cellpadding="0">
  <tr align="center" valign="middle">
    <td height="22" colspan="6"><font color="#4f5051"><strong><span class="style2">DAFTAR ASSESMENT TIER 2 - THERMOVISION </span></strong></font></td>
    </tr>
  <tr>
    <th width="50"> <font color="#4f5051"><center><strong>&nbsp;&nbsp;No.</strong></center></font> </th>
    <th width="120"> <font color="#4f5051"><center><strong>&nbsp;&nbsp;Kode Gardu</strong></center></font> </th>
    <th width="220"> <font color="#4f5051"><center><strong>&nbsp;&nbsp;Petugas Assesment</strong></center></font> </th>
	<th width="200"> <font color="#4f5051"><center><strong>&nbsp;&nbsp;Tanggal Assesment</strong></center></font> </th>
  </tr>
  <?php
$kueri="SELECT*
FROM t2b WHERE kodegd ='$kodegd' AND status=1 ORDER by tgl DESC LIMIT 6" ;
$no=1;
$hasil = mysqli_query($db, $kueri);
if (!$hasil) {
  die('Invalid query: ' . mysqli_error());
} 
  while ($brs = @mysqli_fetch_assoc($hasil)){
 $id_t2b=190991*$kali*$brs["id_t2b"];  
  $kalik = base64_encode(13532*$kali);
 echo '  
  <tr>
    <td width="50"> <font color="#4f5051">&nbsp;&nbsp;'.$no.'</font> </td> 
    <td width="120">  <font color="#4f5051"><center><a href="#" onclick=JavaScript:view("../tier2/detail_b.php?id='.base64_encode(24021995*$kali*$id).'&assesment='.base64_encode($id_t2b).'&log='.$kalik.'")>'.$brs["kodegd"].'</a></center></font> </td>
	<td width="220"> <font color="#4f5051">&nbsp;&nbsp;'.$brs["ptgs"].'</font> </td>
    <td width="200"> <font color="#4f5051">&nbsp;&nbsp;'.$brs["tgl"].'</font> </td>
  </tr> '; 
  $no++;}?>
  
  </table>


  </table>
			</div>
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
		url,'popUpWindow','height=600,width=825,left=10,top=10,resizable=1,maximize=0, scrollbars=1,toolbar=0,menubar=0,location=0,directories=0,status=0')
}
</script>