<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Cast Example</title>
	<link rel="stylesheet" type="text/css" href="css/baseA.css" />	  

</head>
<body>
<pre><?php print_r( $_GET );?></pre>
<?php

	$xmlstr = file_get_contents( "data.xml" );
	
   	if ( FALSE == ( $xmlstr ) )
         die( "Unable to read XML file $file" );
         
	$xml = new SimpleXMLElement( $xmlstr );
             
	echo "<pre>"; print_r($xml); echo "</pre>";

   	$data_a =  $xml->data_a;
   	$data_b =  $xml->data_b;
   	echo "data a is $data_a data b is $data_b<br>";
   	$sum = $data_a + $data_b;
   	echo "sum is $sum <br>";
   	
   	
   	$data_a =  (float) $xml->data_a;
   	$data_b =  (float) $xml->data_b;
   	echo "data a is $data_a data b is $data_b<br>";
   	$sum = $data_a + $data_b;
   	echo "sum is $sum";

?>
</body>
</html>