<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title></title>
	
	<link rel="stylesheet" href="./styles/style.css">
	<link rel="stylesheet" href="./styles/select2.css">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Roboto+Slab:400,700" rel="stylesheet">

	<link rel="shortcut icon" href="favicon.ico">
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="https://raw.github.com/scottjehl/Respond/master/respond.min.js"></script>
	<![endif]-->
</head>
	
<body>
	<?php

    //On inclu le template
    $tpl_path = 'templates/'.$tpl.'.tpl';

    if (is_file($tpl_path)){
        $smarty->display('templates/header.tpl');
        $smarty->display($tpl_path);
    }
    else{
        echo "Page introuvable ('".$tpl_path."' inexistant ou innaccessible)";
    }

	?>

	<script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="./js/select2.min.js"></script>
	
	<script type="text/javascript" src="./js/script.js"></script>

	<script id="script_e23">
		$("#e13").select2();
		// $("#e13_ca").click(function() { $("#e13").val("CA").trigger("change"); });
		// $("#e13_ak_co").click(function() { $("#e13").val(["AK","CO"]).trigger("change"); });
	</script>

</body>
</html>