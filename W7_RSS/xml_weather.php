<html>
<head>
    <title>XML demo: Weather Viewer</title>
	<link rel="stylesheet" type="text/css" href="css/baseA.css" />	      
</head>
<body>
  
  <h1>RSS Feeds</h1>
  <?php
  
	$url = 'http://w1.weather.gov/xml/current_obs/KBED.xml' ;

	$options = array(
	  'http'=>array(
		'method'=>"GET",
		'header'=>"Accept-language: en\r\n" .
				  "User-Agent: CSCI2254/v10.0 (http://cscilab.bc.edu/; contact.lowriek@bc.edu)"
	  )
	);

	$context = stream_context_create($options);
	$data_from_gov = file_get_contents($url, false, $context);
	$xml = new SimpleXMLElement($data_from_gov);
	$location = $xml->location;
	$last_updated = $xml->observation_time;
	$temperature_string =  $xml->temperature_string;
	$wind_string  = $xml->wind_string;
	$weather = $xml->weather;
	echo "location: $location <br>
		  last updated: $last_updated <br>
		  weather: $weather <br>
		  temperature: $temperature_string <br>
		  wind : $wind_string";
	//echo "<pre>"; print_r($xml); echo "</pre>"; 
  

  ?>
  </body>
</html>
