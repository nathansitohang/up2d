<?php
    include "../../config.php";
	include('../../session.php');

		if($_POST['idgardu']) {
		$id = $_POST['idgardu'];  
		$id = base64_decode($id);
		$id = $id/(78484899*$kali);
		$query = "SELECT * FROM master WHERE idgardu = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}

        while ($row = @mysqli_fetch_assoc($result)){
?>
	  <link href="../../vendor/bootstrap/css/funkyradio.css" rel="stylesheet">
<input type="hidden" class="form-control" id="alamat" value="<?php echo $row['alamat']; ?>">
<input type="hidden" class="form-control" id="feeder" value="<?php echo $row['feeder']; ?>">
<input type="hidden" class="form-control" id="ufeeder" value="<?php echo $row['ufeeder']; ?>">
<input type="hidden" class="form-control" id="kapasitas" value="<?php echo $row['kapasitas']; ?>">
<input type="hidden" class="form-control" id="fasa" value="<?php echo $row['fasa']; ?>">
<input type="hidden" class="form-control" id="merek" value="<?php echo $row['merek']; ?>">
<input type="hidden" class="form-control" id="noseri" value="<?php echo $row['noseri']; ?>">
<input type="hidden" class="form-control" id="thntrafo" value="<?php echo $row['thntrafo']; ?>">
<input type="hidden" class="form-control" id="lat" value="<?php echo $row['lat']; ?>">
<input type="hidden" class="form-control" id="lng" value="<?php echo $row['lng']; ?>">
<input type="hidden" class="form-control" id="minyak" value="<?php echo $row['minyak']; ?>">
<input type="hidden" class="form-control" id="konstruksi" value="<?php echo $row['konstruksi']; ?>">
<input type="hidden" class="form-control" id="vector" value="<?php echo $row['vector']; ?>">
<input type="hidden" class="form-control" id="imp" value="<?php echo $row['imp']; ?>">
<input type="hidden" class="form-control" id="jlh_jur" value="<?php echo $row['jlh_jur']; ?>">
<input type="hidden" class="form-control" id="jlh_tap" value="<?php echo $row['jlh_tap']; ?>">
<input type="hidden" class="form-control" id="pos_tap" value="<?php echo $row['pos_tap']; ?>">
<input type="hidden" class="form-control" id="tgl_psg" value="<?php echo $row['tgl_psg']; ?>">
<input type="hidden" class="form-control" id="ket" value="<?php echo $row['ket']; ?>"> 	

	
	
  <div class="card-header"> <i class="fa fa-pencil"  ></i>      Input Hasil Thermovision	</span><?php echo $row['kodegd']; ?> <input type="hidden" class="form-control" id="kodegd" value="<?php echo $row['kodegd']; ?>">  
	  		   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
	  </div>
      <div class="card-body">
            <div class="col-md-12 form-box">
                <form role="form" class="registration-form" method= "post" action="javascript:void(0);">

                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbspThermovision</h3></p>
                            </div>
                        </div>

                        <div class="form-bottom">
    <?php
		$kodegd = $row['kodegd'];
		$show = mysqli_query($db, "SELECT * FROM `t2b` WHERE `kodegd` = '$kodegd' ORDER by `tgl` DESC LIMIT 1 ");
		$brs = mysqli_fetch_array($show, MYSQLI_ASSOC);
	?>
	                       <div class="form-group" style="margin-bottom:20px;">
                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="ptgs">Petugas Inspeksi</label></strong>
                                        <input type="text" class="form-control" placeholder="Nama Petugas" id="ptgs" value="<?php echo $brs['ptgs']; ?>">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="tgl">Tanggal Inspeksi </label></strong>
                           <input type="date" class="form-control tgl" id="tgl_b" onkeydown="return false" value="<?php echo $brs['tgl']; ?>">
                           <input type="hidden" class="form-control" id="tgl_lama" onkeydown="return false" value="<?php echo $brs['tgl']; ?> "disabled>
                                  </div>
									   <div class="form-group col-md-4 col-sm-4">
									<strong><label for="amb">Suhu Ambient </label></strong>
                           <input type="text" class="form-control" placeholder="Suhu Lingkungan" id="amb" value="<?php if ($brs['amb']==0 || $brs['amb']=="" ){echo '36';}
										else {echo $brs['amb'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
						
                                </div>
                            </div>
							
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
								
                          	<div class="form-group col-md-6 col-sm-6">
							<strong><label for="exampleInputName">Thermovison Trafo</label></strong>
							
							<div class="row">
							<div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="Incoming FCO" id="incfco" value="<?php if ($brs['incfco']==0){echo '';}
										else {echo $brs['incfco'];} ?>" onkeypress="return isNumber(event)"><br/>
						   </div>
						  <div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="Outgoing FCO" id="outfco" value="<?php if ($brs['outfco']==0){echo '';}
										else {echo $brs['outfco'];} ?>"  onkeypress="return isNumber(event)"><br/>
						   </div>
				
							<div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="Body Trafo" id="bodyt" value="<?php if ($brs['bodyt']==0){echo '';}
										else {echo $brs['bodyt'];} ?>"  onkeypress="return isNumber(event)"><br/>
						   </div>
						  <div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="Bushing TM" id="bushtm" value="<?php if ($brs['bushtm']==0){echo '';}
										else {echo $brs['bushtm'];} ?>" onkeypress="return isNumber(event)"><br/>
						   </div>
					
							<div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="Bushing TR" id="bushtr" value="<?php if ($brs['bushtr']==0){echo '';}
										else {echo $brs['bushtr'];} ?>"  onkeypress="return isNumber(event)"><br/>
						   </div>
							</div>
                             </div>	
									
				  	<div class="form-group col-md-6 col-sm-6">
							<strong><label for="exampleInputName">Thermovison PHB-TR</label></strong>
							
							<div class="row">
							<div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="Opstiq In" id="opsinc" value="<?php if ($brs['opsinc']==0){echo '';}
										else {echo $brs['opsinc'];} ?>" onkeypress="return isNumber(event)"><br/>
						   </div>
						  <div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="Opstiq Out" id="opsout" value="<?php if ($brs['opsout']==0){echo '';}
										else {echo $brs['opsout'];} ?>"  onkeypress="return isNumber(event)"><br/>
						   </div>
				
							<div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="NT Fuse Holder" id="ntholder" value="<?php if ($brs['ntholder']==0){echo '';}
										else {echo $brs['ntholder'];} ?>"  onkeypress="return isNumber(event)"><br/>
						   </div>
						  <div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="Sepatu Kabel" id="skun" value="<?php if ($brs['skun']==0){echo '';}
										else {echo $brs['skun'];} ?>" onkeypress="return isNumber(event)"><br/>
						   </div>
					
							<div class="form-group col-md-6 col-sm-6">
                           <input type="text" class="form-control" placeholder="Sambungan ke JTR" id="conn" value="<?php if ($brs['conn']==0){echo '';}
										else {echo $brs['conn'];} ?>" onkeypress="return isNumber(event)"><br/>
						   </div>
							</div>
                             </div>	
							 
							</div>	
                            </div>
	                     <button type="submit" name="submit" onclick="addt2b()" class="btn">Submit</button>
                        </div>
					
					   </div>
        </div>
<div class="card-footer small text-muted">&copy 2018 - SiHD</div>               
        <?php } }
?>
<script>
var dd,mm,yyyy,today=new Date,mundur=new Date;mundur.setDate(mundur.getDate()-14),(dd=today.getDate())<10&&(dd="0"+dd),(mm=today.getMonth()+1)<10&&(mm="0"+mm),today=(yyyy=today.getFullYear())+"-"+mm+"-"+dd,(dd=mundur.getDate())<10&&(dd="0"+dd),(mm=mundur.getMonth()+1)<10&&(mm="0"+mm),mundur=(yyyy=mundur.getFullYear())+"-"+mm+"-"+dd,document.getElementById("tgl_b").setAttribute("max",today),document.getElementById("tgl_b").setAttribute("min",mundur);
</script>
<style>
form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
</style>
 <script>
  $(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="date"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="date"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>
