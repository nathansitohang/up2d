<?php
include "../../config.php";
include('../../session.php');
clearstatcache();	
	
	
if($_POST['NO'])
	{
	$id = $_POST['NO'];  
	$status1 = $_POST['status1'];  	
	$id = base64_decode($id);
	
	$temp = $id/1234;
	$jenis = $id/$temp;
	if ($jenis == 1234)
	{
		$time = "hidden";	
		$date = "hidden";	
		$hidden = "hidden";	
	}
	else
	{
		$time = "time";
		$date = "date";
		$hidden = "";
	}
	
	
	$id = $id/1234;	
	$query = "SELECT * FROM pemadaman2 WHERE no = $id";
	$result = mysqli_query($db, $query);
	if (!$result) 
	{
		die('Invalid query: ' . mysqli_error());
	}

	while ($row = @mysqli_fetch_assoc($result))
	{
	$NO=base64_encode(123678*$row['no']);
	$tahun= date(' Y ');
	$feed= $row ['feeder'];
	$remote= $row ['l_r'];
	$jampadam = strftime("%H:%M", strtotime($row['jampadam']));
	$jampulih = strftime("%H:%M", strtotime($row['jampulih']));
	$tanggalpulih = strftime("%Y-%m-%d", strtotime($row['tanggalpulih']));
	$lamapadam = $row['lamapadam'];
	if ($lamapadam == 0)
	{
		$lamapadam = "";
	}
	
	else
	{
	function minutes($lamapadam)
	{
	$lamapadam = explode(':', $lamapadam);
	return ($lamapadam[0]*60) + ($lamapadam[1]) + ($lamapadam[2]/60);
	}
	$lamapadam = minutes ($lamapadam);
	}
	
	$tempjampulih = strftime("%H:%M", strtotime($row['jampulih']));
	$temptanggalpulih = strftime("%Y-%m-%d", strtotime($row['tanggalpulih']));	
	$jamnormal = strftime("%H:%M", strtotime($row['jamnormal']));	
	$tanggalnormal = strftime("%Y-%m-%d", strtotime($row['tanggalnormal']));		
	$detail= $row ['detail'];
	$gangguan ="SELECT COUNT(feeder) AS ggn FROM pemadaman2 WHERE jenispadam = 2 AND  feeder = '$feed' AND month (tanggalpadam) = month(now()) 
	AND YEAR(tanggalpadam) = year(now()) AND status <> 0 AND tripkembali <> 1";
	$padam = mysqli_query($db,$gangguan);
	$har =  "SELECT COUNT(feeder) AS har FROM pemadaman2 WHERE jenispadam = 1 AND feeder = '$feed' AND month (tanggalpadam) = month(now())
	AND YEAR(tanggalpadam) = year(now()) AND status <> 0";
	$padam2 = mysqli_query($db,$har);
	$eme =  "SELECT COUNT(feeder) AS eme FROM pemadaman2 WHERE jenispadam = 3 AND feeder = '$feed' AND month (tanggalpadam) = month(now())
	AND YEAR(tanggalpadam) = year(now()) AND status <> 0";
	$padam3 = mysqli_query($db,$eme);
	while ($hasil = @mysqli_fetch_assoc($padam)){$ggn = $hasil['ggn']; }
	while ($hasil2 = @mysqli_fetch_assoc($padam2)){$har = $hasil2['har']; }
	while ($hasil3 = @mysqli_fetch_assoc($padam3)){$eme = $hasil3['eme']; }
	?>	
	
<style>
body{background:#fff}.news{width:150px}.news-scroll a{text-decoration:none}.dot{height:6px;width:6px;margin-left:3px;margin-right:3px;margin-top:2px!important;background-color:#cf1717;border-radius:50%;display:inline-block}
</style>

<style>
.radio-group label{overflow:hidden}.radio-group input{height:1px;width:1px;position:absolute;top:-20px}.radio-group .not-active{color:#3276b1;background-color:#fff}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<div class="card-header text-white bg-secondary"> <i class="fa fa-plus"></i> Entry Progress Data Emergency
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>

<div class="modal-body">
	<div class="col-md-12 form-box">
		<form role="form" class="registration-form" method= "get" action="javascript:void(0);">
			<fieldset id="a">
				<div class="form-top">
					<div class="form-top-left">
						<div class="row">
							<div class="col-md-12">
								<div class="d-flex justify-content-between align-items-center breaking-news bg-white">
									<div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news">
										<span class="d-flex align-items-center">&nbsp;<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
										</span>&nbsp<?php echo $row['feeder'];?>
									</div>
									<marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> 
											<a href="#">Jumlah pemadaman di bulan ini </a> 
											<span class="dot"></span> <a href="#">Gangguan: <?php echo $ggn;?> </a> 
											<span class="dot"></span> <a href="#">Pemeliharaan: <?php echo $har;?></a>  
											<span class="dot"></span> <a href="#">Emergency: <?php echo $eme;?></a> 				
									</marquee>
								</div>
							</div>
						</div>
					</div>
				</div>
			<br/>
				<div class="form-bottom">
					<?php
						if ($row['status'] == 1)
						{
							$jampulih = $jampulih;
							$tanggalpulih = $tanggalpulih;
							echo '
							<div class="row">
								<div class="form-group col-md-12 col-sm-12">
									<label for="tipepulih">Penyulang Sudah Pulih Keseluruhan. Sila Masukkan Detail Lengkap Pemadaman Emergency. ENS = '.$row["ens"].' kWh</label>
							<input type="hidden" class="form-control" id="tipepulih"  value="1" >
								</div>
							</div>
							';
						}
						
						else
						{
							$jampulih = "";
							$tanggalpulih = $tanggalpulih;
							
							echo '
							<div class="row">
								<div class="form-group col-md-12 col-sm-12">
									<label for="tipepulih">Event Padam Emergency Belum Ditindaklanjuti.</label>
								</div>
							</div>
							';
						}						
					?>
					<div class="row">
						<div class="form-group col-md-3 col-sm-6">
							<label for="padam">Tanggal Padam</label>
								<input type="date" class="form-control" id="tanggalpadamtl"  value="<?php echo $row ['tanggalpadam']; ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d', strtotime("+ 1 day")); ?>">
						</div>
						<div class="form-group col-md-2 col-sm-6">
							<label for="padam">Jam</label>
								<input type="time"  class="form-control" placeholder="Padam" value="<?php echo $row ['jampadam']; ?>" id="jampadamtl" onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-3 col-sm-6">
							<label  for="pulih">Pulih Emergency</label>
								<input type="date" class="form-control" id="tanggalpulihtl"  value="<?php echo $tanggalpulih; ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d', strtotime("+ 1 day")); ?>">
						</div>
						<div class="form-group col-md-2 col-sm-6">
							<label for="pulih">Jam</label>
								<input type="time"  class="form-control" placeholder="Pulih" value="<?php echo $jampulih; ?>" id="jampulihtl" onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-2 col-sm-6">
							<label for="pulih">Durasi(Menit)</label>
								<input type="text"  class="form-control" placeholder="Durasi" disabled value="<?php echo $lamapadam; ?>" id="durationtl" onkeypress="return isNumber(event)">
						</div>				
					</div>
					<div  class="row">
						<div class="form-group col-md-3 col-sm-6">
							<label for="remote">Titik Padam</label>
								<input type="text" class="form-control" placeholder="Titik Padam" value="<?php echo $row['section']?>"  id="sectiontl" disabled >								
						</div>
						<div   class="form-group col-md-3 col-sm-6">
							<label for="remotesection">LOCAL/REMOTE </label>
								<select class="form-control" id="remotesectiontl">
								<option  value="<?php echo base64_encode("REMOTE");?>" <?php if ($row['remotesection']=="REMOTE"){echo "selected";} ?>>REMOTE </option>
								<option  value="<?php echo base64_encode("LOCAL");?>" <?php if ($row['remotesection']=="LOCAL"){echo "selected";} ?>>LOCAL </option>
								</select>
						</div>
						<div class="form-group col-md-2 col-sm-4">
							<label for="beban">Arus</label>
								<input type="text" class="form-control" placeholder="Bbn (A)" value="<?php echo $row ['arusbeban']; ?>"  id="arusbebantl" onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-2 col-sm-4">
							<label for="beban">Tegangan</label>
								<input type="text" class="form-control" placeholder="Tegangan (kV)" value="<?php echo $row ['tegangan']; ?>"  id="tegangantl" onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-2 col-sm-4">
							<label for="beban">PIC</label>
								<input type="text" disabled class="form-control" placeholder="PIC" value="<?php echo $row ['pic']; ?>"  id="pictl">
						</div>
					</div>		
					<div class="row">
						<div class="form-group col-md-6 col-sm-12">
							<label style="color: #e8b21e;" for="beban">Keterangan</label>
								<textarea  class="form-control" placeholder="Detail Pemadaman Emergency" value="" id="detailx"></textarea>
						</div>					
						<?php
						if ($row['status'] == 1)
						{
							$hidden = "";
							$jampulih = $jampulih;
							$tanggalpulih = $tanggalpulih;
							echo '
							<div hidden class="form-group col-md-3 col-sm-6">
								<label for="tanggalnormal">Tanggal Normal</label>
									<input type="date" class="form-control" placeholder="Tanggal Normal" value="'.$tanggalnormal.'" id="tanggalnormaltl"  onkeypress="return isNumber(event)">
							</div>
							<div hidden class="form-group col-md-3 col-sm-6">
								<label for="Jam">Jam</label>
									<input type="time" class="form-control" placeholder="Jam" value="'.$jamnormal.'"  id="jamnormaltl"  onkeypress="return isNumber(event)">
							</div>
							';
						}
						?>
						<div class="form-group col-md-3 col-sm-6">
							<label style="color: #e8b21e;" <?php echo $hidden?> for="alamat">Lat</label>
								<input type="<?php echo $hidden?>" class="form-control" placeholder="Lat" value="<?php echo $row['lat'];?>"  id="lattl"  onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-3 col-sm-6">
							<label style="color: #e8b21e;" <?php echo $hidden?> for="beban">Lon</label>
								<input type="<?php echo $hidden?>" class="form-control" placeholder="Lon" value="<?php echo $row['lon'];?>"  id="lontl" onkeypress="return isNumber(event)">
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher1">Dispatcher 1</label>
								<input type="text" class="form-control" placeholder="Dispatcher 1" value="<?php echo $row ['dispa1']; ?>"  id="dispatl1" >
							</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher2">Dispatcher 2</label>
								<input type="text" class="form-control" placeholder="Dispatcher 2" value="<?php echo $row ['dispa2']; ?>"  id="dispatl2" >
						</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher3">Dispatcher 3</label>
								<input type="text" class="form-control" placeholder="Dispatcher 3" value="<?php echo $row ['dispa3']; ?>"  id="dispatl3" >
						</div>
					</div>									
						<?php 
						$jenisplgn= $row['kritplgn'];
						$daerah= $row['ket4'];
						$nmkltr= $row['nmkltr'];
						$gigh= $row['gigh'];
						$feeder= $row['feeder'];
						$idup3= $row['idup3'];
						$up3= $row['up3'];
						$idulp= $row['idulp'];
						$ulp= $row['ulp'];
						$count= $row['count'];
						?>
						<?php
						if ($row['status'] == 1)
						{
							echo '
							<button class="btn" onclick="InsertPadam()">Simpan</button>							
							';
						}
						else 
						{
							echo '
							<button type="button" id="next" class="btn btn-primary ">Next</button> 
							';
						}
					?>
				</div>
			</fieldset>
			
			<fieldset id="b">
				<div class="form-top">
					<div class="form-top-left">
                  <h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>&nbsp<?php echo $row['feeder'];?>  <?php echo $row['nmkltr']; ?> </h3>
					</div>
				</div>
				<br/>
				<div class="form-bottom">
					<div  class="row">
						<div class="form-group col-md-12 col-sm-12">
							<button id="button1" onclick="CopyToClipboard('div2')" class="close" type="button"  aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-copy"></i></span>
							</button>
							<div contenteditable="true" id="div2">
								<b>*NORMAL PENYULANG EMERGENCY*</b><br>
											PYLG / KODE : <?php echo $row['feeder'];?> / <?php echo $row['nmkltr'];?> <br>
											JAM PADAM : <a id="rjmpadam"><a> WIB <br>
											JAM NYALA: <a id="rjmpulih"><a> WIB <br>
											DURASI : <a id="waktupulih3"><a> menit <br>
											UP3 / ULP : <?php echo $row['up3'];?> / <?php echo $row['ulp'];?> <br>
											JENIS PENYULANG : <?php echo $row['kritplgn'];?> <br>
											DAERAH LAYANAN : <?php echo $row['ket4'];?> <br>
											KETERANGAN : <a id="kettl"><a>
											<br>										
											EMERGENCY : <?php echo $row['count'];?> <br>
										<b>*DISPATCHER UP2D SUMUT *</b><br>
											Petugas : <br>
											*<b><a id="dp1"></b>* <br/>
											*<b><a id="dp2"></b>* <br/>
											*<b><a id="dp3"></b>* <br/>	
											<br>	
							</div>											
						</div>
					</div>
				</div>
					<button type="button" class="btn btn-info">Previous</button>
					<button class="btn" onclick="InsertPadam()">Simpan</button>							
			</fieldset>
		</form>
	</div>
</div>
<div class="card-footer small text-muted">&copy 2022 - SiHD</div>           
<?php } }

else
{
header("Location: ../../");
die();
}


?>
<style>
form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
</style>

<style>
.kapital 
{
    text-transform:capitalize;
}</style>
						


<script>
function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
</script>

<script>						
$(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"], input[type="date"], input[type="time"], select, textarea').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>



		
<script>
$('#detailx').val('<?php echo $detail;?>');

$('#tanggalpadamtl, #jampadamtl, #tanggalpulihtl, #jampulihtl' ).on('change', function (e) {
function difference(date1, date2) {  
  const date1utc = Date.UTC(date1.getFullYear(), date1.getMonth(), date1.getDate(), date1.getHours(), date1.getMinutes());
  const date2utc = Date.UTC(date2.getFullYear(), date2.getMonth(), date2.getDate(), date2.getHours(), date2.getMinutes());
  return(date2utc - date1utc)/60000
}
	var tgl_a=$("#tanggalpadamtl").val();
	var jam_a=$("#jampadamtl").val();
	var tgl_b=$("#tanggalpulihtl").val();
	var jam_b=$("#jampulihtl").val();	
	var date1 = new Date(tgl_a+ ' '+ jam_a),
		date2 = new Date(tgl_b+ ' '+ jam_b),
		diff = difference(date1,date2);
	
$('#durationtl').val(diff);

		
		if (diff <= 0)
		{
			alert ("Waktu yang anda masukkan mundur");
			$('#jampulihtl').val('');
			$('#durationtl').val('');
		}
		
$(".registration-form .btn-primary").click(function() {
		var rjmpadam=$("#jampadamtl").val();
		var rjmpulih=$("#jampulihtl").val();
		var ket =$("#detailx").val();		
		var dispa1=$("#dispatl1").val();
		var dispa2=$("#dispatl2").val();
		var dispa3=$("#dispatl3").val();		
		
		$("#rjmpadam").html(rjmpadam);
		$("#rjmpulih").html(rjmpulih);		
		$("#waktupulih3").html(diff);
		$("#kettl").html(ket);		
		$("#dp1").html(dispa1);
		$("#dp2").html(dispa2);
		$("#dp3").html(dispa3);
		
});				
});	    
</script>

<script>
function InsertPadam() {
var conf = confirm("Apakah data akan disimpan?");

    if (conf == true) {
			var a=$("#tanggalpadamtl").val(),
			b=$("#jampadamtl").val(),
			c=$("#tanggalpulihtl").val(),
			d=$("#jampulihtl").val(),
			e=$("#sectiontl").val(),
			f=btoa($("#pictl").val()),
			g=$("#arusbebantl").val();
			h=$("#detailx").val(),
			i=$("#tegangantl").val(),
			j=$("#dispatl1").val(),
			k=$("#dispatl2").val(),
			l=$("#dispatl3").val(),
			m=$("#lattl").val(),
			n=$("#lontl").val(),
			o=$("#durationtl").val(),						
			p=$("#remotesectiontl").val(),			
			q=$("#tanggalnormaltl").val(),
			r=$("#jamnormaltl").val();				
			
	if (<?php echo $id ; ?>==<?php echo  $id ; ?> ) {
    $.post("../ajax/insertEme.php", {
            NO:<?php echo json_encode($NO);?>,
			tanggalpadam:a,
			jampadam:b,
			tanggalpulih:c,
			jampulih:d,
			section:e,
			pic:f,
			arusbeban:g,
			detail:h,			
			tegangan:i,
			dispatcher1:j,
			dispatcher2:k,
			dispatcher3:l,
			lat:m,
			lon:n,
			duration:o,
			remotesection:p,
			tanggalnormal:q,
			jamnormal:r,	
			feeder: <?php echo json_encode($feeder);?>,
			up3: <?php echo json_encode($up3);?>,
			idup3: <?php echo json_encode($idup3);?>,
			ulp:<?php echo json_encode($ulp);?>,
			idulp:<?php echo json_encode($idulp);?>,
			gigh:<?php echo json_encode($gigh);?>,
			jenispadam: 3,
			kritplgn: <?php  echo json_encode($jenisplgn);?>,
			ket4: <?php  echo json_encode($daerah);?>,	
			count: <?php  echo json_encode($count);?>,
			nmkltr:<?php echo json_encode($nmkltr);?>,
			state:1,
        },
        function (data, status) {
        $("#tlpadam").modal("hide");
		location.href='../padam'
        }
    );
}
else {
alert('Error!');
location.href='../padam'
}
}
}
</script>

<script>
function CopyToClipboard(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy");
  } 
	else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");
    alert("Laporan has been copied")
  }
}
</script>
<?php
print str_pad('',4096)."\n";
ob_flush();
flush();
set_time_limit(45);
?>