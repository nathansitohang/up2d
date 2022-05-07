<?php
    include "../../config.php";
	include('../../session.php');
		if (!empty($_GET['assesment']) && !empty($_GET['id']) && base64_decode($_GET['log'])/13532 == $kali) {
	 	$id_t3c= base64_decode($_GET['assesment']);  
		$id_t3c= $id_t3c/(190991*$kali);	
		$kuery = "SELECT * FROM t3c WHERE id_t3c = $id_t3c";
		$hasil = mysqli_query($db, $kuery);
		if (!$hasil) {
		die('Invalid query: ' . mysqli_error());
		}
		$baris = mysqli_fetch_assoc($hasil);
	
	 	$id= base64_decode($_GET['id']);
		$id=$id/(24021995*$kali);
		$query = "SELECT * FROM master WHERE idgardu = $id";
		$result = mysqli_query($db, $query);
		if (!$result) {
		die('Invalid query: ' . mysqli_error());
		}
		$row = mysqli_fetch_assoc($result);
		$konstruksi = $baris['konstruksi']; 
		
		if ($konstruksi == 1) { $konstruks = 'Single Pole Tanpa Rak' ;}
		else if ($konstruksi == 2) { $konstruks = 'Single Pole Dengan Rak';}
		else if ($konstruksi == 3) { $konstruks = 'Double Pole' ;}
		else if ($konstruksi == 4) { $konstruks = 'Beton';}
		else if ($konstruksi == 5) { $konstruks = 'Kios';}
		else { $konstruks = 'Belum Pilih'; }
		$amp = ($baris['kapasitas']*1000)/(sqrt(3)*400);
?>	


		
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    	<link rel="shortcut icon" href="../../img/logo_pln.jpg">

  <title>Detail Ukur Tahanan Belitan</title>
  <!-- Bootstrap core CSS-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    	<link rel="shortcut icon" href="../../img/logo_pln.jpg">


</head>

<body>
    <div class="container-fluid" width="50">
			<button type="button" id="Print" class="close"><span aria-hidden="true"><i class="fa fa-print"></i> Print</span></button>
<div >
      <div class="breadcrumb mb-3"  style="width: 51rem;" id="cetakini">
                <div class="breadcrumb-body">
   <div class="table-responsive">
      <table width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="48" height="70"></td>
            <td valign="top" class="menuUtamaOff">Wilayah Sumatera Utara<br>Area&nbsp<?php echo $row['area']; ?> <br>Rayon&nbsp<?php echo $row['rayon']; ?> </td>
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
               <table width="700"  border="1" cellspacing="0" cellpadding="0">
                  <tr align="center" valign="middle">
                     <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">DATA GARDU DISTRIBUSI </span></strong></font></td>
                  </tr>
                  <tr>
                     <td width="220"> <font color="#4f5051"><strong>&nbsp;&nbsp;Kode Gardu</strong></font> </td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['kodegd']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Merk</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['merek']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Alamat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['alamat']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Nomor Seri</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['noseri']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Koordinat</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['lat'];?>, <?php echo $baris['lng']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Tahun Trafo</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['thntrafo']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Penyulang</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['feeder']; ?>-<?php echo $baris['ufeeder']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jenis Minyak</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['minyak']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Konstruksi</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $konstruks; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Vector Group </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['vector']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Daya (kVA)</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['kapasitas']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Impedansi (%) </strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['imp']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah/Posisi Tap</strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['jlh_tap']; ?> / <?php echo $baris['pos_tap']; ?></td>
                     <td width="250"><font color="#4f5051"><strong>&nbsp;&nbsp;Jumlah jurusan</strong></font></td>
                     <td width="200">&nbsp;&nbsp;<?php echo $baris['jlh_jur']; ?></td>
                  </tr>
                  <tr>
                     <td width="220"><font color="#4f5051"><strong>&nbsp;&nbsp;Fasa </strong></font></td>
                     <td width="350">&nbsp;&nbsp;<?php echo $baris['fasa']; ?></td>
                     <td width="150"><font color="#4f5051"></font></td>
                     <td width="200"></td>
                  </tr>
               </table>
      </table>
   </div>
<br/>

   <div class="table-responsive">
      <table  width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
         <td height="22" colspan="4"><font color="#4f5051"><strong><span class="style2">HASIL ASSESMENT TIER 3 - WINDING RESITANCE</span></strong></font></td>
         </tr>
      </table>
	   <table width="700"  border="1" cellspacing="0" cellpadding="0">
<tr>
<td>&nbsp;&nbsp;Petugas Assesment</td>
<td colspan="7">&nbsp;&nbsp;<?php echo $baris['ptgs']; ?></td>
</tr>
<tr>
<td>&nbsp;&nbsp;Tanggal Assesment</td>
<td colspan="7">&nbsp;&nbsp;<?php echo $baris['tgl']; ?></td>
</tr>
  <tr align="center">
	<td width="190" rowspan="2">Primer</td>
    <td>R - S</td>
    <td>R - T</td>
    <td>S - T<br></td>
  </tr>
  <tr align="center">
    <td height="100"><?php echo $baris['p1']; ?> &#8486;</td>
    <td><?php echo $baris['p2']; ?> &#8486;</td>
    <td><?php echo $baris['p3']; ?> &#8486;</td>
  </tr>
  <tr align="center">
    <td rowspan="2">Sekunder</td>
    <td>r - s</td>
    <td>r - t</td>
    <td>s - t</td>
  </tr>
  <tr align="center">
    <td height="100"><?php echo $baris['s1']; ?> &#8486;</td>
    <td><?php echo $baris['s2']; ?> &#8486;</td>
    <td><?php echo $baris['s3']; ?> &#8486;</td>
  </tr>
</table> 
   </div>
   </div>
   </div>
    </div>    
	</div>

  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
     </div>  
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
         <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//../../js/analytics.js','ga');
            
            ga('create', 'UA-75591362-1', 'auto');
            ga('send', 'pageview');
            
         </script>
	 

		 
		 
</body>
<?php }
else {
echo "<script>window.close()</script>";
}
?>
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
        top:50;
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