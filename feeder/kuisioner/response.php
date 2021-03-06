
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sihd";

	$data =array();
	$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	$sql = "SELECT * FROM `feeder` ";
	$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		//iterate on results row and create new index array of data
		while( $row = mysqli_fetch_assoc($res) ) { 
			$tmp = array();
			$tmp['id'] = $row['id'];
			$tmp['name'] = $row['name'];
			$tmp['text'] = $row['label'];
			$tmp['parent_id'] = $row['parent_id'];
			$tmp['href'] = $row['link'];
			array_push($data, $tmp); 
		}
		$itemsByReference = array();

	// Build array of item references:
	foreach($data as $key => &$item) {
	   $itemsByReference[$item['id']] = &$item;
	   // Children array:
	   $itemsByReference[$item['id']]['nodes'] = array();
	}

	// Set items as children of the relevant parent item.
	foreach($data as $key => &$item)  {
	//echo "<pre>";print_r($itemsByReference[$item['parent_id']]);die;
	   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']])) {
	      $itemsByReference [$item['parent_id']]['nodes'][] = &$item;
		}
	}
	// Remove items that were added to parents elsewhere:
	foreach($data as $key => &$item) {
		 if(empty($item['nodes'])) {
			unset($item['nodes']);
			}
	   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']])) {
	      unset($data[$key]);
		 }
	}

	// Encode:
	echo json_encode($data);
	?>
