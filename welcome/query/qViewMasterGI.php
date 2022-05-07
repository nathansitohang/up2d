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
   

   $tahun= date(' Y ');



   
   ?>
   
   
<div class="card-header"><i class="fa fa-eye"  ></i>   Lihat Data Detail <?php echo $row['GARDU_HUBUNG']; ?> 
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="modal-body">
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
                     <td width="350">&nbsp;&nbsp;<?php echo $row['UP3']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;ULP</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['ULP']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Alamat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['ALAMAT']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Status SCADA</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['SCADA']; ?></td>
                  </tr>
               </table>
  
   </div>
   <br/>	
   <div class="form-bottom">
     <!-- <div class="row">
         <div class="form-group col-md-6 col-sm-6">
            <textarea class="form-control" rows="4" id="ket" ><?php echo $row['ket']; ?></textarea>
         </div>
      </div> -->
   </div>
</div>
<div class="card-footer small text-muted">&copy <?php echo $tahun; ?> - SiHD</div>
<?php } }
   ?>
