<?php
   include('../../session.php');
   include('../../config.php');
	// DB connection

	// Check the GET request
	
		// Select query on GET request
		$sql = "select beban, feeder, QUOTE(feeder) FROM databeban where month (tanggal)= 2 AND  year (tanggal)= 2022 ORDER BY beban DESC LIMIT 10";
		$result=mysqli_query($db, $sql);	
		// Store data in array
		while($row = $result->fetch_assoc()){
		$labels = [1,2,3,4,5,6,7,8,9,10];
		$beban[] = $row['beban'];
		}
			$dateObj   = DateTime::createFromFormat('m-Y', '2-2022');
			$monthName = $dateObj->format('F y'); // March
		// Chart data for ajax request
		$data = 
		array(
			'labels' => $labels,
			'datasets' => 
			array(
			'data' => $beban,
			
						
				)
					);				
		
		// Convert and echo data in JSON format
		echo json_encode($data);

	
?>