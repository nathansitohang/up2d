$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#dataPadam').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'The information on this table is copyright to PLN'
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

$(document).ready(function() {
 
    // Append a caption to the table before the DataTables initialisation
 
    $('#dataPadamUpdate').DataTable, $('#dataPadam2').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'The information on this table is copyright to PLN'
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


	$('.datatable').DataTable()
	
$(function() {
    // Input radio-group visual controls
    $('.radio-group label').on('click', function(){
        $(this).removeClass('not-active').siblings().addClass('not-active');
    });
});
   
    $("#UP3").change(function(){
   
        var id_UP3 = $("#UP3").val();
       
        $("#imgLoad").show("");
       
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../rp/get_up3.php",
            data: "up3="+id_UP3,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data Kota');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#ULP").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });

   
    $("#UP32").change(function(){
   
        var id_UP32 = $("#UP32").val();
       
        $("#imgLoad").show("");
       
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../get_up3.php",
            data: "up3="+id_UP32,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data Kota');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#ULP2").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
