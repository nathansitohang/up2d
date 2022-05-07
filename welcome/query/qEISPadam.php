<?php
 include('../..//session.php'); 
   $ULP = $UP3 =  "";

if(isset($_POST)){
   $UP3 = $_POST['UP3'];
   $ULP = $_POST['ULP'];
   $awal = $_POST['awal'];	
   $akhir = $_POST['akhir'];
   $detail = $_POST['detail'];
   
	 
   
?>

<div class="card-header"> <i class="fa fa-wrench"></i> Data Pemadaman <?php echo $_POST['awal'];?> s.d. <?php echo $_POST['akhir'];?> 		  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
<div class="table-responsive">
                           <!-- Ini Isi Tabel-->			
                           <?php
						   
						   if ($detail==1)
						   {						   
							  $no=1;						   
                              if ($login_role == "admin")  {
								  if ($UP3==12)
									  {
                              $query=" 
					 SELECT
						  penyulang.no,
						  penyulang.feeder,
						  penyulang.gigh,						  
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
 
						  COUNT(pemadaman2.feeder) AS total
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder AND pemadaman2.tanggalpadam >= '$awal' AND pemadaman2.tanggalpadam <= '$akhir' AND pemadaman2.status = 1
WHERE penyulang.dtbs_pdm IN (1,2) GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp ORDER BY total DESC ";

}


						else if ($ULP==0 or $ULP=="") {
                              $query=" 
					   SELECT
						  penyulang.no,
						  penyulang.feeder,
						  penyulang.gigh,						  
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
 
						  COUNT(pemadaman2.feeder) AS total
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder AND pemadaman2.tanggalpadam >= '$awal' AND pemadaman2.tanggalpadam <= '$akhir' AND pemadaman2.status = 1
WHERE penyulang.idup3 = '$UP3' AND penyulang.dtbs_pdm IN (1,2) GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp ORDER BY total DESC ";

}

							else  {
                              $query=" 
						 SELECT
						  penyulang.no,
						  penyulang.feeder,
						  penyulang.gigh,						  
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
 
						  COUNT(pemadaman2.feeder) AS total
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder AND pemadaman2.tanggalpadam >= '$awal' AND pemadaman2.tanggalpadam <= '$akhir' AND pemadaman2.status = 1
WHERE penyulang.idulp = '$ULP' AND penyulang.dtbs_pdm IN (1,2) GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp order by total DESC";

}


$result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }

                              
                               echo  
							   
                               '<table class="table" id="kondisi"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Feeder</th>
                              					<th>GI/GH</th>												
                              					<th>UP3</th>
                              					<th>ULP</th>												
												<th>Jenis</th>
                              				    <th>Total</th>

                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_array($result)){
									

                               echo '  
                                                           <tr>  
                              									<td align=center>'.$row["feeder"].'</td> 
                              									<td align=center>'.$row["gigh"].'</td>
                              									<td align=center>'.$row["up3"].'</td>  
                              									<td align=center>'.$row["ulp"].'</td>  
                              									<td align=center>'.$row["jns_cb"].'</td>  
																
                                                               	<td align=center>'.$row["total"].'</td> 														
                                                             </tr>  
                                                             ';	
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              else if ($login_role == "area")  {
                              $query="SELECT*
                              FROM kubikel WHERE thn_cub<2012 AND idup3=$login_idarea order by kode_gh" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                               echo  
							   
                               ' <table class="table" id="kondisi"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Nama GH</th>
                              					<th>Kubikel</th>
                              					<th>Merk/Type</th>
                              					<th>S/N</th>
                              					<th>Tahun</th>
                              					<th>Rasio CT</th>

                              					<th>Status SCADA</th>
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_array($result)){
									if ($row["scada"] == 2)	{$row["scada"]='TIDAK SCADA';}  else if ($row["scada"] == 1)	{$row["scada"]='SUDAH SCADA';}  else{$row["scada"]='BELUM SCADA';}

                               echo '  
                                                           <tr>  
                              									<td align=center>'.$row["nama_gh"].'</td>  
                                                                  <td>'.$row["panel_name"].'</td>  
                                                                  <td align=center>'.$row["merk_cub"].'/'.$row["type_cub"].'</td>  
																	
																	<td align=center>'.$row["sn_cub"].'</td> 
																	<td align=center>'.$row["thn_cub"].'</td>  	
																	<td align=center>'.$row["ct_rat"].'</td>												
		
																	<td align=center>'.$row["scada"].'</td>																
                                                             </tr>  
                                                             ';	
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}		
                              
                              else if ($login_role == "rayon") {
                              $query="SELECT*
                              FROM kubikel WHERE thn_cub<2012 AND idup3=$login_idarea order by kode_gh" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                               echo  
							   
                               ' <table class="table" id="kondisi"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Nama GH</th>
                              					<th>Kubikel</th>
                              					<th>Merk/Type</th>
                              					<th>S/N</th>
                              					<th>Tahun</th>
                              					<th>Rasio CT</th>

                              					<th>Status SCADA</th>
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_array($result)){
									if ($row["scada"] == 2)	{$row["scada"]='TIDAK SCADA';}  else if ($row["scada"] == 1)	{$row["scada"]='SUDAH SCADA';}  else{$row["scada"]='BELUM SCADA';}

                               echo '  
                                                           <tr>  
                              									<td align=center>'.$row["nama_gh"].'</td>  
                                                                  <td>'.$row["panel_name"].'</td>  
                                                                  <td align=center>'.$row["merk_cub"].'/'.$row["type_cub"].'</td>  
																	
																	<td align=center>'.$row["sn_cub"].'</td> 
																	<td align=center>'.$row["thn_cub"].'</td>  	
																	<td align=center>'.$row["ct_rat"].'</td>												
		
																	<td align=center>'.$row["scada"].'</td>																
                                                             </tr>  
                                                             ';	
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
}





							else if ($detail==2)
						   {						   
							  $no=1;						   
                              if ($login_role == "admin")  {
								  if ($UP3==12)
									  {
                              $query="SELECT * FROM pemadaman2 WHERE status = 1 AND tanggalpadam >= '$awal' AND tanggalpadam <= '$akhir' order by tanggalpadam  desc";

}


						else if ($ULP==0 or $ULP=="") {
                              $query="SELECT * FROM pemadaman2 WHERE status = 1 AND tanggalpadam >= '$awal' AND tanggalpadam <= '$akhir' AND idup3='$UP3' order by tanggalpadam  desc";

}

							else  {
			$query="SELECT * FROM pemadaman2 WHERE status = 1 AND tanggalpadam >= '$awal' AND tanggalpadam <= '$akhir' AND idulp='$ULP' order by tanggalpadam  desc";

}


								$result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }

                              
                               echo  
							   
                               '<table class="table" id="kondisi"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>No</th>
                        					<th>Tanggal</th>																					
                        					<th>Penyulang</th>
                        					<th>Tipe Padam</th>
                        					<th>UP3</th>
                        					<th>ULP</th>
                        					<th>Indikasi</th>											
											<th>Padam</th>
                        					<th>Pulih</th>
									

                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_array($result)){
									

                               echo '  
                                                           <tr>  
                              									<td>'.$no.' </td>																							 
                        	<td>'.$row["tanggalpadam"].'</td>
							
                        									<td>'.$row["feeder"].'  </td> 
															<td>'.$row["katapadam"].'  </td> 
                                                            <td>'.$row["up3"].' </td>  
                                                            <td>'.$row["ulp"].'</td>
															<td>'.$row["indikasi"].' </td>  
															<td>'.$row["jampadam"].' </td>  
                                                            <td>'.$row["jampulih"].'</td>
																										
                                                             </tr>  
                                                             ';	 $no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              else if ($login_role == "area")  {
                              $query="SELECT*
                              FROM kubikel WHERE thn_cub<2012 AND idup3=$login_idarea order by kode_gh" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                               echo  
							   
                               ' <table class="table" id="kondisi"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Nama GH</th>
                              					<th>Kubikel</th>
                              					<th>Merk/Type</th>
                              					<th>S/N</th>
                              					<th>Tahun</th>
                              					<th>Rasio CT</th>

                              					<th>Status SCADA</th>
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_array($result)){
									if ($row["scada"] == 2)	{$row["scada"]='TIDAK SCADA';}  else if ($row["scada"] == 1)	{$row["scada"]='SUDAH SCADA';}  else{$row["scada"]='BELUM SCADA';}

                               echo '  
                                                           <tr>  
                              									<td align=center>'.$row["nama_gh"].'</td>  
                                                                  <td>'.$row["panel_name"].'</td>  
                                                                  <td align=center>'.$row["merk_cub"].'/'.$row["type_cub"].'</td>  
																	
																	<td align=center>'.$row["sn_cub"].'</td> 
																	<td align=center>'.$row["thn_cub"].'</td>  	
																	<td align=center>'.$row["ct_rat"].'</td>												
		
																	<td align=center>'.$row["scada"].'</td>																
                                                             </tr>  
                                                             ';	
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}		
                              
                              else if ($login_role == "rayon") {
                              $query="SELECT*
                              FROM kubikel WHERE thn_cub<2012 AND idup3=$login_idarea order by kode_gh" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                               echo  
							   
                               ' <table class="table" id="kondisi"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Nama GH</th>
                              					<th>Kubikel</th>
                              					<th>Merk/Type</th>
                              					<th>S/N</th>
                              					<th>Tahun</th>
                              					<th>Rasio CT</th>

                              					<th>Status SCADA</th>
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_array($result)){
									if ($row["scada"] == 2)	{$row["scada"]='TIDAK SCADA';}  else if ($row["scada"] == 1)	{$row["scada"]='SUDAH SCADA';}  else{$row["scada"]='BELUM SCADA';}

                               echo '  
                                                           <tr>  
                              									<td align=center>'.$row["nama_gh"].'</td>  
                                                                  <td>'.$row["panel_name"].'</td>  
                                                                  <td align=center>'.$row["merk_cub"].'/'.$row["type_cub"].'</td>  
																	
																	<td align=center>'.$row["sn_cub"].'</td> 
																	<td align=center>'.$row["thn_cub"].'</td>  	
																	<td align=center>'.$row["ct_rat"].'</td>												
		
																	<td align=center>'.$row["scada"].'</td>																
                                                             </tr>  
                                                             ';	
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
}
                              			
                              		?>		
                        </div></div>
</div>
<div class="card-footer small text-muted">&nbsp;</div>
<script> 
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#kondisi').DataTable( {
        dom: 'lBfrtip',
		"order": [],
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



<?php } else {?> <script>$('#viewggn').on('hide.bs.modal');alert("Data Belum Lengkap!")</script><?php }?>
