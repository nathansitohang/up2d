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
		
?>





<div class="card-header"> <i class="fa fa-pencil"  ></i>      Resetting	  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
   <div class="col-md-12 form-box">
      <form role="form" class="registration-form" method= "post" action="javascript:void(0);">
         <fieldset>
            <div class="form-top">
               <div class="form-top-left">
                  <h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>&nbsp<?php echo $row['feeder'];
?> </h3>


                  <p> <strong>1. Data Umum </strong></p>
               </div>
            </div>
            <div class="form-bottom">
               <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">Merk</label>
                     <input type="text" class="form-control" placeholder="Merk Relay" value="<?php echo $row['merk']; ?>"  id="merk">
                  </div>
               </div>
			   
               <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">Rasio CT</label>
                     <input type="text" class="form-control" placeholder="Rasio CT" value="<?php echo $row['ct_rat']; ?>"  id="ct_rat">
                  </div>
               </div>
               
               <button type="button" class="btn btn-primary ">Next</button>
            </div>
         </fieldset>
         <fieldset>
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
            <div class="form-top">
               <div class="form-top-left">
                  <p> <strong>2. Overcurrent Relay</strong></p>
               </div>
            </div>
			
			<div class="form-bottom">
               <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">I> set</label>
                     <input type="text" class="form-control" placeholder="I>set" value="<?php echo $row['oc_iset']; ?>"  id="oc_iset" onkeypress="return isNumber(event)">
                  </div>
               </div>
			   
               <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">TMS</label>
                     <input type="text" class="form-control" placeholder="TMS" value="<?php echo $row['oc_tms']; ?>"  id="oc_tms" onkeypress="return isNumber(event)">
                  </div>
               </div>
			   
			                  <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">Curve</label>
                     <input type="text" class="form-control" placeholder="Curve" value="<?php echo $row['oc_curve']; ?>"  id="oc_curve" >
                  </div>
               </div>
			   
               <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">I>> set</label>
                     <input type="text" class="form-control" placeholder="I>> set" value="<?php echo $row['oci_set']; ?>"  id="oci_set" onkeypress="return isNumber(event)">
                  </div>
               </div>
			   
			              <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">time I>></label>
                     <input type="text" class="form-control" placeholder="time I>>" value="<?php echo $row['oci_t']; ?>"  id="oci_t" onkeypress="return isNumber(event)">
                  </div>
               </div>
			   
               
              <button type="button" class="btn btn-info">Previous</button>                           
               <button type="button" class="btn btn-primary ">Next</button>
            </div>
			
			
			
    
			
			
			
			
			
			
			

         </fieldset>
         <fieldset>
            <div class="form-top">
               <div class="form-top-left">
                  <p> <strong>3. Ground Fault Relay</strong></p>
               </div>
            </div>
            <div class="form-bottom">
               <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">I0> set</label>
                     <input type="text" class="form-control" placeholder="I>set" value="<?php echo $row['gf_iset']; ?>"  id="gf_iset" onkeypress="return isNumber(event)">
                  </div>
               </div>
			   
               <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">TMS</label>
                     <input type="text" class="form-control" placeholder="TMS" value="<?php echo $row['gf_tms']; ?>"  id="gf_tms" onkeypress="return isNumber(event)">
                  </div>
               </div>
			   
			                  <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">Curve</label>
                     <input type="text" class="form-control" placeholder="Curve" value="<?php echo $row['gf_curve']; ?>"  id="gf_curve" >
                  </div>
               </div>
			   
               <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">I0>> set</label>
                     <input type="text" class="form-control" placeholder="I>> set" value="<?php echo $row['gfi_set']; ?>"  id="gfi_set" onkeypress="return isNumber(event)">
                  </div>
               </div>
			   
			              <div class="row">
                  <div class="form-group col-md-12 col-sm-3">
                     <label for="alamat">time I0>></label>
                     <input type="text" class="form-control" placeholder="time I>>" value="<?php echo $row['gfi_t']; ?>"  id="gfi_t" onkeypress="return isNumber(event)">
                  </div>
               </div>
               <button type="button" class="btn btn-info">Previous</button>
               <button class="btn" onclick="UpdateReset()">Simpan</button>							
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
$(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>

<script>
function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
</script>

<script>
function UpdateReset(){if(1==confirm("Apakah Anda yakin untuk mengubah data?")){
var a=$("#merk").val(),
b=$("#ct_rat").val(),
c=$("#oc_iset").val(),
d=$("#oc_tms").val(),
e=$("#oc_curve").val(),
f=$("#oci_set").val(),
g=$("#oci_t").val(),


h=$("#gf_iset").val(),
i=$("#gf_tms").val(),
j=$("#gf_curve").val(),
k=$("#gfi_set").val(),
l=$("#gfi_t").val()

;

<?php echo $id ; ?>==<?php echo  $id ; ?>?$.post("../ajax/updateResetting.php",{NO:<?php echo json_encode($NO); ?>,
merk:a,
ct_rat:b,
oc_iset:c,
oc_tms:d,
oc_curve:e,
oci_set:f,
oci_t:g,
gf_iset:h,
gf_tms:i,
gf_curve:j,
gfi_set:k,
gfi_t:l





},




function(a){$("#modView").modal("hide"),alert("Data berhasil diubah!"),location.href="../setpro"}):alert("Anda tidak memiliki hak akses untuk mengubah data")}}
</script>