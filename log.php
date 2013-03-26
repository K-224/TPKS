<?php
    include_once("filenames.php");
    include_once("Loginer.php");
    include_once("log_error.php");
    
    $loginer = new loginer();
    $log_error = new log_error();
    
    if (!$loginer->CheckPOSTData())
    {
        $log_error->set_error("Заполните все поля!", "log_error");
    }
    else if (!$loginer->IsLogined()) {    
        $user_name = $_POST['login'];
        $pass = $_POST["password"];
        $loginer->Login($user_name,$pass);
        if (!$loginer->Login($user_name, $pass)){
            $loginer->UnLogin();
            $log_error->set_error("Неверная пара логин-пароль!", "log_error");
        }
    }
    
    header("Location:".$main_page);
    exit;
?>
