<?php
	// DB connection
	$conn = new mysqli("localhost", "root", "", "sihd");
	
	// Check the GET request
	if(isset($_GET['id']) && $_GET['id'] != '')
	{
		// Select query on GET request
		$sql = "select data, value from chart where type =".$_GET['id'];
		$result = $conn->query($sql);
		
		// Store data in array
		while($row = $result->fetch_assoc()){
			$labels[] = $row['data'];
			$datas[] = $row['value'];
		}
		
		// Chart data for ajax request
		$data = array(
			'labels' => $labels,
			'datasets' => array(array(
				'label' => "Chart.JS", 
				'fill' => false, 
				'backgroundColor' => array('#ff0000', '#ff4000', '#ff8000', '#ffbf00', '#ffbf00', '#ffff00', '#bfff00', '#80ff00'), 
				'borderColor' => 'black', 
				'data' => $datas,
			)),
		);
		
		// Convert and echo data in JSON format
		echo json_encode($data);
	}
	
?>