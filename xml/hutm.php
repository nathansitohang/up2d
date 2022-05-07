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
FROM master_hutm WHERE 1" ;} 
else if ($login_role == "area") {
$query="SELECT*
FROM master_hutm WHERE idarea ='$login_idarea'" ;} 
else {
$query="SELECT*
FROM master_hutm WHERE idrayon ='$login_idrayon'" ;} 




//$query="SELECT * FROM master WHERE 1";
$result = mysqli_query($db, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}



header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<hutm>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'id_jtm="' . parseToXML($row['id_jtm']) . '" ';
  echo 'peralatan="' . parseToXML($row['peralatan']) . '" ';
  echo 'feeder="' . parseToXML($row['feeder']) . '" ';
  echo 'lat="' . parseToXML($row['lat']) . '" ';
  echo 'lng="' . parseToXML($row['lng']) . '" ';
  echo 'struktur="' . parseToXML($row['struktur']) . '" ';
  echo 'crossarm="' . parseToXML($row['crossarm']) . '" ';
  echo 'konstruksi="' . parseToXML($row['konstruksi']) . '" ';
   echo 'lpju="' . parseToXML($row['lpju']) . '" ';
  echo 'size_tm="' . parseToXML($row['size_tm']) . '" ';
  echo 'size_jtr="' . parseToXML($row['size_jtr']) . '" ';
  echo 'jlh_sr="' . parseToXML($row['jlh_sr']) . '" ';
  echo 'keterangan="' . parseToXML($row['keterangan']) . '" '; 
   	 	 	 	 	 	 	 	 	 	 	
  echo '/>';
}
// End XML file
echo '</hutm>';
?>