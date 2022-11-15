<?php

if (isset($_GET['id'])) {
    require_once 'connection.php';

    $connection = new Connection();
    $connection->deleteUser($_GET['id']);

    // redirect to users.php url
    header('Location: admin.php');
}



