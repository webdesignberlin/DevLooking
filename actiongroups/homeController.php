<?php

include('./models/homeModel.php');

if($action == 'home'){
    $view = 'home';
}
else if($action == 'connect'){//home

    $client = new oauth_client_class;
    $client->debug = 0;
    $client->debug_http = 1;
    $client->server = 'github';
    $client->redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].
        dirname(strtok($_SERVER['REQUEST_URI'],'?')).'/index.php';

    $client->client_id = 'e66e6ec9c7f680faf807';
    $application_line = __LINE__;
    $client->client_secret = '4f03720300d8c6df5a02afcd27488afd4fdc5602';

    if(strlen($client->client_id) == 0
        || strlen($client->client_secret) == 0)
        die('fail');

    if(($success = $client->Initialize()))
    {
        if(($success = $client->Process()))
        {
            if(strlen($client->access_token))
            {
                $success = $client->CallAPI(
                    'https://api.github.com/user',
                    'GET', array(), array('FailOnAccessError'=>true), $user);
            }
        }
        $success = $client->Finalize($success);
    }
    if($client->exit)
        exit;
    if($success)
    {
        $user = get_object_vars($user);

        $id = $user['id'];

        if(!verifyUser($id)){
            registerUser($user);
        }
        else{
            updateUser($user);
        }

        connectUser($user);
    }

    header('Location: index.php');

    $view = 'home';
}
else{//default or undefined
    //stuff
    $view = 'home';
}

?>