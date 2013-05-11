<?php

if($action = 'home'){//home

    //Github connect callback 1
    if(!empty($_GET['code'])){
        echo $_GET['code'];
        header('Location: https://github.com/login/oauth/access_token?client_id=e66e6ec9c7f680faf807&client_secret=4f03720300d8c6df5a02afcd27488afd4fdc5602&code='.$_GET['code']);
    }

    $view = 'home';
}
else{//default or undefined
    //stuff
    $view = 'home';
}

?>