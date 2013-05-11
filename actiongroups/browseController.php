<?php
include('./models/createModel.php');

if($action = 'browse'){//home

    $tpl = 'browse';
}
else{//default or undefined
    //stuff
    $tpl = 'home';
}

?>