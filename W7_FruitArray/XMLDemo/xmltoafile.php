<html>
  <head>
    <title>XML Writer XML to a file</title>
  </head>
  <body>
      <?php
        $xml = new SimpleXMLElement("<courses></courses>");

        $course1=$xml->addChild("course");
        $course1->addChild("name", "CS10101");
        $course1->addChild("professor", "Ames");

        $course2=$xml->addChild("course");
        $course2->addChild("name", "CS25401");
        $course2->addChild("professor", "Lowrie");

		echo "<pre>";
        echo htmlentities($xml->asXML()); # echo directly to page
        echo "</pre>";

        $xml->asXML("output.xml"); # save into file
        //show_source("output.xml"); # show file to page
      ?>
  </body>
</html>