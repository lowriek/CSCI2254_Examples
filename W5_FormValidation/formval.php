<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Javascript Strings</title>
	<link rel="stylesheet" href="css/base2.css" />
	<script type="text/javascript">
	
		function validate(){
			var validName = validateName();
			var validPhone = validatePhone();
			
			if (validName && validPhone)
				return true;
			
			return false;
		}

		function validateName(){
			var thename= document.getElementById("yourname").value ;
			
			if (thename.length < 1) {
				var errorrpt=document.getElementById("nameerror");
				errorrpt.innerHTML = "Please enter a name";
				return false;
			} 
			var errorrpt=document.getElementById("nameerror");
			errorrpt.innerHTML = "";
	
			return true;
		}
		
		function validatePhone(){
			var thephone= document.getElementById("yourphone").value ;
			var phoneregex=/^\d{3}\-\d{3}\-\d{4}$/;
			
			if (!phoneregex.test(thephone)) {
				var errorrpt=document.getElementById("phoneerror");
				errorrpt.innerHTML = "Please enter your phone number " +
										"in the format XXX-XXX-XXXX";
				return false;
			} 
			var errorrpt=document.getElementById("phoneerror");
			errorrpt.innerHTML = "";

			return true;
		}
		

	
	</script>
</head>
<body>
<?php
	if (isset($_GET['submit']))
		handleform();
	else	
		displayform();
?>

</body>
</html>
<?php
function handleform(){
	$name = isset($_GET['yourname']) ? $_GET['yourname'] : "";
	echo "<h2>Hello $name</h2>";
	$phone = isset($_GET['yourphone']) ? $_GET['yourphone'] : "";
	echo "<h2>your phone is $phone</h2>";

}
function displayform(){
?>
<br />
<fieldset>
<legend>My Input Form</legend>
<form name="myform" action="" onsubmit="return validate();" >
	<table>
		<tr>
			<td><label for="yourname">Enter your name:</label></td>
			<td><input type="text" name="yourname" id="yourname" /></td>
			<td><span class="ereport" id="nameerror"></span></td>
		</tr>
		<tr>
			<td><label for="yourphone">Enter your phone number:</label></td>
			<td><input type="text" name="yourphone" id="yourphone" /></td>
			<td><span class="ereport" id="phoneerror"></span></td>
		</tr>
		<tr>
			<td colspan"3"><input type="submit" name="submit" id="submit" value="Go" /></td>
	</table>
</form>
</fieldset?
<?php
}
?>