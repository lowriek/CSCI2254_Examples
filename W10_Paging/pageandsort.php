<?php
	include('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Pageable Displays</title>
	<style>
		tr:nth-child(even) {
			background-color: #FF8000;
		}
	</style>		
    <!-- Bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.4/cerulean/bootstrap.min.css">
</head>
<body>

	<div class='container'>
		<div class="jumbotron">
			<h1>Page and Sort Example!</h1>
			<?php
				// pagination support
				$itemsPerPage=7;
	
				// figure out how many pages
				$pages = findpages( $itemsPerPage );
				$start = findstart();
	
				$links = createSortLinks();
				createDataTable($start, $itemsPerPage, $links);
			?>
		</div>
	</div>
	<div class="container">
		<div class="well">
			<?php
				createPageLinks($start, $pages, $itemsPerPage, $links['orderby']);
			?>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
<?php

function createDataTable($start, $itemsPerPage, $links){

	$qry = "SELECT CountryName, Imports, Exports FROM countries 
				ORDER BY {$links['orderby']}
				LIMIT $start, $itemsPerPage";
		
	echo "<table class=\"table\">
				<tr>
					<th class=\"countryname\"><a href={$links['country']}>Country</a></th>
					<th class=\"countryvalue\"><a href={$links['imports']}>Imports</a></th>
					<th class=\"countryvalue\"><a href={$links['exports']}>Exports</a></th>
				</tr>\n";
				
				
	$dbc = connectToDB("wfb2007");
	$result = performQuery($dbc, $qry);
	$class = "alt2";
	while (@extract(mysqli_fetch_array($result, MYSQLI_ASSOC))) {
		$class = ($class=='alt1' ? 'alt2':'alt1');
		echo "	<tr class=\"$class\">
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
	return($pages);
}


function findstart(){
    // figure out where to start
	if (isset($_GET['s']))
		$start=$_GET['s'];
	else
		$start=0; // at the beginning
		
 	return $start ;
}

function createSortLinks(){
	$countrylink = "{$_SERVER['PHP_SELF']}?sort=countryA";
	$importslink = "{$_SERVER['PHP_SELF']}?sort=importsA";   
	$exportslink = "{$_SERVER['PHP_SELF']}?sort=exportsA";   
	$orderby="CountryName ASC";
	
	$sort = isset($_GET['sort']) ? $_GET['sort']: "countryA" ;
	switch ($sort){
		case 'countryA':
			$orderby='CountryName ASC';
			$countrylink = "{$_SERVER['PHP_SELF']}?sort=countryD";
			break;
		
		case 'countryD':
			$orderby='CountryName DESC';
			$countrylink = "{$_SERVER['PHP_SELF']}?sort=countryA";
			break;
		
		case 'importsA':
			$orderby='Imports ASC';
			$importslink = "{$_SERVER['PHP_SELF']}?sort=importsD";
			break;
	
		case 'importsD':
			$orderby='Imports DESC';
			$importslink = "{$_SERVER['PHP_SELF']}?sort=importsA";
			break;		
			
		case 'exportsA':
			$orderby='Exports ASC';
			$exportslink = "{$_SERVER['PHP_SELF']}?sort=exportsD";
			break;
	
		case 'exportsD':
			$orderby='Exports DESC';
			$exportslink = "{$_SERVER['PHP_SELF']}?sort=exportsA";
			break;		

		default:
			break;
	}
	$links = array("country"=> $countrylink,
					"imports"=> $importslink,
					"exports"=> $exportslink,
					"orderby" => $orderby);
					
	return $links;
}

function createPageLinks($start, $pages, $itemsPerPage, $sort){
	$thispage = "{$_SERVER['PHP_SELF']}";
	$sort = isset($_GET['sort']) ? $_GET['sort']: "";
	echo "This page is $thispage";
	
	
	// creating page links
	if ($pages > 1) {
		echo '<br /><hr />';
		
		// print Previous if not on the first page
		$currentPage=($start/$itemsPerPage) + 1;
		if ($currentPage != 1){
			echo '<a href="'.$thispage.'?s='.($start - $itemsPerPage) . 
										'&amp;p=' . $pages . 
										'&amp;sort=' . $sort .
										'"> Previous </a>';
		}
		
		// print page numbers
		for ($i=1; $i <= $pages; $i++) {
				if ($i != $currentPage) {
					echo '<a href="'.$thispage.'?s='.(($itemsPerPage * ($i-1))) . 
												'&amp;p=' . $pages . 
												'&amp;sort=' . $sort .
												'"> '. $i .'  </a>'."\n";
				}  else {
					echo $i . ' ';
				}
		}
	
		// print next if not on the last page
		if ($currentPage != $pages){
			echo '<a href="'.$thispage.'?s='.($start + $itemsPerPage) . '&amp;p=' . 
												$pages . '"> Next </a>';
		}
	}
}

?>