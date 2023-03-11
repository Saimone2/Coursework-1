<?php

    require_once '../config/connect_to_trains.php';

    $number = $_POST['number'];
    $name = $_POST['name'];
    $going_from = $_POST['going_from'];
    $going_to = $_POST['going_to'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];
    $duration = $_POST['duration'];
    $seat1 = $_POST['class1-seat'];
    $price1 = $_POST['class1-price'];
    $seat2 = $_POST['class2-seat'];
    $price2 = $_POST['class2-price'];

    mysqli_query($connect, "INSERT INTO `trains-info` (`id`, `number`, `name`, `going_from`, `going_to`, `date_from`, `date_to`, `time_from`, `time_to`, `duration`, `seat1`, `price1`, `seat2`, `price2`)
    VALUES (NULL, '$number', '$name', '$going_from', '$going_to', '$date_from', '$date_to', '$time_from', '$time_to', '$duration', '$seat1', '$price1', '$seat2', '$price2')");
    header('Location: ../admin.php');

?>
