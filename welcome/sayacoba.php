<?php
   include('../session.php');
   include('../config.php');
	// DB connection

	// Check the GET request
	
	
	
		// Select query on GET request
		$sql = 
		"select gettanggal.tanggal AS tgl, count(pemadaman2.feeder) AS total
			from gettanggal 
			left join pemadaman2 on gettanggal.tanggal = day(pemadaman2.tanggalpadam) 
			AND MONTH (pemadaman2.tanggalpadam) = 3 
			AND YEAR (pemadaman2.tanggalpadam) = 2022
			WHERE gettanggal.bulan = 3
			group by gettanggal.tanggal 
			ORDER by gettanggal.idtgl ASC";
		
		
		
		
		$result=mysqli_query($db, $sql);	
		
		// Store data in array
		while($row = $result->fetch_assoc()){
		 
		$labels [] = $row['tgl'];
		$kali_ggn[] = $row['total'];
		}
		$dateObj   = DateTime::createFromFormat('m',3);
		$monthName = $dateObj->format('F');
		$thnObj   = DateTime::createFromFormat('Y', 2022);
		$yearName = $thnObj->format('y');
		$label = $monthName . ' ' . $yearName;
		
		
		$data = 
		array(
				'labels' => $labels,
				'datasets' => 
				array(
					array(
						'label' => $label, 
						'fill' => true, 
						'lineTension' => array('0.5'), 				
						'backgroundColor' => array('#0080a6', '#ff80a6', '#00ffa6', '#0080ff', '#e080a6', '#0afaa6', '#ab80a6', '#00cda6', '#abefa6', '#dd80f6', ), 
						'pointBorderColor'=> array('red'),
						'pointBackgroundColor'=> array('red'),
						'borderColor'=> array('red'),
						'data' => $kali_ggn,
						'datalabels' => 
							array (
								  'color' => array('green'),
								  'anchor' => array('end'),
								  'align' => array('top'),
									)
						)
					),
			
				);				
		
		// Convert and echo data in JSON format
		echo json_encode($data);
	
	
	
?>