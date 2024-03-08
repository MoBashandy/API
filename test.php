<?php 
    $text = "mo abo salah";
    $turn = explode(" " , $text);
    echo "<pre>";
    print_r($turn)  ;
    echo "</pre>";
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $text1 ="image.jpg";
    $turn1 = explode("." , $text1);
    echo "<pre>";
    print_r($turn1)  ;
    echo "</pre>";
    echo $turn1[1];
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $text2 ="image.jpg";
    $turn2 = explode("." , $text2);
    echo "<pre>";
    print_r($turn2)  ;
    echo "</pre>";
    echo end($turn1);
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    echo "<br>";
    $ext = end($turn2);
    $ex = array("jpg" , "png" , "gif");
    if ( in_array( $ext,$ex) ){
        echo("yes");
    }else{
        echo "no";
    }
?>