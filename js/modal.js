    //1. Ubah Password
	$(document).ready(function(){
        $('#modChangePw').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qChangePw.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.konfirmasi-pw').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
    //2. Tambah Data Gardu	
	    $(document).ready(function(){
        $('#modAddMasterGH').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qAddMasterGH.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.add-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	//3. Lihat Data Gardu Hubung
    $(document).ready(function(){
        $('#modView1').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qViewMaster.php',
                data :  {NO:NO},
                success : function(data){
                $('.lihat-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	
	//3. Lihat Data Gardu Hubung
    $(document).ready(function(){
        $('#modViewProtek').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qViewMasterProtek.php',
                data :  {NO:NO},
                success : function(data){
                $('.lihatProtek-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	
	
	//3a. Lihat Data Gardu Induk
    $(document).ready(function(){
        $('#modViewGI').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qViewMasterGI.php',
                data :  {NO:NO},
                success : function(data){
                $('.lihatGI-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	
	
		
	//3b. Lihat Data Penyulang
    $(document).ready(function(){
        $('#modViewFeeder').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qViewMasterFeeder.php',
                data :  {NO:NO},
                success : function(data){
                $('.lihatFeeder-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	
	//3c. Edit Data Penyulang
    $(document).ready(function(){
        $('#modEditFeeder').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qEditMasterFeeder.php',
                data :  {NO:NO},
                success : function(data){
                $('.editFeeder-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	
	//3c. Tampilkan Data Penyulang GI
    $(document).ready(function(){
        $('#modBeban').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qViewBebanFeeder.php',
                data :  {NO:NO},
                success : function(data){
                $('.lihatBeban-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	
	
	
	
	
	
	
	
	
	//4a. Edit Data Keypoint
    $(document).ready(function(){
        $('#modEditKP').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qEditMasterKP.php',
                data :  'NO='+ NO,
                success : function(data){
                $('.editKP-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	//4b. Resetting Proteksi	
	$(document).ready(function(){
        $('#modReset').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qResetPro.php',
                data :  {NO:NO},
                success : function(data){
                $('.reset-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	
	

	//5. Hapus Data Gardu
    $(document).ready(function(){
        $('#modDeleteKP').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qDelMasterKP.php',
                data :  'NO='+ NO,
                success : function(data){
                $('.deleteKP-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	//6. Input Data Tier 1 Pengukuran Beban
    $(document).ready(function(){
        $('#modInTier1a').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qIt1_ukur.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.InTier1a-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	
	//7. Input Data Tier 1 Inspeksi Visual
    $(document).ready(function(){
        $('#modInTier1b').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qIt1_vis.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.InTier1b-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	

	//8. Input Data Tier 2 Cek Minyak
	  $(document).ready(function(){
        $('#modInTier2a').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qIt2_oil.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.InTier2a-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	//9. Input Data Tier 2 Thermo
		  $(document).ready(function(){
        $('#modInTier2b').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qIt2_the.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.InTier2b-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	
	//10. Input Data Tier 3 TTR
		$(document).ready(function(){
        $('#modInTier3a').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qIt3_ttr.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.InTier3a-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	//11. Input Data Tier 3 Megger
				  $(document).ready(function(){
        $('#modInTier3b').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qIt3_ir.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.InTier3b-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
		//12. Input Data Tier 3 Winding Resistance
		$(document).ready(function(){
        $('#modInTier3c').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qIt3_wr.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.InTier3c-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	
		//13. Lihat Data Keypoint
		$(document).ready(function(){
        $('#modViewKP').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qViewMasterKP.php',
                data :  {NO:NO},
                success : function(data){
                $('.lihatKP-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });			
	
		//14. Lihat Data Tier 1 Inspeksi Visual
		$(document).ready(function(){
        $('#modViewt1b').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/tier1/q1b.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.lihatT1b-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		
	
			//15. Lihat Data Tier 2 Oil Quality
		$(document).ready(function(){
        $('#modViewt2a').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/tier2/q2a.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.lihatT2a-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });				
	
		//16. Lihat Data Tier 2 Thermovision
		$(document).ready(function(){
        $('#modViewt2b').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/tier2/q2b.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.lihatT2b-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		
	
				//17. Lihat Data Tier 3 TTR
		$(document).ready(function(){
        $('#modViewt3a').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/tier3/q3a.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.lihatT3a-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });				
	
		//18. Lihat Data Tier 3 Megger
		$(document).ready(function(){
        $('#modViewt3b').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/tier3/q3b.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.lihatT3b-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		
	
//19. Lihat Data Tier 3 WR
$(document).ready(function(){$("#modViewt3c").on("show.bs.modal",function(a){var t=$(a.relatedTarget).data("id");$.ajax({type:"post",url:"..//query/tier3/q3c.php",data:"idgardu="+t,success:function(a){$(".lihatT3c-data").html(a)}})})});
	
//20. Cetak Tier 1 a
$(document).ready(function(){$("#cetakt1a").on("show.bs.modal",function(a){var t=$(a.relatedTarget).data("id");$.ajax({type:"post",url:"..//query/qPrint1a.php",data:"idgardu="+t,success:function(a){$(".cetak1a-data").html(a)}})})});
	
//21. Cetak Tier 1b
$(document).ready(function(){$("#cetakt1b").on("show.bs.modal",function(a){var t=$(a.relatedTarget).data("id");$.ajax({type:"post",url:"..//query/qPrint1b.php",data:"idgardu="+t,success:function(a){$(".cetak1b-data").html(a)}})})});
	
//22. Cetak Tier 2a
$(document).ready(function(){$("#cetakt2a").on("show.bs.modal",function(a){var t=$(a.relatedTarget).data("id");$.ajax({type:"post",url:"..//query/qPrint2a.php",data:"idgardu="+t,success:function(a){$(".cetak2a-data").html(a)}})})});
	
//23. Cetak Tier 2b
$(document).ready(function(){$("#cetakt2b").on("show.bs.modal",function(a){var t=$(a.relatedTarget).data("id");$.ajax({type:"post",url:"..//query/qPrint2b.php",data:"idgardu="+t,success:function(a){$(".cetak2b-data").html(a)}})})});

//24. Cetak Tier 3a
$(document).ready(function(){$("#cetakt3a").on("show.bs.modal",function(a){var t=$(a.relatedTarget).data("id");$.ajax({type:"post",url:"..//query/qPrint3a.php",data:"idgardu="+t,success:function(a){$(".cetak3a-data").html(a)}})})});
	
//25. Cetak Tier 3b
$(document).ready(function(){$("#cetakt3b").on("show.bs.modal",function(a){var t=$(a.relatedTarget).data("id");$.ajax({type:"post",url:"..//query/qPrint3b.php",data:"idgardu="+t,success:function(a){$(".cetak3b-data").html(a)}})})});
  
//26. Cetak Tier 3c
$(document).ready(function(){$("#cetakt3c").on("show.bs.modal",function(a){var t=$(a.relatedTarget).data("id");$.ajax({type:"post",url:"..//query/qPrint3c.php",data:"idgardu="+t,success:function(a){$(".cetak3c-data").html(a)}})})});

//Batasi input karakter
function isNumber(e){var i=(e=e||window.event).which?e.which:e.keyCode;return!(i>31&&(i<45||i>57))}
//27. Kirim Tier 1a Pengukuran ke Database
function addt1a(){var a=$("#kodegd").val(),i=$("#ptgs1").val(),l=$("#tgl1").val(),t=$("#ir1").val(),n=$("#is1").val(),r=$("#it1").val(),e=$("#in1").val(),s=$("#vln1").val(),v=$("#pf1").val(),g=$("#ira1").val(),d=$("#isa1").val(),u=$("#ita1").val(),p=$("#ina1").val(),m=$("#irb1").val(),k=$("#isb1").val(),b=$("#itb1").val(),o=$("#inb1").val(),c=$("#irc1").val(),f=$("#isc1").val(),h=$("#itc1").val(),B=$("#inc1").val(),P=$("#ird1").val(),W=$("#isd1").val(),j=$("#itd1").val(),T=$("#ind1").val(),_=$("#ptgs2").val(),L=$("#tgl2").val(),I=$("#ir2").val(),A=$("#is2").val(),y=$("#it2").val(),H=$("#in2").val(),S=$("#vln2").val(),x=$("#pf2").val(),C=$("#ira2").val(),D=$("#isa2").val(),q=$("#ita2").val(),w=$("#ina2").val(),z=$("#irb2").val(),E=$("#isb2").val(),F=$("#itb2").val(),G=$("#inb2").val(),J=$("#irc2").val(),K=$("#isc2").val(),M=$("#itc2").val(),N=$("#inc2").val(),O=$("#ird2").val(),Q=$("#isd2").val(),R=$("#itd2").val(),U=$("#ind2").val(),V=$("#alamat").val(),X=$("#feeder").val(),Y=$("#ufeeder").val(),Z=$("#kapasitas").val(),aa=$("#fasa").val(),ia=$("#merek").val(),la=$("#noseri").val(),ta=$("#thntrafo").val(),na=$("#lat").val(),ra=$("#lng").val(),ea=$("#minyak").val(),sa=$("#konstruksi").val(),va=$("#vector").val(),$a=$("#imp").val(),ga=$("#jlh_jur").val(),da=$("#jlh_tap").val(),ua=$("#pos_tap").val(),pa=$("#tgl_psg").val(),ma=$("#ket").val(),ka=$("#sesi").val(),ba=$("#idrayon").val(),oa=$("#tgl1_lama").val(),ca=$("#tgl2_lama").val();""==i&&""!=l?alert("Input nama petugas assesment (LWBP)!"):""==_&&""!=L?alert("Input nama petugas assesment (WBP)!"):""==l&&""==L?alert("Salah satu tanggal pengukuran harus diinput!"):""!=l&&""==s?alert("Hasil ukur tegangan LWBP belum diinput!"):""!=s&&""==l?alert("Tanggal ukur LWBP belum diinput!"):""!=L&&""==S?alert("Hasil ukur tegangan WBP belum diinput!"):""!=S&&""==L?alert("Tanggal ukur WBP belum diinput!"):""!=l&&s>240?alert("Tegangan LWBP melebihi ambang batas!"):""!=L&&S>240?alert("Tegangan WBP melebihi ambang batas!"):""!=l&&s<160?alert("Tegangan LWBP kurang dari ambang batas!"):""!=L&&S<160?alert("Tegangan WBP kurang dari ambang batas!"):""!=s&&""==t&&""==n&&""==r?alert("Arus incoming LWBP harus diisi!"):""!=S&&""==I&&""==A&&""==y?alert("Arus incoming WBP harus diisi!"):1==aa&&t>0&&n>0&&r>0?alert("Input incoming LWBP gagal. Trafo 1 fasa, silakan isi 2 fasa saja!"):1==aa&&I>0&&A>0&&y>0?alert("Input incoming WBP gagal. Trafo 1 fasa, silakan isi 2 fasa saja!"):Z<=0?alert("Cek master data trafo, kapasitas trafo tidak valid!"):oa>=l?alert("Tanggal pengukuran tidak maju (LWBP), Anda tidak perlu mengupdate data!"):ca>=L?alert("Tanggal pengukuran tidak maju (WBP), Anda tidak perlu mengupdate data!"):ka!=ba?alert("Sesi tidak valid!"):$.post("../ajax/addt1a.php",{kodegd:a,ptgs1:i,tgl1:l,ir1:t,is1:n,it1:r,in1:e,vln1:s,pf1:v,ira1:g,isa1:d,ita1:u,ina1:p,irb1:m,isb1:k,itb1:b,inb1:o,irc1:c,isc1:f,itc1:h,inc1:B,ird1:P,isd1:W,itd1:j,ind1:T,ptgs2:_,tgl2:L,ir2:I,is2:A,it2:y,in2:H,vln2:S,pf2:x,ira2:C,isa2:D,ita2:q,ina2:w,irb2:z,isb2:E,itb2:F,inb2:G,irc2:J,isc2:K,itc2:M,inc2:N,ird2:O,isd2:Q,itd2:R,ind2:U,alamat:V,feeder:X,ufeeder:Y,kapasitas:Z,fasa:aa,merek:ia,noseri:la,thntrafo:ta,lat:na,lng:ra,minyak:ea,konstruksi:sa,vector:va,imp:$a,jlh_jur:ga,jlh_tap:da,pos_tap:ua,tgl_psg:pa,ket:ma},function(a,i){$("#modInTier1a").modal("hide"),alert("Data berhasil disimpan!"),location.href="../tier1"})}	

//28. Kirim Tier 1b
function addt1b(){var a=$("#kodegd").val(),l=$("#ptgs").val(),e=$("#tgl").val(),t=$("input[name=oil]:checked").val(),v=$("input[name=fisik]:checked").val(),i=$("input[name=phb]:checked").val(),n=$("#netral").val(),r=$("#body").val(),p=$("#la").val(),s=$("#alamat").val(),d=$("#feeder").val(),k=$("#ufeeder").val(),o=$("#kapasitas").val(),m=$("#fasa").val(),h=$("#merek").val(),f=$("#noseri").val(),g=$("#thntrafo").val(),c=$("#lat").val(),u=$("#lng").val(),b=$("#minyak").val(),_=$("#konstruksi").val(),j=$("#vector").val(),y=$("#imp").val(),x=$("#jlh_jur").val(),D=$("#jlh_tap").val(),I=$("#pos_tap").val(),T=$("#tgl_psg").val(),q=$("#ket").val(),tgl_lama=$("#tgl_lama").val(); tgl_lama >= e ? alert("Tanggal assesment tidak maju, Anda tidak perlu mengupdate data!"):""== n||""== r||""== p?alert("Nilai pentanahan tidak boleh kosong!"):isNaN(n)?alert("Nilai pentanahan [Netral] harus angka!"):isNaN(r)?alert("Nilai pentanahan [Body] harus angka!"):isNaN(p)?alert("Nilai pentanahan [LA] harus angka!") : !t||!v||!i?alert("Belum semua check list dipilih!") : $.post("../ajax/addt1b.php",{kodegd:a,ptgs:l,tgl:e,oil:t,fisik:v,phb:i,netral:n,body:r,la:p,alamat:s,feeder:d,ufeeder:k,kapasitas:o,fasa:m,merek:h,noseri:f,thntrafo:g,lat:c,lng:u,minyak:b,konstruksi:_,vector:j,imp:y,jlh_jur:x,jlh_tap:D,pos_tap:I,tgl_psg:T,ket:q},function(a,l){$("#modInTier1b").modal("hide"),alert("Data berhasil disimpan!"),location.href="../tier1"})}

//29. Kirim Tier 2a
function addt2a(){var a=$("#kodegd").val(),l=$("#ptgs").val(),t=$("#tgl").val(),e=$("input[name=oil]:checked").val(),v=$("#bdv").val(),i=$("#alamat").val(),r=$("#feeder").val(),s=$("#ufeeder").val(),n=$("#kapasitas").val(),o=$("#fasa").val(),d=$("#merek").val(),p=$("#noseri").val(),k=$("#thntrafo").val(),m=$("#lat").val(),g=$("#lng").val(),f=$("#minyak").val(),h=$("#konstruksi").val(),u=$("#vector").val(),_=$("#imp").val(),c=$("#jlh_jur").val(),j=$("#jlh_tap").val(),b=$("#pos_tap").val(),y=$("#tgl_psg").val(),x=$("#ket").val(),tgl_lama=$("#tgl_lama").val(); tgl_lama >= t ? alert("Tanggal assesment tidak maju, Anda tidak perlu mengupdate data!") : !e?alert("Check list belum dipilih!") :""== v?alert("Nilai BdV tidak boleh kosong!"):isNaN(v)?alert("Nilai BdV harus angka!"): $.post("../ajax/addt2a.php",{kodegd:a,ptgs:l,tgl:t,oil:e,bdv:v,alamat:i,feeder:r,ufeeder:s,kapasitas:n,fasa:o,merek:d,noseri:p,thntrafo:k,lat:m,lng:g,minyak:f,konstruksi:h,vector:u,imp:_,jlh_jur:c,jlh_tap:j,pos_tap:b,tgl_psg:y,ket:x},function(a,l){$("#modInTier2a").modal("hide"),alert("Data berhasil disimpan!"),location.href="../tier2"})}

//30. Kirim Tier 2b
function addt2b(){var a=$("#kodegd").val(),l=$("#ptgs").val(),t=$("#tgl_b").val(),o=$("#amb").val(),v=$("#incfco").val(),e=$("#outfco").val(),s=$("#bodyt").val(),n=$("#bushtm").val(),r=$("#bushtr").val(),i=$("#opsinc").val(),p=$("#opsout").val(),d=$("#ntholder").val(),u=$("#skun").val(),h=$("#conn").val(),k=$("#alamat").val(),c=$("#feeder").val(),f=$("#ufeeder").val(),m=$("#kapasitas").val(),b=$("#fasa").val(),g=$("#merek").val(),_=$("#noseri").val(),j=$("#thntrafo").val(),y=$("#lat").val(),x=$("#lng").val(),D=$("#minyak").val(),I=$("#konstruksi").val(),T=$("#vector").val(),q=$("#imp").val(),w=$("#jlh_jur").val(),z=$("#jlh_tap").val(),A=$("#pos_tap").val(),B=$("#tgl_psg").val(),C=$("#ket").val(),tgl_lama=$("#tgl_lama").val(); tgl_lama >= t ? alert("Tanggal assesment tidak maju, Anda tidak perlu mengupdate data!") :""== l?alert("Isi nama petugas terlebih dahulu!"):""== o?alert("Nilai suhu lingkungan/ambient tidak boleh kosong!"):isNaN(o)?alert("Nilai suhu lingkungan/ambient harus angka!"): $.post("../ajax/addt2b.php",{kodegd:a,ptgs:l,tgl:t,amb:o,incfco:v,outfco:e,bodyt:s,bushtm:n,bushtr:r,opsinc:i,opsout:p,ntholder:d,skun:u,conn:h,alamat:k,feeder:c,ufeeder:f,kapasitas:m,fasa:b,merek:g,noseri:_,thntrafo:j,lat:y,lng:x,minyak:D,konstruksi:I,vector:T,imp:q,jlh_jur:w,jlh_tap:z,pos_tap:A,tgl_psg:B,ket:C},function(a,l){$("#modInTier2b").modal("hide"),alert("Data berhasil disimpan!"),location.href="../tier2/index.php"})}


//31. Kirim Tier 3a
function addt3a(){var a=$("#kodegd").val(),t=$("#ptgs").val(),l=$("#tgl").val(),p=$("#tap1a").val(),v=$("#tap1b").val(),e=$("#tap1c").val(),r=$("#tap2a").val(),s=$("#tap2b").val(),i=$("#tap2c").val(),o=$("#tap3a").val(),n=$("#tap3b").val(),d=$("#tap3c").val(),c=$("#tap4a").val(),k=$("#tap4b").val(),g=$("#tap4c").val(),b=$("#tap5a").val(),f=$("#tap5b").val(),h=$("#tap5c").val(),m=$("#alamat").val(),u=$("#feeder").val(),_=$("#ufeeder").val(),j=$("#kapasitas").val(),x=$("#fasa").val(),y=$("#merek").val(),D=$("#noseri").val(),I=$("#thntrafo").val(),T=$("#lat").val(),q=$("#lng").val(),w=$("#minyak").val(),z=$("#konstruksi").val(),A=$("#vector").val(),B=$("#imp").val(),C=$("#jlh_jur").val(),E=$("#jlh_tap").val(),F=$("#pos_tap").val(),G=$("#tgl_psg").val(),H=$("#ket").val(),tgl_lama=$("#tgl_lama").val(); tgl_lama >= l ? alert("Tanggal assesment tidak maju, Anda tidak perlu mengupdate data!")
:""== b?alert("Nilai tidak boleh kosong!"):isNaN(b)?alert("Nilai harus angka!")
:""== f?alert("Nilai tidak boleh kosong!"):isNaN(f)?alert("Nilai harus angka!")
:""== h?alert("Nilai tidak boleh kosong!"):isNaN(h)?alert("Nilai harus angka!")
:'3'!=x || '5'!=E?alert("Untuk sementara assesment ini hanya dapat dilakukan pada trafo 3 fasa dengan 5 tap!")
:$.post("../ajax/addt3a.php",{kodegd:a,ptgs:t,tgl:l,tap1a:p,tap1b:v,tap1c:e,tap2a:r,tap2b:s,tap2c:i,tap3a:o,tap3b:n,tap3c:d,tap4a:c,tap4b:k,tap4c:g,tap5a:b,tap5b:f,tap5c:h,alamat:m,feeder:u,ufeeder:_,kapasitas:j,fasa:x,merek:y,noseri:D,thntrafo:I,lat:T,lng:q,minyak:w,konstruksi:z,vector:A,imp:B,jlh_jur:C,jlh_tap:E,pos_tap:F,tgl_psg:G,ket:H},function(a,t){$("#modInTier3a").modal("hide"),alert("Data berhasil disimpan!"),location.href="../tier3/index.php"})}

//32. Kirim Tier 3b
function addt3b(){var a=$("#kodegd").val(),l=$("#ptgs").val(),s=$("#tgl_b").val(),p=$("#pb1").val(),v=$("#pb2").val(),t=$("#pb3").val(),e=$("#sb1").val(),r=$("#sb2").val(),i=$("#sb3").val(),o=$("#pp1").val(),n=$("#pp2").val(),d=$("#pp3").val(),b=$("#ps1").val(),k=$("#ps2").val(),g=$("#ps3").val(),f=$("#ss1").val(),h=$("#ss2").val(),m=$("#ss3").val(),u=$("#ss4").val(),_=$("#ss5").val(),j=$("#ss6").val(),c=$("#alamat").val(),x=$("#feeder").val(),y=$("#ufeeder").val(),D=$("#kapasitas").val(),I=$("#fasa").val(),T=$("#merek").val(),q=$("#noseri").val(),w=$("#thntrafo").val(),z=$("#lat").val(),A=$("#lng").val(),B=$("#minyak").val(),C=$("#konstruksi").val(),E=$("#vector").val(),F=$("#imp").val(),G=$("#jlh_jur").val(),H=$("#jlh_tap").val(),J=$("#pos_tap").val(),K=$("#tgl_psg").val(),L=$("#ket").val(),tgl_lama=$("#tgl_lama").val(); tgl_lama >= s ? alert("Tanggal assesment tidak maju, Anda tidak perlu mengupdate data!"):
""== f?alert("Nilai tidak boleh kosong!"):isNaN(f)?alert("Nilai harus angka!")
:""== h?alert("Nilai tidak boleh kosong!"):isNaN(h)?alert("Nilai harus angka!")
:""== m?alert("Nilai tidak boleh kosong!"):isNaN(m)?alert("Nilai harus angka!")
:""== u?alert("Nilai tidak boleh kosong!"):isNaN(u)?alert("Nilai harus angka!")
:""== _?alert("Nilai tidak boleh kosong!"):isNaN(_)?alert("Nilai harus angka!")
:""== j?alert("Nilai tidak boleh kosong!"):isNaN(j)?alert("Nilai harus angka!")
:$.post("../ajax/addt3b.php",{kodegd:a,ptgs:l,tgl:s,pb1:p,pb2:v,pb3:t,sb1:e,sb2:r,sb3:i,pp1:o,pp2:n,pp3:d,ps1:b,ps2:k,ps3:g,ss1:f,ss2:h,ss3:m,ss4:u,ss5:_,ss6:j,alamat:c,feeder:x,ufeeder:y,kapasitas:D,fasa:I,merek:T,noseri:q,thntrafo:w,lat:z,lng:A,minyak:B,konstruksi:C,vector:E,imp:F,jlh_jur:G,jlh_tap:H,pos_tap:J,tgl_psg:K,ket:L},function(a,l){$("#modInTier3b").modal("hide"),alert("Data berhasil disimpan!"),location.href="../tier3/index.php"})}

//33. Kirim Tier 3c
function addt3c(){var a=$("#kodegd").val(),l=$("#ptgs").val(),t=$("#tgl_c").val(),e=$("#p1").val(),v=$("#p2").val(),s=$("#p3").val(),p=$("#s1").val(),r=$("#s2").val(),i=$("#s3").val(),o=$("#alamat").val(),n=$("#feeder").val(),d=$("#ufeeder").val(),k=$("#kapasitas").val(),g=$("#fasa").val(),f=$("#merek").val(),h=$("#noseri").val(),m=$("#thntrafo").val(),c=$("#lat").val(),u=$("#lng").val(),_=$("#minyak").val(),j=$("#konstruksi").val(),x=$("#vector").val(),y=$("#imp").val(),b=$("#jlh_jur").val(),D=$("#jlh_tap").val(),I=$("#pos_tap").val(),T=$("#tgl_psg").val(),q=$("#ket").val(),tgl_lama=$("#tgl_lama").val(); tgl_lama >= t ? alert("Tanggal assesment tidak maju, Anda tidak perlu mengupdate data!"):
""== p?alert("Nilai tidak boleh kosong!"):isNaN(p)?alert("Nilai harus angka!")
:""== r?alert("Nilai tidak boleh kosong!"):isNaN(r)?alert("Nilai harus angka!")
:""== i?alert("Nilai tidak boleh kosong!"):isNaN(i)?alert("Nilai harus angka!")
:$.post("../ajax/addt3c.php",{kodegd:a,ptgs:l,tgl:t,p1:e,p2:v,p3:s,s1:p,s2:r,s3:i,alamat:o,feeder:n,ufeeder:d,kapasitas:k,fasa:g,merek:f,noseri:h,thntrafo:m,lat:c,lng:u,minyak:_,konstruksi:j,vector:x,imp:y,jlh_jur:b,jlh_tap:D,pos_tap:I,tgl_psg:T,ket:q},function(a,l){$("#modInTier3c").modal("hide"),alert("Data berhasil disimpan!"),location.href="../tier3/index.php"})}

//34.Detail HI Tier 1a
		$(document).ready(function(){
        $('#modDet1a').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/hi1/det1a.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.det1a-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		
//35.Detail HI Tier 1b
		$(document).ready(function(){
        $('#modDet1b').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/hi1/det1b.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.det1b-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	
	//36.Detail HI Tier 2a
		$(document).ready(function(){
        $('#modDet2').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/hi2/det2a.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.det2-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		
	
	//36.Detail HI Tier 2b
		$(document).ready(function(){
        $('#modDet2b').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/hi2/det2b.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.det2b-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

	//37.Detail HI Tier 3a
		$(document).ready(function(){
        $('#modDet3a').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/hi3/det3a.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.det3a-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		
	
	//38.Detail HI Tier 3b
		$(document).ready(function(){
        $('#modDet3b').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/hi3/det3b.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.det3b-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		
	
		//39.Detail HI Tier 3c
		$(document).ready(function(){
        $('#modDet3c').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/hi3/det3c.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.det3c-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
			//40. Dashboard Kondisi Kurang
		$(document).ready(function(){
        $('#modDetailGardu').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'query/qdepandetailgardu.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.detailgardu-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	
	
	
	
	
	
	
	
	
	
	
				//42. Dashboard Kondisi Kurang
		$(document).ready(function(){
        $('#modTua').on('show.bs.modal', function (e) {
            var idgardu = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'query/qdepankubikeltua.php',
                data :  'idgardu='+ idgardu,
                success : function(data){
                $('.kubikeltua-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	//43. Find HI Tier 1
		$(document).ready(function(){
        $('#findHI1').on('show.bs.modal', function (e) {
			var e =$("#asst1").find(":selected").val();  a=$("#tier2").find(":selected").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qfindHI1.php',
                data : {ass: e, hi: a},
                success : function(data){
                $('.carihi1-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	

	//44. Find Jadwal Tier 1
		$(document).ready(function(){
        $('#findAss1').on('show.bs.modal', function (e) {
			var e =$("input[name=tier2a]:checked").val(), a=$("#bln").val();
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qfindAss1.php',
                data : {ass: e, bulan: a},
                success : function(data){
                $('.carijad1-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		






	
	//45. Find HI Tier 2
		$(document).ready(function(){
        $('#findHI2').on('show.bs.modal', function (e) {
			var e =$("input[name=tier2]:checked").val(), a=$("#tier2").find(":selected").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qfindHI2.php',
                data : {ass: e, hi: a},
                success : function(data){
                $('.carihi2-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	//45a. View Pemadaman
		$(document).ready(function(){
        $('#viewggn').on('show.bs.modal', function (e) {
			var a =$("#UP3").find(":selected").val(), b=$("#ULP").find(":selected").val(),c=$("#awal").val(), d=$("#akhir").val(),
			e=$("#detail").find(":selected").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qEISPadam.php',
                data : {UP3: a, ULP: b, awal: c, akhir: d, detail: e},
                success : function(data){
                $('.cariggn-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
		//45a. View Beban
		$(document).ready(function(){
        $('#viewload').on('show.bs.modal', function (e) {
			var a =$("#UP3").find(":selected").val(), b=$("#ULP").find(":selected").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qEISBebanFeeder.php',
                data : {UP3: a, ULP: b},
                success : function(data){
                $('.load-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	//45b. View FGTM
	$(document).ready(function(){
        $('#viewfgtm1').on('show.bs.modal', function (e) {
			var a =$("#UP32").find(":selected").val(), b=$("#ULP2").find(":selected").val(), c=$("#bulan").find(":selected").val(), d=$("#tahun").find(":selected").val(),  e=$("#fgtm").find(":selected").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qFGTM.php',
                data : {UP3: a, ULP: b, bulan: c, tahun: d, fgtm: e},
                success : function(data){
                $('.carifgtm-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	




$(document).ready(function(){
        $('#detailfgtm').on('show.bs.modal', function (e) {
			var a =$("#UP35").find(":selected").val(), b=$("#ULP5").find(":selected").val(), c=$("#bulanz").find(":selected").val(), d=$("#tahunz").find(":selected").val(),  e=$("#fgtmz").find(":selected").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qdetFGTM.php',
                data : {UP3: a, ULP: b, bulan: c, tahun: d, fgtm: e},
                success : function(data){
                $('.detailfgtm-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	


	//45c. View FGTM Grafik
		$(document).ready(function(){
        $('#viewfgtm').on('show.bs.modal', function (e) {
			var a =$("#UP32").find(":selected").val(), b=$("#ULP2").find(":selected").val(), c=$("#bulan").find(":selected").val(), d=$("#tahun").find(":selected").val(), e=$("#jenispadam").find(":selected").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qFGTM1.php',
                data : {UP3: a, ULP: b, bulan: c, tahun: d, jenispadam: e},
                success : function(data){
                $('.carifgtm-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	
			$(document).ready(function(){
        $('#viewbbnfdr').on('show.bs.modal', function (e) {
			var a =$("#UP33").find(":selected").val(), b=$("#ULP3").find(":selected").val(), c=$("#bulan2").find(":selected").val(), d=$("#tahun2").find(":selected").val(),  e=$("#bbnfdr").find(":selected").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qviewbbnfdr.php',
                data : {UP3: a, ULP: b, bulan: c, tahun: d, bbnfdr: e},
                success : function(data){
                $('.caribbnfdr-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	

	
	
	

	//46. Find Jadwal Tier 2
		$(document).ready(function(){
        $('#findAss2').on('show.bs.modal', function (e) {
			var e =$("input[name=tier2a]:checked").val(), a=$("#bln").val();
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qfindAss2.php',
                data : {ass: e, bulan: a},
                success : function(data){
                $('.carijad2-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		
	
	
	
		$(document).ready(function(){
        $('#viewrekammedis').on('show.bs.modal', function (e) {
			var a =$("#UP34").find(":selected").val(), b=$("#ULP4").find(":selected").val(), c=$("#bulanx").find(":selected").val(), d=$("#tahunx").find(":selected").val(), e=$("#detailx").find(":selected").val(),  f=$("#opsi").find(":selected").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qRekamMedis.php',
                data : {UP3: a, ULP: b, bulan: c, tahun: d, detail:e, opsi:f},
                success : function(data){
                $('.viewrekammedis-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
	

	//47. Find Nilai
		$(document).ready(function(){
        $('#carinilait1').on('show.bs.modal', function (e) {
			var e =$("#item").find(":selected").val();  a=$("#tanda").find(":selected").val(); x=$("#nilai").val();
			
           //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qcarinilait1.php',
                data : {item: e, tanda: a, nilai: x},
                success : function(data){
                $('.carinilait1-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		



	//48. Input Data Tier 1 TM - ROW
    $(document).ready(function(){
        $('#modRow').on('show.bs.modal', function (e) {
            var idjtm = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'..//query/qITt1_row.php',
                data :  'idjtm='+ idjtm,
                success : function(data){
                $('.lihatrow-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });		
	
	//49. Kirim Tier 1 TM - ROW
function addtrow(){var a=$("#nama").val(),l=$("#ptgs").val(),o=$("#kms_row").val(),lokasi=$("#lokasi").val(),type=$("#type").val(),kms=$("#kms").val(), t=$("#tgl_row").val(),parentid=$("#parentid").val(),level=$("#level").val(),tgl_lama=$("#tgl_lama").val(); tgl_lama >= t ? alert("Tanggal assesment tidak maju, Anda tidak perlu mengupdate data!") :""== l?alert("Isi nama petugas terlebih dahulu!"):o>kms?alert("Nilai kms row melebihi aset!"):""== o?alert("Nilai kms tidak boleh kosong!"):o<=0?alert("Nilai kms tidak valid!"):isNaN(o)?alert("Nilai kms harus angka!"): $.post("../ajax/addtrow.php",{nama:a,ptgs:l,lokasi:lokasi,type:type,kms:kms,kms_row:o,tgl_row:t,parentid:parentid,level:level},function(a,l){$("#modRow").modal("hide"),alert("Data berhasil disimpan!"),location.href="../tier1/index.php"})}



	//50. Entry Data Ggn	
	$(document).ready(function(){
        $('#entryPdm').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
			var tipe = JSON.stringify(1);
			
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qEntryPadam.php',
				data :  {NO:NO}, 
                success : function(data){
                $('.entryPdm-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	//51. Entry Data Emergency	
	$(document).ready(function(){
        $('#entryEme').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
			var tipe = JSON.stringify(1);
			
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qEntryEmergency.php',
				data :  {NO:NO}, 
                success : function(data){
                $('.entryEme-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	
	//51. Entry Data Pemeliharaan	
	$(document).ready(function(){
        $('#entryHar').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
			var tipe = JSON.stringify(1);
			
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qEntryHar.php',
				data :  {NO:NO}, 
                success : function(data){
                $('.entryHar-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
	
	
	
	
	$(document).ready(function(){
        $('#tlpadam').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            var status1 = $(e.relatedTarget).data('value');			
			var tipe = JSON.stringify(1);
			
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qTLPadam.php',
				data :  {NO:NO, status1:status1}, 
                success : function(data){
                $('.tlpadam-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
		$(document).ready(function(){
        $('#tleme').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            var status1 = $(e.relatedTarget).data('value');			
			var tipe = JSON.stringify(1);
			
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qTLEme.php',
				data :  {NO:NO, status1:status1}, 
                success : function(data){
                $('.tleme-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

	$(document).ready(function(){
        $('#tlhar').on('show.bs.modal', function (e) {
            var NO = $(e.relatedTarget).data('id');
            var status1 = $(e.relatedTarget).data('value');			
			var tipe = JSON.stringify(1);
			
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 	'../query/qTLHar.php',
				data :  {NO:NO, status1:status1}, 
                success : function(data){
                $('.tlhar-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });	
	
   //51. Bukan Modal
    $("#UP3").change(function(){
   
        var id_UP3 = $("#UP3").val();
       
        $("#imgLoad").show("");
       
        $.ajax({
            type: "POST",
            dataType: "html",
            url: '..//welcome/rp/get_up3.php',
            data: "up3="+id_UP3,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data');
                }
               
                else{
                    $("#ULP").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });

   //51b. Bukan Modal
$(document).ready(function() {
  
    $('#belum').DataTable( {
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

