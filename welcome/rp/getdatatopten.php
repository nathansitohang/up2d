<?php
   include('../../session.php');
   include('../../config.php');
	// DB connection


	if(isset($_GET['bulan']) && $_GET['bulan'] != '')
	{
$UP3 = $_GET['up3'];
$ULP = $_GET['ulp'];
$bulan = $_GET['bulan'];	
$tahun = $_GET['tahun'];









							 if ($UP3==12)
									  {
						$querytop10=" SELECT
						  penyulang.no,
						  penyulang.feeder,
						  QUOTE(penyulang.feeder) as feederkutip,
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
						 
 
						  COUNT(pemadaman2.feeder) AS total
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 
and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1 
and penyulang.feeder = pemadaman2.feeder AND MONTH(pemadaman2.tanggalpadam) = '$bulan' 
AND year(pemadaman2.tanggalpadam) = '$tahun' AND pemadaman2.idup3 <> 99999
WHERE penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp order by total desc LIMIT 10";
									  
									  }
									  
						else if ($ULP==0 or $ULP=="")
									  {
						$querytop10=" SELECT
						  penyulang.no,
						  penyulang.feeder,
						  QUOTE(penyulang.feeder) as feederkutip,
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
						 
 
						  COUNT(pemadaman2.feeder) AS total
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder 
AND MONTH(pemadaman2.tanggalpadam) = '$bulan' AND year(pemadaman2.tanggalpadam) = '$tahun' AND pemadaman2.idup3 = '$UP3' 
AND pemadaman2.idup3 <> 99999
and pemadaman2.tripkembali <> 1
and pemadaman2.status = 1
WHERE penyulang.idup3 = '$UP3' AND penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp order by total desc LIMIT 10";
									  
									  }			  
									
										else
									  {
						$querytop10=" SELECT
						  penyulang.no,
						  penyulang.feeder,
						  QUOTE(penyulang.feeder) as feederkutip,
						  penyulang.jns_cb,
						  penyulang.kode_aset,
						  penyulang.dtbs_pdm,
						  penyulang.up3,
						  penyulang.ulp,
						 
 
						  COUNT(pemadaman2.feeder) AS total
						  FROM penyulang 


LEFT JOIN pemadaman2 ON  pemadaman2.jenispadam = 2 and penyulang.feeder = pemadaman2.feeder 
AND MONTH(pemadaman2.tanggalpadam) = '$bulan' AND year(pemadaman2.tanggalpadam) = '$tahun' 
AND pemadaman2.idup3 = '$UP3' AND pemadaman2.idup3 <> 99999
and pemadaman2.tripkembali <> 1
and pemadaman2.status = 1
WHERE penyulang.idulp = '$ULP' AND penyulang.dtbs_pdm IN (1,2) 
GROUP BY penyulang.no,penyulang.feeder, penyulang.up3, penyulang.ulp order by total desc LIMIT 5";
									  
									  }  



		$penyulang []  = '';
        $resulttop10 = mysqli_query($db, $querytop10); 				
		while($row = $resulttop10->fetch_assoc())
	{
		
		$tottrip[] = $row['total'];
		$feeder[] = $row['feeder'];
		

	}
	
		
		
		// Chart data for ajax request
		$data = 
		array(
			'labels' => $feeder,
			'datasets' => [ array (
			'label' => "penyulang",
			'data' => $tottrip,
			'datalabels' => array (
								'color' => 'yellow',
								'anchor' => 'top',
								'align' => 'center',
								'offset' => 2
			),
			'backgroundColor' => ['#6ABFE0', '#BB8A22', '#DA04AB','#2BE040', '#6227A2', '#5A5607','#1EEE6E', '#097B80', '#8D5A4E','#F08385'],
			'hoverBackgroundColor'=> ['#F08385', '#097B80', '#6ABFE0','#7A2787', '#DA04AB', '#8D5A4E','#6227A2', '#5A5607', '#BB8A22','#2BE040'],
			'borderColor'=> ['#ff0000', '#aaff00', '#12ff00','#ff0000', '#aaff00', '#12ff00','#ff0000', '#aaff00', '#12ff00','#12ff00']
			

			
			)]);
					
		
		// Convert and echo data in JSON format
		echo json_encode($data);
	
	}
		
?>