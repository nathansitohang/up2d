<?php
   include('../..//session.php'); 
		if($_POST['nilai']>0) {
		
   $item = $_POST['item'];  
   $nilai = $_POST['nilai'];
   $tanda = $_POST['tanda'];
			 if ($item==1){$jitem1='persen1';$jitem2='persen2';$asses='Pembebanan'; $satuan='%';}
		else if ($item==2){$jitem1='imbang';$jitem2='imbang2';$asses='Ketidakseimbangan'; $satuan='%';}
		else if ($item==3){$jitem1='netral1';$jitem2='netral2';$asses='Arus Netral'; $satuan='%';}
		else if ($item==4){$jitem1='maxi_1';$jitem2='maxi_2';$asses='Arus Fasa'; $satuan='%';}
		else if ($item==5){$jitem='g_la';$asses='Grounding LA'; $satuan='ohm';}
		else if ($item==6){$jitem='g_body';$asses='Grounding Body'; $satuan='ohm';}
		else {$jitem='g_netral';$asses='Grounding Netral'; $satuan='ohm';}

				 	 	 
?>

<div class="card-header"> <i class="fa fa-search"  ></i>  Hasil Pencarian: <?php echo $asses;?> <?php echo $tanda;?> <?php echo $nilai;?> <?php echo $satuan;?>        
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
							  if ($item==1 || $item==2 || $item==3 || $item==4){
                              $query="SELECT*
                               FROM master WHERE ((".$jitem1." ".$tanda." '".$nilai."' OR ".$jitem2." ".$tanda." '".$nilai."') AND ((".$jitem1." != 0 OR ".$jitem2." != 0))) ORDER by idrayon" ;}
							   
							   else{
	                              $query="SELECT*
                               FROM master WHERE (".$jitem." ".$tanda." '".$nilai."' AND ".$jitem." != 0)  ORDER by idrayon" ;}
							   
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysql_error());
                              }
                               
                              		
                              		
                               echo        
                               ' <table class="table" id="indexing"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Area</th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th> ';
                                              if ($item==1 || $item==2 || $item==3 || $item==4){
											  echo '
                              					<th>% LWBP</th>
                              					<th>% WBP</th> ';											  
											  }
											  else { echo'
                              					<th>Ohm</th>
											  ';}
											  
											  echo '</tr>
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
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  ';                                          
											if ($item==1){
											  echo '
                              					<td>'.$row["persen1"].'</td>
                              					<td>'.$row["persen2"].'</td> ';											  
											  }
											else if ($item==2){
											  echo '
                              					<td>'.$row["imbang"].'</td>
                              					<td>'.$row["imbang2"].'</td> ';											  
											  }											  
											else if ($item==3){
											  echo '
                              					<td>'.$row["netral1"].'</td>
                              					<td>'.$row["netral2"].'</td> ';											  
											  }												  
											else if ($item==4){
											  echo '
                              					<td>'.$row["maxi_1"].'</td>
                              					<td>'.$row["maxi_2"].'</td> ';											  
											  }												  
											else if ($item==5){
											  echo '
                              					<td>'.$row["g_la"].'</td> ';											  
											  }												  
											else if ($item==6){
											  echo '
                              					<td>'.$row["g_body"].'</td> ';											  
											  }																				  
											  else { echo'
                              					<td>'.$row["g_netral"].'</td>';}	
												
												echo '</tr>  
                                                             ';	 $no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              else if ($login_role == "area") {
							  
                              if ($item==1 || $item==2 || $item==3 || $item==4){
							  $query="SELECT*
                              FROM master WHERE ((".$jitem1." ".$tanda." '".$nilai."' OR ".$jitem2." ".$tanda." '".$nilai."') AND ((".$jitem1." != 0 OR ".$jitem2." != 0))) AND idarea ='$login_idarea' ORDER by idrayon" ;}
                              else{
							  $query="SELECT*
                              FROM master WHERE (".$jitem." ".$tanda." '".$nilai."' AND ".$jitem." != 0) AND idarea ='$login_idarea' ORDER by idrayon" ;}
							  
							  $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                              		
                               echo        
                               ' <table class="table" id="indexing"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>';
                                              if ($item==1 || $item==2 || $item==3 || $item==4){
											  echo '
                              					<th>% LWBP</th>
                              					<th>% WBP</th> ';											  
											  }
											  else { echo'
                              					<th>Ohm</th>
											  ';}
											  
											  
											  
											  echo '                              
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
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td> ';                                            
											if ($item==1){
											  echo '
                              					<td>'.$row["persen1"].'</td>
                              					<td>'.$row["persen2"].'</td> ';											  
											  }
											else if ($item==2){
											  echo '
                              					<td>'.$row["imbang"].'</td>
                              					<td>'.$row["imbang2"].'</td> ';											  
											  }											  
											else if ($item==3){
											  echo '
                              					<td>'.$row["netral1"].'</td>
                              					<td>'.$row["netral2"].'</td> ';											  
											  }												  
											else if ($item==4){
											  echo '
                              					<td>'.$row["maxi_1"].'</td>
                              					<td>'.$row["maxi_2"].'</td> ';											  
											  }												  
											else if ($item==5){
											  echo '
                              					<td>'.$row["g_la"].'</td> ';											  
											  }												  
											else if ($item==6){
											  echo '
                              					<td>'.$row["g_body"].'</td> ';											  
											  }																				  
											  else { echo'
                              					<td>'.$row["g_netral"].'</td>';}	
												echo ' 
                              	
                                                             </tr>  
                                                             ';	$no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}		
                              
                              else if ($login_role == "rayon") {
							  
                              if ($item==1 || $item==2 || $item==3 || $item==4){
							  $query="SELECT*
                              FROM master WHERE ((".$jitem1." ".$tanda." '".$nilai."' OR ".$jitem2." ".$tanda." '".$nilai."') AND ((".$jitem1." != 0 OR ".$jitem2." != 0))) AND idrayon ='$login_idrayon' ORDER by kodegd" ;}
							  
                              else{
							  $query="SELECT*
                              FROM master WHERE (".$jitem." ".$tanda." '".$nilai."' AND ".$jitem." != 0 ) AND idarea ='$login_idarea' ORDER by idrayon" ;}
							  
							  $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                               echo        
                               ' <table class="table" id="indexing"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>';
                                              if ($item==1 || $item==2 || $item==3 || $item==4){
											  echo '
                              					<th>% LWBP</th>
                              					<th>% WBP</th> ';											  
											  }
											  else {echo '
                              					<th>Ohm</th>
											  ';}
                                              
											  
											  
											  
											  echo '											
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$kap=$row['kapasitas'];
								$fasa=$row['fasa'];
								if ($fasa==1) {$kap=1.5*$kap;} else {$kap=$kap;}
								$amp=1000*$kap/(400*sqrt(3));
                               echo '  
                                                           <tr align=center>  
                              									<td >'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  ';                                            
											if ($item==1){
											  echo '
                              					<td>'.$row["persen1"].'</td>
                              					<td>'.$row["persen2"].'</td> ';											  
											  }
											else if ($item==2){
											  echo '
                              					<td>'.$row["imbang"].'</td>
                              					<td>'.$row["imbang2"].'</td> ';											  
											  }											  
											else if ($item==3){
											  echo '
                              					<td>'.$row["netral1"].'</td>
                              					<td>'.$row["netral2"].'</td> ';											  
											  }												  
											else if ($item==4){
											  echo '
                              					<td>'.$row["maxi_1"].'</td>
                              					<td>'.$row["maxi_2"].'</td> ';											  
											  }												  
											else if ($item==5){
											  echo '
                              					<td>'.$row["g_la"].'</td> ';											  
											  }												  
											else if ($item==6){
											  echo '
                              					<td>'.$row["g_body"].'</td> ';											  
											  }																				  
											  else { echo'
                              					<td>'.$row["g_netral"].'</td>';}	
												echo '												
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
 
    $('#indexing').DataTable( {
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
<?php } else {?> <script>$('#findHI').on('hide.bs.modal');alert("Input Nilai yang Valid!")</script><?php }?>
