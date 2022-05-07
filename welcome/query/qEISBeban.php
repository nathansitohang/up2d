<?php
 include('../..//session.php'); 

if(isset($_POST)){
   $ULP = $UP3 =  "";
   $UP3 = $_POST['UP3'];
   $ULP = $_POST['ULP'];
   $bulan = $_POST['bulan'];	
   $tahun = $_POST['tahun'];
	 
   
?>

<div class="card-header"> <i class="fa fa-wrench"></i> Data Beban <?php echo $_POST['bulan'];?>  <?php echo $_POST['tahun'];?> 		  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
</div>
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



<?php } else {?> <script>$('#viewload').on('hide.bs.modal');alert("Data Belum Lengkap!")</script><?php }?>
