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
echo '<markers>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
	echo "<marker idgardu='".parseToXML($row['idgardu'])."' kodegd='".parseToXML($row['kodegd'])."'  alamat='".parseToXML($row['alamat'])."' lat='".parseToXML($row['lat'])."' lng='".parseToXML($row['lng'])."'/>";

   }

// End XML file
echo '</markers>';



?>