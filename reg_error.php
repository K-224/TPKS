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
class reg_error {
    function set_error($msg, $msg_name)
    {
        if (session_id() == '') session_start();
        $_SESSION['login_error'] = $msg;
    }
   
    
    function get_error($msg_name)
    {
        if (session_id() == '') session_start();
        if (isset($_SESSION['log_error'])){ 
            $result = $_SESSION['log_error'];
            unset($_SESSION['log_error']);
            return $result;
        }
        else
            return "";
    }
}

?>
