<?php
// قيمة ثابتة 
    define("MB" , 1048576);

    function filter($requestname){
        return htmlspecialchars(strip_tags($_POST[$requestname]));
    }

    function upload($requestname){
        global $msg_error;
        $file_name  = rand(1000 ,100000) . $_FILES[$requestname]['name'];
        $file_tmp   = $_FILES[$requestname]['tmp_name'];
        $file_size  = $_FILES[$requestname]['size'];
        $allow      = array("jpg" , "png" , "gif" , "mp3" , "pdf");
        $sta        = explode( "." , $file_name );
        $ext        = end($sta);
        $ext        = strtolower($ext);
        if(!empty($file_name) && !in_array($ext , $allow)){
            $msg_error[] = "Ext";
        }
        if($file_size > 100 * MB){
            $msg_error[] ="size error";
        }
        if (empty($msg_error)) {
            move_uploaded_file($file_tmp , "../upload/" . $file_name);
            return $file_name;
        }else {
            return "fail";
        }
    }

    function delete_file($dir , $file_name){
        if(file_exists($dir . "/" . $file_name)){
            unlink($dir . "/" . $file_name);
        }
    }

    

    function checkAuthenticate(){
        if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
    
            if ($_SERVER['PHP_AUTH_USER'] != "mo" ||  $_SERVER['PHP_AUTH_PW'] != "1234"){
                header('WWW-Authenticate: Basic realm="My Realm"');
                header('HTTP/1.0 401 Unauthorized');
                echo 'Page Not Found';
                exit;
            }
        } else {
            exit;
        }
    }
?>