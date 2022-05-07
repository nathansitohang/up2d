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


  <div class="card-header"> <i class="fa fa-pencil"  ></i>      Input Data TTR </span><?php echo $row['kodegd']; ?>  <input type="hidden" class="form-control" id="kodegd" value="<?php echo $row['kodegd']; ?>">
	  		   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
	  </div>
	  <?php
		$kodegd = $row['kodegd'];
		$show = mysqli_query($db, "SELECT * FROM `t3a` WHERE `kodegd` = '$kodegd' ORDER by `tgl` DESC LIMIT 1 ");
		$brs = mysqli_fetch_array($show, MYSQLI_ASSOC);
	?>
      <div class="card-body">
            <div class="col-md-12 form-box">
                <form role="form" class="registration-form" method= "post" action="javascript:void(0);">
				
				
	
                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Tap 1</h3></p>
                            </div>
                        </div>
						
			
						                        

                        <div class="form-bottom">
    
	                      <div class="form-group" style="margin-bottom:20px;">
                                <div class="row">
                                    <div class="form-group col-md-5 col-sm-5">
									<strong><label for="ptgs">Petugas Inspeksi</label></strong>
                                        <input type="text" class="form-control" placeholder="Nama Petugas" id="ptgs" value="<?php echo $brs['ptgs']; ?>">
																		
                                    </div>
                                    <div class="form-group col-md-5 col-sm-5">
									<strong><label for="tgl">Tanggal Inspeksi </label></strong>
                           <input type="date" class="form-control" id="tgl" onkeydown="return false" value="<?php echo $brs['tgl']; ?>">
						   	<input type="hidden" class="form-control" onkeydown="return false" value="<?php echo $brs['tgl']; ?>"  id="tgl_lama" disabled>
                                    </div>
						
                                </div>
                            </div>
							
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap1a">R-T || t-n</label></strong>
								   <input type="text" class="form-control" placeholder="82.2724" id="tap1a" value="<?php if ($brs['tap1a']==0){echo '';}
										else {echo $brs['tap1a'];} ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap1b">S-T || r-n</label></strong>
								  <input type="text" class="form-control" placeholder="82.2724" value="<?php if ($brs['tap1b']==0){echo '';}
										else {echo $brs['tap1b'];} ?>"  id="tap1b" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap1c">R-S || s-n</label></strong>
								   <input type="text" class="form-control" placeholder="82.2724" id="tap1c" value="<?php if ($brs['tap1c']==0){echo '';}
										else {echo $brs['tap1c'];} ?>" onkeypress="return isNumber(event)">
								</div>	
                            </div>
                            <button type="button" class="btn btn-primary ">Next</button>
                        </div>
                    </fieldset>
					
					  <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Tap 2</h3></p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap2a">R-T || t-n</label></strong>
								   <input type="text" class="form-control" placeholder="84.4375" id="tap2a" value="<?php if ($brs['tap2a']==0){echo '';}
										else {echo $brs['tap2a'];} ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap2b">S-T || r-n</label></strong>
								   <input type="text" class="form-control" placeholder="84.4375" id="tap2b" value="<?php if ($brs['tap2b']==0){echo '';}
										else {echo $brs['tap2b'];} ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap2c">R-S || s-n</label></strong>
								   <input type="text" class="form-control" placeholder="84.4375" id="tap2c" value="<?php if ($brs['tap2c']==0){echo '';}
										else {echo $brs['tap2c'];} ?>" onkeypress="return isNumber(event)">
								</div>	
                            </div>
							<button type="button" class="btn btn-info">Previous</button>                           
                            <button type="button" class="btn btn-primary ">Next</button>
                        </div>
                    </fieldset>
					
						  <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Tap 3</h3></p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap3a">R-T || t-n</label></strong>
								   <input type="text" class="form-control" placeholder="86.6025" id="tap3a" value="<?php if ($brs['tap3a']==0){echo '';}
										else {echo $brs['tap3a'];} ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap3b">S-T || r-n</label></strong>
								   <input type="text" class="form-control" placeholder="86.6025" id="tap3b" value="<?php if ($brs['tap3b']==0){echo '';}
										else {echo $brs['tap3b'];} ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap3c">R-S || s-n</label></strong>
								   <input type="text" class="form-control" placeholder="86.6025" id="tap3c" value="<?php if ($brs['tap3c']==0){echo '';}
										else {echo $brs['tap3c'];} ?>" onkeypress="return isNumber(event)">
								</div>	
                            </div>
							<button type="button" class="btn btn-info">Previous</button>                           
                            <button type="button" class="btn btn-primary ">Next</button>
                        </div>
                    </fieldset>
					
						  <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Tap 4</h3></p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap4a">R-T || t-n</label></strong>
								   <input type="text" class="form-control" placeholder="88.7676" id="tap4a" value="<?php if ($brs['tap4a']==0){echo '';}
										else {echo $brs['tap4a'];} ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap4b">S-T || r-n</label></strong>
								   <input type="text" class="form-control" placeholder="88.7676" id="tap4b" value="<?php if ($brs['tap4b']==0){echo '';}
										else {echo $brs['tap4b'];} ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap4c">R-S || s-n</label></strong>
								   <input type="text" class="form-control" placeholder="88.7676" id="tap4c" value="<?php if ($brs['tap4c']==0){echo '';}
										else {echo $brs['tap4c'];} ?>" onkeypress="return isNumber(event)">
								</div>	
                            </div>
							<button type="button" class="btn btn-info">Previous</button>                           
                            <button type="button" class="btn btn-primary ">Next</button>
                        </div>
                    </fieldset>
					
						  <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Tap 5</h3></p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap5a">R-T || t-n</label></strong>
								   <input type="text" class="form-control" placeholder="90.9327" id="tap5a" value="<?php if ($brs['tap5a']==0){echo '';}
										else {echo $brs['tap5a'];} ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap5b">S-T || r-n</label></strong>
								   <input type="text" class="form-control" placeholder="90.9327" id="tap5b" value="<?php if ($brs['tap5b']==0){echo '';}
										else {echo $brs['tap5b'];} ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="tap5c">R-S || s-n</label></strong>
								   <input type="text" class="form-control" placeholder="90.9327" id="tap5c" value="<?php if ($brs['tap5c']==0){echo '';}
										else {echo $brs['tap5c'];} ?>" onkeypress="return isNumber(event)">
								</div>	
                            </div>
							<button type="button" class="btn btn-info">Previous</button>                           
                            <button type="submit" name="submit" onclick="addt3a()" class="btn">Submit</button>
                        </div>
                    </fieldset>
					
                   
                </form>
            </div>
        </div>
       
<div class="card-footer small text-muted">&copy 2018 - SiHD</div>         
        <?php } }
?>

<script>
var dd,mm,yyyy,today=new Date,mundur=new Date;mundur.setDate(mundur.getDate()-14),(dd=today.getDate())<10&&(dd="0"+dd),(mm=today.getMonth()+1)<10&&(mm="0"+mm),today=(yyyy=today.getFullYear())+"-"+mm+"-"+dd,(dd=mundur.getDate())<10&&(dd="0"+dd),(mm=mundur.getMonth()+1)<10&&(mm="0"+mm),mundur=(yyyy=mundur.getFullYear())+"-"+mm+"-"+dd,document.getElementById("tgl").setAttribute("max",today),document.getElementById("tgl").setAttribute("min",mundur);
</script>
<style>
form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
</style>						
<script>
   $(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="date"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="date"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>  