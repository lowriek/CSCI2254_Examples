<html>
  <head>
    <title>XML Writer XML to a file</title>
	<link rel="stylesheet" type="text/css" href="css/baseA.css" />	  
  </head>
  <body>
      <?php
        $xml = new SimpleXMLElement( "<courses></courses>" );

        $course1=$xml->addChild( "course" );
        $course1->addChild( "name", "CSCI225401" );
        $course1->addChild("professor", "Lowrie");

        $course2=$xml->addChild( "course" );
        $course2->addChild( "name", "CSCI2271" );
        $course2->addChild( "professor", "Sciore" );

		echo "<pre>";
        echo htmlentities( $xml->asXML() ); # echo directly to page
        echo "</pre>";

        $xml->asXML("output.xml"); # save into file
        //show_source("output.xml"); # show file to page
      ?>
  </body>
</html>