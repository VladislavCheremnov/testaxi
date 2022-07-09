<?php
     $host = 'localhost';
     $user = 'root';
     $pass = '';
     $name = 'testaxi';
 
     $GLOBALS['link'] = mysqli_connect($host, $user, $pass, $name);
 
     function dbQuery(string $query)
     {
        return mysqli_real_query($GLOBALS['link'], $query);
     }
?>