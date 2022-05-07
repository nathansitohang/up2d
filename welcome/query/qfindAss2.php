<?php
   include('../..//session.php'); 
		if(isset($_POST['ass'])) {
		if ($_POST['bulan']>0){
		
   $ass = $_POST['ass'];  
   $bulan = $_POST['bulan'];
	if ($ass==1){$asse='tgl2a'; $asses='Oil Quality';}
		else {$asse='tgl2b'; $asses='Thermovision';}
							
?>

<div class="card-header"> <i class="fa fa-search"  ></i>  Belum Assesment [<?php echo $asses;?>] > <?php echo $bulan;?> Bulan  
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
                               FROM master WHERE ".$asse." < DATE_SUB(now(), INTERVAL '".$bulan."' MONTH) ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysql_error());
                              }
                               
                              		
                              		
                               echo        
                               ' <table class="table" id="jadwal"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Area</th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
												 <th>Tgl Ass</th>
                                              </tr>
                                            </thead>

                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								if ($row["tgl2a"] < "2016-01-01") {$row["tgl2a"] = '-';} else {$row["tgl2a"]=$row["tgl2a"];}
								if ($row["tgl2b"] < "2016-01-01") {$row["tgl2b"] = '-';} else {$row["tgl2b"]=$row["tgl2b"];}
                               echo '  
                                                           <tr align=center>  
														   <td> '.$no.' </td>
                              									<td>'.$row["area"].'</td>  
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>';
																  if ($ass==1){echo '
                                                                  <td>'.$row["tgl2a"].'</td>';}
																	else{echo '
                                                                  <td>'.$row["tgl2b"].'</td>';}
																echo'																  
                                                             </tr>  
                                                             ';	 $no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              else if ($login_role == "area") {
                              $query="SELECT*
                              FROM master WHERE ".$asse." < DATE_SUB(now(), INTERVAL '".$bulan."' MONTH) AND idarea ='$login_idarea' ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                              		
                               echo        
                               ' <table class="table" id="jadwal"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>                              
												 <th>Tgl Ass</th>
												 </tr>
                                            </thead>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								if ($row["tgl2a"] < "2016-01-01") {$row["tgl2a"] = '-';} else {$row["tgl2a"]=$row["tgl2a"];}
								if ($row["tgl2b"] < "2016-01-01") {$row["tgl2b"] = '-';} else {$row["tgl2b"]=$row["tgl2b"];}
                               echo '  
                                                           <tr align=center>  
														   <td>'.$no.'</td>
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  ';
																if ($ass==1){echo '
                                                                  <td>'.$row["tgl2a"].'</td>';}
																	else{echo '
                                                                  <td>'.$row["tgl2b"].'</td>';}
																echo'	
                                                             </tr>  
                                                             ';	$no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}		
                              
                              else if ($login_role == "rayon") {
                              $query="SELECT*
                              FROM master WHERE ".$asse." < DATE_SUB(now(), INTERVAL '".$bulan."' MONTH) AND idrayon ='$login_idrayon' ORDER by kodegd" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                               echo        
                               ' <table class="table" id="jadwal"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>											
												 <th>Tgl Ass</th>
												 </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								if ($row["tgl2a"] < "2016-01-01") {$row["tgl2a"] = '-';} else {$row["tgl2a"]=$row["tgl2a"];}
								if ($row["tgl2b"] < "2016-01-01") {$row["tgl2b"] = '-';} else {$row["tgl2b"]=$row["tgl2b"];}
                               echo '  
                                                           <tr align=center>  
                              									<td align=center>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  ';
																  if ($ass==1){echo '
                                                                  <td>'.$row["tgl2a"].'</td>';}
																	else{echo '
                                                                  <td>'.$row["tgl2b"].'</td>';}
																echo'																  
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
 
    $('#jadwal').DataTable( {
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
<?php }} else {?> <script>$('#findHI').on('hide.bs.modal');alert("Pilih Assesment!")</script><?php }?>
