<?php
include('session.php');
include('config.php');
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
FROM keypoint WHERE 1" ;} 
else if ($login_role == "area") {
$query="SELECT*
FROM keypoint WHERE idup3 ='$login_idarea' OR idup32 ='$login_idarea'" ;} 
else {
$query="SELECT*
FROM keypoint WHERE idulp1 ='$login_idrayon' OR idulp2 ='$login_idrayon'" ;} 



//$query="SELECT * FROM master WHERE 1";
$result = mysqli_query($db, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}



header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<markers>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
	echo "<marker nomor='".parseToXML($row['nomor_kp'])."
	' idup3='".parseToXML($row['idup3'])."
	' idup32='".parseToXML($row['idup32'])."
	' idulp1='".parseToXML($row['idulp1'])."
	' idulp2='".parseToXML($row['idulp2'])."
	' jenis='".parseToXML($row['jenis'])."
	
	' up3='".parseToXML($row['up3'])."
	' ulp='".parseToXML($row['ulp'])."
	' section='".parseToXML($row['section'])."
	' penyulang='".parseToXML($row['penyulang'])."
	' lat='".parseToXML($row['lat'])."
	' lng='".parseToXML($row['lon'])."'/>";

   }

// End XML file
echo '</markers>';



?>