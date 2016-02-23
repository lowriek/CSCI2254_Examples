<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>My First PHP</title>
</head>
<body>
<h1>My First PHP</h1>
<?php
	echo "Hello World!
	Here I am writing PHP!!!<br><br>";
	
	$fish = "swimmy";
	$dog = "daisy";
	$message = "my pets are ";
	$message .= $fish. "and $dog <br>";
	echo "my pets are $fish and $dog";
	addbreakfirst(1);
	echo "my pets are ".$fish." and $dog";
	addbreaksecond(3);
	echo $message;

	$average = (1 + 2 + 3 + 4) / 4;
	echo " the average is $average<br>";
	
	$petarray = array("dog", "cat", "fish");    
	?> There are <?php echo count($petarray); ?> pets <?php
	echo "<ul>";
	foreach ($petarray as $value)
		echo "<li>$value</li>";
	echo "</ul>";
?>
<p>some other html</p>
</body>
</html>
<?php
function addbreakfirst($count){
	for ($i=0; $i<$count;$i++){
		echo "<br>\n";
	}
}
function addbreaksecond($count){
	for ($i=0; $i<$count;$i++){
		?><br><?php
	}
}
?>