<?php
   include('../..//session.php'); 
?>

<div class="card-header"> <i class="fa fa-plus"  ></i>      Tambah Data GH	  
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">x</span>
   </button>
</div>
<div class="card-body">
   <div class="col-md-12 form-box">
      <form role="form" class="registration-form" action="javascript:void(0);">
            <div class="form-top">
               <div class="form-top-left">
                  <p> <strong>MOHON MAAF, ANDA BELUM PUNYA OTORITAS </strong></p>
               </div>
            </div>
        
   </form>
</div>
</div>
<div class="card-footer small text-muted">&copy 2020 - SiHD</div>
<style>
   form .form-bottom button.btn{min-width:105px}form .form-bottom .input-error{border-color:#d03e3e;color:#d03e3e}form.registration-form fieldset{display:none}
</style>
<script>						
   $(document).ready(function(){$(".registration-form fieldset:first-child").fadeIn("slow"),$('.registration-form input[type="text"]').on("focus",function(){$(this).removeClass("input-error")}),$(".registration-form .btn-primary").on("click",function(){var t=$(this).parents("fieldset"),i=!0;t.find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?($(this).addClass("input-error"),i=!1):$(this).removeClass("input-error")}),i&&t.fadeOut(400,function(){$(this).next().fadeIn()})}),$(".registration-form .btn-info").on("click",function(){$(this).parents("fieldset").fadeOut(400,function(){$(this).prev().fadeIn()})}),$(".registration-form").on("submit",function(t){$(this).find('input[type="text"],input[type="email"]').each(function(){""==$(this).val()?(t.preventDefault(),$(this).addClass("input-error")):$(this).removeClass("input-error")})})});
</script>	
<script>
   function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
</script>
<script>										
   function addRecord(){var a=$("#kodegd").val(),e=$("#alamat").val(),l=$("#kapasitas").val(),t=$("#feeder").find(":selected").val(),d=$("#uruttd").val(),s=$("#lat").val(),r=$("#lng").val(),i=$("#konstruksi").find(":selected").val(),n=$("#merek").find(":selected").val(),v=$("#noseri").val(),o=$("input[name=fasa]:checked").val(),p=$("#thntrafo").val(),k=$("#jlh_tap").val(),f=$("#pos_tap").val(),m=$("#imp").val(),c=$("#minyak").find(":selected").val(),h=$("#vector").val(),u=$("#tgl_psg").val(),g=$("#jlh_jur").val(),_=$("#ket").val();k>=8?alert("Error:Jumlah tap salah!"):f>k?alert("Error:Posisi tap > Jumlah Tap!"):""== a?alert("Kode gardu kosong!"):$.post("../ajax/addMaster.php",{kodegd:a,alamat:e,kapasitas:l,feeder:t,uruttd:d,lat:s,lng:r,konstruksi:i,merek:n,noseri:v,fasa:o,thntrafo:p,jlh_tap:k,pos_tap:f,imp:m,minyak:c,vector:h,tgl_psg:u,jlh_jur:g,ket:_},function(a,e){$("#modAddMaster").modal("hide"),alert("Terimakasih, data akan tersimpan apabila kode gardu unik!"),location.href="../master_gardu/index.php"})}				
</script>
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);
</script>

