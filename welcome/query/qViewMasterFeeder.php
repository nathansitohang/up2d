<?php
   include "../../config.php";
   include('../../session.php');
   if($_POST['NO']) {
		$id = $_POST['NO'];  
		$id = base64_decode($id);
		$id = $id/657454;		
		$query = "SELECT * FROM penyulang WHERE NO = $id";
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
       while ($row = @mysqli_fetch_assoc($result)){
   

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
	$ulp2=$row['ulp2'];
	
}
   
   ?>
   
   
<div class="card-header"><i class="fa fa-eye"  ></i>   Lihat Data Detail <?php echo $row['feeder']; ?> 
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
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">DATA PENYULANG <?php echo $row['feeder']; ?>   </span></strong></font></td>
					 </tr>
                  </thead>
				 
				
				
				  
				  <?php 
				  
				  if ($row['kode_aset']== 3 or $row['kode_aset']== 4){
					  
					  echo '
					  
					  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;GH</strong></font> </td>
                     <td width="350">'.$row['gigh'].'</td>
					  <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Penyulang</strong></font></td>
                     <td width="350">'.$row["asal"].'</td>
                    
                  </tr>
				 
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;UP3</strong></font> </td>
                     <td width="350">'.$row['up3'].' '.$spasi1.''.$row['up32'].'</td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;ULP</strong></font></td>
                     <td width="200">'.$row['ulp'].' '.$spasi.' '.$row['ulp2'].'</td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Panjang Jaringan</strong></font></td>
                     <td width="350">'.$row['kms'].' kms</td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Status SCADA</strong></font></td>
                     <td width="200">'.$row['scada'].'</td>
                  </tr>
				                 
				  
					  ';

					}
				  else {
					  
					  echo '
					  
					   <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;GI</strong></font> </td>
                     <td width="350">'.$row['gigh'].'</td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;TD</strong></font></td>
                     <td width="200">'.$row['td'].'/'.$row['kap'].'</td>
                  </tr>
				 
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;UP3</strong></font> </td>
                     <td width="350">'.$row['up3'].' '.$spasi1.''.$row['up32'].'</td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;ULP</strong></font></td>
                     <td width="200">'.$row['ulp'].' '.$spasi.' '.$row['ulp2'].'</td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Panjang Jaringan</strong></font></td>
                     <td width="350">'.$row['kms'].' kms</td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Status SCADA</strong></font></td>
                     <td width="200">'.$row['scada'].'</td>
                  </tr>
				                    <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;UFR</strong></font></td>
                     <td width="350">'.$row['ufr'].'</td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;OLS</strong></font></td>
                     <td width="200">'.$row['ols'].'</td>
                  </tr>
					 
					
				  
					  ';

					}
					  
				
				  
				  ?>
				  
				  
				  
				   <tr>
                     <td width="220"  style="text-align: center; vertical-align: middle;" colspan="4" ><font color="#4f5051"><strong>&nbsp;&nbsp;Jalur</strong></font></td>
                     </tr>
					 <tr>
					 <td width="350" style="text-align: center; vertical-align: middle;"colspan="4"><?php echo $row['ket4']; ?></td>
                     
                  </tr>
				
               </table>
			
  
   </div>
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
