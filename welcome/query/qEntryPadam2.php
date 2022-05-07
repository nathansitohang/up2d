<?php
    include "../../config.php";
	include('../../session.php');

	
	
		if($_POST['NO']) {
		$id = $_POST['NO'];  
		$id = base64_decode($id);
		$id = $id/7238985;				
		$query = "SELECT * FROM penyulang WHERE no = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}

        while ($row = @mysqli_fetch_assoc($result)){
            
   
	$NO=base64_encode(123678*$row['no']);
		$tahun= date(' Y ');
if ($row['up32']== ""){
	$spasi1="";
	$up32="";
}

else {
	$spasi1="&";
	$up32=$row['up32'];
	
}

if ($row['ulp2']== ""){
	$spasi="";
	$ulp2="";
}

else {
	$spasi="&";
$ulp2=$row['ulp2'];}

$jenispadam = 2;
$katapadam = "GANGGUAN"; 

?>





<div class="card-header"> <i class="fa fa-plus"  ></i>      Entri Data Padam  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="modal-body">
   <div class="col-md-12 form-box">
      <form role="form" class="registration-form" method= "post" action="javascript:void(0);">
	  <fieldset>
		
		 
             <div class="form-top">
               <div class="form-top-left">
                  <h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>&nbsp<?php echo $row['feeder'];
?>  <?php echo $row['nmkltr']; ?> </h3>

               </div>
            </div>
			<br/>
			
			<div class="form-bottom">
               <div class="row">
                 
				  <div class="form-group col-md-7 col-sm-6">
                     <label for="padam">Tanggal Padam</label>
                     <input type="date" class="form-control" id="tanggalpadam"  value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d'); ?>">
                  </div>
					<div class="form-group col-md-4 col-sm-6">
                     <label for="padam">Jam Padam</label>
                     <input type="time"  class="form-control" placeholder="Padam" value="" id="jampadam" onkeypress="return isNumber(event)">
                  </div>

               </div>
			   
			
			   
			   
			   <div class="row">
			   <div class="form-group col-md-7 col-sm-6">
                     <label for="pulih">Tanggal Pulih</label>
                     <input type="date" class="form-control" id="tanggalpulih"  value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d'); ?>">
                  </div>
               
                  <div class="form-group col-md-4 col-sm-6">
                     <label for="pulih">Jam Pulih</label>
                     <input type="time"  class="form-control" placeholder="Pulih" value="" id="jampulih" onkeypress="return isNumber(event)">
                  </div>
				  </div>
			   
              
			   
			      <div class="row">
                  <div class="form-group col-md-5 col-sm-3">
                     <label for="indikasi">Indikasi</label>
                        <select class="form-control" id="indikasi">
                           <option value="1" >GFR INSTAN</option>
                           <option value="2" >GFR TD</option>
                           <option value="3" >GFR INSTAN - OCR TD </option>
                           <option value="4" >GFR INSTAN - GFR TD</option>
                           <option value="5" >OCR INSTAN - GFR INSTAN</option>
						    <option value="6" >OCR INSTAN - GFR TD</option>
                           <option value="7" >OCR INSTAN - OCR TD</option>
                           <option value="8" >OCR TD - GFR TD</option>
                           
                        </select>
                  </div>
				   <div class="form-group col-md-4 col-sm-3">
                     <label for="alamat">Arus Gangguan</label>
                     <input type="text" class="form-control" placeholder="R - S - T - N" value=""  id="arusggn" >
                  </div>
				   <div class="form-group col-md-3 col-sm-3">
                     <label for="beban">Arus</label>
                     <input type="text" class="form-control" placeholder="Bbn (A)" value=""  id="arusbeban" onkeypress="return isNumber(event)">
                  </div>
				 


			
					</div>
			   
               <div class="row">
                 
				  
				  <div class="form-group col-md-12 col-sm-3">
                     <label for="indikasi">Kelompok Penyebab</label>
                        <select class="form-control" id="fgtm">
                           <option value="1" >Pohon</option>
                           <option value="2" >Binatang</option>
                           <option value="3" >Komponen </option>
                           <option value="4" >Alam</option>
                           <option value="5" >Komponen JTM</option>
						    <option value="6">Layangan-Kawat</option>
                           <option value="7" >Tidak Ditemukan</option>
                           <option value="8" >Kabel Icon+</option>
						   <option value="9" >Peralatan JTM</option>
							<option value="10" >Komponen Trafo</option>
							<option value="11" >Umbul2- Baliho</option>
							<option value="12" >Trafo</option>
							<option value="13" >Konstruksi</option>
							<option value="14" >Human Error</option>
							<option value="15" >SKTM</option>
							<option value="16" >Komponen PMT GI</option>
							<option value="17" >Vandalisme</option>
							<option value="18" >PMT</option>
							<option value="19" >Kubikel</option>
							<option value="20" >Kendaraan Publik</option>
                           
                        </select>
					
                  </div>
			
               </div>
			   
			
			
			
			  <div class = "row">
			 	   <div class="form-group col-md-6 col-sm-3">
                     <label for="alamat">Lat</label>
                     <input type="text" class="form-control" placeholder="Lat" value=""  id="lat"  onkeypress="return isNumber(event)">
                  </div>
				   <div class="form-group col-md-6 col-sm-3">
                     <label for="beban">Lon</label>
                     <input type="text" class="form-control" placeholder="Lon" value=""  id="lon" onkeypress="return isNumber(event)">
                  </div>
				  </div>
			   
			       <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="beban">Detail Penyebab</label>
                     <textarea class="form-control" placeholder="Detail Penyebab Gangguan" value=""  id="detail">   </textarea>

                  </div>

               </div>
			   
			   	<input type="hidden" class="form-control" id="gigh"  value="<?php echo  $row['gigh'];?>" >
		<input type="hidden" class="form-control" id="feeder"  value="<?php echo $row['feeder'];?>" >
		<input type="hidden" class="form-control" id="idup3"  value="<?php echo $row['idup3'];?>" >
		<input type="hidden" class="form-control" id="up3"  value="<?php echo $row['up3'];?>" >
		<input type="hidden" class="form-control" id="ulp"  value="<?php echo $row['ulp'];?>" >		
		<input type="hidden" class="form-control" id="idulp"  value="<?php echo $row['idulp'];?>" >		

			   
			                  <button type="button" class="btn btn-primary ">Next</button>

               
            </div>
			

         </fieldset>
	  
	  
         <fieldset>
            <div class="form-top">
               <div class="form-top-left">
                  <h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>&nbsp<?php echo $row['feeder'];
?>  <?php echo $row['nmkltr']; ?> </h3>

               </div>
            </div>
			<br/>
            <div class="form-bottom">
               <table  class= "table table-bordered table-hover" width="760" border="0" cellspacing="0" cellpadding="0">
                  <thead class="thead-dark" align="center" valign="middle">
				  
                  </thead>
				  
				  
				   <?php 
				    if ($row['kode_aset']== 1){
				   
				   
				 echo ' 
				  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;GI</strong></font> </td>
                     <td width="350"> '.$row['gigh'].'  '.$row['td'].'   '.$row['kap'].'  MVA </td>
                     
                  </tr>
				  
				   ';
					}
					else {
					 echo ' 
				  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;GH</strong></font> </td>
                     <td width="350">'.$row['gigh'].' </td>
                     
                  </tr>
				  
				   ';	
						
					}
					
					
					
					?>
				  
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;UP3/ULP</strong></font> </td>
                     <td width="350"><?php echo $row['up3']; ?> <?php echo $spasi1; ?> <?php echo $up32; ?>/<?php echo $row['ulp']; ?> <?php echo $spasi; ?> <?php echo $ulp2; ?></td>
                     
                  </tr>
                 
				  
				  <?php 
				  
				  if ($row['kode_aset']== 2){
					  
					  echo '<tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Asal</strong></font></td>
                     <td width="350">'.$row["asal"].'</td>
                  </tr>
					  ';

					}
				  
				  
				  ?>
				  
				  
				  
				   <tr>
                     <td width="220" style="text-align: center; vertical-align: middle;" colspan="4" ><font color="#4f5051"><strong>&nbsp;&nbsp;Jalur</strong></font></td>
                     </tr>
					 <tr>
					 <td width="350" style="text-align: center; vertical-align: middle;"colspan="4"><?php echo $row['ket4']; ?></td>
                     
                  </tr>
				
               </table>
               
			                 <button type="button" class="btn btn-info">Previous</button>                           

			                  <button class="btn" onclick="InsertPadam()">Simpan</button>							

            </div>
         </fieldset>
         
       
      </form>
   </div>
</div>
<div class="card-footer small text-muted">&copy 2022 - SiHD</div>





						
			
	
               
<?php } }
?>


<style>
form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
</style>
<style>
.kapital 
{
    text-transform:capitalize;
}</style>						
<script>						
$(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"], input[type="date"], input[type="time"], select, textarea').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>

<script>
function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
</script>

<script>
function InsertPadam(){
			
var a=$("#tanggalpadam").val(),
b=$("#jampadam").val(),
c=$("#tanggalpulih").val(),
d=$("#jampulih").val(),
e=$("#indikasi").val(),
f=$("#arusggn").val(),
g=$("#arusbeban").val(),
h=$("#fgtm").val(),
i=$("#lat").val(),
j=$("#lon").val(),
k=$("#detail").val(),
l=$("#feeder").val(),
m=$("#up3").val(),
n=$("#idup3").val(),
o=$("#ulp").val(),
p=$("#idulp").val(),
q=$("#gigh").val()

;




<?php echo $id ; ?>==<?php echo  $id ; ?>?$.post("../ajax/insertGgn.php",{NO:<?php echo json_encode($NO); ?>,
tanggalpadam:a,
jampadam:b,
tanggalpulih:c,
jampulih:d,
indikasi:e,
arusggn:f,
arusbeban:g,
fgtm:h,
lat:i,
lon:j,
detail:k,
feeder: l,
up3: m,
idup3: n,
ulp:o,
idulp:p,
gigh:q

},




function(a){$("#modView").modal("hide")}):alert("Periksa input waktu")}
</script>