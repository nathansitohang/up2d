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
      <title>SiHD / Rekap Data Padam</title>
      <!-- Bootstrap core CSS-->
      <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="../../css/sb-admin.css" rel="stylesheet">
	  <link href="../../css/button/buttons.dataTables.min.css" rel="stylesheet"> 
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
	  
	  <style>
	.radio-group label {
   overflow: hidden;
} .radio-group input {
    /* This is on purpose for accessibility. Using display: hidden is evil.
    This makes things keyboard friendly right out tha box! */
   height: 1px;
   width: 1px;
   position: absolute;
   top: -20px;
} .radio-group .not-active  {
   color: #3276b1;
   background-color: #fff;
}
</style>

   </head>
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
         <a class="navbar-brand" href="../#"><img src="..//../../img/sihd.png" alt="SiHD v.1.0" style="width:100px;height:30px;"></a>
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
                        <a href="../har">Entri Pemeliharaan</a>
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
                        <a href="#">Data Beban</a>
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
    
            <!-- Example DataTables Card-->
			
		 
		 
		 
		 
		 <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Cari Pemadaman</a>
                    </li>
                    <!--  <li class="breadcrumb-item active"></li>-->
                </ol>
				<div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-6">
                            <div class="card-header">
                                <i class="fa fa-search"></i> Data Pemadaman
                            </div>
                            <div class="card-body">
					<div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
        <div class="col-md-12"><div class="well">
            <form class="form-horizontal"><fieldset>
                <div class="form-group">
                      <div class="col-lg-11">			  
   <div class="input-group">		 
   <select class="form-control"  name="UP3" id="UP3">
    <option value="">- Pilih UI/UP -</option>
    <?php
    $query="SELECT DISTINCT idarea, area FROM user GROUP BY (idarea)";
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

    &nbsp;&nbsp;&nbsp;<img src="../../loading.gif" width="10px" height="10px" id="imgLoad" style="display:none">
    <br>
    <br><select class="form-control"  name="ULP" id="ULP">
	<option value="0">--Pilih ULP--</option>
	</select>
    <br>
    <br>
	</div>
	</div>
	    <div class="col-lg-12">			  
		<div class="input-group">
	   <input type="date" class="form-control" id="awal"  value="<?php echo date('Y-m-d'); ?>" min="" max="<?php echo date('Y-m-d'); ?>">
	   &nbsp;&nbsp;&nbsp;
	     <br>
			<br>
		<input type="date" class="form-control" id="akhir"  value="<?php echo date('Y-m-d'); ?>" min="" max="<?php echo date('Y-m-d'); ?>">
		
		
		<span class="input-group-btn">&nbsp;
        <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#viewggn"><i class="fa fa-search"></i></button>
		</span>
		</div>
			</div>
                    </div>
                </div>
            </fieldset>
           </form>
        </div>
    </div>
                  </div>
               </div>                            
			   </div>
                        </div>
						
						<div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-search"></i> FGTM
                            </div>
                            <div class="card-body">
					<div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                      <div class="row">
        <div class="col-md-12"><div class="well">
            <form class="form-horizontal"><fieldset>
                <div class="form-group">
                      <div class="col-md-12">
                        <div class="input-group">
						<select class="form-control"  name="UP3" id="UP3">
						<option value="">- Pilih Penyebab Gangguan -</option>
						<?php
						$query="SELECT DISTINCT fgtm FROM pemadaman2 where jenispadam =2 ORDER BY fgtm ASC";
						$result = mysqli_query($db, $query);
						if (!$result) {
											  die('Invalid query: ' . mysqli_error());
											}
									while ($row = @mysqli_fetch_array($result)){	
					   
						?>
						<option value="<?php echo $row["fgtm"] ?>"><?php echo $row["fgtm"] ?></option>
						<?php
						}
						?>
						</select>
						

						&nbsp;&nbsp;&nbsp;<img src="../../loading.gif" width="10px" height="10px" id="imgLoad" style="display:none">
						<br>
						<br>
			 
   
						<span class="input-group-btn">&nbsp;
						<button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#viewggn"><i class="fa fa-search"></i></button>
						</span>
						</div> 
                        </div>
                    </div>
                </div>
            </fieldset>
                        </form>
        </div>
		</div>
    </div>
                  </div>
               </div>                            
			   </div>
                        </div>
						
						
                    </div>
					<br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-map-marker"></i> Peta Titik Gangguan
                            </div>
                            <div class="card-body">
                                <div id="map" style="width:100%; height: 400px"></div>
                            </div>
                            <div class="card-footer small text-muted">&nbsp; </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-pie-chart"></i> Health Index Kualitas Minyak
                            </div>
                            <div class="card-body">
                                <canvas id="minyak" style="width:100%; height: 400px"></canvas>
                            </div>
                            <div class="card-footer small text-muted"><a href="#" class="badge badge-secondary float-right" data-toggle="modal" data-target="#modHI2a">more oil quality...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-pie-chart"></i> Health Index Thermovision
                            </div>
                            <div class="card-body">
                                <canvas id="thermo" style="width:100%; height: 400px"></canvas>
                            </div>
                            <div class="card-footer small text-muted"><a href="#" class="badge badge-secondary float-right" data-toggle="modal" data-target="#modHI2b">more thermovision...</a>
                            </div>
                        </div>
                    </div>
                    
					<div class="col-lg-6">
		
                        <!-- Example Pie Chart Card-->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-table"></i> Daftar Gangguan Bulan Ini (<?php echo date("F Y");?>)
                            </div>
                            <div class="card-body">
                  <div class="table-responsive">
                     <!-- Ini Isi Tabel-->			
                     <?php
						$no=1;					 
                        if ($login_role == "admin") {
                       $query="
					   SELECT
						  penyulang.no,
						  penyulang.feeder,
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
 
						  COUNT(pemadaman2.feeder) AS total
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder AND MONTH(pemadaman2.tanggalpadam) = month(now()) AND year(pemadaman2.tanggalpadam) = year(now()) 
WHERE penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp order by total desc";

                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
						
						
                        		
                        		
                         echo        
                         ' <table class="table" id="dataPadam" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        					<th>No</th>
                        					<th>Feeder</th>
                        					<th>PMT</th>											
                        					<th>UP3</th>
											<th>ULP</th>
											<th>Total</th>
                        			
                  
											
                                        </tr>
                                      </thead>
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
						
                         echo '  
                                                     <tr>
                        			<td>'.$no.' </td>																							 
							        <td>'.$row["feeder"].'</td> 
							        <td>'.$row["jns_cb"].'</td>																
							                    <td>'.$row["up3"].'</td> 
							                    <td>'.$row["ulp"].'</td> 
												<td>'.$row["total"].'</td> 
                        									 																
															
                          
                                                       </tr>  
                                                       '; $no++;	
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';}
                        
                        else if ($login_role == "area") {
                       $query="					   SELECT
  penyulang.no,
  penyulang.feeder,
  penyulang.up3,
  penyulang.ulp,
 
  COUNT(pemadaman2.feeder) AS total
FROM
  penyulang
LEFT JOIN pemadaman2 ON penyulang.feeder = pemadaman2.feeder

WHERE penyulang.idup3 = '$login_idarea'

GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp";
						
						
						
						
						
						
                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
						
						
                        		
                        		
                         echo        
                         ' <table class="table" id="dataPadam" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        					<th>No</th>
                        					<th>Feeder</th>
											<th>ULP</th>
											<th>Total</th>										
										
											
                                        </tr>
                                      </thead>
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
							  
							
							 
                         echo '  
                                                     <tr>
                        					<td>'.$no.' </td>																							 
							                        			<td>'.$row["feeder"].'</td> 
							                        			<td>'.$row["ulp"].'</td> 
																
							                        			<td>'.$row["total"].'</td> 															
															
                          
                                                       </tr>  
                                                       '; $no++;	
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';}		
                        
                        else if ($login_role == "rayon") {
      $query="					   SELECT
  penyulang.no,
  penyulang.feeder,
  penyulang.up3,
  penyulang.ulp,
 
  COUNT(pemadaman2.feeder) AS total
FROM
  penyulang
LEFT JOIN pemadaman2 ON penyulang.feeder = pemadaman2.feeder

WHERE penyulang.idulp = '$login_idrayon'

GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp";
                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
						
						
                        		
                        		
                         echo        
                                 
                         ' <table class="table" id="dataPadam" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        						<th>No</th>
                        					<th>Feeder</th>
											<th>Total</th>											
										
											
                                        </tr>
                                      </thead>
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
							  
							
							 
                         echo '  
                                                     <tr>
                        					<td>'.$no.' </td>																							 
                        	
							
                        									<td>'.$row["feeder"].'</td> 
															<td>'.$row["total"].'</td>  
                                                      														
															
                          
                                                       </tr>  
                                                       '; $no++;	
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';}
                        
                        		 	
                        		?>	
                  </div>
               </div>
                            <div class="card-footer small text-muted">&nbsp;</div>
                        </div>
                    </div>
					
					<div class="col-lg-6">
                        <!-- Example Pie Chart Card-->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-table"></i> Daftar Gangguan Bulan Lalu (<?php echo date('F Y', strtotime('last month')); ?>)
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!-- Ini Isi Tabel-->
                                    <?php
						$no=1;					 
                        if ($login_role == "admin") {
                       $query="
					   SELECT
						  penyulang.no,
						  penyulang.feeder,
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
 
						  COUNT(pemadaman2.feeder) AS total
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder AND MONTH(pemadaman2.tanggalpadam) = month(now())-1 AND year(pemadaman2.tanggalpadam) = year(now()) 
WHERE penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp order by total desc";

                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
						
						
                        		
                        		
                         echo        
                         ' <table class="table" id="dataPadam2" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        					<th>No</th>
                        					<th>Feeder</th>
                        					<th>PMT</th>											
                        					<th>UP3</th>
											<th>ULP</th>
											<th>Total</th>
                        			
                  
											
                                        </tr>
                                      </thead>
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
						
                         echo '  
                                                     <tr>
                        			<td>'.$no.' </td>																							 
							        <td>'.$row["feeder"].'</td> 
							        <td>'.$row["jns_cb"].'</td>																
							                    <td>'.$row["up3"].'</td> 
							                    <td>'.$row["ulp"].'</td> 
												<td>'.$row["total"].'</td> 
                        									 																
															
                          
                                                       </tr>  
                                                       '; $no++;	
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';}
                        
                        else if ($login_role == "area") {
                       $query="					   SELECT
  penyulang.no,
  penyulang.feeder,
  penyulang.up3,
  penyulang.ulp,
 
  COUNT(pemadaman2.feeder) AS total
FROM
  penyulang
LEFT JOIN pemadaman2 ON penyulang.feeder = pemadaman2.feeder

WHERE penyulang.idup3 = '$login_idarea'

GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp";
						
						
						
						
						
						
                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
						
						
                        		
                        		
                         echo        
                         ' <table class="table" id="dataPadam" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        					<th>No</th>
                        					<th>Feeder</th>
											<th>ULP</th>
											<th>Total</th>										
										
											
                                        </tr>
                                      </thead>
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
							  
							
							 
                         echo '  
                                                     <tr>
                        					<td>'.$no.' </td>																							 
							                        			<td>'.$row["feeder"].'</td> 
							                        			<td>'.$row["ulp"].'</td> 
																
							                        			<td>'.$row["total"].'</td> 															
															
                          
                                                       </tr>  
                                                       '; $no++;	
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';}		
                        
                        else if ($login_role == "rayon") {
      $query="					   SELECT
  penyulang.no,
  penyulang.feeder,
  penyulang.up3,
  penyulang.ulp,
 
  COUNT(pemadaman2.feeder) AS total
FROM
  penyulang
LEFT JOIN pemadaman2 ON penyulang.feeder = pemadaman2.feeder

WHERE penyulang.idulp = '$login_idrayon'

GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp";
                        $result = mysqli_query($db, $query);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
						
						
                        		
                        		
                         echo        
                                 
                         ' <table class="table" id="dataPadam" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                        						<th>No</th>
                        					<th>Feeder</th>
											<th>Total</th>											
										
											
                                        </tr>
                                      </thead>
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
							  
							
							 
                         echo '  
                                                     <tr>
                        					<td>'.$no.' </td>																							 
                        	
							
                        									<td>'.$row["feeder"].'</td> 
															<td>'.$row["total"].'</td>  
                                                      														
															
                          
                                                       </tr>  
                                                       '; $no++;	
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';}
                        
                        		 	
                        		?>	
                                </div>
                            </div>
                            <div class="card-footer small text-muted">&nbsp;</div>
                        </div>
                    </div>
					
                </div>
				
					
					</div>
            </div>
		 
		 
		 
		 
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
         <div class="modal fade" id="modView1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="lihat-data"> 
                  </div>
               </div>
            </div>
         </div>
         <!-- Edit Data Gardu Modal-->
         <div class="modal fade" id="modEdit" role="dialog">
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
		 
		          <div class="modal fade" id="viewggn" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="cariggn-data">
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
 
    $('#dataPadam').DataTable( {
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
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#dataPadamUpdate').DataTable, $('#dataPadam2').DataTable( {
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
	
	<script>
$(function() {
    // Input radio-group visual controls
    $('.radio-group label').on('click', function(){
        $(this).removeClass('not-active').siblings().addClass('not-active');
    });
});
</script>
<script>
   
    $("#UP3").change(function(){
   
        var id_UP3 = $("#UP3").val();
       
        $("#imgLoad").show("");
       
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "get_up3.php",
            data: "up3="+id_UP3,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data Kota');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#ULP").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>



      
      </div>
   </body>
</html>
