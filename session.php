<?php
	date_default_timezone_set("Asia/Jakarta");

session_start();
if (!isset($_SESSION['login_user']))
	{
	header("location:login.php");
	}
	
include ('koneksi.php');

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($db, "select idlogin, namalogin, username, idarea, idrayon, area, rayon, role, lat, lng, last_login from user where username = '$user_check' ");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$login_session = $row['namalogin'];
$login_idarea = $row['idarea'];
$namalogin = $row['namalogin'];

$login_idrayon = $row['idrayon'];
$login_role = $row['role'];
$login_username = $row['username'];
$login_last = $row['last_login'];
$login_area = $row['area'];
$login_rayon = $row['rayon'];
$kali = $row['idlogin'];
$login_lat = $row['lat'];
$login_lng = $row['lng'];
$t_sql = "UPDATE user SET last_login= now() WHERE username = '$user_check'";
$t_result = mysqli_query($db, $t_sql);
$dispa_sql = mysqli_query($db, "select * from session where 1 ORDER by waktu DESC LIMIT 1");
$baris = mysqli_fetch_array($dispa_sql, MYSQLI_ASSOC);
$dispa1 = $baris['dispa1'];
$dispa2 = $baris['dispa2'];
$dispa3 = $baris['dispa3'];





$timeout = 6*60; // Set timeout menit
$logout_redirect_url = "login.php"; // Set logout URL
$timeout = $timeout * 60; // Ubah menit ke detik

if (isset($_SESSION['start_time']))
	{
	$elapsed_time = time() - $_SESSION['start_time'];
	if ($elapsed_time >= $timeout)
		{
		session_destroy();
		echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
		}
	}

$_SESSION['start_time'] = time();

?>