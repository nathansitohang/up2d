<?php
   include('../..//session.php'); 
?>

<div class="card-header"> <i class="fa fa-fire"  ></i>      Detail Kubikel 
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
<div class="table-responsive">
                           <!-- Ini Isi Tabel-->			
                           <?php
							  $no=1;						   
                              if ($login_role == "admin") {
                              $query="SELECT*
                               FROM master WHERE (hi_beban = 2
OR hi_imbang =2
OR hi_netral =2
OR hi_arus =2
OR hi_1b_oil =2
OR hi_1b_fisik =2
OR hi_1b_phb =2
OR hi_ground =2
OR hi_2a_oil =2
OR hi_bdv =2
OR hi_2b =2
OR hi_2b_body =2
OR hi3a =2
OR hi3b =2
OR hi3c =2) ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysql_error());
                              }
                               
                              		
                              		
                               echo        
                               ' <table class="table" id="kondisikurang"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Area</th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
                              					<th>1.Beban</th>
                              					<th>1.Pincang</th>
                              					<th>1.Iph</th>
                              					<th>1.In</th>
                              					<th>1.Rembes</th>
                              					<th>1.Fisik</th>
                              					<th>1.PHBTR</th>
                              					<th>1.Grounding</th>
                              					<th>2.Minyak</th>
                              					<th>2.BdV</th>
                              					<th>2.Thermo</th>
                              					<th>2.Suhu Trafo</th>
                              					<th>3.TTR</th>
                              					<th>3.IR</th>
                              					<th>3.WR</th>	
                                              </tr>
                                            </thead>

                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								if ($row["hi_beban"] == 2)	{$row["hi_beban"]='kurang';}else{$row["hi_beban"]='-';}
								if ($row["hi_imbang"] == 2)	{$row["hi_imbang"]='kurang';}else{$row["hi_imbang"]='-';}
								if ($row["hi_netral"] == 2)	{$row["hi_netral"]='kurang';}else{$row["hi_netral"]='-';}
								if ($row["hi_arus"] == 2)	{$row["hi_arus"]='kurang';}else{$row["hi_arus"]='-';}
								if ($row["hi_1b_oil"] == 2)	{$row["hi_1b_oil"]='kurang';}else{$row["hi_1b_oil"]='-';}
								if ($row["hi_1b_fisik"] == 2)	{$row["hi_1b_fisik"]='kurang';}else{$row["hi_1b_fisik"]='-';}
								if ($row["hi_1b_phb"] == 2)	{$row["hi_1b_phb"]='kurang';}else{$row["hi_1b_phb"]='-';}
								if ($row["hi_ground"] == 2)	{$row["hi_ground"]='kurang';}else{$row["hi_ground"]='-';}
								if ($row["hi_2a_oil"] == 2)	{$row["hi_2a_oil"]='kurang';}else{$row["hi_2a_oil"]='-';}
								if ($row["hi_bdv"] == 2)	{$row["hi_bdv"]='kurang';}else{$row["hi_bdv"]='-';}
								if ($row["hi_2b"] == 2)	{$row["hi_2b"]='kurang';}else{$row["hi_2b"]='-';}
								if ($row["hi_2b_body"] == 2)	{$row["hi_2b_body"]='kurang';}else{$row["hi_2b_body"]='-';}
								if ($row["hi3a"] == 2)	{$row["hi3a"]='kurang';}else{$row["hi3a"]='-';}
								if ($row["hi3b"] == 2)	{$row["hi3b"]='kurang';}else{$row["hi3b"]='-';}
								if ($row["hi3c"] == 2)	{$row["hi3c"]='kurang';}else{$row["hi3c"]='-';}
								echo '  
                                                           <tr>  
														   <td> '.$no.' </td>
                              									<td>'.$row["area"].'</td>  
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  
																	<td align=center>'.$row["hi_beban"].'</td>  	
																	<td align=center>'.$row["hi_imbang"].'</td>  
																	<td align=center>'.$row["hi_arus"].'</td>  	
																	<td align=center>'.$row["hi_netral"].'</td>												<td align=center>'.$row["hi_1b_oil"].'</td>  	
																	<td align=center>'.$row["hi_1b_fisik"].'</td>  
																	<td align=center>'.$row["hi_1b_phb"].'</td>  	
																	<td align=center>'.$row["hi_ground"].'</td>												
																	<td align=center>'.$row["hi_2a_oil"].'</td>  
																	<td align=center>'.$row["hi_bdv"].'</td>  	
																	<td align=center>'.$row["hi_2b"].'</td>													<td align=center>'.$row["hi_2b_body"].'</td>  	
																	<td align=center>'.$row["hi3a"].'</td>  
																	<td align=center>'.$row["hi3b"].'</td>  	
																	<td align=center>'.$row["hi3c"].	'</td>  	
                                
                                                             </tr>  
                                                             ';	 $no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              else if ($login_role == "area") {
                              $query="SELECT*
                              FROM master WHERE (hi_beban = 2
OR hi_imbang =2
OR hi_netral =2
OR hi_arus =2
OR hi_1b_oil =2
OR hi_1b_fisik =2
OR hi_1b_phb =2
OR hi_ground =2
OR hi_2a_oil =2
OR hi_bdv =2
OR hi_2b =2
OR hi_2b_body =2
OR hi3a =2
OR hi3b =2
OR hi3c =2) AND idarea ='$login_idarea' ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                              		
                               echo        
                               ' <table class="table" id="kondisikurang"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
                              					<th>1.Beban</th>
                              					<th>1.Pincang</th>
                              					<th>1.Iph</th>
                              					<th>1.In</th>
                              					<th>1.Rembes</th>
                              					<th>1.Fisik</th>
                              					<th>1.PHBTR</th>
                              					<th>1.Grounding</th>
                              					<th>2.Minyak</th>
                              					<th>2.BdV</th>
                              					<th>2.Thermo</th>
                              					<th>2.Suhu Trafo</th>
                              					<th>3.TTR</th>
                              					<th>3.IR</th>
                              					<th>3.WR</th>	                              
                                              </tr>
                                            </thead>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								if ($row["hi_beban"] == 2)	{$row["hi_beban"]='kurang';}else{$row["hi_beban"]='-';}
								if ($row["hi_imbang"] == 2)	{$row["hi_imbang"]='kurang';}else{$row["hi_imbang"]='-';}
								if ($row["hi_netral"] == 2)	{$row["hi_netral"]='kurang';}else{$row["hi_netral"]='-';}
								if ($row["hi_arus"] == 2)	{$row["hi_arus"]='kurang';}else{$row["hi_arus"]='-';}
								if ($row["hi_1b_oil"] == 2)	{$row["hi_1b_oil"]='kurang';}else{$row["hi_1b_oil"]='-';}
								if ($row["hi_1b_fisik"] == 2)	{$row["hi_1b_fisik"]='kurang';}else{$row["hi_1b_fisik"]='-';}
								if ($row["hi_1b_phb"] == 2)	{$row["hi_1b_phb"]='kurang';}else{$row["hi_1b_phb"]='-';}
								if ($row["hi_ground"] == 2)	{$row["hi_ground"]='kurang';}else{$row["hi_ground"]='-';}
								if ($row["hi_2a_oil"] == 2)	{$row["hi_2a_oil"]='kurang';}else{$row["hi_2a_oil"]='-';}
								if ($row["hi_bdv"] == 2)	{$row["hi_bdv"]='kurang';}else{$row["hi_bdv"]='-';}
								if ($row["hi_2b"] == 2)	{$row["hi_2b"]='kurang';}else{$row["hi_2b"]='-';}
								if ($row["hi_2b_body"] == 2)	{$row["hi_2b_body"]='kurang';}else{$row["hi_2b_body"]='-';}
								if ($row["hi3a"] == 2)	{$row["hi3a"]='kurang';}else{$row["hi3a"]='-';}
								if ($row["hi3b"] == 2)	{$row["hi3b"]='kurang';}else{$row["hi3b"]='-';}
								if ($row["hi3c"] == 2)	{$row["hi3c"]='kurang';}else{$row["hi3c"]='-';}
								echo '  
                                                           <tr>  
														   <td>'.$no.'</td>
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  
																	<td align=center>'.$row["hi_beban"].'</td>  	
																	<td align=center>'.$row["hi_imbang"].'</td>  
																	<td align=center>'.$row["hi_arus"].'</td>  	
																	<td align=center>'.$row["hi_netral"].'</td>												<td align=center>'.$row["hi_1b_oil"].'</td>  	
																	<td align=center>'.$row["hi_1b_fisik"].'</td>  
																	<td align=center>'.$row["hi_1b_phb"].'</td>  	
																	<td align=center>'.$row["hi_ground"].'</td>												
																	<td align=center>'.$row["hi_2a_oil"].'</td>  
																	<td align=center>'.$row["hi_bdv"].'</td>  	
																	<td align=center>'.$row["hi_2b"].'</td>													<td align=center>'.$row["hi_2b_body"].'</td>  	
																	<td align=center>'.$row["hi3a"].'</td>  
																	<td align=center>'.$row["hi3b"].'</td>  	
																	<td align=center>'.$row["hi3c"].	'</td>  	
                              	
                                                             </tr>  
                                                             ';	$no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}		
                              
                              else if ($login_role == "rayon") {
                              $query="SELECT*
                              FROM kubikel WHERE 1 ORDER by kode_gH" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                               echo        
                               ' <table class="table" id="kondisikurang"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Nama GH</th>
                              					<th>Kubikel</th>
                              					<th>Merk/Type</th>
                              					<th>Fungsi</th>
                              					<th>Rel Busbar</th>
                              					<th>S/N</th>
                              					<th>Tahun</th>
                              					<th>Rasio CT</th>
                              					<th>Merk Relay</th>
                              					<th>S/N</th>
                              					<th>Tahun</th>
                              					<th>Status SCADA</th>
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								if ($row["scada"] == 2)	{$row["scada"]='TIDAK SCADA';}  else if ($row["scada"] == 1)	{$row["scada"]='SUDAH SCADA';}  else{$row["scada"]='BELUM SCADA';}

                               echo '  
                                                           <tr>  
                              									<td align=center>'.$row["nama_gh"].'</td>  
                                                                  <td>'.$row["panel_name"].'</td>  
                                                                  <td align=center>'.$row["merk_cub"].'/'.$row["type_cub"].'</td>  
																	<td align=center>'.$row["fungsi"].'</td>  	
																	<td align=center>'.$row["line_up_rel"].'</td>  
																	<td align=center>'.$row["sn_cub"].'</td> 
																	<td align=center>'.$row["thn_cub"].'</td>  	
																	<td align=center>'.$row["ct_rat"].'</td>												
																	<td align=center>'.$row["merk_relay"].'</td>  	
																	<td align=center>'.$row["sn_relay"].'</td>  
																	<td align=center>'.$row["thn_relay"].'</td>  	
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
 
    $('#kondisikurang').DataTable( {
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
