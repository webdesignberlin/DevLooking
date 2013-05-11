<?php

if($action = 'home'){//home

    //Github connect callback 1
    if(!empty($_GET['code'])){

        $postdata = http_build_query(
            array(
                'client_id' => 'e66e6ec9c7f680faf807',
                'client_secret' => '4f03720300d8c6df5a02afcd27488afd4fdc5602',
                'code' => $_GET['code']
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => "Content-type: application/x-www-form-urlencoded\r\nAccept: application/json",
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);

        $result = json_decode(file_get_contents('https://github.com/login/oauth/access_token', false, $context), true);

        if(empty($result['error'])){//no error
            if(!empty($result['access_token']) && !empty($result['token_type'])){//success
                var_dump($result['access_token']);
                var_dump($result['token_type']);

                $context = stream_context_create(array('http' => array('header' => 'Host: www.dev-looking.me')));

                $url = 'https://api.github.com/user?access_token='.$result['access_token'];

                $data = json_decode(file_get_contents($url, 0, $context));

                var_dump($data);
            }
        }


    }

    $view = 'home';
}
else{//default or undefined
    //stuff
    $view = 'home';
}

?>