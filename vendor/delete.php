<?php

    require_once '../config/connect_to_trains.php';

    $id = $_GET['id'];

    mysqli_query($connect, "DELETE FROM `trains-info` WHERE `trains-info`.`id` = '$id'");
    header('Location: ../admin.php');

?>
