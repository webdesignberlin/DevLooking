<?php

include('./models/userModel.php');

if($action == 'user'){

    $user = intval($_GET['user'], 10);

    if($data = getUserData($user)){

        $smarty->assign('data', $data[0]);

        $tpl = 'user';
    }
    else{
        $tpl = 'home';
    }

}
else{
    $tpl = 'home';
}

?>