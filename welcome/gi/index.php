<?php
   include('../../session.php');
   include('../../config.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="../../img/logo_pln.jpg">
      <title>SiODis / Master Gardu Induk</title>
	  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <link href="../../css/sb-admin.css" rel="stylesheet">
	  <link href="../../css/button/buttons.dataTables.min.css" rel="stylesheet"> 
	  <style>
         .btn-circle {
         width: 30px;
         height: 30px;
         text-align: center;
         padding: 6px 0;
         font-size: 12px;
         line-height: 1.428571429;
         border-radius: 15px;
         }
      </style>
	  <style>
	  .modal-lg {
    max-width: 70% !important;
}
	  </style>
   </head>
   
   

   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
         <a class="navbar-brand" href="../../#"><img src="..//../../img/sihd.png" alt="SiODis v.1.0" style="width:130px;height:auto;"></a>
         <button href="#" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="../#">
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					</a>
				</li>	   


				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Assesment">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#assesment" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-pencil"></i>
						<span class="nav-link-text">Operasi</span>
					</a>
                <ul class="sidenav-second-level collapse" id="assesment">
                   
                    <li>
                        <a href="../padam">Entri Data Padam</a>
                    </li>
                    <li>
                        <a href="../beban">Entri Data Beban</a>
                    </li>
					 <li>
                        <a href="../setpro">Resetting Proteksi</a>
                    </li>
					
					  <!--<li>
                        <a href="har">Entri Pemeliharaan</a>
                    </li>-->
                  </ul>
				</li>
				
				
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#master" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-folder"></i>
						<span class="nav-link-text">Data Aset</span>
					</a>
					
					
                <ul class="sidenav-second-level collapse" id="master">
                    <li>
                        <a href="#">Gardu Induk</a>
                    </li>
                     
					<li>
                        <a href="../gh">Gardu Hubung</a>
                    </li>
					
					<li>
                        <a href="../feeder">Penyulang</a>
                    </li>
                    
					<li>
                        <a href="../kp">Keypoint</a>
                    </li> 
                </ul>
                </li>
				
				
               
			    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Health Index">
                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#healthindex" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-heartbeat"></i>
                  <span class="nav-link-text">Analisa</span>
                  </a>
                  <ul class="sidenav-second-level collapse" id="healthindex">
                     <li>
                        <a href="../rp">Rekap Pemadaman</a>
                     </li>
						<li>
                        <a href="../rload">Rekap Beban</a>
                     </li>
                     <li>
                        <a href="../rrp">Rekap Resetting Proteksi</a>
                     </li>
                     <!--<li>
                        <a href="rhar">Rekap Pemeliharaan</a>
                     </li>-->
				
                  </ul>
               </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
               <li class="nav-item">
                  <a class="nav-link text-center"  id="sidenavToggler">
                  <i class="fa fa-fw fa-angle-left"></i>
                  </a>
               </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-fw fa-user"></i>Welcome, <?php echo $login_session; ?></a>
                  <span class="d-lg-none">
                  </span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                     <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modUserProf">
                     <span class="text-success">
                     <strong>
                     <i class="fa fa-fw fa-user"></i>User Profile</strong>
                     </span>
                     </a>
                     <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modChangePw">
                     <span class="text-danger">
                     <strong>
                     <i class="fa fa-fw fa-gear"></i>Ubah Password</strong>
                     </span>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#"  class="dropdown-item" data-toggle="modal" data-target="#modLogout">
                     <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="#">Master Gardu Induk</a>
               </li>
               <!--  <li class="breadcrumb-item active"></li>-->
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
               <div class="card-header">
                  <i class="fa fa-table"></i> Data Gardu Induk Tersebar di <?php echo $login_area; ?></a>
                   <!--<button class="close" type="button" data-dismiss="modal" id="excel" aria-label="Export">
                  <span aria-hidden="true"><i class="fa fa-file-excel-o "></i></span>
                  </button> */ -->
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <!-- Ini Isi Tabel-->			
                     <?php
						$no=1;					 
                        if ($login_role == "admin") {
                       $query="SELECT*
                        FROM titik WHERE KODE_ASET = 1 ORDER by KODE_UP, KODE_UL" ;
                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
						
						
                        		
                        		
                         echo        
                         ' <table class="table" id="dataGI" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        					<th><p data-toggle="tooltip" title="Tambah Data Gardu"><button class="btn btn-circle" data-title="Tambah" data-toggle="modal" data-target="#modAddMaster" ><i class="fa fa-plus" ></i></button></p></th>
                        					<th>Detail</th>																					
                        					<th>Nama GI</th>
											<th>UP3</th>
											<th>Koordinat</th>
                        					<th>Alamat</th>
                        					<th>Status SCADA</th>
											<th>Edit</th>
                        					<th>Hapus</th>
											
                                        </tr>
                                      </thead>
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
							  if ($row['SCADA'] == 1) { $SCADA = 'SUDAH' ;}

								else { $SCADA = 'BELUM'; }
                         echo '  
                                                     <tr>
                        					<td>'.$no.' </td>																							 
                        	<td><p data-placement="top" data-toggle="tooltip" title="Lihat"><a data-target="#modViewGI" class="btn btn-warning btn-circle" data-title="Lihat" data-toggle="modal" data-id="'.base64_encode(657454*$row["NO"]).'"><i class="fa fa-eye" style="color:#fff"></i></a></p></td>
							
                        									<td>'.$row["GARDU_HUBUNG"].'</td> 
															<td>'.$row["UP3"].'</td>  
                                                            <td>'.$row["LAT"].','.$row["LON"].'</td>  
															
                                                            <td>'.$row["ALAMAT"].'</td>
															
                                                            <td>'.$row["SCADA"].'</td>
															<td><p data-placement="top" data-toggle="tooltip" title="Edit"><a data-target="#modEditGI" class="btn btn-success btn-circle " data-title="Edit" data-toggle="modal" data-id="'.base64_encode(7238985*$row["NO"]).'" ><i class="fa fa-pencil" style="color:#fff"></i></a></p></td>
                        	<td><p data-placement="top" data-toggle="tooltip" title="Hapus"><a data-target="#modDelete" class="btn btn-danger btn-circle" data-title="Hapus" data-toggle="modal" data-id="'.base64_encode(4635636*$row["NO"]).'"><i class="fa fa-trash" style="color:#fff"></i></a></p></td>
                          
                                                       </tr>  
                                                       '; $no++;	
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';}
                        
                        else if ($login_role == "area") {
                        $query="SELECT*
                        FROM titik WHERE KODE_ASET = 1 AND (KODE_UP ='$login_idarea' OR SHARING ='$login_idarea')" ;
                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
                        		
                        		
                         echo        
                         ' <table class="table" id="dataGI" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        					<th>No. </th>
                        					<th>Detail</th>																					
                        					<th>Nama GH</th>
                        					<th>Alamat</th>
											<th>Koordinat</th>
                        					<th>Status SCADA</th>
                        
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
											<th>No. </th>
                        					<th>Detail</th>																					
                        					<th>Nama GH</th>
                        					<th>Alamat</th>
											<th>Koordinat</th>											
                        					<th>Status SCADA</th>
                        
                                        </tr>
                                      </tfoot>
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
							  
							    if ($row['SCADA'] == 1) { $SCADA = 'SUDAH' ;}

								else { $SCADA = 'BELUM'; }
                         echo '  
                                                     <tr>
																<td>'.$no.'</td>
                        	<td><p data-placement="top" data-toggle="tooltip" title="Lihat"><a data-target="#modViewGI" class="btn btn-warning btn-circle" data-title="Lihat" data-toggle="modal" data-id="'.base64_encode(657454*$row["NO"]).'"><i class="fa fa-eye" style="color:#fff"></i></a></p></td>
                        									<td>'.$row["GARDU_HUBUNG"].'</td> 
                                                            <td>'.$row["ALAMAT"].'</td>
                                                            <td>'.$row["LAT"].', '.$row["LON"].'</td>  															
                                                            <td>'.$row["SCADA"].'</td>
                                                       </tr>  
                                                       ';	$no++;
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';}			
                        
                        else if ($login_role == "rayon") {
                        $query="SELECT*
                        FROM titik WHERE KODE_ASET = 1 AND (KODE_UP ='$login_idarea' OR SHARING ='$login_idarea')" ;
                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
                        		
                        		
                         echo        
                         ' <table class="table" id="dataGI" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        					<th>No.</th>
                        					<th>Detail</th>
                        					<th>Nama GI</th>
                        					<th>Alamat</th>
                        					<th>Status SCADA</th>
                        					<th>Koordinat</th>                        
                                        </tr>
                                      </thead>
                               
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
							  	
								if ($row['SCADA'] == 1) { $SCADA = 'SUDAH' ;}

								else { $SCADA = 'BELUM'; }

                         echo '  
                                                     <tr> 
                        					<td>'.$no.'</td>	 
                        	<td><p data-placement="top" data-toggle="tooltip" title="Lihat"><span><a data-target="#modViewGI" class="btn btn-warning btn-circle" data-title="Lihat" data-toggle="modal" data-id="'.base64_encode(657454*$row["NO"]).'"><i class="fa fa-eye" style="color:#fff"></i></a></span></p></td>
                        									<td>'.$row["GARDU_HUBUNG"].'</td>  
                                                            <td>'.$row["ALAMAT"].'</td>  
                                                            <td>'.$row["SCADA"].'</td>
                                                            <td>'.$row["LAT"].', '.$row["LON"].'</td>									  
                                                       </tr>  
                                                       ';	$no++;
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>'; }
                        
                        			
                        		?>	
                  </div>
               </div>
               <div class="card-footer small text-muted"> SiHD </div>
            </div>
         </div>
         <!-- /.container-fluid-->
         <!-- /.content-wrapper-->
         <footer class="sticky-footer">
            <div class="container">
               <div class="text-center">
                  <small>SiHD <?php echo date("Y"); ?>
</small>
               </div>
            </div>
         </footer>
         <!-- Scroll to Top Button-->
         <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
         </a>
         <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
         </a>
         <!-- User Profile Modal-->
         <div class="modal fade" id="modUserProf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
               <div class="modal-content">
                  <div class="modal-header">
                     <center>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-fw fa-user"></i>   <span class="label label-warning">User Profile</span></h4>
                     </center>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class=" col-md-12 col-lg-12 hidden-xs hidden-sm">
                           <table class="table table-user-information">
                              <tbody>
                                 <tr>
                                    <td>Nama Profile:</td>
                                    <td><?php echo $login_session; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Username:</td>
                                    <td><?php echo $login_username; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Role:</td>
                                    <td><?php echo $login_role; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Last Active: </td>
                                    <td><i><?php echo $login_last; ?><i/></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Change Password Modal-->
         <div class="modal fade" id="modChangePw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
               <div class="modal-content">
                  <div class="konfirmasi-pw"></div>
               </div>
            </div>
         </div>
         <!-- Logout Modal-->
         <div class="modal fade" id="modLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Keluar dari SiHD</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">x</span>
                     </button>
                  </div>
                  <div class="modal-body">Tekan tombol "Logout" untuk mengakhiri sesi ini!</div>
                  <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                     <a class="btn btn-primary" href="../../logout.php">Logout</a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Tambah Data Gardu Modal-->
         <div class="modal fade" id="modAddMaster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xs">
               <div class="modal-content">
                  <div class="add-data"></div>
               </div>
            </div>
         </div>
         <!-- Lihat Data Gardu Induk Modal Test-->
         <div class="modal fade" id="modViewGI" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="lihatGI-data"> 
                  </div>
               </div>
            </div>
         </div>
         <!-- Edit Data Gardu Modal-->
         <div class="modal fade" id="modEditGI" role="dialog">
            <div class="modal-dialog modal-xs" role="document">
               <div class="modal-content">
                  <div class="edit-data"></div>
               </div>
            </div>
         </div>
         <!-- Delete Gardu Modal Test-->
         <div class="modal fade" id="modDelete" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="delete-data"> 
                  </div>
               </div>
            </div>
         </div>
         <!-- Bootstrap core JavaScript-->
         <script src="../../vendor/jquery/jquery.min.js"></script>
         <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
         <!-- Core plugin JavaScript-->
         <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
         <!-- Page level plugin JavaScript-->
         <script src="../../vendor/datatables/jquery.dataTables.js"></script>
         <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
         <!-- Custom scripts for all pages-->
         <!-- Custom scripts for this page-->
         <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//../../js/analytics.js','ga');
            
            ga('create', 'UA-75591362-1', 'auto');
            ga('send', 'pageview');
            
         </script>
	
	
	
      <!-- Bootstrap core JavaScript-->
      <script src="../../js/sb-admin.min.js"></script>
	       <script src="../../js/highcharts.js"></script>

      <!-- Custom scripts for this page-->
      <script src="../../js/sb-admin-datatables.min.js"></script>
      <script src="../../js/modal.js"></script>
      <script src="../../js/dashboard_gd.js" type="text/javascript"></script>
	      <!-- Page level plugin JavaScript-->
    <script src="../../vendor/chart.js/Chart.min.js"></script>
    <!-- Custom scripts for all pages-->
    <!-- Custom scripts for this page-->
    <script src="../../js/sb-admin-charts.min.js"></script>
	<script src="../../js/button/dataTables.buttons.min.js"></script>
    <script src="../../js/button/jszip.min.js"></script>
    <script src="../../js/button/pdfmake.min.js"></script>
    <script src="../../js/button/vfs_fonts.js"></script>
    <script src="../../js/button/buttons.html5.min.js"></script>
    <script src="../../js/button/buttons.print.min.js"></script>
	<script src="../../js/button/buttons.colVis.min.js"></script> 
	<script src="../../js/markerclusterer.js"></script> 
    
		 




 <script> 
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#dataGI').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'The information on this table is copyright to PLN'
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

	<script>
	$('.datatable').DataTable()
	</script>
             
      </div>
   </body>
</html>
