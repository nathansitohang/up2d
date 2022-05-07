<?php
    include "../../config.php";
	include('../../session.php');

	
	
		if($_POST['idgardu']) {
		$id = $_POST['idgardu'];  
		$id = base64_decode($id);
		$id = $id/7238985;				
		$query = "SELECT * FROM master WHERE idgardu = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}

        while ($row = @mysqli_fetch_assoc($result)){
            
    if ($row['konstruksi'] == 1) { $konstruksi = 'Single Pole Tanpa Rak' ;}
   else if ($row['konstruksi'] == 2) { $konstruksi = 'Single Pole Dengan Rak';}
   else if ($row['konstruksi'] == 3) { $konstruksi = 'Double Pole' ;}
   else if ($row['konstruksi'] == 4) { $konstruksi = 'Beton';}
   else if ($row['konstruksi'] == 5) { $konstruksi = 'Kios';}
   else { $konstruksi = 'Belum Pilih'; }
		
	$beban1=$row['beban1'];
	$beban2=$row['beban2'];
	
	$fasan=$row['fasa'];
	if ($fasan == 1)
	{$netral1=$row['netral1']*$row['kapasitas']*1.5;
	$netral2=$row['netral2']*$row['kapasitas']*1.5;
	$maxi_1=$row['maxi_1']*$row['kapasitas']*1.5;
	$maxi_2=$row['maxi_2']*$row['kapasitas']*1.5;	
	
	}
	else{
	$netral1=$row['netral1']*$row['kapasitas'];
	$netral2=$row['netral2']*$row['kapasitas'];
	$maxi_1=$row['maxi_1']*$row['kapasitas'];
	$maxi_2=$row['maxi_2']*$row['kapasitas'];
	}
	$idgardu=base64_encode(123678*$row['idgardu']);
	$idrayonku=$row['idrayon'];
		
?>





<div class="card-header"> <i class="fa fa-pencil"  ></i>      Edit Data Trafo	  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
   <div class="col-md-12 form-box">
      <form role="form" class="registration-form" method= "post" action="javascript:void(0);">
         <fieldset>
            <div class="form-top">
               <div class="form-top-left">
                  <h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>&nbsp<?php echo $row['kodegd']; ?> </h3>


                  <p> <strong>1. Data Umum </strong></p>
               </div>
            </div>
            <div class="form-bottom">
               <div class="row">
                  <div class="form-group col-md-9 col-sm-9">
                     <label for="alamat">Alamat</label>
                     <input type="text" class="form-control kapital" placeholder="Address" value="<?php echo $row['alamat']; ?>" id="alamat"> 

                  </div>
               </div>
               <div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                     <div class="form-group col-md-9 col-sm-9">
                        <label for="feeder">Penyulang</label>
                        <select class="form-control" id="feeder">
                           <option value="0" <?php if ($row['feeder'] == '0') { echo "selected"; } ?> >--Pilih GI--</option>
                           <option value="AK" <?php if ($row['feeder'] == 'AK') { echo "selected"; } ?>>AK-GI AEK KANOPAN</option>
                           <option value="BT" <?php if ($row['feeder'] == 'BT') { echo "selected"; } ?>>BT-GI BERAS TAGI</option>
                           <option value="DA" <?php if ($row['feeder'] == 'DA') { echo "selected"; } ?>>DA-GI DENAI</option>
                           <option value="DN" <?php if ($row['feeder'] == 'DN') { echo "selected"; } ?>>DN-GI DENAI</option>
                           <option value="GG" <?php if ($row['feeder'] == 'GG') { echo "selected"; } ?>>GG-GI GLUGUR</option>
                           <option value="GL" <?php if ($row['feeder'] == 'GL') { echo "selected"; } ?>>GL-GI GLUGUR</option>
                           <option value="GU" <?php if ($row['feeder'] == 'GU') { echo "selected"; } ?>>GU-GI GLUGUR</option>
                           <option value="GP" <?php if ($row['feeder'] == 'GP') { echo "selected"; } ?>>GP-GI GUNUNG PARA</option>
                           <option value="GS" <?php if ($row['feeder'] == 'GS') { echo "selected"; } ?>>GS-GI GUNUNG SITOLI </option>
                           <option value="KI" <?php if ($row['feeder'] == 'KI') { echo "selected"; } ?>>KI-GI KIM</option>
                           <option value="KM" <?php if ($row['feeder'] == 'KM') { echo "selected"; } ?>>KM-GI KIM</option>
                           <option value="KN" <?php if ($row['feeder'] == 'KN') { echo "selected"; } ?>>KN-GI KISARAN</option>
                           <option value="KS" <?php if ($row['feeder'] == 'KS') { echo "selected"; } ?>>KS-GI KISARAN</option>
                           <option value="KP" <?php if ($row['feeder'] == 'KP') { echo "selected"; } ?>>KP-GI KOTA PINANG</option>
                           <option value="KT" <?php if ($row['feeder'] == 'KT') { echo "selected"; } ?>>KT-GI KUALA TANJUNG</option>
                           <option value="LB" <?php if ($row['feeder'] == 'LB') { echo "selected"; } ?>>LB-GI LABUHAN</option>
                           <option value="LH" <?php if ($row['feeder'] == 'LH') { echo "selected"; } ?>>LH-GI LAMHOTMA</option>
                           <option value="LM" <?php if ($row['feeder'] == 'LM') { echo "selected"; } ?>>LM-GI LAMHOTMA</option>
                           <option value="LI" <?php if ($row['feeder'] == 'LI') { echo "selected"; } ?>>LI-GI LISTRIK</option>
                           <option value="LK" <?php if ($row['feeder'] == 'LK') { echo "selected"; } ?>>LK-GI LISTRIK</option>
                           <option value="LO" <?php if ($row['feeder'] == 'LO') { echo "selected"; } ?>>LO-GI LOHO(PLTD)</option>
                           <option value="MA" <?php if ($row['feeder'] == 'MA') { echo "selected"; } ?>>MA-GI MABAR</option>
                           <option value="BG" <?php if ($row['feeder'] == 'BG') { echo "selected"; } ?>>BG-GI BINJAI</option>
                           <option value="BN" <?php if ($row['feeder'] == 'BN') { echo "selected"; } ?>>BN-GI BINJAI</option>
                           <option value="GT" <?php if ($row['feeder'] == 'GT') { echo "selected"; } ?>>GT-GI GUNUNG TUA</option>
                           <option value="NR" <?php if ($row['feeder'] == 'NR') { echo "selected"; } ?>>NR-GI NAMORAMBE</option>
                           <option value="PD" <?php if ($row['feeder'] == 'PD') { echo "selected"; } ?>>PD-GI P SIDIMPUAN</option>
                           <option value="PA" <?php if ($row['feeder'] == 'PA') { echo "selected"; } ?>>PA-GI PAYA GELI</option>
                           <option value="PG" <?php if ($row['feeder'] == 'PG') { echo "selected"; } ?>>PG-GI PAYA GELI</option>
                           <option value="PL" <?php if ($row['feeder'] == 'PL') { echo "selected"; } ?>>PL-GI PAYA GELI</option>
                           <option value="PP" <?php if ($row['feeder'] == 'PP') { echo "selected"; } ?>>PP-GI PAYA PASIR</option>
                           <option value="PY" <?php if ($row['feeder'] == 'PY') { echo "selected"; } ?>>PY-GI PAYA PASIR</option>
                           <option value="PU" <?php if ($row['feeder'] == 'PU') { echo "selected"; } ?>>PU-GI PERBAUNGAN</option>
                           <option value="PB" <?php if ($row['feeder'] == 'PB') { echo "selected"; } ?>>PB-GI PKL BRANDAN</option>
                           <option value="PK" <?php if ($row['feeder'] == 'PK') { echo "selected"; } ?>>PK-GI PKL BRANDAN</option>
                           <option value="PM" <?php if ($row['feeder'] == 'PM') { echo "selected"; } ?>>PM-GI PMTG SIANTAR</option>
                           <option value="PS" <?php if ($row['feeder'] == 'PS') { echo "selected"; } ?>>PS-GI PMTG SIANTAR</option>
                           <option value="PI" <?php if ($row['feeder'] == 'PI') { echo "selected"; } ?>>PI-GI PORSEA</option>
                           <option value="PO" <?php if ($row['feeder'] == 'PO') { echo "selected"; } ?>>PO-GI PORSEA</option>
                           <option value="P9" <?php if ($row['feeder'] == 'P9') { echo "selected"; } ?>>P9-GI PULAU SEMBILAN</option>
                           <option value="RA" <?php if ($row['feeder'] == 'RA') { echo "selected"; } ?>>RA-GI RANTAUPRAPAT</option>
                           <option value="RT" <?php if ($row['feeder'] == 'RT') { echo "selected"; } ?>>RT-GI RANTAUPRAPAT</option>
                           <option value="SN" <?php if ($row['feeder'] == 'SN') { echo "selected"; } ?>>SN-GI SEI ROTAN</option>
                           <option value="SO" <?php if ($row['feeder'] == 'SO') { echo "selected"; } ?>>SO-GI SEI ROTAN</option>
                           <option value="SR" <?php if ($row['feeder'] == 'SR') { echo "selected"; } ?>>SR-GI SEI ROTAN</option>
                           <option value="ST" <?php if ($row['feeder'] == 'ST') { echo "selected"; } ?>>ST-GI SEI ROTAN</option>
                           <option value="SB" <?php if ($row['feeder'] == 'SB') { echo "selected"; } ?>>SB-GI SIBOLGA</option>
                           <option value="SD" <?php if ($row['feeder'] == 'SD') { echo "selected"; } ?>>SD-GI SIDIKALANG</option>
                           <option value="TM" <?php if ($row['feeder'] == 'TM') { echo "selected"; } ?>>TM-GI TAMORA</option>
                           <option value="TR" <?php if ($row['feeder'] == 'TR') { echo "selected"; } ?>>TR-GI TARUTUNG</option>
                           <option value="RB" <?php if ($row['feeder'] == 'RB') { echo "selected"; } ?>>RB-GI TEBING TINGGI</option>
                           <option value="RN" <?php if ($row['feeder'] == 'RN') { echo "selected"; } ?>>RN-GI TEBING TINGGI</option>
                           <option value="TL" <?php if ($row['feeder'] == 'TL') { echo "selected"; } ?>>TL-GI TELE</option>
                           <option value="TD" <?php if ($row['feeder'] == 'TD') { echo "selected"; } ?>>TD-GI TELUK DALAM</option>
                           <option value="TI" <?php if ($row['feeder'] == 'TI') { echo "selected"; } ?>>TI-GI TITI KUNING</option>
                           <option value="TN" <?php if ($row['feeder'] == 'TN') { echo "selected"; } ?>>TN-GI TITI KUNING</option>
                           <option value="TT" <?php if ($row['feeder'] == 'TT') { echo "selected"; } ?>>TT-GI TITI KUNING</option>
                        </select>
                     </div>
                     <div class="form-group col-md-3 col-sm-3">
                        <label for="ufeeder">&nbsp</label>
                        <input type="text" class="form-control" placeholder="Urut" value="<?php echo $row['ufeeder']; ?>" id="ufeeder" onkeypress="return isNumber(event)">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-md-6 col-sm-6">
                     <label for="lat">Koordinat</label>
                     <input type="text" class="form-control" placeholder="Latitude" value="<?php echo $row['lat']; ?>" id="lat" onkeypress="return isNumber(event)">
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                     <label for="lng">&nbsp</label>
                     <input type="text" class="form-control" placeholder="Longitude" value="<?php echo $row['lng']; ?>" id="lng" onkeypress="return isNumber(event)">
                  </div>
               </div>
               <div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                     <div class="form-group col-md-8 col-sm-8">
                        <label for="konstruksi">Konstruksi</label>
                        <select class="form-control"id="konstruksi">
                           <option value="" <?php if ($row['konstruksi'] == "") { echo "selected"; } ?>>--Pilih Konstruksi--</option>
                           <option value="1" <?php if ($row['konstruksi'] == '1') { echo "selected"; } ?>>Single Pole Tanpa Rak</option>
                           <option value="2" <?php if ($row['konstruksi'] == '2') { echo "selected"; } ?>>Single Pole Dengan Rak</option>
                           <option value="3" <?php if ($row['konstruksi'] == "3") { echo "selected"; } ?>>Double Pole</option>
                           <option value="4" <?php if ($row['konstruksi'] == "4") { echo "selected"; } ?>>Beton</option>
                           <option value="5" <?php if ($row['konstruksi'] == "5") { echo "selected"; } ?>>Kios</option>
                        </select>
                     </div>
                  </div>
               </div>
               <button type="button" class="btn btn-primary ">Next</button>
            </div>
         </fieldset>
         <fieldset>
            <div class="form-top">
               <div class="form-top-left">
                  <p> <strong>2. Nameplate Trafo</strong></p>
               </div>
            </div>
            <div class="form-bottom">
               <div class="row">
                  <div class="form-group col-md-7 col-sm-7">
                     <label for="exampleInputName">Merk</label>
                     <select class="form-control" id="merek">
                        <option value=""<?php if ($row['merek'] == "") { echo "selected"; } ?>>--Pilih Merek Trafo--</option>
                        <option value="No Nameplate" <?php if ($row['merek'] == "No Nameplate") { echo "selected"; } ?>>No Nameplate</option>
                        <option value="Trafo Mobile" <?php if ($row['merek'] == "Trafo Mobile") { echo "selected"; } ?>>Trafo Mobile</option>
                        <option value="SHANGHAI" <?php if ($row['merek'] == "SHANGHAI") { echo "selected"; } ?>>SHANGHAI</option>
                        <option value="MORAWA" <?php if ($row['merek'] == "MORAWA") { echo "selected"; } ?>>MORAWA</option>
                        <option value="SINTRA" <?php if ($row['merek'] == "SINTRA") { echo "selected"; } ?>>SINTRA</option>
                        <option value="B &amp; D" <?php if ($row['merek'] == "B &amp; D") { echo "selected"; } ?>>B &amp; D</option>
                        <option value="TRAFINDO" <?php if ($row['merek'] == "TRAFINDO") { echo "selected"; } ?>>TRAFINDO</option>
                        <option value="UNINDO" <?php if ($row['merek'] == "UNINDO") { echo "selected"; } ?>>UNINDO</option>
                        <option value="STARLITE" <?php if ($row['merek'] == "STARLITE") { echo "selected"; } ?>>STARLITE</option>
                        <option value="VOLTRA" <?php if ($row['merek'] == "VOLTRA") { echo "selected"; } ?>>VOLTRA</option>
                        <option value="SCHNEIDER" <?php if ($row['merek'] == "SCHNEIDER") { echo "selected"; } ?>>SCHNEIDER</option>
                        <option value="HICO" <?php if ($row['merek'] == "HICO") { echo "selected"; } ?>>HICO</option>
                        <option value="W &amp; H" <?php if ($row['merek'] == "W &amp; H") { echo "selected"; } ?>>W &amp; H</option>
                        <option value="G &amp; E" <?php if ($row['merek'] == "G &amp; E") { echo "selected"; } ?>>G &amp; E</option>
                        <option value="COUPER <?php if ($row['merek'] == "COUPER") { echo "selected"; } ?>">COUPER</option>
                        <option value="TATUNG" <?php if ($row['merek'] == "TATUNG") { echo "selected"; } ?>>TATUNG</option>
                        <option value="KALA" <?php if ($row['merek'] == "KALA") { echo "selected"; } ?>>KALA</option>
                        <option value="SIEMENS" <?php if ($row['merek'] == "SIEMENS") { echo "selected"; } ?>>SIEMENS</option>
                        <option value="SBI" <?php if ($row['merek'] == "SBI") { echo "selected"; } ?>>SBI</option>
                        <option value="SHENGYANG" <?php if ($row['merek'] == "SHENGYANG") { echo "selected"; } ?>>SHENGYANG</option>
                        <option value="SIERA <?php if ($row['merek'] == "SIERA") { echo "selected"; } ?>">SIERA</option>
                        <option value="FRANS" <?php if ($row['merek'] == "FRANS") { echo "selected"; } ?>>FRANS</option>
                        <option value="PAUWELS"<?php if ($row['merek'] == "PAUWELS") { echo "selected"; } ?>>PAUWELS</option>
                        <option value="CENTRADO" <?php if ($row['merek'] == "CENTRADO") { echo "selected"; } ?>>CENTRADO</option>
                        <option value="KALTRA" <?php if ($row['merek'] == "KALTRA") { echo "selected"; } ?>>KALTRA</option>
                        <option value="MASTER GREEN" <?php if ($row['merek'] == "MASTER GREEN") { echo "selected"; } ?>>MASTER GREEN</option>
                        <option value="LUCKY LIGHT" <?php if ($row['merek'] == "LUCKY LIGHT") { echo "selected"; } ?>>LUCKY LIGHT</option>
                     </select>
                  </div>
                  <div class="form-group col-md-5 col-sm-5">
                     <label for="noseri">Nomor Seri</label>
                     <input type="text" class="form-control" placeholder="Serial Number" value="<?php echo $row['noseri']; ?>" id="noseri">
                  </div>
               </div>
               <div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                     <div class="form-group col-md-4 col-sm-4">
                        <label for="kapasitas">Daya</label>
                        <input type="text" class="form-control" placeholder="kVA" value="<?php echo $row['kapasitas']; ?>" id="kapasitas" onkeypress="return isNumber(event)">
                     </div>
                     <div class="form-group col-md-4 col-sm-4">
                        <div class="form-check form-check-inline">
                           <label class="form-check-label">
                           <label for="exampleInputName">Fasa</label>
                           </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="fasa" id="1fasa" value="1" <?php if ($row['fasa'] == '1') { echo "checked"; } ?>> 1&nbsp&nbsp
                           <input  class="form-check-input" type="radio" name="fasa" id="3fasa" value="3" <?php if ($row['fasa'] == '3') { echo "checked"; } ?>> 3
                           </label>
                        </div>
                     </div>
                     <div class="form-group col-md-4 col-sm-4">
                        <label for="thntrafo">Tahun Trafo</label>
                        <input type="text" class="form-control" placeholder="tttt" value="<?php echo $row['thntrafo']; ?>" id="thntrafo" onkeypress="return isNumber(event)">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-md-3 col-sm-3">
                     <label for="jlh_tap">Jumlah Tap</label>
                     <input type="text" class="form-control" placeholder="Jumlah" value="<?php echo $row['jlh_tap']; ?>" id="jlh_tap" onkeypress="return isNumber(event)">
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                     <label for="pos_tap">Posisi Tap</label>
                     <input type="text" class="form-control" placeholder="Posisi" value="<?php echo $row['pos_tap']; ?>" id="pos_tap" onkeypress="return isNumber(event)">
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                     <label for="imp">Impedansi</label>
                     <input type="text" class="form-control" placeholder="Imp" value="<?php echo $row['imp']; ?>" id="imp" onkeypress="return isNumber(event)">
                  </div>
               </div>
               <div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                     <div class="form-group col-md-7 col-sm-7">
                        <label for="exampleInputName">Jenis Minyak</label>
                        <select class="form-control" id="minyak">
                           <option value="" <?php if ($row['minyak'] == "") { echo "selected"; } ?> >--Pilih Jenis Minyak</option>
                           <option value="Mineral" <?php if ($row['minyak'] == "Mineral") { echo "selected"; } ?> >Mineral</option>
                           <option value="Diala A" <?php if ($row['minyak'] == "Diala A") { echo "selected"; } ?> >Diala A</option>
                           <option value="Diala B" <?php if ($row['minyak'] == "Diala B") { echo "selected"; } ?> >Diala B</option>
                           <option value="Diala C" <?php if ($row['minyak'] == "Diala C") { echo "selected"; } ?> >Diala C</option>
                           <option value="Esso 90" <?php if ($row['minyak'] == "Esso 90") { echo "selected"; } ?> >Esso 90</option>
                           <option value="Mictrans B" <?php if ($row['minyak'] == "") { echo "selected"; } ?> >Mictrans B</option>
                        </select>
                     </div>
                     <div class="form-group col-md-4 col-sm-4">
                        <label for="exampleInputName">Vector Group</label>
                        <input type="text" class="form-control" placeholder="Vector Group" value="<?php echo $row['vector']; ?>" id="vector">
                     </div>
                  </div>
               </div>
               <button type="button" class="btn btn-info">Previous</button>                           
               <button type="button" class="btn btn-primary ">Next</button>
            </div>
         </fieldset>
         <fieldset>
            <div class="form-top">
               <div class="form-top-left">
                  <p> <strong>3. Data Tambahan</strong></p>
               </div>
            </div>
            <div class="form-bottom">
               <div class="row">
                  <div class="form-group col-md-4 col-sm-4">
                     <label for="exampleInputName">Jumlah Jurusan</label>
                     <input type="text" class="form-control" placeholder="Jumlah" value= "<?php echo $row['jlh_jur']; ?>" id="jlh_jur" onkeypress="return isNumber(event)">
                  </div>
               </div>
               <div class="form-group">
                  <label for="exampleInputName">Keterangan Tambahan</label>
                  <textarea class="form-control" rows="5" id="keterangan"><?php echo $row['ket']; ?></textarea>
               </div>
               <button type="button" class="btn btn-info">Previous</button>
               <button class="btn" onclick="UpdateGardu()">Simpan</button>							
            </div>
         </fieldset>
      </form>
   </div>
</div>
<div class="card-footer small text-muted">&copy 2018 - SiHD</div>





						
<script>					
$(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>				
	
               
<?php } }
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
$(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>

<script>
function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
</script>

<script>
function UpdateGardu(){if(1==confirm("Apakah Anda yakin untuk mengubah data?")){var a=$("#alamat").val(),d=(a=$("#alamat").val(),$("#kapasitas").val()),i=$("#feeder").find(":selected").val(),n=$("#ufeeder").val(),r=$("#lat").val(),v=$("#lng").val(),s=$("#konstruksi").find(":selected").val(),u=$("#merek").find(":selected").val(),k=$("#noseri").val(),o=$("input[name=fasa]:checked").val(),p=$("#thntrafo").val(),h=$("#jlh_tap").val(),m=$("#pos_tap").val(),f=$("#imp").val(),c=$("#minyak").find(":selected").val(),g=$("#vector").val(),_=$("#tgl_psg").val(),j=$("#jlh_jur").val(),ket=$("#keterangan").val();<?php echo $login_idrayon ; ?>==<?php echo  $idrayonku ; ?>?$.post("../ajax/updateDetailGardu.php",{idgardu:<?php echo json_encode($idgardu); ?>,alamat:a,kapasitas:d,feeder:i,ufeeder:n,lat:r,lng:v,konstruksi:s,merek:u,noseri:k,fasa:o,thntrafo:p,jlh_tap:h,pos_tap:m,imp:f,minyak:c,vector:g,tgl_psg:_,jlh_jur:j,ket:ket,beban1:<?php echo $beban1 ; ?>,beban2:<?php echo  $beban2 ; ?>,netral1:<?php echo $netral1 ; ?>,netral2:<?php echo  $netral2 ; ?>,maxi_1:<?php echo $maxi_1 ; ?>,maxi_2:<?php echo  $maxi_2 ; ?>},function(a){$("#modEdit").modal("hide"),alert("Data berhasil diubah!"),location.href="../master_gardu"}):alert("Anda tidak memiliki hak akses untuk mengubah data")}}
</script>