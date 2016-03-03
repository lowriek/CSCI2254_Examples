<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Redirection example</title>
</head>
<body>
<?php
	if ( isset( $_GET['status'] ) )
		echo "The status is : " . $_GET['status'] . "<br>";
	if ( isset( $_GET['guess'] ) )
		echo "The guess is : " . $_GET['guess'] . "<br>";
?>
<fieldset>
	<legend>Guess a number between 1 and 10</legend>
	<form method="get" action="handler.php">
		Enter the number: 
		<input type="text" name="guess" /><br>
		<input type="submit" value="Go!"/>
	</form>
</fieldset>

</body>
</html>
