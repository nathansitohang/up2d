<?php
   include('../session.php');
   include('../config.php');
	$tahunini=date("Y");
 if ($login_role == "admin") { $result=mysqli_query($db, "SELECT count(*) as total 
									,SUM(hi_beban = 4) AS 'baik'
									,SUM(hi_beban = 3) AS 'cukup' 
									,SUM(hi_beban = 2) AS 'kurang'
									,SUM(hi_beban = 1) AS 'buruk'
									,SUM(hi_1b_oil = 4) AS 'bersih'
									,SUM(hi_1b_oil = 3) AS 'retak' 
									,SUM(hi_1b_oil = 2) AS 'minyak'
									,SUM(hi_1b_oil = 1) AS 'tetes' 
									,SUM(hi_1b_oil = 0) AS 'belum2'									
									,SUM((tgl1a_1 < DATE_SUB(now(), INTERVAL 6 MONTH) OR tgl1a_2 < DATE_SUB(now(), INTERVAL 6 MONTH))) AS 'belum'
									,SUM(hi_2b = 4) AS 'baik3'
									,SUM(hi_2b = 3) AS 'cukup3' 
									,SUM(hi_2b = 3) AS 'kurang3'
									,SUM(hi_2b = 1) AS 'buruk3' 
									,SUM(hi_2b = 0) AS 'belum3'
									,SUM(hi_beban = 2
OR hi_imbang =2
OR hi_netral =2
OR hi_arus =2
OR hi_1b_oil =2
OR hi_1b_fisik =2
OR hi_1b_phb =2
OR hi_ground =2
OR hi_2a_oil =2
OR hi_bdv =2
OR hi_2b =2
OR hi_2b_body =2
OR hi3a =2
OR hi3b =2
OR hi3c =2) AS 'kondisikurang'
								,SUM(hi_beban = 1
OR hi_imbang =1
OR hi_netral =1
OR hi_arus =1
OR hi_1b_oil =1
OR hi_1b_fisik =1
OR hi_1b_phb =1
OR hi_ground =1
OR hi_2a_oil =1
OR hi_bdv =1
OR hi_2b =1
OR hi_2b_body =1
OR hi3a =1
OR hi3b =1
OR hi3c =1) AS 'kondisiburuk'


									from master WHERE 1");
	 $result2=mysqli_query($db, "SELECT count(*) as total2 
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '1') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '1')) AS 'jan'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '2') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '2')) AS 'feb'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '3') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '3')) AS 'mar'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '4') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '4')) AS 'apr'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '5') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '5')) AS 'mei'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '6') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '6')) AS 'jun'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '7') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '7')) AS 'jul'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '8') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '8')) AS 'agu'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '9') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '9')) AS 'sep'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '10') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '10')) AS 'okt'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '11') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '11')) AS 'nop'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '12') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '12')) AS 'des'
									from t1a WHERE 1");							

	} 
   
  
      else if ($login_role == "area") { $result=mysqli_query($db, "SELECT count(*) as total 
									,SUM(hi_beban = 4) AS 'baik'
									,SUM(hi_beban = 3) AS 'cukup' 
									,SUM(hi_beban = 2) AS 'kurang'
									,SUM(hi_beban = 1) AS 'buruk' 
									,SUM(hi_1b_oil = 4) AS 'bersih'
									,SUM(hi_1b_oil = 3) AS 'retak' 
									,SUM(hi_1b_oil = 2) AS 'minyak'
									,SUM(hi_1b_oil = 1) AS 'tetes' 
									,SUM(hi_1b_oil = 0) AS 'belum2'										
									,SUM((tgl1a_1 < DATE_SUB(now(), INTERVAL 6 MONTH) OR tgl1a_2 < DATE_SUB(now(), INTERVAL 6 MONTH))) AS 'belum'
									,SUM(hi_2b = 4) AS 'baik3'
									,SUM(hi_2b = 3) AS 'cukup3' 
									,SUM(hi_2b = 3) AS 'kurang3'
									,SUM(hi_2b = 1) AS 'buruk3' 
									,SUM(hi_2b = 0) AS 'belum3'
									,SUM(hi_beban = 2
OR hi_imbang =2
OR hi_netral =2
OR hi_arus =2
OR hi_1b_oil =2
OR hi_1b_fisik =2
OR hi_1b_phb =2
OR hi_ground =2
OR hi_2a_oil =2
OR hi_bdv =2
OR hi_2b =2
OR hi_2b_body =2
OR hi3a =2
OR hi3b =2
OR hi3c =2) AS 'kondisikurang'
									,SUM(hi_beban = 1
OR hi_imbang =1
OR hi_netral =1
OR hi_arus =1
OR hi_1b_oil =1
OR hi_1b_fisik =1
OR hi_1b_phb =1
OR hi_ground =1
OR hi_2a_oil =1
OR hi_bdv =1
OR hi_2b =1
OR hi_2b_body =1
OR hi3a =1
OR hi3b =1
OR hi3c =1) AS 'kondisiburuk'


									from master WHERE idarea = '$login_idarea'");
 $result2=mysqli_query($db, "SELECT count(*) as total2 
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '1') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '1')) AS 'jan'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '2') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '2')) AS 'feb'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '3') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '3')) AS 'mar'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '4') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '4')) AS 'apr'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '5') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '5')) AS 'mei'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '6') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '6')) AS 'jun'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '7') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '7')) AS 'jul'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '8') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '8')) AS 'agu'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '9') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '9')) AS 'sep'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '10') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '10')) AS 'okt'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '11') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '11')) AS 'nop'
, SUM((YEAR(tgl1) = '$tahunini' AND MONTH(tgl1) = '12') OR (YEAR(tgl2) = '$tahunini' AND MONTH(tgl2) = '12')) AS 'des'
									from t1a WHERE idarea ='$login_idarea'");
	} 
	
   else { $result=mysqli_query($db, "SELECT SUM(type = 'Penyulang') AS 'jlh_feeder'									
									,SUM(tglrow < DATE_SUB(now(), INTERVAL 6 MONTH)) AS 'belum'
									from penyulang WHERE idrayon ='$login_idrayon'");
									
	} 
	    $data=mysqli_fetch_assoc($result);
    $jlh_feeder = $data['jlh_feeder'];
	$belum = $data['belum'];
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="../img/logo_pln.jpg">
      <title>SiHD / Dashboard Feeder</title>
      <!-- Bootstrap core CSS-->
      <link href="..//vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="..//vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="..//vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="..//css/sb-admin.css" rel="stylesheet">
	      <link href="../css/button/buttons.dataTables.min.css" rel="stylesheet">
	        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=  AIzaSyCpBB2tEvzRwu3n4sIHIeTcQUYNb_Sl3wM  " type="text/javascript"></script>

   </head>
   <body class="fixed-nav sticky-footer bg-dark" onload="load()" id="page-top">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
         <a class="navbar-brand" href="../"><img src="..//img/sihd.png" alt="SiHD v.1.0" style="width:100px;height:30px;"></a>
         <button href="#" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                  <a class="nav-link" href="../feeder">
                  <i class="fa fa-fw fa-dashboard"></i>
                  <span class="nav-link-text">Dashboard</span>
                  </a>
               </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master">
                  <a class="nav-link" href="../feeder/master_feeder">
                  <i class="fa fa-fw fa-folder"></i>
                  <span class="nav-link-text">Master Feeder</span>
                  </a>
               </li>
			   
			   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kuisioner SIMKP">
                  <a class="nav-link" href="../feeder/kuisioner">
                  <i class="fa fa-fw fa-folder"></i>
                  <span class="nav-link-text">Kuisioner</span>
                  </a>
               </li>
			   
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Assesment">
                  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#assesment" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-stethoscope"></i>
                  <span class="nav-link-text">Assesment</span>
                  </a>
                  <ul class="sidenav-second-level collapse" id="assesment">
                     <li>
                        <a href="tier1">Tier 1</a>
                     </li>
                     <li>
                        <a href="tier2">Tier 2</a>
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
                        <a href="cetak1">Tier 1</a>
                     </li>
                     <li>
                        <a href="cetak2">Tier 2</a>
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
                        <a href="hi1">Tier 1</a>
                     </li>
                     <li>
                        <a href="hi2">Tier 2</a>
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
                  <a href="#">Dashboard</a>
               </li>
               <!--  <li class="breadcrumb-item active"></li>-->
            </ol>
            <div class="row">
               <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card text-white bg-info o-hidden h-100">
                     <div class="card-body">
                        <div class="card-body-icon">
                           <i class="fa fa-fw fa-file"></i>
                        </div>
                        <div class="mr-5"><?php echo $jlh_feeder; ?> Jumlah Penyulang</div>
                     </div>
                     <a class="card-footer text-white clearfix small z-1" href="master_gardu">
                     <span class="float-left">Lihat Detail</span>
                     <span class="float-right">
                     <i class="fa fa-angle-right"></i>
                     </span>
                     </a>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card text-white bg-secondary o-hidden h-100">
                     <div class="card-body">
                        <div class="card-body-icon">
                           <i class="fa fa-fw fa-stethoscope"></i>
                        </div>
                        <div class="mr-5"><?php echo $belum; ?>  Lokasi Perlu Perintisan</div>
                     </div>
                     <a href="#" class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#modBelum">
                     <span class="float-left">Lihat Detail</span>
                     <span class="float-right">
                     <i class="fa fa-angle-right"></i>
                     </span>
                     </a>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card text-white bg-warning o-hidden h-100">
                     <div class="card-body">
                        <div class="card-body-icon">
                           <i class="fa fa-fw fa-fire"></i>
                        </div>
                        <div class="mr-5"><?php  ?>  Gardu Kurang Baik</div>
                     </div>
                     <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#modKurang">
                     <span class="float-left">Lihat Detail</span>
                     <span class="float-right">
                     <i class="fa fa-angle-right"></i>
                     </span>
                     </a>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card text-white bg-danger o-hidden h-100">
                     <div class="card-body">
                        <div class="card-body-icon">
                           <i class="fa fa-fw fa-wrench"></i>
                        </div>
                        <div class="mr-5"><?php  ?>  Gardu Segera Perbaiki</div>
                     </div>
                     <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#modSegera">
                     <span class="float-left">Lihat Detail</span>
                     <span class="float-right">
                     <i class="fa fa-angle-right"></i>
                     </span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-8">
                  <!-- Area Chart Example-->
                  <div class="card mb-3">
                     <div class="card-header">
                        <i class="fa fa-map-marker"></i> Peta Gardu Pembebanan Trafo
                     </div>
                     <div class="card-body">
                        <div id="map" style="width:100%; height: 410px"></div>
                     </div>
                     <div class="card-footer small text-muted">&nbsp</div>
                  </div>
                  <!-- Example Bar Chart Card-->
                  <div class="card mb-3">
                     <div class="card-header">
                        <i class="fa fa-bar-chart"></i> Jumlah Pengukuran Beban Gardu Bulanan
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-sm-8 my-auto">
                              <canvas id="ukurbulanan" width="100" height="50"></canvas>
                           </div>
                           <div class="col-sm-4 text-center my-auto">
                              <div class="h4 mb-0 text-primary"><?php echo $tw1; ?> Gardu</div>
                              <div class="small text-muted">Triwulan 1 - <?php echo $tahunini; ?>  </div>
                              <hr>
                              <div class="h4 mb-0 text-warning"><?php echo $tw2; ?> Gardu</div>
                              <div class="small text-muted">Triwulan 2 - <?php echo $tahunini; ?>  </div>
                              <hr>
                              <div class="h4 mb-0 text-success"><?php echo $tw3; ?> Gardu</div>
                              <div class="small text-muted">Triwulan 3 - <?php echo $tahunini; ?>  </div>
								<hr>
                              <div class="h4 mb-0 text-danger"><?php echo $tw4; ?> Gardu</div>
                              <div class="small text-muted">Triwulan 4 - <?php echo $tahunini; ?>  </div>                           
							  </div>
                        </div>
                     </div>
                     <div class="card-footer small text-muted">&nbsp</div>
                  </div>
                  <!-- Card Columns Example Social Feed-->
                  <div class="mb-0 mt-4">
                     <i class="fa fa-table"></i> Data Gardu 
                  </div>
                  <hr class="mt-2">
                  <!-- Example DataTables Card-->
                  <div class="card mb-3">
                     <div class="card-header">
                        <i class="fa fa-user"></i>&nbsp&nbsp<?php echo $login_session; ?>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <!-- Ini Isi Tabel-->			
                           <?php
							  $no=1;						   
                              if ($login_role == "admin") {
                              $query="SELECT*
                              FROM master WHERE 1 ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysql_error());
                              }
                               
                              		
                              		
                               echo        
                               ' <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Area</th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kapasitas</th>
                              					<th>Fasa</th>
                              
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr>
												<th> No. </th>
                              					<th>Area</th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kapasitas</th>
                              					<th>Fasa</th>
                              
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
                               echo '  
                                                           <tr>  
														   <td> '.$no.' </td>
                              									<td>'.$row["area"].'</td>  
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td>'.$row["kapasitas"].'</td>  
                                                                  <td>'.$row["fasa"].'</td>  
                                
                                                             </tr>  
                                                             ';	 $no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              else if ($login_role == "area") {
                              $query="SELECT*
                              FROM master WHERE idarea ='$login_idarea' ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                              		
                               echo        
                               ' <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kapasitas</th>
                              					<th>Fasa</th>
                              
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr>
											  	<th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kapasitas</th>
                              					<th>Fasa</th>
                              
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
                               echo '  
                                                           <tr>  
														   <td>'.$no.'</td>
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td>'.$row["kapasitas"].'</td>  
                                                                  <td>'.$row["fasa"].'</td>  
                              	
                                                             </tr>  
                                                             ';	$no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}		
                              
                              else if ($login_role == "rayon") {
                              $query="SELECT*
                              FROM master WHERE idrayon ='$login_idrayon' ORDER by kodegd" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                              		
                               echo        
                               ' <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kapasitas</th>
                              					<th>Fasa</th>
                              
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kapasitas</th>
                              					<th>Fasa</th>
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
                               echo '  
                                                           <tr>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td>'.$row["kapasitas"].'</td>  
                                                                  <td>'.$row["fasa"].'</td>  
                                                             </tr>  
                                                             ';	
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              			
                              		?>		
                        </div>
                     </div>
                     <div class="card-footer small text-muted">&nbsp</div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <!-- Example Pie Chart Card-->
                  <div class="card mb-3">
                     <div class="card-header">
                        <i class="fa fa-pie-chart"></i> Health Index Pembebanan Trafo
                     </div>
					 <div class="card-body">
					   <canvas id="beban" style="width:100%; height: 300px"></canvas>
                     </div>
                     <div class="card-footer small text-muted">&nbsp</div>
                  </div>
                  <!-- Example Notifications Card-->
                  <div class="card mb-3">
                     <div class="card-header">
                        <i class="fa fa-pie-chart"></i> Health Index Kebocoran Minyak Trafo
                     </div>
					 <div class="card-body">
					   <canvas id="minyak" style="width:100%; height: 300px"></canvas>
                     </div>
                     <div class="card-footer small text-muted">&nbsp</div>
                  </div>
                  <div class="card mb-3">
                     <div class="card-header">
                        <i class="fa fa-pie-chart"></i> Health Index Thermovision
                     </div>
					 <div class="card-body">
					   <canvas id="thermo" style="width:100%; height: 300px"></canvas>
                     </div>
                     <div class="card-footer small text-muted">&nbsp</div>
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
                                 <td><i><?php echo $login_last; ?></i></td>
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
                  <h5 class="modal-title" id="exampleModalLabel"><i class= "fa fa-power-off " ></i>   Keluar dari SiHD</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                  </button>
               </div>
               <div class="modal-body">Tekan tombol "Logout" untuk mengakhiri sesi ini!</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="../logout.php">Logout</a>
               </div>
            </div>
         </div>
      </div>
	  
	  
	  
	  
	  
<div class="modal fade" id="modBelum">
  <div class="modal-dialog modal-lg">      
               <div class="modal-content">
               <div class="card-header">
                  <a class="modal-title" id="exampleModalLabel"><i class= "fa  fa-stethoscope" ></i>  Daftar Gardu Belum Diukur > 6 Bulan<a>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                  </button></div>
				  <div class="modal-body">
                        <div class="table-responsive">
                           <!-- Ini Isi Tabel-->			
                           <?php
							  $no=1;						   
                              if ($login_role == "admin") {
                              $query="SELECT*
                               FROM master WHERE (tgl1a_1 < DATE_SUB(now(), INTERVAL 6 MONTH) OR tgl1a_2 < DATE_SUB(now(), INTERVAL 6 MONTH)) ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysql_error());
                              }
                               
                              		
                              		
                               echo        
                               ' <table class="table" id="belum"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
											  <th> No. </th>
                              					<th>Area</th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
												<th>LWBP</th>
                              					<th>WBP</th>	
                              
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr align="center">
												<th> No. </th>
                              					<th>Area</th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
												<th>LWBP</th>
                              					<th>WBP</th>	
                              
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								if ($row["tgl1a_1"] <= '2017-01-01'){$row["tgl1a_1"]='-';} else {$row["tgl1a_1"]=$row["tgl1a_1"];}
								if ($row["tgl1a_2"] <= '2017-01-01'){$row["tgl1a_2"]='-';} else {$row["tgl1a_2"]=$row["tgl1a_2"];}
                               echo '  
                                                           <tr>  
														   <td> '.$no.' </td>
                              									<td>'.$row["area"].'</td>  
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  
																	<td align=center>'.$row["tgl1a_1"].'</td>  	
																	<td align=center>'.$row["tgl1a_2"].'</td>  		
                                
                                                             </tr>  
                                                             ';	 $no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              else if ($login_role == "area") {
                              $query="SELECT*
                              FROM master WHERE (tgl1a_1 < DATE_SUB(now(), INTERVAL 6 MONTH) OR tgl1a_2 < DATE_SUB(now(), INTERVAL 6 MONTH)) AND idarea ='$login_idarea' ORDER by idrayon" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                              		
                               echo        
                               ' <table class="table" id="belum"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
												<th>LWBP</th>
                              					<th>WBP</th>	
                              
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr align="center">
											  	<th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
												<th>LWBP</th>
                              					<th>WBP</th>	
                              
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								if ($row["tgl1a_1"] <= '2017-01-01'){$row["tgl1a_1"]='-';} else {$row["tgl1a_1"]=$row["tgl1a_1"];}
								if ($row["tgl1a_2"] <= '2017-01-01'){$row["tgl1a_2"]='-';} else {$row["tgl1a_2"]=$row["tgl1a_2"];}                               echo '  
                                                           <tr>  
														   <td>'.$no.'</td>
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  
																	<td align=center>'.$row["tgl1a_1"].'</td>  	
																	<td align=center>'.$row["tgl1a_2"].'</td>  		
                              	
                                                             </tr>  
                                                             ';	$no++;
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}		
                              
                              else if ($login_role == "rayon") {
                              $query="SELECT*
                              FROM master WHERE (tgl1a_1 < DATE_SUB(now(), INTERVAL 6 MONTH) OR tgl1a_2 < DATE_SUB(now(), INTERVAL 6 MONTH)) AND idrayon ='$login_idrayon' ORDER by kodegd" ;
                              $result = mysqli_query($db, $query);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error());
                              }
                              		
                              		
                               echo        
                               ' <table class="table" id="belum"  width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
                              					<th>LWBP</th>
                              					<th>WBP</th>												
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr align="center">
                              					<th>Kode Gardu</th>
                              					<th>Alamat</th>
                              					<th>Kap/Fasa</th>
												<th>LWBP</th>
                              					<th>WBP</th>	
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								if ($row["tgl1a_1"] <= '2017-01-01'){$row["tgl1a_1"]='-';} else {$row["tgl1a_1"]=$row["tgl1a_1"];}
								if ($row["tgl1a_2"] <= '2017-01-01'){$row["tgl1a_2"]='-';} else {$row["tgl1a_2"]=$row["tgl1a_2"];}								
                               echo '  
                                                           <tr>  
                              									<td align=center>'.$row["kodegd"].'</td>  
                                                                  <td>'.$row["alamat"].'</td>  
                                                                  <td align=center>'.$row["kapasitas"].'/'.$row["fasa"].'</td>  
																	<td align=center>'.$row["tgl1a_1"].'</td>  	
																	<td align=center>'.$row["tgl1a_2"].'</td>  																
                                                             </tr>  
                                                             ';	
                              	}
                              	
                                           
                                            echo '</tbody>';
                                          echo '</table>';}
                              
                              			
                              		?>		
                        </div>
                     </div>
					 <div class="card-footer">&nbsp;</div>
</div>
</div>
</div>

	<!-- Lihat Data Gardu Kondisi Kurang-->
	    <div class="modal fade" id="modKurang" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="kurang-data"> 
				
				</div>
      
            </div>
        </div>
    </div>

		<!-- Lihat Data Gardu Kondisi Buruk-->
	    <div class="modal fade" id="modSegera" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="buruk-data"> 
				
				</div>
      
            </div>
        </div>
    </div>
      <!-- Bootstrap core JavaScript-->
      <script src="..//vendor/jquery/jquery.min.js"></script>
      <script src="..//vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="..//vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="..//vendor/datatables/jquery.dataTables.js"></script>
      <script src="..//vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="..//js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="..//js/sb-admin-datatables.min.js"></script>
      <script src="..//js/modal.js"></script>
      <script src="../js/dashboard_gd.js" type="text/javascript"></script>
	      <!-- Page level plugin JavaScript-->
    <script src="..//vendor/chart.js/Chart.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="..//js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="..//js/sb-admin-charts.min.js"></script>
	   <script src="../js/button/dataTables.buttons.min.js"></script>
    <script src="../js/button/jszip.min.js"></script>
    <script src="../js/button/pdfmake.min.js"></script>
    <script src="../js/button/vfs_fonts.js"></script>
    <script src="../js/button/buttons.html5.min.js"></script>
    <script src="../js/button/buttons.print.min.js"></script>
	<script src="../js/button/buttons.colVis.min.js"></script> 
	<script src="../js/markerclusterer.js"></script> 
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
	  
	   <script type="text/javascript">
     var data = {
  labels: [
    "Baik",
    "Cukup",
    "Kurang",
    "Buruk",
	"Belum"
  ],
  datasets: [
    {
      data: [<?php echo json_encode($baik); ?>, <?php echo json_encode($cukup); ?>, <?php echo json_encode($kurang); ?>, <?php echo json_encode($buruk); ?>, <?php echo json_encode($belum); ?>],
      backgroundColor: [
        "#0288D1",//blue
        "#7CB342",//green
        "#FFFF00",//yellow
		"#FF5252",//red
        "#635050"

      ],
      hoverBackgroundColor: [
       "#028899",
        "#7C9942",
        "#FFDD22",
		"#CC5252",
        "#634050"
      ]
    }]
};

var promisedDeliveryChart = new Chart(document.getElementById('beban'), {
  type: 'doughnut',
  data: data,
  options: {
  	responsive: true,
    legend: {
      display: true
    }
  }
});


    </script>
	   <script type="text/javascript">
     var data = {
  labels: [
                "Bersih",
                "Packing Retak",
                "Retak dan Berminyak",
                "Tetes",
            	"Belum"
  ],
  datasets: [
    {
      data: [<?php echo json_encode($baik2); ?>, <?php echo json_encode($cukup2); ?>, <?php echo json_encode($kurang2); ?>, <?php echo json_encode($buruk2); ?>, <?php echo json_encode($belum2); ?>],
      backgroundColor: [
        "#0288D1",//blue
        "#7CB342",//green
        "#FFFF00",//yellow
		"#FF5252",//red
        "#635050"

      ],
      hoverBackgroundColor: [
       "#028899",
        "#7C9942",
        "#FFDD22",
		"#CC5252",
        "#634050"
      ]
    }]
};

var promisedDeliveryChart = new Chart(document.getElementById('minyak'), {
  type: 'doughnut',
  data: data,
  options: {
  	responsive: true,
    legend: {
      display: true
    }
  }
});


    </script>
 <script type="text/javascript">
     var data = {
  labels: [
    "Baik",
    "Cukup",
    "Kurang",
    "Buruk",
	"Belum"
  ],
  datasets: [
    {
      data: [<?php echo json_encode($baik3); ?>, <?php echo json_encode($cukup3); ?>, <?php echo json_encode($kurang3); ?>, <?php echo json_encode($buruk3); ?>, <?php echo json_encode($belum3); ?>],
      backgroundColor: [
        "#0288D1",//blue
        "#7CB342",//green
        "#FFFF00",//yellow
		"#FF5252",//red
        "#635050"

      ],
      hoverBackgroundColor: [
       "#028899",
        "#7C9942",
        "#FFDD22",
		"#CC5252",
        "#634050"
      ]
    }]
};

var promisedDeliveryChart = new Chart(document.getElementById('thermo'), {
  type: 'doughnut',
  data: data,
  options: {
  	responsive: true,
    legend: {
      display: true
    }
  }
});


    </script>

<script>
var bulananCanvas = document.getElementById("ukurbulanan");

var densityData = {
  label: 'unit',
  data: [<?php echo json_encode($jan); ?>, <?php echo json_encode($feb); ?>, <?php echo json_encode($mar); ?>, <?php echo json_encode($apr); ?>, <?php echo json_encode($mei); ?>, <?php echo json_encode($jun); ?>, <?php echo json_encode($jul); ?>, <?php echo json_encode($agu); ?>,<?php echo json_encode($sep); ?>, <?php echo json_encode($okt); ?>,<?php echo json_encode($nop); ?>, <?php echo json_encode($des); ?>],
  borderWidth: 0,
   backgroundColor: ["#0288D1","#0288D1","#0288D1","#ffc100","#ffc100","#ffc100","#7CB342","#7CB342","#7CB342","#FF5252","#FF5252","#FF5252"],

};

var bulanData = {
  labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nop", "Des"],
  datasets: [densityData],
};
var options = {
    scales: {
        yAxes: [{
            ticks: {
                fontSize: 16
            }
        }]
    },
	        scaleSteps : 1
};

var barChart = new Chart(bulananCanvas, {
  type: 'bar',
  data: bulanData,
  options: options

});
	</script>
	
	
	<script> 
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#belum').DataTable( {
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

	<script>
	$('.datatable').DataTable()
	</script>
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
      </div>
   </body>
</html>
