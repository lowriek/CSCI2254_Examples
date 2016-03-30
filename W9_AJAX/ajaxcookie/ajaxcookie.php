<?php // note that this is not a complete page.

	switch($_GET['op']) {
		case 'setcookie':
			setcookie("MyAjaxCookie", 42); 
			echo "set MyAjaxCookie"; 
			break;
			
		case 'getcookie':
			print_r($_COOKIE);

			foreach ($_COOKIE as $key=>$value)
				echo "\$_COOKIE['$key'] = $value<br />";
			
			break;
			
		case 'clearcookie':
			setcookie('MyAjaxCookie', 0, time()-3600);
			echo "cleared MyAjaxCookie";
			break;
			
		default:
			echo "bad op"; 
			break;
	}
	
