
  			


<?php
 include('../..//session.php'); 
 
if(isset($_POST)){
   $UP3 = $_POST['UP3'];
   $ULP = $_POST['ULP'];
   $bulan = $_POST['bulan'];	
   $tahun = $_POST['tahun'];
   $fgtm = $_POST['fgtm'];
	 
   
?>

<div class="card-header"> <i class="fa fa-wrench"></i> Gangguan yang disebabkan oleh : <?php echo $fgtm ;?> 		  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
                           <!-- Ini Isi Tabel-->			
                           <?php
							  $no=1;						   
                              if ($login_role == "admin")  {
								  if ($UP3==12)
									  {
                              $query="SELECT * FROM pemadaman2 WHERE fgtm='$fgtm' AND MONTH (tanggalpadam) = '$bulan' AND 
							  YEAR (tanggalpadam) = '$tahun' ORDER by tanggalpadam asc";

}


						else if ($ULP==0 or $ULP=="") {
                              $query="SELECT * FROM pemadaman2 WHERE fgtm='$fgtm' AND idup3 = '$UP3' AND MONTH (tanggalpadam) = '$bulan' AND 
							  YEAR (tanggalpadam) = '$tahun' ORDER by tanggalpadam asc";

}

							else  {
                              $query="SELECT * FROM pemadaman2 WHERE fgtm='$fgtm' AND idulp = '$ULP' AND MONTH (tanggalpadam) = '$bulan' AND 
							  YEAR (tanggalpadam) = '$tahun' ORDER by tanggalpadam asc";
}

$result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }

                              
                               echo  
							   
                               '<table class="table" id="qdetFGTM"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
											  <th>No</th>
                              					<th>Feeder</th>
                              					<th>Tanggal</th>
												
                              					<th>UP3</th>
                              					<th>ULP</th>
                              					<th>Sebab</th>												
												
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_array($result)){
									

                               echo '  
                                                           <tr>  
														        <td align=center>'.$no.'</td> 
                              									<td align=center>'.$row["feeder"].'</td> 
                              									<td align=center>'.$row["tanggalpadam"].'</td> 
                              									<td align=center>'.$row["up3"].'</td>  
                              									<td align=center>'.$row["ulp"].'</td>
                              									<td align=center>'.$row["fgtm"].'</td>  
																
	                                                     </tr>  
                                                             ';	$no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';


}


?>		
</div>
</div>
<div class="card-footer small text-muted">&nbsp;</div>

<script> 
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#qdetFGTM').DataTable( {
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


<?php } else {?> <script>$('#qdetFGTM').on('hide.bs.modal');alert("Data Belum Lengkap!")</script><?php }?>
