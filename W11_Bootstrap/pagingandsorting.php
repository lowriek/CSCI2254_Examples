<?php
	include('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Pageable Displays</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="page-header">
	  <h1>Import/Exports <small>with bootstrap</small></h1>
	</div>
</div>
<?php
	
	// pagination support
	$itemsPerPage=10;
	
	// figure out how many pages
	$pages = findpages($itemsPerPage);
	$start = findstart();
		
	$links = createSortLinks();
	
	echo '<div class="container"><div class="panel panel-default">
  		<div class="panel-heading">
    	<h3 class="panel-title">Table Data</h3>
  		</div>
  			<div class="panel-body">';

	createDataTable($start, $itemsPerPage, $links);
	
	 echo '</div>
	 	</div></div>
	 	
	 	<div class="well">';
	
	createPageLinks($start, $pages, $itemsPerPage, $links['orderby']);
	echo  	"</div>";
?>

</body>
</html>
<?

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
	return $pages;
}


function findstart(){
    // figure out where to start
	if (isset($_GET['s']))
		$start=$_GET['s'];
	else
		$start=0; // at the beginning
		
 	return($start);
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
		echo '<nav>
  		<ul class="pagination">';
		
		// print Previous if not on the first page
		$currentPage=($start/$itemsPerPage) + 1;
		if ($currentPage != 1){
		
			echo '<li><a href="'.$thispage.'?s='.($start - $itemsPerPage) . 
										'&amp;p=' . $pages . 
										'&amp;sort=' . $sort .
										'"  aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>';
		}
		
		// print page numbers
		for ($i=1; $i <= $pages; $i++) {
				if ($i != $currentPage) {
					echo '<li><a href="'.$thispage.'?s='.(($itemsPerPage * ($i-1))) . 
												'&amp;p=' . $pages . 
												'&amp;sort=' . $sort .
												'"> '. $i .'  </a>'."</li>\n";
				}  else {
				
					echo "<li class=\"active\"><span class=\"sr-only\">$i </span></a></li>";
				}
		}

	
		// print next if not on the last page
		if ($currentPage != $pages){
			echo ' <li><a href="'.$thispage.'?s='.($start + $itemsPerPage) . '&amp;p=' . 
												$pages . '"  aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a></li>';
		}
		
		echo '  </ul>
				</nav>';
	}
}




?>