<?php
	include('dbconn.php');
?><!DOCTYPE html>
<html>
<head>
	<title>Password demo</title>
	<link rel="stylesheet" href="css/base.css" />
</head>
<body>
<pre><?php //print_r($_GET); ?></pre>
	Password demo
<?php 
		if ( isset( $_POST['op'] ) )
			handle_form( $_POST['op'] );
		
		display_insert_form();
		display_validate_form();

?>
</body>
</html>
<?php function handle_form( $op ) 
{
		$entered_name   = $_POST['name'];	
		$entered_passwd = $_POST['pass'];
		
		switch ( $op ) {
		case "insert":
			insert_user( $entered_name, $entered_passwd );
			break;
		case "validate":
			validate_user( $entered_name, $entered_passwd) ;	
			break;
		default:
			die( "Invalid operation" );
	}	
}

function display_validate_form() {
?>
	<fieldset><legend>Validate</legend><form method="post">
		Name:  
		<input type="text" name="name" size="30" maxlength="60" value=""/>
		<br><br>
		Password:	<input type="password" name="pass" size="30" maxlength="80">
		<br />
		<input type="hidden" name="op" value="validate" />
		<input type="submit" name="validate" value="Validate!">
	</form></fieldset>	<br>
<?php
}
function display_insert_form() {
?>
	<fieldset><legend>Insert</legend><form method="post">
		Name:  
		<input type="text" name="name" size="30" maxlength="60" value=""/>
		<br><br>
		Password:	<input type="password" name="pass" size="30" maxlength="80">
		<br />
		<input type="hidden" name="op" value="insert" />
		<input type="submit" name="insert" value="Insert!">
	</form></fieldset>	<br>
<?php
}
function insert_user( $name, $pw ){
	$encode = sha1( $pw );
	$query="insert into pwdemo values ('$name', '$encode')";
	$dbc = connect_to_db( "csci2254" );
	$result = perform_query( $dbc, $query );
	if ( !$result )
		echo "<br>Insert Failed - $query";
	else
		echo "<br>Insert Success- $query";
}
function validate_user( $name, $pw ){
	$encode = sha1( $pw );
	$query = "select * from pwdemo where name='$name' and pass='$encode'";
	$dbc = connect_to_db( "csci2254" );
	$result = perform_query( $dbc, $query );
	$row =mysqli_fetch_array( $result, MYSQLI_ASSOC );
	echo "<pre>";
	print_r($row);
	echo "</pre>";
	
	if ( mysqli_num_rows( $result ) == 0)
		echo "<br>Validate Failure - $query";
	else
		echo "<br>Validate Success - $query";
}
