<?php
 include('../..//session.php'); 
 
if(isset($_POST)){
	$UP3 = $_POST['UP3'];
   $ULP = $_POST['ULP'];
   $bulan = $_POST['bulan'];	
   $tahun = $_POST['tahun'];
   $fgtm = $_POST['jenispadam'];;
 	 
   
?>

<div class="card-header"> <i class="fa fa-wrench"></i> Data FGTM 		  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
<canvas id="fgtmchart" style="width:50%; height: 300px">
</canvas>
                           <!-- Ini Isi Tabel-->			
                           <?php
							  $no=1;						   
                            if ($login_role == "admin")  
							{
								if ($UP3==12)
									{
                            $querychart="SELECT QUOTE(fgtm) AS fgtm, count(*) AS jlh
											FROM pemadaman2
											WHERE fgtm is not null AND MONTH(tanggalpadam)='$bulan' AND YEAR(tanggalpadam) = '$tahun'
											GROUP BY fgtm ORDER BY jlh DESC";
									}

							else if ($ULP==0 or $ULP=="") 
								{
                            $querychart="SELECT QUOTE(fgtm) AS fgtm, count(*) AS jlh
											FROM pemadaman2
											WHERE fgtm is not null AND MONTH(tanggalpadam)='$bulan' AND YEAR(tanggalpadam) = '$tahun' AND idup3 = '$UP3'
											GROUP BY fgtm ORDER BY jlh DESC";

								}

							else  
								{
                            $querychart=" SELECT QUOTE(fgtm) AS fgtm, count(*) AS jlh
											FROM pemadaman2
											WHERE fgtm is not null AND MONTH(tanggalpadam)='$bulan' AND YEAR(tanggalpadam) = '$tahun' AND idulp = '$ULP'
											GROUP BY fgtm ORDER BY jlh DESC";
								}
							}
							
	$sebab = $jlh = '';
	
	$result = mysqli_query($db, $querychart); 					
	while($row = $result->fetch_assoc())
	{
		
		$sebab .= $row['fgtm'] . ",";
		$jlh .= $row['jlh'] . ",";
	}
	
	$sebab = trim($sebab, ",");
	$jlh = trim($jlh, ",");
														
$resultchart = mysqli_query($db, $querychart);
$resultchart2 = mysqli_query($db, $querychart);
$resultchart3 = mysqli_query($db, $querychart);

?>		
</div>
</div>
<div class="card-footer small text-muted">&nbsp;</div>


<script>
var internalData = [<?= $jlh ?>];
var graphColors = [];
var graphOutlines = [];
var hoverColor = [];
</script>

<script>
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
            + (randomR - 120) + ", " 
            + (randomG - 20) + ", " 
            + (randomB - 200) + ")";
    graphOutlines.push(graphOutline);
    
    var hoverColors = "rgb(" 
            + (randomR + 25) + ", " 
            + (randomG + 25) + ", " 
            + (randomB + 25) + ")";
    hoverColor.push(hoverColors);
    
  i++;
};
</script>
	
<script type="text/javascript">
var fgtmCanvas = document.getElementById("fgtmchart");
var penyebab = {
  label: 'fgtm',
  data: [<?= $jlh ?>],
  lineTension: 0,
							fill: false,
							backgroundColor: graphColors,
							hoverBackgroundColor: hoverColor,
							borderColor: graphOutlines,							
							datalabels: {
								color: 'black',
								anchor: 'center',
								align: 'center',
								offset : 5
							}
						
							
						};
 

var datasebab = {
  labels: [<?= $sebab ?>],
  datasets: [penyebab]

};


var options = {
				    legend: {
					display: true,
					position: 'top',
					labels: {
					  boxWidth: 50,
					  fontColor: 'black'
					}
				  }
				};

var pieChartfgtm = new Chart(fgtmCanvas, {
  type: 'doughnut',
  data: datasebab,
	plugins : [ChartDataLabels],
  options: options

});
</script>


<?php } else {?> <script>$('#viewfgtm').on('hide.bs.modal');alert("Data Belum Lengkap!")</script><?php }?>
