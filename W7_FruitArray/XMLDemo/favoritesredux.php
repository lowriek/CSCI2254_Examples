<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Fruit Example</title>
</head>
<body>
<?php
if (isset($_GET['formsubmitted'])) {
	$currentfavs = $_GET['favorites'];
	handleform($currentfavs); 
} else
	$currentfavs = "";

displayform($currentfavs); 
?>
</body>
</html>
<?php
// form to demonstrate getting arrays as input from forms.
function displayform($favorites){
?>
<fieldset><legend>Choose foods</legend>	
<form method="get">
<p>What foods do you like?</p>
<?  make_food_checkboxes($favorites);  ?>

<input type="submit" name="formsubmitted" value="doit"/>
</form>
</fieldset>
<?}?>
<?
function make_food_checkboxes($favorites)
{
	$foods = get_foods();
	
	foreach ($foods as $value){
		if (!empty($favorites) and (FALSE !== array_search($value, $favorites)))
			echo "<input type=\"checkbox\" name=\"favorites[]\" value=\"$value\" checked=\"checked\"> $value<br>\n";
		else
			echo "<input type=\"checkbox\" name=\"favorites[]\" value=\"$value\"> $value<br>\n";
	}
}
?>  
<?php
/*
 * get an array of foods from an xml file
 */
function get_foods() 
{

      $file = "nutrition.xml";

      if (!$xmlstr=file_get_contents($file))
         die("Unable to read XML file $file");
      $xml = new SimpleXMLElement($xmlstr);
      
      $foods = array();
      foreach ($xml -> food as $f) {
        $foods[] = $f->name;
      }
      return $foods;
}
?>
<?php 
function handleform($favorites){
		foreach ($favorites as $value)
			echo "$value is a favorite<br>";
}
?>