<?php
   include('../../session.php');
   include('../../config.php');
	// DB connection

	// Check the GET request
	if(isset($_GET['bulanggn']) && $_GET['tahunggn']  && $_GET['minutos'] != '')	
	{
		$cekleap = $_GET['tahunggn'];
		if ($cekleap % 400 == 0){$kabisat=1;}	
		else if ($cekleap % 100 == 0) {$kabisat="";}
		else if ($cekleap % 4 == 0){$kabisat=1;}
		else {$kabisat ="";}
									
		$minutos = $_GET['minutos'];
		if ($minutos == 3)
		{
			$min = 5.00000000001;
			$max = 9223372036854775807;
		}
		else if ($minutos == 2)
		{
			$min = 0;
			$max = 5;
		}
		else
		{
			$min = 0;
			$max = 9223372036854775807;
		}
		// Select query on GET request
		$up3 = $_GET['idup3'];
		$ulp = $_GET['idulp'];
		
		if ($up3==12)
		{
		$sql = 
		"select gettanggal.tanggal AS tgl, count(pemadaman2.feeder) AS total
			from gettanggal 
			left join pemadaman2 on gettanggal.tanggal = day(pemadaman2.tanggalpadam) 
			and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1  AND pemadaman2.jenispadam = 2
			AND MONTH (pemadaman2.tanggalpadam) = '".$_GET['bulanggn']."' 
			AND YEAR (pemadaman2.tanggalpadam) = '".$_GET['tahunggn']."'  AND minute(pemadaman2.lamapadam) BETWEEN '$min' and '$max'
			WHERE gettanggal.bulan = '".$_GET['bulanggn']."' AND (gettanggal.kabisat = 0 OR gettanggal.kabisat = '$kabisat')
			group by gettanggal.tanggal 
			ORDER by gettanggal.idtgl ASC";
		}
		
		else if ($ulp==0 or $ulp=="")
		{
		$sql = 
		"select gettanggal.tanggal AS tgl, count(pemadaman2.feeder) AS total
			from gettanggal 
			left join pemadaman2 on gettanggal.tanggal = day(pemadaman2.tanggalpadam) 
			and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1  AND pemadaman2.jenispadam = 2
			AND MONTH (pemadaman2.tanggalpadam) = '".$_GET['bulanggn']."' 
			AND YEAR (pemadaman2.tanggalpadam) = '".$_GET['tahunggn']."'  AND minute(pemadaman2.lamapadam) BETWEEN '$min' and '$max'
			AND pemadaman2.idup3='".$up3."'
			WHERE gettanggal.bulan = '".$_GET['bulanggn']."' AND (gettanggal.kabisat = 0 OR gettanggal.kabisat = '$kabisat')
			group by gettanggal.tanggal 
			ORDER by gettanggal.idtgl ASC";
		}

		else
		{
		$sql = 
		"select gettanggal.tanggal AS tgl, count(pemadaman2.feeder) AS total
			from gettanggal 
			left join pemadaman2 on gettanggal.tanggal = day(pemadaman2.tanggalpadam) 
			and pemadaman2.status = 1 and pemadaman2.tripkembali <> 1  AND pemadaman2.jenispadam = 2
			AND MONTH (pemadaman2.tanggalpadam) = '".$_GET['bulanggn']."' 
			AND YEAR (pemadaman2.tanggalpadam) = '".$_GET['tahunggn']."'  AND minute(pemadaman2.lamapadam) BETWEEN '$min' and '$max'
			AND pemadaman2.idulp='".$ulp."'			
			WHERE gettanggal.bulan = '".$_GET['bulanggn']."' AND (gettanggal.kabisat = 0 OR gettanggal.kabisat = '$kabisat')
			group by gettanggal.tanggal 
			ORDER by gettanggal.idtgl ASC";
		}
		
		
		
		$result=mysqli_query($db, $sql);	
		
		// Store data in array
		while($row = $result->fetch_assoc()){
		 
		$labels [] = $row['tgl'];
		$kali_ggn[] = $row['total'];
		}
		$dateObj   = DateTime::createFromFormat('m', $_GET['bulanggn']);
		$monthName = $dateObj->format('F');
		$thnObj   = DateTime::createFromFormat('Y', $_GET['tahunggn']);
		$yearName = $thnObj->format('y');
		$label = $monthName . ' ' . $yearName;
		
		
		$data = 
		array(
				'labels' => $labels,
				'datasets' => 
				array(
					array(
						'label' => $label.' ('.$up3.')', 
						'fill' => true, 
						'lineTension' => array('0.5'), 				
						'backgroundColor' => array('#0080a6', '#ff80a6', '#00ffa6', '#0080ff', '#e080a6', '#0afaa6', '#ab80a6', '#00cda6', '#abefa6', '#dd80f6', ), 
						'pointBorderColor'=> array('red'),
						'pointBackgroundColor'=> array('red'),
						'borderColor'=> array('red'),
						'data' => $kali_ggn,
						'datalabels' => 
							array (
								  'color' => array('red'),
								  'anchor' => array('center'),
								  'align' => array('center'),
								  'offset' => array('5'),
									)
						)
					),
			
				);				
		
		// Convert and echo data in JSON format
		echo json_encode($data);
	}
?>