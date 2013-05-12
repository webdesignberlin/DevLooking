<?php
    function getUserData($id){

        global $link;

        $id = mysqli_real_escape_string($link, $id);

        $data = myQuerySelect('SELECT * FROM `users` WHERE `id` ='.$id);

        if(!empty($data)){
            return $data;
        }
        else{
            return false;
        }

    }
?>