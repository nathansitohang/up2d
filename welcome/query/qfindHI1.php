<?php
   include('../..//session.php'); 
		if(isset($_POST['ass']) && isset($_POST['hi']) ) {
		
   $ass = $_POST['ass'];  
   $hi = $_POST['hi'];
			 if ($ass==1){$asse='hi_beban1';$asses='Pembebanan';}
		else if ($ass==2){$asse='hi_imbang';$asses='Ketidakseimbangan';}
		else if ($ass==3){$asse='hi_netral';$asses='Arus Netral';}
		else if ($ass==4){$asse='hi_arus';$asses='Arus Fasa';}
		else if ($ass==5){$asse='hi_1b_oil';$asses='Kondisi Minyak';}
		else if ($ass==6){$asse='hi_1b_fisik';$asses='Kondisi Fisik';}
		else if ($ass==7){$asse='hi_ground';$asses='Grounding';}
		else {$asse='hi_1b_phb';$asses='Kondisi PHB-TR';}

				if ($hi==4){$hix='Baik';}
		else if ($hi==3){$hix='Cukup';}
			else if ($hi==2){$hix='Kurang';}
				else {$hix='Buruk';}
				
?>

<div class="card-header"> <i class="fa fa-search"  ></i>  [<?php echo $asses;?>] - Health Index [<?php echo $hix;?>]	  
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
                               FROM master WHERE ".$asse." = '".$hi."'  ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysql_error());
                              }
                               
                              		
                              		
                               echo        
                               ' <table class="table" id="index"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Area</th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
                                              </tr>
                                            </thead>

                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								echo '  
                                                           <tr>  
														   <td> '.$no.' </td>
                              									<td>'.$row["area"].'</td>  
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  
                                                             </tr>  
                                                             ';	 $no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              else if ($login_role == "area") {
                              $query="SELECT*
                              FROM master WHERE ".$asse." = '".$hi."' AND idarea ='$login_idarea' ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                              		
                               echo        
                               ' <table class="table" id="index"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>                              
                                              </tr>
                                            </thead>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){

								echo '  
                                                           <tr>  
														   <td>'.$no.'</td>
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  
                              	
                                                             </tr>  
                                                             ';	$no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}		
                              
                              else if ($login_role == "rayon") {
                              $query="SELECT*
                              FROM master WHERE ".$asse." = '".$hi."'  AND idrayon ='$login_idrayon' ORDER by kodegd" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                               echo        
                               ' <table class="table" id="index"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>											
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
                               echo '  
                                                           <tr>  
                              									<td align=center>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  																	
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
 
    $('#index').DataTable( {
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
<?php } else {?> <script>$('#findHI').on('hide.bs.modal');alert("Pilih Assesment!")</script><?php }?>
