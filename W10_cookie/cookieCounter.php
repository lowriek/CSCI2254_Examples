<?php
if (isset($_COOKIE['MyCookieCounter'])){
	$count=$_COOKIE['MyCookieCounter'] + 1;
	// expire in 30 seconds
	$exptime = time() + 30;
	setcookie("MyCookieCounter", $count, $exptime);
} else {
	$count = 1;
	$exptime = time() + 30;
	setcookie( "MyCookieCounter", 1, time() + 30 );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Cookie Counter</title>
	<style type = "text/css">		  
			body {font-family: Verdana, sans-serif;}
	</style>
</head>
<body>
<?php 
echo "The count is $count and expires at $exptime <br>";
$timetildone = $exptime - time();
echo "Time is ".time()."  \$exptime-time() is $timetildone";
?>
<br>
<pre>
<?php print_r($_COOKIE); ?>
</pre>
</body>
</html>