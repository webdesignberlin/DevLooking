<?php
//start the session
session_start();

//Inclusion config et tools
include('./includes/config.php');
include('./includes/tools.php');

//Valeur d'action par defaut
$action = $config['defaults']['action'];

//On verifie si une action est specifiee dans l'url
if(!empty($_GET['action'])){
	$action = $_GET['action'];
}
	
//On verifie que l'action est legal
if(!array_key_exists($action, $config['routes'])){
	die('action illegale');
}

//On inclue l'action group
$actiongroup_path = 'actiongroups/'.$config['routes'][$action].'Controller.php';
if(is_readable($actiongroup_path)){
	include($actiongroup_path);
}
else{
	die('le fichier '.$actiongroup_path." est inexistant ou innaccessible");
}


//On inclue la vue principal
include ('views/main.php');

?>