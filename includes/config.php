<?php

// config['routes'] liste les actions legales
// et le sous-controllers correspondant
$config['routes'] = array(
	"home"	=> "home",
	"create" => "create",
	
);

//on defini la racine
$racineBase = "files";
if(isset($_SESSION['id'])){
    $racine = "files/".$_SESSION['id'];
}

//Mode Debugg
$DEBUG = true;//"true" pour active

//action par defaut
$config['defaults']['action'] = "home";

?>