<?php
	// DB connection
	$conn = new mysqli("localhost", "root", "", "sihd");
	
	// Check the GET request

		// Select query on GET request
		$sql = "select data, value from chart where type =1" ;
		$sql2 = "select siang, malam from loadcurve where month (tanggal) = 1" ;
		
		$result = $conn->query($sql);
		$result2 = $conn->query($sql2);
		
		// Store data in array
		while($row = $result2->fetch_assoc()){
		$labels = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
		$datasiang[] = $row['siang'];
		$datamalam[] = $row['malam'];
		}
		
		// Chart data for ajax request


		$data = 
		array(
			'labels' => $labels,
			'datasets' => 
			array(
					array(
						'label' => "wbp", 
						'fill' => false, 
						'lineTension' => array('0.1'), 				
						'backgroundColor' => array('green'), 
						'pointBorderColor'=> array('green'),
						'pointBackgroundColor'=> array('green'),
						'borderColor'=> array('green'),
						'data' => $datasiang,
						),
					array(
						'label' => "lwbp", 
						'fill' => false, 
						'lineTension' => array('0.1'), 				
						'backgroundColor' => array('yellow'), 
						'pointBorderColor'=> array('yellow'),
						'pointBackgroundColor'=> array('yellow'),
						'borderColor'=> array('yellow'),
						'data' => $datasiang,
						)
				),
		);				
		
		// Convert and echo data in JSON format
		echo json_encode($data);
?>