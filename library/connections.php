<?php

//Database connections
function acmeConnect() {
    $server = "localhost";
    $database = "acme";
    $user = "iClient";
    $password = "k1CjDdGOpu9aJdlw";
    $dsn = "mysql:host=$server;dbname=$database";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $acmeLink = new PDO($dsn, $user, $password, $options);        
        return $acmeLink;
    } catch (PDOException $ex) {
        header('location: ../errordocs/500.php');
    }
}

//acmeConnect(); only include for testing 