<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Google Geocode XML Request</title>
</head>
<body>

</body>
</html>
<?php
	$address = isset($_GET['address'])?$_GET['address'] : "";

	displayForm($address);
	
	if(isset($_GET['submitForm']) && $address !="")
		handleform($address);

?>
</body>
</html>
<?php
	function displayForm($address){
	?>
		<fieldset><legend>Enter and Address to get Location Information</legend>
			<form method="get">
				Address:<input type="text" name=address size="55" value='<?php echo $address; ?>'/>
				<br><br>
				<input type="submit" name="submitForm" value="Get Info" />
			</form>
		</fieldset>
	<?php
	}
	
	
	function handleForm($address){
		echo "<fieldset><legend>Info about $address</legend>";

   		$loc = getLocation( $address );
   		echo "<pre>"; print_r( $loc);  	echo "</pre>";
   		
   		echo "</legend></fieldset>";
 	}

	/* 
	 * Pass getLocation a street address or POI, 
	 * and you get an array with lat/lng returned
	 * Get the key here: https://console.developers.google.com/project 
	 */
    function getLocation( $address )
    {
    	$geocodeURL = "https://maps.googleapis.com/maps/api/geocode/xml?";
   		$address = "address=" . urlencode($address);
   		$key = "key=AIzaSyAsAWbQ0_nFCSoOwOwVP9JYroJ12JI0xOE";
   		$geocoderequest = "$geocodeURL$address" . "&" . $key;
   		
   		//die( "The url is >" . $geocoderequest . "<" );
   		
   		$xml= new SimpleXMLElement( file_get_contents( $geocoderequest ) );
   		
   		if($xml->status != 'OK')
   			die("bad result status");

        //echo "<pre>"; print_r( $xml);  	echo "</pre>";
        $latitude  = $xml->result->geometry->location->lat;
        $longitude = $xml->result->geometry->location->lng;
        
        $location = array("latitude" => $latitude, "longitude" => $longitude);
        
        return ($location);
    }
 
?>