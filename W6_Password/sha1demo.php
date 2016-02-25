<!DOCTYPE html>
<html>
<head>
	<title>sha1 Demo</title>
	<link rel="stylesheet" href="css/base.css" />
</head>
<body>
	<pre><?php print_r($_GET); ?></pre>
	<h1>sha1 demo</h1>
	<?php
		if ( isset( $_GET['submit'] ) ) {
			handle_form( $_GET['input1'], $_GET['input2'] );
		}
		display_form();
	?>
</body>
</html>
<?php
function display_form(){
?>
<form method="get">
	Text to Encode: 
	<input name="input1" size="20" value="
	<?php echo isset($_GET['input1']) ? $_GET['input1'] : ""; ?>" type="text" />
	<input name="input2" size="20" value="
	<?php echo isset($_GET['input2']) ? $_GET['input2'] : ""; ?>" type="text" />
	<input type="submit" name="submit" value="encode" />
</form>
<?php
}

function handle_form( $input1, $input2 ){ 
  $encoded1 = sha1( $input1 );
  $encoded2 = sha1( $input2 );
  echo "$input1 sha1 encoding: " . $encoded1 . " length=" . 
                                         strlen($encoded1) . "<br />";
  echo "$input2 sha1 encoding: " . $encoded2 . " length=" . 
                                         strlen($encoded2) . "<br />";
}   
