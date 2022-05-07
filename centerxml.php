<?php
include('session.php');
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}






header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<center>';
// Iterate through the rows, printing XML nodes for each

  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'lat="' . parseToXML($login_lat) . '" ';
  echo 'lng="' . parseToXML($login_lng) . '" ';
   	 	 	 	 	 	 	 	 	 	 	
  echo '/>';

// End XML file
echo '</center>';
?>