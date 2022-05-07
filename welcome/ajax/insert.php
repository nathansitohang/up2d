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
$jenispadam = $_POST['jenispadam'];

if ($jenispadam == 1)
{ $katapadam = "PEMELIHARAAN";}
else if ($jenispadam == 2)
{ $katapadam = "GANGGUAN";}
else if ($jenispadam == 3)
{ $katapadam = "EMERGENCY";}
else if ($jenispadam == 4)
{ $katapadam = "GANGGUAN SISTEM";}

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
	$status1 =  $_POST['state1'];	
	$tanggalpadam = $_POST['tanggalpadam'];
	$jampadam = $_POST['jampadam'];
	$tanggalpulih  = $_POST['tanggalpulih'];
	$tanggalnormal  = $_POST['tanggalnormal'];
	$jampulih = $_POST['jampulih'];
	$jamnormal = $_POST['jamnormal'];
	$status = $_POST['state'];
	$temptanggalpulih = $_POST['temptanggalpulih'];
	$tempjampulih = $_POST['tempjampulih'];
	$section = $_POST['section'];
	$remotesection= $_POST['remotesection'];
	$ketsection= $_POST['ketsection'];
	
	
	if ($status1 == 3)
	{
	if ($status == 3)
	{
		$tanggalnormal  = "";
		$jamnormal  = "";
		$tanggalpulih = $tanggalpulih;
		$jampulih = $jampulih;
		
	}
	else if ($status == 1)
	{
		$tanggalnormal  = $tanggalnormal;
		$jamnormal  = $jamnormal;
		$tanggalpulih = $temptanggalpulih;
		$jampulih = $tempjampulih;
	}
	}
	
	else if ($status1 == 2)
	{
	if ($status == 3)
	{
		$tanggalnormal  = "";
		$jamnormal  = "";
		$tanggalpulih = $tanggalpulih;
		$jampulih = $jampulih;
		
	}
	else if ($status == 1)
	{
		$tanggalnormal  = $tanggalpulih;
		$jamnormal  = $jampulih;
		$tanggalpulih = $tanggalpulih;
		$jampulih = $jampulih;
	}
	}
	
	
	$indikasi = base64_decode ($_POST['indikasi']);
	$arusggn  = $_POST['arusggn'];
	$arusbeban = $_POST['arusbeban'];
	$fgtm  = base64_decode ($_POST['fgtm']);
	$lat= $_POST['lat'];
	$lon = $_POST['lon'];
	$detail = $_POST['detail'];
	$feeder = $_POST['feeder'];
	$up3  = $_POST['up3'];
	$idup3 = $_POST['idup3'];
	$ulp = $_POST['ulp'];
	$idulp  = $_POST['idulp'];
	$gigh = $_POST['gigh'];
	$kritplgn = $_POST['kritplgn'];
	$dispa1 = $_POST['dispatcher1'];
	$dispa2 = $_POST['dispatcher2'];
	$dispa3 = $_POST['dispatcher3'];
	$nmkltr = $_POST['nmkltr'];
	$ket4 =  $_POST['ket4'];
	$l_r = base64_decode($_POST['scada']);
	$count =  $_POST['count'];
	

	if ($status == 2)
	{
	$query = "INSERT INTO `pemadaman2`(`no`, `tanggalpadam`, `jampadam`, `jenispadam`, `katapadam`,`tanggalpulih`, `jampulih`, `indikasi`, `arusggn`, `arusbeban`, `fgtm`, `lat`, `lon`, `detail`, `feeder`, `up3`, `idup3`, `ulp`, `idulp`, `gigh`, `kritplgn`,`dispa1`, `dispa2`, `dispa3`,`status`,`nmkltr`, `ket4`, `l_r`, `count`, `tanggalnormal`, `jamnormal`) VALUES ('$no', '$tanggalpadam', '$jampadam',
	'$jenispadam', '$katapadam', '$tanggalpulih', '$jampulih', '$indikasi', '$arusggn', '$arusbeban', '$fgtm', '$lat', '$lon', '$detail', '$feeder', '$up3', '$idup3', '$ulp', '$idulp', '$gigh', '$kritplgn', '$dispa1','$dispa2', '$dispa3', '$status', '$nmkltr', '$ket4', '$l_r', '$count', '$tanggalnormal', '$jamnormal')";
	}
	else
	{
	$query = "UPDATE pemadaman2 SET tanggalpadam = '$tanggalpadam', jampadam = '$jampadam', jenispadam = '$jenispadam', katapadam = '$katapadam',
	tanggalpulih = '$tanggalpulih', jampulih = '$jampulih', indikasi = '$indikasi', arusggn = '$arusggn',  arusbeban = '$arusbeban', 
	fgtm = '$fgtm', lat = '$lat', lon = '$lon', detail = '$detail', feeder = '$feeder', up3 = '$up3', idup3 = '$idup3', idulp = '$idulp', 
	ulp = '$ulp', gigh = '$gigh',  kritplgn = '$kritplgn',  dispa1 = '$dispa1',  dispa2 = '$dispa2',  dispa3 = '$dispa3',  status = '$status',  nmkltr = '$nmkltr',  ket4 = '$ket4', l_r = '$l_r',  count = '$count', tanggalnormal = '$tanggalnormal',  jamnormal = '$jamnormal', section = '$section', remotesection = '$remotesection', ketsection = '$ketsection'
	WHERE no='$NO'";	
	}	
	

    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error());
    }
}

?>