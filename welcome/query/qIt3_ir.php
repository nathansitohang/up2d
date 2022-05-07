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


  <div class="card-header"> <i class="fa fa-pencil"  ></i>      Input Hasil Ukur Isolasi Trafo </span><?php echo $row['kodegd']; ?>   <input type="hidden" class="form-control" id="kodegd" value="<?php echo $row['kodegd']; ?>">
	  		   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
	  </div>
      <div class="card-body">
            <div class="col-md-12 form-box">
                <form role="form" class="registration-form" method= "post" action="javascript:void(0);">
				
				
	<?php
		$kodegd = $row['kodegd'];
		$show = mysqli_query($db, "SELECT * FROM `t3b` WHERE `kodegd` = '$kodegd' ORDER by `tgl` DESC LIMIT 1 ");
		$brs = mysqli_fetch_array($show, MYSQLI_ASSOC);
	?>
                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Primer - Body</h3></p>
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
									<strong><label for="tgl_b">Tanggal Inspeksi </label></strong>
                           <input type="date" class="form-control" id="tgl_b" onkeydown="return false" value="<?php echo $brs['tgl']; ?>">
						 <input type="hidden" class="form-control" onkeydown="return false" value="<?php echo $brs['tgl']; ?>"  id="tgl_lama" disabled>						   
                                    </div>
						
                                </div>
                            </div>
							
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="pb1">R - body</label></strong>
								   <input type="text" class="form-control" placeholder="G&#8486" id="pb1" value="<?php echo $brs['pb1']; ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="pb2">S - body</label></strong>
								   <input type="text" class="form-control" placeholder="G&#8486" id="pb2" value="<?php echo $brs['pb2']; ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="pb3">T - body</label></strong>
								   <input type="text" class="form-control" placeholder="G&#8486" id="pb3" value="<?php echo $brs['pb3']; ?>" onkeypress="return isNumber(event)">
								</div>	
                            </div>
                            <button type="button" class="btn btn-primary ">Next</button>
                        </div>
                    </fieldset>
					
					  <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Sekunder - Body</h3></p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="sb1">r - body</label></strong>
								   <input type="text" class="form-control" placeholder="G&#8486" id="sb1" value="<?php echo $brs['sb1']; ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="sb2">s - body</label></strong>
								   <input type="text" class="form-control" placeholder="G&#8486" id="sb2" value="<?php echo $brs['sb2']; ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="sb3">t - body</label></strong>
								   <input type="text" class="form-control" placeholder="G&#8486" id="sb3" value="<?php echo $brs['sb3']; ?>" onkeypress="return isNumber(event)">
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
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Primer - Primer</h3></p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="pp1">R - S</label></strong>
								   <input type="text" class="form-control" placeholder="0 G&#8486" id="pp1" value="<?php echo $brs['pp1']; ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="pp2">R - T</label></strong>
								   <input type="text" class="form-control" placeholder="0 G&#8486" id="pp2" value="<?php echo $brs['pp2']; ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="pp3">S - T</label></strong>
								   <input type="text" class="form-control" placeholder="0 G&#8486" id="pp3" value="<?php echo $brs['pp3']; ?>" onkeypress="return isNumber(event)">
								</div>	
                            </div>
							<button type="button" class="btn btn-info">Previous</button>                           
                            <button type="button" class="btn btn-primary ">Next</button>
                        </div>
                    </fieldset>
					
						  <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Primer - Sekunder</h3></p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="ps1">R - r</label></strong>
								   <input type="text" class="form-control" placeholder="G&#8486" id="ps1" value="<?php echo $brs['ps1']; ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="ps2">S - s</label></strong>
								   <input type="text" class="form-control" placeholder="G&#8486" id="ps2" value="<?php echo $brs['ps2']; ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="ps3">T - t</label></strong>
								   <input type="text" class="form-control" placeholder="G&#8486" id="ps3" value="<?php echo $brs['ps3']; ?>" onkeypress="return isNumber(event)">
								</div>	
                            </div>
							<button type="button" class="btn btn-info">Previous</button>                           
                            <button type="button" class="btn btn-primary ">Next</button>
                        </div>
                    </fieldset>
					
						  <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Sekunder - Sekunder</h3></p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="ss1">r - s</label></strong>
								   <input type="text" class="form-control" placeholder="0 G&#8486" id="ss1" value="<?php echo $brs['ss1']; ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="ss2">r - t</label></strong>
								   <input type="text" class="form-control" placeholder="0 G&#8486" id="ss2" value="<?php echo $brs['ss2']; ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="ss3">s - t</label></strong>
								   <input type="text" class="form-control" placeholder="0 G&#8486" id="ss3" value="<?php echo $brs['ss3']; ?>" onkeypress="return isNumber(event)">
								</div>	
								 <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="ss4">r - n</label></strong>
								   <input type="text" class="form-control" placeholder="0 G&#8486" id="ss4" value="<?php echo $brs['ss4']; ?>" onkeypress="return isNumber(event)">
								</div>                           
								<div class="form-group col-md-4 col-sm-4">
								 <strong><label for="ss5">s - n</label></strong>
								   <input type="text" class="form-control" placeholder="0 G&#8486" id="ss5" value="<?php echo $brs['ss5']; ?>" onkeypress="return isNumber(event)">
								</div>
								   <div class="form-group col-md-4 col-sm-4">
								 <strong><label for="ss6">t - n</label></strong>
								   <input type="text" class="form-control" placeholder="0 G&#8486" id="ss6" value="<?php echo $brs['ss6']; ?>" onkeypress="return isNumber(event)">
								</div>	
                            </div>
							<button type="button" class="btn btn-info">Previous</button>                           
                            <button type="submit" name="submit" onclick="addt3b()" class="btn">Submit</button>
                        </div>
                    </fieldset>
					
                   
                </form>
            </div>
        </div>
<div class="card-footer small text-muted">&copy 2018 - SiHD</div>		
        <?php } }
?>
<style>
form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
</style>						
<script>
   $(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="date"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="date"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>
<script>
var dd,mm,yyyy,today=new Date,mundur=new Date;mundur.setDate(mundur.getDate()-14),(dd=today.getDate())<10&&(dd="0"+dd),(mm=today.getMonth()+1)<10&&(mm="0"+mm),today=(yyyy=today.getFullYear())+"-"+mm+"-"+dd,(dd=mundur.getDate())<10&&(dd="0"+dd),(mm=mundur.getMonth()+1)<10&&(mm="0"+mm),mundur=(yyyy=mundur.getFullYear())+"-"+mm+"-"+dd,document.getElementById("tgl_b").setAttribute("max",today),document.getElementById("tgl_b").setAttribute("min",mundur);
</script>