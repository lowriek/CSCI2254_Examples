<?php
$xml = new SimpleXMLElement( file_get_contents( "xml_example.xml" ) );
?>
<!DOCTYPE html>
<html>
<head>
  <title>xml with xpath</title>
</head>
<body>

	<h2>Xml examples using xpath: </h2>
	<hr />
	Displaying the xml file at "xml_example.xml":
	<pre><? print_r( $xml ); ?></pre>
	<hr />
	
	<strong> xpath('//student') will return all student elements: </strong>
	<?php   $test = $xml->xpath( '//student' ); ?>
	<pre><?php /* print_r($test); */?></pre>
	<hr />

	<strong>Example 1: using conditions: $xml->xpath('//student[gpa > 3.0 or gpa < 2.5]');</strong>
	<?php $extremeGPAs = $xml->xpath( '//student[gpa > 3.5 or gpa < 2.5]' ); ?>
	<pre>  <?php print_r( $extremeGPAs ); ?>  </pre>
	<hr />
	
	<strong>Example 2: using conditions: $xml->xpath('//student[gpa > 2.0 and gpa < 3.5]');</strong>
	<?php $middleGPAs = $xml->xpath( '//student[ gpa > 2.0 and gpa < 3.5]' ); ?>
	<pre>  <?php print_r( $middleGPAs ); ?>  </pre>

</body>
</html>