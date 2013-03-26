<?php

class Loginer{
        
    function Loginer()
    {
        session_start();
    }
    
    function IsLogined(){
        if (empty($_SESSION['user_id'])) 
            return false;
        else 
            return true;
    }
    
    function Login(&$user_name, &$pass)
    {
        try{
            include_once 'DB_Connection.php';
            $db_UserInfo = new DB_Connection();
            //Получаем из базы данных пару (хеш, соль)
            $GetPass = $db_UserInfo->GetPass($user_name);
            //Разбираем пару
            $db_salt = $GetPass["salt"];
            $db_hash = $GetPass["hash"];
            $db_user_id = $GetPass["user_id"];
            //Удаляем временную переменную GetPass
            unset($GetPass);
            //Проверяем пароль, если пароль неправильный, то генерируем исключение.
            if (! Crypter::checkPass($pass, $db_salt, $db_hash)) throw new Exception();
            
            $_SESSION['user_id'] = $db_user_id;
            return true;
        }
        catch (Exception $e)
        {
            //Обрабатываем исключения
            return false;
        } 
    }
    
    //Отменяет авторизацию
    function UnLogin()
    {
        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);
        session_destroy();
    }
    
    //Проверяет, все ли данные необходимые для авторизации переданы
    function CheckPOSTData()
    {
        //return isset($_POST['password']) && isset($_POST['login']);
        return $_POST['password'] != '' && $_POST['login'] != '';
    }
}

?>
