<!DOCTYPE html>
<head>
<title>First query</title>
</head>
<body>
yezh
<?php

	$host = "localhost";
	$user= "root";
	$database="jed";
	$dbc= @mysqli_connect($host, $user, "root", $database) or
					die("Connect failed: $host $user $database ". mysqli_connect_error());
	echo "<h2>Connected to host:$host user:$user database:$database</h2>";
	$query = "select * from student where firstname='Al'";
	
	$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
	
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	echo  "<pre>"; print_r($row); echo "</pre>";
 	
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	
	echo "my query found $firstname $lastname";
	
	mysqli_free_result($result);
	mysqli_close($dbc);

?>
</body>
</html>

