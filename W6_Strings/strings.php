<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Strings</title>
	<link rel="stylesheet" href="css/base.css" />
</head>
<body>
<pre><?php //print_r($_GET); ?></pre>
<?php
	if ( isset( $_GET['button'] ) )
		handleform();
	displayform();
?>

</body>
</html>
<?php
function displayForm(){
?>
<div>
<br><br><br>
<form method="get">
<input type="text" name="firstname" value="Enter first name" /><br>
<input type="text" name="lastname" value="Enter last name" /><br>
<textarea name="posting" rows="10" cols="30">
</textarea><br>
<input type="submit" name="button" value="Go!" />
</form>
</div>
<?php
}

function handleform (){
	
	$firstname = $_GET['firstname'];
	$lastname  = $_GET['lastname'];

	/* concatenation of strings */
	//echo "$firstname $lastname here is your post";
	//echo $firstname." ".$lastname."here is your post";
	$fullname = $firstname . $lastname;
	$fullname_with_br = $firstname . " <br> " . $lastname;
	
	/* doing stuff with the posting (multi-line input) */
	$posting = stripslashes( $_GET['posting'] );
	echo "$firstname $lastname here is your post: $posting <br>\n\n";
	
	$text = nl2br( $posting );
	$postinghtmlentities = htmlentities( $posting );
	$postingstriptags = strip_tags( $posting );
	
	echo "<fieldset><br>nl2br: $text</fieldset>\n\n";
	echo "<fieldset><br>htmlentities: $postinghtmlentities</fieldset>\n\n";
	echo "<fieldset><br>striptags: $postingstriptags</fieldset>\n\n";
}
?>