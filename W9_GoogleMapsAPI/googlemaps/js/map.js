(function() {
  window.onload = function() {
	  
	// Creating a reference to the mapDiv
    var mapDiv = document.getElementById('map-canvas');
    
    // Creating an object literal containing the properties 
    // we want to pass to the map  
    var options = {
		center: new google.maps.LatLng(42.34674,-71.098929),
		zoom: 12,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: true,
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
		}
    };
    
    // Creating the map
    var map = new google.maps.Map(mapDiv, options);
    
    var marker = new google.maps.Marker({
    	position: new google.maps.LatLng(42.34674,-71.098929),
    	map: map,
    	title: 'Home of the Sox'
    });
  }
})();
