<?php
   include('../session.php');
   include('../config.php');
	// DB connection

	// Check the GET request
	if(isset($_GET['bulan']) && $_GET['bulan'] != '')
	{
		// Select query on GET request
		$sql = "select siang, malam, tanggal from loadcurve where month (tanggal)= '".$_GET['bulan']."' AND  year (tanggal)= '".$_GET['tahun']."' ";
		$result=mysqli_query($db, $sql);	
		
		// Store data in array
		while($row = $result->fetch_assoc()){
		 
		$labels [] = date("d", strtotime($row['tanggal']));
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
						'label' => "lwbp", 
						'fill' => true, 
						'lineTension' => array('0.5'), 				
						'backgroundColor' => array("rgba(255,0,0,0.25)"), 
						'pointBorderColor'=> array('red'),
						'pointBackgroundColor'=> array('red'),
						'borderColor'=> array('red'),
						'data' => $datasiang,
						
						),
					array(
						'label' => "wbp", 
						'fill' => true, 
						'lineTension' => array('0.5'), 				
						'backgroundColor' => array("rgba(0,255,0,0.1)"), 
						'pointBorderColor'=> array('green'),
						'pointBackgroundColor'=> array('green'),
						'borderColor'=> array('green'),
						'data' => $datamalam,
						)
				),
			'datalabels' => 
			array (
	  'color' => array('green'),
	  'anchor' => array('end'),
	  'align' => array('top'),
  )
		);				
		
		// Convert and echo data in JSON format
		echo json_encode($data);
	}
	
?>