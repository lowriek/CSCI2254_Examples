<?php // note that this is not a complete page.
	
	$dbc = @mysqli_connect("localhost", "root", "root", "wfb2007")
	       or die("Could not open wfb2007 db, " . mysqli_connect_error());
	$countryName = $_GET['countryName'];
	$query = "select CountryName, Languages, Background from countries 
						where CountryName='$countryName'";
	$result = mysqli_query($dbc, $query);
	if ( mysqli_num_rows( $result ) == 0 ) {
		die("$country not found in database");
	}
	$row = mysqli_fetch_array($result);
	$country_data = array('countryInfo' => $row);
	echo json_encode($country_data);
	mysqli_close($dbc);
