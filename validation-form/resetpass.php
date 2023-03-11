<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$id = $_SESSION['user']['id'];

$mysql = new mysqli('localhost', 'mysql', '', 'register-bd');
$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
$user = $result->fetch_assoc();
if(count($user) == '')
{
  echo "Користувача не знайдено";
  exit();
}
else
{
  function generate_password()
  {
   $arr = array(
   'a','b','c','d','e','f',
   'g','h','i','j','k','l',
   'm','n','o','p','r','s',
   't','u','v','x','y','z',
   'A','B','C','D','E','F',
   'G','H','I','J','K','L',
   'M','N','O','P','R','S',
   'T','U','V','X','Y','Z',
   '1','2','3','4','5','6',
   '7','8','9','0');
   $password = "";
   for($i = 0; $i < 10; $i++)
   {
     $index = rand(0, count($arr) - 1);
     $password .= $arr[$index];
   }
   return $password;
  }
  echo generate_password();

  $mail = new PHPMailer(true);
  $mail->CharSet = 'utf-8';

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = '1railroad.ua@gmail.com';
  $mail->Password = '&ra1lr0ad#713';
  $mail->SMTPSecure ='ssl';
  $mail->Port = 465;

  $body = "
<h2>Скидання пароля</h2>
Ми отримали запит на скидання вашого пароля.<br>
Для Вас був згенерований новий пароль для авторизації на сайті Railroad.ua.<br><br>
<b>Новий пароль: </b> $password
";

  $mail->setFrom('1railroad.ua@gmail.com');
  $mail->addAddress($email);

  $mail->isHTML(true);

  $mail->Subject = "RAILROAD.UA: скидання пароля";
  $mail->Body = $body;

  if(!$mail->send())
  {
    echo 'Error';
  }
  else
  {
    $newpass = md5($password."snsopdz347");
    return $mysql->query("UPDATE `users` SET `pass` = '$newpass' WHERE `users`.`id` = '$id'");
    header('location: /');
  }
}
?>
