
    var iconBlue = new GIcon();
    iconBlue.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=0288D1,ff000000';
    iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconBlue.iconSize = new GSize(20,20);
    iconBlue.shadowSize = new GSize(22, 20);
    iconBlue.iconAnchor = new GPoint(6, 20);
    iconBlue.infoWindowAnchor = new GPoint(5, 1);
	
	var iconGreen= new GIcon();
    iconGreen.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=7CB342,ff000000';
    iconGreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconGreen.iconSize = new GSize(20,20);
    iconGreen.shadowSize = new GSize(22, 20);
    iconGreen.iconAnchor = new GPoint(6, 20);
    iconGreen.infoWindowAnchor = new GPoint(5, 1);	
	
	var iconYellow= new GIcon();
    iconYellow.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=FFFF00,ff000000';
    iconYellow.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconYellow.iconSize = new GSize(20,20);
    iconYellow.shadowSize = new GSize(22, 20);
    iconYellow.iconAnchor = new GPoint(6, 20);
    iconYellow.infoWindowAnchor = new GPoint(5, 1);		

	var iconRed = new GIcon();
    iconRed.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=FF5252,ff000000';
    iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconRed.iconSize = new GSize(20,20);
    iconRed.shadowSize = new GSize(22, 20);
    iconRed.iconAnchor = new GPoint(6, 20);
    iconRed.infoWindowAnchor = new GPoint(5, 1);
	
	var iconBlack= new GIcon();
    iconBlack.image = 'https://mt.google.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=635050,ff000000';
    iconBlack.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    iconBlack.iconSize = new GSize(20,20);
    iconBlack.shadowSize = new GSize(22, 20);
    iconBlack.iconAnchor = new GPoint(6, 20);
    iconBlack.infoWindowAnchor = new GPoint(5, 1);

    var customIcons = [];
    customIcons["4"] = iconBlue;
	customIcons["3"] = iconGreen;
    customIcons["2"] = iconYellow;
	customIcons["1"] = iconRed;
	customIcons["0"] = iconBlack;
	customIcons[""] = iconBlack;
	
	
    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(3.33442, 99.01447000000000), 8);

        GDownloadUrl("../xml/hutm.php", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
		  var id_jtm = markers[i].getAttribute("id_jtm");
            var peralatan = markers[i].getAttribute("peralatan");
            var feeder = markers[i].getAttribute("feeder");
			var lat = markers[i].getAttribute("lat");
			var lng = markers[i].getAttribute("lng");
			
			  
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
            var marker = createMarker(point, id_jtm, peralatan, feeder,lat,lng);
            map.addOverlay(marker);
          }
        });
} 		
   
    function createMarker(point, id_jtm, peralatan, feeder,lat,lng) {
      var marker = new GMarker(point, customIcons[feeder]);

	  

	
      GEvent.addListener(marker, 'click', function() {
          $('#myModal').modal('show');
		if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      });
      return marker;
		
  }
 }
 
 

