<?PHP
        include_once("Loginer.php");
        include_once("filenames.php");
        include_once("log_error.php");
        
        $loginer = new Loginer();
                
        if (!$loginer->IsLogined()){
            if (isset($msg)){
                $log_error = new log_error();
                $log_error->set_error($msg, "log_error");
            }
            header("Location:".$main_page);
            exit;    
        }
?>
