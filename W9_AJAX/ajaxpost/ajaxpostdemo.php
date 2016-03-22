<?php // note that this is not a complete page.
	
	$name = $_POST['name'];
	$city = $_POST['city'];
	$country_data = array('dataName' => $name, 'dataCity' => $city);
	echo json_encode($country_data);

