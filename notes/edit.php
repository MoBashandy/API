<?php
   include '../connect.php';
   include '../functions.php';
    $notes_id           = filter('notes_id');
    $notes_title        = filter('notes_title');
    $file_name        = filter('file_name');
    $notes_content      = filter('notes_content');

    if(isset($_FILES['file'])){
        delete_file('../upload' , $file_name);
        $file_name          = upload("file");
    }
    
    $stmt = $con->prepare("  UPDATE `notes` 
                            SET 
                                `notes_title` = :notes_title,
                                `notes_content` = :notes_content,
                                `notes_image` = :notes_image
                            WHERE 
                                notes_id = :notes_id
                            ");
    
    // Bind parameters
    $stmt->bindParam(':notes_title', $notes_title);
    $stmt->bindParam(':notes_content', $notes_content);
    $stmt->bindParam(':notes_image', $file_name);
    $stmt->bindParam(':notes_id', $notes_id);
    $stmt->execute();
    
    $count = $stmt->rowCount();
    if ($count > 0){
        echo json_encode(array("status" => "success"));
    }else{
        echo json_encode(array("status" => "failed"));
    }
    ?>
