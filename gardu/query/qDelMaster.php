<?php
   include "../../config.php";
   include('../../session.php');
   if($_POST['idgardu']) {
		$id = $_POST['idgardu'];  
		$id = base64_decode($id);
		$id = $id/4635636;		
		$query = "SELECT * FROM master WHERE idgardu = $id";
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
       while ($row = @mysqli_fetch_assoc($result)){
   
   if ($row['konstruksi'] == 1) { $konstruksi = 'Single Pole Tanpa Rak' ;}
   else if ($row['konstruksi'] == 2) { $konstruksi = 'Single Pole Dengan Rak';}
   else if ($row['konstruksi'] == 3) { $konstruksi = 'Double Pole' ;}
   else if ($row['konstruksi'] == 4) { $konstruksi = 'Beton';}
   else if ($row['konstruksi'] == 5) { $konstruksi = 'Kios';}
   else { $konstruksi = 'Belum Pilih'; }
?>
<input type="hidden" value="<?php echo base64_encode(12367*$row['idgardu']); ?>" id="WxdDwzA">
<input type="hidden" value="<?php echo base64_encode($login_idrayon); ?>" id="SADEeferf">
<input type="hidden" value="<?php echo base64_encode($row['idrayon']); ?>" id="WEWEWEadsa">
<input type="hidden" value="<?php echo base64_encode($row['kodegd']); ?>" id="xEREsds">

<div class="card-header"><i class="fa fa-trash"  ></i>   Hapus Data Trafo - <?php echo $row['kodegd']; ?> 
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="modal-body">
   <div class="table-responsive">
      <table width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
            <td valign="top" class="menuUtamaOff">UIW Sumatera Utara<br>UP3&nbsp<?php echo $row['area']; ?> <br>ULP&nbsp<?php echo $row['rayon']; ?> </td>
         </tr>
      </table>
      <table width="400"  border="0" cellpadding="1" cellspacing="0">
         <tr>
            <td> &nbsp </td>
         </tr>
      </table>
      <table width="400"  border="0" cellpadding="1" cellspacing="0">
         <tr align="left" valign="top">
            <td colspan="2">
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
                     <td width="150"><font color="#4f5051"></font></td>
                     <td width="200"></td>
                  </tr>
               </table>
      </table>
   </div>
   <br/>	
   
 <button class="btn btn-danger" onclick="DeleteGardu()">Hapus Data</button>			
</div>
<div class="card-footer small text-muted">&copy 2018 - SiHD</div>
<?php } }
?>

<script>
function DeleteGardu(){if(1==confirm("Apakah Anda yakin untuk menghapus data?")){var a=$("#alamat").val(),e=$("#WxdDwzA").val(),l=$("#SADEeferf").val(),t=$("#WEWEWEadsa").val(),kodegd=$("#xEREsds").val(),d=(a=$("#alamat").val(),$("#kapasitas").val()),i=$("#feeder").find(":selected").val(),n=$("#ufeeder").val(),r=$("#lat").val(),v=$("#lng").val(),s=$("#konstruksi").find(":selected").val(),u=$("#merek").find(":selected").val(),k=$("#noseri").val(),o=$("input[name=fasa]:checked").val(),p=$("#thntrafo").val(),h=$("#jlh_tap").val(),m=$("#pos_tap").val(),f=$("#imp").val(),c=$("#minyak").find(":selected").val(),g=$("#vector").val(),_=$("#tgl_psg").val(),j=$("#jlh_jur").val(),y=$("#ket").val();t==l?$.post("../ajax/deleteMaster.php",{idgardu:e,kodegd:kodegd,alamat:a,kapasitas:d,feeder:i,ufeeder:n,lat:r,lng:v,konstruksi:s,merek:u,noseri:k,fasa:o,thntrafo:p,jlh_tap:h,pos_tap:m,imp:f,minyak:c,vector:g,tgl_psg:_,jlh_jur:j,ket:y},function(a,e){$("#modDelete").modal("hide"),alert("Data berhasil dihapus!"),location.href="../master_gardu/index.php"}):alert("Anda tidak memiliki hak akses untuk menghapus data")}}
</script>




