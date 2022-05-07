<?php
    include "../../config.php";
	include('../../session.php');

		if($_POST['idjtm']) {
		$id = $_POST['idjtm'];  
		$id = base64_decode($id);
		$id = $id/(891234567);
		$query = "SELECT * FROM penyulang WHERE id = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}

        while ($row = @mysqli_fetch_assoc($result)){
	
?>
	  <link href="../../vendor/bootstrap/css/funkyradio.css" rel="stylesheet">
<input type="hidden" class="form-control" id="nama" value="<?php echo $row['name']; ?>">
<input type="hidden" class="form-control" id="lokasi" value="<?php echo $row['addr']; ?>">
<input type="hidden" class="form-control" id="type" value="<?php echo $row['type']; ?>">
<input type="hidden" class="form-control" id="kms" value="<?php echo $row['kms']; ?>">
<input type="hidden" class="form-control" id="parentid" value="<?php echo $row['parent_id']; ?>">
<input type="hidden" class="form-control" id="level" value="<?php echo $row['level']; ?>">


	
	
  <div class="card-header"> <i class="fa fa-pencil"  ></i>      Entry Pekerjaan RoW di </span><?php echo $row['name']; ?> <input type="hidden" class="form-control" id="kodegd" value="<?php echo $row['kodegd']; ?>">  
	  		   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
	  </div>
      <div class="card-body">
	  <div class="table-responsive">
      <table width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
            <td valign="top" class="menuUtamaOff">Wilayah Sumatera Utara<br>Area&nbsp<?php echo $row['area']; ?> <br>Rayon&nbsp<?php echo $row['rayon']; ?> </td>
         </tr>
      </table>
      <table width="400"  border="0" cellpadding="1" cellspacing="0">
         <tr>
            <td> &nbsp </td>
         </tr>
      </table>
      <table width="400"  border="0" cellpadding="1" cellspacing="0">
         <tr align="left" valign="top">
            <td colspan="2">
               <table width="750"  border="1" cellspacing="0" cellpadding="0">
                  <tr align="center" valign="middle">
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">DATA SUTM </span></strong></font></td>
                  </tr>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;Kode Tiang</strong></font> </td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['name']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jenis Aset</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['type']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Lokasi/Nama</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['addr']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Panjang</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['kms']; ?></td>
                  </tr>
                  
               </table>
      </table>
   </div><br/>
            <div class="col-md-12 form-box">
                <form role="form" class="registration-form" method= "post" action="javascript:void(0);">



                        <div class="form-bottom">
    <?php
		$name = $row['name'];
		$show = mysqli_query($db, "SELECT * FROM `row` WHERE `name` = '$name' ORDER by `tglrow` DESC LIMIT 1 ");
		$brs = mysqli_fetch_array($show, MYSQLI_ASSOC);
	?>
	                       <div class="form-group" style="margin-bottom:20px;">
                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="ptgs">Petugas RoW</label></strong>
                                        <input type="text" class="form-control" placeholder="Petugas" id="ptgs" value="<?php echo $brs['ptgs_row']; ?>">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4">
									<strong><label for="tgl_row">Tanggal RoW </label></strong>
                           <input type="date" class="form-control tgl" id="tgl_row" onkeydown="return false" value="<?php echo $brs['tglrow']; ?>">
                           <input type="hidden" class="form-control" id="tgl_lama" onkeydown="return false" value="<?php echo $brs['tglrow']; ?> "disabled>
                                  </div>
									   <div class="form-group col-md-4 col-sm-4">
									<strong><label for="kms_row">Jumlah kms </label></strong>
                           <input type="text" class="form-control" placeholder="Panjang" id="kms_row" value="<?php if ($brs['kms_row']==0 || $brs['kms_row']=="" ){echo '0';}
										else {echo $brs['kms_row'];} ?>" onkeypress="return isNumber(event)">
                                    </div>
					
                                </div>
                            </div>
							
								<div class="form-group" style="margin-bottom:20px;">
                                <div class="row">
                                   <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;
								   
                           <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="fasa" id="1fasa" value="1" > Selesai&nbsp&nbsp
                           <input  class="form-check-input" type="radio" name="fasa" id="3fasa" value="3" > Belum Selesai
                           </label>
                        </div>
                                </div>
															<br/><textarea placeholder="Keterangan Tambahan"></textarea>
                            </div>
							
				
	
	                     <button type="submit" name="submit" onclick="addtrow()" class="btn">Submit</button>
                        </div>
					
					   </div>
        </div>
<div class="card-footer small text-muted">&copy 2018 - SiHD</div>               
        <?php } }
?>
<script>
var dd,mm,yyyy,today=new Date,mundur=new Date;mundur.setDate(mundur.getDate()-14),(dd=today.getDate())<10&&(dd="0"+dd),(mm=today.getMonth()+1)<10&&(mm="0"+mm),today=(yyyy=today.getFullYear())+"-"+mm+"-"+dd,(dd=mundur.getDate())<10&&(dd="0"+dd),(mm=mundur.getMonth()+1)<10&&(mm="0"+mm),mundur=(yyyy=mundur.getFullYear())+"-"+mm+"-"+dd,document.getElementById("tgl_row").setAttribute("max",today),document.getElementById("tgl_row").setAttribute("min",mundur);
</script>
<style>
form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
</style>
 <script>
  $(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="date"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="date"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>
