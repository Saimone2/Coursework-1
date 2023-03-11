<?php

    require_once '../config/connect_to_stations.php';

    $id = $_GET['id'];

    mysqli_query($connect, "DELETE FROM `stations-list` WHERE `stations-list`.`id` = '$id'");
    header('Location: ../admin.php');

?>
