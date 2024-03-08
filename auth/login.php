<?php
   include '../connect.php';
   include '../functions.php';

    $email      = filter('email');
    $password   = filter('password');
    $hash =sha1($password);
    $stmt = $con->prepare(" SELECT * FROM users 
                            WHERE 
                                `password` = :password 
                            AND
                                email = :email
                        ");

    // Bind parameters
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hash);
    $stmt->execute();
    $data =$stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count > 0){
        echo json_encode(array("status" => "success" , "data" => $data));
    }else{
        echo json_encode(array("status" => "failed"));
    }
?>