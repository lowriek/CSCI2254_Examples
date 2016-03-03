<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Testing PCRE</title>
	<link rel="stylesheet" href="css/base2.css" />
</head>
<body>
<?php // Script 13.2 - matches.php

// This script takes a submitted string and checks it against a submitted pattern.
// This version prints every match made.

if (isset($_POST['submitted'])) {

    // Trim the strings:
    $pattern = stripslashes(trim($_POST['pattern']));
    $subject = stripslashes(trim($_POST['subject']));

    // Print a caption:
    echo "<p>The result of checking<br /><b>$pattern</b><br />against<br />$subject<br />is ";

    // Test:
    if (preg_match_all ($pattern, $subject, $matches) ) {
        echo 'TRUE!</p>';

        // Print the matches:
        echo '<pre>' . print_r($matches, 1) . '</pre>';

    } else {
        echo 'FALSE!</p>';
    }

} // End of submission IF.
// Display the HTML form.
?>
<form action="matches.php" method="post">
    <p>Regular Expression Pattern: <input type="text" name="pattern" value="<?php if (isset($pattern)) echo $pattern; ?>" size="50" /> (include the delimiters)</p>
    <p>Test Subject: <textarea name="subject" rows="5" cols="30"><?php if (isset($subject)) echo $subject; ?></textarea></p>
    <input type="submit" name="submit" value="Test!" />
    <input type="hidden" name="submitted" value="TRUE" />
</form>


<!-- summary of patterns -->
<br /><br />
<table border="1">
  <tr><th colspan="2">Meta-Characters</th>                  <th colspan="2">Quantifiers</th>                  <th colspan="3">Character Classes</th></tr>
  <tr><td>Character</td><td>Meaning</td>                    <td>Character</td><td>Meaning</td>                <td>Class</td><td>Shortcut</td><td>Meaning</td></tr>
  <tr><td>\</td><td>Escape character</td>                   <td>?</td><td>0 or 1</td>                         <td>[0-9]</td><td>\d</td><td>Any digit</td></tr>
  <tr><td>^</td><td>Indicates the beginning of a string</td><td>*</td><td>0 or more (greedy)</td>             <td>[\f\r\t\n\v]</td><td>\s</td><td>Any white space</td></tr>
  <tr><td>$</td><td>Indicates the end of a string</td>      <td>+</td><td>1 or more (greedy)</td>             <td>[A-Za-z0-9_]</td><td>\w</td><td>Any word character</td></tr>
  <tr><td>.</td><td>Any single character except newline</td><td>{x}</td><td>Exactly x occurrences</td>        <td>[^0-9]</td><td>\D</td><td>Not a digit</td></tr>
  <tr><td>|</td><td>Alternatives (or)</td>                  <td>{x,y}</td><td>Between x and y (inclusive)</td><td>[^\f\r\t\n\v]</td><td>\S</td><td>Not white space</td></tr>
  <tr><td>[</td><td>Start of a class</td>                   <td>{x,}</td><td>At least x occurrences</td>      <td>[^A-Za-z0-9_]</td><td>\W</td><td>Not a word character</td></tr>
  <tr><td>]</td><td>End of a class</td>                     <td></td><td></td>                                <td></td><td></td><td></td></tr>
  <tr><td>(</td><td>Start of a subpattern</td>              <td>*?</td><td>0 or more (lazy)</td>              <td></td><td></td><td></td></tr>
  <tr><td>)</td><td>End of a subpattern</td>                <td>+?</td><td>1 or more (lazy)</td>              <td></td><td></td><td></td></tr>
  <tr><td>{</td><td>Start of a quantifier</td>              <td></td><td></td>                                <td></td><td></td><td></td></tr>
  <tr><td>}</td><td>End of a quantifier</td>                <td></td><td></td>                                <td></td><td></td><td></td></tr>
</table>

</body>
</html>
