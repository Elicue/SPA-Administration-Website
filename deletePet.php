<?php

if (isset($_GET['id'])) {
    require_once 'connection.php';

    $connection = new Connection();
    $connection->deletePet($_GET['id']);

    // redirect to users.php url
    header('Location: admin.php');
}



