<?php

function connectToDB($dbname){
	// REMEMBER!!!
	// Change the host, login, and db information
	$dbc= @mysqli_connect("localhost", "root", "root", $dbname) or
					die("Connect failed: ". mysqli_connect_error());
	return ($dbc);
}
function disconnectFromDB($dbc, $result){
	mysqli_free_result($result);
	mysqli_close($dbc);
}

function performQuery($dbc, $query){
	
	//echo "My query is >$query< <br />";
	$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
	return ($result);
}
?>