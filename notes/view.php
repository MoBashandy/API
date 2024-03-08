<?php
   include '../connect.php';
   include '../functions.php';

    $id      = filter('id');
    $stmt = $con->prepare(" SELECT * FROM notes 
                            WHERE 
                                `notes_user` = :id 
                        ");

    // Bind parameters
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data =$stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count > 0){
        echo json_encode(array("status" => "success" , "data" => $data));
    }else{
        echo json_encode(array("status" => "failed"));
    }
?>