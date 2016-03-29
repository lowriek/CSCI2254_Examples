(function() {
  	window.onload = function() {
    
		// Creating a map
		var options = {
			  zoom: 14,
			  center: new google.maps.LatLng(42.33626, -71.16863),
			  mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById('map'), options);
	
		// Creating an array that will contain the points for the polyline
		var route = [
			  new google.maps.LatLng(42.344161, -71.155969),
			  new google.maps.LatLng(42.332221, -71.176220)
		];
		
		// Creating the polyline object
		var polyline = new google.maps.Polyline({
			  path: route,
			  strokeColor: "#ff0000",
			  strokeOpacity: 0.6,
			  strokeWeight: 5
		});
		
		// Adding the polyline to the map
		polyline.setMap(map);
  
  	};
})();
