<?php

    session_start();
    require_once '../config/connect_to_register-bd.php';

     $_SESSION['ent-message'] = '';
     header('Location: /');
?>
