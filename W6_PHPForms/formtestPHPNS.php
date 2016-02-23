<!DOCTYPE html>
	<head>
	<title> Form and script all in one... </title>
	<link rel="stylesheet" href="css/base.css" />
</head>
<body>
<h3>Dumping $_GET array </h3>
<?php	echo "<pre>"; print_r($_GET); echo "</pre>"; ?>
<hr>
<?php
if(isset($_GET['OK'])) {
	handleform();	
} else { 
	echo "Fill this form in and submit it !!";
}
displayForm();  // I always want to display the form
?>
</body>
</html>
<?php 
function handleform(){ 

	echo "<pre>".print_r($_GET)."</pre>";

	$name      = isset( $_GET['username'] )   ?   $_GET['username'] : "";
	$gradyear  = isset( $_GET['gradyear'] )   ?   $_GET['gradyear'] : "";
	$knowsjava = isset( $_GET['knowsJava'] )  ?   "yes" : "";
	$knowsphp  = isset( $_GET['knowsPHP'] )   ?   "yes" : "";
	$knowsc    = isset( $_GET['knowsC'] )     ?   "yes" : "";
	$activity  = isset( $_GET['activity'] )   ?   $_GET['activity'] : "";
	$comments  = isset( $_GET['comments'] )   ?   $_GET['comments'] : "";

	echo "<h3>Hello, $name! </h3> I see you are a $gradyear who knows: ";

	$count = 0;
	if ($knowsjava == "yes") {
		echo "Java";
		$count++;
	}
	if ($knowsc == "yes") {
		if ($count >= 1) echo ", ";
		echo "C";
		$count++;
	}

	if ($knowsphp == "yes") {
		$count = $count + 1;
		if ($count >= 1) echo ", ";
		echo "PHP";
		$count ++;
	}
	if ($count == 0 ) {
		echo "nothing!";
	}

	echo " <br>Here are your comments:<br>";
	echo $comments;
	
	echo "<br>";

	if ($activity == "both") {
		echo "<br>I also like to do my homework while I run.";
	} else {
		echo "<br>I also like to $activity on Saturdays.";
	}
	echo "<br>\n";
}
?>
<?php
function displayForm() {
?>
<hr>
<form method="get">
	<br>
	Enter your name in this text field: 
	<input type=text size=10 name="username" value=""/>
	<br><br>
	Enter your graduation year:
	<br>
	<input type=radio name="gradyear" value="senior" id="radio1"/> 2015
	<input type=radio name="gradyear" value="junior" id="radio2"/> 2016
	<input type=radio name="gradyear" value="sophomore" id="radio3"/> 2017
	<input type=radio name="gradyear" value="freshman" id="radio4"/> 2018

	<br><br>
	What programming languages do you know?
	<br>
	<input type=checkbox name="knowsJava" id="knowsJava" value="Java" /> Java
	<br>
	<input type=checkbox name="knowsC" id="knowsC"    value="C"  /> C
	<br>
	<input type=checkbox name="knowsPHP" id="knowsPHP"  value="PHP" /> PHP


	<br><br>
	What is your favorite thing to do on a Saturday morning?
	<br>
	<select name="activity">
		<option value="run">Run 10 miles</option>
		<option value="work">Do homework</option>
		<option value="both">Both</option>
	</select>

	<br><br>
	Add your confidential comments here:
	<br>
	<textarea rows=6 cols=40 name="comments">
	</textarea>

	<br><br>
	Please submit when ready: <input type=submit name="OK" value="OK"/>
	<br>
</form>
<?php
}