<?php
   include('../..//session.php'); 
?>

<div class="card-header"> <i class="fa fa-wrench"  ></i>      Kondisi Trafo HI : Buruk	  
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
                               FROM master WHERE (hi_beban = 1
OR hi_imbang =1
OR hi_netral =1
OR hi_arus =1
OR hi_1b_oil =1
OR hi_1b_fisik =1
OR hi_1b_phb =1
OR hi_ground =1
OR hi_2a_oil =1
OR hi_bdv =1
OR hi_2b =1
OR hi_2b_body =1
OR hi3a =1
OR hi3b =1
OR hi3c =1) ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysql_error());
                              }
                               
                              		
                              		
                               echo        
                               ' <table class="table" id="kondisiburuk"  width="100%" cellspacing="0">
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
								if ($row["hi_beban"] == 1)	{$row["hi_beban"]='buruk';}else{$row["hi_beban"]='-';}
								if ($row["hi_imbang"] == 1)	{$row["hi_imbang"]='buruk';}else{$row["hi_imbang"]='-';}
								if ($row["hi_netral"] == 1)	{$row["hi_netral"]='buruk';}else{$row["hi_netral"]='-';}
								if ($row["hi_arus"] == 1)	{$row["hi_arus"]='buruk';}else{$row["hi_arus"]='-';}
								if ($row["hi_1b_oil"] == 1)	{$row["hi_1b_oil"]='buruk';}else{$row["hi_1b_oil"]='-';}
								if ($row["hi_1b_fisik"] == 1)	{$row["hi_1b_fisik"]='buruk';}else{$row["hi_1b_fisik"]='-';}
								if ($row["hi_1b_phb"] == 1)	{$row["hi_1b_phb"]='buruk';}else{$row["hi_1b_phb"]='-';}
								if ($row["hi_ground"] == 1)	{$row["hi_ground"]='buruk';}else{$row["hi_ground"]='-';}
								if ($row["hi_2a_oil"] == 1)	{$row["hi_2a_oil"]='buruk';}else{$row["hi_2a_oil"]='-';}
								if ($row["hi_bdv"] == 1)	{$row["hi_bdv"]='buruk';}else{$row["hi_bdv"]='-';}
								if ($row["hi_2b"] == 1)	{$row["hi_2b"]='buruk';}else{$row["hi_2b"]='-';}
								if ($row["hi_2b_body"] == 1)	{$row["hi_2b_body"]='buruk';}else{$row["hi_2b_body"]='-';}
								if ($row["hi3a"] == 1)	{$row["hi3a"]='buruk';}else{$row["hi3a"]='-';}
								if ($row["hi3b"] == 1)	{$row["hi3b"]='buruk';}else{$row["hi3b"]='-';}
								if ($row["hi3c"] == 1)	{$row["hi3c"]='buruk';}else{$row["hi3c"]='-';}
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
                              FROM master WHERE (hi_beban = 1
OR hi_imbang =1
OR hi_netral =1
OR hi_arus =1
OR hi_1b_oil =1
OR hi_1b_fisik =1
OR hi_1b_phb =1
OR hi_ground =1
OR hi_2a_oil =1
OR hi_bdv =1
OR hi_2b =1
OR hi_2b_body =1
OR hi3a =1
OR hi3b =1
OR hi3c =1) AND idarea ='$login_idarea' ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                              		
                               echo        
                               ' <table class="table" id="kondisiburuk"  width="100%" cellspacing="0">
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
								if ($row["hi_beban"] == 1)	{$row["hi_beban"]='buruk';}else{$row["hi_beban"]='-';}
								if ($row["hi_imbang"] == 1)	{$row["hi_imbang"]='buruk';}else{$row["hi_imbang"]='-';}
								if ($row["hi_netral"] == 1)	{$row["hi_netral"]='buruk';}else{$row["hi_netral"]='-';}
								if ($row["hi_arus"] == 1)	{$row["hi_arus"]='buruk';}else{$row["hi_arus"]='-';}
								if ($row["hi_1b_oil"] == 1)	{$row["hi_1b_oil"]='buruk';}else{$row["hi_1b_oil"]='-';}
								if ($row["hi_1b_fisik"] == 1)	{$row["hi_1b_fisik"]='buruk';}else{$row["hi_1b_fisik"]='-';}
								if ($row["hi_1b_phb"] == 1)	{$row["hi_1b_phb"]='buruk';}else{$row["hi_1b_phb"]='-';}
								if ($row["hi_ground"] == 1)	{$row["hi_ground"]='buruk';}else{$row["hi_ground"]='-';}
								if ($row["hi_2a_oil"] == 1)	{$row["hi_2a_oil"]='buruk';}else{$row["hi_2a_oil"]='-';}
								if ($row["hi_bdv"] == 1)	{$row["hi_bdv"]='buruk';}else{$row["hi_bdv"]='-';}
								if ($row["hi_2b"] == 1)	{$row["hi_2b"]='buruk';}else{$row["hi_2b"]='-';}
								if ($row["hi_2b_body"] == 1)	{$row["hi_2b_body"]='buruk';}else{$row["hi_2b_body"]='-';}
								if ($row["hi3a"] == 1)	{$row["hi3a"]='buruk';}else{$row["hi3a"]='-';}
								if ($row["hi3b"] == 1)	{$row["hi3b"]='buruk';}else{$row["hi3b"]='-';}
								if ($row["hi3c"] == 1)	{$row["hi3c"]='buruk';}else{$row["hi3c"]='-';}
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
                              FROM master WHERE (hi_beban = 1
OR hi_imbang =1
OR hi_netral =1
OR hi_arus =1
OR hi_1b_oil =1
OR hi_1b_fisik =1
OR hi_1b_phb =1
OR hi_ground =1
OR hi_2a_oil =1
OR hi_bdv =1
OR hi_2b =1
OR hi_2b_body =1
OR hi3a =1
OR hi3b =1
OR hi3c =1)  AND idrayon ='$login_idrayon' ORDER by kodegd" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                               echo        
                               ' <table class="table" id="kondisiburuk"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
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
								if ($row["hi_beban"] == 1)	{$row["hi_beban"]='buruk';}else{$row["hi_beban"]='-';}
								if ($row["hi_imbang"] == 1)	{$row["hi_imbang"]='buruk';}else{$row["hi_imbang"]='-';}
								if ($row["hi_netral"] == 1)	{$row["hi_netral"]='buruk';}else{$row["hi_netral"]='-';}
								if ($row["hi_arus"] == 1)	{$row["hi_arus"]='buruk';}else{$row["hi_arus"]='-';}
								if ($row["hi_1b_oil"] == 1)	{$row["hi_1b_oil"]='buruk';}else{$row["hi_1b_oil"]='-';}
								if ($row["hi_1b_fisik"] == 1)	{$row["hi_1b_fisik"]='buruk';}else{$row["hi_1b_fisik"]='-';}
								if ($row["hi_1b_phb"] == 1)	{$row["hi_1b_phb"]='buruk';}else{$row["hi_1b_phb"]='-';}
								if ($row["hi_ground"] == 1)	{$row["hi_ground"]='buruk';}else{$row["hi_ground"]='-';}
								if ($row["hi_2a_oil"] == 1)	{$row["hi_2a_oil"]='buruk';}else{$row["hi_2a_oil"]='-';}
								if ($row["hi_bdv"] == 1)	{$row["hi_bdv"]='buruk';}else{$row["hi_bdv"]='-';}
								if ($row["hi_2b"] == 1)	{$row["hi_2b"]='buruk';}else{$row["hi_2b"]='-';}
								if ($row["hi_2b_body"] == 1)	{$row["hi_2b_body"]='buruk';}else{$row["hi_2b_body"]='-';}
								if ($row["hi3a"] == 1)	{$row["hi3a"]='buruk';}else{$row["hi3a"]='-';}
								if ($row["hi3b"] == 1)	{$row["hi3b"]='buruk';}else{$row["hi3b"]='-';}
								if ($row["hi3c"] == 1)	{$row["hi3c"]='buruk';}else{$row["hi3c"]='-';}
                               echo '  
                                                           <tr>  
                              									<td align=center>'.$row["kodegd"].'</td>  
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
 
    $('#kondisiburuk').DataTable( {
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
