<?php
// include Database connection file
include("db_connection.php");



// check request
if(isset($_POST))
{
    // get values
		$id=$_POST['id'];
		
		
$query = "UPDATE pemadaman2 SET status= 0 WHERE no=$id";



    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error());
    }
}
?>