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
	$address = isset($_GET['address'])   ?    $_GET['address'] : "";

	display_form($address);
	
	if(isset($_GET['submitForm']) && $address !="")
		handle_form($address);

?>
</body>
</html>
<?php
	function display_form($address){
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
	
	
	function handle_form($address){
	
		$loc = getLatLong($address);
		echo "<pre>"; print_r( $loc);  	echo "</pre>";

	}
	
	
	
	function getLatLong($address){
		echo "<fieldset><legend>Info about $address</legend>";

   		$geocodeURL = "https://maps.googleapis.com/maps/api/geocode/xml?";
   		$address = "address=" . urlencode($address);
   		$key = "key=AIzaSyD66xa224cyoktCawBN9CfMjPwzG6JVoYM";

   		$geocoderequest = "$geocodeURL$address" . "&" . $key;
   		
   		//die( "The url is >" . $geocoderequest . "<" );
   		
   		$xml= new SimpleXMLElement( file_get_contents( $geocoderequest ) );
   		
   		if($xml->status != 'OK') {
   			$status = $xml->error_message;
   			die("bad result status $status");
   		}
   		$loc = getLocation($xml);
   		
   		echo "<pre>"; print_r( $xml);  	echo "</pre>";

   		return $loc;

	}

    function getLocation($xml)
    {
        //echo "<pre>"; print_r( $xml);  	echo "</pre>";
        $latitude  = $xml->result->geometry->location->lat;
        $longitude = $xml->result->geometry->location->lng;
        
        $location = array("latitude" => $latitude, "longitude" => $longitude);
        
        return ($location);
    }
 
?>