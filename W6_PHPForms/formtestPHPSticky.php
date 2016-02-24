<!DOCTYPE html>
	<head><title> Form and script all in one... and its sticky!!</title>
	<link rel="stylesheet" href="css/base.css" />
</head>
<body>
<h3>Dumping $_GET array </h3>
<?php	echo "<pre>"; print_r($_GET); echo "</pre>"; ?>
<hr>
<h2> CSCI2254 Example Form PHP Only  </h2>
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

	// This function shows how to make each form element sticky.

	$name = $_GET['username'];
	$gradyear = $_GET['gradyear'];
	$knowsjava = $_GET['knowsJava'];
	$knowsphp = $_GET['knowsPHP'];
	$knowsc = $_GET['knowsC'];
	$activity = $_GET['activity'];
	$comments = $_GET['comments'];
	
	echo "<h3>Hello, $name! </h3> I see you are a $gradyear who knows: ";

	$count = 0;
	if ($knowsjava == "Java") {
		echo "Java";
		$count++;
	}
	if ($knowsc == "C") {
		if ($count >= 1) echo ", ";
		echo "C";
		$count++;
	}

	if ($knowsphp == "PHP") {
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
	$gradyear = isset($_GET['gradyear']) ? $_GET['gradyear'] : "";
	$activity = isset($_GET['activity']) ? $_GET['activity'] : "";
	$username = isset($_GET['username']) ? $_GET['username'] : "";
	$comments = isset($_GET['comments']) ? $_GET['comments'] : "";
?>
<hr>
<form method="get">
	<br>
	Enter your name in this text field: <input type=text size=10 name="username" 
		value="<?php  echo$username ?>"/>
	<br><br>
	Enter your graduation year:
	<br>
	<input type=radio name="gradyear" value="senior" id="radio1"
	<?php  if ($gradyear == "senior")  echo "checked=\"checked\""; ?>
	/> 2016
	<input type=radio name="gradyear" value="junior" id="radio2"
	<?php  if ($gradyear == "junior") echo "checked=\"checked\""; 	?>
	/> 2017
	<input type=radio name="gradyear" value="sophomore" id="radio3"
	<?php  if ($gradyear == "sophomore") echo "checked=\"checked\""; ?>
	/> 2018
	<input type=radio name="gradyear" value="freshman" id="radio4"
	<?php  if ($gradyear == "freshman")	echo "checked=\"checked\""; ?>
	/> 2019

	<br><br>
	What programming languages do you know?
	<br>
	<input type=checkbox name="knowsJava" id="knowsJava" value="Java" 
	<?php  if (isset($_GET['knowsJava'])) echo "checked=\"checked\""; ?> /> Java
	<br>
	<input type=checkbox name="knowsC" id="knowsC"    value="C"    
	<?php  if (isset($_GET['knowsC'])) echo "checked=\"checked\""; ?> /> C
	<br>
	<input type=checkbox name="knowsPHP" id="knowsPHP"  value="PHP"   
	<?php  if (isset($_GET['knowsPHP'])) echo "checked=\"checked\""; ?> /> PHP


	<br><br>
	What is your favorite thing to do on a Saturday morning?
	<br>
	<select onchange="displayvalue()" name="activity">
		<option value="run" 
		<?php  if ($activity == "run") echo "selected=\"selected\""; ?> >Run 10 miles
		</option>
		<option value="work" 
		<?php  if ($activity == "work") echo "selected=\"selected\""; ?> >Do homework
		</option>
		<option value="both" 
		<?php  if ($activity == "both") echo "selected=\"selected\""; ?> >Both
		</option>
	</select>

	<br><br>
	Add your confidential comments here:
	<br>
	<textarea rows=6 cols=40 name=\"comments\">
	<?php 
		if (! empty($comments) && isset($_GET['comments'])) {
			echo $comments;
		}
?>
	</textarea>

	<br><br>
	Please submit when ready: <input type=submit name="OK" value="OK"/>
	<br>
</form>
<?php
}