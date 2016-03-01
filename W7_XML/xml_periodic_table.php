<?php
/*
xml examples 
K Lowrie 2013
*/
?>
<?
$xml = new SimpleXMLElement( file_get_contents( "http://www.w3.org/XML/Binary/2005/03/test-data/Over100K/periodic.xml" ) );
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Periodic Table</title>
	<link rel="stylesheet" type="text/css" href="css/baseA.css" />	  
</head>
<body>

xpath('//ATOM') will return all elements: <br />
<?php
$test = $xml->xpath( '/PERIODIC_TABLE//ATOM' );
?>
<pre>
  <?php //print_r($test); ?>
</pre>

<hr />


Example 1: Using foreach: foreach($xml->ATOM as $atom): <br>
    <?php foreach( $xml->ATOM as $atom )
       {
           echo "$atom->NAME <br>";
       }
    ?>

Example 2: Make a drop down menu

<select name="periodictable">
<?php
	foreach( $xml->ATOM as $atom ){
		echo "<option value=\">$atom->ATOMIC_WEIGHT\">";
		echo $atom->NAME;
		echo "</option>\n";
	}
?>
</select>
<br >

Example 3: Find the element with a boiling point greater than 5500 Kelvin<br >
<?php	
	$bp1040 = $xml->xpath('//ATOM[BOILING_POINT>"5500"]');
	foreach( $bp1040 as $atom )
		echo $atom->NAME.", ";