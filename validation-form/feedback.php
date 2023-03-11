<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = '1railroad.ua@gmail.com';
$mail->Password = '&ra1lr0ad#713';
$mail->SMTPSecure ='ssl';
$mail->Port = 465;

$body = "
<h2>Нове повідомлення</h2>
<b>Ім'я:</b> $name<br>
<b>Телефон:</b> $phone<br><br>
<b>Текст повідомлення:</b><br>$message
";

$mail->setFrom('1railroad.ua@gmail.com');
$mail->addAddress('1railroad.ua@gmail.com');

$mail->isHTML(true);

$mail->Subject = "Зворотній зв'язок від $email";
$mail->Body = $body;

if(!$mail->send())
{
  echo 'Error';
}
else
{
  header('location: /');
}
?>
