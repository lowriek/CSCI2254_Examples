<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Temp Convertor Result</title>
</head>
<body>
<?php
/**       °F to °C   Deduct 32, then multiply by 5,
 *          then divide by 9
 **/
 
     $tempF = $_GET['tempF'];
    
     $tempC = ($tempF - 32) * 5 / 9;
     echo "<br /><h1>$tempF degrees Farenheit is equal to
                  $tempC degrees celsius</h1>";
    
?>

</body>
</html>
