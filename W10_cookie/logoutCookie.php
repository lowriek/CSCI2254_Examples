<?php
$debug = 0;

setcookie('loginCookieUser', 0, time()-3600);

header("Location: loginCookieForm.php");

?>