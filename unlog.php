<?php
    include_once("Loginer.php");
    include_once("filenames.php");
    
    
    $loginer = new Loginer();
    if ($loginer->IsLogined()){
        $loginer->UnLogin();
    }
    header("Location:".$main_page); 
    exit;
?>
