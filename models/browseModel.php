<?php
    function getUsersData($query=null){

        global $link;

        if(!$query){
            $data = myQuerySelect('SELECT * FROM `users` ORDER BY score DESC');
        }
        else{
            $data = myQuerySelect("SELECT * FROM `users` WHERE `lan` LIKE '%$query%' ORDER BY score DESC");
        }

        if(!empty($data)){
            return $data;
        }
        else{
            return false;
        }

    }

    function getUsersDataSort($query){

        global $link;
        $query = mysqli_real_escape_string($link, $query);

        $data = myQuerySelect('SELECT * FROM `users` ORDER BY '.$query.' DESC');

        if(!empty($data)){
            return $data;
        }
        else{
            return false;
        }

    }
?>