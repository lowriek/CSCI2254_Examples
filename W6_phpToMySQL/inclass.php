<?php
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>MySQL and PHP </title>
	<style type = "text/css">		  
			body {font-family: Verdana, sans-serif;}
	</style>
</head>
<body>
<pre><?php print_r($_GET);?></pre>
<?php 

if (isset($_GET['formsubmitted']))
	handleform($_GET['studentmenu']);
displayform($_GET['studentmenu']);

?>	
</body>
</html>
<?php
function handleform($id){

	$dbc = connectToDB();
	$query = "select lastname, firstname, major from student where ID='$id'";
	$result = performQuery($dbc, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$major = $row['major'];
	
	echo "$firstname $lastname's major is $major";
	
}
function displayform($currentstudent = "") {
	$dbc = connectToDB();
	$query = "select ID, lastname, firstname from student";
	$result = performQuery($dbc, $query);
	
	echo "<form method=\"get\">
		  <select name=\"studentmenu\">";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$id = $row['ID'];
		if ($id == $currentstudent)
			echo "<option value=\"$id\" selected>$firstname $lastname</option>\n";
		else
			echo "<option value=\"$id\">$firstname $lastname</option>\n";
	}
	
	echo "</select>
		<input type=\"submit\" name=\"formsubmitted\" value=\"go\" />
		</form>";
	disconnectFromDB($dbc, $result);
}
?>