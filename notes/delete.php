<?php
   include '../connect.php';
   include '../functions.php';

    $notes_id            = filter('notes_id');
    $file_name           = filter('file_name');

    $stmt = $con->prepare("  DELETE FROM
                                notes
                            WHERE 
                                notes_id = :notes_id
                        ");

    // Bind parameters
    $stmt->bindParam(':notes_id', $notes_id);
    $stmt->execute();

    $count = $stmt->rowCount();
    if ($count > 0){
        delete_file('../upload' , $file_name);
        echo json_encode(array("status" => "success"));
    }else{
        echo json_encode(array("status" => "failed"));
    }
?>