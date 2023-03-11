<?php

    require_once '../config/connect_to_stations.php';

    $stname = $_POST['stname'];

    mysqli_query($connect, "INSERT INTO `stations-list` (`id`, `name`) VALUES (NULL, '$stname')");
    header('Location: ../admin.php');

?>
