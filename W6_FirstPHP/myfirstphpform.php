<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>My First PHP Form</title>
</head>
<body>
<?php  
	echo "<pre>";
	print_r($_GET);
	echo "</pre>"; 
?>
<fieldset>
	<legend>The First Form</legend>
	<form method="get">
		First: <input type="text" name="count1"/><br><br>
		Second: <input type="text" name="count2"/>
		<input type="submit"  name="mysubmit" value="Go"/>
	</form>
</fieldset>
<br>
<br>
<?php 
	if (isset($_GET['mysubmit'])) {
		handleform();
	}
?>
</body>
</html>
<?php
function handleform(){
    $a = $_GET['count1'];
    $b = $_GET['count2'];
    $sum = $a + $b;
    echo "  <fieldset><legend>The results</legend>
                The sum is $sum
            </fieldset>";
}
?>
