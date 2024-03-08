<?php
   include '../connect.php';
   include '../functions.php';
    $username   = filter('username');
    $email      = filter('email');
    $password   = filter('password');
    $hash =sha1($password);
    $stmt = $con->prepare("  INSERT INTO
                                `users` (`username`, `email`, `password`)
                            VALUES 
                                (:username, :email, :password)
                        ");

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hash);
    $stmt->execute();

    $count = $stmt->rowCount();
    if ($count > 0){
        echo json_encode(array("status" => "success"));
    }else{
        echo json_encode(array("status" => "failed"));
    }
?>