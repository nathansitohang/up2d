<?php
    include "../../config.php";
	include('../../session.php');

		if($_POST['idgardu']) {
		$id = $_POST['idgardu'];  
		$id = base64_decode($id);
		$id = $id/(289182189*$kali);		     
		$query = "SELECT * FROM master WHERE idgardu = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}

        while ($row = @mysqli_fetch_assoc($result)){
?>
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

	  <link href="../../vendor/bootstrap/css/funkyradio.css" rel="stylesheet">
  <div class="card-header"> <i class="fa fa-pencil"  ></i>      Input Data Inspeksi Visual	</span><?php echo $row['kodegd']; ?>  <input type="hidden" class="form-control" id="kodegd" value="<?php echo $row['kodegd']; ?>">  
	  		   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
	  </div>
	  <?php
		$kodegd = $row['kodegd'];
		$show = mysqli_query($db, "SELECT * FROM `t1b` WHERE `kodegd` = '$kodegd' ORDER by `tgl` DESC LIMIT 1 ");
		$brs = mysqli_fetch_array($show, MYSQLI_ASSOC);

	?>
      <div class="card-body">
            <div class="col-md-12 form-box">
                <form role="form" class="registration-form" method= "post" action="javascript:void(0);">
                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Stage 1</h3></p>
                            </div>
                        </div>
                        <div class="form-bottom">
	                      <div class="form-group" style="margin-bottom:20px;">
                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="exampleInputName">Petugas Inspeksi</label></strong>
                                        <input type="text" class="form-control" placeholder="Nama Petugas" value="<?php echo $brs['ptgs']; ?>" id="ptgs">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="exampleInputName">Tanggal Inspeksi </label></strong>
									<input type="date" class="form-control" onkeydown="return false" value="<?php echo $brs['tgl']; ?>"  id="tgl">
									<input type="hidden" class="form-control" onkeydown="return false" value="<?php echo $brs['tgl']; ?>"  id="tgl_lama" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                  <div class="form-group col-md-6 col-sm-6">
								 <strong><label for="exampleInputName">Kondisi Minyak</label></strong>
				    <div class="funkyradio">
        <div class="funkyradio-primary">
            <input type="radio" name="oil" id="radio1" <?php if ($brs['oil']==4){ echo 'checked';} ?> value="4" >
            <label for="radio1">Bersih</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="oil" id="radio2" <?php if ($brs['oil']==3){ echo 'checked';} ?> value="3"/>
            <label for="radio2">Packing Retak</label>
        </div>
        <div class="funkyradio-warning">
            <input type="radio" name="oil" id="radio3" <?php if ($brs['oil']==2){ echo 'checked';} ?> value="2"/>
            <label for="radio3">Retak/ Berminyak</label>
        </div>
        <div class="funkyradio-danger">
            <input type="radio" name="oil" id="radio4" <?php if ($brs['oil']==1){ echo 'checked';} ?>  value="1"/>
            <label for="radio4">Rembes/ Tetes</label>
        </div>
        </div>
    </div>
	
	  <div class="form-group col-md-6 col-sm-6">
								 <strong><label for="exampleInputName">Kondisi Fisik Trafo</label></strong>
				    <div class="funkyradio">
        
        <div class="funkyradio-primary">
            <input type="radio" name="fisik" id="mulus" <?php if ($brs['fisik']==4){ echo 'checked';} ?> value="4">
            <label for="mulus">Mulus</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="fisik" id="minor" <?php if ($brs['fisik']==3){ echo 'checked';} ?>  value="3" />
            <label for="minor">Cacat Sirip Minor</label>
        </div>
        <div class="funkyradio-warning">
            <input type="radio" name="fisik" id="mayor" <?php if ($brs['fisik']==2){ echo 'checked';} ?> value="2"/>
            <label for="mayor">Cacat Sirip Mayor</label>
        </div>
        <div class="funkyradio-danger">
            <input type="radio" name="fisik" id="bengkak" <?php if ($brs['fisik']==1){ echo 'checked';} ?> value="1"/>
            <label for="bengkak">Bengkak</label>
        </div>
        </div>
    </div>			
<br/>
<div class="form-group col-md-6 col-sm-6" >
<strong><label for="modal_form_id">Upload Foto Trafo</label></strong>
		<input id="modal_form_id" type="file" accept="image/*;capture=camera"></div>
                            </div>
                            
                            <button type="button" class="btn btn-primary ">Next</button>
                        </div>
                    </fieldset>
					
					 <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
							    <p><h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp&nbsp Stage 2</h3></p>
                            </div>
                        </div>
                     
                        <div class="form-bottom">
    							<div class="form-group" style="margin-bottom:20px;">
                                <div class="row">
                                    <div class="form-group col-md-3 col-sm-3">
									<strong><label for="exampleInputName">Pentanahan</label></strong>
                                        <input type="text" class="form-control" placeholder="Netral" id="netral" value="<?php echo $brs['netral']; ?>"  onkeypress="return isNumber(event)">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-3">
									<strong><label for="exampleInputName">&nbsp </label></strong>
                                        <input type="text" class="form-control" placeholder="Body" id="body" value="<?php echo $brs['bodyy']; ?>"  onkeypress="return isNumber(event)">
                                    </div>
									<div class="form-group col-md-3 col-sm-3">
									<strong><label for="exampleInputName">&nbsp </label></strong>
                                        <input type="text" class="form-control" placeholder="Arrester" id="la" value="<?php echo $brs['la']; ?>" onkeypress="return isNumber(event)">
                                    </div>
						
                                </div>
                            </div>
							
							<div class="form-group" style="margin-bottom:20px;">
                                <div class="row">
							<div class="form-group col-md-8 col-sm-8">
								 <strong><label for="exampleInputName">Kondisi PHB-TR</label></strong>
				    <div class="funkyradio">
        
        <div class="funkyradio-primary">
            <input type="radio" name="phb" id="bersih" <?php if ($brs['phb']==4){ echo 'checked';} ?> value="4" >
            <label for="bersih">Box bersih, instalasi rapi</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="phb" id="kotor" <?php if ($brs['phb']==3){ echo 'checked';} ?> value="3" />
            <label for="kotor">Box kotor, instalasi rapi</label>
        </div>
        <div class="funkyradio-warning">
            <input type="radio" name="phb" id="karat" <?php if ($brs['phb']==2){ echo 'checked';} ?> value="2" />
            <label for="karat">Box berkarat, instalasi rapi</label>
        </div>
        <div class="funkyradio-danger">
            <input type="radio" name="phb" id="bocor"  <?php if ($brs['phb']==1){ echo 'checked';} ?> value="1"/>
            <label for="bocor">Box bocor, instalasi buruk</label>
        </div>
        </div>
    </div>
	<br/>
<div class="form-group col-md-6 col-sm-6">
<strong><label for="fototrafo">Upload Foto PHB-TR</label></strong>
		<input id="fototrafo" type="file" accept="image/*;capture=camera"></div>
	</div>
	
	</div>
	
                <button type="button" class="btn btn-info">Previous</button>
                   <button type="submit" name="submit" onclick="addt1b()" class="btn">Submit</button>

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
$(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="date"],input[type="file"]' ).each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="date"],input[type="radio"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});						
</script>
<script>
var dd,mm,yyyy,today=new Date,mundur=new Date;mundur.setDate(mundur.getDate()-14),(dd=today.getDate())<10&&(dd="0"+dd),(mm=today.getMonth()+1)<10&&(mm="0"+mm),today=(yyyy=today.getFullYear())+"-"+mm+"-"+dd,(dd=mundur.getDate())<10&&(dd="0"+dd),(mm=mundur.getMonth()+1)<10&&(mm="0"+mm),mundur=(yyyy=mundur.getFullYear())+"-"+mm+"-"+dd,document.getElementById("tgl").setAttribute("max",today),document.getElementById("tgl").setAttribute("min",mundur);
</script>