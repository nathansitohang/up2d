<?php
    include "../../config.php";
	include "../../session.php";

		if($_POST['idgardu']) {
		$id = $_POST['idgardu'];  
		$id = base64_decode($id);
		$id = $id/(89189218*$kali);			
		$query = "SELECT * FROM master WHERE idgardu = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}

        while ($row = @mysqli_fetch_assoc($result)){
		$kodegd = $row['kodegd'];
		
?>
<input type="hidden" class="form-control" disabled id="sesi" value="<?php echo $login_idrayon; ?>">
<input type="hidden" class="form-control" disabled id="idrayon" value="<?php echo $row['idrayon']; ?>">
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

  <div class="card-header"> <i class="fa fa-pencil"  ></i>      Update Data Pengukuran Beban	</span><?php echo $kodegd; ?> <input type="hidden" class="form-control number" id="kodegd" value="<?php echo $row['kodegd']; ?>">  
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
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp LWBP</h3></p>
                            </div>
                        </div>
						
<?php

		$show1 = mysqli_query($db, "SELECT * FROM `t1a` WHERE `kodegd` = '$kodegd' ORDER by `tgl1` DESC LIMIT 1 ");
		$brs = mysqli_fetch_array($show1, MYSQLI_ASSOC);

?>			
                        <div class="form-bottom">
    
	                      <div class="form-group" style="margin-bottom:20px;">
                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="ptgs1">Petugas Ukur</label></strong>
                                        <input type="text" class="form-control number" placeholder="Nama Petugas" id="ptgs1" value="<?php echo $brs['ptgs1']; ?>" >
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="tgl1">Tanggal Ukur </label></strong>
                           <input type="date" class="form-control" id="tgl1" onkeydown="return false" value="<?php echo $brs['tgl1']; ?>">
						   <input type="hidden" class="form-control number" id="tgl1_lama" value="<?php echo $brs['tgl1']; ?>">
                                    </div>
						
                                </div>
                            </div>
							
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                    <div class="form-group col-md-2 col-sm-2">
									<strong><label for="vln1">Incoming</label></strong>
                                        <input type="text" class="form-control number" placeholder="V l-n" value="<?php if ($brs['vln1']==0){echo '';}
										else {echo $brs['vln1'];} ?>"  id="vln1" onkeypress="return isNumber(event) ">
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
									<label for="ir1">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="Ir" value="<?php if ($brs['ir1']==0){echo '';}
										else {echo $brs['ir1'];} ?>" id="ir1" onkeypress="return isNumber(event)">
                                    </div>
									                                    <div class="form-group col-md-2 col-sm-2">
									<label for="is1">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="Is" value="<?php if ($brs['is1']==0){echo '';}
										else {echo $brs['is1'];} ?>" id="is1" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
									<label for="it1">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="It" id="it1" value="<?php if ($brs['it1']==0){echo '';}
										else {echo $brs['it1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
									<label for="in1">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="In" id="in1" value="<?php if ($brs['in1']==0){echo '';}
										else {echo $brs['in1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									   <div class="form-group col-md-2 col-sm-2">
									<label for="pf1">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="PF" value="<?php if ($brs['pf1']==0){echo '';}
										else {echo $brs['pf1'];} ?>" id="pf1" onkeypress="return isNumber(event)">
                                    </div>
									
                                </div>
                            </div>
                                   <div class="row">
                                  <div class="form-group col-md-2 col-sm-2">
									<strong><label for="out">Outgouing</label></strong>
								  <div><center><label for="outA">A</label></center></div>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
									<label for="ira1">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="Ir" id="ira1" value="<?php if ($brs['ira1']==0){echo '';}
										else {echo $brs['ira1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									 
									 <div class="form-group col-md-2 col-sm-2">
									<label for="isa1">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="Is" id="isa1" value="<?php if ($brs['isa1']==0){echo '';}
										else {echo $brs['isa1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
									<label for="ita1">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="It" id="ita1" value="<?php if ($brs['ita1']==0){echo '';}
										else {echo $brs['ita1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
									<label for="ina1">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="In" id="ina1" value="<?php if ($brs['ina1']==0){echo '';}
										else {echo $brs['ina1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
                            </div>

                                   <div class="row">
                                  <div class="form-group col-md-2 col-sm-2">
									<center><label for="outB">B</label><center>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Ir" id="irb1" value="<?php if ($brs['irb1']==0){echo '';}
										else {echo $brs['irb1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									 
									 <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Is" id="isb1" value="<?php if ($brs['isb1']==0){echo '';}
										else {echo $brs['isb1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="It" id="itb1" value="<?php if ($brs['itb1']==0){echo '';}
										else {echo $brs['itb1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="In" id="inb1" value="<?php if ($brs['inb1']==0){echo '';}
										else {echo $brs['inb1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									</div>
							
							                                   <div class="row">
                                  <div class="form-group col-md-2 col-sm-2">
									<center><label for="outC">C</label><center>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Ir" id="irc1" value="<?php if ($brs['irc1']==0){echo '';}
										else {echo $brs['irc1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									 
									 <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Is" id="isc1" value="<?php if ($brs['isc1']==0){echo '';}
										else {echo $brs['isc1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="It" id="itc1" value="<?php if ($brs['irc1']==0){echo '';}
										else {echo $brs['irc1'];} ?>" onkeypress="return isNumber(event)" >
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="In" id="inc1" value="<?php if ($brs['inc1']==0){echo '';}
										else {echo $brs['inc1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
                            </div>
							
							
							                                   <div class="row">
                                  <div class="form-group col-md-2 col-sm-2">
									<center><label for="exampleInputName">D</label><center>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Ir" id="ird1" value="<?php if ($brs['ird1']==0){echo '';}
										else {echo $brs['ird1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									 
									 <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Is" id="isd1" value="<?php if ($brs['isd1']==0){echo '';}
										else {echo $brs['isd1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="It" id="itd1" value="<?php if ($brs['itd1']==0){echo '';}
										else {echo $brs['itd1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="In" id="ind1" value="<?php if ($brs['ind1']==0){echo '';}
										else {echo $brs['ind1'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
                            </div>
							
                            
                            <button type="button" class="btn btn-primary ">Next</button>
                        </div>
						
						
                    </fieldset>
					
					 <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp WBP</h3></p>
                            </div>
                        </div>
						
			<?php

		$show2 = mysqli_query($db, "SELECT * FROM `t1a` WHERE `kodegd` = '$kodegd' ORDER by `tgl2` DESC LIMIT 1 ");
		$brs2 = mysqli_fetch_array($show2, MYSQLI_ASSOC);

?>
						                        

                        <div class="form-bottom">
    
	                      <div class="form-group" style="margin-bottom:20px;">
                                      <div class="row">
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="ptgs2">Petugas Ukur</label></strong>
                                        <input type="text" class="form-control" placeholder="Nama Petugas" id="ptgs2" value="<?php echo $brs2['ptgs2']; ?>">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="tgl2">Tanggal Ukur </label></strong>
                           <input type="date" class="form-control number" onkeydown="return false" value="<?php echo $brs2['tgl2']; ?>" id="tgl2">
							<input type="hidden" class="form-control number" id="tgl2_lama" value="<?php echo $brs2['tgl2']; ?>">
                                    </div>
						
                                </div>
                            </div>
							
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                    <div class="form-group col-md-2 col-sm-2">
									<strong><label for="vln2">Incoming</label></strong>
                                        <input type="text" class="form-control number" placeholder="V l-n" value="<?php if ($brs2['vln2']==0){echo '';}
										else {echo $brs2['vln2'];} ?>" id="vln2" onkeypress="return isNumber(event)">
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
									<label for="ir2">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="Ir" id="ir2"  value="<?php if ($brs2['ir2']==0){echo '';}
										else {echo $brs2['ir2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									 <div class="form-group col-md-2 col-sm-2">
									<label for="is2">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="Is" id="is2"  value="<?php if ($brs2['is2']==0){echo '';}
										else {echo $brs2['is2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
									<label for="it2">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="It"  value="<?php if ($brs2['it2']==0){echo '';}
										else {echo $brs2['it2'];} ?>"  id="it2" onkeypress="return isNumber(event)"> 
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
									<label for="in2">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="In"  value="<?php if ($brs2['in2']==0){echo '';}
										else {echo $brs2['in2'];} ?>" id="in2" onkeypress="return isNumber(event)">
                                    </div>
									
									   <div class="form-group col-md-2 col-sm-2">
									<label for="pf2">&nbsp </label>
                                        <input type="text" class="form-control number" placeholder="PF"  value="<?php if ($brs2['pf2']==0){echo '';}
										else {echo $brs2['pf2'];} ?>" id="pf2" onkeypress="return isNumber(event)">
                                    </div>
									
                                </div>
                            </div>
							
									<div class="row">
                                  <div class="form-group col-md-2 col-sm-2">
									<center><label for="outB">A</label><center>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Ir" value="<?php if ($brs2['ira2']==0){echo '';}
										else {echo $brs2['ira2'];} ?>" id="ira2" onkeypress="return isNumber(event)">
                                    </div>
									 
									 <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Is" value="<?php if ($brs2['isa2']==0){echo '';}
										else {echo $brs2['isa2'];} ?>" id="isa2" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="It" id="ita2" value="<?php if ($brs2['ita2']==0){echo '';}
										else {echo $brs2['ita2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="In" id="ina2" value="<?php if ($brs2['ina2']==0){echo '';}
										else {echo $brs2['ina2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									</div>

									<div class="row">
                                  <div class="form-group col-md-2 col-sm-2">
									<center><label for="outB">B</label><center>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Ir" value="<?php if ($brs2['irb2']==0){echo '';}
										else {echo $brs2['irb2'];} ?>" id="irb2" onkeypress="return isNumber(event)">
                                    </div>
									 
									 <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Is" id="isb2" value="<?php if ($brs2['isb2']==0){echo '';}
										else {echo $brs2['isb2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="It" id="itb2" value="<?php if ($brs2['itb2']==0){echo '';}
										else {echo $brs2['itb2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="In" id="inb2" value="<?php if ($brs2['inb2']==0){echo '';}
										else {echo $brs2['inb2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									</div>
							
									<div class="row">
                                  <div class="form-group col-md-2 col-sm-2">
									<center><label for="outB">C</label><center>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Ir" id="irc2" value="<?php if ($brs2['irc2']==0){echo '';}
										else {echo $brs2['irc2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									 
									 <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Is" id="isc2" value="<?php if ($brs2['isc2']==0){echo '';}
										else {echo $brs2['isc2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="It" id="itc2" value="<?php if ($brs2['itc2']==0){echo '';}
										else {echo $brs2['itc2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="In" id="inc2" value="<?php if ($brs2['inc2']==0){echo '';}
										else {echo $brs2['inc2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									</div>
							
							
						<div class="row">
                                  <div class="form-group col-md-2 col-sm-2">
									<center><label for="exampleInputName">D</label><center>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Ir" id="ird2" value="<?php if ($brs2['ird2']==0){echo '';}
										else {echo $brs2['ird2'];} ?>" onkeypress="return isNumber(event)" >
                                    </div>
									 
									 <div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="Is" id="isd2" value="<?php if ($brs2['isd2']==0){echo '';}
										else {echo $brs2['isd2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="It" id="itd2" value="<?php if ($brs2['itd2']==0){echo '';}
										else {echo $brs2['itd2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
									
									<div class="form-group col-md-2 col-sm-2">
                                        <input type="text" class="form-control number" placeholder="In" id="ind2" value="<?php if ($brs2['ind2']==0){echo '';}
										else {echo $brs2['ind2'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
                            </div>
                            
                             <button type="button" class="btn btn-info">Previous</button>
                            <button type="submit" name="submit" onclick="addt1a()" class="btn">Submit</button>

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
   $(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type=""]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type=""],input[type=""]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type=""],input[type=""]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>	
<script>
var dd,mm,yyyy,today=new Date,mundur=new Date;mundur.setDate(mundur.getDate()-14),(dd=today.getDate())<10&&(dd="0"+dd),(mm=today.getMonth()+1)<10&&(mm="0"+mm),today=(yyyy=today.getFullYear())+"-"+mm+"-"+dd,(dd=mundur.getDate())<10&&(dd="0"+dd),(mm=mundur.getMonth()+1)<10&&(mm="0"+mm),mundur=(yyyy=mundur.getFullYear())+"-"+mm+"-"+dd,document.getElementById("tgl1").setAttribute("max",today),document.getElementById("tgl1").setAttribute("min",mundur);
</script>
<script>
var dd,mm,yyyy,today=new Date,mundur=new Date;mundur.setDate(mundur.getDate()-14),(dd=today.getDate())<10&&(dd="0"+dd),(mm=today.getMonth()+1)<10&&(mm="0"+mm),today=(yyyy=today.getFullYear())+"-"+mm+"-"+dd,(dd=mundur.getDate())<10&&(dd="0"+dd),(mm=mundur.getMonth()+1)<10&&(mm="0"+mm),mundur=(yyyy=mundur.getFullYear())+"-"+mm+"-"+dd,document.getElementById("tgl2").setAttribute("max",today),document.getElementById("tgl2").setAttribute("min",mundur);
</script>