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
        $bio = mysqli_real_escape_string($link, $user['bio']);
        $public_repos = mysqli_real_escape_string($link, $user['public_repos']);
        $followers = mysqli_real_escape_string($link, $user['followers']);
        $following = mysqli_real_escape_string($link, $user['following']);
        $public_gists = mysqli_real_escape_string($link, $user['public_gists']);

        $score = getScore($company, $public_repos, $followers, $following, $public_gists);

        $query = 'INSERT INTO `users` VALUES ("'.$id.'","'.$login.'","'.$avatar_url.'","'.$html_url.'","'.$name.'","'.$company.'","'.$blog.'","'.$location.'","'.$email.'","'.$bio.'","'.$score.'")';


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
        $bio = mysqli_real_escape_string($link, $user['bio']);
        $public_repos = mysqli_real_escape_string($link, $user['public_repos']);
        $followers = mysqli_real_escape_string($link, $user['followers']);
        $following = mysqli_real_escape_string($link, $user['following']);
        $public_gists = mysqli_real_escape_string($link, $user['public_gists']);

        $score = getScore($company, $public_repos, $followers, $following, $public_gists);

        $query = 'UPDATE `users`
        SET id="'.$id.'", login="'.$login.'", avatar_url="'.$avatar_url.'", html_url="'.$html_url.'", name="'.$name.'", company="'.$company.'", blog="'.$blog.'", location="'.$location.'", email="'.$email.'", bio="'.$bio.'", score="'.$score.'" WHERE id = "'.$id.'"';

        myQueryExec($query);

        return $score;
    }

    function getScore($company, $public_repos, $followers, $following, $public_gists){

        $score = 0;

        if(!empty($company)){
            $score .= 95;
        }
        echo $score.'<br>';
        $score .= (intval($public_repos, 10) * 470);
        echo $score.'<br>';
        $score .= (intval($followers, 10) * 186);
        echo $score.'<br>';

        $score .= (intval($following, 10) * 125);
        echo $score.'<br>';

        $score .= (intval($public_gists, 10) * 185);
        echo $score.'<br>';


        return $score;

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
    }
?>