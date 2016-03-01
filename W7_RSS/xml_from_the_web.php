<html>
<head>
    <title>XML demo 3: RSS News Viewer</title>
	<link rel="stylesheet" type="text/css" href="css/baseA.css" />	      
</head>
<body>
  <?php
  $feeds = array('http://rss.nytimes.com/services/xml/rss/nyt/Space.xml',
				  'http://www.usa.gov/rss/updates.xml',
				  'http://www.nasa.gov/rss/dyn/image_of_the_day.rss',
				  'http://cscilab.bc.edu/~csinsider/?feed=rss2',
				  'http://www.newyorker.com/feed/humor'
				);
  print_r($_GET);
  ?>
  <h1>RSS Feeds</h1>
  <?php
  create_form($feeds, "feed");
  
  if ( isset( $_GET['getfeed'] ) ) {
  	handle_form( $_GET['feed'] );	
  }
  
  ?>
  </body>
</html>
<?php
function handle_form( $myfeed ) {

	  $rss = simplexml_load_file( $myfeed );
 	  
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

      foreach ( $items as $item ) {
      	echo "<div class='news'>
      			<h2>$item->title<h2>\n";
        echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        echo $item->description . "<br><br>\n";
        echo "</div>";
      }
}

function create_form( $farray, $menuname ){
?>
<form method="get">
	<?php create_menu( $farray, $menuname ); ?>
	<input type="submit" name="getfeed" value="Get Feed!!">
</form>
<?php
}
function create_menu($farray, $menuname){
	$current_feed = isset( $_GET['feed'] ) ?  $_GET['feed'] : "";
	echo "<select name='$menuname'>";
	foreach ( $farray as $f ) {
		if ( $current_feed == $f )  {
			echo "<option value='$f' selected>$f</option>";
		} else {
			echo "<option value='$f'>$f</option>";
		}
	}
	echo '</select>';
}
