<?php
   include('../..//session.php'); 
   
?>

<div class="card-header"> <i class="fa fa-wrench"  ></i>      Data Kubikel Tua	  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
<div class="table-responsive">
                           <!-- Ini Isi Tabel-->			
                           <?php
							  $no=1;						   
                              if ($login_role == "admin")  {
                              $query="SELECT*
                              FROM kubikel WHERE thn_cub<2012 order by kode_gh" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                               echo  
							   
                               ' <table class="table" id="kondisiburuk"  width="100%" cellspacing="0">
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
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
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
                              
                              else if ($login_role == "area")  {
                              $query="SELECT*
                              FROM kubikel WHERE thn_cub<2012 AND idup3=$login_idarea order by kode_gh" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                               echo  
							   
                               ' <table class="table" id="kondisiburuk"  width="100%" cellspacing="0">
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
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
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
							   
                               ' <table class="table" id="kondisiburuk"  width="100%" cellspacing="0">
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
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
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
