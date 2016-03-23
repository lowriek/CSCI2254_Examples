<?php // note that this is not a complete page.
echo "boo";
	$dbc = @mysqli_connect("localhost", "root", "root", "wfb2007")
	       or die("Could not open wfb2007 db, " . mysqli_connect_error());
	$query = "select CountryName, Languages from countries";
	$result = mysqli_query($dbc, $query);
	if ( mysqli_num_rows( $result ) == 0 ) {
		die("no results");
	}
	
	$var = array();
		
	while($obj = mysqli_fetch_object($result)) {
		$var[] = $obj;
	}
	mysqli_close($dbc);

	echo '{"countries":'.json_encode($var).'}';

