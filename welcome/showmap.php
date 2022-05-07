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
		#map 
		{
			height: 100%;
			width: 100%;
			margin: 0 auto 0 auto;
		}
		html, body 
		{
			height: 100%;
		}
		</style>
	</head>
	<body>
    <div id="map"></div>
    <script>
    function initMap() 
	{
		downloadUrl('..//..//gigh.php', function(data) 
		{
			var xml = data.responseXML;
			var markers = xml.documentElement.getElementsByTagName('marker');
			Array.prototype.forEach.call(markers, function(markerElem) 
			{
				var namagardu = markerElem.getAttribute('gardu');
				var alamat = markerElem.getAttribute('alamat');
				var scada = markerElem.getAttribute('scada');
				var aset = markerElem.getAttribute('aset');
				var point = new google.maps.LatLng(
					  parseFloat(markerElem.getAttribute('lat')),
					  parseFloat(markerElem.getAttribute('lng')));
				if	(aset==2)
				{
					var image = 
					{
						url: 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=FF5252,ff000000',
						scaledSize: { width: 25, height: 25 }
					};
				}
				else 
				{
					var image = 
					{
						url: 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=7CB342,ff000000',
						scaledSize: { width: 25, height: 25 }
					} ;
				}
				var infowincontent = document.createElement('div');
				var strong = document.createElement('strong');
					strong.textContent = namagardu
					infowincontent.appendChild(strong);
					infowincontent.appendChild(document.createElement('br'));
				var text = document.createElement('text');
					text.textContent = alamat 
					infowincontent.appendChild(text);
				var marker = new google.maps.Marker(
				{
					map: map,
					position: point,
					icon: image
				});       
					marker.addListener('click', function() 
					{
						infoWindow.setContent(infowincontent);
						infoWindow.open(map, marker);
					});
			});
        });
		  
			var latunit = <?php echo $login_lat; ?>;
			var lonunit = <?php echo $login_lng; ?>;
		  	var map = new google.maps.Map(document.getElementById('map'), 
			{
				center: new google.maps.LatLng(latunit, lonunit),
				zoom: 9
			});
			var infoWindow = new google.maps.InfoWindow;
    }

    function downloadUrl(url, callback) 
	{
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
			request.onreadystatechange = function() 
			{
				if (request.readyState == 4) 
				{
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