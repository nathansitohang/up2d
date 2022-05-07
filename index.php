<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="img/logo_pln.jpg">
      <title>SiODis</title>
	  
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/sb-admin.css" rel="stylesheet">


<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-75591362-1', 'auto');
ga('send', 'pageview');
</script>




	  
	  
      <div class="site-wrapper">
         <div class="site-wrapper-inner">
            <div class="cover-container">
               <div class="masthead clearfix">
                  <div class="inner">
                     <h3 class="masthead-brand">Welcome, <?php echo $login_session; ?></h3>
                  </div>
               </div>
			   		
               <div class="inner cover">
                  <h1 class="cover-heading"><b> <font color="#0080b8"> S</font><font color="red">i</font><font color="#0080b8">ODis</font> <font color="yellow">v1.0</font> </b></h1>
                  <p class="lead"><font color="#fffff">SiODis atau Sistem Informasi Operasi Distribusi digunakan untuk memonitor kondisi aset distribusi PT PLN (Persero) UP2D Sumatera Utara</font>
                     <br>		<br>
                     Silahkan masuk!
                  </p>
				  <?php
				  if ($kali == 79)
				  {
					  echo '
				<form action="insert.php" method="post">  
				  <div class="row">
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher1">Dispatcher 1</label>
								<input  type="text" class="form-control" placeholder="Dispatcher 1" value="'.$dispa1.'"  name="dispatcher1" >
							</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher2">Dispatcher 2</label>
								<input type="text" class="form-control" placeholder="Dispatcher 2" value="'.$dispa2.'"  name="dispatcher2" >
						</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher3">Dispatcher 3</label>
								<input  type="text" class="form-control" placeholder="Dispatcher 3" value="'.$dispa3.'"  name="dispatcher3" >
						</div>
					</div> 
                        <input type="submit" class="btn btn-lg btn-info" name="submit" value="ENTER">
					 <p class="lead"><a href="logout.php">Logout</a></p>
				  </form>';
				  }
				  else 
				  {
					  echo '
					  <p class="lead"><a class="btn btn-lg btn-info" href="welcome">ENTER</a>
				          <p class="lead"><a href="logout.php">Logout</a></p>';

				  }
					?>
               </div>
               <div class="mastfoot">
                  <div class="inner">
                     <!-- Validation -->
                     <p><a href=
                        "#"
                        target="_blank"><small>Hubungi Administrator</small></a></p>
                     <p>&copy 2022 UP2D Sumut <a href=
                        "http://www.pln.co.id">PT PLN (Persero)</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  
	  <style>
       a,a:focus,a:hover{color:#fff}.btn-default,.btn-default:focus,.btn-default:hover{color:#333;text-shadow:none;background-color:#fff;border:1px solid #fff}body,html{background:url(https://1.bp.blogspot.com/-vr-n-ZNoYng/YAEfsVs0zFI/AAAAAAAAenE/bjsmjzhLA3oRbpKij7mBAbZZniUsPHTQACK4BGAYYCw/s1600/IMG_20210115_114552-784300.jpg) no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;height:100%;background-color:#29414c;color:#fff;text-align:center;text-shadow:0 1px 3px rgba(0,0,0,.5)}.site-wrapper{display:table;width:100%;height:100%;min-height:100%;-webkit-box-shadow:inset 0 0 100px rgba(0,0,0,.5);box-shadow:inset 0 0 100px rgba(0,0,0,.5)}.site-wrapper-inner{display:table-cell;vertical-align:top}.cover-container{margin-right:auto;margin-left:auto}.inner{padding:30px}.masthead-brand{margin-top:10px;margin-bottom:10px}.masthead-nav>li{display:inline-block}.masthead-nav>li+li{margin-left:20px}.masthead-nav>li>a{padding-right:0;padding-left:0;font-size:16px;font-weight:700;color:#fff;color:rgba(255,255,255,.95);border-bottom:2px solid transparent}.masthead-nav>li>a:focus,.masthead-nav>li>a:hover{background-color:transparent;border-bottom-color:#a9a9a9;border-bottom-color:rgba(255,255,255,.25)}.masthead-nav>.active>a,.masthead-nav>.active>a:focus,.masthead-nav>.active>a:hover{color:#fff;border-bottom-color:#fff}@media (min-width:768px){.masthead-brand{float:left}.masthead-nav{float:right}}.cover{padding:0 20px}.cover .btn-lg{padding:10px 20px;font-weight:700}.mastfoot{color:#999;color:rgba(255,255,255,.5)}@media (min-width:768px){.masthead{position:fixed;top:0}.mastfoot{position:fixed;bottom:0}.site-wrapper-inner{vertical-align:middle}.cover-container,.mastfoot,.masthead{width:100%}}@media (min-width:992px){.cover-container,.mastfoot,.masthead{width:700px}}
      </style>
</html>
