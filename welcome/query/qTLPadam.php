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

<div class="card-header text-white bg-danger"> <i class="fa fa-plus"></i> Entry Progress Data Gangguan <?php echo $feed;?> 
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
									<label for="tipepulih">Penyulang Sudah Pulih Keseluruhan. Sila Masukkan Detail Gangguan. ENS = '.$row["ens"].' kWh</label>
							<input type="hidden" class="form-control" id="tipepulih"  value="1" >
								</div>
							</div>
							';
						}
						else if ($row['status'] == 3)
						{
							$jampulih = $jampulih;
							$tanggalpulih = $tanggalpulih;	
							echo '
							<div class="row">
								<div class="form-group col-md-12 col-sm-12">
									<label for="tipepulih">Status Saat Ini : Pulih Bertahap.</label>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6 col-sm-6">
									<label for="tipepulih">Tipe Pemulihan</label>
									<select class="form-control" id="tipepulih">
									<option value="">--Pilih--</option>
									<option value="3">PULIH PENYULANG BERTAHAP</option>
									<option value="1">PULIH PENYULANG KESELURUHAN</option>
									<option value="2">TRIP KEMBALI</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-sm-6">
									<label for="remote">LOCAL/REMOTE</label>
									<select class="form-control" id="remote">
									<option  value="">--Pilih--</option>
									<option  value="'.base64_encode("LOCAL").'"'; if ($row['l_r']=="LOCAL") {echo "selected";} echo '>LOCAL</option>';
									echo '
									<option  value="'.base64_encode("REMOTE").'"'; if ($row['l_r']=="REMOTE") {echo "selected";} echo '>REMOTE</option>';
									echo '
									</select>
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
									<label for="tipepulih">Event Gangguan Belum Ditindaklanjuti.</label>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6 col-sm-6">
									<label for="tipepulih">Tipe Pemulihan</label>
									<select class="form-control" id="tipepulih">
									<option value="">--Pilih--</option>
									<option value="3">PULIH PENYULANG BERTAHAP</option>
									<option value="1">PULIH PENYULANG KESELURUHAN</option>
									<option value="2">TRIP KEMBALI</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-sm-6">
									<label for="remote">LOCAL/REMOTE </label>
									<select class="form-control" id="remote">
									<option  value="">--Pilih--</option>
									<option  value="'.base64_encode("LOCAL").'"'; if ($row['l_r']=="LOCAL") {echo "selected";} echo '>LOCAL</option>';
									echo '
									<option  value="'.base64_encode("REMOTE").'"'; if ($row['l_r']=="REMOTE") {echo "selected";} echo '>REMOTE</option>';
									echo '
									</select>
								</div>	
							</div>
							';
						}						
					?>
					<div id="div1">
					<div  class="row">
						<div  class="form-group col-md-3 col-sm-12">
							<label  for="section">Pilih Section</label>
								<select class="form-control" id="section">
								<option value="0" >--Isi keterangan apabila section tidak tersedia--</option>
									<?php
										$qu="SELECT * FROM `penyulang` WHERE asal = '$feed'";
										$rst = mysqli_query($db, $qu);
										
										if (!$rst)
											{
												die('Invalid query: ' . mysqli_error());
											}
										while ($brs = @mysqli_fetch_array($rst))
										{	
											?>
											
											<option value="<?php echo $brs["feeder"] ?>" ><?php echo $brs["feeder"] ?></option>
											<?php
										}
									?>
								</select>
						</div>
						<div   class="form-group col-md-3 col-sm-12">
							<label for="remotesection">LOCAL/REMOTE </label>
								<select class="form-control" id="remotesection">
								<option  value="Pilih">--Pilih--</option>
								<option  value="BELUM INTEGRASI"> BELUM INTEGRASI </option>
								<option  value="REMOTE">REMOTE </option>
								<option	 value="GAGAL REMOTE" >GAGAL REMOTE </option>
								<option  value="INVALID" >INVALID</option>
								<option  value="SWITCH POSISI LOCAL"> SWITCH POSISI LOCAL </option>
								<option  value="LBS MANUAL" > LBS MANUAL </option>
								</select>
						</div>
						<div   class="form-group col-md-6 col-sm-12">
							<label for="ketsection">KET. SECTION</label>
								<input type="text" class="form-control" placeholder="Keadaan Section" value=" "  id="ketsection" >
						</div>
					</div>		
					</div>
					<div class="row">
						<div class="form-group col-md-4 col-sm-6">
							<label for="padam">Tanggal Padam</label>
								<input type="date" class="form-control" id="tanggalpadam"  value="<?php echo $row ['tanggalpadam']; ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d', strtotime("+ 1 day")); ?>">
						</div>
						<div class="form-group col-md-2 col-sm-6">
							<label for="padam">Jam</label>
								<input type="time"  class="form-control" placeholder="Padam" value="<?php echo $jampadam; ?>" id="jampadam" onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-4 col-sm-6">
							<label  for="pulih">Tanggal Coba Pulih</label>
								<input type="date" class="form-control" id="tanggalpulih"  value="<?php echo $tanggalpulih; ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d', strtotime("+ 1 day")); ?>">
						</div>
						<div class="form-group col-md-2 col-sm-6">
							<label for="pulih">Jam</label>
								<input type="time"  class="form-control" placeholder="Pulih" value="<?php echo $jampulih; ?>" id="jampulih" onkeypress="return isNumber(event)">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-4 col-sm-6">
							<label for="indikasi">Indikasi</label>
								<select class="form-control" id="indikasi">
									<?php
										$q="SELECT DISTINCT indikasi FROM pemadaman2 where jenispadam =2 AND status = 1 ORDER BY indikasi ASC";
										$rs = mysqli_query($db, $q);
										if (!$rs)
											{
												die('Invalid query: ' . mysqli_error());
											}
										while ($brs = @mysqli_fetch_array($rs))
										{	
											?>
											
											<option value="<?php echo base64_encode ($brs["indikasi"]) ?>" <?php if($brs["indikasi"]==$row ['indikasi']) echo 'selected="selected"'; ?>><?php echo $brs["indikasi"] ?></option>
											<?php
										}
									?>
								</select>
						</div>
						<div class="form-group col-md-4 col-sm-6">
							<label for="alamat">Arus Gangguan </label>
								<input type="text" class="form-control" placeholder="R - S - T - N" value="<?php echo $row ['arusggn']; ?>"  id="arusggn" >
						</div>
						<div class="form-group col-md-2 col-sm-4">
							<label for="beban">Arus</label>
								<input type="text" class="form-control" placeholder="Bbn (A)" value="<?php echo $row ['arusbeban']; ?>"  id="arusbeban" onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-2 col-sm-4">
							<label for="beban">Tegangan</label>
								<input type="text" class="form-control" placeholder="Tegangan (kV)" value="<?php echo $row ['tegangan']; ?>"  id="tegangan" onkeypress="return isNumber(event)">
						</div>
					</div>
					<div class="row">					
						<?php
						if ($row['status'] == 1)
						{
							$hidden = "";
							$jampulih = $jampulih;
							$tanggalpulih = $tanggalpulih;
							echo '
							<div class="form-group col-md-3 col-sm-6">
								<label for="tanggalnormal">Tanggal Normal</label>
									<input type="date" class="form-control" placeholder="Tanggal Normal" value="'.$tanggalnormal.'" id="tanggalnormal"  onkeypress="return isNumber(event)">
							</div>
							<div class="form-group col-md-3 col-sm-6">
								<label for="Jam">Jam</label>
									<input type="time" class="form-control" placeholder="Jam" value="'.$jamnormal.'"  id="jamnormal"  onkeypress="return isNumber(event)">
							</div>
							';
						}
						?>
						<div class="form-group col-md-3 col-sm-6">
							<label style="color: #e8b21e;" <?php echo $hidden?> for="alamat">Lat</label>
								<input type="<?php echo $hidden?>" class="form-control" placeholder="Lat" value="<?php echo $row['lat'];?>"  id="lat"  onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-3 col-sm-6">
							<label style="color: #e8b21e;" <?php echo $hidden?> for="beban">Lon</label>
								<input type="<?php echo $hidden?>" class="form-control" placeholder="Lon" value="<?php echo $row['lon'];?>"  id="lon" onkeypress="return isNumber(event)">
						</div>
					</div>
			       <div  class="row">
						<div class="form-group col-md-6 col-sm-12">
							<label style="color: #e8b21e;" for="beban">Keterangan</label>
								<textarea  class="form-control" placeholder="Detail Penyebab Gangguan/Tindaklanjut" value="" id="detail"></textarea>
						</div>
						<div class="form-group col-md-6 col-sm-6">
							<label style="color: #e8b21e;" <?php echo $hidden?> for="indikasi">Kelompok Penyebab</label>
								<select <?php echo $hidden?> class="form-control" id="fgtm">
									<option value="<?php echo base64_encode ("Tidak Ditemukan") ?>">--Pilih Penyebab--</option>
									<?php
										$qr="SELECT DISTINCT fgtm FROM pemadaman2 where jenispadam =2  AND status = 1 ORDER BY fgtm ASC";
										$rst = mysqli_query($db, $qr);
										if (!$rst)
											{
												die('Invalid query: ' . mysqli_error());
											}
										while ($br = @mysqli_fetch_array($rst))
										{	
											?>
											
											<option value="<?php echo base64_encode ($br["fgtm"]) ?>" <?php if($br["fgtm"]==$row ['fgtm']) echo 'selected="selected"'; ?>><?php echo $br["fgtm"] ?></option>
											<?php
										}
									?>
								</select>
						</div>
						
					</div>
					
					<div class="row">
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher1">Dispatcher 1</label>
								<input type="text" class="form-control" placeholder="Dispatcher 1" value="<?php echo $row ['dispa1']; ?>"  id="dispatcher1" >
							</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher2">Dispatcher 2</label>
								<input type="text" class="form-control" placeholder="Dispatcher 2" value="<?php echo $row ['dispa2']; ?>"  id="dispatcher2" >
						</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher3">Dispatcher 3</label>
								<input type="text" class="form-control" placeholder="Dispatcher 3" value="<?php echo $row ['dispa3']; ?>"  id="dispatcher3" >
						</div>
					</div>			
						<?php $gigh= $row['gigh'];?>
						<?php $feeder= $row['feeder'];?>
						<?php $idup3= $row['idup3'];?>
						<?php $up3= $row['up3'];?>
						<?php $ulp= $row['ulp'];?>
						<?php $idulp= $row['idulp'];?>
						<?php $nmkltr= $row['nmkltr'];?>
						<?php $jenisplgn= $row['kritplgn'];?>
						<?php $daerah= $row['ket4'];?>
						<?php $count= $row['count'];?>
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
								<b>*<a id="pemulihan"><a>*</b><br>
											PYLG / KODE : <?php echo $row['feeder'];?> / <?php echo $row['nmkltr'];?> <br>
											JAM PADAM : <a id="resumejampadam"><a> WIB <br>
											<a id="pemulihan2"><a>: <a id="resumejampulih"><a> WIB <br>
											DURASI : <a id="waktupulih"><a> menit <br>
											UP3 / ULP : <?php echo $row['up3'];?> / <?php echo $row['ulp'];?> <br>
											JENIS PENYULANG : <?php echo $row['kritplgn'];?> <br>
											DAERAH LAYANAN : <?php echo $row['ket4'];?> <br>
											KETERANGAN : <a id="keterangan"><a>
											<br>										
											TRIP : <?php echo $row['count'];?> <br>
										<b>*DISPATCHER UP2D SUMUT *</b><br>
											Petugas : <br>
											*<b><a id="resumed1"></b>* <br/>
											*<b><a id="resumed2"></b>* <br/>
											*<b><a id="resumed3"></b>* <br/>	
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
$('#detail').val('<?php echo $detail;?>');
var div1 = document.getElementById("div1");

div1.style.display  = "none";

$("#pemulihan").html('PULIH PENYULANG');
$("#pemulihan2").html('JAM NYALA');		
$('#tipepulih').on('change', function (e) {
    var valueSelected = this.value;
    if (valueSelected == 3)
	{
		$("#pemulihan").html('PULIH PENYULANG BERTAHAP');
		$("#pemulihan2").html('NYALA BERTAHAP');		
		$('#detail').val('DICOBA S.D. L01 ...');
		div1.style.display  = "block";
		$('#jamselect').val('Jam Nyala Bertahap');
		$('#jampulih').val('');
	}
	else if (valueSelected == 2)
	{
		$("#pemulihan").html('TRIP KEMBALI');
		$("#pemulihan2").html('JAM TRIP KEMBALI');		
		$('#detail').val('DICOBA MASUK GAGAL');
		div1.style.display  = "none";
		$('#jamselect').val('Jam Pulih');
		$('#jampulih').val('');
	}
	else
	{
		$("#pemulihan").html('PULIH PENYULANG KESELURUHAN');
		$("#pemulihan2").html('JAM NYALA');		
		$('#detail').val('DITEMUKAN GANGGUAN DI ...');
		div1.style.display  = "none";
		$('#jamselect').val('Jam Pulih');
		$('#jampulih').val('');
	}
});
</script>
<script>						
$(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"], input[type="date"], input[type="time"], select, textarea').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>
		
<script>
$('#tanggalpadam, #jampadam, #tanggalpulih, #jampulih' ).on('change', function (e) {
function difference(date1, date2) {  
  const date1utc = Date.UTC(date1.getFullYear(), date1.getMonth(), date1.getDate(), date1.getHours(), date1.getMinutes());
  const date2utc = Date.UTC(date2.getFullYear(), date2.getMonth(), date2.getDate(), date2.getHours(), date2.getMinutes());
  return(date2utc - date1utc)/60000
}
	var tgl_a=$("#tanggalpadam").val();
	var jam_a=$("#jampadam").val();
	var tgl_b=$("#tanggalpulih").val();
	var jam_b=$("#jampulih").val();	
	var date1 = new Date(tgl_a+ ' '+ jam_a),
		date2 = new Date(tgl_b+ ' '+ jam_b),
		diff = difference(date1,date2);
		
		if (diff <= 0)
		{
			alert ("Waktu yang anda masukkan mundur");
			$('#jampulih').val('');
		}
		
$(".registration-form .btn-primary").click(function() {
		var rjm=$("#jampadam").val();
		var rjp=$("#jampulih").val();		
		var rab=$("#arusbeban").val();
		var ri=$("#indikasi").val();
		var rag=$("#arusggn").val();
		var keterangan =$("#detail").val();		
		var dispatcher1=$("#dispatcher1").val();
		var dispatcher2=$("#dispatcher2").val();
		var dispatcher3=$("#dispatcher3").val();
		
		$("#resumejampadam").html(rjm);
		$("#resumejampulih").html(rjp);		
		$("#resumearusbeban").html(rab);
		$("#resumeindikasi").html(atob(ri));
		$("#resumearusggn").html(rag);
		$("#keterangan").html(keterangan);		
		$("#resumed1").html(dispatcher1);
		$("#resumed2").html(dispatcher2);
		$("#resumed3").html(dispatcher3);
		$("#waktupulih").html(diff);
		
});				
});	    
</script>

<script>
function InsertPadam() {
var conf = confirm("Apakah data akan disimpan?");

    if (conf == true) {
			var a=$("#tanggalpadam").val(),
			b=$("#jampadam").val(),
			c=$("#tanggalpulih").val(),
			d=$("#jampulih").val(),
			e=$("#indikasi").val(),
			f=$("#arusggn").val(),
			g=$("#arusbeban").val(),
			h=$("#fgtm").val(),
			i=$("#lat").val(),
			j=$("#lon").val(),
			k=$("#detail").val(),
			r=$("#dispatcher1").val(),
			s=$("#dispatcher2").val(),
			t=$("#dispatcher3").val(),
			teg=$("#tegangan").val(),			
			u=$("#remote").val(),			
			v=$("#tipepulih").val(),
			w=$("#section").val(),
			x=$("#remotesection").val(),
			y=$("#ketsection").val(),
			aa=$("#tanggalnormal").val(),
			ab=$("#jamnormal").val();
			
	if (<?php echo $id ; ?>==<?php echo  $id ; ?> ) {
    $.post("../ajax/insertGgn.php", {
            NO:<?php echo json_encode($NO);?>,
			tanggalpadam:a,
			jampadam:b,
			tanggalpulih:c,
			tanggalnormal:c,
			tanggalnormaledit:aa,
			jampulih:d,
			jamnormal:d,			
			jamnormaledit:ab,			
			indikasi:e,
			arusggn:f,
			arusbeban:g,
			fgtm:h,
			lat:i,
			lon:j,
			detail:k,
			feeder: <?php echo json_encode($feeder);?>,
			up3: <?php echo json_encode($up3);?>,
			idup3: <?php echo json_encode($idup3);?>,
			ulp:<?php echo json_encode($ulp);?>,
			idulp:<?php echo json_encode($idulp);?>,
			gigh:<?php echo json_encode($gigh);?>,
			jenispadam: 2,
			kritplgn: <?php  echo json_encode($jenisplgn);?>,
			dispatcher1:r,
			dispatcher2:s,
			dispatcher3:t,
			ket4: <?php  echo json_encode($daerah);?>,	
			count: <?php  echo json_encode($count);?>,
			nmkltr:<?php echo json_encode($nmkltr);?>,
			state: v,
			state1:<?php echo json_encode($status1);?>,
			scada: u,
			tempjampulih : <?php echo json_encode($tempjampulih);?>,
			temptanggalpulih : <?php echo json_encode($temptanggalpulih);?>,
			section:w,
			remotesection:x,
			ketsection:y,
			tegangan:teg,
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