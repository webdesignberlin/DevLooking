<?php

function signup_github(){
    $client_id = 'e66e6ec9c7f680faf807';
    $redirect_url = 'http://dev-looking.me/index.php';

    //get request , either code from github, or login request
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        //authorised at github
                if(isset($_GET['code']))
        {
            $code = $_GET['code'];

            //perform post request now
            $post = http_build_query(array(
                'client_id' => $client_id ,
                'redirect_uri' => $redirect_url ,
                'client_secret' => '4f03720300d8c6df5a02afcd27488afd4fdc5602',
                'code' => $code ,
            ));

            $context = stream_context_create(array("http" => array(
                "method" => "POST",
                "header" => "Content-Type: application/x-www-form-urlencodedrn" .
                            "Content-Length: ". strlen($post) . "rn".
                            "Accept: application/json" ,
                "content" => $post,
            )));

            $json_data = file_get_contents("https://github.com/login/oauth/access_token", false, $context);

            $r = json_decode($json_data , true);

            $access_token = $r['access_token'];

            $url = "https://api.github.com/user?access_token=$access_token";

            $data =  file_get_contents($url);

            //echo $data;
            $user_data  = json_decode($data , true);
            $username = $user_data['login'];


            $emails =  file_get_contents("https://api.github.com/user/emails?access_token=$access_token");
            $emails = json_decode($emails , true);
            $email = $emails[0];

            $signup_data = array(
                'username' => $username ,
                'email' => $email ,
                'source' => 'github' ,
            );

            signup_login_user($signup_data);
        }
        else
        {
            $url = "https://github.com/login/oauth/authorize?client_id=$client_id&redirect_uri=$redirect_url&scope=user";
            header("Location: $url");
        }
    }
}
?>