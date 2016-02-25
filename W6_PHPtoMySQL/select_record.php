<!DOCTYPE html>
<head>
<title>Using functions to connect</title>
</head>
<body>
<?php
	include ('dbconn.php');

	$dbc = connect_to_db( "jed" );	
	$query = "select * from student where firstname='Al'";
	$result = perform_query( $dbc, $query );
	
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	echo  "<pre>"; print_r($row); echo "</pre>";
	
	$firstname = $row['firstname'];
	$lastname  = $row['lastname'];
	echo "my query found $firstname $lastname";
	
	disconnect_from_db( $dbc, $result );
?>
</body>
</html>
