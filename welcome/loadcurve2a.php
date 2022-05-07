<?php
   include('../session.php');
   include('../config.php');

?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
	      <link href="..//css/sb-admin.css" rel="stylesheet">
      <link href="..//vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	        <link href="..//vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <style>      
      #loadcurve {
        height: 100%;
        width: 100%;
         margin: 0 auto 0 auto;
      }
      html, body {
        height: 100%;
      }
    </style>
      <link href="..//vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<script src="..//vendor/chart.js/Chart.min.js"></script>

  </head>
  <body>
  <div>
	<form role="form" class="registration-form" action="loadcurve2a.php" method= "post" action="javascript:void(0);">
			<div class="row">
					<div class="form-group col-md-5 col-sm-3">
							<select class="form-control" name="bulancurve">
							<option value="1">Jan</option>
							<option value="2">Feb</option>
							<option value="3">Mar</option>
							<option value="4">Apr</option>
							<option value="5">May</option>
							<option value="6">Jun</option>
							<option value="7">Jul</option>
							<option value="8">Aug</option>
							<option value="9">Sep</option>
							<option value="10">Oct</option>
							<option value="11">Nov</option>
							<option value="12">Dec</option>
							</select>
					</div>
					<div class="form-group col-md-5 col-sm-3">
							<select class="form-control" id="thncurve">
							<option value="2022">2022</option>
							<option value="2021">2021</option>
							<option value="2020">2020</option>
							</select>
					</div>
					<div class="form-group col-md-5 col-sm-3">
			                  <button class="btn btn-primary" onclick="Gaspol()">Show</button>							
					</div>
			</div>
	</form>
	</div>
	
	
    <iframe src="loadcurve3.php" style="width:100%; height: 400px" scrolling="no" frameborder="0"
    style="position: relative; height: 100%; width: 100%;"></iframe>
                   

</body>		
</html>