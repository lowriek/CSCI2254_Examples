<?php
function connectToDB( $db ){
	$dbc= @mysqli_connect( "localhost", "root", "root", $db ) or
					die("Connect failed: ". mysqli_connect_error());
	return $dbc;
}
function disconnectFromDB( $dbc, $result ){
	mysqli_free_result( $result );
	mysqli_close( $dbc );
}

function performQuery( $dbc, $query ){
	//echo "My query is >$query< <br />";
	$result = mysqli_query( $dbc, $query ) or die( "bad query $query ". mysqli_error( $dbc ));
	return $result;
}
?>