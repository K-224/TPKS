<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>

<style>

.enter {
width:100%;
height:100%;
	color:#FFFFFF;
	border:none;
	border-radius: 5px;
  background-image: -moz-linear-gradient(rgb(0,204,0),rgb(0,204,0));
  background-image: -ms-linear-gradient(rgb(0,204,0),rgb(0,204,0));
  background-image: -o-linear-gradient(rgb(0,204,0),rgb(0,204,0));
  background-image: -webkit-linear-gradient(rgb(0,204,0),rgb(0,204,0)); 
} 
.enter:hover {
	color:#000000;
  background: -moz-radial-gradient(rgb(255,255,255),rgb(0,204,0));
  background: -ms-radial-gradient(rgb(255,255,255),rgb(0,204,0));
  background: -o-radial-gradient(rgb(255,255,255),rgb(0,204,0));
  background: -webkit-radial-gradient(rgb(255,255,255),rgb(0,204,0));
}


.PR {
width:100%;
height:100%;
color:#FFFFFF;
border:none;
border-radius: 5px;
  background-image: -moz-linear-gradient(rgb(204,51,0), rgb(204,51,0));
  background-image: -ms-linear-gradient(rgb(204,51,0), rgb(204,51,0));
  background-image: -o-linear-gradient(rgb(204,51,0), rgb(204,51,0));
  background-image: -webkit-linear-gradient(rgb(204,51,0), rgb(204,51,0)); 
} 
.PR:hover {
color:#000000;
  background: -moz-radial-gradient(rgb(255,255,255), rgb(204,51,0));
  background: -ms-radial-gradient(rgb(255,255,255), rgb(204,51,0));
  background: -o-radial-gradient(rgb(255,255,255), rgb(204,51,0));
  background: -webkit-radial-gradient(rgb(255,255,255), rgb(204,51,0));
}

.RG {
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
.RG:hover {
color:#000000;
  background: -moz-radial-gradient(rgb(255,255,255), rgb(0,51,51));
  background: -ms-radial-gradient(rgb(255,255,255), rgb(0,51,51));
  background: -o-radial-gradient(rgb(255,255,255), rgb(0,51,51));
  background: -webkit-radial-gradient(rgb(255,255,255), rgb(0,51,51));
}

.INFO {
width:100%;
height:100%;
color:#FFFFFF;
border:none;
border-radius: 5px;
  background-image: -moz-linear-gradient(rgb(0,204,0),rgb(0,204,0));
  background-image: -ms-linear-gradient(rgb(0,204,0),rgb(0,204,0));
  background-image: -o-linear-gradient(rgb(0,204,0),rgb(0,204,0));
  background-image: -webkit-linear-gradient(rgb(0,204,0),rgb(0,204,0)); 
} 
.INFO:hover {
	color:#000000;
  background: -moz-radial-gradient(rgb(255,255,255),rgb(0,204,0));
  background: -ms-radial-gradient(rgb(255,255,255),rgb(0,204,0));
  background: -o-radial-gradient(rgb(255,255,255),rgb(0,204,0));
  background: -webkit-radial-gradient(rgb(255,255,255),rgb(0,204,0));
}

.LK {
width:100%;
height:100%;
color:#FFFFFF;
border:none;
border-radius: 5px;
  background-image: -moz-linear-gradient(rgb(0,102,255),rgb(0,102,255));
  background-image: -ms-linear-gradient(rgb(0,102,255), rgb(0,102,255));
  background-image: -o-linear-gradient(rgb(0,102,255), rgb(0,102,255));
  background-image: -webkit-linear-gradient(rgb(0,102,255), rgb(0,102,255)); 
} 
.LK:hover {
	color:#000000;
  background: -moz-radial-gradient(rgb(255,255,255), rgb(0,102,255));
  background: -ms-radial-gradient(rgb(255,255,255), rgb(0,102,255));
  background: -o-radial-gradient(rgb(255,255,255), rgb(0,102,255));
  background: -webkit-radial-gradient(rgb(255,255,255), rgb(0,102,255));
  
}
BAD{
	color:#FF0000;
}

  .table {
 background:#ccc;
 border-radius: 5px;
}
</style>
</head>

<body>

<table width="500px" border="0" align="center" cellspacing="10" class="table" id="Table1">
<tr>
<td width="215" height="80" >
<H1>Старт</H1>
</td>
<td width="215" height="80" >

<?PHP
    include_once "Loginer.php";
    include_once "log_error.php";

    $loginer = new Loginer();
    if ($loginer->IsLogined())
        include_once 'unlog_form.php';
    else {
        include_once 'log_form.html';
    }
    $log_error = new log_error();
    echo "<BAD>".$log_error->get_error("log_error")."</BAD>";
?>





</td>
</tr>
<tr>
<td height="150">
	<input class="PR" onclick="location.href='PARIS.html'" value="ПАРИС" type="submit" >
	</input>
</td>
<td height="150">
	<input class="RG"  onclick="location.href='Registration.php'"  value="Регистрация" type="submit" >
	</input>
</td>
</tr>
<tr>
<td height="150">
	<input class="INFO"  onclick="location.href='INFO.html'" value="Информация" type="submit" >
	</input>
</td>
<td height="150">
	<input class="LK"  onclick="location.href='LK.php'" value="Личный кабинет" type="submit" >
	</input>
</td>
</tr>
</table>





</body>
</html>
