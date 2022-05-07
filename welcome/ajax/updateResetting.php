<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
		$NO = $_POST['NO'];  
		$NO = base64_decode($NO);
		$NO = $NO/123678;	
		$merk = $_POST['merk'];
		$ct_rat = $_POST['ct_rat'];
$oc_iset= $_POST['oc_iset'];
$oc_tms= $_POST['oc_tms'];
$oc_curve= $_POST['oc_curve'];
$oci_set= $_POST['oci_set'];
$oci_t= $_POST['oci_t'];


$gf_iset= $_POST['gf_iset'];
$gf_tms= $_POST['gf_tms'];
$gf_curve= $_POST['gf_curve'];
$gfi_set= $_POST['gfi_set'];
$gfi_t= $_POST['gfi_t'];

date_default_timezone_set("Asia/Bangkok");

$time=  date('Y-m-d h:i:sa');		

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan IP pengunjung menggunakan $_SERVER
function get_client_ip_2() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan jenis web browser pengunjung
function get_client_browser() {
    $browser = '';
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
        $browser = 'Netscape';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
        $browser = 'Firefox';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
        $browser = 'Chrome';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
        $browser = 'Opera';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
        $browser = 'Internet Explorer';
    else
        $browser = 'Other';
    return $browser;
}
	
	
	
	
	$ipadd = get_client_ip_2();

		

		

    // Updaste User details
    $query = "UPDATE penyulang SET merk = '$merk', ct_rat= '$ct_rat',  oc_iset = '$oc_iset', oc_tms = '$oc_tms', oc_curve= '$oc_curve',  oci_set = '$oci_set', oci_t = '$oci_t', gf_iset= '$gf_iset',  gf_tms = '$gf_tms', gf_curve = '$gf_curve', gfi_set= '$gfi_set',  gfi_t = '$gfi_t', tanggal =now(), ip_user = '$ipadd'
	
	
	
	WHERE no = '$NO'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error());
    }
}
?>