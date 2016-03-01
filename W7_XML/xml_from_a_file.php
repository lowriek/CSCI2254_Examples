<html>
  <head>
    <title>XML Demo 1 Reading XML data from a file</title>
	<link rel="stylesheet" type="text/css" href="css/baseA.css" />	      
  </head>
  <body>
    <?php
      $file = "nutrition.xml";

      if (FALSE == $xmlstr=file_get_contents( $file ))
         die( "Unable to read XML file $file" );
      $xml = new SimpleXMLElement( $xmlstr );

      echo "Protein content of first food: ";
      echo $xml->food[0]->name."  ".$xml->food[0]->protein." grams<br/><br/>";

      # show all foods & proteins:
      echo "<table border=1>";
      echo "<tr><th>Name</th><th>Serving</th><th>Protein (grams)</th></tr>";
      foreach ( $xml -> food as $f ) {
		$name = $f->name;
        $serving = $f->serving;
        $servingUnits = $f->serving['units'];
        $protein = $f->protein;
        echo "<tr><td>$name</td><td>$serving $servingUnits</td><td>$protein</td></tr>";
      }
      echo "</table>";
    ?>
  </body>
</html>