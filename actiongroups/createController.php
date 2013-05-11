<?php
if(isset($_SESSION['id'])){

    include('./models/createModel.php');

    if($action = 'create'){//home

        if(!empty($_POST)){
            if(!empty($_POST['name']) && !empty($_POST['description']) &&
                !empty($_POST['technology']) && !empty($_POST['search'])){

                if(strlen($_POST['name']) < 4){
                    $error['name'] = 'Too short';
                }

                if(strlen($_POST['description']) < 50){
                    $error['description'] = 'Too short';
                }

                if((!empty($_FILES['image']['tmp_name']) && ($_FILES['image']['error'] == UPLOAD_ERR_OK))){
                    $filePath = $_FILES['image']['tmp_name'];

                    move_uploaded_file($filePath, './uploads/'.$_FILES['image']['name']);
                }

                if(!isset($error)){
                    addProject($_SESSION['id'], $_POST['name'], $_FILES['image']['name'], $_POST['description'], $_POST['technology'], $_POST['search']);
                    //@TODO: change
                    $tpl = 'create';
                }
                else{
                    $smarty->assign('data', $_POST);
                    $smarty->assign('error', $error);
                    $tpl = 'create';
                }
            }
            else{
                $smarty->assign('empty', 'ok');
                $tpl = 'create';
            }
        }
        $tpl = 'create';
    }
    else{//default or undefined
        //stuff
        $tpl = 'home';
    }
}
else{
    $tpl = 'home';
}

?>