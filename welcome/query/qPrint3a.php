<?php
   include "../../config.php";
   include('../../session.php');
   
   if($_POST['idgardu']) {
		$id = $_POST['idgardu'];  
		$id = base64_decode($id);
		$id = $id/4324234;	
		$query = "SELECT * FROM master WHERE idgardu = $id";
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
       while ($row = @mysqli_fetch_assoc($result)){
   ?>
<input type="hidden" value="<?php echo $row['idgardu']; ?>" id="hidden_idgardu">
<input type="hidden" value="<?php echo $login_idrayon; ?>" id="hidden_loginrayon">
<input type="hidden" value="<?php echo $row['idrayon']; ?>" id="hidden_idrayon">
<div class="card-header"><i class="fa fa-print"  ></i>   Cetak Form TTR Test - <?php echo $row['kodegd']; ?> 
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="modal-body">
   <div id="cetakini3">
   <div class="table-responsive">
      <table width="750" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
            <td valign="top" class="menuUtamaOff">Wilayah Sumatera Utara<br>Area&nbsp<?php echo $row['area']; ?> <br>Rayon&nbsp<?php echo $row['rayon']; ?> </td>
         </tr>
      </table>
      <table width="750"  border="0" cellpadding="1" cellspacing="0">
         <tr>
            <td> &nbsp </td>
         </tr>
      </table>
      
               <table width="750"  border="1" cellspacing="0" cellpadding="0">
                  <tr align="center" valign="middle">
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">DATA GARDU DISTRIBUSI </span></strong></font></td>
                  </tr>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;Kode Gardu</strong></font> </td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['kodegd']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Merk</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['merek']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Alamat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['alamat']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Nomor Seri</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['noseri']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Koordinat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['lat'];?>, <?php echo $row['lng']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Tahun Trafo</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['thntrafo']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Penyulang</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['feeder']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jenis Minyak</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['minyak']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Konstruksi</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['konstruksi']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Vector Group </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['vector']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Daya (kVA)</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['kapasitas']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Impedansi (%) </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['imp']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah/Posisi Tap</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['jlh_tap']; ?> / <?php echo $row['pos_tap']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah jurusan</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $row['jlh_jur']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Fasa </strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $row['fasa']; ?></td>
                     <td width="150"><font color="#4f5051"></font></td>
                     <td width="200"></td>
                  </tr>
               </table><br/>
	  <table width="750"  border="1" cellspacing="0" cellpadding="0">
	           <tr>
         <td height="22" align="center" colspan="4"><font color="#4f5051"><strong><span class="style2">FORMULIR ASSESMENT TIER 3 - TTR TEST </span></strong></font></td>
         </tr>
<tr>
<td>&nbsp;&nbsp;Petugas Assesment</td>
<td colspan="3"></td>
</tr>
<tr>
<td>&nbsp;&nbsp;Tanggal Assesment</td>
<td colspan="3"></td>
</tr>
<tr align="center">
<th width="175"><font color="#4f5051"><strong>Item Ukur</strong></th>
<th width="175"><font color="#4f5051">R-T || t-n</th>
<th width="175"><font color="#4f5051">S-T || r-n</th>
<th width="175"><font color="#4f5051">R-S || s-n</th>
</tr>
<tr align="center">
<td width="175" height="50"><font color="#4f5051">Tap 1</td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
</tr>
<tr align="center">
<td width="175" height="50"><font color="#4f5051">Tap 2</td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
</tr>
<tr align="center">
<td width="175" height="50"><font color="#4f5051">Tap 3</td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
</tr>
<tr align="center">
<td width="175" height="50"><font color="#4f5051">Tap 4</td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
</tr>
<tr align="center">
<td width="175" height="50"><font color="#4f5051">Tap 5</td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
<td width="175"><font color="#4f5051"></td>
</tr>
</table> 
   </div>
</div>
<br/>
                <button type="button" id="Print3" class="btn btn-primary">Cetak</button>

</div>
<div class="card-footer small text-muted">&copy 2018 - SiHD</div>
<?php } 		
   }
   
   
   ?>


<style>
@media screen {
    #printSection {
        display: none;
    }
}
@media print {
    body * {
        visibility:hidden;
    }
    #printSection, #printSection * {
        visibility:visible;
    }
    #printSection {
        position:absolute;
        left:0;
        top:0;
    }
}
</style>

<script>
document.getElementById("Print3").onclick = function () {
    printElement(document.getElementById("cetakini3"));
};

function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script>