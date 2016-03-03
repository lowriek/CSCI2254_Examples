
<?php
	//echo "<pre>"; print_r($_GET) ; echo "</pre>";
	if ( isset( $_GET['guess'] ) ) {
		if ( is_numeric ( $_GET['guess'] ) ) {
			$guess = $_GET['guess'];
			header("Location: guess.php?status=numeric&value=$guess");
		} else {
			header("Location: guess.php?status=notnumeric");
		}
	} else {
		header("Location: guess.php?status=noguess");
	}
?>