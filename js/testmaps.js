
    var iconBlue = new google.maps.Icon();
    iconBlue.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=0288D1,ff000000';
    iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconBlue.iconSize = new google.maps.Size(18,18);
    iconBlue.shadowSize = new google.maps.Size(22, 20);
    iconBlue.iconAnchor = new google.maps.Point(6, 20);
    iconBlue.infoWindowAnchor = new google.maps.Point(5, 1);

    var iconRed = new google.maps.Icon();
    iconRed.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=FF5252,ff000000';
    iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconRed.iconSize = new google.maps.Size(18, 18);
    iconRed.shadowSize = new google.maps.Size(22, 20);
    iconRed.iconAnchor = new google.maps.Point(6, 20);
    iconRed.infoWindowAnchor = new google.maps.Point(5, 1);
	
	var iconGreen= new google.maps.Icon();
    iconGreen.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=7CB342,ff000000';
    iconGreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconGreen.iconSize = new google.maps.Size(18, 18);
    iconGreen.shadowSize = new google.maps.Size(22, 20);
    iconGreen.iconAnchor = new google.maps.Point(6, 20);
    iconGreen.infoWindowAnchor = new google.maps.Point(5, 1);	
	
	var iconBlack= new google.maps.Icon();
    iconBlack.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=000000,ff000000';
    iconBlack.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconBlack.iconSize = new google.maps.Size(18, 18);
    iconBlack.shadowSize = new google.maps.Size(22, 20);
    iconBlack.iconAnchor = new google.maps.Point(6, 20);
    iconBlack.infoWindowAnchor = new google.maps.Point(5, 1);

    var customIcons = [];
    customIcons["RN2"] = iconBlue;
	customIcons["DM1/RN2"] = iconBlack;
    customIcons["DM2/RN2"] = iconGreen;
	customIcons["DM3/RN2"] = iconRed;
	
	
    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(3.33442, 99.01447000000000), 8);

        GDownloadUrl("../../garduxml.php", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
		  var idgardu = markers[i].getAttribute("idgardu");
            var kodegd = markers[i].getAttribute("kodegd");
            var alamat = markers[i].getAttribute("alamat");
            var feeder = markers[i].getAttribute("feeder");
			var ufeeder = markers[i].getAttribute("ufeeder");
			var kapasitas = markers[i].getAttribute("kapasitas");
			var fasa = markers[i].getAttribute("fasa");
			var merek = markers[i].getAttribute("merek");
			var noseri = markers[i].getAttribute("noseri");
			var lat = markers[i].getAttribute("lat");
			var lng = markers[i].getAttribute("lng");
			
			  
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
            var marker = createMarker(point, idgardu, kodegd, alamat, feeder,ufeeder, kapasitas, fasa,merek,noseri,lat,lng);
            map.addOverlay(marker);
          }
        });
} 		
   
    function createMarker(point, idgardu, kodegd, alamat, feeder,ufeeder, kapasitas,fasa,merek, noseri,lat,lng) {
      var marker = new GMarker(point, customIcons[feeder]);
      var html = " <table><tr><td colspan=3> <a href=#" + " <center><b>" + kodegd + " </b> </center/></a></td></tr>" 
	  + "<tr><td><b> Alamat </b></td><td>:</td>"+ "<td>"+ alamat +"</td></tr>"
	  + "<tr><td><b> Feeder </b> </td><td>: </td><td>"+ feeder +"-"+ufeeder+"</td>"+"</tr>"
	  + "<tr><td><b> Merk/kVA(fasa)</b></td><td> : </td><td>"+ merek +" - "+ kapasitas +" kVA ("+fasa+")"+"</td></tr>"
	  + "<tr><td><b> S/N</b></td><td> : </td><td>" + noseri + "</td></tr>" 
	  + "<tr><td><b> Koordinat </b></td><td>:</td><td>" + lat + ", " + lng + "</td></tr>"
	  + "<tr><td colspan=3><center>.::.</center></td></tr></table>"
	  

	
      GEvent.addListener(marker, 'click', function() {
        marker.openInfoWindowHtml(html);
		if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      });
      return marker;
		
  }
 }


