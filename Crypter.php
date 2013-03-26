<?php

class Crypter {
    
   //$length - длина соли
   static function GetSalt($length) //Честно взято отсюда http://poleshuk.ru/generaciya-sluchajnoj-stroki-na-php/
   {
        //Задаём строку с символами
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        // длина строки с символами
        $chars_length = (strlen($chars) - 1);
        // создаем нашу строку,
        //извлекаем из строки $chars символ со случайным 
        //номером от 0 до длины самой строки
        $string = $chars{rand(0, $chars_length)};
        // генерируем нашу строку
        for ($i = 1; $i < $length; $i = strlen($string)){
        // выбираем случайный элемент из строки с допустимыми символами
        $random = $chars{rand(0, $chars_length)};
        // убеждаемся в том, что два символа не будут идти подряд
        if ($random != $string{$i - 1}) $string .= $random;
        }
        // возвращаем результат
        return $string;
    }
    
    static function getNewHash($pass)
    {
        //Генерируем новую соль
        $salt = Crypter::GetSalt(12);
        // Добавляем её в конец пароля
        $pass .= $salt;
        // Получем на его основе хеш-значение
        $hash = md5($pass);
        //Возвращаем пару, хеш и соль
        return array('hash' => $hash, 'salt' => $salt);
    }
    
    // $pass - введёный пароль
    // $db_salt - соль, полученная из базы данных
    // $db_hash - хэш, полученный из базы данных
    static function checkPass($pass, $db_salt, $db_hash)
    {
        //Проверяем совпадают ли значения
        if (strcmp(md5($pass.$db_salt),$db_hash) == 0) 
            return true;
        else 
            return false;
    }
    
}

?>
