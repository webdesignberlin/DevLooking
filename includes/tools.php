<?php
//-- MYSQL CONNECT --//
/*
$link = mysqli_connect('localhost', 'root', '', 'aero');//dont look my password :O
mysqli_query($link, "SET NAMES 'utf8'");
if($link == false){
    die(mysqli_connect_error());
}
*/
//-- MYSQL CONNECT --//

//-- DATABASE SQL --//
function myQuerySelect($query){

    global $link;

    $result = mysqli_query($link, $query);

    if (!$result){
        die("Erreur lors de l'execution d'une requete (" .mysqli_errno($link) . ') '. mysqli_error($link).' '.$query);
    }

    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    
    return $data;

}

function myQueryExec($query){

    global $link;

    $result = mysqli_query($link, $query);

    if (!$result){
        die("Erreur lors de l'execution d'une requete (" .mysqli_errno($link) . ') '. mysqli_error($link).' '.$query);
    }

}
//-- DATABASE SQL --//

//-- EMAIL CHECK --//
function emailCheck($email){

    $regex = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';//dat regex
    if(preg_match($regex,$email)){
        return true;
    }
    else{
        return false;
    }

}
//-- EMAIL CHECK --//

//-- PASSWORD HASH --//
function passwordHash($password){

    $hashedPassword = hash("sha256", 'coucou'.$password);//HASH!

    return $hashedPassword;

}
//-- PASSWORD HASH --//


function dat_error_handle($errno, $errstr){

    //handle error
}
//-- MEGA FUNCTION --//


//Error handle
if($DEBUG == false){
    set_error_handler("dat_error_handle");
}
?>