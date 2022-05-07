<?php
   include('../session.php');
   include('../config.php');
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>      
      #map2 {
        height: 100%;
        width: 100%;
         margin: 0 auto 0 auto;
      }
      html, body {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map2"></div>

     <script>
	 


        function initMap() {
			
			
        

          downloadUrl('..//..//kpxml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');

            Array.prototype.forEach.call(markers, function(markerElem) {
              var nomor = markerElem.getAttribute('nomor');
              var idup3 = markerElem.getAttribute('idup3');
			  var idulp1 = markerElem.getAttribute('idulp1');
			  var section = markerElem.getAttribute('section');
			  var penyulang = markerElem.getAttribute('penyulang');
			  var jenis = markerElem.getAttribute('jenis');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
			  var scaledSize = { width: 20, height: 30 };
			  
			  
			  if (jenis.includes('LBS')){
			  var warna = 'e3c7c5';
			  var jenis = 'L';}
			  else {
			  var warna = 'd94136';
			  var jenis ='R';}			  
			  
			  
		

			  
			  
			  
				
			if	(idup3.includes('12000')){
			  var image = {
					url: 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=1.1|0|'+warna+'|25|b|'+jenis,
					scaledSize: scaledSize
			 } ;}
			 
			 
			 else if(idup3.includes('128')){
			  var image = {
					url: 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=1.1|0|'+warna+'|25|b|'+jenis,
					scaledSize: scaledSize
			 } ;}
			 
			 
			else if(idup3.includes('122')){
			  var image = {
					url: 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=1.1|0|'+warna+'|25|b|'+jenis,
					scaledSize: scaledSize
			 } ;}			 
			 
			 
			 else if(idup3.includes('129')){
			  var image = {
					url: 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=1.1|0|'+warna+'|25|b|'+jenis,
					scaledSize: scaledSize
			 } ;}
			 
			 else if(idup3.includes('121')){
			  var image = {
					url: 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=1.1|0|'+warna+'|25|b|'+jenis,
					scaledSize: scaledSize
			 } ;}
			 
			 
			  else if(idup3.includes('123')){
			  var image = {
					url: 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=1.1|0|'+warna+'|25|b|'+jenis,
					scaledSize: scaledSize
			 } ;}
			 
			 			 		 		 
			else if(idup3.includes('125')){
			  var image = {
					url: 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=1.1|0|'+warna+'|25|b|'+jenis,
					scaledSize: scaledSize
			 } ;}
			 
			 else {
			  var image = {
					url: 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=1.1|0|'+warna+'|25|b|'+jenis,
					scaledSize: scaledSize
			 } ;}
	
	

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = nomor
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
			  
			  
			  

              var text = document.createElement('text');
              text.textContent = section+penyulang 
              infowincontent.appendChild(text);
			  

              var marker = new google.maps.Marker({
                map: map,
                position: point,
				icon : image
              });
              
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
		  
		  var latunit = <?php echo $login_lat; ?>;
		  var lonunit = <?php echo $login_lng; ?>;
		  
		  var map = new google.maps.Map(document.getElementById('map2'), {
          center: new google.maps.LatLng(latunit,lonunit),
          zoom: 10
        });
        var infoWindow = new google.maps.InfoWindow;
        }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };
        request.open('GET', url, true);
        request.send(null);
      }
      function doNothing() {}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_KyYUXRnKEFDo3Yb1SaH6U2ZTLdnQSrg&callback=initMap"
    async defer></script>
  </body>
</html>