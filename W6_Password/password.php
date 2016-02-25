<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Strings</title>
	<link rel="stylesheet" href="css/base.css" />
</head>
<body>
<?php
	$password = create_password();	
	echo "<h1>$password</h1>";
?>
</body>
</html>
<?php
function create_password() {// start with an empty password
	
	$password="";
	
	//define possible characters
	$possible="23456789abcdefghjklmnpwrstuvwxyz";
	
	$password="";
	$length=8;
	
	for ($i = 1; $i <= $length; $i++){
		// pick a random character from the possible characters
		$pick = rand( 0, strlen( $possible ) - 1 );
		$passchar  = substr( $possible, $pick, 1 );
		$password .= $passchar;
	}
	return $password;
}