<?php
include('./models/browseModel.php');

if($action = 'browse'){//home

    if(empty($_POST['query'])){
        if($data = getUsersData()){

            foreach($data as $key=>$elem){
                    $array = array_reverse(json_decode($data[$key]['lan'], true));
                    arsort($array, SORT_NUMERIC);
                    $data[$key]['lan'] = $array;
            }

            $smarty->assign('datas', $data);

            $tpl = 'browse';
        }
        else{
            $tpl = 'home';
        }
    }
    else{

    }

    $tpl = 'browse';
}
else{//default or undefined
    //stuff
    $tpl = 'home';
}

?>