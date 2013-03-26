<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?PHP
        include_once("Loginer.php");
        include_once("filenames.php");
        include_once("log_error.php");
        
        $loginer = new Loginer();
        
       $log_error = new log_error();
        if ($loginer->IsLogined()){
            $log_error->set_error("Вы уже зарегистрированы!", "log_error");
            header("Location:".$main_page);
            exit;    
        }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>

<style>

  .table {
 background:#ccc;
 border-radius: 5px;
}

::-webkit-input-placeholder {
   color: #bbb;
   border-radius: 5px;
}

:-moz-placeholder {
   color: #bbb;
   border-radius: 5px;
}                         

.placeholder{
    color: #bbb; /* polyfill */
	border-radius: 5px;
}        

#signup input{
    margin: 5px 0;
    padding: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;    
}

#signup input:focus{
        outline: 0;
        border-color: #aaa;
    box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
	border-radius: 5px;
}        

.RG{
width:100%;
height:100%;
color:#FFFFFF;
border:none;
border-radius: 5px;
  background-image: -moz-linear-gradient(rgb(0,51,51),rgb(0,51,51));
  background-image: -ms-linear-gradient(rgb(0,51,51),rgb(0,51,51));
  background-image: -o-linear-gradient(rgb(0,51,51),rgb(0,51,51));
  background-image: -webkit-linear-gradient(rgb(0,51,51),rgb(0,51,51));                                     
}

.RG:hover{
color:#000000;
  background: -moz-radial-gradient(rgb(255,255,255), rgb(0,51,51));
  background: -ms-radial-gradient(rgb(255,255,255), rgb(0,51,51));
  background: -o-radial-gradient(rgb(255,255,255), rgb(0,51,51));
  background: -webkit-radial-gradient(rgb(255,255,255), rgb(0,51,51));
}

.RG:active{
    position: relative;
    top: 3px;
    text-shadow: none;
    box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
}

BAD{
	color:#FF0000;
}


</style>


</head>

<body>

<table width="500px" border="0" align="center" cellspacing="10" class="table" id="Table1">
<tr>
<td>
<H1>Регистрация</H1>
</td>
</tr>

<tr>
<td>
<form class="registration" method='POST' action=reg.php>
<table width="300" border="0" align="center" cellspacing="10">
<tr>
    <td>
    <input placeholder="Логин" required="" type="login" name="user_name" size="50">  
    </td>
</tr>
    <?PHP if ($log_error->error_setted("login_error")) echo "<tr><td><BAD>".$log_error->get_error("login_error")."</BAD></td></tr>";?>
    <tr>
<td>
    <input placeholder="Выберите пароль" required="" type="password" id="passwordl" name="password1" size="50">
        </td>
    </tr>
    <tr>
<td>
    <input placeholder="Повторите пароль" required="" type="password" id="password2" name="password2" size="50"> 
        </td>
    </tr> 
    <?PHP if ($log_error->error_setted("pass_error")) echo "<tr><td><BAD>".$log_error->get_error("pass_error")."</BAD></td></tr>";?>
    <tr>
<td height="30">            
    <input class="RG"  value="Регистрация" type="submit" >
	</input>
        </td>
    </tr></table>    

</form>
</td>
</tr>
</table>
</body>
</html>
