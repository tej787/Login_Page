<?php 

    if(isset($_POST['upload']))
    {
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tmp_loc = $_FILES['file']['tmp_name'];
        $file_store = "upload/" .$file_name;

        move_uploaded_file($file_tmp_loc, $file_store);
        echo"Uploading Successfully";
    }

?>