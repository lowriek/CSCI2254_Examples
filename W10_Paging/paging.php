<?php
	include('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Pageable Displays</title>

</head>
<body>

		  <h1>Paging Example!</h1>
		<?php
			// pagination support
			$itemsPerPage = 7;
	
			// figure out how many pages
			$pages = findpages($itemsPerPage);
			$start = findstart();
	
			createDataTable( $start, $itemsPerPage );
		?>


		<?php
			createPageLinks( $start, $pages, $itemsPerPage );
		?>
		
</body>
</html>
<?php

function createDataTable($start, $itemsPerPage){

	$qry = "SELECT CountryName, Imports, Exports FROM countries LIMIT $start, $itemsPerPage";
		
	echo "<table class=\"table\">
				<tr>
					<th class=\"countryname\">Country</th>
					<th class=\"countryvalue\">Imports</th>
					<th class=\"countryvalue\">Exports</th>
				</tr>\n";
				
				
	$dbc = connectToDB( "wfb2007" );
	$result = performQuery( $dbc, $qry );
	while (@extract( mysqli_fetch_array( $result, MYSQLI_ASSOC ) )) {
		echo "	<tr>
					<td>$CountryName</td>
					<td>$Imports</td>
					<td>$Exports</td>
				</tr>\n";
	}
	echo "</table>\n";
}
function findpages($itemsPerPage){
	if (isset($_GET['p'])){
		// get it from the URL if we've already been here
		$pages=$_GET['p'];
	} else {
	
		// starting new, so get it from the database
		$qry="SELECT COUNT(CountryCode) as count from countries;";
		
		$dbc = connectToDB("wfb2007");
		$result = performQuery($dbc, $qry);
		extract((array)mysqli_fetch_array($result, MYSQLI_ASSOC));
			
		if ($count > $itemsPerPage)
			$pages=ceil($count/$itemsPerPage);
		else
			$pages=1;
	}
	return $pages ;
}


function findstart(){
    // figure out where to start
	if (isset($_GET['s']))
		$start=$_GET['s'];
	else
		$start=0; // at the beginning
		
 	return $start ;
}

function createPageLinks($start, $pages, $itemsPerPage){
	
	// creating page links
	if ( $pages > 1 ) {
		
		// print Previous if not on the first page
		$currentPage = ( $start / $itemsPerPage ) + 1;
		if ($currentPage != 1){
			echo '<a href="paging.php?s='.($start - $itemsPerPage) . 
														'&amp;p=' . $pages . '"> Previous </a>';
		}
		
		// print page numbers
		for ($i=1; $i <= $pages; $i++) {
				if ($i != $currentPage) {
					echo '<a href="paging.php?s='. (( $itemsPerPage * ( $i - 1 ))) . 
												'&amp;p=' . $pages . '"> '. $i .'  </a>'."\n";
				}  else {
					echo $i . ' ';
				}
		}
	
		// print next if not on the last page
		if ( $currentPage != $pages ){
			echo '<a href="paging.php?s='. ($start + $itemsPerPage) . '&amp;p=' . 
												$pages . '"> Next </a>';
		}
	}
}

?>