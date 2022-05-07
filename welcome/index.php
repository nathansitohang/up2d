<?php
include('../session.php');
include('../config.php');
$tahunini=date("Y");
if ($login_role == "admin")  {									
$result2=mysqli_query($db, "SELECT count(*) as total2 from kubikel WHERE 1");
$result3=mysqli_query($db, "SELECT count(*) as total3 from titik WHERE KODE_ASET =1");	
$result4=mysqli_query($db, "SELECT count(*) as total4 from titik WHERE KODE_ASET =2");	
$result5=mysqli_query($db, "SELECT count(*) as total5 from kubikel WHERE 1 ");	
$result6=mysqli_query($db, "SELECT count(*) as total6 from kubikel WHERE thn_cub<=2011");
$totkub= mysqli_query($db, "SELECT up3, COUNT(*) as total FROM kubikel GROUP BY up3 ORDER BY idup3 asc");
$merk = mysqli_query($db, "SELECT DISTINCT merk_cub FROM kubikel order by merk_cub asc");
$totmerk = mysqli_query($db, "SELECT merk_cub, COUNT(*) as totmerk FROM kubikel GROUP BY merk_cub ORDER BY merk_cub asc");
$totfeeder = mysqli_query($db, "SELECT up3, COUNT(*) as totfeeder FROM penyulang where dtbs_fdr=1 AND up3 NOT LIKE '%IPP%' and up3 not like '%EXPRESS%' GROUP BY up3 ORDER BY idup3 asc");
$feederup3 = mysqli_query($db, "SELECT DISTINCT up3 as feederup3 FROM penyulang where up3 NOT LIKE '%IPP%' and up3 not like '%EXPRESS%'  order by idup3 asc");
}

else if ($login_role == "area") {
$result2=mysqli_query($db, "SELECT count(*) as total2 from kubikel WHERE 1");
$result3=mysqli_query($db, "SELECT count(*) as total3 from titik WHERE KODE_ASET =1 AND (KODE_UP ='$login_idarea' OR SHARING ='$login_idarea');");	
$result4=mysqli_query($db, "SELECT count(*) as total4 from titik WHERE KODE_ASET =2 AND KODE_UP ='$login_idarea'");	
$result5=mysqli_query($db, "SELECT count(*) as total5 from kubikel WHERE idup3 ='$login_idarea' ");	
$result6=mysqli_query($db, "SELECT count(*) as total6 from kubikel WHERE thn_cub<=2011 AND idup3 ='$login_idarea'");	
$totkub = mysqli_query($db, "SELECT ulp, COUNT(*) as total FROM kubikel where idup3='$login_idarea' GROUP BY ulp ORDER BY idulp asc");
$merk = mysqli_query($db, "SELECT DISTINCT merk_cub FROM kubikel where idup3='$login_idarea'  order by merk_cub asc");
$totmerk = mysqli_query($db, "SELECT merk_cub, COUNT(*) as totmerk FROM kubikel where idup3='$login_idarea' GROUP BY merk_cub ORDER BY merk_cub asc");
$totfeeder = mysqli_query($db, "SELECT ulp, COUNT(*) as totfeeder FROM penyulang where idup3='$login_idarea' and dtbs_fdr=1 AND up3 NOT LIKE '%IPP%' and up3 not like '%EXPRESS%' GROUP BY ulp ORDER BY idulp asc");
$feederup3 = mysqli_query($db, "SELECT DISTINCT ulp as feederup3 FROM penyulang where idup3='$login_idarea' and up3 NOT LIKE '%IPP%' and up3 not like '%EXPRESS%'  order by idulp asc");
}  

else {								
$result2=mysqli_query($db, "SELECT count(*) as total2 from kubikel WHERE 1");
$result3=mysqli_query($db, "SELECT count(*) as total3 from titik WHERE KODE_ASET =1 AND (KODE_UP ='$login_idarea' OR SHARING ='$login_idarea');");	
$result4=mysqli_query($db, "SELECT count(*) as total4 from titik WHERE KODE_ASET =2 AND KODE_UP ='$login_idarea'");	
$result5=mysqli_query($db, "SELECT count(*) as total5 from kubikel WHERE idup3 ='$login_idarea' ");	
$result6=mysqli_query($db, "SELECT count(*) as total6 from kubikel WHERE thn_cub<=2011 AND idup3 ='$login_idarea'");
$totkub = mysqli_query($db, "SELECT ulp, COUNT(*) as total FROM kubikel where idup3='$login_idarea' GROUP BY ulp ORDER BY idulp asc");
$merk = mysqli_query($db, "SELECT DISTINCT merk_cub FROM kubikel where idup3='$login_idarea' order by merk_cub asc");
$totmerk = mysqli_query($db, "SELECT merk_cub, COUNT(*) as totmerk FROM kubikel where idup3='$login_idarea' GROUP BY merk_cub ORDER BY merk_cub asc");
$totfeeder = mysqli_query($db, "SELECT ulp, COUNT(*) as totfeeder FROM penyulang where idup3='$login_idarea' and dtbs_fdr=1 AND up3 NOT LIKE '%IPP%' and up3 not like '%EXPRESS%' GROUP BY ulp ORDER BY idulp asc");
$feederup3 = mysqli_query($db, "SELECT DISTINCT ulp as feederup3 FROM penyulang where idup3='$login_idarea' and up3 NOT LIKE '%IPP%' and up3 not like '%EXPRESS%'  order by idulp asc");

} 
$data2=mysqli_fetch_assoc($result2);
$data3=mysqli_fetch_assoc($result3);
$data4=mysqli_fetch_assoc($result4);
$data5=mysqli_fetch_assoc($result5);
$data6=mysqli_fetch_assoc($result6);
$totalgi = $data3['total3'];
$totalgh = $data4['total4'];
$totalcub = $data5['total5'];
$kubikeltua = $data6['total6'];  
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
      <title>SiODis / Dashboard</title>
      <link href="..//vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="..//vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="..//vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <link href="..//css/sb-admin.css" rel="stylesheet">
	  <link href="../css/button/buttons.dataTables.min.css" rel="stylesheet">
   </head>
   
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
			 <a class="navbar-brand" href="../"><img src="..//img/sihd.png" alt="SiHD v.1.0" style="width:130px;height:auto"></a>
			 <button href="#" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			 <span class="navbar-toggler-icon"></span>
			 </button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="#">
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
							<a href="padam">Entri Data Padam</a>
						</li>
						<li>
							<a href="beban">Entri Data Beban</a>
						</li>
						<li>
							<a href="setpro">Resetting Proteksi</a>
						</li>
					</ul>
				</li>
				
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#master" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-folder"></i>
						<span class="nav-link-text">Data Aset</span>
					</a>
					<ul class="sidenav-second-level collapse" id="master">
						<li>
							<a href="gi">Gardu Induk</a>
						</li> 
						<li>
							<a href="gh">Gardu Hubung</a>
						</li>
						<li>
							<a href="feeder">Penyulang</a>
						</li>
						<li>
							<a href="kp">Keypoint</a>
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
							<a href="rp">Rekap Pemadaman</a>
						</li>
						<li>
							<a href="rload">Rekap Beban</a>
						</li>
						<li>
							<a href="rrp">Rekap Resetting Proteksi</a>
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
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Dashboard</a>
					</li>
				</ol>
				<div class="row">
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-info o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fa fa-fw fa-file"></i>
								</div>
								<div class="mr-5"><?php echo $totalgi; ?> GI Suplai <?php echo $login_area; ?> 
								</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="gi">
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
								<div class="mr-5"><?php echo $totalgh; ?> GH Tersebar di <?php echo $login_area; ?> </div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="gh">
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
								<div class="mr-5"><?php echo $totalcub; ?>  Jumlah Kubikel GH di <?php echo $login_area; ?> </div>
							</div>
						<a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#modDetailGardu">
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
								<div class="mr-5"><?php echo $kubikeltua; ?>  Kubikel Tua di <?php echo $login_area; ?>
								</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#modTua">
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
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-line-chart"></i> Load Curve
							</div>
							<div class="card-body">
								<?php
									$siang = $malam =  $tgl= "";
									$perintah = "select siang, malam, tanggal from loadcurve where month (tanggal) = MONTH(CURRENT_DATE()- interval 1 month) 
									AND year(tanggal) = YEAR(CURRENT_DATE() - interval 1 month)";
									$hasil=mysqli_query($db, $perintah);
									while($row = $hasil->fetch_assoc())
									{
										$siang .= $row['siang'] . ",";
										$malam .= $row['malam'] . ",";
										$string = strtotime($row['tanggal']);
										$tgl .=date("d", $string). ",";

									}
									
									$valsiang = trim($siang, ",");
									$valmalam = trim($malam, ",");
									$valtgl = trim($tgl, ",");
								?>
													 
								<div class="row">
									<div class="form-group col-md-3 col-sm-3">
										<select class="form-control" name="option" id="bulan">
											<?php                        
												$bulan = date('m', strtotime('first day of this month'));
												for ($i = 0; $i <= 11; $i++) 
												{
													$time = strtotime(sprintf('+%d months', $i), $bulan);
													$label = date('F', $time);
													$value = date('m', $time);
													$selected = ( $value==$bulan) ? ' selected=true' : '';
													printf('<option value="%s"%s>%s</option>', $value, $selected, $label );
												}
											?>
										</select>
									</div>
									<div class="form-group col-md-2 col-sm-3">
										<select class="form-control" name="option" id="tahun">
											<?php
												$year = !empty( $_GET['year'] ) ? $_GET['year'] : 0;
												$tahun = date ('Y');
												for ($i = -1; $i <= 1; ++$i) 
												{
													$time = strtotime(sprintf('+%d years', $i));
													$value = date('Y', $time);
													$selected = ( $value==$tahun) ? ' selected=true' : '';
													printf('<option value="%s"%s>%s</option>', $value, $selected, $value );
												}
											?>
										</select>
									</div>
									<div class="form-group col-md-3 col-sm-3">
										<button class="btn btn-primary" id="submit">Show</button>							
									</div>
								</div>
								<div class="col-sm-12 my-auto chartBox">
									<canvas id="kurvabeban" width="100" height="50"></canvas>
								</div>
							</div>
							<div class="card-footer small text-muted">&nbsp </div>
						</div>
						<?php
							$tanggalpadam = "01-01-2022";
							$jampadam = "20:01";
							$tanggalpulih = "01-01-2022";
							$jampulih = "20:02";							
							$dt_padam = strtotime (date('Y-m-d H:i', strtotime($tanggalpadam.' '.$jampadam)));
							$dt_pulih = strtotime (date('Y-m-d H:i', strtotime($tanggalpulih.' '.$jampulih)));
							$datediff = gmdate('H:i', ($dt_pulih - $dt_padam));	
							
						?>
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-line-chart"></i> Trend Gangguan Harian
							</div>
							<div class="card-body">
								<?php
								$cekleap = date('Y');
								
									if ($cekleap % 400 == 0){$kabisat=1;}	
									else if ($cekleap % 100 == 0) {$kabisat="";}
									else if ($cekleap % 4 == 0){$kabisat=1;}
									else {$kabisat ="";}
								
									$kali_ggn =  $tgl_padam= "";
									$command = "select gettanggal.tanggal AS tgl, count(pemadaman2.feeder) AS total
										from gettanggal 
										left join pemadaman2 on gettanggal.tanggal = day(pemadaman2.tanggalpadam) 
										AND MONTH (pemadaman2.tanggalpadam) = MONTH(CURRENT_DATE - INTERVAL 0 MONTH)
										AND YEAR (pemadaman2.tanggalpadam) = YEAR(CURRENT_DATE - INTERVAL 0 MONTH)
										AND pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
										AND minute(pemadaman2.lamapadam) > 0 AND pemadaman2.jenispadam = 2
										WHERE gettanggal.bulan = MONTH(CURRENT_DATE - INTERVAL 0 MONTH) AND (gettanggal.kabisat = 0 
                                        OR gettanggal.kabisat = 1)
										group by gettanggal.tanggal 
										ORDER by gettanggal.idtgl ASC";
										
									$rslt=mysqli_query($db, $command);
										while($raw = $rslt->fetch_assoc())
										{
											$kali_ggn .= $raw['total'] . ",";
											$string = $raw['tgl'];
											$tgl_padam .=  $string. ",";
										}
									$valkali_ggn = trim($kali_ggn, ",");
									$valtgl_padam = trim($tgl_padam, ",");
								?>
								<div class="row">
									<div class="form-group col-md-3 col-sm-3">
										<select class="form-control" name="option" id="bulanggn">
											<?php
												$bulan = date('m', strtotime('first day of this month'));
												for ($i = 0; $i <= 11; $i++) 
												{
													$time = strtotime(sprintf('+%d months', $i), $bulan);
													$label = date('F', $time);
													$value = date('m', $time);
													$selected = ( $value==$bulan) ? ' selected=true' : '';
													printf('<option value="%s"%s>%s</option>', $value, $selected, $label );
												}
											?>
										</select>
									</div>
									<div class="form-group col-md-2 col-sm-3">
										<select class="form-control" name="option" id="tahunggn">
											<?php
												$year = !empty( $_GET['year'] ) ? $_GET['year'] : 0;
												$tahun = date ('Y');
												for ($i = -2; $i <= 1; ++$i) 
												{
													$time = strtotime(sprintf('+%d years', $i));
													$value = date('Y', $time);
													$selected = ( $value==$tahun) ? ' selected=true' : '';
													printf('<option value="%s"%s>%s</option>', $value, $selected, $value );
												}
											?>
										</select>
									</div>
									<div class="form-group col-md-3 col-sm-3">
										<select class="form-control" name="option" id="minutos">
											<option value = "1">Total</option>
											<option value = "2"> &#60;= 5menit </option>
											<option value = "3"> > 5 menit </option>											
										</select>
									</div>									
									<div class="form-group col-md-3 col-sm-3">
										<button class="btn btn-primary" id="submitggn">Show</button>							
									</div>
								</div>
								<div class="col-sm-12 my-auto chartBox">
									<canvas id="chartkaliggn" width="100" height="50"></canvas>
								</div>
							</div>
							<div class="card-footer small text-muted">&nbsp </div>
						</div>
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-map-marker"></i> Peta Lokasi GI/GH
							</div>
							<div class="card-body">
								<iframe src="showmap.php" style="width:100%; height: 450px"   scrolling="no" frameborder="0"
								></iframe>
							</div>
							<div class="card-footer small text-muted">&nbsp </div>
						</div>
						<div class="mb-0 mt-4">
						<i class="fa fa-table"></i> Peta Keypoint 
						</div>
						<hr class="mt-2">
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-map-marker"></i> Sebaran Keypoint&nbsp&nbsp<?php echo $login_session; ?>
							</div>
							<div class="card-body">
								<iframe src="showmapkp.php" style="width:100%; height: 450px"   scrolling="no" frameborder="0"
								style="position: relative; height: 100%; width: 100%;"></iframe>
							</div>
							<div class="card-footer small text-muted">&nbsp </div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-bar-chart"></i> Top 10 Beban Penyulang <?php echo $login_session; ?> Bulan <?php echo date('F Y', strtotime('last month'));?>
							</div>
							<div class="card-body">
								<canvas id="topbeban" style="width:100%; height: 300px"></canvas>
							</div>
							<div class="card-footer small text-muted">&nbsp </div>
						</div>
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-bar-chart"></i>  Top 10 Gangguan Penyulang <?php echo $login_session; ?> Bulan <?php echo date('F Y', strtotime('last month'));?> 
							</div>
							<div class="card-body">
								<canvas id="top10" style="width:100%; height: 300px"></canvas>
							</div>
							<div class="card-footer small text-muted">&nbsp </div>
						</div>
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-bar-chart"></i>  Top 10 Gangguan Penyulang <?php echo $login_session; ?> Tahun <?php echo date('Y');?> 
							</div>
							<div class="card-body">
								<canvas id="toptop" style="width:100%; height: 300px"></canvas>
							</div>
							<div class="card-footer small text-muted">&nbsp </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>SiHD <?php echo date("Y"); ?></small>
				</div>
			</div>
		</footer>
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
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
		<!-- Lihat Data Detail Kubikel-->
	    <div class="modal fade" id="modDetailGardu" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="detailgardu-data"> 
					</div>
				</div>
			</div>
		</div>
		<!-- Lihat Data Gardu Kondisi Buruk-->
	    <div class="modal fade" id="modTua" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="kubikeltua-data"> 
					</div>
				</div>
			</div>
		</div>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-75591362-1', 'auto');
ga('send', 'pageview');
</script>
		
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/datatables/jquery.dataTables.js"></script>
<script src="../js/button/dataTables.buttons.min.js"></script>
<script src="../js/button/jszip.min.js"></script>
<script src="../js/button/vfs_fonts.js"></script>
<script src="../js/button/buttons.html5.min.js"></script>
<script src="../js/button/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="../js/button/buttons.colVis.min.js"></script> 	
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>			
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="../vendor/chart.js/chartjs-plugin-datalabels.min.js"></script>		   

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-75591362-1', 'auto');
ga('send', 'pageview');
</script>
<script src="../js/sb-admin.min.js"></script>
<script src="../js/sb-admin-datatables.min.js"></script>
<script src="../js/modal.js"></script>
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
	  
<script>
var internalData = [<?php while ($row = mysqli_fetch_array($totkub)) { echo '"' . $row['total'] . '",';}?>];
var graphColors = [];
var graphOutlines = [];
var hoverColor = [];
</script>

<script>
var internalDataLength = internalData.length;
i = 0;
while (i <= internalDataLength) {
    var randomR = Math.floor((Math.random() * 130) + 100);
    var randomG = Math.floor((Math.random() * 180) + 100);
    var randomB = Math.floor((Math.random() * 200) + 100);
  
    var graphBackground = "rgb(" 
            + randomR + ", " 
            + randomG + ", " 
            + randomB + ")";
    graphColors.push(graphBackground);
    
    var graphOutline = "rgb(" 
            + (randomR - 80) + ", " 
            + (randomG - 80) + ", " 
            + (randomB - 80) + ")";
    graphOutlines.push(graphOutline);
    
    var hoverColors = "rgb(" 
            + (randomR + 25) + ", " 
            + (randomG + 25) + ", " 
            + (randomB + 25) + ")";
    hoverColor.push(hoverColors);
    
  i++;
};
</script>	  

<?php
$bebanfeeder = $penyulang = "";
$sql = "SELECT beban, feeder, QUOTE(feeder) FROM databeban WHERE MONTH(tanggal) = MONTH(NOW())-1 AND YEAR(tanggal) = YEAR(NOW()) ORDER BY beban DESC LIMIT 10";
$result=mysqli_query($db, $sql);

while($row = $result->fetch_assoc())
{
$bebanfeeder .= $row['beban'] . ",";
$penyulang .= $row['QUOTE(feeder)'] . ",";
}
$valbeban = trim($bebanfeeder, ",");
$valpenyulang = trim($penyulang, ",");
$last_month = date('F Y', strtotime('last month'));
$this_month = date('F Y', strtotime('first day of this month'));
$last_month2 = date('m Y', strtotime('last month'));
$year = date ('y');
?>
<script>			
var beban = {
label: <?php echo '"'.$last_month.'"'; ?>,
data: [<?= $valbeban ?>],
lineTension: 0.1,
fill: false,
backgroundColor: graphColors,
hoverBackgroundColor: hoverColor,
borderColor: graphOutlines,
datalabels: {
color: 'grey',
anchor: 'end',
align: 'right',
offset : 5
}
};
var chartOptions = {
indexAxis: 'y',
legend: {
display: true,
position: 'top',
labels: {
boxWidth: 80,
fontColor: 'black'
}
}
};							
myData = {
labels: [<?= $valpenyulang ?>],
datasets: [beban]
};
var ctx = document.getElementById('topbeban').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',    // Define chart type
data: myData,  // Chart data
plugins : [ChartDataLabels],
options : chartOptions
});
</script>	  
	  	
<?php
$querytop10=" SELECT
penyulang.no,
penyulang.feeder,
QUOTE(penyulang.feeder) as feederkutip,
penyulang.jns_cb,
penyulang.kode_aset,
penyulang.dtbs_pdm,
penyulang.up3,
penyulang.ulp,
COUNT(pemadaman2.feeder) AS total
FROM penyulang
 
LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and pemadaman2.status = 1 
and penyulang.feeder = pemadaman2.feeder 
AND MONTH(pemadaman2.tanggalpadam) = month(now())-1 AND year(pemadaman2.tanggalpadam) = year(now()) 
AND pemadaman2.idup3 <> 99999 AND pemadaman2.tripkembali <> 1
WHERE penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
order by total desc 
LIMIT 10";

$penyulang = $tottrip = '';
$resulttop10 = mysqli_query($db, $querytop10); 
while($row = $resulttop10->fetch_assoc())
{
$penyulang .= $row['feederkutip'] . ",";
$tottrip .= $row['total'] . ",";
}
$penyulang = trim($penyulang, ",");
$tottrip = trim($tottrip, ",");
?>

<script type="text/javascript">
var feedCanvas = document.getElementById("top10");
var totalfeederData = {
label: 'penyulang',
data: [<?= $tottrip ?>],
lineTension: 0,
fill: false,
backgroundColor: graphColors,
hoverBackgroundColor: hoverColor,
borderColor: graphOutlines,
datalabels: {
color: 'yellow',
anchor: 'top',
align: 'right',
offset : 2
}
};
var feedData = {
labels: [<?= $penyulang?>],
datasets: [totalfeederData]
};
var options = {
indexAxis: 'y',
legend: {
display: true,
position: 'top',
labels: {
boxWidth: 50,
fontColor: 'black'
}
}
};
var barfeedChart = new Chart(feedCanvas, {
type: 'bar',
data: feedData,
plugins: [ChartDataLabels],
options: options
});
</script>

<?php
$querytoptop=" SELECT
penyulang.no,
penyulang.feeder,
QUOTE(penyulang.feeder) as feederkutip,
penyulang.jns_cb,
penyulang.kode_aset,
penyulang.dtbs_pdm,
penyulang.up3,
penyulang.ulp,
COUNT(pemadaman2.feeder) AS total
FROM penyulang 
LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 
and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
and penyulang.feeder = pemadaman2.feeder AND year(pemadaman2.tanggalpadam) = year(now()) 
AND pemadaman2.idup3 <> 99999 AND pemadaman2.tripkembali <> 1
WHERE penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
order by total desc 
LIMIT 10";
$penyulangx = $tottripx = '';
$resulttoptop = mysqli_query($db, $querytoptop); 
while($rowx = $resulttoptop->fetch_assoc())
{
$penyulangx .= $rowx['feederkutip'] . ",";
$tottripx .= $rowx['total'] . ",";
}
$penyulangx = trim($penyulangx, ",");
$tottripx = trim($tottripx, ",");
?>

<script type="text/javascript">
var feedCanvas = document.getElementById("toptop");

var totalfeederData = {
label: 'penyulang',
data: [<?= $tottripx ?>],
borderWidth: 1,
backgroundColor: graphColors,
hoverBackgroundColor: hoverColor,
borderColor: graphOutlines,
datalabels: {
color: 'yellow',
anchor: 'center',
align: 'center',
offset : 5
}
};

var feedData = {
labels: [<?= $penyulangx?>],
datasets: [totalfeederData]
};

var options = {
responsive: true,
scaleSteps : 1
};

var barfeedChart = new Chart(feedCanvas, {
type: 'bar',
data: feedData,
plugins: [ChartDataLabels],
options: options
});
</script>

<script>
var siang = {
label: 'lwbp',
data: [<?= $valsiang ?>],
lineTension: 0.5,
fill: true,
borderColor: 'red',
backgroundColor: 'rgba(255,0,0,0.25)',
pointBorderColor: 'red',
pointBackgroundColor: 'red'
};

var malam = {
label: 'wbp',
data: [<?= $valmalam ?>],
lineTension: 0.5,
fill: true,
borderColor: 'green',
backgroundColor: 'rgba(0,255,0,0.25)',
pointBorderColor: 'green',
pointBackgroundColor: 'green'
};	

var chartOptions = {
legend: {
display: true,
position: 'top',
labels: {
boxWidth: 80,
fontColor: 'black'
}
}
};						
myData = {
labels: [<?= $valtgl ?>],
datasets: [siang, malam]
};
var ctx = document.getElementById('kurvabeban').getContext('2d');
var myChart = new Chart(ctx, {
type: 'line',    // Define chart type
data: myData,  // Chart data
options : chartOptions
});
$('#submit').on('click', function (e) 
{
var bulan = $("#bulan").val();
var tahun = $("#tahun").val();
$.ajax({
url: 'getdataloadcurve.php',
dataType: 'json',
data: {'bulan':bulan,'tahun':tahun,
},
success: function(e){
// Delete previous chart
myChart.destroy();
//Draw new chart with Ajax data
myChart = new Chart(ctx, {
type: 'line',
fillOpacity: .3,    // Define chart type
data: e,
options : chartOptions
});
}
});
});
</script>

<script>	
var jlh_ggn = {
label: <?php echo '"'.$this_month.'"'; ?>,
data: [<?= $valkali_ggn ?>],
lineTension: 0.1,
fill: true,
backgroundColor: graphColors,
hoverBackgroundColor: hoverColor,
borderColor: graphOutlines,
datalabels: {
color: 'red',
anchor: 'center',
align: 'center',
offset : 5
}
};

var chartOptions1 = {
legend: {
display: true,
position: 'top',
labels: {
boxWidth: 80,
fontColor: 'black'
}
}
};						
dataku = {
labels: [<?= $valtgl_padam ?>],
datasets: [jlh_ggn]
};
var ctxi = document.getElementById('chartkaliggn').getContext('2d');
var myCharti = new Chart(ctxi, {
type: 'bar',    // Define chart type
data: dataku,  // Chart data
plugins: [ChartDataLabels], 
options : chartOptions1
});
$('#submitggn').on('click', function (e) 
{
var bulanggn = $("#bulanggn").val();
var tahunggn = $("#tahunggn").val();
var minutos = $("#minutos").val();

$.ajax({
url: 'getdataggn.php',
dataType: 'json',
data: {'bulanggn':bulanggn,'tahunggn':tahunggn, 'minutos':minutos,
},
success: function(e){
// Delete previous chart
myCharti.destroy();
//Draw new chart with Ajax data
myCharti = new Chart(ctxi, {
type: 'bar',    // Define chart type
data: e,
plugins: [ChartDataLabels], 
options : chartOptions1
});
}
});
});
</script>
				

<script>
$(document).ready(function() {
    $('#example').DataTable();
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
</body>
</html>