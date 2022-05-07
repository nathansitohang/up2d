<?php
include('../../session.php');
include('../../config.php');
$query="SELECT* FROM penyulang WHERE type='Penyulang' OR type='section' or type='lateral' ORDER by name" ;
$result = mysqli_query($db, $query);
if (!$result) {
die('Invalid query: ' . mysqli_error());
              }


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

  <title>SiHD / Assesment Feeder</title>
  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
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
	
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="../../index.php"><img src="../../img/sihd.png" alt="SiHD v.1.0" style="width:100px;height:30px;"></a>
    <button href="#"  class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master">
          <a class="nav-link" href="../master_feeder">
            <i class="fa fa-fw fa-folder"></i>
            <span class="nav-link-text">Master Feeder</span>
          </a>
        </li>
     

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Assesment">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#assement" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-stethoscope"></i>
            <span class="nav-link-text">Assesment</span>
          </a>
          <ul class="sidenav-second-level collapse" id="assement">
            <li>
              <a href="#">Tier 1</a>
            </li>
            <li>
              <a href="../tier2">Tier 2</a>
            </li>
          </ul>
        </li>
       
	   
	   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cetak Form">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#cetakform" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-print"></i>
            <span class="nav-link-text">Cetak Form Assesment</span>
          </a>
          <ul class="sidenav-second-level collapse" id="cetakform">
            <li>
              <a href="../cetak1">Tier 1</a>
            </li>
            <li>
              <a href="../cetak2">Tier 2</a>
            </li>
          </ul>
        </li>
			    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Health Index">
                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#healthindex" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-heartbeat"></i>
                  <span class="nav-link-text">Health Index</span>
                  </a>
                  <ul class="sidenav-second-level collapse" id="healthindex">
                     <li>
                        <a href="../hi1">Tier 1</a>
                     </li>
                     <li>
                        <a href="../hi2">Tier 2</a>
                     </li>
                  </ul>
               </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
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
			
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modLogout">
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
          <a href="#">Assesment Feeder</a>
        </li>
        <!--  <li class="breadcrumb-item active"></li>-->
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Assesment Tier 1 <?php echo $login_session; ?>

		  </div>
		  
        <div class="card-body">
			<div class="table-responsive">
                     <!-- Ini Isi Tabel-->		
<table id="tree-table" class="table">
    <thead align="center">
    <th align="center">Kode Tiang</th>
	<th align="center">Jenis Aset</th>
      <th align="center">Lokasi/Nama</th>
		 <th align="center">Panjang(kms)</th>
		 <th align="center">Tgl RoW terakhir</th>
		<th align="center">kms RoW terakhir</th>
		 <th align="center">Input RoW</th>
	  </thead>
	  <tbody> 
      <!-- Ini Isi Tabel-->			
<?php

while ($row = @mysqli_fetch_assoc($result)){
if ($row["tglrow"] <= "2017-01-01"){$row["tglrow"]='-';} else {$row["tglrow"]=$row["tglrow"];}
if ($row["type"] == "Penyulang") {
echo '
	  
    <tr data-id="'.$row["id"].'" data-parent="'.$row["parent_id"].'" data-level="'.$row["level"].'">
	  <td data-column="name">'.$row["name"].'</td>
	  <td align="center">'.$row["type"].'</td>
	  <td align="center">'.$row["addr"].'</td>
	  	  	  <td></td>
	  	  <td></td>
	    <td></td>	
		  <td></td>	
	  </tr>
	  ';}
else  {
echo '
	  
    <tr data-id="'.$row["id"].'" data-parent="'.$row["parent_id"].'" data-level="'.$row["level"].'">
	  <td data-column="name">'.$row["name"].'</td>
	  <td align="center">'.$row["type"].'</td>
	  <td align="center">'.$row["addr"].'</td>
	  	  <td align="center">'.$row["kms"].'</td>
	    <td align="center">'.$row["tglrow"].'</td>
	    <td align="center">'.$row["kms_row"].'</td>
			<td align="center"><center><a data-target="#modRow" class="btn btn-success btn-circle" data-title="Lihat" data-toggle="modal" data-id="'.base64_encode(891234567*$row["id"]).'"><i class="fa fa-pencil" style="color:#fff"></i></a></center></td>	
	  </tr>
	  ';}	}  
	
             
              echo '</tbody>';
            echo '</table>';

			
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
          <small>Copyright &copy SiHD 2018</small>
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
	   
	   

	
		    <!-- Lihat Tier 1 Pengukuran Beban Modal-->

	    <div class="modal fade" id="modRow" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="lihatrow-data"> 
				
				</div>
      
            </div>
        </div>
    </div>
	
	
	<!-- Lihat Tier 1 Inspeksi Visual-->
	    <div class="modal fade" id="modViewt1b" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="lihatT1b-data"> 
				
				</div>
      
            </div>
        </div>
    </div>
	
		    <!-- Input Tier 1 Pengukuran Beban Modal-->
    	    <div class="modal fade" id="modInTier1a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="InTier1a-data"></div>
            </div>
        </div>
    </div>
	
	
			    <!-- Input Tier 1 Inspeksi Visual-->
    	    <div class="modal fade" id="modInTier1b" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="InTier1b-data"></div>
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
    <script src="../../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../../js/sb-admin-datatables.min.js"></script>
    <script src="../../js/modal.js"></script>
         <script src="../../js/jstree.js"></script>

         <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//../../js/analytics.js','ga');
            
            ga('create', 'UA-75591362-1', 'auto');
            ga('send', 'pageview');
            
         </script>
	
	<style>
body { background-color:#fafafa;}

    .treegrid-indent {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
    }

    .treegrid-expander {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
        left:-17px;
        cursor: pointer;
    }
</style>


	

  </div>

</body>
<style>
   form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
</style>
<script>						
   $(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type=""]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type=""],input[type=""]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type=""],input[type=""]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>	
		 <script>
        $(document).ready(function() {
         
            // Append a caption to the table before the DataTables initialisation
         
            $('#tree-table').DataTable();
        } );
    </script>
		
</html>
