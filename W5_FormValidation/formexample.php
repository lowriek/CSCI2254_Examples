 <!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Javascript Strings</title>
	<link rel="stylesheet" href="css/base.css" />
	<script type="text/javascript">
		function validate(){
			var thename= document.getElementById("yourname").value ;
			if (thename.length < 1) {
				var errorrpt=document.getElementById("nameerror");
				errorrpt.innerHTML = "Please enter your name";
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
<?php
	if(isset($_GET['submit']))
		handleform();
?>
<div id="stringresult"></div>
<br />
<form name="myform" method="get" action="formexample.php" onsubmit="return validate();" >
<label for="yourname">Name:</label>
<div id="nameerror"></div>
<input type="text" name="yourname" id="yourname" />
<input type="submit" name="submit" id="submit" value="Go" />
</form>
</body>
</html>
<?php
function handleform(){
	$name = isset($_GET['yourname']) ? $_GET['yourname'] : "";
	echo "Hello $name";
}