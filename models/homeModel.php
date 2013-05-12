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

        $score = getScore($company, $public_repos, $followers, $following, $public_gists);

        $query = 'INSERT INTO `users` VALUES ("'.$id.'","'.$login.'","'.$avatar_url.'","'.$html_url.'","'.$name.'","'.$hireable.'","'.$company.'","'.$blog.'","'.$location.'","'.$email.'","'.$bio.'","'.$score[2].'","'.$score[0].'","'.$score[1].'","'.$score[3].'")';

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

        $query = 'UPDATE `users`
        SET id="'.$id.'", login="'.$login.'", avatar_url="'.$avatar_url.'", html_url="'.$html_url.'", name="'.$name.'", company="'.$company.'", blog="'.$blog.'", location="'.$location.'", email="'.$email.'", hireable="'.$hireable.'", bio="'.$bio.'", score="'.$score[2].'", personal_score="'.$score[0].'", repos_score="'.$score[1].'", lan="'.$score[3].'" WHERE id = "'.$id.'"';

        myQueryExec($query);

        return $score;
    }

    function getRepos(){
        global $client;

        $url = 'https://api.github.com/user/repos';
        $method = 'GET';
        $parameters = array();
        $options = array();

        $success = $client->CallAPI($url, $method, $parameters, $options, $repos);

        $rs = 0;
        $lan = array();
        $resultLan = array();

            var_dump($repos);


        foreach($repos as $key=>$repo){
            $ar = get_object_vars($repo);

            if($ar['fork']){
                $rs += ($ar['size'] * 2);
                $rs += ($ar['forks_count'] * 345);
                $rs += ($ar['watchers'] * 310);
                $rs += ($ar['open_issues_count'] * -20);
                if($ar['has_downloads']){
                    $rs += 400;
                }
                if($ar['has_wiki']){
                    $rs += 350;
                }
            }

            if(!in_array($ar['language'], $lan)){
                $resultLan[$ar['language']] = 1;
            }
            else{
                $resultLan[$ar['language']] += 1;
            }

            $lan[$key] = $ar['language'];
        }


        $languages = json_encode($resultLan);

        $result = array($rs, $languages);
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

        $return = array($score, $reposScore[0], $reposScore[0] + $score, $reposScore[1]);

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