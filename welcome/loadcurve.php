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
	<form role="form" class="registration-form" method= "post" action="javascript:void(0);">
			<div class="row">
					<div class="form-group col-md-5 col-sm-3">
							<select class="form-control" id="bulancurve">
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
			                <button class="btn btn-primary" onclick="InsertPadam()">Show</button>							
					</div>
			</div>
	</form>
	</div>
                           <div class="col-sm-12 my-auto">
                              <canvas id="loadcurve" width="100" height="50"></canvas>
                           </div>
                     </div>
					 
					 
    <script>
	
	
	
function InsertPadam(){	
var lcCanvas = document.getElementById("loadcurve");
<?php 
$load=2;
$loadsiang = mysqli_query($db, "SELECT siang FROM loadcurve WHERE month (tanggal) = '".$load."'");?>

var siang = {
	label: 'lwbp',
	data: [<?php while ($row = mysqli_fetch_array($loadsiang)) { echo '"' . $row['siang'] . '",';}?>],
    lineTension: 0.1,
    fill: false,
    borderColor: 'yellow',
    backgroundColor: 'transparent',
    pointBorderColor: 'yellow',
    pointBackgroundColor: 'yellow'
};


<?php $loadmalam = mysqli_query($db, "SELECT malam FROM loadcurve WHERE month (tanggal) = '".$load."'");
?>
var malam = {
	label: 'wbp',
	data: [<?php while ($row = mysqli_fetch_array($loadmalam)) { echo '"' . $row['malam'] . '",';}?>],
	lineTension: 0.1,
    fill: false,
    borderColor: 'green',
    backgroundColor: 'transparent',
    pointBorderColor: 'green',
    pointBackgroundColor: 'green'
};

var tanggal = {
  labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
  datasets: [siang, malam],
};




var lineChart = new Chart(lcCanvas, {
  type: 'line',
  data: tanggal
  
  });	
}
	
	
	
	
	
	
	

</script>

      <script src="..//js/sb-admin.min.js"></script>



  </body>
</html>