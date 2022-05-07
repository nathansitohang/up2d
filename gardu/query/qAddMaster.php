<?php
   include('../..//session.php'); 
?>

<div class="card-header"> <i class="fa fa-plus"  ></i>      Tambah Data Trafo	  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
   <div class="col-md-12 form-box">
      <form role="form" class="registration-form" action="javascript:void(0);">
         <fieldset>
            <div class="form-top">
               <div class="form-top-left">
                  <p> <strong>1. Data Umum </strong></p>
               </div>
            </div>
            <div class="form-bottom">
               <div class="row">
                  <div class="form-group col-md-4 col-sm-4">
                     <label for="kodegd">Kode Gardu</label>
                     <input type="text" class="form-control" placeholder="Card"   maxlength="6" id="kodegd">
                  </div>
                  <div class="form-group col-md-8 col-sm-8">
                     <label for="alamat">Alamat</label>
                     <input type="text" class="form-control" placeholder="Address" id="alamat" style="text-transform:capitalize">
                  </div>
               </div>
               <div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                     <div class="form-group col-md-9 col-sm-9">
                        <label for="feeder">Penyulang</label>
                        <select class="form-control" id="feeder">
                           <option value="">--Pilih GI--</option>
                           <option value="AK">AK-GI AEK KANOPAN</option>
                           <option value="BT">BT-GI BRASTAGI</option>
                           <option value="DA">DA-GI DENAI</option>
                           <option value="DN">DN-GI DENAI</option>
                           <option value="GG">GG-GI GLUGUR</option>
                           <option value="GL">GL-GI GLUGUR</option>
                           <option value="GU">GU-GI GLUGUR</option>
                           <option value="GP">GP-GI GUNUNG PARA</option>
                           <option value="GS">GS-GI GUNUNG SITOLI </option>
                           <option value="KI">KI-GI KIM</option>
                           <option value="KM">KM-GI KIM</option>
                           <option value="KN">KN-GI KISARAN</option>
                           <option value="KS">KS-GI KISARAN</option>
                           <option value="KP">KP-GI KOTA PINANG</option>
                           <option value="KT">KT-GI KUALA TANJUNG</option>
                           <option value="LB">LB-GI LABUHAN</option>
                           <option value="LH">LH-GI LAMHOTMA</option>
                           <option value="LM">LM-GI LAMHOTMA</option>
                           <option value="LI">LI-GI LISTRIK</option>
                           <option value="LK">LK-GI LISTRIK</option>
                           <option value="LO">LO-GI LOHO(PLTD)</option>
                           <option value="MA">MA-GI MABAR</option>
                           <option value="BG">BG-GI MEDAN</option>
                           <option value="BN">BN-GI MEDAN</option>
                           <option value="GT">GT-GI MODULAR</option>
                           <option value="NR">NR-GI NAMORAMBE</option>
                           <option value="PD">PD-GI P SIDIMPUAN</option>
                           <option value="PA">PA-GI PAYA GELI</option>
                           <option value="PG">PG-GI PAYA GELI</option>
                           <option value="PL">PL-GI PAYA GELI</option>
                           <option value="PP">PP-GI PAYA PASIR</option>
                           <option value="PY">PY-GI PAYA PASIR</option>
                           <option value="PU">PU-GI PERBAUNGAN</option>
                           <option value="PB">PB-GI PKL BRANDAN</option>
                           <option value="PK">PK-GI PKL BRANDAN</option>
                           <option value="PM">PM-GI PMTG SIANTAR</option>
                           <option value="PS">PS-GI PMTG SIANTAR</option>
                           <option value="PI">PI-GI PORSEA</option>
                           <option value="PO">PO-GI PORSEA</option>
                           <option value="P9">P9-GI PULAU SEMBILAN</option>
                           <option value="RA">RA-GI RANTAUPRAPAT</option>
                           <option value="RT">RT-GI RANTAUPRAPAT</option>
                           <option value="SN">SN-GI SEI ROTAN</option>
                           <option value="SO">SO-GI SEI ROTAN</option>
                           <option value="SR">SR-GI SEI ROTAN</option>
                           <option value="ST">ST-GI SEI ROTAN</option>
                           <option value="SB">SB-GI SIBOLGA</option>
                           <option value="SD">SD-GI SIDIKALANG</option>
                           <option value="TM">TM-GI TAMORA</option>
                           <option value="TR">TR-GI TARUTUNG</option>
                           <option value="RB">RB-GI TEBING TINGGI</option>
                           <option value="RN">RN-GI TEBING TINGGI</option>
                           <option value="TL">TL-GI TELE</option>
                           <option value="TD">TD-GI TELUK DALAM</option>
                           <option value="TI">TI-GI TITI KUNING</option>
                           <option value="TL">TL-GI TITI KUNING</option>
                           <option value="TN">TN-GI TITI KUNING</option>
                           <option value="TT">TT-GI TITI KUNING</option>
                        </select>
                     </div>
                     <div class="form-group col-md-3 col-sm-3">
                        <label for="uruttd">&nbsp</label>
                        <input type="text" class="form-control" placeholder="Urut" id="uruttd" onkeypress="return isNumber(event)">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-md-6 col-sm-6">
                     <label for="lat">Koordinat</label>
                     <input type="text" class="form-control" placeholder="Latitude" id="lat" onkeypress="return isNumber(event)">
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                     <label for="lng">&nbsp</label>
                     <input type="text" class="form-control" placeholder="Longitude" id="lng" onkeypress="return isNumber(event)">
                  </div>
               </div>
               <div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                     <div class="form-group col-md-8 col-sm-8">
                        <label for="konstruksi">Konstruksi</label>
                        <select class="form-control"id="konstruksi">
                           <option value="">--Pilih Konstruksi--</option>
                           <option value="1">Single Pole Tanpa Rak</option>
                           <option value="2">Single Pole Dengan Rak</option>
                           <option value="3">Double Pole</option>
                           <option value="4">Beton</option>
                           <option value="5">Kios</option>
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
                     <label for="merek">Merek</label>
                     <select class="form-control" id="merek">
                        <option value="">--Pilih Merek--</option>
                        <option value="No Nameplate">No Nameplate</option>
                        <option value="Trafo Mobile">Trafo Mobile</option>
                        <option value="SHANGHAI">SHANGHAI</option>
                        <option value="MORAWA">MORAWA</option>
                        <option value="SINTRA">SINTRA</option>
                        <option value="B &amp; D">B &amp; D</option>
                        <option value="TRAFINDO">TRAFINDO</option>
                        <option value="UNINDO">UNINDO</option>
                        <option value="STARLITE">STARLITE</option>
                        <option value="VOLTRA">VOLTRA</option>
                        <option value="SCHNEIDER">SCHNEIDER</option>
                        <option value="HICO">HICO</option>
                        <option value="W &amp; H">W &amp; H</option>
                        <option value="G &amp; E">G &amp; E</option>
                        <option value="COUPER">COUPER</option>
                        <option value="TATUNG">TATUNG</option>
                        <option value="KALA">KALA</option>
                        <option value="SIEMENS">SIEMENS</option>
                        <option value="SBI">SBI</option>
                        <option value="SHENGYANG">SHENGYANG</option>
                        <option value="SIERA">SIERA</option>
                        <option value="FRANS">FRANS</option>
                        <option value="PAUWELS">PAUWELS</option>
                        <option value="CENTRADO">CENTRADO</option>
                        <option value="KALTRA">KALTRA</option>
                        <option value="MASTER GREEN">MASTER GREEN</option>
                        <option value="LUCKY LIGHT">LUCKY LIGHT</option>
                     </select>
                  </div>
                  <div class="form-group col-md-5 col-sm-5">
                     <label for="noseri">Nomor Seri</label>
                     <input type="text" class="form-control" placeholder="Serial Number" id="noseri">
                  </div>
               </div>
               <div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                     <div class="form-group col-md-4 col-sm-4">
                        <label for="kapasitas">Daya</label>
                        <input type="text" class="form-control" placeholder="kVA" id="kapasitas" onkeypress="return isNumber(event)">
                     </div>
                     <div class="form-group col-md-4 col-sm-4">
                        <div class="form-check form-check-inline">
                           <label class="form-check-label">
                           <label for="fasa">Fasa</label>
                           </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="fasa" id="1fasa" value="1"> 1&nbsp&nbsp
                           <input  class="form-check-input" type="radio" name="fasa" id="3fasa" value="3"> 3
                           </label>
                        </div>
                     </div>
                     <div class="form-group col-md-4 col-sm-4">
                        <label for="thntrafo">Tahun Trafo</label>
                        <input type="text" class="form-control" placeholder="tttt" id="thntrafo" onkeypress="return isNumber(event)">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-md-3 col-sm-3">
                     <label for="jlh_tap">Jumlah Tap</label>
                     <input type="text" class="form-control" placeholder="Jumlah" id="jlh_tap" onkeypress="return isNumber(event)">
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                     <label for="pos_tap">Posisi Tap</label>
                     <input type="text" class="form-control" placeholder="Posisi" id="pos_tap" onkeypress="return isNumber(event)">
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                     <label for="imp">Impedansi</label>
                     <input type="text" class="form-control" placeholder="Imp" id="imp" onkeypress="return isNumber(event)">
                  </div>
               </div>
               <div class="form-group" style="margin-bottom:3px;">
                  <div class="row">
                     <div class="form-group col-md-7 col-sm-7">
                        <label for="minyak">Jenis Minyak</label>
                        <select class="form-control" id="minyak">
                           <option value="">--Pilih Jenis Minyak</option>
                           <option value="Mineral">Mineral</option>
                           <option value="Diala A">Diala A</option>
                           <option value="Diala B">Diala B</option>
                           <option value="Diala C">Diala C</option>
                           <option value="Esso 90">Esso 90</option>
                           <option value="Mictrans B">Mictrans B</option>
                        </select>
                     </div>
                     <div class="form-group col-md-4 col-sm-4">
                        <label for="vector">Vector Group</label>
                        <input type="text" class="form-control" placeholder="Vector Group" id="vector">
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
                  <div class="form-group col-md-8 col-sm-8">
                     <label for="tgl_psg">Tanggal Pasang</label>
                     <input id="datefield" type="date" class="form-control" id="tgl_psg" min='1899-01-01' max='2000-13-13'>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-md-12 col-sm-12">
                     <label for="jlh_jur">Jumlah Jurusan</label>
                     <input type="text" class="form-control" id="jlh_jur" onkeypress="return isNumber(event)">					
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="ket">Keterangan Tambahan</label>
               <textarea class="form-control" rows="5" id="ket"></textarea>
            </div>
            <button type="button" class="btn btn-info">Previous</button>
            <button type="button" class="btn btn-primary" onclick="addRecord()">Submit</button>
   </div>
   </fieldset>
   </form>
</div>
</div>
<div class="card-footer small text-muted">&copy 2020 - SiHD</div>
<style>
   form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
</style>
<script>						
   $(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>	
<script>
   function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
</script>
<script>										
   function addRecord(){var a=$("#kodegd").val(),e=$("#alamat").val(),l=$("#kapasitas").val(),t=$("#feeder").find(":selected").val(),d=$("#uruttd").val(),s=$("#lat").val(),r=$("#lng").val(),i=$("#konstruksi").find(":selected").val(),n=$("#merek").find(":selected").val(),v=$("#noseri").val(),o=$("input[name=fasa]:checked").val(),p=$("#thntrafo").val(),k=$("#jlh_tap").val(),f=$("#pos_tap").val(),m=$("#imp").val(),c=$("#minyak").find(":selected").val(),h=$("#vector").val(),u=$("#tgl_psg").val(),g=$("#jlh_jur").val(),_=$("#ket").val();k>=8?alert("Error:Jumlah tap salah!"):f>k?alert("Error:Posisi tap > Jumlah Tap!"):""== a?alert("Kode gardu kosong!"):$.post("../ajax/addMaster.php",{kodegd:a,alamat:e,kapasitas:l,feeder:t,uruttd:d,lat:s,lng:r,konstruksi:i,merek:n,noseri:v,fasa:o,thntrafo:p,jlh_tap:k,pos_tap:f,imp:m,minyak:c,vector:h,tgl_psg:u,jlh_jur:g,ket:_},function(a,e){$("#modAddMaster").modal("hide"),alert("Terimakasih, data akan tersimpan apabila kode gardu unik!"),location.href="../master_gardu/index.php"})}				
</script>
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);
</script>

