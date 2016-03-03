<!DOCTYPE html>
<html>
  <head><title>Google Stock Price Grabber</title>
  <link rel="stylesheet" href="css/baseA.css" />
</head>
<body>
<?php
   $stock = 'GOOG';
   //$stock = 'AMZN';
   $stocklower = strtolower($stock);

   $page = 'http://finance.yahoo.com/q?s=' . $stock;
   echo "The url is $page";
   $content = file_get_contents($page);
   //echo "The content is " . htmlentities($content) . " <br />\n";

   //$pattern = '!Last Trade.*?([0-9]+\.[0-9]*)!';
   
   $pattern = "!yfs_l84_$stocklower\">([0-9,]+\.[0-9]*)!";

   echo "The pattern is " . htmlentities($pattern) . " <br />\n";

   preg_match_all($pattern, $content, $res);

   echo "The entire match is: " . htmlentities($res[0][0]) . "<br />\n";

   echo "The price of $stock is " . htmlentities($res[1][0]) . "<br />\n";

   //echo "The content is " . $content;
?>

</body>
</html>
