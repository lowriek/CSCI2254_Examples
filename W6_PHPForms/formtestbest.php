<!DOCTYPE html>
	<head><title> Form and script all in one... and its sticky!!</title>
	<link rel="stylesheet" href="css/base.css" />
	<script type="text/javascript" >
	function formvalid(){
		var validname = namevalid();
		//var validactivity = activityvalid();
		//var validlanguages = languagesvalid();
		//var validgradyear = gradyearvalid()
		//var validcomments = ommentsvalid();
		//var validall = validname && validactivity && validlanguages && validgradyear && validcomments;
		
		if ( validname ) {
			displayactivity();
			displaylanguages();
			displaygradyear();
			displaycomments();
		} else {
		}
		return false;
	}
	
	function namevalid(){
		// dump form data
		var name = document.forms["mytestform"].username.value;
		return name.length > 0;
	}
	
	function displayactivity(){
		var activityselected = document.forms["mytestform"].activity.value;
		alert("You like to " + activityselected);
	}
	
	function displaylanguages(){
		var languagesknown1 = document.forms["mytestform"].knowsJava;
		var languagesknown2 = document.forms["mytestform"].knowsC;
		var languagesknown3 = document.forms["mytestform"].knowsPHP;
		var languagelist="";
		
		if (languagesknown1.checked)
			languagelist= languagesknown1.value;

		if (languagesknown2.checked)
			if (languagelist)
				languagelist += ", " + languagesknown2.value;
			else
				languagelist= languagesknown2.value;
		
		if (languagesknown3.checked)
			if (languagelist)
				languagelist += ", " + languagesknown3.value;
			else
				languagelist = languagesknown3.value;
			
		if (!languagelist) languagelist = "None";
		
			
		alert("Your languages are: " + languagelist);
	}
	
	function displaygradyear(){
		var gradyear = document.forms["mytestform"].gradyear;
		var gradyearlength = gradyear.length;
		var calyear = 2015;		
		for (var i=0; i < gradyearlength; i++){
			if (gradyear[i].checked) {
				calyear = calyear + i;
				alert ("Your grad year is " + calyear);
			}
		}
	}
	
	function displaycomments(){
		var comments = document.forms["mytestform"].comments.value;
		alert("Your comments are " + comments);
	}
	</script>
</head>
<body>
<h2> CSCI254 Example Form with Validation</h2>
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
function handleform(){  // This function shows how to make each form element sticky.
	$name = $_GET['username'];
	$gradyear = $_GET['gradyear'];
	$knowsjava = $_GET['knowsJava'];
	$knowsphp = $_GET['knowsPHP'];
	$knowsc = $_GET['knowsC'];
	$activity = $_GET['activity'];
	$comments = $_GET['comments'];
	
	echo "<pre>";
	print_r($_GET['languagecheck']);
	echo "</pre>";

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
	$gradyear = isset($_GET['gradyear']) ? $_GET['gradyear'] : "";
	$activity = isset($_GET['activity']) ? $_GET['activity'] : "";
	$username = isset($_GET['username']) ? $_GET['username'] : "";
	$comments = isset($_GET['comments']) ? $_GET['comments'] : "";

?>
<hr>
<form method="get" id="mytestform" action="" onsubmit="return formvalid();">
	<br>
	Enter your name in this text field: <input type=text size=10 name="username" 
		value="<?php  echo$username ?>"/>
	<br><br>
	Enter your graduation year:
	<br>
	<input type=radio name="gradyear" value="senior" id="radio1"
	<?php  if ($gradyear == "senior")  echo "checked=\"checked\""; ?>
	/> 2015
	<input type=radio name="gradyear" value="junior" id="radio2"
	<?php  if ($gradyear == "junior") echo "checked=\"checked\""; 	?>
	/> 2016
	<input type=radio name="gradyear" value="sophomore" id="radio3"
	<?php  if ($gradyear == "sophomore") echo "checked=\"checked\""; ?>
	/> 2017
	<input type=radio name="gradyear" value="freshman" id="radio4"
	<?php  if ($gradyear == "freshman")	echo "checked=\"checked\""; ?>
	/> 2018

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
	<textarea rows=6 cols=40 name="comments">
	<?php echo $comments; ?>
	</textarea>

	<br><br>
	Please submit when ready: <input type=submit name="OK" value="OK"/>
	<br>
</form>
<?php
}