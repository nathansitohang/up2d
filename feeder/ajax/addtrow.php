<?php
include('../../session.php');
if (isset($_POST['nama']))
	{
	include ("db_connection.php");
	// get values
	$nama = $_POST['nama'];
	$ptgs = $_POST['ptgs'];	
	$tgl = $_POST['tgl_row'];
	$lokasi = $_POST['lokasi'];
	$type = $_POST['type'];	
	$kms = $_POST['kms'];
	$parentid = $_POST['parentid'];
	$level = $_POST['level'];	
	$kms_row = $_POST['kms_row'];
	
	$query = "INSERT INTO row(name, ptgs_row, tglrow,kms_row, addr, type, kms, parent_id, level, idarea, idrayon, area, rayon) VALUES('$nama', '$ptgs', '$tgl','$kms_row', '$lokasi', '$type', '$kms', '$parentid', '$level', '$login_idarea', '$login_idrayon', '$login_area', '$login_rayon')";
	if (!$result = mysqli_query($db, $query))
		{
		exit(mysqli_error());
		}

	echo "1 Record Added!";
	
	$kw = "UPDATE `penyulang` SET `tglrow` = '$tgl', `kms_row`='$kms_row' WHERE `name` = '$nama'";
    if (!$result = mysqli_query($db, $kw)) {
        exit(mysqli_error());
    }
	}
?>