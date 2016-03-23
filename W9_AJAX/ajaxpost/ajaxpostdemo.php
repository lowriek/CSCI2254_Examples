<?php // note that this is not a complete page.
	
	$name = $_POST['name'];
	$city = $_POST['city'];
	$data_from_post = array('dataName' => $name, 'dataCity' => $city);
	echo json_encode($data_from_post);
