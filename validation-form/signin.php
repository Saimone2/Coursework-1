<?php

  session_start();
  require_once '../config/connect_to_register-bd.php';

$email = filter_var(trim($_POST['ent-email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['ent-password']), FILTER_SANITIZE_STRING);

$password = md5($password."snsopdz347");

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$password'");

if(mysqli_num_rows($check_user) > 0)
{
  $user = mysqli_fetch_assoc($check_user);
  $_SESSION['user'] = [
    "id" => $user['id'],
    "email" => $user['email'],
    "login" => $user['login'],
    "phone" => $user['phone'],
    "surname" => $user['surname'],
    "name" => $user['name'],
    "student_ticket" => $user['student_ticket']
  ];
  if($user['email'] == '1railroad.ua@gmail.com')
  {
    $_SESSION['ent-message'] = 'Адмін авторизація';
    header('Location: ../admin.php');
  }
  else
  {
  $_SESSION['ent-message'] = 'Успішна авторизація';
  header('Location: /');
  }
}
else
{
  $_SESSION['ent-message'] = 'Невірний логін або пароль';
  if (@$_SERVER['HTTP_REFERER'] != null)
  {
    header("Location: ".$_SERVER['HTTP_REFERER']);
  }
}
?>
