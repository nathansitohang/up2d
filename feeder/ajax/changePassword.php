<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values

    $newpw = md5($_POST['newpw']);
	$idlogin = $_POST['idlogin'];
	
    // Updaste User Password
    $query = "UPDATE user SET password = '$newpw' where idlogin = '$idlogin'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error());
    }
}
?>