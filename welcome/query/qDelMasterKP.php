<?php
   include "../../config.php";
   include('../../session.php');
   if($_POST['NO']) {
		$id = $_POST['NO'];  
		$id = base64_decode($id);
		$id = $id/4635636;		
		$query = "SELECT * FROM keypoint WHERE NO = $id";
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
       while ($row = @mysqli_fetch_assoc($result)){
   
  
?>
<input type="hidden" value="<?php echo base64_encode(12367*$row['no']); ?>" id="WxdDwzA">
<input type="hidden" value="<?php echo base64_encode($login_idrayon); ?>" id="SADEeferf">
<input type="hidden" value="<?php echo base64_encode($row['idulp1']); ?>" id="WEWEWEadsa">
<input type="hidden" value="<?php echo base64_encode($row['nomor_kp']); ?>" id="xEREsds">

<div class="card-header"><i class="fa fa-trash"  ></i>   Hapus Data Keypoint - <?php echo $row['nomor_kp']; ?> 
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="modal-body">
   <div class="table-responsive">
      <table width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
            <td valign="top" class="menuUtamaOff">UIW Sumatera Utara<br>UP3&nbsp<?php echo $row['up3']; ?> <br>ULP&nbsp<?php echo $row['ulp']; ?> </td>
         </tr>
      </table>
      <table width="400"  border="0" cellpadding="1" cellspacing="0">
         <tr>
            <td> &nbsp </td>
         </tr>
      </table>
      
			   
			   
			   <table  class= "table table-bordered table-hover" width="760" border="0" cellspacing="0" cellpadding="0">
                  <tr align="center" valign="middle">
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">DATA KEYPOINT </span></strong></font></td>
                  </tr>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;UP3</strong></font> </td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['up3']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;ULP</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['ulp']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Alamat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['ALAMAT']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Merk</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['merk']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Koordinat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['lat'];?>, <?php echo $row['lon']; ?></td>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Nomor KP</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['nomor_kp']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Jenis</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['jenis']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Keterangan</strong></font></td>
                     <td width="200">&nbsp;&nbsp;</td>
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
function DeleteGardu(){if(1==confirm("Apakah Anda yakin untuk menghapus data?")){var a=$("#alamat").val(),e=$("#WxdDwzA").val(),l=$("#SADEeferf").val(),t=$("#WEWEWEadsa").val(),kodegd=$("#xEREsds").val(),d=(a=$("#alamat").val(),$("#kapasitas").val()),i=$("#feeder").find(":selected").val(),n=$("#ufeeder").val(),r=$("#lat").val(),v=$("#lng").val(),s=$("#konstruksi").find(":selected").val(),u=$("#merek").find(":selected").val(),k=$("#noseri").val(),o=$("input[name=fasa]:checked").val(),p=$("#thntrafo").val(),h=$("#jlh_tap").val(),m=$("#pos_tap").val(),f=$("#imp").val(),c=$("#minyak").find(":selected").val(),g=$("#vector").val(),_=$("#tgl_psg").val(),j=$("#jlh_jur").val(),y=$("#ket").val();t==l?$.post("../ajax/deleteMaster.php",{idgardu:e,kodegd:kodegd,alamat:a,kapasitas:d,feeder:i,ufeeder:n,lat:r,lng:v,konstruksi:s,merek:u,noseri:k,fasa:o,thntrafo:p,jlh_tap:h,pos_tap:m,imp:f,minyak:c,vector:g,tgl_psg:_,jlh_jur:j,ket:y},function(a,e){$("#modDelete").modal("hide"),alert("Data berhasil dihapus!"),location.href="../..//welcome/kp/index.php"}):alert("Anda tidak memiliki hak akses untuk menghapus data")}}
</script>




