 <?php
 function get_data($smtp_conn)
{
  $data="";
  while($str = fgets($smtp_conn,515))
  {
    $data .= $str;
    if(substr($str,3,1) == " ") { break; }
  }
  return $data;
}

$header="Date: ".date("D, j M Y G:i:s")." +0700\r\n";
$header.="From: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('Саша')))."?= <parizmail@mail.ru>\r\n";
$header.="X-Mailer: The Bat! (v3.99.3) Professional\r\n";
$header.="Reply-To: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('Саша')))."?= <parizmail@mail.ru>\r\n";
$header.="X-Priority: 3 (Normal)\r\n";
$header.="Message-ID: <172562218.".date("YmjHis")."@mail.ru>\r\n";
$header.="To: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('Саша')))."?= <qwex-x@rambler.ru>\r\n";
$header.="Subject: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('проверка')))."?=\r\n";
$header.="MIME-Version: 1.0\r\n";
$header.="Content-Type: text/plain; charset=windows-1251\r\n";
$header.="Content-Transfer-Encoding: 8bit\r\n";

$text="привет, проверка связи.";
 
$smtp_conn = fsockopen('94.100.177.1', 2525,$errno, $errstr, 10); 

//if (! $smtp_conn) print_r($smtp_conn);

//echo gethostbyname("smtp.rambler.ru");

echo "</br>".$errstr;
exit;

//$data = get_data($smtp_conn); 
echo $data."</br>";


fputs($smtp_conn,"EHLO mail.ru\r\n");
//$data = get_data($smtp_conn);
//echo $data."</br>";

fputs($smtp_conn,"AUTH LOGIN\r\n");
//$data = get_data($smtp_conn);
//echo $data."</br>";

fputs($smtp_conn,base64_encode(".parizmail@mail.ru")."\r\n");
//$data = get_data($smtp_conn);
//echo $data."</br>";

fputs($smtp_conn,base64_encode("cybergroup224")."\r\n");
//$data = get_data($smtp_conn);
//echo $data."</br>";

fputs($smtp_conn,"MAIL FROM:parizmail@mail.ru\r\n");
//$data = get_data($smtp_conn);
//echo $data."</br>";

fputs($smtp_conn,"RCPT TO:qwex-x@rambler.ru\r\n");
//$data = get_data($smtp_conn);
//echo $data."</br>";

fputs($smtp_conn,"DATA\r\n");
//$data = get_data($smtp_conn);
//echo $data."</br>";

fputs($smtp_conn,$header."\r\n".$text."\r\n.\r\n");
//$data = get_data($smtp_conn);
//echo $data."</br>";

fputs($smtp_conn,"QUIT\r\n");
//$data = get_data($smtp_conn); 
//echo $data."</br>";
?> 