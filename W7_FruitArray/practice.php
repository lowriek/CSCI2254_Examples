<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Warmup</title>
	<style type = "text/css">		  
			body {font-family: Verdana, sans-serif;}
	</style>
</head>
<body>
<h1>Practice problem</h1>
<p>
Write a function in php that is passed an array, and returns the first even value in the array.
HINT:  The modulo operator, %,  will be very handy.  
Note that 4 % 2 is 0, and 5 % 2 is 1.  
</p>
<h2>Examples</h2>
<?php

$warmupArray = array(3,5,9,13,45,2,6,8);
$result = firsteven($warmupArray);
print_r($warmupArray);

echo "<h3>Result is $result</h3><br /><br />";

$warmupArray1 = array(3,5,9,13,45);
$result = firsteven($warmupArray1);
print_r($warmupArray1);

echo "<h3>Result is $result</h3>";
?>

</body>
</html>
<?
function firstEven($test){
	foreach ($test as $key => $value)
		if (($value % 2) == 0)
			return $value;
	return "no even numbers";
}
