<?php
include('session.php');
if(isset($_POST['submit']))
{    
     $dispa1 = $_POST['dispatcher1'];
     $dispa2 = $_POST['dispatcher2'];
     $dispa3 = $_POST['dispatcher3'];
     $sql = "INSERT INTO session (dispa1,dispa2,dispa3)
     VALUES ('$dispa1','$dispa2','$dispa3')";
	 
     if (mysqli_query($db, $sql)) {
           header('Location: welcome');;

     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($db);
     }
     mysqli_close($db);
}

?>