<?
$xml = new SimpleXMLElement(file_get_contents("xml_example.xml"));
?>
<!DOCTYPE html>
<html>
<head>
  <title>xml examples</title>
</head>
<body>

<?php
echo listnames($xml);
?>

</body>
</html>
<?php
function listnames($xml){
	$test = $xml->xpath('/school//student');
	
		echo "<br>";
		$str = "";
		foreach ($test as $hgp) {
			if ($str == "")
				$str = $hgp->name;
			else
				$str .= ", ". $hgp->name;
		}
		return $str;
}
?>