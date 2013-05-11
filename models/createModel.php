<?php
    function addProject($id, $name, $image, $description, $technology, $search){

        global $link;

        $name = mysqli_real_escape_string($link, $name);
        $image = mysqli_real_escape_string($link, $image);
        $description = mysqli_real_escape_string($link, $description);
        $technology = mysqli_real_escape_string($link, $technology);
        $search = mysqli_real_escape_string($link, $search);


        $query = 'INSERT INTO `projects` VALUES ("", "'.$id.'","'.$name.'","'.$image.'","'.$description.'","'.$technology.'","'.$search.'", NOW())';

        myQueryExec($query);
    }
?>