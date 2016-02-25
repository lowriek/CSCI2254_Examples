<?php
include('dbconn.php');
?><!DOCTYPE html>
<head>
<title>Selecting Multiple Records</title>
</head>
<body>
<?php

	$dbc = connect_to_db( "jed" );	
	$query = "select lastname, firstname from student";
	$result = perform_query( $dbc, $query );
	
	echo "<ul>\n";
	while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
	
		$firstname = $row['firstname'];
		$lastname  = $row['lastname'];
	   
		echo "<li>$firstname  $lastname </li>\n";
	}
	echo "</ul>\n";

	disconnect_from_db( $dbc, $result );
?>
</body>
</html>
