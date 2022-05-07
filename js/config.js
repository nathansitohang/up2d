$(document).ready(function(){ 
	$("#loading").hide();
	
	$("#up3").change(function(){ 
		$("#ulp").hide();
		$("#loading").show(); 
	
		$.ajax({
			type: "POST", 
			url: "get_ulp.php", 
			data: {up3 : $("#up3").val()}, 
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 
				$("#loading").hide(); 

				$("#ulp").html(response.ulp).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(thrownError);
			}
		});
    });
});
