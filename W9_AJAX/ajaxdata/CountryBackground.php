<?php // note that this is not a complete page.
	$dbc = @mysqli_connect("localhost", "root", "root", "wfb2007")
	       or die("Could not open wfb2007 db, " . mysqli_connect_error());
	$query = 'select Background from countries where CountryName="' .
	         $_GET['country'] . '"';
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result) == 0)
		die($_GET["country"] . " not found in database");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	echo $row['Background']; // this will be returned to the calling page
	mysqli_close($dbc);
