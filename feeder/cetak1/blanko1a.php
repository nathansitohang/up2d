  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    	<link rel="shortcut icon" href="../../img/logo_pln.jpg">

  <title>SiHD / Blanko Tier 1 - Ukur Beban</title>
  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">

</head>
  <body>
  			 <div class="container-fluid" width="50">
			<button type="button" id="Print" class="close"><span aria-hidden="true"><i class="fa fa-print"></i> Print</span></button>
<div >
      <div class="breadcrumb mb-3"  style="width: 49rem;" id="cetakini">
                <div class="breadcrumb-body">
   <div class="table-responsive">
      <table width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
            <td valign="top" class="menuUtamaOff">Wilayah Sumatera Utara<br>Area .......................................<br>Rayon ....................................</td>
         </tr>
      </table>
      <table width="400"  border="0" cellpadding="1" cellspacing="0">
         <tr>
            <td> &nbsp </td>
         </tr>
      </table>
      <table width="400"  border="0" cellpadding="0" cellspacing="0">
         <tr align="left" valign="top">
            <td colspan="2">
               <table width="730"  border="1" cellspacing="0" cellpadding="0">
                  <tr align="center" valign="middle">
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">DATA GARDU DISTRIBUSI </span></strong></font></td>
                  </tr>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;Kode Gardu</strong></font> </td>
                     <td width="350"> </td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Merk</strong></font></td>
                     <td width="200"> </td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Alamat</strong></font></td>
                     <td width="350"> </td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Nomor Seri</strong></font></td>
                     <td width="200"> </td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Koordinat</strong></font></td>
                     <td width="350"> </td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Tahun Trafo</strong></font></td>
                     <td width="200"> </td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Penyulang</strong></font></td>
                     <td width="350"> </td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jenis Minyak</strong></font></td>
                     <td width="200"> </td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Konstruksi</strong></font></td>
                     <td width="350"> </td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Vector Group </strong></font></td>
                     <td width="200"> </td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Daya (kVA)</strong></font></td>
                     <td width="350"> </td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Impedansi (%) </strong></font></td>
                     <td width="200"> </td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah/Posisi Tap</strong></font></td>
                     <td width="350"> </td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah jurusan</strong></font></td>
                     <td width="200"> </td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Fasa </strong></font></td>
                     <td width="350"> </td>
                     <td width="150"><font color="#4f5051"></font></td>
                     <td width="200"></td>
                  </tr>
               </table>
      </table>
   </div>
<br/>

   <div class="table-responsive">

      <table width="730" cellspacing="0" border="1">
	<colgroup width="108"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup width="70"></colgroup>
	<colgroup span="2" width="70"></colgroup>
	  <tr>
         <td height="22" colspan="8" align="center"><font color="#4f5051"><strong><span class="style2">FORMULIR PENGUKURAN BEBAN</span></strong></font></td>
         </tr>
	<tr>
		<td  rowspan=4 align="center" valign=middle><font color="#000000">LWBP</font></td>
		<td  colspan=2 height = "50" align="left" valign=middle><font color="#000000">&nbsp;&nbsp;Petugas Assesment</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000"> </font></td>
		<td align="left" valign=middle><font color="#000000">&nbsp;&nbsp;V l-n</font></td>
		<td align="center" valign=middle><font color="#000000"> </font></td>
		</tr>
	<tr>
		<td  colspan=2 align="left" height="50" valign=middle><font color="#000000">&nbsp;&nbsp;Tanggal Assesment</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000"> </font></td>
		<td align="left" valign=middle><font color="#000000">&nbsp;&nbsp;cos phi</font></td>
		<td align="center" valign=middle><font color="#000000"> </font></td>
		</tr>
	<tr>
		<td  colspan=2 rowspan=2 align="center" valign=middle><font color="#000000">Incoming</font></td>
		<td  colspan=4 align="center" valign=middle><font color="#000000">Outgoing</font></td>
		</tr>
	<tr>

		<td  align="center" valign=middle><font color="#000000">A</font></td>
		<td  align="center" valign=middle><font color="#000000">B</font></td>
		<td  align="center" valign=middle><font color="#000000">C</font></td>
		<td  align="center"  valign=middle><font color="#000000">D</font></td>
	</tr>
	<tr>
		<td  height="50" align="center" valign=middle><font color="#000000">R (Amp)</font></td>
		<td  align="center" colspan ="2" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle ><font color="#000000"> </font></td>
	</tr>
	<tr>
		<td  height="50" align="center" valign=middle><font color="#000000">S (Amp)</font></td>
		<td  align="center" colspan ="2" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle ><font color="#000000"> </font></td>
		</tr>
	<tr>
		<td  height="50" align="center" valign=middle><font color="#000000">T (Amp)</font></td>
		<td  align="center" colspan ="2" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle ><font color="#000000"> </font></td>
	</tr>
	<tr>
		<td  height="50" align="center" valign=middle><font color="#000000">N (Amp)</font></td>
		<td  align="center" colspan ="2" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
	</tr>
	<tr>
		<td  rowspan=4 align="center" valign=middle><font color="#000000">WBP</font></td>
		<td  colspan=2 height = "50" align="left" valign=middle><font color="#000000">&nbsp;&nbsp;Petugas Assesment</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000"> </font></td>
		<td align="left" valign=middle><font color="#000000">&nbsp;&nbsp;V l-n</font></td>
		<td align="center" valign=middle><font color="#000000"> </font></td>
		</tr>
	<tr>
		<td  colspan=2 align="left" height="50" valign=middle><font color="#000000">&nbsp;&nbsp;Tanggal Assesment</font></td>
		<td  colspan=2 align="left" valign=bottom><font color="#000000"> </font></td>
		<td align="left" valign=middle><font color="#000000">&nbsp;&nbsp;cos phi</font></td>
		<td align="center" valign=middle><font color="#000000"> </font></td>
		</tr>
	<tr>
		<td  colspan=2 rowspan=2 align="center" valign=middle><font color="#000000">Incoming</font></td>
		<td  colspan=4 align="center" valign=middle><font color="#000000">Outgoing</font></td>
		</tr>
	<tr>

		<td  align="center" valign=middle><font color="#000000">A</font></td>
		<td  align="center" valign=middle><font color="#000000">B</font></td>
		<td  align="center" valign=middle><font color="#000000">C</font></td>
		<td  align="center"  valign=middle><font color="#000000">D</font></td>
	</tr>
	<tr>
		<td  height="50" align="center" valign=middle><font color="#000000">R (Amp)</font></td>
		<td  align="center" colspan ="2" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle ><font color="#000000"> </font></td>
	</tr>
	<tr>
		<td  height="50" align="center" valign=middle><font color="#000000">S (Amp)</font></td>
		<td  align="center" colspan ="2" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle ><font color="#000000"> </font></td>
		</tr>
	<tr>
		<td  height="50" align="center" valign=middle><font color="#000000">T (Amp)</font></td>
		<td  align="center" colspan ="2" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle ><font color="#000000"> </font></td>
	</tr>
	<tr>
		<td  height="50" align="center" valign=middle><font color="#000000">N (Amp)</font></td>
		<td  align="center" colspan ="2" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
		<td  align="center" valign=middle><font color="#000000"> </font></td>
	</tr>
	
</table>

  </div>
   </div>
   </div>
    </div>    </div>
   </body>
<script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../../js/sb-admin-datatables.min.js"></script>
    <script src="../../js/modal.js"></script>
    
<style>
@media screen {
    #printSection {
        display: none;
    }
}
@media print {
  @page { margin: 0.5; }
  body { margin: 1.6cm; }
  
    body * {
        visibility:hidden;
    }
    #printSection, #printSection * {
        visibility:visible;
    }
    #printSection {
        position:absolute;
        left:100;
        top:100;
    }
}
</style>

<script>
document.getElementById("Print").onclick = function () {
    printElement(document.getElementById("cetakini"));
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