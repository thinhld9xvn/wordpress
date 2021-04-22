jQuery(function($) {

  if ( shop_coords ) {

  	var centerPosition = new google.maps.LatLng(shop_coords.lat, shop_coords.lng);

      var options = {
          zoom: 15,
          center: centerPosition,
          mapTypeId: google.maps.MapTypeId.ROADMAP        
      };
      var map = new google.maps.Map(document.getElementById('map'), options);
      var infoWindow = new google.maps.InfoWindow();  

      var marker = new google.maps.Marker({
  	    position: centerPosition	   
    	});  

    	marker.setMap(map);

    }  	

});