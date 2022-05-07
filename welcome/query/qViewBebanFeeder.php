<?php
   include "../../config.php";
   include('../../session.php');
   if($_POST['NO']) {
		$id = $_POST['NO'];  
		$id = base64_decode($id);
		$id = $id/657454;		
		$query = "SELECT * FROM titik WHERE NO = $id";
   $result = mysqli_query($db, $query);
   if (!$result) {
   die('Invalid query: ' . mysqli_error());
   }
   
       while ($row = @mysqli_fetch_assoc($result)){
   
   if ($row['SCADA'] == 1) { $SCADA = 'SUDAH' ;}

   else { $SCADA = 'BELUM'; }
   $tahun= date(' Y ');
 $ipaddress = '';

function get_client_ip() {
   
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
   ?>
<div class="card-header"><i class="fa fa-eye"  ></i>   Lihat Data Detail <?php echo $row['GARDU_HUBUNG']; ?> <?php echo $ipaddress; ?> 
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
<div class="col-md-12 form-box">
                  <div class="table-responsive">

      <form role="form" class="registration-form" method= "post" action="javascript:void(0);">
	
	   
	<div class="form-top">
               <div class="form-top-left">
                  <p> <strong> Data Penyulang</strong></p>
               </div>
            </div>		   
			   
			   
			   	            <div class="form-bottom">
<table width="400" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="60" align="center"><img src="../../img/logo_plnv.jpg" width="50" height="70"></td>
            <td valign="top" class="menuUtamaOff">UIW Sumatera Utara<br>UP2D Sumatera Utara&nbsp; </td>
         </tr>
      </table>
     
			   
			   
			   <?php 
			   
			   $no=1;
			   $usersTimezone = 'Asia/Jakarta';
			   $hour = date('H', time());

			 
			   
			   $query2="SELECT*
                        FROM penyulang WHERE kodegigh = $id AND dtbs_fdr=1 ORDER BY tdkap ASC";
                        $result = mysqli_query($db, $query2);
                        if (!$result) {
                          die('Invalid query: ' . mysqli_error());
                        }
                        		
                        		
                         echo        
                         ' <table class="myTable table"  id="detail"  style="width:100%">
                                      <thead>
                                        <tr>
										    <th >NO</th>
                        					<th>Penyulang</th>
											<th style="display:none">Penyulang</th>											
                        					<th>TD</th>
											<th>Tanggal</th>
											<th>Waktu</th>
											<th>Input Beban</th>
											<th>Save</th>
										
                        					
                        
                                        </tr>
                                      </thead>
                                      
                                      <tbody> ';
                        
                          
                          while ($row = @mysqli_fetch_assoc($result)){
							  
							$NO=$row["no"];
                          
						echo '<tr class=output2 id='.$row["no"].'>';
							
										echo ' 	 <td>'.$no.'</td>  
                        					<td id="feeder">'.$row["feeder"].'</td>
<td style="display:none" class="nmr"> <input type="text" class="form-control"  value="'.$row["no"].'"> </td>											
                                            <td id="trafo">'.$row["tdkap"].'</td>  
<td id="tanggal" style="width:4%"><input type="date" onkeypress="return isNumber(event)" class="form-control" value="'.date('Y-m-d').'" min=" '.date('Y-m-d', strtotime("-1 months")).'" max="'.date('Y-m-d').'"></td>  ';
if( $hour > 1 && $hour <= 17) {
  

				echo '<td id="waktu"><select id="wak" class="form-control" >
                           <option value="1" >Siang </option>
                           <option value="2" >Malam</option> </select></td>';}
else {
  

				echo '<td id="waktu"><select id="wak" class="form-control">
                           <option value="2" >Malam</option>
                           <option value="1" >Siang</option> </select></td>';}						   
						   
						   
				
echo '<td id="beban" ><input type="text" class="form-control kapital" placeholder="Beban" onkeypress="return isNumber(event)" value=""> </td>';
echo '<td><button  class="btn btn-success" id="btnselect" ><i class="fa fa-save" style="color:#fff"></i></button>  </td>';

                                                           
                                                       
 echo '</tr>'; 
 $no++;
                        	}
                        	
                                     
                                      echo '</tbody>';
                                    echo '</table>';
			   
			   
			   
			   
			   
			   
			   
			   ?>
			   </div>   

</form>
</div>
</div>
</div>














<div class="card-footer small text-muted">&copy <?php echo $tahun; ?> - SiHD</div>

<script> 
$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#detail').DataTable( {
        dom: 'lBfrtip',
		pageLength : 5,
        dom: 'lBfrtip',
		lengthMenu: [[5, 10, 15], [5, 10, 15]],
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'The information in this table is copyright to PLN'
            },
            {
                extend: 'pdf',
                messageBottom: null
            },
            {
                extend: 'print',

                messageBottom: null
            }
			
        ]
    } );
} );
</script> 




<?php } }
   ?>

						
<script>						
$(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>

<script>
function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
</script>


<script>




 
  $(document).ready(function(){

    // code to read selected table row cell data (values).
    $(".myTable").on('click','#btnselect',function(){
         // get the current row

         var currentRow=$(this).closest("tr"); 
         
         var feeder=currentRow.find("#feeder").text(); 
         var trafo=currentRow.find("#trafo").text(); 
		 var nmr=currentRow.find(".nmr input").val();
		 var beban=currentRow.find("#beban input").val();
		 var waktu=currentRow.find("#waktu select").val();
		 var tanggal=currentRow.find("#tanggal input").val();
		 
		 
         var data=feeder+"\n"+trafo+"\n"+nmr+"\n"+beban+"\n"+waktu+"\n"+tanggal;
		 


nmr == nmr  && beban != "" && beban <=400 ?$.post("../ajax/insertBeban.php",

{nmr:nmr,
tanggal:tanggal,
feeder:feeder,
trafo:trafo,
beban:beban,
waktu:waktu
},





function(tanggal)


{
currentRow.find('#beban input[type="text"]').prop('disabled' , true),
currentRow.find('#tanggal input[type="date"]').prop('disabled' , true),
currentRow.find('#wak').attr('disabled', true),
currentRow.find('#btnselect').attr('disabled' , true)

})

:alert("Beban Kosong/Salah Entry/Melebihi Batas")



    });
});
  		
</script>