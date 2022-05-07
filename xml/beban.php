<?php
include('../session.php');
include('../config.php');
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}



if ($login_role == "admin") {
$query="SELECT*
FROM master WHERE 1" ;} 
else if ($login_role == "area") {
$query="SELECT*
FROM master WHERE idarea ='$login_idarea'" ;} 
else {
$query="SELECT*
FROM master WHERE idrayon ='$login_idrayon'" ;} 

//$query="SELECT * FROM master WHERE 1";
$result = mysqli_query($db, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}


	

	

header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<gardu>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
	$hi1 = $row['hi_beban1'];
	$hi2 = $row['hi_beban2'];
	$hix = min ($hi1, $hi2);
  // ADD TO XML DOCUMENT NODE   
  echo '<marker ';
  echo 'idgardu="' . parseToXML($row['idgardu']) . '" ';
  echo 'kodegd="' . parseToXML($row['kodegd']) . '" ';
  echo 'alamat="' . parseToXML($row['alamat']) . '" ';
  echo 'feeder="' . $row['feeder'] . '" ';  
  echo 'ufeeder="' . $row['ufeeder'] . '" ';
  echo 'kapasitas="' . $row['kapasitas'] . '" ';
  echo 'fasa="' . $row['fasa'] . '" ';
  echo 'merek="' . parseToXML($row['merek']) . '" ';
  echo 'noseri="' . parseToXML($row['noseri']) . '" ';
   echo 'thntrafo="' . parseToXML($row['thntrafo']) . '" ';
   echo 'lat="' . parseToXML($row['lat']) . '" ';
   echo 'lng="' . parseToXML($row['lng']) . '" ';
  echo 'hi="' . $hix . '" ';  

  echo '/>';
}

// End XML file
echo '</gardu>';



?>