<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>RSS Reader</title>
	<link rel="stylesheet" type="text/css" href="css/baseA.css" />	  
</head>
<body>
<?php // Load and parse the XML document

	$rss =  simplexml_load_file('http://www.boston.com/tag/weather-wisdom/feed');
	//$rss =  simplexml_load_file('http://syndication.boston.com/news?mode=rss_10');
	$title =  $rss->channel->title;
	echo "<h1>$title</h1>";

	# I would like to do this:
	#     foreach ($rss->channel->item as $item) {
	# or this:
	#     foreach ($rss->item as $item) {
	# but which one depends on the rss version in use.

	$items = $rss->channel->item; # try, works some versions
	if (!$items)
		$items = $rss->item; # works other versions

	foreach ($items as $item) {
        echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        echo $item->description . "\n";
	}
?>
</body>
</html>
