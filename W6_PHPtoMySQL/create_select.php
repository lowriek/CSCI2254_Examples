<?php
include('dbconn.php');
?><!DOCTYPE html>
<head>
<title>Creating a drop down</title>
</head>
<body>
<pre><?php print_r($_GET);?> </pre>
<?php

if ( isset( $_GET['submitted'] ) )
	handle_form( $_GET['student'] );
	
display_form( "student" );

?>
</body>
</html>
<?php
function handle_form( $id ){

	$dbc    = connect_to_db( "jed" );	
	$query  = "select lastname, firstname, major from student where ID = '$id'";
	$result = perform_query( $dbc, $query );

	$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
	//print_r($row);
	$lastname  = $row['lastname'];
	$firstname = $row['firstname'];
	$major     = $row['major'];
	echo "$firstname $lastname's major is $major<br />";
	
	disconnect_from_db( $dbc, $result );
}

function display_form( $menuname ){
	echo '<form method = "get">';
	
	create_select( $menuname );
	echo '<input type="submit" name="submitted" value="Go!">
	</form>';
}

function create_select( $menuname ){

	echo "<select name= '$menuname'>\n";
	$dbc    = connect_to_db( "jed" );	
	$query  = "select ID, lastname, firstname from student";
	$result = perform_query( $dbc, $query );
	
	while ($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
	
		$firstname = $row['firstname'];
		$lastname  = $row['lastname'];
		$id        = $row['ID'];
	   
	   	if ( isset( $_GET[$menuname] ) && ( $_GET[$menuname]==$id ) )
			echo "<option value = '$id' selected> $firstname  $lastname </option>\n";
		else
			echo "<option value = '$id'> $firstname  $lastname </option>\n";
	}
		
	echo "</select>";
	disconnect_from_db( $dbc, $result );
}

