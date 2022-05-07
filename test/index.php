<?php
	// DB connection
	$conn = new mysqli("localhost", "root", "", "sihd");
	
	// Assign variables
	$labels = $datas = "";
	
	// Select query to fetch data with page load
	$sql = "select data, value from chart where type = 1";
	$result = $conn->query($sql);
	
	// Create data in comma seperated string
	while($row = $result->fetch_assoc()){
		$labels .= "'" . $row['data'] . "',";
		$datas .= $row['value'] . ",";
	}
	
	// Remove the last comma from the string
	$lbl = trim($labels, ",");
	$val = trim($datas, ",");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bar Chart</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  </head>
	<body>
		<select name="option" id="option">
			<option value="1">Language</option>
			<option value="2">IDE</option>
		</select>
        <div class="chart-container" style="position: relative; width:80vw">
            <canvas id="my_Chart"></canvas>
        </div>
		<script>
			var lbl = [<?= $lbl ?>]; // Get Labels from php variable
			var val = [<?= $val ?>]; // Get Data from php variable
			// Chart data with page load
			myData = {
				labels: lbl,
				datasets: [{
					label: "Chart.JS",
					fill: false,
					backgroundColor: ['#ff0000', '#ff4000', '#ff8000', '#ffbf00', '#ffbf00', '#ffff00', '#bfff00', '#80ff00'],
					borderColor: 'black',
					data: val,
				}]
			};
			// Draw default chart with page load
			var ctx = document.getElementById('my_Chart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',    // Define chart type
				data: myData    // Chart data
			});
			// Draw chart with Ajax request
			$('#option').on('change', function (e) {
				var type = this.value;
				$.ajax({
					url: 'getdata.php',
					dataType: 'json',
					data: {'id':type},
					success: function(e){
						// Delete previous chart
						myChart.destroy();
						//Draw new chart with Ajax data
						myChart = new Chart(ctx, {
							type: 'bar',    // Define chart type
							data: e    		// Chart data
						});
					}
				});
			});
		</script>
	</body>
</html>