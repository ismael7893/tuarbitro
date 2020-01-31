<?php

$servername = "localhost";
$username = "tuarbitro_ss";
$password = "Gogostar#991$";

try {
    $conn = new PDO("mysql:host=$servername;dbname=tuarbitro_ss", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>