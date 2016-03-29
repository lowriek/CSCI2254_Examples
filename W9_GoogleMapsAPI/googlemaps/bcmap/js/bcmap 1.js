(function() {
  window.onload = function() {

    // Creating an object literal containing the properties 
    // we want to pass to the map  
    var options = {
      zoom: 3,
      center: new google.maps.LatLng(37.09, -95.71),
      mapTypeId: google.maps.MapTypeId.SATELLITE
    };
    
    var bounds = new google.maps.LatLngBounds();

    // Creating the map  
    var map = new google.maps.Map(document.getElementById('map'), options); 

    // Creating an array that will contain the coordinates 
    // for New York, San Francisco, and Seattle
    var places = [];
    var titles = [];
    var info = [];

    // Adding a LatLng object for each city
    places.push(new google.maps.LatLng(42.332221, -71.176220));
    titles.push('Tudor and Beacon');
    places.push(new google.maps.LatLng(42.330933, -71.169691));
    titles.push('Hammond and Lawrence');
    places.push(new google.maps.LatLng(42.334073, -71.162460));
    titles.push('Chestnut Hill and Beacon');
  	places.push(new google.maps.LatLng(42.33626, -71.16863));
    titles.push('21 Campanella Way');
    places.push(new google.maps.LatLng(42.33558, -71.17052));
    titles.push('Gasson Hall');
  	places.push(new google.maps.LatLng(42.344161, -71.155969));
    titles.push('Weston Jesuits');
  
    // Looping through the names and places arrays
    for (var i = 0; i < places.length; i++) {
      
		// Adding the marker as usual
		var marker = new google.maps.Marker({
			position: places[i], 
			map: map,
			title: titles[i]
		});
			
		// Wrapping the event listener inside an anonymous function 
		// that we immediately invoke and passes the variable i to.
		(function(i, marker) {
			// Creating the event listener. It now has access to the values of
			// i and marker as they were during its creation
			google.maps.event.addListener(marker, 'click', function() {
			
			var infowindow = new google.maps.InfoWindow({
			content: titles[i]
			});
			
			  infowindow.open(map, marker);
			
			});
			
		})(i, marker);
		bounds.extend(places[i]);
    }
    map.fitBounds(bounds);
  }
})();