<?php
include('./models/browseModel.php');

if($action = 'browse'){//home

    if(empty($_POST['query']) && empty($_POST['query-type'])){
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
        if($_POST['query-type'] == 'lan'){

            if($data = getUsersData($_POST['query'])){

                foreach($data as $key=>$elem){
                    $array = array_reverse(json_decode($data[$key]['lan'], true));
                    arsort($array, SORT_NUMERIC);
                    $data[$key]['lan'] = $array;
                }

                $smarty->assign('datas', $data);

                $tpl = 'browse';
            }
            else{
                $smarty->assign('empty', 'ok');
            }
        }
        else{
            if($data = getUsersDataSort($_POST['query-type'])){

                foreach($data as $key=>$elem){
                    $array = array_reverse(json_decode($data[$key]['lan'], true));
                    arsort($array, SORT_NUMERIC);
                    $data[$key]['lan'] = $array;
                }

                $smarty->assign('datas', $data);

                $tpl = 'browse';
            }
            else{
                $smarty->assign('empty', 'ok');
            }
        }
    }

    $tpl = 'browse';
}
else{//default or undefined
    //stuff
    $tpl = 'home';
}

?>