<?php
    function verifyUser($id){

        global $link;

        $id = mysqli_real_escape_string($link, $id);

        $data = myQuerySelect('SELECT * FROM `users` WHERE `id` ='.$id);

        if(!empty($data)){
            return true;
        }
        else{
            return false;
        }

    }

    function registerUser($user){

        global $link;

        $id = mysqli_real_escape_string($link, $user['id']);
        $login = mysqli_real_escape_string($link, $user['login']);
        $avatar_url = mysqli_real_escape_string($link, $user['avatar_url']);
        $html_url = mysqli_real_escape_string($link, $user['html_url']);
        $name = mysqli_real_escape_string($link, $user['name']);
        $company = mysqli_real_escape_string($link, $user['company']);
        $blog = mysqli_real_escape_string($link, $user['blog']);
        $location = mysqli_real_escape_string($link, $user['location']);
        $email = mysqli_real_escape_string($link, $user['email']);
        $hireable = mysqli_real_escape_string($link, $user['hireable']);
        $bio = mysqli_real_escape_string($link, $user['bio']);
        $public_repos = mysqli_real_escape_string($link, $user['public_repos']);
        $followers = mysqli_real_escape_string($link, $user['followers']);
        $following = mysqli_real_escape_string($link, $user['following']);
        $public_gists = mysqli_real_escape_string($link, $user['public_gists']);

        if(!empty($email)){
            $from = "Dev Looking <webmaster@dev-looking.me>";
            $to = "<".$email.">";
            $subject = "Register confirmation!";
            $body = "Thanxs for registered to dev-looking.me";

            $host = "ssl://in.mailjet.com";
            $port = "465";
            $username = "48447089a2d9f781a9eae7295d4dbd17";
            $password = "d76f454ea5c7a043d9ced6e6563a9bc0";

            $headers = array ('From' => $from,
                'To' => $to,
                'Subject' => $subject);
            $smtp = Mail::factory('smtp',
                array ('host' => $host,
                    'port' => $port,
                    'auth' => true,
                    'username' => $username,
                    'password' => $password));

            $mail = $smtp->send($to, $headers, $body);
        }

        $score = getScore($company, $public_repos, $followers, $following, $public_gists);

        $score[3] = mysqli_real_escape_string($link, $score[3]);

        $query = 'INSERT INTO `users` (id, login, avatar_url, html_url, name, company, blog, location, email, hireable, bio, score, personal_score, repos_score, lan, external_score)
        VALUES ("'.$id.'","'.$login.'","'.$avatar_url.'","'.$html_url.'","'.$name.'","'.$company.'","'.$blog.'","'.$location.'","'.$email.'","'.$hireable.'","'.$bio.'","'.$score[2].'","'.$score[0].'","'.$score[1].'","'.$score[3].'","'.$score[4].'")';

        myQueryExec($query);

        return $score;
    }

    function updateUser($user){

        global $link;

        $id = mysqli_real_escape_string($link, $user['id']);
        $login = mysqli_real_escape_string($link, $user['login']);
        $avatar_url = mysqli_real_escape_string($link, $user['avatar_url']);
        $html_url = mysqli_real_escape_string($link, $user['html_url']);
        $name = mysqli_real_escape_string($link, $user['name']);
        $company = mysqli_real_escape_string($link, $user['company']);
        $blog = mysqli_real_escape_string($link, $user['blog']);
        $location = mysqli_real_escape_string($link, $user['location']);
        $email = mysqli_real_escape_string($link, $user['email']);
        $hireable = mysqli_real_escape_string($link, $user['hireable']);
        $bio = mysqli_real_escape_string($link, $user['bio']);
        $public_repos = mysqli_real_escape_string($link, $user['public_repos']);
        $followers = mysqli_real_escape_string($link, $user['followers']);
        $following = mysqli_real_escape_string($link, $user['following']);
        $public_gists = mysqli_real_escape_string($link, $user['public_gists']);

        $score = getScore($company, $public_repos, $followers, $following, $public_gists);

        $score[3] = mysqli_real_escape_string($link, $score[3]);

        $query = 'UPDATE `users` SET id="'.$id.'", login="'.$login.'", avatar_url="'.$avatar_url.'", html_url="'.$html_url.'", name="'.$name.'", company="'.$company.'", blog="'.$blog.'", location="'.$location.'", email="'.$email.'", hireable="'.$hireable.'", bio="'.$bio.'", score="'.$score[2].'", personal_score="'.$score[0].'", repos_score="'.$score[1].'", lan="'.$score[3].'", external_score="'.$score[4].'" WHERE id = "'.$id.'"';

        myQueryExec($query);

        return $score;
    }

    function getExternal($path){
        global $client;

        $url = 'https://api.github.com/repos/'.$path.'/stats/commit_activity';
        $method = 'GET';
        $parameters = array();
        $options = array();

        $client->CallAPI($url, $method, $parameters, $options, $repos);

        $tot = 0;

        foreach($repos as $value){
            $tot += $value->total;
        }

        return $tot;
    }


    function getRepos(){
        global $client;

        $url = 'https://api.github.com/user/repos';
        $method = 'GET';
        $parameters = array();
        $options = array();

        $client->CallAPI($url, $method, $parameters, $options, $repos);

        $rs = 0;
        $lan = array();
        $resultLan = array();

        $external = 0;

        foreach($repos as $key=>$repo){

            $ar = get_object_vars($repo);

            if(!$ar['fork']){
                $external += (getExternal($ar['full_name']) * 30);
                $rs += ($ar['size'] * 1);
                $rs += ($ar['forks_count'] * 120);
                $rs += ($ar['watchers'] * 80);
                $rs += ($ar['open_issues_count'] * -20);
                if($ar['has_downloads']){
                    $rs += 200;
                }
                if($ar['has_wiki']){
                    $rs += 150;
                }
            }
            else{
                $external += intval(((getExternal($ar['full_name'])/4) * 1.5), 10);
            }

            if(!in_array($ar['language'], $lan)){
                $resultLan[$ar['language']] = 1;
            }
            else{
                $resultLan[$ar['language']] += 1;
            }

            $lan[$key] = $ar['language'];
        }

        $external = intval(($external * 0.8), 10);

        $languages = json_encode($resultLan);

        $result = array($rs, $languages, $external);
        return $result;
    }

    function getScore($company, $public_repos, $followers, $following, $public_gists){

        $reposScore = getRepos();

        $score = 0;

        if(!empty($company)){
            $score += 95;
        }

        $score += (intval($public_repos, 10) * 270);
        $score += (intval($followers, 10) * 186);
        $score += (intval($following, 10) * 125);
        $score += (intval($public_gists, 10) * 185);

        $score = intval(($score * 0.8), 10);
        $reposScore[0] = intval(($reposScore[0] * 0.8), 10);

        $return = array($score, $reposScore[0], $reposScore[0] + $reposScore[2] + $score, $reposScore[1], $reposScore[2]);

        return $return;

    }

    function connectUser($user){
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['avatar_url'] = $user['avatar_url'];
        $_SESSION['html_url'] = $user['html_url'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['company'] = $user['company'];
        $_SESSION['location'] = $user['location'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['score'] = $user['score'];
        $_SESSION['hireable'] = $user['hireable'];
    }
?>