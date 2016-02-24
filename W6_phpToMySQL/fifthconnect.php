<?php
include('dbconn.php');
?><!DOCTYPE html>
<head>
<title>Creating a drop down</title>
</head>
<body>
<pre><?php print_r($_GET);?> </pre>
<?php

if (isset($_GET['submitted']))
	handleform($_GET['student']);
	
displayform("student");

?>
</body>
</html>
<?php
function handleform($id){
	$dbc= connectToDB("jed");	
	$query = "select lastname, firstname, major from student where ID='$id'";
	$result = performQuery($dbc, $query);

	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	//print_r($row);
	$lastname=$row['lastname'];
	$firstname=$row['firstname'];
	$major =$row['major'];
	echo "$firstname $lastname's major is $major<br />";
}
function displayform($menuname){
	echo "<form method = \"get\">";
	
	createpulldown($menuname);
	echo "<input type=\"submit\" name=\"submitted\" value=\"Go!\">
			</form>\n";
}
function createpulldown($menuname){
	echo "<select name=\"$menuname\">\n";
	$dbc= connectToDB("jed");	
	$query = "select ID, lastname, firstname from student";
	$result = performQuery($dbc, $query);
	while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
	
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$id = $row['ID'];
	   
	   	if (isset($_GET[$menuname]) && ($_GET[$menuname]==$id))
			echo "<option value = \"$id\" selected>$firstname  $lastname </option>\n";
		else
			echo "<option value = \"$id\">$firstname  $lastname </option>\n";
	}
		
	echo "</select>";
	disconnectFromDB($dbc, $result);
}
?>

