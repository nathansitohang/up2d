<?php
   include "../../config.php";
   include('../../session.php');
   if($_POST['NO']) {
		$id = $_POST['NO'];  
		$id = base64_decode($id);
		$id = $id/657454;		
		$query = "SELECT * FROM titik WHERE NO = $id";
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
       while ($row = @mysqli_fetch_assoc($result)){
   
   if ($row['SCADA'] == 1) { $SCADA = 'SUDAH' ;}

   else { $SCADA = 'BELUM'; }
   $tahun= date(' Y ');
 $ipaddress = '';

function get_client_ip() {
   
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}



   
   ?>
   
   
   
   
   
   
   
   
   

   
   
<div class="card-header"><i class="fa fa-eye"  ></i>   Lihat Data Detail <?php echo $row['GARDU_HUBUNG']; ?> <?php echo $ipaddress; ?> 
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
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">DATA <?php echo $row['GARDU_HUBUNG']; ?>   </span></strong></font></td>
					 </tr>
                  </thead>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;UP3</strong></font> </td>
                     <td width="350"><?php echo $row['UP3']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;ULP</strong></font></td>
                     <td width="200"><?php echo $row['ULP']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Alamat</strong></font></td>
                     <td width="350"><?php echo$row['ALAMAT']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Status SCADA</strong></font></td>
                     <td width="200"><?php echo $SCADA; ?></td>
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
                  <p> <strong>2. Data Kubikel</strong></p>
               </div>
            </div>		   
			   
			   
			   	            <div class="form-bottom">
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
			   
			   
			   <?php 
			   
			   $no=1;
			   $query2="SELECT*
                        FROM kubikel WHERE kode_gh = $id" ;
                        $result = mysqli_query($db, $query2);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
                        		
                        		
                         echo        
                         ' <table class="table table-responsive" id="detailGH" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
										    <th>NO</th>
                        					<th>LINE UP</th>
                        					<th>PANEL NAME</th>
											<th>FUNGSI</th>
											<th>MERK KUBIKEL</th>
											<th>TYPE KUBIKEL</th>
											<th>TYPE PMT</th>
											<th>TAHUN KUBIKEL</th>
											<th>S/N</th>
											<th>RASIO CT</th>
                        					<th>SCADA</th>
                        
                                        </tr>
                                      </thead>
                                      
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
							  
							    if ($row['scada'] == 1) { $SCADA2 = 'SUDAH' ;}
							   else if ($row['scada'] == 0) { $SCADA2 = 'BELUM' ;}

								else { $SCADA2 = 'TIDAK SCADA'; }
                         echo '  
                                                     <tr>  
													        <td>'.$no.'</td>  
                        									<td>'.$row["line_up_rel"].'</td>  
                                                            <td>'.$row["panel_name"].'</td>  
															<td>'.$row["fungsi"].'</td>  
                                                            <td>'.$row["merk_cub"].'</td> 
															<td>'.$row["type_cub"].'</td>  
                                                            <td>'.$row["cbmot"].'</td> 
															<td>'.$row["thn_cub"].'</td>  
                                                            <td>'.$row["sn_cub"].'</td> 
															<td>'.$row["ct_rat"].'</td> 

                                                            <td>'.$SCADA2.'</td>  
                                                       </tr>  
                                                       ';	$no++;
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';
			   
			   
			   
			   
			   
			   
			   
			   ?>
              <button type="button" class="btn btn-info">Previous</button>                           
               <button type="button" class="btn btn-primary ">Next</button>
			   </div>   
	</fieldset>

 <fieldset>
<div class="form-top">
               <div class="form-top-left">
                  <p> <strong>3. Single Line Diagram</strong></p>
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
                <img width="400" height = "auto"  src="../../img/fotogh/<?php echo $id; ?>/sld.jpg"  alt="Sorry! Image not available at this time" onError="this.onerror=null;this.src='../../img/notfound.jpg';">

               </table>
				<button type="button" class="btn btn-info">Previous</button>                           
               <button type="button" class="btn btn-primary ">Next</button>

			      </div>
</div>
	</fieldset>
   

 <fieldset>
<div class="form-top">
               <div class="form-top-left">
                  <p> <strong>4. Gambar Kubikel</strong></p>
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
                <img width="400" height = "auto"  src="../../img/fotogh/<?php echo $id; ?>/cub.jpg"  alt="Sorry! Image not available at this time" onError="this.onerror=null;this.src='../../img/notfound.jpg';">

               </table>
				<button type="button" class="btn btn-info">Previous</button>                           
               <button type="button" class="btn btn-primary ">Next</button>

			      </div>
</div>
	</fieldset>

<fieldset>
<div class="form-top">
               <div class="form-top-left">
                  <p> <strong>5. Gambar Baterai/Charger</strong></p>
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
			   <tr>
                <td style="text-align: center; vertical-align: middle;"><img width="400" height = "auto"  src="../../img/fotogh/<?php echo $id; ?>/bat.jpg"  alt="Sorry! Image not available at this time" onError="this.onerror=null;this.src='../../img/notfound.jpg';"></td>
                <td style="text-align: center; vertical-align: middle;"><img width="400" height = "auto"  src="../../img/fotogh/<?php echo $id; ?>/chr.jpg"  alt="Sorry! Image not available at this time" onError="this.onerror=null;this.src='../../img/notfound.jpg';"></td>
				</tr>
				
				
               </table>
			   
			    
			   
			   
			   
			   
			   
				<button type="button" class="btn btn-info">Previous</button>                           
               <button type="button" class="btn btn-primary ">Next</button>

			      </div>
</div>
	</fieldset>

<fieldset>
<div class="form-top">
               <div class="form-top-left">
                  <p> <strong>6. Gedung Sipil</strong></p>
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
                <td style="text-align: center; vertical-align: middle;"><img width="400" height = "auto"  src="../../img/fotogh/<?php echo $id; ?>/vie.jpg"  alt="Sorry! Image not available at this time" onError="this.onerror=null;this.src='../../img/notfound.jpg';">
	   
	   </td>
                <td style="text-align: center; vertical-align: middle;"><img width="400" height = "auto"  src="../../img/fotogh/<?php echo $id; ?>/den.jpg"  alt="Sorry! Image not available at this time" onError="this.onerror=null;this.src='../../img/notfound.jpg';"></td>









               </table>
				<button type="button" class="btn btn-info">Previous</button>                           

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

