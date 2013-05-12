<?php

include('./models/userModel.php');

if($action == 'user'){

    $user = intval($_GET['user'], 10);

    if($data = getUserData($user)){

        $total = 0;

        foreach($data as $key=>$elem){
            $array = array_reverse(json_decode($data[$key]['lan'], true));
            arsort($array, SORT_NUMERIC);
            $data[$key]['lan'] = $array;
        }

        foreach($data[$key]['lan'] as $value){
            $total += $value;
        }

        $data[0]['total'] = $total;


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