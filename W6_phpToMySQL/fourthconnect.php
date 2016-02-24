<?php
include('dbconn.php');
?><!DOCTYPE html>
<head>
<title>Fourth query</title>
</head>
<body>
<?php

	$dbc= connectToDB("jed");	
	$query = "select lastname, firstname from student";
	$result = performQuery($dbc, $query);
	echo "<ul>\n";
	while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
	
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
	   
		echo "<li>$firstname  $lastname </li>\n";
	}
		
	echo "</ul>\n";

	disconnectFromDB($dbc, $result);
?>
</body>
</html>
