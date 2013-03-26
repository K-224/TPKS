<?php
    include_once 'DB_Connection.php';
    include_once 'filenames.php';
    
    if (empty($_POST['user_name'])|| empty($_POST['password1'])|| empty($_POST['password2']))
    {
        header('Location:'.$reg_page);
        exit;
    }
    
    $user_name = $_POST['user_name'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    
    if (strcmp($pass1,$pass2) != 0)
    {
        header('Locatiob:'.$reg_page);
        exit;
    }
    
    $db_connection = new DB_Connection();
    
    if ($db_connection->ExistUser($user_name))
    {
        header('Location:'.$reg_page);
        exit;
    }
    
    $db_connection->AddUser($user_name, $pass1);
    
    header("Location:".$main_page);
    exit;
    
?>
