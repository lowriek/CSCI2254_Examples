<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Fruit array Demo</title>
	<link rel="stylesheet" type="text/css" href="css/baseA.css" />	  
</head>
<body>
<pre>
	<?php print_r( $_GET ); ?>
</pre>

<?php  
		if ( isset( $_GET['formsubmitted'] ) ) {
			$favorites = isset( $_GET['favorites'] ) ? $_GET['favorites'] : array() ; 
			handle_form( $favorites );  
	   		display_form( $favorites );  
	   	} else
	   		display_form( array() );  
?>
</body>
</html>
<?php
function display_form( $favorites ){
?>
<fieldset><legend>Choose fruits</legend>	
<form method="get">
<p>What fruits do you like?</p>
<?php  make_fruit_checkboxes( $favorites );  ?>

<input type="submit" name="formsubmitted" value="doit"/>
</form>
</fieldset>
<?php } ?>
<?php
function make_fruit_checkboxes( $favorites )
{
	$fruits = array("apple", "orange", "banana", "grapefruit", "kiwi", "mango");
	
	foreach ( $fruits as $value ) {
		if ( false !== array_search( $value, $favorites ) )
			echo "<input type=\"checkbox\" name=\"favorites[]\" value=\"$value\" 
				checked=\"checked\"> $value<br>\n";
		else
			echo "<input type=\"checkbox\" name=\"favorites[]\" value=\"$value\">
				$value<br>\n";
	}
}
?>
<?php 
function handle_form( $favorites ){
	foreach ( $favorites as $value )
		echo "$value is a favorite<br>";
}
?>

