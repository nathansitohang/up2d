
  			


<?php
 include('../..//session.php'); 
 
if(isset($_POST)){
 $UP3 = $_POST['UP3'];
   $ULP = $_POST['ULP'];
   $bulan = $_POST['bulan'];	
   $tahun = $_POST['tahun'];
   $fgtm = $_POST['fgtm'];
	 
   
?>

<div class="card-header"> <i class="fa fa-wrench"></i> Data FGTM 		  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
<canvas id="fgtmchart" style="width:100%; height: 300px">
</canvas>
                           <!-- Ini Isi Tabel-->			
                           <?php
							  $no=1;						   
                              if ($login_role == "admin")  {
								  if ($UP3==12)
									  {
                              $querychart=" 
					 SELECT * FROM ( SELECT
						  penyulang.no,
						  penyulang.feeder,
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
							
						  COUNT(pemadaman2.feeder) AS totalfgtm
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder and MONTH(pemadaman2.tanggalpadam)='$bulan' AND YEAR(pemadaman2.tanggalpadam) = '$tahun' and pemadaman2.fgtm='$fgtm'
WHERE penyulang.dtbs_pdm IN (1,2) GROUP BY penyulang.feeder, penyulang.up3  
ORDER BY totalfgtm DESC ) t WHERE t.totalfgtm <> 0";

}


						else if ($ULP==0 or $ULP=="") {
                              $querychart="
							  
					   SELECT * FROM (SELECT
						  penyulang.no,
						  penyulang.feeder,
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
 
						  COUNT(pemadaman2.feeder) AS totalfgtm
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder and MONTH(pemadaman2.tanggalpadam)='$bulan' AND YEAR(pemadaman2.tanggalpadam) = '$tahun' and pemadaman2.fgtm='$fgtm'
WHERE penyulang.idup3 = '$UP3' AND penyulang.dtbs_pdm IN (1,2) GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp ORDER BY totalfgtm DESC ) t WHERE t.totalfgtm <> 0";

}

							else  {
                              $querychart=" 
						 SELECT * FROM (SELECT
						  penyulang.no,
						  penyulang.feeder,
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
 
						  COUNT(pemadaman2.feeder) AS totalfgtm
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder and MONTH(pemadaman2.tanggalpadam)='$bulan' AND YEAR(pemadaman2.tanggalpadam) = '$tahun' and pemadaman2.fgtm='$fgtm'
WHERE penyulang.idulp = '$ULP' AND penyulang.dtbs_pdm IN (1,2) GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp order by totalfgtm DESC ) t WHERE t.totalfgtm <> 0";
}
}
$resultchart = mysqli_query($db, $querychart);
$resultchart2 = mysqli_query($db, $querychart);
$resultchart3 = mysqli_query($db, $querychart);

?>		
</div>
</div>
<div class="card-footer small text-muted">&nbsp;</div>

<script>
var internalData = [<?php while ($rowchart3 = mysqli_fetch_array($resultchart3)) { echo '"' . $rowchart3['totalfgtm'] . '",';}?>];
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
</script>	
<script type="text/javascript">
var fgtmCanvas = document.getElementById("fgtmchart");
var totalfeederData = {
  label: <?php echo '"'.$fgtm.'"'; ?> ,
  data: [<?php while ($rowchart = mysqli_fetch_array($resultchart)) { echo '"' . $rowchart['totalfgtm'] . '",';}?>],
  borderWidth: 1,
  backgroundColor: graphColors,
  hoverBackgroundColor: hoverColor,
  borderColor: graphOutlines

};
 

var feedData = {
  labels: [<?php while ($rowchart2 = mysqli_fetch_array($resultchart2)) { echo '"' . $rowchart2['feeder'] . '",';}?>],
  datasets: [totalfeederData],
};
var options = {
    scales: {
        yAxes: [{
            ticks: {
                fontSize: 12
            }
        }]
    },
	        scaleSteps : 10
};

var barfeedChart = new Chart(fgtmCanvas, {
  type: 'bar',
  data: feedData,
  options: options

});
 
</script>


<?php } else {?> <script>$('#viewfgtm').on('hide.bs.modal');alert("Data Belum Lengkap!")</script><?php }?>
