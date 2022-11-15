<?php

if (isset($_GET['id'])) {
    require_once 'connection.php';

    $connection = new Connection();
    $connection->deleteMyPet($_GET['id']);

    // redirect to users.php url
    header('Location: myPets.php');
}



