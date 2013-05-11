<!DOCTYPE html>
<html>
	
	<head>
		
		<!--  TITLE  -->
		<title></title>
		
		<!--  META DATA  -->
		<meta name="description" content="">
		<meta name="Keywords" content="">
		<meta name="Author" content="">
		<!--  META DATA  -->
		
		<!--  STYLE   -->
		<link rel="stylesheet" href="./styles/style.css" type="text/css">
		<!--  STYLE   -->
		
	</head>
	
	<body>
		<?php

			$view_path = 'views/'.$view.'.php';

			if (is_file($view_path)){
				include($view_path);
			}
			else{
				echo "Page introuvable ('".$view_path."' inexistant ou innaccessible)";
			}

		?>

        <script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="./js/script.js"></script>
	</body>
</html>