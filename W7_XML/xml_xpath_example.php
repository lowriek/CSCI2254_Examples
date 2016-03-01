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

Below are a few xml examples using xpath: <br />
<hr />
Displaying the xml file at "xml_school.xml":
<pre><?php print_r( $xml ); ?></pre>
<hr />
xpath( '//student' ) will return all student elements: <br />
<?
$test = $xml->xpath( '//student' );
?>
<pre><?php print_r( $test ); ?></pre>
<hr />

<strong>Example 1: using conditions: $xml->xpath( '//student[gpa>3.0 or gpa<2.5]' );</strong>
<?php $extremeGPAs = $xml->xpath( '//student[gpa>3.5 or gpa<2.5]' ); ?>
<pre>
<?php print_r( $extremeGPAs ); ?>
</pre>
<hr />
<strong>Example 2: using conditions: $xml->xpath('//student[gpa>2.0 and gpa<3.5]');</strong>
<?php $middleGPAs = $xml->xpath( '//student[gpa>2.0 and gpa<3.5]' ); ?>
<pre>
<?php print_r( $middleGPAs ); ?>
</pre>
<hr />
</body>
</html>