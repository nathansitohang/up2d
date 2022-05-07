<?php
   include('../../session.php');
   include('../../config.php');
	// DB connection

	// Check the GET request
	if(isset($_GET['bulan']) && $_GET['bulan'] != '')
	{
		// Select query on GET request
		$sql = "select beban, feeder, QUOTE(feeder) FROM databeban where month (tanggal)= '".$_GET['bulan']."' AND  year (tanggal)= '".$_GET['tahun']."' ORDER BY beban DESC LIMIT 10";
		
		$result=mysqli_query($db, $sql);	
		
		// Store data in array
		while($row = $result->fetch_assoc()){
		$penyulang[] = $row['feeder'];	
		$beban[] = $row['beban'];
		}
		
		$dateObj   = DateTime::createFromFormat('m', $_GET['bulan']);
		$monthName = $dateObj->format('F y'); // March

		
		// Chart data for ajax request
		$data = 
		array(
			'labels' => $penyulang,
			'datasets' => 
			array(
					array(
						'label' => $monthName, 
						'data' => $beban,
						'backgroundColor' => '#e07a5f',
						'lineTension' => 0.1,
						'fill' => false,
						'borderColor' => '#e07a5f',
						'backgroundColor' => '#e07a5f',
						'pointBorderColor'=> '#e07a5f',
						'pointBackgroundColor'=> '#e07a5f',
						'datalabels' =>
							array (
								'color' => 'red',
								'anchor' => 'end',
								'align' =>'top',
								'offset' =>  5
							
							)
						
						)
				)
		);				
		
		// Convert and echo data in JSON format
		echo json_encode($data);
	}
	
?>