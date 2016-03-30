<?php

	if (isset($_COOKIE['loginCookieUser']))
	{
		$outstr = "<h2 align=center>";
		$outstr .= "Welcome ".$_COOKIE['loginCookieUser'];
	} else {
		$outstr = "<h2 align=center> User not logged in";
	}			
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Login Cookie Welcome</title>
	<style type = "text/css">		  
			body {font-family: Verdana, sans-serif;}
	</style>
</head>
<body>

<?php echo $outstr; ?></h2>

<form method=POST action="logoutCookie.php">
<input type=submit value="Logout">
</form>
</body>
</html>
