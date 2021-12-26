<?php
function get_data($smtp_conn)
{
  $data="";
  while($str = fgets($smtp_conn,515))
  {
    $data .= $str;
    if(substr($str,3,1) == " ") { break; }
  }
  return $data."</br>";
}

$header="From: <kulichen@cs.karelia.ru>\r\n";
$header.="Reply-To: <kulichen@cs.karelia.ru>\r\n";
$header.="To: <kulichen@cs.karelia.ru>\r\n";
$header.="Subject: Проверка\r\n";
$header.="Content-Type: text/plain; charset=utf-8\r\n";

$text="Привет, проверка связи.";

//А сейчас открываем соединение с smtp сервером.

$smtp_conn = fsockopen("mail.cs.karelia.ru", 25, $errno, $errstr, 10);

//После открытия соединения читаем ответ от сервера в переменную $data

$data = get_data($smtp_conn);
echo $data;

fputs($smtp_conn,"EHLO kulichen\r\n");
$data = get_data($smtp_conn);
echo "EHLO</br>".$data;


// Считаем количество символов письма со всеми заголовками, чтобы передать какого размера будет письмо
$size_msg=strlen($header."\r\n".$text);

fputs($smtp_conn,"MAIL FROM:<kulichen@cs.karelia.ru> SIZE=".$size_msg."\r\n");
$data = get_data($smtp_conn);
echo "MAIL FROM: kulichen@cs.karelia.ru SIZE=".$size_msg."</br>".$data;

fputs($smtp_conn,"RCPT TO:<kulichen@cs.karelia.ru>\r\n");
$data = get_data($smtp_conn);
echo "RCPT TO: kulichen@cs.karelia.ru</br>".$data;

fputs($smtp_conn,"DATA\r\n");
$data = get_data($smtp_conn);
echo "DATA</br>".$data;

fputs($smtp_conn,$header."\r\n".$text."\r\n.\r\n");
$data = get_data($smtp_conn);
echo "Text in DATA: </br>".$data;

fputs($smtp_conn,"QUIT\r\n");
$data = get_data($smtp_conn);
echo "QUIT</br>".$data;

?>