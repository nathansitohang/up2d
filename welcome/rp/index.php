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
		<title>SiODis / Rekap Data Padam</title>
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
		.btn-circle{width:30px;height:30px;text-align:center;padding:6px 0;font-size:12px;line-height:1.428571429;border-radius:15px}
		</style>
		<style>
		.modal-lg{max-width:70%!important}
		</style>	  
		<style>
		.radio-group label{overflow:hidden}.radio-group input{height:1px;width:1px;position:absolute;top:-20px}.radio-group .not-active{color:#3276b1;background-color:#fff}
		</style>
	</head>
	<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
			 <a class="navbar-brand" href="../../#"><img src="../../img/sihd.png" alt="SiHD v.1.0" style="width:130px;height:auto"></a>
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
					</ul>
				</li>
				
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#master" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-folder"></i>
						<span class="nav-link-text">Data Aset</span>
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

			    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Health Index">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#healthindex" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-heartbeat"></i>
						<span class="nav-link-text">Analisa</span>
					</a>
					<ul class="sidenav-second-level collapse" id="healthindex">
						<li>
							<a href="#">Rekap Pemadaman</a>
						</li>
						<li>
							<a href="../rload">Rekap Beban</a>
						</li>
						<li>
							<a href="../rrp">Rekap Resetting Proteksi</a>
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
                        <a href="#">Cari Pemadaman</a>
                    </li>
                </ol>
				<div class="row">      
					<div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-bar-chart"></i> Top 10 Gangguan Penyulang
                            </div>
							<div class="card-body">
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
									LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder 
									AND pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
									and MONTH(pemadaman2.tanggalpadam) = month(now())-1 
									AND year(pemadaman2.tanggalpadam) = year(now()) 
									AND pemadaman2.idup3 <> 99999
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
								<div class="row">
									<div class="form-group col-md-3 col-sm-3">
										<select class="form-control"  name="UP3" id="UP3topten">
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
									</div>
									<div class="form-group col-md-3 col-sm-3">
										<select class="form-control"  name="ULP" id="ULPtopten">
											<option value="0">- Pilih Unit -</option>
										</select>
									</div>
									<div class="form-group col-md-2 col-sm-2">
										<select class="form-control" name="option" id="bulantopten">
											<?php
												$bulan = date('m', strtotime('last month'));
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
									<div class="form-group col-md-2 col-sm-2">
										<select class="form-control" name="option" id="tahuntopten">
											<?php
												$year = !empty( $_GET['year'] ) ? $_GET['year'] : 0;
												$tahun = date ('Y');
												for ($i = -1; $i <= 1; ++$i) {
													$time = strtotime(sprintf('+%d years', $i));
													$value = date('Y', $time);

													$selected = ( $value==$tahun) ? ' selected=true' : '';

													printf('<option value="%s"%s>%s</option>', $value, $selected, $value );
												}
												
											?>
										</select>
									</div>
									<div class="form-group col-md-2 col-sm-2">
										<button class="btn btn-primary" id="submit">Show</button>							
									</div>
								</div>
								<div class="col-sm-12 my-auto chartBox">
									<canvas id="charttop10" width="100" height="50"></canvas>
								</div>
								<!-- <div id="peta" style="width:100%; height: 410px"></div>-->
							</div>
                            <div class="card-footer small text-muted">&nbsp;</div>
                        </div>
                    </div>
					<div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa -solid fa-stethoscope"></i> Data Rekam Medis
                            </div>
							<div class="card-body">
								<div class="form-group">
									<div class="col-lg-12">			  
										<div class="input-group">		 
											<select class="form-control"  name="UP34" id="UP34">
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
											&nbsp;&nbsp;&nbsp;
										<br>
											<select class="form-control"  name="ULP4" id="ULP4">
												<option value="0" selected disabled>- Pilih Unit -</option>
											</select>
											<br>
											<br>
										</div>
									</div>
									<div class="col-lg-12">			  
										<div class="input-group">
											<select class="form-control" name="monthname" id="bulanx"> 
												<?php
													$bulan = date('m', strtotime('last month'));
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
											&nbsp;&nbsp;&nbsp;
										<br>
										<br>
											<select class="form-control" name="year" id="tahunx"> 
												<?php
													$year = !empty( $_GET['year'] ) ? $_GET['year'] : 0;
													$tahun = date ('Y');
													for ($i = -1; $i <= 1; ++$i) {
														$time = strtotime(sprintf('+%d years', $i));
														$value = date('Y', $time);

														$selected = ( $value==$tahun) ? ' selected=true' : '';

														printf('<option value="%s"%s>%s</option>', $value, $selected, $value );
													}
												?>
											</select>	   
										</div>
									</div>
									<div class="col-lg-12">			  
										<div class="input-group">
											<select class="form-control" name="opsi" id="opsi"> 
												<option value="Bulanan">Bulanan</option>		
												<option value="Triwulan">Triwulan (Last 3 Months)</option>
											</select>
										<br>
										<br>
										</div>
									</div>
									<div class="col-lg-12">			  
										<div class="input-group">		
											<select class="form-control"  name="detailx" id="detailx">
												<option value="1">Detail</option>
												<option value="2" disabled >Rekapitulasi (Under Development  <i class="fa fa-search"></i>)</option>											
											</select>
											<span class="input-group-btn">&nbsp;
												<button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#viewrekammedis"><i class="fa fa-search"></i></button>
											</span>
										</div>
									</div>					
								</div>
							</div>
							<div class="card-footer small text-muted">&nbsp;
							</div>
						</div>
                    </div>
                </div>

				<div class="row">      
					<div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-search"></i> Pencarian Per Penyebab Gangguan
                            </div>
                            <div class="card-body">
								<div class="form-group">				
									<div class="col-lg-12">			  
										<div class="input-group">		 
											<select class="form-control"  name="UP35" id="UP35">
												<?php
												$query="SELECT DISTINCT idarea, area FROM user GROUP BY (idarea)";
												$result = mysqli_query($db, $query);
												if (!$result)
												{
													die('Invalid query: ' . mysqli_error());
												}
													while ($row = @mysqli_fetch_array($result)){	
												?>
													<option value="<?php echo $row["idarea"] ?>"><?php echo $row["area"] ?></option>   
												<?php
												}
												?>
											</select>
											&nbsp;&nbsp;&nbsp;
											<br>
											<select class="form-control"  name="ULP5" id="ULP5">
												<option value="0" selected disabled>- Pilih Unit -</option>
											</select>
											<br>
											<br>
										</div>
									</div>
									<div class="col-lg-12">			  
										<div class="input-group">
											<select class="form-control" name="monthz" id="bulanz"> 
												<?php
													$bulan = date('m', strtotime('last month'));
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
											&nbsp;&nbsp;&nbsp;
											<br>
											<br>
											<select class="form-control" name="yearz" id="tahunz"> 
												<?php
													$year = !empty( $_GET['year'] ) ? $_GET['year'] : 0;
													$tahun = date ('Y');
													for ($i = -1; $i <= 1; ++$i) {
														$time = strtotime(sprintf('+%d years', $i));
														$value = date('Y', $time);
														$selected = ( $value==$tahun) ? ' selected=true' : '';
														printf('<option value="%s"%s>%s</option>', $value, $selected, $value );
													}														
												?>
											</select>	   
											&nbsp;&nbsp;&nbsp;
										</div>
									</div>	
									<div class="col-lg-12">			  
										<div class="input-group">		 
											<select class="form-control"  name="fgtmz" id="fgtmz">
												<?php
												$query="SELECT DISTINCT fgtm FROM pemadaman2 where jenispadam =2 ORDER BY fgtm ASC";
												$result = mysqli_query($db, $query);
												if (!$result) 
												{
												die('Invalid query: ' . mysqli_error());
												}
												while ($row = @mysqli_fetch_array($result)){													   
												?>
													<option value="<?php echo $row["fgtm"] ?>"><?php echo $row["fgtm"] ?></option>
												<?php
												}
												?>
											</select>
											<span class="input-group-btn">&nbsp;
												<button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#detailfgtm"><i class="fa fa-search"></i></button>
											</span>
										</div>
									</div>
								</div>
							</div>                            
						</div>
					</div>
					<div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-bar-chart"></i> Rekap Gangguan Harian
                            </div>
							<?php
								$cekleap = date('Y');
								
									if ($cekleap % 400 == 0){$kabisat=1;}	
									else if ($cekleap % 100 == 0) {$kabisat="";}
									else if ($cekleap % 4 == 0){$kabisat=1;}
									else {$kabisat ="";}
								
									$kali_ggn =  $tgl_padam= "";
									$command = "select gettanggal.tanggal AS tgl, count(pemadaman2.feeder) AS total
										from gettanggal 
										left join pemadaman2 on gettanggal.tanggal = day(pemadaman2.tanggalpadam) AND pemadaman2.jenispadam = 2
										AND MONTH (pemadaman2.tanggalpadam) = MONTH(CURRENT_DATE - INTERVAL 0 MONTH)
										AND YEAR (pemadaman2.tanggalpadam) = YEAR(CURRENT_DATE - INTERVAL 0 MONTH)
										AND pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
										AND minute(pemadaman2.lamapadam) > 0
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
                            <div class="card-body">
								<div class="form-group">				
									<div class="col-lg-12">			  
										<div class="input-group">		 
											<select class="form-control"  name="UP36" id="UP36">
												<?php
												$query="SELECT DISTINCT idarea, area FROM user GROUP BY (idarea)";
												$result = mysqli_query($db, $query);
												if (!$result)
												{
													die('Invalid query: ' . mysqli_error());
												}
													while ($row = @mysqli_fetch_array($result)){	
												?>
													<option value="<?php echo $row["idarea"] ?>"><?php echo $row["area"] ?></option>   
												<?php
												}
												?>
											</select>
											&nbsp;&nbsp;&nbsp;
											<br>
											<select class="form-control"  name="ULP6" id="ULP6">
												<option value="0" selected disabled>- Pilih Unit -</option>
											</select>
											<br>
											<br>
										</div>
									</div>
									<div class="col-lg-12">			  
										<div class="input-group">
											<select class="form-control" name="monthrekapggn" id="bulanrekapggn"> 
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
											&nbsp;&nbsp;&nbsp;
											<br>
											<br>
											<select class="form-control" name="yearrekapggn" id="tahunrekapggn"> 
												<?php
													$year = !empty( $_GET['year'] ) ? $_GET['year'] : 0;
													$tahun = date ('Y');
													for ($i = -1; $i <= 1; ++$i) {
														$time = strtotime(sprintf('+%d years', $i));
														$value = date('Y', $time);
														$selected = ( $value==$tahun) ? ' selected=true' : '';
														printf('<option value="%s"%s>%s</option>', $value, $selected, $value );
													}														
												?>
											</select>	   
											&nbsp;&nbsp;&nbsp;
										</div>
									</div>	
									<div class="col-lg-12">			  
										<div class="input-group">		 
											<select class="form-control" name="option" id="minutos">
											<option value = "1">Total</option>
											<option value = "2"> &#60;= 5menit </option>
											<option value = "3"> > 5 menit </option>											
											</select>
											<span class="input-group-btn">&nbsp;
												<button class="btn btn-primary" id="submitggn"><i class="fa fa-search"></i></button>							
											</span>
										</div>										
									</div>
								</div>
								<div class="col-sm-12 my-auto chartBox">
									<canvas id="chartkaliggn" width="100" height="40"></canvas>
								</div>
							</div>                            
						</div>
					</div>
				</div>
				
				<div class="row">      
					<div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-search"></i> Cari Data Pemadaman
                            </div>
							<div class="card-body">
								<div class="form-group" style="margin-bottom:3px;">
									<div class="row">
										<div class="col-md-12">
											<div class="well">
												<form class="form-horizontal">
													<div class="form-group">
														<div class="col-lg-12">			  
															<div class="input-group">		 
																<select class="form-control"  name="UP3" id="UP3">
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
																&nbsp;&nbsp;&nbsp;
															<br>
															<br>
																<select class="form-control"  name="ULP" id="ULP">
																	<option value="0">- Pilih Unit -</option>
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
															</div>
														</div>
														<br/>
														<div class="col-lg-12">			  
															<div class="input-group">
																<select class="form-control"  name="jenispadam" id="jenispadam">
																	<option value="1">Gangguan GI/GH </option>
																	<option value="2">Gangguan Rec</option>
																	<option value="3">Pemeliharaan</option>
																	<option value="4">Emergency</option>
																	<option value="5">Gangguan Sistem</option>												
																</select>&nbsp;&nbsp;&nbsp;
																<select class="form-control"  name="detail" id="detail">
																	<option value="1">Rekapitulasi</option>
																	<option value="2">Detail</option>											
																</select>
																<span class="input-group-btn">&nbsp;
																	<button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#viewggn"><i class="fa fa-search"></i></button>
																</span>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>  
                            <div class="card-footer small text-muted">&nbsp;
							</div>
                        </div>
                    </div>
					<div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-pie-chart"></i> Grafik Penyebab Gangguan
                            </div>
                            <div class="card-body">
								<div class="form-group">
									<div class="col-lg-12">			  
										<div class="input-group">		 
											<select class="form-control"  name="UP32" id="UP32">
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
											&nbsp;&nbsp;&nbsp;
											<br>
											<select class="form-control"  name="ULP2" id="ULP2">
												<option value="0" selected disabled>- Pilih Unit -</option>
											</select>
											<br>
											<br>
										</div>
									</div>
									<div class="col-lg-12">			  
										<div class="input-group">
											<select class="form-control" name="monthname" id="bulan"> 
												<?php
													$bulan = date('m', strtotime('last month'));
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
											&nbsp;&nbsp;&nbsp;
											<br>
											<br>
											<select class="form-control" name="year" id="tahun"> 
												<?php
													$year = !empty( $_GET['year'] ) ? $_GET['year'] : 0;
													$tahun = date ('Y');
													for ($i = -1; $i <= 1; ++$i) {
														$time = strtotime(sprintf('+%d years', $i));
														$value = date('Y', $time);

														$selected = ( $value==$tahun) ? ' selected=true' : '';

														printf('<option value="%s"%s>%s</option>', $value, $selected, $value );
													}
													
												?>
											</select>	   
											&nbsp;&nbsp;&nbsp;
											<span class="input-group-btn">&nbsp;
												<button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#viewfgtm"><i class="fa fa-search"></i></button>
											</span>
										</div>
									</div>		
								</div>
							</div>
                            <div class="card-footer small text-muted">&nbsp;
							</div>
                        </div>
                    </div>	
                </div>	
				
				<div class="row"> 
					<div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-table"></i> Total Gangguan Per Penyulang Bulan Ini (<?php echo date("F Y");?>)
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
											LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and 
											penyulang.feeder = pemadaman2.feeder 
											AND pemadaman2.tanggalpadam BETWEEN DATE_FORMAT(NOW() - INTERVAL 0 MONTH, '%Y-%m-01 00:00:00')
											AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 0 MONTH), '%Y-%m-%d 23:59:59')
											and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
											WHERE penyulang.dtbs_pdm IN (1,2) 
											GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
											order by total desc";

										$result = mysqli_query($db, $query);
										if (!$result) {
										  die('Invalid query: ' . mysqli_error());
										}	
										echo        
										' 
										<table class="table" id="dataPadam" width="100%" cellspacing="0">
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
												while ($row = @mysqli_fetch_assoc($result))
												{
												echo '  
                                                <tr>
													<td>'.$no.' </td>																							 
													<td>'.$row["feeder"].'</td> 
													<td>'.$row["jns_cb"].'</td>																
													<td>'.$row["up3"].'</td> 
													<td>'.$row["ulp"].'</td> 
													<td>'.$row["total"].'</td> 
                                                </tr>  
                                                ';
												$no++;	
												}
										echo '
											</tbody>';
										echo '
										</table>';}   
										
										else if ($login_role == "area") {
										$query="					   
											SELECT
											penyulang.no,
											penyulang.feeder,
											penyulang.up3,
											penyulang.ulp,
											COUNT(pemadaman2.feeder) AS total
											FROM penyulang 
											LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and 
											penyulang.feeder = pemadaman2.feeder 
											AND pemadaman2.tanggalpadam BETWEEN DATE_FORMAT(NOW() - INTERVAL 0 MONTH, '%Y-%m-01 00:00:00')
											AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 0 MONTH), '%Y-%m-%d 23:59:59')
											and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
											WHERE penyulang.dtbs_pdm IN (1,2) AND penyulang.idup3 = '$login_idarea'
											GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
											order by total desc";
											
										$result = mysqli_query($db, $query);
										if (!$result) {
										  die('Invalid query: ' . mysqli_error());
										}
										echo        
										'<table class="table" id="dataPadam" width="100%" cellspacing="0">
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
										echo '
											</tbody>';
										echo 
										'</table>';}		
										
										else if ($login_role == "rayon") {
										$query="					   
											SELECT
											penyulang.no,
											penyulang.feeder,
											penyulang.up3,
											penyulang.ulp,
											COUNT(pemadaman2.feeder) AS total
											FROM
											penyulang
											LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and 
											penyulang.feeder = pemadaman2.feeder 
											AND pemadaman2.tanggalpadam BETWEEN DATE_FORMAT(NOW() - INTERVAL 0 MONTH, '%Y-%m-01 00:00:00')
											AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 0 MONTH), '%Y-%m-%d 23:59:59')
											and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
											WHERE penyulang.dtbs_pdm IN (1,2) AND penyulang.idulp = '$login_idrayon'
											GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
											order by total desc";
										$result = mysqli_query($db, $query);
										if (!$result) {
										  die('Invalid query: ' . mysqli_error());
										}
										echo        
										'<table class="table" id="dataPadam" width="100%" cellspacing="0">
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
										echo '
											</tbody>';
										echo 
										'</table>';}
									?>
								</div>
							</div>
                            <div class="card-footer small text-muted">&nbsp;
							</div>
                        </div>
                    </div>
					<div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-table"></i> Total Gangguan Per Penyulang Bulan Lalu (<?php echo date('F Y', strtotime('last month')); ?>)
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
											LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and 
											penyulang.feeder = pemadaman2.feeder 
											AND pemadaman2.tanggalpadam BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01 00:00:00')
											AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), '%Y-%m-%d 23:59:59')
											and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
											WHERE penyulang.dtbs_pdm IN (1,2) 
											GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
											order by total desc";

										$result = mysqli_query($db, $query);
										if (!$result) {
										  die('Invalid query: ' . mysqli_error());
										}	
										echo        
										' 
										<table class="table" id="dataPadam2" width="100%" cellspacing="0">
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
												while ($row = @mysqli_fetch_assoc($result))
												{
												echo '  
                                                <tr>
													<td>'.$no.' </td>																							 
													<td>'.$row["feeder"].'</td> 
													<td>'.$row["jns_cb"].'</td>																
													<td>'.$row["up3"].'</td> 
													<td>'.$row["ulp"].'</td> 
													<td>'.$row["total"].'</td> 
                                                </tr>  
                                                ';
												$no++;	
												}
										echo '
											</tbody>';
										echo '
										</table>';}   
										
										else if ($login_role == "area") {
										$query="					   
											SELECT
											penyulang.no,
											penyulang.feeder,
											penyulang.up3,
											penyulang.ulp,
											COUNT(pemadaman2.feeder) AS total
											FROM penyulang 
											LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and 
											penyulang.feeder = pemadaman2.feeder 
											AND pemadaman2.tanggalpadam BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01 00:00:00')
											AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), '%Y-%m-%d 23:59:59')
											and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
											WHERE penyulang.dtbs_pdm IN (1,2) AND penyulang.idup3 = '$login_idarea'
											GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
											order by total desc";
											
										$result = mysqli_query($db, $query);
										if (!$result) {
										  die('Invalid query: ' . mysqli_error());
										}
										echo        
										'<table class="table" id="dataPadam" width="100%" cellspacing="0">
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
										echo '
											</tbody>';
										echo 
										'</table>';}		
										
										else if ($login_role == "rayon") {
										$query="					   
											SELECT
											penyulang.no,
											penyulang.feeder,
											penyulang.up3,
											penyulang.ulp,
											COUNT(pemadaman2.feeder) AS total
											FROM
											penyulang
											LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and 
											penyulang.feeder = pemadaman2.feeder 
											AND pemadaman2.tanggalpadam BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01 00:00:00')
											AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), '%Y-%m-%d 23:59:59')
											and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
											WHERE penyulang.dtbs_pdm IN (1,2) AND penyulang.idulp = '$login_idrayon'
											GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp 
											order by total desc";
										$result = mysqli_query($db, $query);
										if (!$result) {
										  die('Invalid query: ' . mysqli_error());
										}
										echo        
										'<table class="table" id="dataPadam" width="100%" cellspacing="0">
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
										echo '
											</tbody>';
										echo 
										'</table>';}
									?>
								</div>
							</div>
                            <div class="card-footer small text-muted">&nbsp;
							</div>
                        </div>
                    </div>					
                </div>
				
				<div class="row">
                    <div class="col-lg-7">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-map-marker"></i> Peta Titik Gangguan
                            </div>
                            <div class="card-body">
                                <div id="map" style="width:100%; height: 400px"></div>
                            </div>
                            <div class="card-footer small text-muted">&nbsp; 
							</div>
                        </div>
                    </div>
				</div>
			</div>
        </div>
		 
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
		 
		<div class="modal fade" id="detailfgtm" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="detailfgtm-data">
					</div>
				</div>
			</div>
		</div>	 
			
		<div class="modal fade" id="viewfgtm" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="carifgtm-data">
					</div>
				</div>
			</div>
		</div>	 
		 
		<div class="modal fade" id="viewbbnfdr" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="caribbnfdr-data">
					</div>
				</div>
			</div>
		</div>	
		    
		<div class="modal fade" id="viewrekammedis" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="viewrekammedis-data">
						</div>
					</div>
			</div>
		</div>			

		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../../js/button/dataTables.buttons.min.js"></script>
		<script src="../../js/button/jszip.min.js"></script>
		<script src="../../js/button/vfs_fonts.js"></script>
		<script src="../../js/button/buttons.html5.min.js"></script>
		<script src="../../js/button/buttons.print.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="../../js/button/buttons.colVis.min.js"></script> 	
		<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>			
		<script src="../../vendor/chart.js/Chart.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../../vendor/chart.js/chartjs-plugin-datalabels.min.js"></script>		   

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-75591362-1', 'auto');
			ga('send', 'pageview');
		</script>
		<script src="../../js/sb-admin.min.js"></script>
		<script src="../../js/sb-admin-datatables.min.js"></script>
		<script src="../../js/modal.js"></script>
		<script src="../../js/markerclusterer.js"></script> 
		<script> 
		$(document).ready(function() {
		   $('#dataPadam,#dataPadam2').DataTable( {
				dom: 'lBfrtip',
				buttons: [
					'copy', 'excel', 'pdf', 'print'
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
					success: function(msg)
					{
						// jika tidak ada data
						if(msg == ''){
						alert('Tidak ada data unit');
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
				<script>
			$("#UP32").change(function(){
				var id_UP32 = $("#UP32").val();
				$("#imgLoad").show("");
				$.ajax({
					type: "POST",
					dataType: "html",
					url: "get_up3.php",
					data: "up3="+id_UP32,
					success: function(msg)
					{
						// jika tidak ada data
						if(msg == ''){
						alert('Tidak ada data unit');
						}
						// jika dapat mengambil data,, tampilkan di combo box kota
						else{
						$("#ULP2").html(msg);                                                     
						}
						// hilangkan image load
						$("#imgLoad").hide();
						}
					});    
			});
		</script>
		<script>
			$("#UP3topten").change(function(){
				var id_UP3 = $("#UP3topten").val();
				$("#imgLoad").show("");
				$.ajax({
					type: "POST",
					dataType: "html",
					url: "get_up3.php",
					data: "up3="+id_UP3,
					success: function(msg)
					{
						// jika tidak ada data
						if(msg == ''){
						alert('Tidak ada data unit');
						}
						// jika dapat mengambil data,, tampilkan di combo box kota
						else{
						$("#ULPtopten").html(msg);                                                     
						}
						// hilangkan image load
						$("#imgLoad").hide();
						}
					});    
			});
		</script>
		<script>
			$("#UP34").change(function(){
				var id_UP34 = $("#UP34").val();
				$("#imgLoad").show("");
				$.ajax({
					type: "POST",
					dataType: "html",
					url: "get_up3.php",
					data: "up3="+id_UP34,
					success: function(msg)
					{
						// jika tidak ada data
						if(msg == ''){
						alert('Tidak ada data unit');
						}
						// jika dapat mengambil data,, tampilkan di combo box kota
						else{
						$("#ULP4").html(msg);                                                     
						}
						// hilangkan image load
						$("#imgLoad").hide();
						}
					});    
			});
		</script>
		<script>
			$("#UP35").change(function(){
				var id_UP35 = $("#UP35").val();
				$("#imgLoad").show("");
				$.ajax({
					type: "POST",
					dataType: "html",
					url: "get_up3.php",
					data: "up3="+id_UP35,
					success: function(msg)
					{
						// jika tidak ada data
						if(msg == ''){
						alert('Tidak ada data unit');
						}
						// jika dapat mengambil data,, tampilkan di combo box kota
						else{
						$("#ULP5").html(msg);                                                     
						}
						// hilangkan image load
						$("#imgLoad").hide();
						}
					});    
			});
		</script>
		<script>
			$("#UP36").change(function(){
				var id_UP36 = $("#UP36").val();
				$("#imgLoad").show("");
				$.ajax({
					type: "POST",
					dataType: "html",
					url: "get_up3.php",
					data: "up3="+id_UP36,
					success: function(msg)
					{
						// jika tidak ada data
						if(msg == ''){
						alert('Tidak ada data unit');
						}
						// jika dapat mengambil data,, tampilkan di combo box kota
						else{
						$("#ULP6").html(msg);                                                     
						}
						// hilangkan image load
						$("#imgLoad").hide();
						}
					});    
			});
		</script>

		<?php
			$querytop10="
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
							LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 
							and penyulang.feeder = pemadaman2.feeder 
							AND MONTH(pemadaman2.tanggalpadam) = month(now())-1 
							AND year(pemadaman2.tanggalpadam) = year(now()) 
							WHERE penyulang.dtbs_pdm IN (1,2) 
							GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp order by total desc LIMIT 20";
						
						$resulttop10 = mysqli_query($db, $querytop10); 
						$resulttop11 = mysqli_query($db, $querytop10); 
						$resulttop12 = mysqli_query($db, $querytop10); 
						?>

		<script>
			var internalData = [<?php while ($rt10 = mysqli_fetch_array($resulttop10)) { echo '"' . $rt10['total'] . '",';}?>];
			var graphColors = [];
			var graphOutlines = [];
			var hoverColor = [];
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
		
		<script>
		var gas = 
				{
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
								align: 'center',
								offset : 2
								}
				};
				
		var chartOptions = 
				{
					legend: 
					{
						display: true,
						position: 'top',
						labels: 
						{
							boxWidth: 80,
							fontColor: 'black'
						}
					}
				};						
				
		myData = 
				{
					labels: [<?= $penyulang?>],
					datasets: [gas]
				};
				
		// Draw default chart with page load
		var ctx = document.getElementById('charttop10').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',    // Define chart type
			data: myData,  // Chart data
			plugins: [ChartDataLabels],
			options : chartOptions
		});
		// Draw chart with Ajax request
		
		$('#submit').on('click', function (e) 
			{
				var bulan = $("#bulantopten").val();
				var tahun = $("#tahuntopten").val();
				var up3 = $("#UP3topten").val();
				var ulp = $("#ULPtopten").val();
				
				$.ajax({
					url: 'getdatatopten.php',
					dataType: 'json',
					data: 
						{
							'bulan':bulan,'tahun':tahun,'up3':up3,'ulp':ulp,							
						},
					success: function(e){
								// Delete previous chart
								myChart.destroy();
								//Draw new chart with Ajax data
								myChart = new Chart(ctx, 
								{
									type: 'bar',    // Define chart type
									data: e, 
									plugins: [ChartDataLabels],
									options : chartOptions
								});
							}
						});
					});
		</script>
		<?php
		$last_month = date('F Y', strtotime('last month'));
		$this_month = date('F Y', strtotime('first day of this month'));
		$last_month2 = date('m Y', strtotime('last month'));
		$year = date ('y');
		?>
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
		var bulanggn = $("#bulanrekapggn").val();
		var tahunggn = $("#tahunrekapggn").val();
		var minutos = $("#minutos").val();
		var idup3 = $("#UP36").val();
		var idulp = $("#ULP6").val();
		
		$.ajax({
		url: 'getdataggn.php',
		dataType: 'json',
		data: {'bulanggn':bulanggn,'tahunggn':tahunggn, 'minutos':minutos, 'idup3':idup3, 'idulp':idulp,
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
	</body>
</html>
