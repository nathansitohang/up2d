<?php 
include("db_connection.php");
?>


<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script>
Provinsi : <select name="provinsi" id="provinsi">
    <option value="">- Pilih Tempat -</option>
    <?php
    $query="SELECT * from provinsi";
	$result = mysqli_query($db, $query);
	if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
				while ($row = @mysqli_fetch_array($result)){	
   
    ?>
        <option value="<?php echo $row["id_prov"] ?>"><?php echo $row["nm_prov"] ?></option>
   
    <?php
    }
    ?>
</select>

    &nbsp;&nbsp;&nbsp;<img src="loader.gif" width="10px" height="10px" id="imgLoad" style="display:none">
    <br>
    <br>
Kota : <select name="kota" id="kota">
    <!-- hasil data dari cari_kota.php akan ditampilkan disini -->
</select>

<script>
   
    $("#provinsi").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_provinsi = $("#provinsi").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "get_up3.php",
            data: "prov="+id_provinsi,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data Kota');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#kota").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>