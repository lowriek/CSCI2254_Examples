<?
$xml = new SimpleXMLElement( file_get_contents( "xml_school.xml" ) );
?>
<!DOCTYPE html>
<html>
<head>
	<title>xml examples</title>
	<link rel="stylesheet" type="text/css" href="css/baseA.css" />	  
</head>
<body>

<?php
echo listnames( $xml );
?>

</body>
</html>
<?php
function listnames($xml){
	$roster = $xml->xpath( '/school//student' );
	
		echo "<br>";
		$str = "";
		foreach ( $roster as $student ) {
			if ($str == "")
				$str = $student->name;
			else
				$str .= ", ". $student->name;
		}
		return $str;
}
?>