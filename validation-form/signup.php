<?php

  session_start();
  require_once '../config/connect_to_register-bd.php';

$email = filter_var(trim($_POST['reg-email']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['reg-login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['reg-password']), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['reg-phone']), FILTER_SANITIZE_STRING);

$password = md5($password."snsopdz347");

$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

if(mysqli_num_rows($check_email) > 0)
{
  $_SESSION['reg-message'] = 'Ваша почта вже зареєстрована раніше';
  header('Location: ../registration.php');
}
else
{
  mysqli_query($connect, "INSERT INTO `users` (`id`, `email`, `login`, `pass`, `phone`, `surname`, `name`, `student_ticket`) VALUES (NULL, '$email', '$login', '$password', '$phone', '', '', '')");
  $_SESSION['reg-message'] = 'Успішна реєстрація!';
  header('Location: ../index.php');
}

?>
