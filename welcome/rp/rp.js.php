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





		var gas = {
						label: 'penyulang',
						data: [<?= $tottrip ?>],
						datalabels: {
								color: 'yellow',
								anchor: 'top',
								align: 'center',
								offset : 2
							},
						fill: false,
						backgroundColor: graphColors,
						hoverBackgroundColor: hoverColor,
						borderColor: graphOutlines
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
		
			
			// Chart data with page load
			myData = {
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
					data: {'bulan':bulan,'tahun':tahun,'up3':up3,'ulp':ulp,
					},
					success: function(e){
						// Delete previous chart
						myChart.destroy();
						//Draw new chart with Ajax data
						myChart = new Chart(ctx, {
							type: 'bar',    // Define chart type
							data: e, 
							plugins: [ChartDataLabels],
							options : chartOptions
						});
					}
				});
			});

var sbbggnCanvas = document.getElementById("sebabggn");
var totalfeederData = {
  label: 'top 20',
  data: [<?php while ($rt11 = mysqli_fetch_array($resulttop11)) { echo '"' . $rt11['total'] . '",';}?>],
  borderWidth: 1,
  backgroundColor: graphColors,
  hoverBackgroundColor: hoverColor,
  borderColor: graphOutlines

};
 

var feedData = {
  labels: [<?php while ($rtdata = mysqli_fetch_array($resulttop12)) { echo '"' . $rtdata['feeder'] . '",';}?>],
  datasets: [totalfeederData],
};
var options = {
	responsive: true,
    scales: {
        xAxes: [{
            ticks: {
				beginAtZero: true
            }
        }]
    },
	        scaleSteps : 10
};



var toptenChart = new Chart(sbbggnCanvas, {
  type: 'doughnut',
  data: feedData,
  options: options

});
</script>
