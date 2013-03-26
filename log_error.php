<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of log_error
 *
 * @author Александр
 */
class log_error {
    function set_error($msg, $msg_name)
    {
        if (session_id() == '') session_start();
        $_SESSION[$msg_name] = $msg;
    }
    
    function get_error($msg_name)
    {
        if (session_id() == '') session_start();
        if (isset($_SESSION[$msg_name])){ 
            $result = $_SESSION[$msg_name];
            unset($_SESSION[$msg_name]);
            return $result;
        }
        else
            return "";
    }
    
    function error_setted($msg_name)
    {
        if (session_id() == '') session_start();
        return isset($_SESSION[$msg_name]);
    }
    
    function print_error($msg_name)
    {
        if (session_id() == '') session_start();
        if (isset($_SESSION[$msg_name])){ 
            $result = $_SESSION[$msg_name];
            unset($_SESSION[$msg_name]);
            echo $result;
        }
    }
}

?>
