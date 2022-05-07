<?php
    include "../../config.php";
	include('../../session.php');

	
	
		if($_POST['NO']) {
		$id = $_POST['NO'];  
		$id = base64_decode($id);
		$id = $id/7238985;				
		$query = "SELECT * FROM penyulang WHERE no = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}

        while ($row = @mysqli_fetch_assoc($result)){
            
	$NO=base64_encode(123678*$row['no']);
	
	
	

// Mendapatkan IP pengunjung menggunakan getenv()
		
?>





<div class="card-header"> <i class="fa fa-pencil"  ></i> Edit Data Keypoint	  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
   <div class="col-md-12 form-box">
      <form role="form" class="registration-form" method= "post" action="javascript:void(0);">
           <div class="form-top">
               <div class="form-top-left">
                  <h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>&nbsp<?php echo $row['feeder']; ?> </h3>
				  <input type="hidden" id="nmkltr" class="form-control" placeholder="nomor_kp" value="<?php echo $row['nmkltr']; ?>">


               </div>
			   <br/>
            </div>
            <div class="form-bottom">
			
			
			<div class="row">
                  <div class="form-group col-md-6 col-sm-6">
                     <label for="lat">Penyulang</label>
                     <input type="text" id="asal" class="form-control" placeholder="Penyulang" value="<?php echo $row['asal']; ?>">
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                     <label for="lng">Section</label>
                     <input type="text" id="section" class="form-control" placeholder="Section" value="<?php echo $row['section']; ?>" >
                  </div>
				  
               </div>
			
			
			
			
			
			
			
			
			
			
			
               <div class="row">
                  <div class="form-group col-md-10 col-sm-9">
                     <label for="alamat">Alamat</label>
                     <input type="text" class="form-control kapital" placeholder="Address" value="<?php echo $row['ALAMAT']; ?>" id="ALAMAT"> 

                  </div>
               </div>
			   
			   
			   
			   
			   
			   
			   
			   
               <div class="row">
                  <div class="form-group col-md-5 col-sm-6">
                     <label for="lat">Koordinat</label>
                     <input type="text"  class="form-control" placeholder="Latitude" value="<?php echo $row['lat']; ?>" id="lat" onkeypress="return isNumber(event)">
                  </div>
                  <div class="form-group col-md-5 col-sm-6">
                     <label for="lng">&nbsp  </label>
                     <input type="text"  class="form-control" placeholder="Longitude" value="<?php echo $row['lon']; ?>" id="lon" onkeypress="return isNumber(event)">
                  </div>
				   <div class="form-group col-md-1 col-sm-6">
                     <label for="lng">&nbsp</label>
						<button style="color:#fff" class="btn btn-secondary btn-circle" title="Get Coordinates" onclick="getLocationConstant()"><i class="fa fa-map-marker"  ></i></button>		



						
                  </div>
               </div>
               <div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                     <div class="form-group col-md-6 col-sm-8">
                        <label for="konstruksi">Jenis</label>
                        <input type="text" class="form-control" placeholder="Jenis" value="<?php echo $row['jns_cb']; ?>" id="jns_cb">
                     </div>
                  </div>
               </div>
               <button class="btn" onclick="UpdateKP()">Simpan</button>							
            </div>
         
      </form>
   </div>
</div>
<div class="card-footer small text-muted">&copy 2022 - SiHD</div>
               
<?php } }
?>



<style>
.kapital 
{
    text-transform:capitalize;
}</style>						


<script>
function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
</script>

<script>
function UpdateKP(){if(1==confirm("Apakah Anda yakin untuk mengubah data?")){
var a=$("#nmkltr").val(),
b=$("#asal").val(),
c=$("#section").val(),
d=$("#ALAMAT").val(),
e=$("#lat").val(),
f=$("#lon").val(),
g=$("#jns_cb").val()

;

<?php echo $id ; ?>==<?php echo  $id ; ?>?$.post("../ajax/updateKeypoint.php",{NO:<?php echo json_encode($NO); ?>,
asal:b,
nmkltr:a,
section:c,
ALAMAT:d,
lat:e,
lon:f,
jns_cb:g,






},




function(a){$("#modView").modal("hide"),alert("Data berhasil diubah!"),location.href="../kp"}):alert("Anda tidak memiliki hak akses untuk mengubah data")}}
</script>


<script type="text/javascript">
    function getLocationConstant() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
        } else {
            alert("Your browser or device doesn't support Geolocation");
        }
    }

    // If we have a successful location update
    function onGeoSuccess(event) {
        document.getElementById("lat").value = event.coords.latitude;
        document.getElementById("lon").value = event.coords.longitude;

    }

    // If something has gone wrong with the geolocation request
    function onGeoError(event) {
        alert("Error code " + event.code + ". " + event.message);
    }
</script>