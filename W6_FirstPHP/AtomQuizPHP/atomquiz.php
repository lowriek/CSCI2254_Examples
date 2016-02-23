<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Loop Function Array Example</title>
	<link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<body>
<?php print_r($_GET); ?>
<h1>Atom Quiz</h1>
<?php
	include("atomarray.php");

	if (  isset( $_GET['go'] ) ){
		createResult($atom);
	}
	
	createQuestion($atom);
?>
</body>
</html>
<?php
function createQuestion($atom){	
	// choose a random key from the atom array
	$question = array_rand($atom);
?>
	<fieldset>
	<legend>Your challenge</legend>
		<form method="get">
			<h3>What is the symbol for <?php echo $atom[$question]; ?>?</h3>
			<input type="hidden" name="question" value="<?php echo $question; ?>"/>
			<?php createMenu($atom, "answer"); ?>
			<input class="right" name="go" type="submit" value="I got this!"/>
		</form>
	</fieldset>
<?php
}
function createResult($atom){
?> 
	<fieldset>
	<legend>And you are...</legend>
	<?php
		$question = $_GET['question'];
		$askedQuestion = $atom[$question];
		$answer = $_GET['answer'];
		if ($atom[$answer] == $askedQuestion){
			echo "RIGHT!!!  The symbol for $askedQuestion is $answer.";
		} else {
			$correct = array_search($askedQuestion, $atom);
			echo "Wrong, the symbol for $askedQuestion is not $answer!  
				  The symbol for $askedQuestion is $correct!";
		}
	?>
	</fieldset>
<?php
}
function createMenu($qarray, $menuname){
	echo "<select name=\"$menuname\">";
	foreach ($qarray as $key => $value) {
		echo "<option value=\"$key\">$key</option>";
	}
	echo "</select>";
}
?>