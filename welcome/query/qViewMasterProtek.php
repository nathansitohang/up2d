<?php
   include "../../config.php";
   include('../../session.php');
   if($_POST['NO']) {
		$id = $_POST['NO'];  
		$id = base64_decode($id);
		$id = $id/657454;		
		$query = "SELECT * FROM penyulang WHERE no = $id";
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
       while ($row = @mysqli_fetch_assoc($result)){
   
 
   $tahun= date(' Y ');



   
   ?>
   
   
   
   
   
   
   
   
   

   
   
<div class="card-header"><i class="fa fa-eye"  ></i>   Data Setting Proteksi <?php echo $row['feeder']; ?> 
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
                  <p> <strong>1. Data Umum</strong></p>
               </div>
            </div>
			
	            <div class="form-bottom">
		
			
   <div class="table-responsive">
      <table width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
            <td valign="top" class="menuUtamaOff">UIW Sumatera Utara<br>UP2D Sumatera Utara&nbsp; </td>
         </tr>
      </table>
      <table width="400"  border="0" cellpadding="1" cellspacing="0">
         <tr>
            <td> &nbsp </td>
         </tr>
      </table>

               <table  class= "table table-bordered table-hover" width="760" border="0" cellspacing="0" cellpadding="0">
                  <thead class="thead-dark" align="center" valign="middle">
				  <tr>
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">Data Umum <?php echo $row['feeder']; ?>   </span></strong></font></td>
					 </tr>
                  </thead>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;UP3/ULP</strong></font> </td>
                     <td width="350"><?php echo $row['up3']; ?>/<?php echo $row['ulp']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Merk Relay</strong></font></td>
                     <td width="200"><?php echo $row['merk']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Rasio CT</strong></font></td>
                     <td width="350"><?php echo$row['ct_rat']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;NGR</strong></font></td>
                     <td width="200"><?php echo $row['ngr']; ?></td>
                  </tr>
               </table>
			                  <button type="button" class="btn btn-primary ">Next
</button>

			      </div>
</div>
	</fieldset>
	
	<fieldset>
	   
	<div class="form-top">
               <div class="form-top-left">
                  <p> <strong>2. Data Setting</strong></p>
               </div>
            </div>		   
			   
			   
			   	            <div class="form-bottom">
   <div class="table-responsive">

<table width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
            <td valign="top" class="menuUtamaOff">UIW Sumatera Utara<br>UP2D Sumatera Utara&nbsp; </td>
         </tr>
      </table>
      <table width="400"  border="0" cellpadding="1" cellspacing="0">
         <tr>
            <td> &nbsp </td>
         </tr>
      </table>
			   
			   
			   <table  class= "table table-bordered table-hover" width="760" border="0" cellspacing="0" cellpadding="0">
                  <thead class="thead-dark" align="center" valign="middle">
				  <tr>
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">Data Proteksi <?php echo $row['feeder']; ?>   </span></strong></font></td>
					 </tr>
					 <tr>
                     <td height="22" colspan="2"><font color="#4f5051"><strong><span class="style2">OCR </span></strong></font></td>
					 <td height="22" colspan="2"><font color="#4f5051"><strong><span class="style2">GFR </span></strong></font></td>
					 </tr>
                  </thead>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;I> set</strong></font> </td>
                     <td width="350"><?php echo $row['oc_iset']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Io> set</strong></font></td>
                     <td width="200"><?php echo $row['gf_iset']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;TMS/Curve</strong></font></td>
                     <td width="350"><?php echo $row['oc_tms']; ?>/<?php echo $row['oc_curve']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;TMS/Curve</strong></font></td>
                     <td width="200"><?php echo $row['gf_tms']; ?>/<?php echo $row['gf_curve']; ?></td>
                  </tr>
				  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;I>> set</strong></font> </td>
                     <td width="350"><?php echo $row['oci_set']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;I0>> set</strong></font></td>
                     <td width="200"><?php echo $row['gfi_set']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;t I>></strong></font></td>
                     <td width="350"><?php echo $row['oci_t']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;t I0>></strong></font></td>
                     <td width="200"><?php echo $row['gfi_t']; ?></td>
                  </tr>
               </table>
			     <button type="button" class="btn btn-info">Back
</button>
</div>
			</div>   
	</fieldset>

     
   <br/>	
</form>
</div>
</div>














<div class="card-footer small text-muted">&copy <?php echo $tahun; ?> - SiHD</div>
<script> 
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#detailGH').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'The information in this table is copyright to PLN'
            },
            {
                extend: 'pdf',
                messageBottom: null
            },
            {
                extend: 'print',

                messageBottom: null
            }
			
        ]
    } );
} );
</script> 

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

