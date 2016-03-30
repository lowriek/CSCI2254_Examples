<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Cookie Dump</title>
	<style type = "text/css">		  
			body {font-family: Verdana, sans-serif;}
	</style>
</head>
<body>
<pre>
<?php print_r($_COOKIE);

	foreach ($_COOKIE as $key=>$value)
		echo "\$_COOKIE['$key'] = $value<br />";
	?>
</pre>
</body>
</html>
