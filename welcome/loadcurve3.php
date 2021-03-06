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
 
	
	
                           <div class="col-sm-12 my-auto">
                              <canvas id="loadcurve" width="100" height="50"></canvas>
                           </div>
                   
<script>




var lcCanvas = document.getElementById("loadcurve");
<?php
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


<?php $loadmalam = mysqli_query($db, "SELECT malam FROM loadcurve WHERE month (tanggal) = 2 ");
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
</script>







<script>
const data1 = 55;
const data2 = 11;
const data = {
  labels: ['data1', 'data2'],
    datasets: [{ // index 0
      label: 'Amount',
      data: [data1, data2],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',  
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
      ],
      borderWidth: 1
    }]

  };

// config block
const config = {
  type: 'doughnut',
    data: data,
    options: {
    scales: {}
  }
};

// render /init block      
const myChart = new Chart(
  document.getElementById('myChart'),
  config
);

const value1 = document.getElementById('value1');
const value2 = document.getElementById('value2');
value1.value = data1;
value2.value = data2;

const updateChart = document.getElementById('updateChart');
updateChart.addEventListener('click', updateDoughnutChart);

function updateDoughnutChart(){
  myChart.data.datasets[0].data[0] = value1.value;
  myChart.data.datasets[0].data[1] = value2.value;
  myChart.update();
}


</script>

</body>		
</html>