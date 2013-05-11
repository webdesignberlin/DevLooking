<?php

include('./models/createModel.php');

if($action = 'create'){//home

    $view = 'create';
}
else{//default or undefined
    //stuff
    $view = 'home';
}

?>