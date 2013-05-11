<?php

include('./models/homeModel.php');

if($action = 'home'){
    $view = 'home';
}
else if($action = 'connect'){//home

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
        die('Please go to Scoop.it Apps page https://www.scoopit.com/developers/apps , '.
            'create an application, and in the line '.$application_line.
            ' set the client_id to Consumer key and client_secret with Consumer secret. '.
            'The Callback URL must be '.$client->redirect_uri).' Make sure this URL is '.
            'not in a private network and accessible to the Scoop.it site.';

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

    var_dump(get_object_vars($user));
    }
    $view = 'home';
}
else{//default or undefined
    //stuff
    $view = 'home';
}

?>