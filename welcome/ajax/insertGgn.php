<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['NO']))
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
$status1 =  $_POST['state1'];	
$tanggalpadam = $_POST['tanggalpadam'];
$jampadam = $_POST['jampadam'];
$tanggalpulih  = $_POST['tanggalpulih'];
$tanggalnormal  = $_POST['tanggalnormaledit'];
$jampulih = $_POST['jampulih'];
$jamnormal = $_POST['jamnormaledit'];
$status = $_POST['state'];
$temptanggalpulih = $_POST['temptanggalpulih'];
$tempjampulih = $_POST['tempjampulih'];
$section = $_POST['section'];
$remotesection= $_POST['remotesection'];
$ketsection= $_POST['ketsection'];		
$tegangan= $_POST['tegangan'];

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

	if ($status == 'entry')
	{
			$query = "INSERT INTO `pemadaman2`
						(`no`, `tanggalpadam`, `jampadam`, `jenispadam`, `katapadam`,
						`tanggalpulih`, `jampulih`, `indikasi`, `arusggn`, `arusbeban`, `tegangan`, `fgtm`, `lat`, `lon`, `detail`, 
						`feeder`, `up3`, `idup3`, `ulp`, `idulp`, `gigh`, `kritplgn`,`dispa1`, `dispa2`, `dispa3`,`status`,
						`nmkltr`, `ket4`, `l_r`, `count`, `tanggalnormal`, `jamnormal`) 
						VALUES ('$no', '$tanggalpadam', '$jampadam', '$jenispadam', '$katapadam', 
						'$tanggalpulih', '', '$indikasi', '$arusggn', '$arusbeban', '$tegangan', '$fgtm', '$lat', '$lon', 
						'$detail', '$feeder', '$up3', '$idup3', '$ulp', '$idulp', '$gigh', '$kritplgn', 
						'$dispa1','$dispa2', '$dispa3', '2', '$nmkltr', '$ket4', '$l_r', '$count', 
						'$tanggalnormal', '$jamnormal')";
	}
	
	
	else if ($status1 == 1)
	{
			$tanggalpadam = $tanggalpadam;
			$jampadam = $jampadam;
			$tanggalnormal  = $tanggalnormal;
			$jamnormal  = $jamnormal;
			$tanggalpulih = $tanggalpulih;
			$jampulih = $jampulih;
			// hitung lama padam = lama normal
			$dt_padam = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpadam.' '.$jampadam)));
			$dt_pulih = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpulih.' '.$jampulih)));
			$dt_normal = strtotime (date('Y-m-d H:i:s', strtotime($tanggalnormal.' '.$jamnormal)));
			
			$lamapadam = gmdate ('H:i:s', $dt_pulih - $dt_padam);	
			$lamanormal = gmdate ('H:i:s', $dt_normal - $dt_padam);
			$selisih = ($dt_pulih-$dt_padam)/3600;
			$ens = 	$tegangan * $arusbeban * sqrt(3) *0.95*($selisih);	

			$query = "UPDATE pemadaman2 SET 
						tanggalpadam = '$tanggalpadam', jampadam = '$jampadam', jenispadam = '$jenispadam', katapadam = '$katapadam',
						tanggalpulih = '$tanggalpulih', jampulih = '$jampulih', lamapadam = '$lamapadam', indikasi = '$indikasi', 
						arusggn = '$arusggn',  arusbeban = '$arusbeban', ens = '$ens',
						fgtm = '$fgtm', lat = '$lat', lon = '$lon', detail = '$detail', feeder = '$feeder', up3 = '$up3', 
						idup3 = '$idup3', idulp = '$idulp', ulp = '$ulp', gigh = '$gigh',  kritplgn = '$kritplgn', 
						dispa1 = '$dispa1',  dispa2 = '$dispa2',  dispa3 = '$dispa3',  status = 1,  nmkltr = '$nmkltr',  
						ket4 = '$ket4', l_r = '$l_r',  count = '$count', tanggalnormal = '$tanggalnormal',  jamnormal = '$jamnormal', 
						section = '$section', remotesection = '$remotesection', ketsection = '$ketsection', lamanormal='$lamanormal'
						WHERE no='$NO'";			
	}
	
	else if ($status1 == 2) // Keadaan saat ini, event ggn belum ditindaklanjuti, tombol berwarna kuning
	{
		if ($status == 3) // Anda memilih pemulihan bertahap
		{	
			// penyulang belum normal namun sudah pulih sebagian
			$tanggalpadam = $tanggalpadam;
			$jampadam = $jampadam;
			$tanggalnormal  = "";
			$jamnormal  = "";
			$tanggalpulih = $tanggalpulih;
			$jampulih = $jampulih;
			// hitung lama padam, yaitu selish waktu pulih dengan waktu padam
			$dt_padam = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpadam.' '.$jampadam)));
			$dt_pulih = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpulih.' '.$jampulih)));
			$lamapadam = gmdate ('H:i:s', $dt_pulih - $dt_padam);
			$selisih = ($dt_pulih-$dt_padam)/3600;
			$ens = 	$tegangan * $arusbeban * sqrt(3) *0.95*($selisih);	
			
			//update status ke tombol hijau (pertanda penyulang pulih bertahap/status= 3) dan event pemulihan lainnya
			$query = "UPDATE pemadaman2 SET 
						tanggalpadam = '$tanggalpadam', jampadam = '$jampadam', jenispadam = '$jenispadam', katapadam = '$katapadam',
						tanggalpulih = '$tanggalpulih', jampulih = '$jampulih', lamapadam = '$lamapadam', indikasi = '$indikasi', 
						arusggn = '$arusggn',  arusbeban = '$arusbeban', ens = '$ens', 
						fgtm = '$fgtm', lat = '$lat', lon = '$lon', detail = '$detail', feeder = '$feeder', up3 = '$up3', 
						idup3 = '$idup3', idulp = '$idulp', ulp = '$ulp', gigh = '$gigh',  kritplgn = '$kritplgn', 
						dispa1 = '$dispa1',  dispa2 = '$dispa2',  dispa3 = '$dispa3',  status = '$status',  nmkltr = '$nmkltr',  
						ket4 = '$ket4', l_r = '$l_r',  count = '$count', tanggalnormal = '$tanggalnormal',  jamnormal = '$jamnormal', 
						section = '$section', remotesection = '$remotesection', ketsection = '$ketsection'
						WHERE no='$NO'";	
		} // tombol sudah berubah menjadi hijau.
		
		else if ($status == 2) // Anda memilih penyulang trip kembali
		{
			// penyulang trip kembali, event gangguan sebelumnya silahkan diclose dengan waktu normal dan waktu pulih sama dengan 
			// jam trip kembali (yang diinput pada jampulih
			$tanggalpadam  = $tanggalpadam;
			$jampadam  = $jampadam;
			$tanggalnormal  = $tanggalpulih;
			$jamnormal  = $jampulih;
			$tanggalpulih = $tanggalpulih;
			$jampulih = $jampulih;	
			// hitung lama padam dan lama normal 
			$dt_padam = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpadam.' '.$jampadam)));
			$dt_pulih = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpulih.' '.$jampulih)));
			$dt_normal = strtotime (date('Y-m-d H:i:s', strtotime($tanggalnormal.' '.$jamnormal)));
			$lamapadam = gmdate ('H:i:s', $dt_pulih - $dt_padam);	
			$lamanormal = gmdate ('H:i:s', $dt_normal - $dt_padam);
			$selisih = ($dt_pulih-$dt_padam)/3600;
			$ens = 	$tegangan * $arusbeban * sqrt(3) *0.95*($selisih);	
			
			
			//1. update status ke tombol biru (pertanda penyulang pulih keseluruhan/status = 1) dan event pemulihan lainnya
			$query = "UPDATE pemadaman2 SET 
						tanggalpadam = '$tanggalpadam', jampadam = '$jampadam', jenispadam = '$jenispadam', katapadam = '$katapadam',
						tanggalpulih = '$tanggalpulih', jampulih = '$jampulih', lamapadam = '$lamapadam', indikasi = '$indikasi', 
						arusggn = '$arusggn',  arusbeban = '$arusbeban', ens = '$ens',
						fgtm = '$fgtm', lat = '$lat', lon = '$lon', detail = '$detail', feeder = '$feeder', up3 = '$up3', 
						idup3 = '$idup3', idulp = '$idulp', ulp = '$ulp', gigh = '$gigh',  kritplgn = '$kritplgn', 
						dispa1 = '$dispa1',  dispa2 = '$dispa2',  dispa3 = '$dispa3',  status = 1,  nmkltr = '$nmkltr',  
						ket4 = '$ket4', l_r = '$l_r',  count = '$count', tanggalnormal = '$tanggalnormal',  jamnormal = '$jamnormal', 
						section = '$section', remotesection = '$remotesection', ketsection = '$ketsection', lamanormal='$lamanormal'
						WHERE no='$NO'";
			//event ggn baru
			$tanggalpadam_new  = $tanggalpulih;
			$jampadam_new  = $jampulih;
			//2. insert event trip kembali dengan waktu padam sesuai yang diinput pada waktu pulih
			$query2 = "INSERT INTO `pemadaman2`
						(`no`, `tanggalpadam`, `jampadam`, `jenispadam`, `katapadam`,`tanggalpulih`, `jampulih`, 
						`indikasi`, `arusggn`, `arusbeban`, `fgtm`, `lat`, `lon`, `detail`, `feeder`, `up3`, `idup3`, 
						`ulp`, `idulp`, `gigh`, `kritplgn`,`dispa1`, `dispa2`, `dispa3`,`status`,`nmkltr`, `ket4`, `l_r`, 
						`count`, `tanggalnormal`, `jamnormal`, `tripkembali`) VALUES ('$no', '$tanggalpadam_new', '$jampadam_new',
						'$jenispadam', '$katapadam', '$tanggalpulih', '', '$indikasi', '$arusggn', '$arusbeban', '$fgtm', 
						'$lat', '$lon', '$detail', '$feeder', '$up3', '$idup3', '$ulp', '$idulp', '$gigh', '$kritplgn', 
						'$dispa1','$dispa2', '$dispa3', '$status', '$nmkltr', '$ket4', '$l_r', 
						'$count', '', '', 1)";
		}
		else if ($status == 1) // Anda memilih pulih keseluruhan
		{	
			// penyulang normal keseluruhan
			$tanggalpadam = $tanggalpadam;
			$jampadam = $jampadam;
			$tanggalnormal  = $tanggalpulih;
			$jamnormal  = $jampulih;
			$tanggalpulih = $tanggalpulih;
			$jampulih = $jampulih;
			// hitung lama padam = lama normal
			$dt_padam = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpadam.' '.$jampadam)));
			$dt_pulih = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpulih.' '.$jampulih)));
			$dt_normal = strtotime (date('Y-m-d H:i:s', strtotime($tanggalnormal.' '.$jamnormal)));
			
			$lamapadam = gmdate ('H:i:s', $dt_pulih - $dt_padam);	
			$lamanormal = gmdate ('H:i:s', $dt_normal - $dt_padam);
			$selisih = ($dt_pulih-$dt_padam)/3600;
			$ens = 	$tegangan * $arusbeban * sqrt(3) *0.95*($selisih);				
			
			//update status ke tombol biru (pertanda penyulang pulih keseluruhan/status = 1) dan event pemulihan lainnya
			$query = "UPDATE pemadaman2 SET 
						tanggalpadam = '$tanggalpadam', jampadam = '$jampadam', jenispadam = '$jenispadam', katapadam = '$katapadam',
						tanggalpulih = '$tanggalpulih', jampulih = '$jampulih', lamapadam = '$lamapadam', indikasi = '$indikasi', 
						arusggn = '$arusggn',  arusbeban = '$arusbeban', ens = '$ens',
						fgtm = '$fgtm', lat = '$lat', lon = '$lon', detail = '$detail', feeder = '$feeder', up3 = '$up3', 
						idup3 = '$idup3', idulp = '$idulp', ulp = '$ulp', gigh = '$gigh',  kritplgn = '$kritplgn', 
						dispa1 = '$dispa1',  dispa2 = '$dispa2',  dispa3 = '$dispa3',  status = 1,  nmkltr = '$nmkltr',  
						ket4 = '$ket4', l_r = '$l_r',  count = '$count', tanggalnormal = '$tanggalnormal',  jamnormal = '$jamnormal', 
						section = '$section', remotesection = '$remotesection', ketsection = '$ketsection', lamanormal='$lamanormal'
						WHERE no='$NO'";
		}
	}
	
	else if ($status1 == 3) // Keadaan saat ini, event ggn pulih bertahap, tombol berwarna hijau
	{
		if ($status == 3) // Anda memilih pemulihan bertahap kembali
		{	
			// penyulang belum normal namun sudah pulih sebagian
			$tanggalpadam = $tanggalpadam;
			$jampadam = $jampadam;
			$tanggalnormal  = $tanggalpulih;
			$jamnormal  = $jampulih;
			$tanggalpulih = $temptanggalpulih;
			$jampulih = $tempjampulih;
			// hitung lama padam, yaitu selish waktu pulih dengan waktu padam
			$dt_padam = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpadam.' '.$jampadam)));
			$dt_pulih = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpulih.' '.$jampulih)));
			$lamapadam = gmdate ('H:i:s', $dt_pulih - $dt_padam);
			$selisih = ($dt_pulih-$dt_padam)/3600;
			$ens = 	$tegangan * $arusbeban * sqrt(3) *0.95*($selisih);				
			//update status ke tombol hijau (pertanda penyulang pulih bertahap/status= 3) dan event pemulihan lainnya
			$query = "UPDATE pemadaman2 SET 
						tanggalpadam = '$tanggalpadam', jampadam = '$jampadam', jenispadam = '$jenispadam', katapadam = '$katapadam',
						tanggalpulih = '$tanggalpulih', jampulih = '$jampulih', lamapadam = '$lamapadam', indikasi = '$indikasi', 
						arusggn = '$arusggn',  arusbeban = '$arusbeban', ens = '$ens',
						fgtm = '$fgtm', lat = '$lat', lon = '$lon', detail = '$detail', feeder = '$feeder', up3 = '$up3', 
						idup3 = '$idup3', idulp = '$idulp', ulp = '$ulp', gigh = '$gigh',  kritplgn = '$kritplgn', 
						dispa1 = '$dispa1',  dispa2 = '$dispa2',  dispa3 = '$dispa3',  status = '$status',  nmkltr = '$nmkltr',  
						ket4 = '$ket4', l_r = '$l_r',  count = '$count', tanggalnormal = '$tanggalnormal',  jamnormal = '$jamnormal', 
						section = '$section', remotesection = '$remotesection', ketsection = '$ketsection'
						WHERE no='$NO'";	
		} // tombol sudah berubah menjadi hijau.
		
		else if ($status == 2) // Anda memilih penyulang trip kembali
		{
			// penyulang trip kembali, event gangguan sebelumnya silahkan diclose dengan waktu normal dan waktu pulih sama dengan 
			// jam trip kembali (yang diinput pada jampulih
			$tanggalpadam  = $tanggalpadam;
			$jampadam  = $jampadam;
			$tanggalnormal  = $tanggalpulih;
			$jamnormal  = $jampulih;
			$tanggalpulih = $temptanggalpulih;
			$jampulih = $tempjampulih;	
			// hitung lama padam dan lama normal 
			$dt_padam = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpadam.' '.$jampadam)));
			$dt_pulih = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpulih.' '.$jampulih)));
			$dt_normal = strtotime (date('Y-m-d H:i:s', strtotime($tanggalnormal.' '.$jamnormal)));
			$lamapadam = gmdate ('H:i:s', $dt_pulih - $dt_padam);	
			$lamanormal = gmdate ('H:i:s', $dt_normal - $dt_padam);
			$selisih = ($dt_pulih-$dt_padam)/3600;
			$ens = 	$tegangan * $arusbeban * sqrt(3) *0.95*($selisih);				
			
			//1. update status ke tombol biru (pertanda penyulang pulih keseluruhan/status = 1) dan event pemulihan lainnya
			$query = "UPDATE pemadaman2 SET 
						tanggalpadam = '$tanggalpadam', jampadam = '$jampadam', jenispadam = '$jenispadam', katapadam = '$katapadam',
						tanggalpulih = '$tanggalpulih', jampulih = '$jampulih', lamapadam = '$lamapadam', indikasi = '$indikasi', 
						arusggn = '$arusggn',  arusbeban = '$arusbeban', ens = '$ens',
						fgtm = '$fgtm', lat = '$lat', lon = '$lon', detail = '$detail', feeder = '$feeder', up3 = '$up3', 
						idup3 = '$idup3', idulp = '$idulp', ulp = '$ulp', gigh = '$gigh',  kritplgn = '$kritplgn', 
						dispa1 = '$dispa1',  dispa2 = '$dispa2',  dispa3 = '$dispa3',  status = 1,  nmkltr = '$nmkltr',  
						ket4 = '$ket4', l_r = '$l_r',  count = '$count', tanggalnormal = '$tanggalnormal',  jamnormal = '$jamnormal', 
						section = '$section', remotesection = '$remotesection', ketsection = '$ketsection', lamanormal='$lamanormal'
						WHERE no='$NO'";
						
			//event ggn baru
			$tanggalpadam_new  = $tanggalpulih;
			$jampadam_new  = $jampulih;
			//2. insert event trip kembali dengan waktu padam sesuai yang diinput pada waktu pulih
			$query2 = "INSERT INTO `pemadaman2`
						(`no`, `tanggalpadam`, `jampadam`, `jenispadam`, `katapadam`,`tanggalpulih`, `jampulih`, 
						`indikasi`, `arusggn`, `arusbeban`, `fgtm`, `lat`, `lon`, `detail`, `feeder`, `up3`, `idup3`, 
						`ulp`, `idulp`, `gigh`, `kritplgn`,`dispa1`, `dispa2`, `dispa3`,`status`,`nmkltr`, `ket4`, `l_r`, 
						`count`, `tanggalnormal`, `jamnormal`, `tripkembali`) VALUES ('$no', '$tanggalpadam_new', '$jampadam_new',
						'$jenispadam', '$katapadam', '$tanggalpulih', '', '$indikasi', '$arusggn', '$arusbeban', '$fgtm', 
						'$lat', '$lon', '$detail', '$feeder', '$up3', '$idup3', '$ulp', '$idulp', '$gigh', '$kritplgn', 
						'$dispa1','$dispa2', '$dispa3', '$status', '$nmkltr', '$ket4', '$l_r', 
						'$count', '', '', 1)";
		}
		else if ($status == 1) // Anda memilih pulih keseluruhan
		{	
			// penyulang normal keseluruhan
			$tanggalpadam = $tanggalpadam;
			$jampadam = $jampadam;
			$tanggalnormal  = $tanggalpulih;
			$jamnormal  = $jampulih;
			$tanggalpulih = $temptanggalpulih;
			$jampulih = $tempjampulih;
			// hitung lama padam = lama normal
			$dt_padam = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpadam.' '.$jampadam)));
			$dt_pulih = strtotime (date('Y-m-d H:i:s', strtotime($tanggalpulih.' '.$jampulih)));
			$dt_normal = strtotime (date('Y-m-d H:i:s', strtotime($tanggalnormal.' '.$jamnormal)));
			
			$lamapadam = gmdate ('H:i:s', $dt_pulih - $dt_padam);	
			$lamanormal = gmdate ('H:i:s', $dt_normal - $dt_padam);
			$selisih = ($dt_pulih-$dt_padam)/3600;
			$ens = 	$tegangan * $arusbeban * sqrt(3) *0.95*($selisih);				
			
			//update status ke tombol biru (pertanda penyulang pulih keseluruhan/status = 1) dan event pemulihan lainnya
			$query = "UPDATE pemadaman2 SET 
						tanggalpadam = '$tanggalpadam', jampadam = '$jampadam', jenispadam = '$jenispadam', katapadam = '$katapadam',
						tanggalpulih = '$tanggalpulih', jampulih = '$jampulih', lamapadam = '$lamapadam', indikasi = '$indikasi', 
						arusggn = '$arusggn',  arusbeban = '$arusbeban', ens = '$ens',
						fgtm = '$fgtm', lat = '$lat', lon = '$lon', detail = '$detail', feeder = '$feeder', up3 = '$up3', 
						idup3 = '$idup3', idulp = '$idulp', ulp = '$ulp', gigh = '$gigh',  kritplgn = '$kritplgn', 
						dispa1 = '$dispa1',  dispa2 = '$dispa2',  dispa3 = '$dispa3',  status = 1,  nmkltr = '$nmkltr',  
						ket4 = '$ket4', l_r = '$l_r',  count = '$count', tanggalnormal = '$tanggalnormal',  jamnormal = '$jamnormal', 
						section = '$section', remotesection = '$remotesection', ketsection = '$ketsection', lamanormal='$lamanormal'
						WHERE no='$NO'";
		}
	}

    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error());
    }
	
	if (!$result2 = mysqli_query($db, $query2)) {
        exit(mysqli_error());
    }
}

else
{
	header("Location: ../");
	die();
}

?>