<?php
   include '../connect.php';
//    include '../functions.php';
    $notes_title        = filter('notes_title');
    $notes_content      = filter('notes_content');
    $notes_user         = filter('notes_user');
    $file_name          = upload("file");
    if($file_name != "fail"){
        $stmt = $con->prepare("  INSERT INTO
                                    `notes` (`notes_title`, `notes_content`, `notes_user` , `notes_image`)
                                VALUES 
                                    (:notes_title, :notes_content, :notes_user, :notes_image)
                            ");
    
        // Bind parameters
        $stmt->bindParam(':notes_title', $notes_title);
        $stmt->bindParam(':notes_content', $notes_content);
        $stmt->bindParam(':notes_user', $notes_user);
        $stmt->bindParam(':notes_image', $file_name);
        $stmt->execute();
    
        $count = $stmt->rowCount();
        if ($count > 0){
            echo json_encode(array("status" => "success"));
        }else{
            echo json_encode(array("status" => "failed"));
        }
    }
?>