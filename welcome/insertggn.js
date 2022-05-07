function InsertPadam() {

var conf = confirm("Apakah Anda akan menyimpan data?");
    if (conf == true) {
    // get values
   var a=$("#tanggalpadam").val(),
b=$("#jampadam").val(),
c=$("#tanggalpulih").val(),
d=$("#jampulih").val(),
e=$("#indikasi").val(),
f=$("#arusggn").val(),
g=$("#arusbeban").val(),
h=$("#fgtm").val(),
i=$("#lat").val(),
j=$("#lon").val(),
k=$("#detail").val(),
l=$("#feeder").val(),
m=$("#up3").val(),
n=$("#idup3").val(),
o=$("#ulp").val(),
p=$("#idulp").val(),
q=$("#gigh").val();


	if (<?php echo $id ; ?>==<?php echo  $id ; ?>) {
    // Update the details by requesting to the server using ajax
    $.post("../ajax/insertGgn.php", {
            NO:<?php echo json_encode($NO);?>,
tanggalpadam:a,
jampadam:b,
tanggalpulih:c,
jampulih:d,
indikasi:e,
arusggn:f,
arusbeban:g,
fgtm:h,
lat:i,
lon:j,
detail:k,
feeder: l,
up3: m,
idup3: n,
ulp:o,
idulp:p,
gigh:q,
jenispadam: '2'
			},
        function (data, status) {
            // hide modal popup
            $("#entryGgn").modal("hide");
		alert('Data berhasil disimpan!');
		location.href='../padam/index.php'
        }
    );

}
else {
alert('!');
}

}

}