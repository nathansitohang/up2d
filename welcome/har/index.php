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
      <title>SiHD / Entri Data Pemeliharaan</title>
      <!-- Bootstrap core CSS-->
      <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
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
         <a class="navbar-brand" href="../#"><img src="..//../../img/sihd.png" alt="SiHD v.1.0" style="width:130px;height:auto;"></a>
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
			   
			   
			   
			   
	               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="master">
                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#master" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-folder"></i>
                  <span class="nav-link-text">Master</span>
                  </a>
                  <ul class="sidenav-second-level collapse" id="master">
                     <li>
                        <a href="../gi">Gardu Induk</a>
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
			   
			   
			   
			   
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Assesment">
                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#assesment" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-pencil"></i>
                  <span class="nav-link-text">Operasi</span>
                  </a>
                  <ul class="sidenav-second-level collapse" id="assesment">
                     <li>
                        <a href="../setpro">Resetting Proteksi</a>
                     </li>
                     <li>
                        <a href="../padam">Entri Data Padam</a>
                     </li>
                     <li>
                        <a href="../beban">Entri Data Beban</a>
                     </li>
					 <li>
                        <a href="#">Entri Pemeliharaan</a>
                     </li>
                  </ul>
               </li>
               
			    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Health Index">
                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#healthindex" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-heartbeat"></i>
                  <span class="nav-link-text">EIS</span>
                  </a>
                  <ul class="sidenav-second-level collapse" id="healthindex">
                      <li>
                        <a href="../rp">Rekap Pemadaman</a>
                     </li>
                     <li>
                        <a href="../rrp">Rekap Resetting Proteksi</a>
                     </li>
                     <li>
                        <a href="../rhar">Rekap Pemeliharaan</a>
                     </li>
					 <li>
                        <a href="../databeban">Data Beban</a>
                     </li>
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
                  <a href="#">Data Pemeliharaan</a>
               </li>
               <!--  <li class="breadcrumb-item active"></li>-->
            </ol>
            <!-- Example DataTables Card-->
			<div class="row">
			<div class="col-lg-7">
            <div class="card mb-3">
               <div class="card-header">
                  <i class="fa fa-table"></i> Entri Data Pemeliharaan</a>
       
               </div>
            <div class="card-body">
			<?php if (isset($_GET['pesan'])) { ?>
			<?php if ($_GET['pesan'] == "berhasil") { ?>
			<div class="alert alert-primary" role="alert">
			Berhasil Menambahkan Data Pemeliharaan
			</div>
			<?php }elseif ($_GET['pesan'] == "gagal") { ?>
				<div class="alert alert-danger" role="alert">
			Gagal Menambahkan Data Pemeliharaan
				</div>
			<?php }elseif ($_GET['pesan'] == "ekstensi") { ?>
				<div class="alert alert-warning" role="alert">
			Ekstensi File Harus PNG Dan JPG
				</div>
			<?php }elseif ($_GET['pesan'] == "size") { ?>
				<div class="alert alert-warning" role="alert">
			Size File Tidak Boleh Lebih Dari 2 MB
				</div>
			<?php } ?>
			<?php } ?>
<form action="insert_act.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Lokasi dan Waktu</label>
    <div class="form-row">
    <div class="col-4">
      <input type="date" class="form-control" placeholder="Tanggal">
    </div>
<div class="col-4">		 
   <select class="form-control"  name="UP3" id="UP3">
    <option value="">- Pilih UP -</option>
    <?php
    $query="SELECT DISTINCT idarea, area FROM user where idarea <> 12 GROUP BY (idarea)";
	$result = mysqli_query($db, $query);
	if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
				while ($row = @mysqli_fetch_array($result)){	
   
    ?>
        <option value="<?php echo $row["idarea"] ?>"><?php echo $row["area"] ?></option>
   
    <?php
    }
    ?>
</select>
</div>

<div class="col-4">
    <select class="form-control"  name="ULP" id="ULP">
	<option value="0">--Pilih ULP--</option>
	</select>
	</div>
  </div>
  </div>
  
  
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Lokasi">
  </div>

    <div class="form-group">
    <label for="case">Case</label>
    <textarea class="form-control" id="case" rows="3" placeholder = "Permasalahan" ></textarea>
  </div>
    <div class="form-group">
    <label for="cause">Cause</label>
    <textarea class="form-control" id="cause" rows="3" placeholder = "Penyebab" ></textarea>
  </div>
  
  <div class="form-group">
    <label for="solution">Solution</label>
    <textarea class="form-control" id="solution" rows="3" placeholder = "Tindakan Perbaikan" ></textarea>
  </div>
  

  <div class="form-group">
  <div class="form-row">
  <div class="col-6">
  <label for="formFileSm" class="form-label">Upload STG (*.pdf) </label>
  <input class="form-control form-control-sm" id="formFileSm" type="file" placeholder = "Surat Tugas"  accept="application/pdf">
</div>
<div class="col">
<label for="formFileSm" class="form-label">Upload Dokumentasi (image) </label>
<input class="form-control form-control-sm"  type="file" multiple accept="image/*">
  </div>
  </div>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Save</button>
</form>
               </div>
            </div>
			</div>
			
			
			<div class="col-lg">
			<div class="card mb-3">
               <div class="card-header">
                  <i class="fa fa-table"></i> Edit Data Pemeliharaan</a>
                 <!-- /* <button class="close" type="button" data-dismiss="modal" id="excel" aria-label="Export">
                  <span aria-hidden="true"><i class="fa fa-file-excel-o "></i></span>
                  </button> */-->
               </div>
               <div class="card-body">
                xxx  
               </div>
            </div>
			</div>
			
			</div>
			
			</div>
			
         </div>
         <!-- /.container-fluid-->
         <!-- /.content-wrapper-->
         <footer class="sticky-footer">
            <div class="container">
               <div class="text-center">
                  <small>SiHD <?php echo date("Y"); ?></small>
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
         <div class="modal fade" id="modAddMasterGH" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xs">
               <div class="modal-content">
                  <div class="add-data"></div>
               </div>
            </div>
         </div>
         <!-- Lihat Data Gardu Modal Test-->
         <div class="modal fade" id="modViewFeeder" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="lihatFeeder-data"> 
                  </div>
               </div>
            </div>
         </div>
         <!-- Edit Data Gardu Modal-->
         <div class="modal fade" id="entryPadam" role="dialog">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="entryPadam-data"></div>
               </div>
            </div>
         </div>
         <!-- Delete Gardu Modal Test-->
         <div class="modal fade" id="deletePadam" role="dialog">
            <div class="modal-dialog modal-xs" role="document">
               <div class="modal-content">
                  <div class="deletePadam-data"> 
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
 $("#UP3").change(function(){
   
        var id_UP3 = $("#UP3").val();
       
        $("#imgLoad").show("");
       
        $.ajax({
            type: "POST",
            dataType: "html",
            url: '..//har/get_up3.php',
            data: "up3="+id_UP3,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data');
                }
               
                else{
                    $("#ULP").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>




 <script> 
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#dataFeed').DataTable( {
		
		pageLength : 3,
        dom: 'lBfrtip',
		lengthMenu: [[1, 2, 3], [1, 2, 3]],

       
    } );
} );
</script> 
<script> 
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#dataFeed2').DataTable( {
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
function deletePadam(){if(1==confirm("Apakah Anda yakin untuk menghapus data?")){
			
var a=$("#hapus").val();

<?php echo $id ; ?>==<?php echo  $id ; ?>?$.post("../ajax/insertGgn.php",{NO:<?php echo json_encode($NO); ?>,
hapus:a

},




function(a){$("#modView").modal("hide"),alert("Data berhasil ditambah!"),location.href="../padam"}):alert("Anda tidak memiliki hak akses untuk mengubah data")}}
</script>
     	
<script type="text/javascript" >
        $(function() {

            $(".delbutton").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                if (confirm("Sure you want to delete? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "../ajax/delPadam.php", //URL to the delete php script
                        data : info,
                        success : function(data) {
							
                        }
                    }).done(function() { 
								alert("Data deleted!"),location.href="../padam/"
                 });
                 
                }
                return false;
            });
        });
 </script>     
		
		
		
      </div>
   </body>
</html>
