<?php

include('./models/createModel.php');

if($action = 'create'){//home

    $tpl = 'create';
}
else{//default or undefined
    //stuff
    $tpl = 'home';
}

?>