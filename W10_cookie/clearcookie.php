<?php

setcookie('MyCookie', 0, time()-3600);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Clear Cookie</title>
	<style type = "text/css">		  
			body {font-family: Verdana, sans-serif;}
	</style>
</head>
<body>
</body>

<p> I cleared MyCookie</p>
<a href="dumpcookie.php">dump the cookie I set</a>

</body>
</html>