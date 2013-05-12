<?php
    function getUsersData(){

        global $link;

        $data = myQuerySelect('SELECT * FROM `users` ORDER BY score DESC');

        if(!empty($data)){
            return $data;
        }
        else{
            return false;
        }

    }
?>