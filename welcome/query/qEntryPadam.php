<?php
include "../../config.php";
include('../../session.php');
clearstatcache();	
	
if($_POST['NO'])
	{
		
	$rand = uniqid (substr("entrygangguan", mt_rand(0, 25), 1).substr(md5(time()), 1));
	
	$id = $_POST['NO'];  
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
	$query = "SELECT * FROM penyulang WHERE no = $id";
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
	if ($row ['kode_aset'] == 7)
	{
		$feeder = $row ['asal'];
	}
	else
	{
		$feeder = $row ['feeder'];
	}
	$gangguan ="SELECT COUNT(feeder) AS ggn FROM pemadaman2 WHERE jenispadam = 2 AND  feeder = '$feed' AND month (tanggalpadam) = month(now()) 
	AND YEAR(tanggalpadam) = year(now()) AND status <> 0";
	$padam = mysqli_query($db,$gangguan);
	$har =  "SELECT COUNT(feeder) AS har FROM pemadaman2 WHERE jenispadam = 1 AND  feeder = '$feed' AND month (tanggalpadam) = month(now()) 
	AND YEAR(tanggalpadam) = year(now()) AND status <> 0";
	$padam2 = mysqli_query($db,$har);
	$eme =  "SELECT COUNT(feeder) AS eme FROM pemadaman2 WHERE jenispadam = 3 AND  feeder = '$feeder' AND month (tanggalpadam) = month(now()) 
	AND YEAR(tanggalpadam) = year(now()) AND status <> 0";
	$padam3 = mysqli_query($db,$eme);
	while ($hasil = @mysqli_fetch_assoc($padam)){$ggn = $hasil['ggn']; }
	while ($hasil2 = @mysqli_fetch_assoc($padam2)){$har = $hasil2['har']; }
	while ($hasil3 = @mysqli_fetch_assoc($padam3)){$eme = $hasil3['eme']; }

	if ($row['up32']== ""){
	$spasi1="";
	$up32="";
	}
	else {
	$spasi1="&";
	$up32=$row['up32'];
	}

	if ($row['ulp2']== ""){
	$spasi="";
	$ulp2="";
	}
	else {
	$spasi="&";
	$ulp2=$row['ulp2'];} 
	?>	
	
<style>
body {
    background: #fff
}

.news {
    width: 150px
}

.news-scroll a {
    text-decoration: none
}

.dot {
    height: 6px;
    width: 6px;
    margin-left: 3px;
    margin-right: 3px;
    margin-top: 2px !important;
    background-color: rgb(207, 23, 23);
    border-radius: 50%;
    display: inline-block
}
</style>

<div class="card-header text-white bg-danger"> <i class="fa fa-plus"></i> Entri Data Gangguan 
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
					<div class="row">
						<div class="form-group col-md-7 col-sm-6">
							<label for="padam">Tanggal Padam</label>
								<input type="date" class="form-control" name= "<?php echo $rand;?>" id="tanggalpadam1"  value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d'); ?>">
						</div>
						<div class="form-group col-md-4 col-sm-6">
							<label for="padam">Jam</label>
								<input type="time"  class="form-control" name= "<?php echo $rand;?>"  placeholder="Padam" value="<?php echo date('H:i') ?>" id="jampadam1" onkeypress="return isNumber(event)">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-sm-6">
							<label for="remote">LOCAL/REMOTE</label>
								<select class="form-control" name= "<?php echo $rand;?>"  id="scada">
									<option value="<?php echo base64_encode("REMOTE");?>">REMOTE</option>
									<option value="<?php echo base64_encode("LOCAL");?>">LOCAL</option>									
								</select>
						</div>	
					</div>
					<div class="row">
						<div class="form-group col-md-7 col-sm-6">
							<label <?php echo $hidden?> for="pulih">Tanggal Pulih</label>
								<input type="<?php echo $date?>" name= "<?php echo $rand;?>"  class="form-control" id="tanggalpulih"  value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d', strtotime("+ 1 day")); ?>">
						</div>
						<div class="form-group col-md-4 col-sm-6">
							<label <?php echo $hidden?> for="pulih">Jam</label>
								<input type="<?php echo $time?>"  name= "<?php echo $rand;?>"  class="form-control" placeholder="Pulih" value="" id="jampulih" onkeypress="return isNumber(event)">
						</div>
					</div>
			   
					<div class="row">
						<div class="form-group col-md-8 col-sm-8">
							<label for="indikasi">Indikasi</label>
								<select class="form-control" name= "<?php echo $rand;?>"  id="indikasi1">
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
											<option value="<?php echo base64_encode ($brs["indikasi"]) ?>"><?php echo $brs["indikasi"] ?></option>
											<?php
										}
									?>
								</select>
						</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="alamat">Arus Gangguan</label>
								<input type="text" class="form-control" name= "<?php echo $rand;?>"  placeholder="R - S - T - N" value=""  id="arusggn1" >
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-sm-6">
							<label for="alamat">Beban</label>
								<input type="text" class="form-control" name= "<?php echo $rand;?>"  placeholder="A" value=""  id="arusbeban1" onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-6 col-sm-6">
							<label for="alamat">Tegangan</label>
								<input type="text" class="form-control" name= "<?php echo $rand;?>"  placeholder="kV" value="20.7"  id="tegangan" onkeypress="return isNumber(event)">
						</div>
					</div>
			
					<div class="row">
						<div class="form-group col-md-12 col-sm-12">
							<label <?php echo $hidden?> for="indikasi">Kelompok Penyebab</label>
								<select  <?php echo $hidden?> name= "<?php echo $rand;?>"  class="form-control" id="fgtm">
									<option  value="<?php echo base64_encode ("Tidak Ditemukan") ?>">--Pilih Penyebab--</option>
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
											
											<option name= "<?php echo $rand;?>"  value="<?php echo base64_encode ($br["fgtm"]) ?>"><?php echo $br["fgtm"] ?></option>
											<?php
										}
									?>
								</select>
						</div>
					</div>
					<div <?php echo $hidden?> class = "row">
						<div class="form-group col-md-6 col-sm-6">
							<label <?php echo $hidden?> for="alamat">Lat</label>
								<input name= "<?php echo $rand;?>"  type="<?php echo $hidden?>" class="form-control" placeholder="Lat" value=""  id="lat"  onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-6 col-sm-6">
							<label <?php echo $hidden?> for="beban">Lon</label>
								<input name= "<?php echo $rand;?>" type="<?php echo $hidden?>" class="form-control" placeholder="Lon" value=""  id="lon" onkeypress="return isNumber(event)">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher1">Dispatcher 1</label>
								<input name= "<?php echo $rand;?>" type="text" class="form-control" placeholder="Dispatcher 1" value="<?php echo $dispa1;?>"  id="dispatcher1a" >
							</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher2">Dispatcher 2</label>
								<input name= "<?php echo $rand;?>" type="text" class="form-control" placeholder="Dispatcher 2" value="<?php echo $dispa2;?>"  id="dispatcher2a" >
						</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatcher3">Dispatcher 3</label>
								<input name= "<?php echo $rand;?>"  type="text" class="form-control" placeholder="Dispatcher 3" value="<?php echo $dispa3;?>"  id="dispatcher3a" >
						</div>
					</div>
					
			   
<input type="hidden" class="form-control" id="gigh"  value="<?php echo  $row['gigh'];?>" >
<input type="hidden" class="form-control" id="feeder"  value="<?php echo $row['feeder'];?>" >
<input type="hidden" class="form-control" id="idup3"  value="<?php echo $row['idup3'];?>" >
<input type="hidden" class="form-control" id="up3"  value="<?php echo $row['up3'];?>" >
<input type="hidden" class="form-control" id="ulp"  value="<?php echo $row['ulp'];?>" >		
<input type="hidden" class="form-control" id="idulp"  value="<?php echo $row['idulp'];?>" >	
<input type="hidden" class="form-control" id="detail1"  value="" >	
<input type="hidden" class="form-control" id="nmkltr"  value="<?php echo $row['nmkltr'];?>" >
<?php $jenisplgn= $row['jenisplgn'];?>
<?php $daerah= $row['ket4'];?>

					<button type="button" id="next" class="btn btn-primary ">Next</button> 
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
							<button id="button1" onclick="CopyToClipboard('div1')" class="close" type="button"  aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-copy"></i></span>
							</button>
							<div contenteditable="true" id="div1">
										<b>*TRIP PENYULANG*</b><br>
											PYLG / KODE : <?php echo $row['feeder'];?> / <?php echo $row['nmkltr'];?> <br>
											JAM PADAM : <a id="resumejampadam1"><a> WIB <br>
											JAM NYALA : - WIB <br>
											UP3 / ULP : <?php echo $row['up3'];?> / <?php echo $row['ulp'];?> <br>
											JENIS PENYULANG : <?php echo $row['jenisplgn'];?> <br>
											ARUS : <a id="resumearusbeban1"><a> A <br>
											ARUS GANGGUAN : <a id="resumearusggn1"><a> <br>
											INDIKASI : <a id="resumeindikasi1"><a> <br>
											DAERAH LAYANAN : <?php echo $row['ket4'];?> <br>
											TRIP : <?php echo $ggn+1;?> <br>
										<b>*DISPATCHER UP2D SUMUT *</b><br>
											Petugas : <br>
											*<b><a id="dispa1copy"></b>* <br/>
											*<b><a id="dispa2copy"></b>* <br/>
											*<b><a id="dispa3copy"></b>* <br/>	
							</div>											
						</div>
				</div>
					<div class="row">
						<div class="form-group col-md-12 col-sm-12">
						
						</div>
					</div>
					
					
					<button type="button" class="btn btn-info">Previous</button>                           
					<button class="btn" onclick="InsertPadam()">Simpan</button>							
				</div>
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
$(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"], input[type="date"], input[type="time"], select, textarea').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>

<script>
$(".registration-form .btn-primary").click(function() {
		var rjm=$("#jampadam1").val();
		var rab=$("#arusbeban1").val();
		var rag=$("#arusggn1").val();
		var ri=$("#indikasi1").val();		
		var dispatcher1=$("#dispatcher1a").val();
		var dispatcher2=$("#dispatcher2a").val();
		var dispatcher3=$("#dispatcher3a").val();
		
		$("#resumejampadam1").html(rjm);
		$("#resumearusbeban1").html(rab);		
		$("#resumearusggn1").html(rag);
		$("#resumeindikasi1").html(atob(ri));
		$("#dispa1copy").html(dispatcher1);
		$("#dispa2copy").html(dispatcher2);		
		$("#dispa3copy").html(dispatcher3);

});
</script>	

	
<script>
function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
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
<script>
function InsertPadam() {
var conf = confirm("Apakah data akan disimpan?");
    if (conf == true) {
			var a1=$("#tanggalpadam1").val(),
			b1=$("#jampadam1").val(),
			c1=$("#tanggalpulih").val(),
			d1=$("#jampulih").val(),
			e1=$("#indikasi1").val(),
			f1=$("#arusggn1").val(),
			g1=$("#arusbeban1").val(),
			teg=$("#tegangan").val(),
			h1=$("#fgtm").val(),
			i1=$("#lat").val(),
			j1=$("#lon").val(),
			l1=$("#feeder").val(),
			m1=$("#up3").val(),
			n1=$("#idup3").val(),
			o1=$("#ulp").val(),
			p1=$("#idulp").val(),
			q1=$("#gigh").val(),
			r1=$("#dispatcher1a").val(),
			s1=$("#dispatcher2a").val(),
			t1=$("#dispatcher3a").val(),
			u1=$("#nmkltr").val(),
			v1=$("#scada").val();
			

	if (<?php echo $id ; ?>==<?php echo  $id ; ?>) {
    $.post("../ajax/insertGgn.php", {
            NO:<?php echo json_encode($NO);?>,
			tanggalpadam:a1,
			jampadam:b1,
			tanggalpulih:c1,
			jampulih:d1,
			indikasi:e1,
			arusggn:f1,
			arusbeban:g1,
			tegangan:teg,
			fgtm:"",
			lat:i1,
			lon:j1,
			detail:"",
			feeder: l1,
			up3: m1,
			idup3: n1,
			ulp:o1,
			idulp:p1,
			gigh:q1,
			jenispadam: 2,
			kritplgn: <?php  echo json_encode($jenisplgn);?>,
			ket4: <?php  echo json_encode($daerah);?>,
			count: <?php  echo json_encode($ggn+1);?>,			
			dispatcher1:r1,
			dispatcher2:s1,
			dispatcher3:t1,
			nmkltr:u1,
			scada: v1,
			state: 'entry',		
       },
        function (data, status) {
            // hide modal popup
        $("#entryGgn").modal("hide");
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
<?php
print str_pad('',4096)."\n";
ob_flush();
flush();
set_time_limit(45);
?>
