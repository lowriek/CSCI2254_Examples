<?php
include('dbconn.php');
?><!DOCTYPE html>
<head>
<title>using an include</title>
</head>
<body>
<?php

	$dbc= connectToDB("jed");	
	$query = "select * from student where firstname='Al'";
	$result = performQuery($dbc, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	echo  "<pre>"; print_r($row); echo "</pre>";
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	echo "my query found $firstname $lastname";
	
	disconnectFromDB($dbc, $result);
?>
</body>
</html>
