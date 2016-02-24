<!DOCTYPE html>
<head>
<title>using functions to connect</title>
</head>
<body>
<?php
	include ('dbconn.php');


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
