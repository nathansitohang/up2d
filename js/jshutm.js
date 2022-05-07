
    var iconBlue = new GIcon();
    iconBlue.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=0288D1,ff000000';
    iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconBlue.iconSize = new GSize(18,18);
    iconBlue.shadowSize = new GSize(22, 20);
    iconBlue.iconAnchor = new GPoint(6, 20);
    iconBlue.infoWindowAnchor = new GPoint(5, 1);

    var iconRed = new GIcon();
    iconRed.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=FF5252,ff000000';
    iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconRed.iconSize = new GSize(18, 18);
    iconRed.shadowSize = new GSize(22, 20);
    iconRed.iconAnchor = new GPoint(6, 20);
    iconRed.infoWindowAnchor = new GPoint(5, 1);
	
	var iconGreen= new GIcon();
    iconGreen.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=7CB342,ff000000';
    iconGreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconGreen.iconSize = new GSize(18, 18);
    iconGreen.shadowSize = new GSize(22, 20);
    iconGreen.iconAnchor = new GPoint(6, 20);
    iconGreen.infoWindowAnchor = new GPoint(5, 1);	
	
	var iconBlack= new GIcon();
    iconBlack.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=000000,ff000000';
    iconBlack.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconBlack.iconSize = new GSize(18, 18);
    iconBlack.shadowSize = new GSize(22, 20);
    iconBlack.iconAnchor = new GPoint(6, 20);
    iconBlack.infoWindowAnchor = new GPoint(5, 1);

    var customIcons = [];
    customIcons["RN2"] = iconBlue;
	customIcons["DM1/RN2"] = iconBlack;
    customIcons["DM2/RN2"] = iconGreen;
	customIcons["DM3/RN2"] = iconRed;
	
	
    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(3.33442, 99.01447000000000), 10);

        GDownloadUrl("../hutmxml.php", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < 1000; i++) {
		  var id_jtm = markers[i].getAttribute("id_jtm");
            var peralatan = markers[i].getAttribute("peralatan");
            var struktur = markers[i].getAttribute("struktur");
            var feeder = markers[i].getAttribute("feeder");
			var crossarm = markers[i].getAttribute("crossarm");
			var konstruksi = markers[i].getAttribute("konstruksi");
			var lpju = markers[i].getAttribute("lpju");
			var size_tm = markers[i].getAttribute("size_tm");
			var size_jtr = markers[i].getAttribute("size_jtr");
			var jlh_sr = markers[i].getAttribute("jlh_sr");
			var keterangan = markers[i].getAttribute("keterangan");
			var lat = markers[i].getAttribute("lat");
			var lng = markers[i].getAttribute("lng");
			
			  
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
            var marker = createMarker(point, id_jtm, peralatan, struktur, feeder, crossarm, konstruksi,lpju,size_tm,size_jtr,jlh_sr,keterangan,lat,lng);
            map.addOverlay(marker);
          }
        });
} 		
   
    function createMarker(point, id_jtm, peralatan, struktur, feeder, crossarm,konstruksi,lpju, size_tm,size_jtr,jlh_sr,keterangan,lat,lng) {
      var marker = new GMarker(point, customIcons[feeder]);
      var html = " <table><tr><td colspan=3>" + " <center><b>" + peralatan + " </b> </center/></a></td></tr>" 
	  + "<tr><td><b> Struktur </b></td><td>:</td>"+ "<td>"+ struktur +"</td></tr>"
	  + "<tr><td><b> Konstruksi </b></td><td>:</td>"+ "<td>"+ konstruksi +"</td></tr>"
	  	  + "<tr><td><b> Cross Arm </b></td><td>:</td>"+ "<td>"+ crossarm +"</td></tr>"
	  + "<tr><td><b> Feeder </b> </td><td>: </td><td>"+ feeder +"</td>"+"</tr>"
	  + "<tr><td><b> Ukuran TM </b> </td><td>: </td><td>"+ size_tm +"</td>"+"</tr>"
	  + "<tr><td><b> Ukuran TR </b> </td><td>: </td><td>"+ size_jtr +"</td>"+"</tr>"
	  + "<tr><td><b> Tarikan SR</b> </td><td>: </td><td>"+ jlh_sr+"</td>"+"</tr>"
	  + "<tr><td><b> LPJU</b> </td><td>: </td><td>"+ lpju+"</td>"+"</tr>"
	  + "<tr><td><b> Keterangan</b> </td><td>: </td><td>"+ keterangan+"</td>"+"</tr>"
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


