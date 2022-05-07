<?php
include "../../config.php";
include('../../session.php');
clearstatcache();	
	
if($_POST['NO'])
	{
		
	$rand = uniqid (substr("entryemergency", mt_rand(0, 25), 1).substr(md5(time()), 1));
	
	$id = $_POST['NO'];  
	$id = base64_decode($id);

	
	$temp = $id/8888;
	$jenis = $id/$temp;
	if ($jenis == 8888)
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
	
	$id = $id/8888;	
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
	$gangguan ="SELECT COUNT(feeder) AS ggn FROM pemadaman2 WHERE jenispadam = 2 AND  feeder = '$feed' AND month (tanggalpadam) = month(now()) 
	AND YEAR(tanggalpadam) = year(now()) AND status <> 0";
	$padam = mysqli_query($db,$gangguan);
	$har =  "SELECT COUNT(feeder) AS har FROM pemadaman2 WHERE jenispadam = 3 AND  feeder = '$feed' AND month (tanggalpadam) = month(now()) 
	AND YEAR(tanggalpadam) = year(now()) AND status <> 0";
	$padam2 = mysqli_query($db,$har);
	$eme =  "SELECT COUNT(feeder) AS eme FROM pemadaman2 WHERE jenispadam = 4 AND  feeder = '$feed' AND month (tanggalpadam) = month(now()) 
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

<div class="card-header text-white bg-success"> <i class="fa fa-plus"></i> Entri Data Pemeliharaan
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
						<div class="form-group col-md-6 col-sm-6">
							<label for="padam">Nomor IKP</label>
								<input type="text" class="form-control" placeholder = "Masukkan nomor IKP" name="<?php echo $rand;?>" id="ikp"  value="">
						</div>
						<div class="form-group col-md-6 col-sm-6">
							<label for="indikasi">Peminta Padam</label>
								<select class="form-control" name= "<?php echo $rand;?>"  id="pichar">
									<option value="<?php echo base64_encode("UP3");?>">UP3</option>
									<option value="<?php echo base64_encode("UPT");?>">UPT</option>	
									<option value="<?php echo base64_encode("UP2D");?>">UP2D</option>
									<option value="<?php echo base64_encode("Eksternal");?>">Eksternal</option>	
								</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-7 col-sm-6">
							<label for="padam">Tanggal Pemeliharaan</label>
								<input type="date" class="form-control" name= "<?php echo $rand;?>" id="tglpdmhar"  value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d', strtotime("+ 1 day")); ?>">
						</div>
						<div class="form-group col-md-4 col-sm-6">
							<label for="padam">Jam</label>
								<input type="time"  class="form-control" name= "<?php echo $rand;?>"  placeholder="Padam" value="<?php echo date('H:i') ?>" id="jmpdmhar" onkeypress="return isNumber(event)">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-7 col-sm-6">
							<label for="padam">Rencana Menyala</label>
								<input type="date" class="form-control" name= "<?php echo $rand;?>" id="tglrenpulih"  value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime("-1 months")); ?>" max="<?php echo date('Y-m-d', strtotime("+ 1 day")); ?>">
						</div>
						<div class="form-group col-md-4 col-sm-6">
							<label for="padam">Jam</label>
								<input type="time"  class="form-control" name= "<?php echo $rand;?>"  placeholder="Padam" value="" id="jmrenpulih" onkeypress="return isNumber(event)">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-sm-6">
							<label for="remote">Titik Padam</label>
								<select class="form-control" id="sectpilih">
									<option value="<?php echo $row['feeder'];?>" >PMT GI/GH</option>
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
									<option value="Lainnya">Lainnya...</option>
								</select>
						</div>				
						<div class="form-group col-md-6 col-sm-6">
							<label for="remote">LOCAL/REMOTE</label>
								<select class="form-control" name= "<?php echo $rand;?>"  id="scadaop">
									<option value="<?php echo base64_encode("REMOTE");?>">REMOTE</option>
									<option value="<?php echo base64_encode("LOCAL");?>">LOCAL</option>									
								</select>
						</div>	
					</div>
					<div id="div2har">
						<div  class="row">
							<div class="form-group col-md-8 col-sm-8">
								<label for="alamat">Input Section</label>
									<input type="text" class="form-control" name= "<?php echo $rand;?>"  placeholder="Input Section yang Dipadamkan" value="PMT GI/GH"  id="sectinsert">
							</div>
						</div>
					</div>			   
					<div class="row">
						<div class="form-group col-md-4 col-sm-6">
							<label for="alamat">Tegangan</label>
								<input type="text" class="form-control" name= "<?php echo $rand;?>"  placeholder="kV" value="20.7"  id="tgng" onkeypress="return isNumber(event)">
						</div>
						<div class="form-group col-md-6 col-sm-6">
							<label for="alamat">Beban Padam</label>
								<input type="text" class="form-control" name= "<?php echo $rand;?>"  placeholder="A" value=""  id="arusbeban" onkeypress="return isNumber(event)">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-8 col-sm-6">
							<label for="beban">Keterangan</label>
								<textarea  class="form-control" placeholder="Detail Har/ No. IKP" value="" id="dtlhar"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatchcher1">dispatchcher 1</label>
								<input name= "<?php echo $rand;?>" type="text" class="form-control" placeholder="dispatchcher 1" value="<?php echo $dispa1;?>"  id="dispt1" >
							</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatchcher2">dispatchcher 2</label>
								<input name= "<?php echo $rand;?>" type="text" class="form-control" placeholder="dispatchcher 2" value="<?php echo $dispa2;?>"  id="dispt2" >
						</div>
						<div class="form-group col-md-4 col-sm-4">
							<label for="dispatchcher3">dispatchcher 3</label>
								<input name= "<?php echo $rand;?>"  type="text" class="form-control" placeholder="dispatchcher 3" value="<?php echo $dispa3;?>"  id="dispt3" >
						</div>
					</div>
							   
<input type="hidden" class="form-control" id="detail1"  value="" >	
<?php 
$jenisplgn= $row['jenisplgn'];
$daerah= $row['ket4'];
$nmkltr= $row['nmkltr'];
$gigh= $row['gigh'];
$feeder= $row['feeder'];
$idup3= $row['idup3'];
$up3= $row['up3'];
$idulp= $row['idulp'];
$ulp= $row['ulp'];
?>


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
							<button id="button1" onclick="CopyToClipboard('divhar')" class="close" type="button"  aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-copy"></i></span>
							</button>
							<div contenteditable="true" id="divhar">
										<b>*HAR PENYULANG*</b><br>
											PYLG / KODE : <?php echo $row['feeder'];?> / <?php echo $row['nmkltr'];?> <br>
											JAM PADAM : <a id="rjamphar"><a> WIB <br>
											JAM NYALA : - WIB <br>
											UP3 / ULP : <?php echo $row['up3'];?> / <?php echo $row['ulp'];?> <br>
											JENIS PENYULANG : <?php echo $row['jenisplgn'];?> <br>
											ARUS : <a id="arushar"><a> A <br>
											DAERAH LAYANAN : <?php echo $row['ket4'];?> <br>
											KETERANGAN : <a id="dtlkethar"><a> <br>
											LEPAS : <a id="lepashar"><a><br>
											ESTIMASI PEKERJAAN: <a id="waktupulih3"><a> menit <br>
											HAR : <?php echo $har+1;?> <br>
										<b>*DISPATCHER UP2D SUMUT *</b><br>
											Petugas : <br>
											*<b><a id="dispt_1"></b>* <br/>
											*<b><a id="dispt_2"></b>* <br/>
											*<b><a id="dispt_3"></b>* <br/>	
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
var div2har = document.getElementById("div2har");
div2har.style.display  = "none";
		
$('#sectpilih').on('change', function (e) {
    var valueSelected = this.value;
    if (valueSelected == "Lainnya")
	{
		div2har.style.display  = "block";
		$('#sectinsert').val("L0");
	}
	else
	{
		div2har.style.display  = "none";
		$('#sectinsert').val(valueSelected);
	}
});
</script>

<script>
$('#ikp').on('change', function (e) {
    var valueSelected2 = this.value;
    if (valueSelected2 == "")
	{
		$('#dtlhar').val("No. IKP kosong");
	}
	else
	{
		$('#dtlhar').val("NOMOR IKP : " + valueSelected2 + ", PEKERJAAN");
	}
});
</script>

	
<script>
function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
</script>

<script>
function InsertPadam() {
var conf = confirm("Apakah data akan disimpan?");
    if (conf == true) {
			var a=$("#tglpdmhar").val(),
			b=$("#jmpdmhar").val(),
			c=$("#tglrenpulih").val(),
			d=$("#jmrenpulih").val(),
			e=$("#sectinsert").val(),
			f=$("#pichar").val(),
			g=$("#arusbeban").val(),
			h=$("#dtlhar").val(),
			i=$("#tgng").val(),
			j=$("#dispt1").val(),
			k=$("#dispt2").val(),
			l=$("#dispt3").val(),
			m=$("#scadaop").val();

	if (<?php echo $id ; ?>==<?php echo  $id ; ?>) {
    $.post("../ajax/insertHar.php", {
            NO:<?php echo json_encode($NO);?>,
			tanggalpadam:a,
			jampadam:b,
			tanggalpulih:c,
			jampulih: d,
			section : e,
			pichar :f,
			arusbeban:g,
			detail:h,
			tegangan:i,
			dispatchcher1:j,
			dispatchcher2:k,
			dispatchcher3:l,			
			remotesection:m,
			l_r:m,
			jenispadam: 1,			
			up3: <?php  echo json_encode($up3);?>,
			idup3: <?php  echo json_encode($idup3);?>,
			ulp: <?php  echo json_encode($ulp);?>,
			idulp: <?php  echo json_encode($idulp);?>,
			gigh: <?php  echo json_encode($gigh);?>,
			feeder: <?php  echo json_encode($feeder);?>,
			nmkltr: <?php  echo json_encode($nmkltr);?>,			
			kritplgn: <?php  echo json_encode($jenisplgn);?>,
			ket4: <?php  echo json_encode($daerah);?>,
			count: <?php  echo json_encode($eme+1);?>,
			state: 'entry',
			lat:'',
			lon:'',

       },
        function (data, status) {
            // hide modal popup
        $("#entryHar").modal("hide");
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
$('#tglpdmhar, #jmpdmhar, #tglrenpulih, #jmrenpulih' ).on('change', function (e) {
function difference(date_1, date_2) {  
  const date_1utc = Date.UTC(date_1.getFullYear(), date_1.getMonth(), date_1.getDate(), date_1.getHours(), date_1.getMinutes());
  const date_2utc = Date.UTC(date_2.getFullYear(), date_2.getMonth(), date_2.getDate(), date_2.getHours(), date_2.getMinutes());
  return(date_2utc - date_1utc)/60000
}
	var tgl_a=$("#tglpdmhar").val();
	var jam_a=$("#jmpdmhar").val();
	var tgl_b=$("#tglrenpulih").val();
	var jam_b=$("#jmrenpulih").val();	
	var date_1 = new Date(tgl_a+ ' '+ jam_a),
		date_2 = new Date(tgl_b+ ' '+ jam_b),
		diff = difference(date_1,date_2);
		
		if (diff <= 0)
		{
			alert ("Waktu yang anda masukkan mundur");
			$('#jmrenpulih').val('');
		}
		
$(".registration-form .btn-primary").click(function() {
		var rjam=$("#jmpdmhar").val();
		var rarb=$("#arusbeban").val();	
		var dispatch1=$("#dispt1").val();
		var dispatch2=$("#dispt2").val();
		var dispatch3=$("#dispt3").val();
		var dtlhar=$("#dtlhar").val();
		var lepashar=$("#sectinsert").val();
		
		$("#rjamphar").html(rjam);
		$("#arushar").html(rarb);		
		$("#dispt_1").html(dispatch1);
		$("#dispt_2").html(dispatch2);		
		$("#dispt_3").html(dispatch3);
		$("#dtlkethar").html(dtlhar);
		$("#lepashar").html(lepashar);				
		$("#waktupulih3").html(diff);
		
});				
});	    
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
	