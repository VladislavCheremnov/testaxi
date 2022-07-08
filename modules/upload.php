<?php

    function image_upload()
    {
    
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        
        if($file_size > 0) 
        {
           return move_uploaded_file($file_tmp, "/opt/lampp/htdocs/axitest/img/".$file_name);
        }
    }

    function file_upload()
    {

        $file_name = $_FILES['pdf']['name'];
        $file_size = $_FILES['pdf']['size'];
        $file_tmp = $_FILES['pdf']['tmp_name'];

        if($file_size > 0) 
        {
            if($file_size < 8388608){
                return move_uploaded_file($file_tmp, "/opt/lampp/htdocs/axitest/files/".$file_name);
            } else {
                echo "Размер файла не должен превышать 1мб";
            }
        }
    }

?>