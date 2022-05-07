<script type="text/javascript">
var feedCanvas = document.getElementById("penyulangchart");
var totalfeederData = {
  label: 'penyulang',
  data: [<?php while ($row = mysqli_fetch_array($totfeeder)) { echo '"' . $row['totfeeder'] . '",';}?>],
  borderWidth: 1,
  backgroundColor: graphColors,
  hoverBackgroundColor: hoverColor,
  borderColor: graphOutlines

};
 

var feedData = {
  labels: [<?php while ($row = mysqli_fetch_array($feederup3)) { echo '"' . $row['feederup3'] . '",';}?>],
  datasets: [totalfeederData],
	datalabels: {
	  color: 'yellow',
	  anchor:'end',
	  align:'right' 
  }
};
var options = {
	indexAxis: 'y',
    scales: {
        yAxes: [{
            ticks: {
                fontSize: 12
            }
        }]
    },
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

<script type="text/javascript">
     var data = {
  labels: [
    <?php while ($row = mysqli_fetch_array($merk)) { echo '"' . $row['merk_cub'] . '",';}?>
  ],
  datasets: [
    {
     data: [
	 <?php while ($row = mysqli_fetch_array($totmerk)) { echo '"' . $row['totmerk'] . '",';}?>
	 ],
  borderWidth: 1,
  backgroundColor: graphColors,
  hoverBackgroundColor: hoverColor,
  borderColor: graphOutlines
    }]
};

var promisedDeliveryChart = new Chart(document.getElementById('merkcub'), {
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

<script>
	
var cubCanvas = document.getElementById("cubiclechart");


<?php $totcub = mysqli_query($db, "SELECT up3, COUNT(*) as totcub FROM kubikel GROUP BY up3 ORDER BY idup3 asc");
?>
var densityData = {
  label: 'unit',
  data: [<?php while ($row = mysqli_fetch_array($totcub)) { echo '"' . $row['totcub'] . '",';}?>],
  borderWidth: 1,
  backgroundColor: graphColors,
  hoverBackgroundColor: hoverColor,
  borderColor: graphOutlines,
  

};


<?php $area = mysqli_query($db, "SELECT DISTINCT up3 FROM kubikel order by idup3 asc");	?>
var cubData = {
  labels: [<?php while ($row = mysqli_fetch_array($area)) { echo '"' . $row['up3'] . '",';}?>],
  datasets: [densityData]
  
  
  
};
var options = {
	
	
    scales: {
        yAxes: [{
            ticks: {
                fontSize: 12
            }
        }]
    },
	        scaleSteps : 1
};

var barChart = new Chart(cubCanvas, {
  type: 'bar',
  data: cubData,
  options: options

});
</script>

<script type="text/javascript">
<?php $kpoint = mysqli_query($db, "SELECT DISTINCT up3 as kpoint FROM penyulang where kode_aset IN (6,7,8,9) order by idup3 asc;")
?><?php $totkp = mysqli_query($db, "SELECT up3, COUNT(*) as totkp FROM penyulang where kode_aset IN (6,7,8,9) GROUP BY up3 ORDER BY idup3 asc");
?>

  var data = {
  labels: [
    <?php while ($row = mysqli_fetch_array($kpoint)) { echo '"' . $row['kpoint'] . '",';}?>
  ],
  datasets: [
    {
     data: [
	 <?php while ($row = mysqli_fetch_array($totkp)) { echo '"' . $row['totkp'] . '",';}?>
	 ],
  borderWidth: 1,
  backgroundColor: graphColors,
  hoverBackgroundColor: hoverColor,
  borderColor: graphOutlines
    }]
};

var promisedDeliveryChart = new Chart(document.getElementById('kpchart'), {
  type: 'pie',
  data: data,
  plugins: [ChartDataLabels],
  options: {
  	responsive: true,
    legend: {
      display: true
	  
    }
  }
});
</script>