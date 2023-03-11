<?php
    session_start();
    require_once '../config/connect_to_register-bd.php';

    $id = $_POST['id'];
    $login = filter_var(trim($_POST['reg-login']), FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST['reg-phone']), FILTER_SANITIZE_STRING);
    $surname = filter_var(trim($_POST['reg-surname']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['reg-name']), FILTER_SANITIZE_STRING);
    $student_ticket = filter_var(trim($_POST['reg-student_ticket']), FILTER_SANITIZE_STRING);
    $email = $_SESSION['user']['email'];

    mysqli_query($connect, "UPDATE `users` SET `login`='$login', `phone`='$phone', `surname`='$surname', `name`='$name', `student_ticket`='$student_ticket' WHERE `users`.`id` = '$id'");

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

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
    
    header('Location: ../');

?>
