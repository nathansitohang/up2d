<?php
   include('../../session.php');
   include('../../config.php');
   
      if ($login_role == "admin") { $result=mysqli_query($db, "SELECT count(*) as total 
									,SUM(hi_2a_oil = 4) AS 'baik'
									,SUM(hi_2a_oil = 3) AS 'cukup' 
									,SUM(hi_2a_oil = 2) AS 'kurang'
									,SUM(hi_2a_oil = 1) AS 'buruk' 
									,SUM(hi_2a_oil = 0) AS 'belum'
									,SUM(hi_bdv = 4) AS 'baik2'
									,SUM(hi_bdv = 3) AS 'cukup2' 
									,SUM(hi_bdv = 2) AS 'kurang2'
									,SUM(hi_bdv = 1) AS 'buruk2' 
									,SUM(hi_bdv = 0) AS 'belum2'
									,SUM(hi_2b = 4) AS 'baik3'
									,SUM(hi_2b = 3) AS 'cukup3' 
									,SUM(hi_2b = 3) AS 'kurang3'
									,SUM(hi_2b = 1) AS 'buruk3' 
									,SUM(hi_2b = 0) AS 'belum3'
									,SUM(hi_2b_body = 4) AS 'baik4'
									,SUM(hi_2b_body = 3) AS 'cukup4' 
									,SUM(hi_2b_body = 2) AS 'kurang4'
									,SUM(hi_2b_body = 1) AS 'buruk4' 
									,SUM(hi_2b_body = 0) AS 'belum4'								
									from master WHERE 1");
    $data=mysqli_fetch_assoc($result);
    $totgd = $data['total'];
	$baik = $data['baik'];
    $cukup = $data['cukup'];
	$kurang = $data['kurang'];
    $buruk = $data['buruk'];
	$belum = $data['belum'];
	$baik2 = $data['baik2'];
    $cukup2 = $data['cukup2'];
	$kurang2 = $data['kurang2'];
    $buruk2 = $data['buruk2'];
	$belum2 = $data['belum2'];
	$baik3 = $data['baik3'];
    $cukup3 = $data['cukup3'];
	$kurang3 = $data['kurang3'];
    $buruk3 = $data['buruk3'];
	$belum3 = $data['belum3'];
	$baik4 = $data['baik4'];
    $cukup4 = $data['cukup4'];
	$kurang4 = $data['kurang4'];
    $buruk4 = $data['buruk4'];
	$belum4 = $data['belum4'];
	} 
      else if ($login_role == "area") { $result=mysqli_query($db, "SELECT count(*) as total 
									,SUM(hi_2a_oil = 4) AS 'baik'
									,SUM(hi_2a_oil = 3) AS 'cukup' 
									,SUM(hi_2a_oil = 2) AS 'kurang'
									,SUM(hi_2a_oil = 1) AS 'buruk' 
									,SUM(hi_2a_oil = 0) AS 'belum'
									,SUM(hi_bdv = 4) AS 'baik2'
									,SUM(hi_bdv = 3) AS 'cukup2' 
									,SUM(hi_bdv = 2) AS 'kurang2'
									,SUM(hi_bdv = 1) AS 'buruk2' 
									,SUM(hi_bdv = 0) AS 'belum2'
									,SUM(hi_2b = 4) AS 'baik3'
									,SUM(hi_2b = 3) AS 'cukup3' 
									,SUM(hi_2b = 3) AS 'kurang3'
									,SUM(hi_2b = 1) AS 'buruk3' 
									,SUM(hi_2b = 0) AS 'belum3'
									,SUM(hi_2b_body = 4) AS 'baik4'
									,SUM(hi_2b_body = 3) AS 'cukup4' 
									,SUM(hi_2b_body = 2) AS 'kurang4'
									,SUM(hi_2b_body = 1) AS 'buruk4' 
									,SUM(hi_2b_body = 0) AS 'belum4'										
									from master WHERE idarea = '$login_idarea'");
    $data=mysqli_fetch_assoc($result);
    $totgd = $data['total'];
	$baik = $data['baik'];
    $cukup = $data['cukup'];
	$kurang = $data['kurang'];
    $buruk = $data['buruk'];
	$belum = $data['belum'];
	$baik2 = $data['baik2'];
    $cukup2 = $data['cukup2'];
	$kurang2 = $data['kurang2'];
    $buruk2 = $data['buruk2'];
	$belum2 = $data['belum2'];
	$baik3 = $data['baik3'];
    $cukup3 = $data['cukup3'];
	$kurang3 = $data['kurang3'];
    $buruk3 = $data['buruk3'];
	$belum3 = $data['belum3'];
	$baik4 = $data['baik4'];
    $cukup4 = $data['cukup4'];
	$kurang4 = $data['kurang4'];
    $buruk4 = $data['buruk4'];
	$belum4 = $data['belum4'];
	} 
	
   else { $result=mysqli_query($db, "SELECT count(*) as total 
									,SUM(hi_2a_oil = 4) AS 'baik'
									,SUM(hi_2a_oil = 3) AS 'cukup' 
									,SUM(hi_2a_oil = 2) AS 'kurang'
									,SUM(hi_2a_oil = 1) AS 'buruk' 
									,SUM(hi_2a_oil = 0) AS 'belum'
									,SUM(hi_bdv = 4) AS 'baik2'
									,SUM(hi_bdv = 3) AS 'cukup2' 
									,SUM(hi_bdv = 2) AS 'kurang2'
									,SUM(hi_bdv = 1) AS 'buruk2' 
									,SUM(hi_bdv = 0) AS 'belum2'
									,SUM(hi_2b = 4) AS 'baik3'
									,SUM(hi_2b = 3) AS 'cukup3' 
									,SUM(hi_2b = 3) AS 'kurang3'
									,SUM(hi_2b = 1) AS 'buruk3' 
									,SUM(hi_2b = 0) AS 'belum3'
									,SUM(hi_2b_body = 4) AS 'baik4'
									,SUM(hi_2b_body = 3) AS 'cukup4' 
									,SUM(hi_2b_body = 2) AS 'kurang4'
									,SUM(hi_2b_body = 1) AS 'buruk4' 
									,SUM(hi_2b_body = 0) AS 'belum4'									
									from master WHERE idrayon ='$login_idrayon'");
    $data=mysqli_fetch_assoc($result);
    $totgd = $data['total'];
	$baik = $data['baik'];
    $cukup = $data['cukup'];
	$kurang = $data['kurang'];
    $buruk = $data['buruk'];
	$belum = $data['belum'];
	$baik2 = $data['baik2'];
    $cukup2 = $data['cukup2'];
	$kurang2 = $data['kurang2'];
    $buruk2 = $data['buruk2'];
	$belum2 = $data['belum2'];
	$baik3 = $data['baik3'];
    $cukup3 = $data['cukup3'];
	$kurang3 = $data['kurang3'];
    $buruk3 = $data['buruk3'];
	$belum3 = $data['belum3'];	
	$baik4 = $data['baik4'];
    $cukup4 = $data['cukup4'];
	$kurang4 = $data['kurang4'];
    $buruk4 = $data['buruk4'];
	$belum4 = $data['belum4'];
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
        <title>SiHD / Health Index TM</title>
        <!-- Bootstrap core CSS-->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="../../css/sb-admin.css" rel="stylesheet">
        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=  AIzaSyCpBB2tEvzRwu3n4sIHIeTcQUYNb_Sl3wM  " type="text/javascript"></script>
        <script type="text/javascript" src="../../js/loader.js"></script>
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
        <link href="../../css/button/buttons.dataTables.min.css" rel="stylesheet">



    </head>

    <body class="fixed-nav sticky-footer bg-dark" onload="load()" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="../../"><img src="../../img/sihd.png" alt="SiHD v.1.0" style="width:100px;height:30px;"></a>
            <button href="#" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="../../feeder">
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
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#assesment" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-stethoscope"></i>
                  <span class="nav-link-text">Assesment</span>
                  </a>
                        <ul class="sidenav-second-level collapse" id="assesment">
                            <li>
                                <a href="../tier1">Tier 1</a>
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
                        <a href="#">Tier 2</a>
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
                            <a class="dropdown-item" data-toggle="modal" data-target="#modUserProf">
                     <span class="text-success">
                     <strong>
                     <i class="fa fa-fw fa-user"></i>User Profile</strong>
                     </span>
                     </a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#modChangePw">
                     <span class="text-danger">
                     <strong>
                     <i class="fa fa-fw fa-gear"></i>Ubah Password</strong>
                     </span>
                     </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#modLogout">
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
                        <a href="#">Health Index</a>
                    </li>
                    <!--  <li class="breadcrumb-item active"></li>-->
                </ol>
				<div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-search"></i> Cari Health Index
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
                            <div class="btn-group radio-group">
                               <label class="btn btn-primary not-active">Oil Colour <input type="radio" value="1" name="tier2"></label>
                               <label class="btn btn-primary not-active">BdV <input type="radio" value="2" name="tier2"></label>
                                <label class="btn btn-primary not-active">Body Trafo <input type="radio" value="3" name="tier2"></label>
                               <label class="btn btn-primary not-active">Suhu Komponen <input type="radio" value="4" name="tier2"></label>
                           </div>&nbsp;
							<select class="form-control" id="tier2">
                           <option value="4">Baik</option>
                           <option value="3">Cukup</option>
                           <option value="2">Kurang</option>
                           <option value="1">Buruk</option>
                        </select>   <span class="input-group-btn">&nbsp;
        <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#findHI2"><i class="fa fa-search"></i></button>
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
						
						<div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-search"></i> Belum Assesment
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
                            <div class="btn-group radio-group">
                               <label class="btn btn-primary not-active">Oil Quality <input type="radio" value="1" name="tier2a"></label>
                               <label class="btn btn-primary not-active">Thermovision <input type="radio" value="2" name="tier2a"></label>
                           </div>&nbsp;
                     <div class="col-lg-3"><input type="text" class="form-control " placeholder="> ... bulan" maxlength="2" width="2px" id="bln" onkeypress="return isNumber(event)"></div>
						<span class="input-group-btn">&nbsp;
        <button class="btn btn-primary" data-toggle="modal" data-target="#findAss2" type="button"><i class="fa fa-search"></i></button>
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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-map-marker"></i> Peta Hasil Thermovision Komponen Gardu
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
                                <i class="fa fa-table"></i> Daftar Tier 2 - Uji Kualitas Minyak
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
                                '<table class="table" id="tabel2" width="100%" cellspacing="0">
                                            <thead>
                                              <tr  align="center">
											  <th>No. </th>
													<th>Area</th>
                              					<th>Rayon</th>
												 <th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
                              					<th>Warna Minyak</th>
                              					<th>BdV</th>
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr  align="center">
											  <th>No. </th>
													<th>Area</th>
                              					<th>Rayon</th>
												  <th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
                              					<th>Warna Minyak</th>
                              					<th>BdV</th>
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_2a_oil = $row["hi_2a_oil"];
								if($hi_2a_oil == 4){$hi_2a_oil = 'Baik';}
								else if($hi_2a_oil == 3){$hi_2a_oil = 'Cukup';}
								else if($hi_2a_oil == 2){$hi_2a_oil = 'Kurang';}
								else if($hi_2a_oil == 1){$hi_2a_oil = 'Buruk';}
								else {$hi_2a_oil = '-';}


								$hi_bdv = $row["hi_bdv"];
								if($hi_bdv == 4){$hi_bdv = 'Baik';}
								else if($hi_bdv == 3){$hi_bdv = 'Cukup';}
								else if($hi_bdv == 2){$hi_bdv = 'Kurang';}
								else if($hi_bdv == 1){$hi_bdv = 'Buruk';}
								else {$hi_bdv = '-';}
								
								
								$hi_1b_phb = $row["hi_1b_phb"];
								if($hi_1b_phb== 4){$hi_1b_phb = 'Baik';}
								else if($hi_1b_phb == 3){$hi_1b_phb = 'Cukup';}
								else if($hi_1b_phb == 2){$hi_1b_phb = 'Kurang';}
								else if($hi_1b_phb == 1){$hi_1b_phb = 'Buruk';}
								else {$hi_1b_phb = '-';}
								
								$maxi_1 = $row["maxi_1"];
								$maxi_2 = $row["maxi_2"];
								$maxi= max($maxi_1,$maxi_2);
								$hi_arus = $row["hi_arus"];
								
								$hi_ground = $row["hi_ground"];								
								if($hi_ground== 4){$hi_ground = 'Baik';}
								else if($hi_ground == 3){$hi_ground = 'Cukup';}
								else if($hi_ground == 2){$hi_ground = 'Kurang';}
								else if($hi_ground == 1){$hi_ground = 'Buruk';}
								else {$hi_ground = '-';}
                               echo '  
                                                           <tr  align="center" >  
														   <td> '.$no.' </td>
                              									<td>'.$row["area"].'</td>  
                              									<td>'.$row["rayon"].'</td>  
                              									<td>'.$row["kodegd"].'</a></td>    
                                                                  <td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet2">'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                  <td>'.$hi_2a_oil.'</td>  
                                                                  <td>'.$hi_bdv.'</td>
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
                               ' <table class="table" id="tabel2" width="100%" cellspacing="0">
                                            <thead>
                                              <tr  align="center">
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
												<th>Kapasitas/Fasa</th>
                              					<th>Warna Minyak</th>
                              					<th>BdV</th>											
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr  align="center">
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
												<th>Kapasitas/Fasa</th>
                              					<th>Warna Minyak</th>
                              					<th>BdV</th>                                            
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_2a_oil = $row["hi_2a_oil"];
								if($hi_2a_oil == 4){$hi_2a_oil = 'Baik';}
								else if($hi_2a_oil == 3){$hi_2a_oil = 'Cukup';}
								else if($hi_2a_oil == 2){$hi_2a_oil = 'Kurang';}
								else if($hi_2a_oil == 1){$hi_2a_oil = 'Buruk';}
								else {$hi_2a_oil = '-';}

								$hi_bdv = $row["hi_bdv"];
								if($hi_bdv == 4){$hi_bdv = 'Baik';}
								else if($hi_bdv == 3){$hi_bdv = 'Cukup';}
								else if($hi_bdv == 2){$hi_bdv = 'Kurang';}
								else if($hi_bdv == 1){$hi_bdv = 'Buruk';}
								else {$hi_bdv = '-';}
								
								$hi_1b_phb = $row["hi_1b_phb"];
								if($hi_1b_phb== 4){$hi_1b_phb = 'Baik';}
								else if($hi_1b_phb == 3){$hi_1b_phb = 'Cukup';}
								else if($hi_1b_phb == 2){$hi_1b_phb = 'Kurang';}
								else if($hi_1b_phb == 1){$hi_1b_phb = 'Buruk';}
								else {$hi_1b_phb = '-';}
																						
								$hi_ground = $row["hi_ground"];
								if($hi_ground== 4){$hi_ground = 'Baik';}
								else if($hi_ground == 3){$hi_ground = 'Cukup';}
								else if($hi_ground == 2){$hi_ground = 'Kurang';}
								else if($hi_ground == 1){$hi_ground = 'Buruk';}
								else {$hi_ground = '-';}
                               echo '  
                                                           <tr align="center">  
														   <td>'.$no.'</td>
                              									<td>'.$row["rayon"].'</td>  
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet2">'.$row["kodegd"].'</a></td>  
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                 <td>'.$hi_2a_oil.'</td>  
                                                                  <td>'.$hi_bdv.'</td>                    	
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
                               ' 
                                <table class="table" id="tabel2" width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
                              					<th>Warna Minyak</th>
                              					<th>BdV</th>											
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_2a_oil = $row["hi_2a_oil"];
								if($hi_2a_oil == 4){$hi_2a_oil = 'Baik';}
								else if($hi_2a_oil == 3){$hi_2a_oil = 'Cukup';}
								else if($hi_2a_oil == 2){$hi_2a_oil = 'Kurang';}
								else if($hi_2a_oil == 1){$hi_2a_oil = 'Buruk';}
								else {$hi_2a_oil = '-';}


								$hi_bdv = $row["hi_bdv"];
								if($hi_bdv == 4){$hi_bdv = 'Baik';}
								else if($hi_bdv == 3){$hi_bdv = 'Cukup';}
								else if($hi_bdv == 2){$hi_bdv = 'Kurang';}
								else if($hi_bdv == 1){$hi_bdv = 'Buruk';}
								else {$hi_bdv = '-';}
								
								
								$hi_1b_phb = $row["hi_1b_phb"];
								if($hi_1b_phb== 4){$hi_1b_phb = 'Baik';}
								else if($hi_1b_phb == 3){$hi_1b_phb = 'Cukup';}
								else if($hi_1b_phb == 2){$hi_1b_phb = 'Kurang';}
								else if($hi_1b_phb == 1){$hi_1b_phb = 'Buruk';}
								else {$hi_1b_phb = '-';}
								

								$hi_ground = $row["hi_ground"];
								
								if($hi_ground== 4){$hi_ground = 'Baik';}
								else if($hi_ground == 3){$hi_ground = 'Cukup';}
								else if($hi_ground == 2){$hi_ground = 'Kurang';}
								else if($hi_ground == 1){$hi_ground = 'Buruk';}
								else {$hi_ground = '-';}
                               echo '  
                                                           <tr align="center">  
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet2">'.$row["kodegd"].'</a></td>  
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                  <td>'.$hi_2a_oil.'</td>  
                                                                  <td>'.$hi_bdv.'</td>															  
                                                             </tr>  
                                                             ';	
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
                                <i class="fa fa-table"></i> Daftar Tier 2 - Thermovision
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
                                '<table class="table" id="tabel2b" width="100%" cellspacing="0">
                                            <thead>
                                              <tr  align="center">
											  <th>No. </th>
													<th>Area</th>
                              					<th>Rayon</th>
												  <th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
												<th>Thermovision</th>
												<th>Suhu Trafo</th>														
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr  align="center">
											  <th>No. </th>
													<th>Area</th>
                              					<th>Rayon</th>
												  <th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
												<th>Thermovision</th>
												<th>Suhu Trafo</th>												
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_2b = $row["hi_2b"];
								if($hi_2b == 4){$hi_2b = 'Baik';}
								else if($hi_2b == 3){$hi_2b = 'Cukup';}
								else if($hi_2b == 2){$hi_2b = 'Kurang';}
								else if($hi_2b == 1){$hi_2b = 'Buruk';}
								else {$hi_2b = '-';}
								$hi_2b_body = $row["hi_2b_body"];
								if($hi_2b_body == 4){$hi_2b_body = 'Baik';}
								else if($hi_2b_body == 3){$hi_2b_body = 'Cukup';}
								else if($hi_2b_body == 2){$hi_2b_body = 'Kurang';}
								else if($hi_2b_body == 1){$hi_2b_body = 'Buruk';}
								else {$hi_2b_body = '-';}
								echo '  
                                                           <tr  align="center" >  
														   <td> '.$no.' </td>
                              									<td>'.$row["area"].'</td>  
                              									<td>'.$row["rayon"].'</td>  
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet2b">'.$row["kodegd"].'</a></td>    
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                  <td>'.$hi_2b.'</td> 
                                                                  <td>'.$hi_2b_body.'</td>  																  
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
                               ' <table class="table" id="tabel2b" width="100%" cellspacing="0">
                                            <thead>
                                              <tr  align="center">
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
												<th>Kapasitas/Fasa</th>
												<th>Thermovision</th>
												<th>Suhu Trafo</th>												
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr  align="center">
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
												<th>Kapasitas/Fasa</th>
												<th>Thermovision</th>		                                            
 												<th>Suhu Trafo</th>
												</tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_2b = $row["hi_2b"];
								if($hi_2b == 4){$hi_2b = 'Baik';}
								else if($hi_2b == 3){$hi_2b = 'Cukup';}
								else if($hi_2b == 2){$hi_2b = 'Kurang';}
								else if($hi_2b == 1){$hi_2b = 'Buruk';}
								else {$hi_2b = '-';}
								$hi_2b_body = $row["hi_2b_body"];
								if($hi_2b_body == 4){$hi_2b_body = 'Baik';}
								else if($hi_2b_body == 3){$hi_2b_body = 'Cukup';}
								else if($hi_2b_body == 2){$hi_2b_body = 'Kurang';}
								else if($hi_2b_body == 1){$hi_2b_body = 'Buruk';}
								else {$hi_2b_body = '-';}
                               echo '  
                                                           <tr align="center">  
														   <td>'.$no.'</td>
                              									<td>'.$row["rayon"].'</td>  
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet2b">'.$row["kodegd"].'</a></td>  
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                 <td>'.$hi_2b.'</td> 
                                                                 <td>'.$hi_2b_body.'</td>																 
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
                               ' 
                                <table class="table" id="tabel2b" width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
												<th>Thermovision</th>
												<th>Suhu Trafo</th>												
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_2b = $row["hi_2b"];
								if($hi_2b == 4){$hi_2b = 'Baik';}
								else if($hi_2b == 3){$hi_2b = 'Cukup';}
								else if($hi_2b == 2){$hi_2b = 'Kurang';}
								else if($hi_2b == 1){$hi_2b = 'Buruk';}
								else {$hi_2b = '-';}
								$hi_2b_body = $row["hi_2b_body"];
								if($hi_2b_body == 4){$hi_2b_body = 'Baik';}
								else if($hi_2b_body == 3){$hi_2b_body = 'Cukup';}
								else if($hi_2b_body == 2){$hi_2b_body = 'Kurang';}
								else if($hi_2b_body == 1){$hi_2b_body = 'Buruk';}
								else {$hi_2b_body = '-';}
								echo '  
                                                           <tr align="center">  
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet2b">'.$row["kodegd"].'</a></td>  
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                  <td>'.$hi_2b.'</td>
                                                                  <td>'.$hi_2b_body.'</td>																  
																  </tr>  
                                                             ';	
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
                                <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-fw fa-user"></i> <span class="label label-warning">User Profile</span></h4>
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
                                                <td>
                                                    <?php echo $login_session; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Username:</td>
                                                <td>
                                                    <?php echo $login_username; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Role:</td>
                                                <td>
                                                    <?php echo $login_role; ?>
                                                </td>
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
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-power-off "></i> Keluar dari SiHD</h5>
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

            <!-- Detail Health Index Tier 2a-->
            <div class="modal fade" id="modDet2" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="det2-data">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Health Index Tier 2b-->
            <div class="modal fade" id="modDet2b" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="det2b-data">
                        </div>
                    </div>
                </div>
            </div>			

			            <!-- Cari Health Index-->
            <div class="modal fade" id="findHI2" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="carihi2-data">
                        </div>
                    </div>
                </div>
            </div>	

			            <!-- Cari Jadwal Assesment-->
            <div class="modal fade" id="findAss2" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="carijad2-data">
                        </div>
                    </div>
                </div>
            </div>				
			
			
            <!-- HI 2a Modal-->
            <div class="modal fade" id="modHI2a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="card">
                            <div class="card-header">
                                <a class="modal-title" id="exampleModalLabel"><i class= "fa fa-pie-chart " ></i>   Health Index Kualitas Minyak</a>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                  </button>
                            </div>
                            <div class="card-body">
                                <form role="form" class="registration-form" action="javascript:void(0);">
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Warna Minyak</span></p>
                                        </div>
                                        <canvas id="minyak2" style="width:50%; height:100px"></canvas> <br/>
                                        <button type="button" class="btn btn-primary float-right ">></button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Tegangan Tembus</span></p>
                                        </div>
                                        <canvas id="bdv_oil" style="width:50%; height:100px"></canvas><br/>
                                        <button type="button" class="btn btn-info"><</button>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="card-footer">&nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			            <!-- HI 2b Modal-->
            <div class="modal fade" id="modHI2b" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="card">
                            <div class="card-header">
                                <a class="modal-title" id="exampleModalLabel"><i class= "fa fa-pie-chart " ></i>   Health Index Kualitas Minyak</a>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                  </button>
                            </div>
                            <div class="card-body">
                                <form role="form" class="registration-form" action="javascript:void(0);">
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Thermovision Komponen Gardu</span></p>
                                        </div>
                                        <canvas id="thermo2" style="width:50%; height:100px"></canvas> <br/>
                                        <button type="button" class="btn btn-primary float-right ">></button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Suhu Trafo</span></p>
                                        </div>
                                        <canvas id="bodyt" style="width:50%; height:100px"></canvas><br/>
                                        <button type="button" class="btn btn-info"><</button>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="card-footer">&nbsp;
                            </div>
                        </div>
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
        <script src="../../js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="../../js/sb-admin-datatables.min.js"></script>
        <script src="../../js/modal.js"></script>
        <script src="../../js/hi_2.js" type="text/javascript"></script>
        <!-- Page level plugin JavaScript-->
        <script src="../../vendor/chart.js/Chart.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="../../js/sb-admin.min.js"></script>
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
        <script src="../../js/charthigardu.js"></script>



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
                "Jernih",
                "Keruh",
                "Gelap",
                "Hitam Pekat",
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
            var promisedDeliveryChart = new Chart(document.getElementById('minyak2'), {
              type: 'doughnut',
              data: data,
              options: {
              	responsive: true,
                legend: {
                  display: true,
            	  position: 'right'
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
            
            var promisedDeliveryChart = new Chart(document.getElementById('bdv_oil'), {
              type: 'doughnut',
              data: data,
              options: {
              	responsive: true,
                legend: {
                  display: true,
            	  position: 'right'
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
            var promisedDeliveryChart = new Chart(document.getElementById('thermo2'), {
              type: 'doughnut',
              data: data,
              options: {
              	responsive: true,
                legend: {
                  display: true,
            	  position: 'right'
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
                  data: [<?php echo json_encode($baik4); ?>, <?php echo json_encode($cukup4); ?>, <?php echo json_encode($kurang4); ?>, <?php echo json_encode($buruk4); ?>, <?php echo json_encode($belum4); ?>],
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
            
            var promisedDeliveryChart = new Chart(document.getElementById('bodyt'), {
              type: 'doughnut',
              data: data,
              options: {
              	responsive: true,
                legend: {
                  display: true,
            	  position: 'right'
                }
              }
            });
        </script>
		
    </body>

    </html>
    <style>
        form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
    </style>
    <script>
        $(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type=""],input[type=""]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type=""],input[type=""]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})})
    </script>
	
	<script>
        $(document).ready(function() {
         
            // Append a caption to the table before the DataTables initialisation
         
            $('#tabel2').DataTable( {
                dom: 'Bfrtip',
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
                    },
        			 {
                        extend: 'colvis',
        
                        messageBottom: null
                    }
        			
                ]
            } );
        } );
    </script>	
	
	
	<script>
        $(document).ready(function() {
         
            // Append a caption to the table before the DataTables initialisation
         
            $('#tabel2b').DataTable( {
                dom: 'Bfrtip',
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
                    },
        			 {
                        extend: 'colvis',
        
                        messageBottom: null
                    }
        			
                ]
            } );
        } );
    </script>	
	
	

<script>
$(function() {
    // Input radio-group visual controls
    $('.radio-group label').on('click', function(){
        $(this).removeClass('not-active').siblings().addClass('not-active');
    });
});
</script>