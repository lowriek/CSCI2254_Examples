<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	 <title>Log In Cookie Example</title>
	<style type = "text/css">		  
			body {font-family: Verdana, sans-serif;}
	</style>
</head>
<body>

<h1 align=center>Please Log In</h1>
<p>


<?php 
	$name = isset( $_POST['name'] ) ? $_POST['name'] : "";
	$password = isset( $_POST['password'] ) ? $_POST['password'] : "";
	displayLoginForm( $name, $password );
?>


</body>
</html>
<?php
function displayLoginForm($name, $passwd)
{?>
	<form action="loginCookie.php" method="post">
		Name:<input type="test" name="name" type="text" size="20" 
					value="<?php echo $name; ?>"/>
		Password:<input name="password" type="password" size="20" 
					value="<?php echo $passwd;?>"/><br />
		<input name="submitted" type="hidden" size="20" value="true" /><br>
		<input type="submit" name="Login" value="Login" />
	</form>
<?php }
