<html>
  <head>
    <title>XML demo 3: RSS News Viewer</title>
  </head>
  <style>		
  
  .news {
			overflow: auto;
			height: 300px;
			border: 3px groove blue;	
		}
		
  </style>
  
  <body>
    <?php 
    $rss= new SimpleXMLElement(file_get_contents('http://rss.nytimes.com/services/xml/rss/nyt/Space.xml'));
    
      // Load and parse the XML document
      //$rss =  simplexml_load_file('http://www.usa.gov/rss/updates.xml');
     // $rss =  simplexml_load_file('http://www.nasa.gov/rss/dyn/image_of_the_day.rss');
 	  //$rss =  simplexml_load_file(c);
 	  
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
      	echo "<div class='news'>
      			<h2>$item->title<h2>\n";
        echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        echo $item->description . "<br><br>\n";
        echo "<hr></div>";
      }
    ?>
	
  </body>
</html>
