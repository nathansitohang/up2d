<?php	
   include('../../session.php');
   include "../../config.php";
   
   

header("Content-Type: application/application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=gardu-export.xls");
header("Cache-Control: max-age=0");    

   if ($login_role == "admin") {
   $query="SELECT*
   FROM master WHERE 1 ORDER by idrayon, kodegd" ;
   $no = 1;
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
   
   echo        
   '  
   
   <table border="1" width="100%" cellspacing="0">
             <tr>
    <th colspan="12"> Daftar Rekapitulasi Trafo '.$login_session.' </th>
    </tr>
    
    <thead>
               <tr>
   	<th width="60">No.</th>
   	<th width="150">Area</th>
   	<th width="150">Rayon</th>
   	<th width="90">Kode Gardu</th>
   	<th width="300">Alamat</th>
   	<th width="70">Kapasitas</th>
   	<th width="40">Fasa</th>
   	<th width="60">Feeder</th>
   	<th width="120">Merek</th>
   	<th width="170">Konstruksi</th>
   	<th width="120">Latitude</th>
   	<th width="120">Longitude</th>
               </tr>
             </thead>
   
             <tbody> ';
   
   
   while ($row = @mysqli_fetch_assoc($result)){
   if ($row['konstruksi'] == 1) { $konstruksi = 'Single Pole Tanpa Rak' ;}
   else if ($row['konstruksi'] == 2) { $konstruksi = 'Single Pole Dengan Rak';}
   else if ($row['konstruksi'] == 3) { $konstruksi = 'Double Pole' ;}
   else if ($row['konstruksi'] == 4) { $konstruksi = 'Beton';}
   else if ($row['konstruksi'] == 5) { $konstruksi = 'Kios';}
   else { $konstruksi = 'Belum Pilih'; }
   echo '  
   
   
                            <tr>   <td>'.$no.'</td>
   					<td>'.$row["area"].'</td>  
   					<td>'.$row["rayon"].'</td>  
   					<td>'.$row["kodegd"].'</td>  
                                   <td>'.$row["alamat"].'</td>  
                                   <td>'.$row["kapasitas"].'</td>  
                                   <td>'.$row["fasa"].'</td>  
                                   <td>'.$row["feeder"].'-'.$row["ufeeder"].'</td>  
                                    <td>'.$row["merek"].'</td>  
                                   <td>'.$konstruksi.'</td>
                                    <td>'.$row["lat"].'</td>  
                                   <td>'.$row["lng"].'</td>   									
                              </tr>  
                              ';	
   			   $no++;
   }
   
            
             echo '</tbody>';
           echo '</table>';}
   
   else if ($login_role == "area") {
   $query="SELECT*
   FROM master WHERE idarea ='$login_idarea' ORDER by idrayon, kodegd" ;
   $no = 1;
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
   
   echo        
   ' <table border="1" width="100%" cellspacing="0">
              <tr>
    <th colspan="11"> Daftar Rekapitulasi Trafo '.$login_session.' </th>
    </tr>
             <thead>
               <tr><th width="60">No.</th>
   	<th width="150">Rayon</th>
   	<th width="90">Kode Gardu</th>
   	<th width="300">Alamat</th>
   	<th width="70">Kapasitas</th>
   	<th width="40">Fasa</th>
   	<th width="60">Feeder</th>
   	<th width="120">Merek</th>
   	<th width="170">Konstruksi</th>
   	<th width="120">Latitude</th>
   	<th width="120">Longitude</th>
               </tr>
             </thead>
             
             <tbody> ';
   
   
   while ($row = @mysqli_fetch_assoc($result)){
   if ($row['konstruksi'] == 1) { $konstruksi = 'Single Pole Tanpa Rak' ;}
   else if ($row['konstruksi'] == 2) { $konstruksi = 'Single Pole Dengan Rak';}
   else if ($row['konstruksi'] == 3) { $konstruksi = 'Double Pole' ;}
   else if ($row['konstruksi'] == 4) { $konstruksi = 'Beton';}
   else if ($row['konstruksi'] == 5) { $konstruksi = 'Kios';}
   else { $konstruksi = 'Belum Pilih'; }
   echo '  
   
                            <tr>   	<td>'.$no.'</td>
									<td>'.$row["rayon"].'</td>  
									<td>'.$row["kodegd"].'</td>  
									<td>'.$row["alamat"].'</td>  
									<td>'.$row["kapasitas"].'</td>  
									<td>'.$row["fasa"].'</td>  
									<td>'.$row["feeder"].'-'.$row["ufeeder"].'</td>  
                                    <td>'.$row["merek"].'</td>  
									<td>'.$konstruksi.'</td>   
									<td>'.$row["lat"].'</td>  
									<td>'.$row["lng"].'</td>   													
                              </tr>  
                              ';	
   			    $no++;
   }
   
            
             echo '</tbody>';
           echo '</table>';}		
   
   else if ($login_role == "rayon") {
   $query="SELECT*
   FROM master WHERE idrayon ='$login_idrayon' ORDER by kodegd" ;
   $no = 1;
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
   
   echo        
   ' <table border="1" width="100%" cellspacing="0">
              <tr>
    <th colspan="10"> Daftar Rekapitulasi Trafo '.$login_session.' </th>
    </tr>
             <thead>
               <tr><th width="60">No.</th>
   	<th width="90">Kode Gardu</th>
   	<th width="300">Alamat</th>
   	<th width="70">Kapasitas</th>
   	<th width="40">Fasa</th>
   	<th width="60">Feeder</th>
   	<th width="120">Merek</th>
   	<th width="170">Konstruksi</th>
   	<th width="120">Latitude</th>
   	<th width="120">Longitude</th>
               </tr>
             </thead>
           
             <tbody> ';
   
   
   while ($row = @mysqli_fetch_assoc($result)){
   if ($row['konstruksi'] == 1) { $konstruksi = 'Single Pole Tanpa Rak' ;}
   else if ($row['konstruksi'] == 2) { $konstruksi = 'Single Pole Dengan Rak';}
   else if ($row['konstruksi'] == 3) { $konstruksi = 'Double Pole' ;}
   else if ($row['konstruksi'] == 4) { $konstruksi = 'Beton';}
   else if ($row['konstruksi'] == 5) { $konstruksi = 'Kios';}
   else { $konstruksi = 'Belum Pilih'; }
   
   echo '  
   
                            <tr>  <td>'.$no.'</td>
   					<td>'.$row["kodegd"].'</td>  
                                   <td>'.$row["alamat"].'</td>  
                                   <td>'.$row["kapasitas"].'</td>  
                                   <td>'.$row["fasa"].'</td>  
                                   <td>'.$row["feeder"].'-'.$row["ufeeder"].'</td>  
                                    <td>'.$row["merek"].'</td>  
                                   <td>'.$konstruksi.'</td> 
                                   <td>'.$row["lat"].'</td>  
                                   <td>'.$row["lng"].'</td>   				  									
                              </tr>  
                              ';	
   			    $no++;
   }
   
            
             echo '</tbody>';
           echo '</table>';}
   
   
   ?>
