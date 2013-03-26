<?php

include_once 'Crypter.php';
include_once 'Loginer.php';
//include_once 'db_login.php';


class DB_Connection {

    function DB_Connection()
    {
        $connection = mysql_connect("sql313.500mb.net", "runet_12613180", "cyber224");
        //$connection = mysql_connect("localhost", "runet_12613180", "");
        if (!$connection)
        {
            die("Невозможно подключиться к базе данных: ".mysql_error()); //Нужно изменить на вызов Exception
        }
        
        $db_select = mysql_select_db("runet_12613180_paris");
        if (!$db_select)
        {
            die("Невозможно выбрать базу данных: ".mysql_error());
        }
    }

    function GetPass(&$user_name)
    {
        //Запрашиваем в БД id пользователя, хеш его пароля и соль
        $query = "SELECT user_id, hash, salt FROM user WHERE user_name = '".$user_name."'";
        
        $result = mysql_query($query);
        if (!$result)
        {
            die("Невозможно исполнить запрос к базе данных: ".mysql_error());
        }
        
        //Всё OK, поэтому теперь определяем количество полученных из базы данных строк
        $reuslt_len = mysql_num_rows($result);
        //Если получили одну строку, то всё нормально возвращаем результат в виде ассоциативного массива
        if ($reuslt_len == 1)
            return mysql_fetch_array($result, MYSQL_ASSOC);
        else 
            //Всё плохо, если количество строк 0, то значит такого пользователя нет, если больше чем 1, то значит нарушена целостность БД.
            throw new Exception('Пользователь не найден!');
        
        /*if (array_key_exists($user_name, $this->user_list))
            return $this->user_list[$user_name];
        else 
            throw new Exception('Пользователь не найден!');*/
    }

    function ExistUser(&$user_name)
    {
        $query = "SELECT user_name FROM user WHERE user_name = '".$user_name."'";
        //Делаем запрос к БД, и проверяем, что количество полученных из БД результатов равно 1.
        return mysql_num_rows(mysql_query($query)) == 1;
    }

    function AddUser(&$user_name, &$pass)
    {
        $crypter = new Crypter();
        $hash_salt = $crypter->getNewHash($pass);
        $query = "INSERT INTO user (user_name, hash, salt) VALUES ('".$user_name."','".$hash_salt['hash']."','".$hash_salt['salt']."')";
        $result = mysql_query($query);
        if (!$result)
        {
            die("Не удалось добавить нового пользователся: ".mysql_error());
        }
    }    

}

?>
