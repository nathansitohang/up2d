<?php
    include "../config.php";
	include('../session.php');
echo '<input type="hidden" id="hidden_idlogin" value="'. htmlspecialchars($row['idlogin']) . '">';


?>
       <div class="modal-header">
				<center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-fw fa-lock"></i>   <span class="label label-warning">Ubah Password</span></h4>
									</center>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form id="loginForm" method="post" class="form-horizontal">


                    <div class="form-group">
                        <label class="col-xs-6 control-label">Password Baru</label>
                        <div class="col-xs-5">
                            <input type="password" class="form-control" id="newpw" />
                        </div>
                    </div>
					
					       <div class="form-group">
                        <label class="col-xs-6 control-label">Konfirmasi</label>
                        <div class="col-xs-5">
                            <input type="password" class="form-control" id="newpw1" />
                        </div>
                    </div>
					</div>
            <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
							<button class="btn btn-primary" onclick="GantiPw()">Submit</button>							
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
				</div>	
					
                </form> 
<script>

function GantiPw() {

var conf = confirm("Apakah Anda yakin mengubah password?");
    if (conf == true) {
    // get values
    var newpw = $("#newpw").val();
	var newpw1 = $("#newpw1").val();
    var idlogin = $("#hidden_idlogin").val();


	if (newpw == newpw1) {
    // Update the details by requesting to the server using ajax
    $.post("../gardu/ajax/changePassword.php", {
            newpw: newpw,
			newpw1: newpw1,
			idlogin: idlogin,
			

        },
        function (data, status) {
            // hide modal popup
            $("#modChangePw").modal("hide");
		alert('Password berhasil diubah!');
		location.href='../logout.php'
        }
    );

}
else {
alert('Konfirmasi password baru tidak sesuai!');
}

}

}
</script>