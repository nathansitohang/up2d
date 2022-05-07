<?php
	// DB connection
	$conn = new mysqli("localhost", "root", "", "sihd");
	
	// Assign variables
	$labels = $datas = $siang = $malam =  "";
	
	// Select query to fetch data with page load
	$sql = "select siang, malam from loadcurve where month (tanggal) = MONTH(CURRENT_DATE()) AND year(tanggal) = YEAR(CURRENT_DATE())";
	$result = $conn->query($sql);
	
	// Create data in comma seperated string
	while($row = $result->fetch_assoc()){
		$labels .= "'" . $row['siang'] . "',";
		$datas .= $row['malam'] . ",";
		$siang .= $row['siang'] . ",";
		$malam .= $row['malam'] . ",";

	}
	
	// Remove the last comma from the string
	$lbl = trim($labels, ",");
	$val = trim($datas, ",");
	$valsiang = trim($siang, ",");
	$valmalam = trim($malam, ",");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	   <link href="..//css/sb-admin.css" rel="stylesheet">
      <link href="..//vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <script src="../vendor/jquery/jquery.min.js"></script>
	<script src="../vendor/chart.js/Chart.min.js"></script>
  </head>
	<body>
				<div class="row">

		<div class="form-group col-md-5 col-sm-3">
		<select class="form-control" name="option" id="bulan">
							 <?php
                    $month = !empty( $_GET['month'] ) ? $_GET['month'] : 0;
					
                    for ($i = 0; $i <= 12; ++$i) {
                        $time = strtotime(sprintf('+%d months', $i));
                        $label = date('F', $time);
                        $value = date('m', $time);

                        $selected = ( $value==$month ) ? ' selected=true' : '';

                        printf('<option value="%s"%s>%s</option>', $value, $selected, $label );
                    }
                ?>
		</select>
		</div>
		<div class="form-group col-md-5 col-sm-3">
		<select class="form-control" name="option" id="tahun">
			<option value="2022">2022</option>
			<option value="2021">2021</option>
		</select>
		</div>
		<div class="form-group col-md-5 col-sm-3">
		<button class="btn btn-primary" id="submit">Show</button>							
		</div>
		</div>
		
		                   <div class="col-sm-12 my-auto">
                              <canvas id="my_Chart" width="100" height="50"></canvas>
                           </div>
						   

		<script>
			var lbl = [<?= $lbl ?>]; // Get Labels from php variable
			var val = [<?= $val ?>]; // Get Data from php variable
			
			var siang = {
							label: 'lwbp',
							data: [<?= $valsiang ?>],
							lineTension: 0.1,
							fill: false,
							borderColor: 'yellow',
							backgroundColor: 'yellow',
							pointBorderColor: 'yellow',
							pointBackgroundColor: 'yellow'
						};

			var malam = {
							label: 'wbp',
							data: [<?= $valmalam ?>],
							lineTension: 0.1,
							fill: false,
							borderColor: 'green',
							backgroundColor: 'green',
							pointBorderColor: 'green',
							pointBackgroundColor: 'green'
						};			
			
			
			// Chart data with page load
			myData = {
				labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
				datasets: [siang, malam]
			};
			// Draw default chart with page load
			var ctx = document.getElementById('my_Chart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'line',    // Define chart type
				data: myData    // Chart data
			});
			// Draw chart with Ajax request
			
			$('#submit').on('click', function (e) 
			{
				var bulan = $("#bulan").val();
				var tahun = $("#tahun").val();
				
				$.ajax({
					url: 'getdata.php',
					dataType: 'json',
					data: {'bulan':bulan,'tahun':tahun,
					},
					success: function(e){
						// Delete previous chart
						myChart.destroy();
						//Draw new chart with Ajax data
						myChart = new Chart(ctx, {
							type: 'line',    // Define chart type
							data: e    		// Chart data
						});
					}
				});
			});

		</script>
		      <script src="..//js/sb-admin.min.js"></script>
			 

	</body>
</html>
