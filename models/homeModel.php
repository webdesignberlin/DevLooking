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
        $query = 'INSERT INTO `users` VALUES ("'.$id.'","'.$login.'","'.$avatar_url.'","'.$html_url.'","'.$name.'","'.$company.'","'.$blog.'","'.$location.'","'.$email.'","'.$bio.'","'.$public_repos.'","'.$followers.'","'.$following.'","'.$public_gists.'")';

        myQueryExec($query);

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

        $query = 'UPDATE `users` SET id="'.$id.'", login="'.$login.'", avatar_url="'.$avatar_url.'", html_url="'.$html_url.'", name="'.$name.'", company="'.$company.'", blog="'.$blog.'", location="'.$location.'", email="'.$email.'", bio="'.$bio.'", public_repos="'.$public_repos.'", followers="'.$followers.'",  following="'.$following.'",  public_gists="'.$public_gists.'" WHERE id = "'.$id.'"';

        myQueryExec($query);

    }

    function connectUser($user){
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['avatar_url'] = $user['avatar_url'];
        $_SESSION['html_url'] = $user['html_url'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['id'] = $user['id'];

    }
?>