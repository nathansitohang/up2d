<?php			

   include('../../session.php');
   include('../../config.php');

   
						$query="SELECT*
                        FROM titik WHERE KODE_ASET = 2" ;
                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
						
						echo        
                         ' <table class="table" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        					<th><p data-toggle="tooltip" title="Tambah Data Gardu"><button class="btn btn-circle" data-title="Tambah" data-toggle="modal" data-target="#modAddMaster" ><i class="fa fa-plus" ></i></button></p></th>
                        					<th>Nama GH</th>
                        					<th>Alamat</th>
                        					<th>Status SCADA</th>
                        					<th>Edit</th>
                        					<th>Hapus</th>
                        
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                        					<th><p data-toggle="tooltip" title="Tambah Data Gardu"><button class="btn btn-circle" data-title="Tambah" data-toggle="modal" data-target="#modAddMaster" ><i class="fa fa-plus" ></i></button></p></th>
                        					<th>Nama GH</th>
                        					<th>Alamat</th>
                        					<th>Status SCADA</th>
                        					<th>Edit</th>
                        					<th>Hapus</th>
                                        </tr>
                                      </tfoot>
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
                         echo '  
                                                     <tr>  
                        	<td><p data-placement="top" data-toggle="tooltip" title="Lihat"><span><a data-target="#modView1" class="btn btn-warning btn-circle" data-title="Lihat" data-toggle="modal" data-id="'.base64_encode(657454*$row["NO"]).'"><i class="fa fa-eye" style="color:#fff"></i></a></span></p></td>
                        									<td>'.$row["GARDU_HUBUNG"].'</td>  
                                                            <td>'.$row["ALAMAT"].'</td>  
                                                            <td>'.$row["SCADA"].'</td>  
                        	<td><p data-placement="top" data-toggle="tooltip" title="Edit"><a data-target="#modEdit" class="btn btn-success btn-circle " data-title="Edit" data-toggle="modal" data-id="'.base64_encode(7238985*$row["NO"]).'" ><i class="fa fa-pencil" style="color:#fff"></i></a></p></td>
                        	<td><p data-placement="top" data-toggle="tooltip" title="Hapus"><a data-target="#modDelete" class="btn btn-danger btn-circle" data-title="Hapus" data-toggle="modal" data-id="'.base64_encode(4635636*$row["NO"]).'"><i class="fa fa-trash" style="color:#fff"></i></a></p></td>																	  
                                                       </tr>  
                                                       ';	
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';}
						
						
?>