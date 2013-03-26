<?php
    include_once 'DB_Connection.php';
    include_once 'filenames.php';
    include_once 'log_error.php';
    
    if (empty($_POST['user_name'])|| empty($_POST['password1'])|| empty($_POST['password2']))
    {
        header('Location:'.$reg_page);
        exit;
    }
    
    $user_name = $_POST['user_name'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    
    $log_error = new log_error();
    
    $exit_code = 0;
    
    if(!preg_match("/^[a-zA-Z0-9_]+$/", $user_name)) 
    {
        $log_error->set_error("Недопустимые символы в поле логин!", "login_error");
        header('Location:'.$reg_page);
        exit;
    }
    
    if(!preg_match("/^[a-zA-Z0-9_]+$/", $pass1)) 
    {
        $log_error->set_error("Недопустимые символы в поле пароль!", "pass_error");
        header('Location:'.$reg_page);
        exit;
    }
    
    if (strcmp($pass1,$pass2) != 0)
    {
        $log_error->set_error("Пароли не совпадают!", "pass_error");
        header('Location:'.$reg_page);
        exit;
    }
    
    
    $db_connection = new DB_Connection();
    
    if ($db_connection->ExistUser($user_name))
    {
        $log_error->set_error("Такой пользователь уже существует!", "login_error");
        header('Location:'.$reg_page);
        exit;
    }
    
    $db_connection->AddUser($user_name, $pass1);
    
    header("Location:".$main_page);
    exit;
    
?>
