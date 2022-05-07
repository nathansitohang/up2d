<?php
   include('../../session.php');
   include('../../config.php');
   
      if ($login_role == "admin") { $result=mysqli_query($db, "SELECT count(*) as total 
									,SUM(hi_beban = 4) AS 'baik'
									,SUM(hi_beban = 3) AS 'cukup' 
									,SUM(hi_beban = 2) AS 'kurang'
									,SUM(hi_beban = 1) AS 'buruk' 
									,SUM(hi_beban = 0) AS 'belum'
									,SUM(hi_imbang = 4) AS 'baik2'
									,SUM(hi_imbang = 3) AS 'cukup2' 
									,SUM(hi_imbang = 2) AS 'kurang2'
									,SUM(hi_imbang = 1) AS 'buruk2' 
									,SUM(hi_imbang = 0) AS 'belum2'
									,SUM(hi_netral = 4) AS 'baik3'
									,SUM(hi_netral = 3) AS 'cukup3' 
									,SUM(hi_netral = 2) AS 'kurang3'
									,SUM(hi_netral = 1) AS 'buruk3' 
									,SUM(hi_netral = 0) AS 'belum3'
									,SUM(hi_arus = 4) AS 'baik4'
									,SUM(hi_arus = 3) AS 'cukup4' 
									,SUM(hi_arus = 2) AS 'kurang4'
									,SUM(hi_arus = 1) AS 'buruk4' 
									,SUM(hi_arus = 0) AS 'belum4'
									,SUM(hi_1b_oil = 4) AS 'bersih'
									,SUM(hi_1b_oil = 3) AS 'retak' 
									,SUM(hi_1b_oil = 2) AS 'minyak'
									,SUM(hi_1b_oil = 1) AS 'tetes' 
									,SUM(hi_1b_oil = 0) AS 'belum5'
									,SUM(hi_1b_fisik = 4) AS 'mulus'
									,SUM(hi_1b_fisik = 3) AS 'minor' 
									,SUM(hi_1b_fisik = 2) AS 'mayor'
									,SUM(hi_1b_fisik = 1) AS 'bengkak' 
									,SUM(hi_1b_fisik = 0) AS 'belum6'
									,SUM(hi_ground = 4) AS 'baik7'
									,SUM(hi_ground = 3) AS 'cukup7' 
									,SUM(hi_ground = 2) AS 'kurang7'
									,SUM(hi_ground = 1) AS 'buruk7' 
									,SUM(hi_ground = 0) AS 'belum7'
									,SUM(hi_1b_phb = 4) AS 'baik8'
									,SUM(hi_1b_phb = 3) AS 'cukup8' 
									,SUM(hi_1b_phb = 2) AS 'kurang8'
									,SUM(hi_1b_phb = 1) AS 'buruk8' 
									,SUM(hi_1b_phb = 0) AS 'belum8'								
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
	$baik5 = $data['bersih'];
    $cukup5 = $data['retak'];
	$kurang5 = $data['minyak'];
    $buruk5 = $data['tetes'];
	$belum5 = $data['belum5'];
	$baik6 = $data['mulus'];
    $cukup6 = $data['minor'];
	$kurang6 = $data['mayor'];
    $buruk6 = $data['bengkak'];
	$belum6 = $data['belum6'];	
	$baik7 = $data['baik7'];
    $cukup7 = $data['cukup7'];
	$kurang7 = $data['kurang7'];
    $buruk7 = $data['buruk7'];
	$belum7 = $data['belum7'];	
	$baik8 = $data['baik8'];
    $cukup8 = $data['cukup8'];
	$kurang8 = $data['kurang8'];
    $buruk8 = $data['buruk8'];
	$belum8 = $data['belum8'];	
	} 
      else if ($login_role == "area") { $result=mysqli_query($db, "SELECT count(*) as total 
									,SUM(hi_beban = 4) AS 'baik'
									,SUM(hi_beban = 3) AS 'cukup' 
									,SUM(hi_beban = 2) AS 'kurang'
									,SUM(hi_beban = 1) AS 'buruk' 
									,SUM(hi_beban = 0) AS 'belum'
									,SUM(hi_imbang = 4) AS 'baik2'
									,SUM(hi_imbang = 3) AS 'cukup2' 
									,SUM(hi_imbang = 2) AS 'kurang2'
									,SUM(hi_imbang = 1) AS 'buruk2' 
									,SUM(hi_imbang = 0) AS 'belum2'
									,SUM(hi_netral = 4) AS 'baik3'
									,SUM(hi_netral = 3) AS 'cukup3' 
									,SUM(hi_netral = 2) AS 'kurang3'
									,SUM(hi_netral = 1) AS 'buruk3' 
									,SUM(hi_netral = 0) AS 'belum3'
									,SUM(hi_arus = 4) AS 'baik4'
									,SUM(hi_arus = 3) AS 'cukup4' 
									,SUM(hi_arus = 2) AS 'kurang4'
									,SUM(hi_arus = 1) AS 'buruk4' 
									,SUM(hi_arus = 0) AS 'belum4'
									,SUM(hi_1b_oil = 4) AS 'bersih'
									,SUM(hi_1b_oil = 3) AS 'retak' 
									,SUM(hi_1b_oil = 2) AS 'minyak'
									,SUM(hi_1b_oil = 1) AS 'tetes' 
									,SUM(hi_1b_oil = 0) AS 'belum5'
									,SUM(hi_1b_fisik = 4) AS 'mulus'
									,SUM(hi_1b_fisik = 3) AS 'minor' 
									,SUM(hi_1b_fisik = 2) AS 'mayor'
									,SUM(hi_1b_fisik = 1) AS 'bengkak' 
									,SUM(hi_1b_fisik = 0) AS 'belum6'
									,SUM(hi_ground = 4) AS 'baik7'
									,SUM(hi_ground = 3) AS 'cukup7' 
									,SUM(hi_ground = 2) AS 'kurang7'
									,SUM(hi_ground = 1) AS 'buruk7' 
									,SUM(hi_ground = 0) AS 'belum7'
									,SUM(hi_1b_phb = 4) AS 'baik8'
									,SUM(hi_1b_phb = 3) AS 'cukup8' 
									,SUM(hi_1b_phb = 2) AS 'kurang8'
									,SUM(hi_1b_phb = 1) AS 'buruk8' 
									,SUM(hi_1b_phb = 0) AS 'belum8'									
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
	$baik5 = $data['bersih'];
    $cukup5 = $data['retak'];
	$kurang5 = $data['minyak'];
    $buruk5 = $data['tetes'];
	$belum5 = $data['belum5'];
	$baik6 = $data['mulus'];
    $cukup6 = $data['minor'];
	$kurang6 = $data['mayor'];
    $buruk6 = $data['bengkak'];
	$belum6 = $data['belum6'];		
	$baik7 = $data['baik7'];
    $cukup7 = $data['cukup7'];
	$kurang7 = $data['kurang7'];
    $buruk7 = $data['buruk7'];
	$belum7 = $data['belum7'];	
	$baik8 = $data['baik8'];
    $cukup8 = $data['cukup8'];
	$kurang8 = $data['kurang8'];
    $buruk8 = $data['buruk8'];
	$belum8 = $data['belum8'];	
	} 
	
   else { $result=mysqli_query($db, "SELECT count(*) as total 
									,SUM(hi_beban = 4) AS 'baik'
									,SUM(hi_beban = 3) AS 'cukup' 
									,SUM(hi_beban = 2) AS 'kurang'
									,SUM(hi_beban = 1) AS 'buruk' 
									,SUM(hi_beban = 0) AS 'belum'
									,SUM(hi_imbang = 4) AS 'baik2'
									,SUM(hi_imbang = 3) AS 'cukup2' 
									,SUM(hi_imbang = 2) AS 'kurang2'
									,SUM(hi_imbang = 1) AS 'buruk2' 
									,SUM(hi_imbang = 0) AS 'belum2'	
									,SUM(hi_netral = 4) AS 'baik3'
									,SUM(hi_netral = 3) AS 'cukup3' 
									,SUM(hi_netral = 2) AS 'kurang3'
									,SUM(hi_netral = 1) AS 'buruk3' 
									,SUM(hi_netral = 0) AS 'belum3'	
									,SUM(hi_arus = 4) AS 'baik4'
									,SUM(hi_arus = 3) AS 'cukup4' 
									,SUM(hi_arus = 2) AS 'kurang4'
									,SUM(hi_arus = 1) AS 'buruk4' 
									,SUM(hi_arus = 0) AS 'belum4'
									,SUM(hi_1b_oil = 4) AS 'bersih'
									,SUM(hi_1b_oil = 3) AS 'retak' 
									,SUM(hi_1b_oil = 2) AS 'minyak'
									,SUM(hi_1b_oil = 1) AS 'tetes' 
									,SUM(hi_1b_oil = 0) AS 'belum5'
									,SUM(hi_1b_fisik = 4) AS 'mulus'
									,SUM(hi_1b_fisik = 3) AS 'minor' 
									,SUM(hi_1b_fisik = 2) AS 'mayor'
									,SUM(hi_1b_fisik = 1) AS 'bengkak' 
									,SUM(hi_1b_fisik = 0) AS 'belum6'
									,SUM(hi_ground = 4) AS 'baik7'
									,SUM(hi_ground = 3) AS 'cukup7' 
									,SUM(hi_ground = 2) AS 'kurang7'
									,SUM(hi_ground = 1) AS 'buruk7' 
									,SUM(hi_ground = 0) AS 'belum7'
									,SUM(hi_1b_phb = 4) AS 'baik8'
									,SUM(hi_1b_phb = 3) AS 'cukup8' 
									,SUM(hi_1b_phb = 2) AS 'kurang8'
									,SUM(hi_1b_phb = 1) AS 'buruk8' 
									,SUM(hi_1b_phb = 0) AS 'belum8'								
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
	$baik5 = $data['bersih'];
    $cukup5 = $data['retak'];
	$kurang5 = $data['minyak'];
    $buruk5 = $data['tetes'];
	$belum5 = $data['belum5'];
	$baik6 = $data['mulus'];
    $cukup6 = $data['minor'];
	$kurang6 = $data['mayor'];
    $buruk6 = $data['bengkak'];
	$belum6 = $data['belum6'];
	$baik7 = $data['baik7'];
    $cukup7 = $data['cukup7'];
	$kurang7 = $data['kurang7'];
    $buruk7 = $data['buruk7'];
	$belum7 = $data['belum7'];		
	$baik8 = $data['baik8'];
    $cukup8 = $data['cukup8'];
	$kurang8 = $data['kurang8'];
    $buruk8 = $data['buruk8'];
	$belum8 = $data['belum8'];	
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
        <title>SiHD / Health Index Gardu</title>
        <!-- Bootstrap core CSS-->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="../../css/sb-admin.css" rel="stylesheet">
 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=AIzaSyAceoRdzsxLP4bqW3q81WqVIawZbNGW-W0" type="text/javascript"></script>        <script type="text/javascript" src="../../js/loader.js"></script>

        <link href="../../css/button/buttons.dataTables.min.css" rel="stylesheet">
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
                        <a class="nav-link" href="../../gardu">
                  <i class="fa fa-fw fa-dashboard"></i>
                  <span class="nav-link-text">Dashboard</span>
                  </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master">
                        <a class="nav-link" href="../master_gardu">
                  <i class="fa fa-fw fa-folder"></i>
                  <span class="nav-link-text">Master Gardu</span>
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
                            <li>
                                <a href="../tier3">Tier 3</a>
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
                            <li>
                                <a href="../cetak3">Tier 3</a>
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
                        <a href="#">Tier 1</a>
                     </li>
                     <li>
                        <a href="../hi2">Tier 2</a>
                     </li>
                     <li>
                        <a href="../hi3">Tier 3</a>
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
        <div class="col-md-12"><div class="well">
            <form class="form-horizontal"><fieldset>
                <div class="form-group">
                      <div class="col-md-12">
                         <div class="input-group">
						   <select class="form-control col-lg-12" id="asst1">
                           <option value="1">Pembebanan</option>
                           <option value="2">Ketidakseimbangan</option>
                           <option value="3">Arus Netral</option>
                           <option value="4">Arus Fasa</option>
						   <option value="5">Kondisi Minyak</option>
                           <option value="6">Kondisi Fisik</option>
                           <option value="7">Grounding</option>
                           <option value="8">Kondisi PHB-TR</option>
                        </select>&nbsp;&nbsp;
							<select class="form-control" id="tier2">
                           <option value="4">Baik</option>
                           <option value="3">Cukup</option>
                           <option value="2">Kurang</option>
                           <option value="1">Buruk</option>
                        </select>   <span class="input-group-btn">&nbsp;
        <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#findHI1"><i class="fa fa-search"></i></button>
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
				  
				  <div class="form-group" style="margin-bottom:3px;">
                      <div class="row">
        <div class="col-md-9"><div class="well">
            <form class="form-horizontal"><fieldset>
                <div class="form-group">
                      <div class="col-md-12">
                         <div class="input-group">
						   <select class="form-control col-lg-12" id="item">
                           <option value="1">Pembebanan</option>
                           <option value="2">Ketidakseimbangan</option>
                           <option value="3">Arus Netral</option>
                           <option value="4">Arus Fasa</option>
                           <option value="5">Grounding LA</option>
						   <option value="6">Grounding Body</option>
                           <option value="7">Grounding Netral</option>
                        </select>&nbsp;&nbsp;
							<select class="form-control col-lg-2" id="tanda">
                           <option value=">">></option>
                           <option value=">=">>=</option>
                           <option value="<"><</option>
                           <option value="<="><=</option>
						   <option value="=">=</option>
                        </select>  <div class="col-lg-3"><input type="text" class="form-control " placeholder="..." maxlength="3" width="2px" id="nilai" onkeypress="return isNumber(event)"></div>
						<span class="input-group-btn">
        <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#carinilait1"><i class="fa fa-search"></i></button>
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
                                <i class="fa fa-search"></i> Belum Assesment
                            </div>
                            <div class="card-body">
					<div class="form-group" style="margin-bottom:3px;">
                      <div class="row">
        <div class="col-md-12"><div class="well">
            <form class="form-horizontal"><fieldset>
                <div class="form-group">
                      <div class="col-md-12">
                         <div class="input-group">
                            <div class="btn-group radio-group">
                               <label class="btn btn-primary not-active">Ukur Beban <input type="radio" value="1" name="tier2a"></label>
                               <label class="btn btn-primary not-active">Inspeksi Visual <input type="radio" value="2" name="tier2a"></label>
                           </div>&nbsp;
                     <div class="col-lg-3"><input type="text" class="form-control " placeholder="> ... bulan" maxlength="2" width="2px" id="bln" onkeypress="return isNumber(event)"></div>
						<span class="input-group-btn">&nbsp;
        <button class="btn btn-primary" data-toggle="modal" data-target="#findAss1" type="button"><i class="fa fa-search"></i></button>
   </span>
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
                                <i class="fa fa-map-marker"></i> Peta Gardu Pembebanan Trafo
                            </div>
                            <div class="card-body">
                                <div id="map" style="width:100%; height: 400px"></div>
                            </div>
                            <div class="card-footer small text-muted">&nbsp</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-pie-chart"></i> Health Index Pembebanan
                            </div>
                            <div class="card-body">
                                <canvas id="beban2" style="width:100%; height: 400px"></canvas>
                            </div>
                            <div class="card-footer small text-muted"><a href="#" class="badge badge-secondary float-right" data-toggle="modal" data-target="#modHI1a">more load profile...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-pie-chart"></i> Health Index Kondisi Minyak
                            </div>
                            <div class="card-body">
                                <canvas id="minyak1b" style="width:100%; height: 400px"></canvas>
                            </div>
                            <div class="card-footer small text-muted"><a href="#" class="badge badge-secondary float-right" data-toggle="modal" data-target="#modHI1b">more visual inspection...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- Example Pie Chart Card-->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-table"></i> Daftar Tier 1 - Pengukuran Beban
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
                                '<table class="table" id="tabel1a" width="100%" cellspacing="0">
                                            <thead>
                                              <tr  align="center">
											  <th>No. </th>
													<th>Area</th>
                              					<th>Rayon</th>
												  <th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
                              					<th>%Beban</th>																								
                              					<th>HI-Beban</th>
												<th>%Pincang</th>
                              					<th>HI-Pincang</th>
												<th>%Arus Netral</th>
												<th>HI-Arus Netral</th>	
												<th>%Arus Fasa Max</th>
												<th>HI-Arus</th>
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr  align="center">
											  <th>No. </th>
													<th>Area</th>
                              					<th>Rayon</th>
												  <th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
                              					<th>%Beban</th>																								
                              					<th>HI-Beban</th>
												<th>%Pincang</th>
                              					<th>HI-Pincang</th>
												<th>%Arus Netral</th>
												<th>HI-Arus Netral</th>	
												<th>%Arus Fasa Max</th>
												<th>HI-Arus</th>
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_beban = $row["hi_beban"];
								if($hi_beban == 4){$hi_beban = 'Baik';}
								else if($hi_beban == 3){$hi_beban = 'Cukup';}
								else if($hi_beban == 2){$hi_beban = 'Kurang';}
								else if($hi_beban == 1){$hi_beban = 'Buruk';}
								else {$hi_beban = '-';}
								$beban1 = $row["beban1"];
								$beban2 = $row["beban2"];
								$beban= max($beban1,$beban2);
								$persen1 = $row["persen1"];
								$persen2 = $row["persen2"];
								$persen= max($persen1,$persen2);
								$hi_imbang = $row["hi_imbang"];
								if($hi_imbang == 4){$hi_imbang = 'Baik';}
								else if($hi_imbang == 3){$hi_imbang = 'Cukup';}
								else if($hi_imbang == 2){$hi_imbang = 'Kurang';}
								else if($hi_imbang == 1){$hi_imbang = 'Buruk';}
								else {$hi_imbang = '-';}
								$imbang1 = $row["imbang"];
								$imbang2 = $row["imbang2"];
								$imbang= max($imbang1,$imbang2);
								$netral1 = $row["netral1"];
								$netral2 = $row["netral2"];
								$netral= max($netral1,$netral2);
								$hi_netral = $row["hi_netral"];
								
								if($hi_netral== 4){$hi_netral = 'Baik';}
								else if($hi_netral == 3){$hi_netral = 'Cukup';}
								else if($hi_netral == 2){$hi_netral = 'Kurang';}
								else if($hi_netral == 1){$hi_netral = 'Buruk';}
								else {$hi_netral = '-';}
								
								$maxi_1 = $row["maxi_1"];
								$maxi_2 = $row["maxi_2"];
								$maxi= max($maxi_1,$maxi_2);
								$hi_arus = $row["hi_arus"];
								
								if($hi_arus== 4){$hi_arus = 'Baik';}
								else if($hi_arus == 3){$hi_arus = 'Cukup';}
								else if($hi_arus == 2){$hi_arus = 'Kurang';}
								else if($hi_arus == 1){$hi_arus = 'Buruk';}
								else {$hi_arus = '-';}
                               echo '  
                                                           <tr  align="center" >  
														   <td> '.$no.' </td>
                              									<td>'.$row["area"].'</td>  
                              									<td>'.$row["rayon"].'</td>  
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet1a">'.$row["kodegd"].'</a></td>    
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                  <td>'.round($persen,1).'</td>  																  
                                                                  <td>'.$hi_beban.'</td>  
                                                                  <td>'.round($imbang,1).'</td>
                                                                  <td>'.$hi_imbang.'</td>
                                                                  <td>'.round($netral,1).'</td>
                                                                  <td>'.$hi_netral.'</td>
                                                                  <td>'.round($maxi,1).'</td>
                                                                  <td>'.$hi_arus.'</td> 
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
                               ' <table class="table" id="tabel1a" width="100%" cellspacing="0">
                                            <thead>
                                              <tr  align="center">
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
												<th>Kapasitas/Fasa</th>
                              					<th>%Beban</th>																								
                              					<th>HI-Beban</th>
												<th>%Pincang</th>
                              					<th>HI-Pincang</th>
												<th>%Arus Netral</th>
												<th>HI-Arus Netral</th>	
												<th>%Arus Fasa Max</th>
												<th>HI-Arus</th>													
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr  align="center">
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
												<th>Kapasitas/Fasa</th>
                              					<th>%Beban</th>																								
                              					<th>HI-Beban</th>
												<th>%Pincang</th>
                              					<th>HI-Pincang</th>
												<th>%Arus Netral</th>
												<th>HI-Arus Netral</th>	
												<th>%Arus Fasa Max</th>
												<th>HI-Arus</th>	                                                  
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_beban = $row["hi_beban"];
								if($hi_beban == 4){$hi_beban = 'Baik';}
								else if($hi_beban == 3){$hi_beban = 'Cukup';}
								else if($hi_beban == 2){$hi_beban = 'Kurang';}
								else if($hi_beban == 1){$hi_beban = 'Buruk';}
								else {$hi_beban = '-';}
								$beban1 = $row["beban1"];
								$beban2 = $row["beban2"];
								$beban= max($beban1,$beban2);
								$persen1 = $row["persen1"];
								$persen2 = $row["persen2"];
								$persen= max($persen1,$persen2);
								$hi_imbang = $row["hi_imbang"];
								if($hi_imbang == 4){$hi_imbang = 'Baik';}
								else if($hi_imbang == 3){$hi_imbang = 'Cukup';}
								else if($hi_imbang == 2){$hi_imbang = 'Kurang';}
								else if($hi_imbang == 1){$hi_imbang = 'Buruk';}
								else {$hi_imbang = '-';}
								$imbang1 = $row["imbang"];
								$imbang2 = $row["imbang2"];
								$imbang= max($imbang1,$imbang2);
								$netral1 = $row["netral1"];
								$netral2 = $row["netral2"];
								$netral= max($netral1,$netral2);
								$hi_netral = $row["hi_netral"];
								
								if($hi_netral== 4){$hi_netral = 'Baik';}
								else if($hi_netral == 3){$hi_netral = 'Cukup';}
								else if($hi_netral == 2){$hi_netral = 'Kurang';}
								else if($hi_netral == 1){$hi_netral = 'Buruk';}
								else {$hi_netral = '-';}
								
								$maxi_1 = $row["maxi_1"];
								$maxi_2 = $row["maxi_2"];
								$maxi= max($maxi_1,$maxi_2);
								$hi_arus = $row["hi_arus"];
								
								if($hi_arus== 4){$hi_arus = 'Baik';}
								else if($hi_arus == 3){$hi_arus = 'Cukup';}
								else if($hi_arus == 2){$hi_arus = 'Kurang';}
								else if($hi_arus == 1){$hi_arus = 'Buruk';}
								else {$hi_arus = '-';}
                               echo '  
                                                           <tr align="center">  
														   <td>'.$no.'</td>
                              									<td>'.$row["rayon"].'</td>  
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet1a">'.$row["kodegd"].'</a></td>  
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                  <td>'.round($persen,1).'</td>  																  
                                                                  <td>'.$hi_beban.'</td>  
                                                                  <td>'.round($imbang,1).'</td>
                                                                  <td>'.$hi_imbang.'</td>
                                                                  <td>'.round($netral,1).'</td>
                                                                  <td>'.$hi_netral.'</td>
                                                                  <td>'.round($maxi,1).'</td>
                                                                  <td>'.$hi_arus.'</td>                            	
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
                                <table class="table" id="tabel1a" width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
                              					<th>%Beban</th>																								
                              					<th>HI-Beban</th>
												<th>%Pincang</th>
                              					<th>HI-Pincang</th>
												<th>%Arus Netral</th>
												<th>HI-Arus Netral</th>	
												<th>%Arus Fasa Max</th>
												<th>HI-Arus</th>													
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_beban = $row["hi_beban"];
								if($hi_beban == 4){$hi_beban = 'Baik';}
								else if($hi_beban == 3){$hi_beban = 'Cukup';}
								else if($hi_beban == 2){$hi_beban = 'Kurang';}
								else if($hi_beban == 1){$hi_beban = 'Buruk';}
								else {$hi_beban = '-';}
								$beban1 = $row["beban1"];
								$beban2 = $row["beban2"];
								$beban= max($beban1,$beban2);
								$persen1 = $row["persen1"];
								$persen2 = $row["persen2"];
								$persen= max($persen1,$persen2);
								$hi_imbang = $row["hi_imbang"];
								if($hi_imbang == 4){$hi_imbang = 'Baik';}
								else if($hi_imbang == 3){$hi_imbang = 'Cukup';}
								else if($hi_imbang == 2){$hi_imbang = 'Kurang';}
								else if($hi_imbang == 1){$hi_imbang = 'Buruk';}
								else {$hi_imbang = '-';}
								$imbang1 = $row["imbang"];
								$imbang2 = $row["imbang2"];
								$imbang= max($imbang1,$imbang2);
								$netral1 = $row["netral1"];
								$netral2 = $row["netral2"];
								$netral= max($netral1,$netral2);
								$hi_netral = $row["hi_netral"];
								
								if($hi_netral== 4){$hi_netral = 'Baik';}
								else if($hi_netral == 3){$hi_netral = 'Cukup';}
								else if($hi_netral == 2){$hi_netral = 'Kurang';}
								else if($hi_netral == 1){$hi_netral = 'Buruk';}
								else {$hi_netral = '-';}
								
								$maxi_1 = $row["maxi_1"];
								$maxi_2 = $row["maxi_2"];
								$maxi= max($maxi_1,$maxi_2);
								$hi_arus = $row["hi_arus"];
								
								if($hi_arus== 4){$hi_arus = 'Baik';}
								else if($hi_arus == 3){$hi_arus = 'Cukup';}
								else if($hi_arus == 2){$hi_arus = 'Kurang';}
								else if($hi_arus == 1){$hi_arus = 'Buruk';}
								else {$hi_arus = '-';}
                               echo '  
                                                           <tr align="center">  
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet1a">'.$row["kodegd"].'</a></td>  
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                  <td >'.round($persen,1).'</td>  																  
                                                                  <td>'.$hi_beban.'</td>  
                                                                  <td>'.round($imbang,1).'</td>
                                                                  <td>'.$hi_imbang.'</td>
                                                                  <td>'.round($netral,1).'</td>
                                                                  <td>'.$hi_netral.'</td>
                                                                  <td>'.round($maxi,1).'</td>
                                                                  <td>'.$hi_arus.'</td>  																	  
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
					<div class="col-lg-12">
                        <!-- Example Pie Chart Card-->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-table"></i> Daftar Tier 1 - Inspeksi Visual
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
                                '<table class="table" id="tabel1b" width="100%" cellspacing="0">
                                            <thead>
                                              <tr  align="center">
											  <th>No. </th>
													<th>Area</th>
                              					<th>Rayon</th>
												  <th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
                              					<th>Kondisi Minyak</th>
                              					<th>Kondisi Fisik</th>
												<th>Kondisi PHB-TR</th>	
												<th>Grounding</th>
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr  align="center">
											  <th>No. </th>
													<th>Area</th>
                              					<th>Rayon</th>
												  <th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
                              					<th>Kondisi Minyak</th>
                              					<th>Kondisi Fisik</th>
												<th>Kondisi PHB-TR</th>	
												<th>Grounding</th>
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_1b_oil = $row["hi_1b_oil"];
								if($hi_1b_oil == 4){$hi_1b_oil = 'Baik';}
								else if($hi_1b_oil == 3){$hi_1b_oil = 'Cukup';}
								else if($hi_1b_oil == 2){$hi_1b_oil = 'Kurang';}
								else if($hi_1b_oil == 1){$hi_1b_oil = 'Buruk';}
								else {$hi_1b_oil = '-';}


								$hi_1b_fisik = $row["hi_1b_fisik"];
								if($hi_1b_fisik == 4){$hi_1b_fisik = 'Baik';}
								else if($hi_1b_fisik == 3){$hi_1b_fisik = 'Cukup';}
								else if($hi_1b_fisik == 2){$hi_1b_fisik = 'Kurang';}
								else if($hi_1b_fisik == 1){$hi_1b_fisik = 'Buruk';}
								else {$hi_1b_fisik = '-';}
								
								
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
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet1b">'.$row["kodegd"].'</a></td>    
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                  <td>'.$hi_1b_oil.'</td>  
                                                                  <td>'.$hi_1b_fisik.'</td>
                                                                  <td>'.$hi_1b_phb.'</td>
                                                                  <td>'.$hi_ground.'</td>  		
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
                               ' <table class="table" id="tabel1b" width="100%" cellspacing="0">
                                            <thead>
                                              <tr  align="center">
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
												<th>Kapasitas/Fasa</th>
                              					<th>Kondisi Minyak</th>
                              					<th>Kondisi Fisik</th>
												<th>Kondisi PHB-TR</th>	
												<th>Grounding</th>													
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr  align="center">
											  <th> No. </th>
                              					<th>Rayon</th>
                              					<th>Kode Gardu</th>
												<th>Kapasitas/Fasa</th>
                              					<th>Kondisi Minyak</th>
                              					<th>Kondisi Fisik</th>
												<th>Kondisi PHB-TR</th>		
												<th>Grounding</th>	                                                  
                                              </tr>
                                            </tfoot>
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_1b_oil = $row["hi_1b_oil"];
								if($hi_1b_oil == 4){$hi_1b_oil = 'Baik';}
								else if($hi_1b_oil == 3){$hi_1b_oil = 'Cukup';}
								else if($hi_1b_oil == 2){$hi_1b_oil = 'Kurang';}
								else if($hi_1b_oil == 1){$hi_1b_oil = 'Buruk';}
								else {$hi_1b_oil = '-';}

								$hi_1b_fisik = $row["hi_1b_fisik"];
								if($hi_1b_fisik == 4){$hi_1b_fisik = 'Baik';}
								else if($hi_1b_fisik == 3){$hi_1b_fisik = 'Cukup';}
								else if($hi_1b_fisik == 2){$hi_1b_fisik = 'Kurang';}
								else if($hi_1b_fisik == 1){$hi_1b_fisik = 'Buruk';}
								else {$hi_1b_fisik = '-';}
								
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
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet1b">'.$row["kodegd"].'</a></td>  
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                 <td>'.$hi_1b_oil.'</td>  
                                                                  <td>'.$hi_1b_fisik.'</td>
                                                                  <td>'.$hi_1b_phb.'</td>
                                                                  <td>'.$hi_ground.'</td>  		                           	
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
                                <table class="table" id="tabel1b" width="100%" cellspacing="0">
                                            <thead>
                                              <tr align="center">
                              					<th>Kode Gardu</th>
                              					<th>Kapasitas/Fasa</th>
                              					<th>Kondisi Minyak</th>
                              					<th>Kondisi Fisik</th>
												<th>Kondisi PHB-TR</th>	
												<th>Grounding</th>													
                                              </tr>
                                            </thead>
                                           
                                            <tbody> ';
                              
                                
                                while ($row = @mysqli_fetch_assoc($result)){
								$hi_1b_oil = $row["hi_1b_oil"];
								if($hi_1b_oil == 4){$hi_1b_oil = 'Baik';}
								else if($hi_1b_oil == 3){$hi_1b_oil = 'Cukup';}
								else if($hi_1b_oil == 2){$hi_1b_oil = 'Kurang';}
								else if($hi_1b_oil == 1){$hi_1b_oil = 'Buruk';}
								else {$hi_1b_oil = '-';}


								$hi_1b_fisik = $row["hi_1b_fisik"];
								if($hi_1b_fisik == 4){$hi_1b_fisik = 'Baik';}
								else if($hi_1b_fisik == 3){$hi_1b_fisik = 'Cukup';}
								else if($hi_1b_fisik == 2){$hi_1b_fisik = 'Kurang';}
								else if($hi_1b_fisik == 1){$hi_1b_fisik = 'Buruk';}
								else {$hi_1b_fisik = '-';}
								
								
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
                              									<td><a href=# data-toggle="modal" data-id="'.base64_encode(78484899*$kali*$row["idgardu"]).'" data-target="#modDet1b">'.$row["kodegd"].'</a></td>  
                                                                  <td>'.$row["kapasitas"].'/'.$row["fasa"].'</td> 
                                                                  <td>'.$hi_1b_oil.'</td>  
                                                                  <td>'.$hi_1b_fisik.'</td>
                                                                  <td>'.$hi_1b_phb.'</td>
                                                                  <td>'.$hi_ground.'</td>  																	  
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

            <!-- Detail Health Index Tier 1a-->
            <div class="modal fade" id="modDet1a" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="det1a-data">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Health Index Tier 1b-->
            <div class="modal fade" id="modDet1b" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="det1b-data">
                        </div>
                    </div>
                </div>
            </div>

			            <!-- Cari Health Index-->
            <div class="modal fade" id="findHI1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="carihi1-data">
                        </div>
                    </div>
                </div>
            </div>	

			            <!-- Cari Jadwal Assesment-->
            <div class="modal fade" id="findAss1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="carijad1-data">
                        </div>
                    </div>
                </div>
            </div>	

						            <!-- Cari Nilai Assesment-->
            <div class="modal fade" id="carinilait1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="carinilait1-data">
                        </div>
                    </div>
                </div>
            </div>	
			
            <!-- HI 1a Modal-->

            <div class="modal fade" id="modHI1a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="card">
                            <div class="card-header">
                                <a class="modal-title" id="exampleModalLabel"><i class= "fa fa-pie-chart " ></i>   Health Index Load Profile</a>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                  </button>
                            </div>
                            <div class="card-body">
                                <form role="form" class="registration-form" action="javascript:void(0);">
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Pembebanan</span></p>
                                        </div>
                                        <canvas id="beban" style="width:50%; height:100px"></canvas> <br/>
                                        <button type="button" class="btn btn-primary float-right ">></button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Ketidakseimbangan Beban</span></p>
                                        </div>
                                        <canvas id="imbang" style="width:50%; height:100px"></canvas><br/>
                                        <button type="button" class="btn btn-info"><</button>
                                        <button type="button" class="btn btn-primary float-right">></button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>% Beban Netral</span></p>
                                        </div>
                                        <canvas id="netral" style="width:50%; height:100px"></canvas><br/>
                                        <button type="button" class="btn btn-info"><</button>
                                        <button type="button" class="btn btn-primary float-right">></button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>% Beban Fasa Max</span></p>
                                        </div>
                                        <canvas id="outlet" style="width:50%; height:100px"></canvas><br/>
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

            <!-- HI 1b Modal-->

            <div class="modal fade" id="modHI1b" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="card">
                            <div class="card-header">
                                <a class="modal-title" id="exampleModalLabel"><i class= "fa fa-pie-chart " ></i>   Health Index Inspeksi Visual</a>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                  </button>
                            </div>
                            <div class="card-body">
                                <form role="form" class="registration-form" action="javascript:void(0);">
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Kondisi Minyak</span></p>
                                        </div>
                                        <canvas id="minyak1b2" style="width:50%; height:100px"></canvas> <br/>
                                        <button type="button" class="btn btn-primary float-right ">></button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Kondisi Fisik Trafo</span></p>
                                        </div>
                                        <canvas id="fisik1b" style="width:50%; height:100px"></canvas><br/>
                                        <button type="button" class="btn btn-info"><</button>
                                        <button type="button" class="btn btn-primary float-right">></button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Pentanahan</span></p>
                                        </div>
                                        <canvas id="grounding" style="width:50%; height:100px"></canvas><br/>
                                        <button type="button" class="btn btn-info"><</button>
                                        <button type="button" class="btn btn-primary float-right">></button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-top">
                                            <p><span>Kondisi PHB-TR</span></p>
                                        </div>
                                        <canvas id="phbtr" style="width:50%; height:100px"></canvas><br/>
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
        <script src="../../js/hi_1.js" type="text/javascript"></script>
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
                  display: true,
            	  position: 'right'
                }
              }
            });
            var promisedDeliveryChart = new Chart(document.getElementById('beban2'), {
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
            
            var promisedDeliveryChart = new Chart(document.getElementById('imbang'), {
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
            
            var promisedDeliveryChart = new Chart(document.getElementById('netral'), {
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
            
            var promisedDeliveryChart = new Chart(document.getElementById('outlet'), {
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
                "Bersih",
                "Packing Retak",
                "Retak dan Berminyak",
                "Tetes",
            	"Belum"
              ],
              datasets: [
                {
                  data: [<?php echo json_encode($baik5); ?>, <?php echo json_encode($cukup5); ?>, <?php echo json_encode($kurang5); ?>, <?php echo json_encode($buruk5); ?>, <?php echo json_encode($belum5); ?>],
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
            
            var promisedDeliveryChart = new Chart(document.getElementById('minyak1b'), {
              type: 'doughnut',
              data: data,
              options: {
              	responsive: true,
                legend: {
                  display: true,
            	  position: 'top'
                }
              }
            });
            
            var promisedDeliveryChart = new Chart(document.getElementById('minyak1b2'), {
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
                "Mulus",
                "Cacat Sirip Minor",
                "Cacat Sirip Mayor",
                "Bengkak",
            	"Belum"
              ],
              datasets: [
                {
                  data: [<?php echo json_encode($baik6); ?>, <?php echo json_encode($cukup6); ?>, <?php echo json_encode($kurang6); ?>, <?php echo json_encode($buruk6); ?>, <?php echo json_encode($belum6); ?>],
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
            
            var promisedDeliveryChart = new Chart(document.getElementById('fisik1b'), {
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
                  data: [<?php echo json_encode($baik7); ?>, <?php echo json_encode($cukup7); ?>, <?php echo json_encode($kurang7); ?>, <?php echo json_encode($buruk7); ?>, <?php echo json_encode($belum7); ?>],
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
            
            var promisedDeliveryChart = new Chart(document.getElementById('grounding'), {
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
                "Box bersih - instalasi rapi",
                "Box kotor - instalasi rapi",
                "Box berkarat - instalasi rapi",
                "Box bocor - instalasi buruk",
            	"Belum"
              ],
              datasets: [
                {
                  data: [<?php echo json_encode($baik8); ?>, <?php echo json_encode($cukup8); ?>, <?php echo json_encode($kurang8); ?>, <?php echo json_encode($buruk8); ?>, <?php echo json_encode($belum8); ?>],
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
            
            var promisedDeliveryChart = new Chart(document.getElementById('phbtr'), {
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
         
            $('#tabel1a').DataTable( {
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
         
            $('#tabel1b').DataTable( {
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
$(function() {
    // Input radio-group visual controls
    $('.radio-group label').on('click', function(){
        $(this).removeClass('not-active').siblings().addClass('not-active');
    });
});
</script>