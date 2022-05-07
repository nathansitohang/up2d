<?php
 include('../..//session.php'); 
   $ULP = $UP3 =  "";

if(isset($_POST)){
	$UP3 = $_POST['UP3'];
	$ULP = $_POST['ULP'];
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
	$detail = $_POST['detail'];
	$opsi = $_POST['opsi'];

	$hari = 1;
	$dateselect = strftime("%Y-%m-%d", strtotime($tahun."-".$bulan."-".$hari.' +1 months -1 day'));
	$dateselect2 = strftime("%Y-%m-%d", strtotime($tahun."-".$bulan.' -2 months'));


	$twyes = 0;

if ($opsi == "Bulanan")
{
	$datenow = strftime("%Y-%m-%d", strtotime($tahun."-".$bulan."-".$hari));
	$dateend = strftime("%Y-%m-%d", strtotime($tahun."-".$bulan."-".$hari.' +1 months -1 day'));
	$twyes = 0;
	
}
 else
{
	$datenow = strftime("%Y-%m-%d", strtotime($tahun."-".$bulan."-".$hari.' -2 months'));
	$dateend = strftime("%Y-%m-%d", strtotime($tahun."-".$bulan."-".$hari.' +1 months -1 day'));
	$twyes = 1;
}  
   
?>

<div class="card-header"> <i class="fa fa-stethoscope"></i> Rekam Medis Penyulang <?php echo $datenow;?> sd <?php echo $dateend;?>   
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
<div class="table-responsive">
                           <!-- Ini Isi Tabel-->			
                           <?php
						   
						  					   
							  $no=1;
							  $kriteria="";						  
                              if ($login_role == "admin")  
							  {  	  
								  if ($detail == 1)
								  {
									  
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
						  COUNT(pemadaman2.feeder) AS total2
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder 
AND pemadaman2.tanggalpadam between '$datenow' and '$dateend'
AND pemadaman2.status = 1 and pemadaman2.tripkembali <> 1
WHERE penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
ORDER BY total2 DESC ";
}

								else if ($ULP==0 or $ULP=="")
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
						  COUNT(pemadaman2.feeder) AS total2
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder 
AND pemadaman2.tanggalpadam between '$datenow' and '$dateend'
AND pemadaman2.status = 1 and pemadaman2.tripkembali <> 1
WHERE  penyulang.idup3 = '$UP3' AND penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
ORDER BY total2 DESC";
}

						else 
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
						  COUNT(pemadaman2.feeder) AS total2
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 
and penyulang.feeder = pemadaman2.feeder 
AND pemadaman2.tanggalpadam between '$datenow' and '$dateend'
AND pemadaman2.status = 1 and pemadaman2.tripkembali <> 1
WHERE  penyulang.idulp = '$ULP' AND penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
ORDER BY total2 DESC";

}
							$result = mysqli_query($db, $query);
							

                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                               echo  
							   
                               '<table class="table" id="rekam"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>No</th>
											  
                              					<th>Feeder</th>
                              					<th>UP3</th>
                              					<th>ULP</th>												
                              				    <th>Total</th>
                              				    <th>Kriteria</th>

                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
								$status = 0;
								$warna = 0;
                                while ($row = $result->fetch_assoc()){

									if ($twyes == 0)
									{
									    if ($row["total2"] == 0)
										{
										$status = "SEMPURNA";
										$warna = "#4287f5";
										}
										else if ($row["total2"] >= 1 && $row["total2"] <= 2)
										{
										$status = "SEHAT";
										$warna = "#42f55d";										
										}
										else if ($row["total2"] >= 3 && $row["total2"] <= 4)
										{
										$status = "SAKIT";
										$warna = "#eff542";
										}
										else if ($row["total2"] >= 5)
										{
										$status = "KRONIS";	
										$warna = "#f54242";
										}
									}
										
									else if ($twyes == 1) {	
										if ($row["total2"] >= 0 && $row["total2"] <= 2)
										{
										$status = "SEMPURNA";
										$warna = "#4287f5";
										}
										else if ($row["total2"] >= 3 && $row["total2"] <= 5)
										{
										$status = "SEHAT";
										$warna = "#42f55d";	
										}
										else if ($row["total2"] >= 6 && $row["total2"] <= 9)
										{
										$status = "SAKIT";
										$warna = "#eff542";										
										}
										else if ($row["total2"] >= 10)
										{
										$status = "KRONIS";	
										$warna = "#f54242";
										}
									}
										
                               echo '  
                                                 <tr>  
												<td align=center>'.$no.'</td> 
                              					<td align=center>'.$row["feeder"].'</td> 
                              					<td align=center>'.$row["up3"].'</td>  
                              					<td align=center>'.$row["ulp"].'</td>  
												<td align=center>'.$row["total2"].'</td>
												<td style="background-color:'.$warna.'" align=center>'.$status.'</td> 
												</tr>  
                                                ';	$no++;
                              	} 
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';
										  
										  }
										  
								else
								  {
									  
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
						  COUNT(pemadaman2.feeder) AS total2
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 
and penyulang.feeder = pemadaman2.feeder 
AND pemadaman2.tanggalpadam between '$datenow' and '$dateend' 
AND pemadaman2.status = 1 and pemadaman2.tripkembali <> 1
WHERE penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, 
penyulang.up3, penyulang.ulp 
ORDER BY total2 DESC ";

}

								else if ($ULP==0 or $ULP=="")
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
						  COUNT(pemadaman2.feeder) AS total2
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 
and penyulang.feeder = pemadaman2.feeder 
AND pemadaman2.tanggalpadam between '$datenow' and '$dateend'
AND pemadaman2.status = 1 and pemadaman2.tripkembali <> 1
WHERE  penyulang.idup3 = '$UP3' AND penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
ORDER BY total2 DESC";

}

						else 
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
						  COUNT(pemadaman2.feeder) AS total2
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder 
AND pemadaman2.tanggalpadam between '$datenow' and '$dateend'
AND pemadaman2.status = 1 and pemadaman2.tripkembali <> 1
WHERE  penyulang.idulp = '$ULP' AND penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
ORDER BY total2 DESC";

}
							$result = mysqli_query($db, $query);
							

                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                               echo  
							   
                               '<table class="table" id="rekam"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>No</th>
											  
                              					<th>Feeder</th>
                              					<th>UP3</th>
                              					<th>ULP</th>												
                              				    <th>Total</th>
                              				    <th>Kriteria</th>

                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
								$status = 0;
								$warna = 0;
                                while ($row = $result->fetch_assoc()){

									if ($twyes == 0)
									{
									    if ($row["total2"] == 0)
										{
										$status = "SEMPURNA";
										$warna = "#4287f5";
										}
										else if ($row["total2"] >= 1 && $row["total2"] <= 2)
										{
										$status = "SEHAT";
										$warna = "#42f55d";										
										}
										else if ($row["total2"] >= 3 && $row["total2"] <= 4)
										{
										$status = "SAKIT";
										$warna = "#eff542";
										}
										else if ($row["total2"] >= 5)
										{
										$status = "KRONIS";	
										$warna = "#f54242";
										}
									}
										
									else if ($twyes == 1) {	
										if ($row["total2"] >= 0 && $row["total2"] <= 2)
										{
										$status = "SEMPURNA";
										$warna = "#4287f5";
										}
										else if ($row["total2"] >= 3 && $row["total2"] <= 5)
										{
										$status = "SEHAT";
										$warna = "#42f55d";	
										}
										else if ($row["total2"] >= 6 && $row["total2"] <= 9)
										{
										$status = "SAKIT";
										$warna = "#eff542";										
										}
										else if ($row["total2"] >= 10)
										{
										$status = "KRONIS";	
										$warna = "#f54242";
										}
									}
										
                               echo '  
                                                 <tr>  
												<td align=center>'.$no.'</td> 
                              					<td align=center>'.$row["feeder"].'</td> 
                              					<td align=center>'.$row["up3"].'</td>  
                              					<td align=center>'.$row["ulp"].'</td>  
												<td align=center>'.$row["total2"].'</td>
												<td style="background-color:'.$warna.'" align=center>'.$status.'</td> 
												</tr>  
                                                ';	$no++;
                              	} 
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';
										  
										  }		  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
							  }
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
										  
                              
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
                              					<th>Rasio CT</th>
                              					<th>S/N</th>
                              					<th>Tahun</th>

                              
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
                              






							
                              			
                              		?>		
                        </div></div>
</div>
<div class="card-footer small text-muted">&nbsp;</div>
<script> 
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#rekam').DataTable( {
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
