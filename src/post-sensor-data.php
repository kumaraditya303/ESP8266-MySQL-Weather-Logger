<?php

$servername = "localhost";
$dbname = "********";       // replacewith dbname
$password = "********";     // replacewith password
$username = "********";     // replacewith username

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperature = floatval($_POST["temperature"]);
    $humidity = floatval($_POST["humidity"]);
    $connection = new mysqli($servername, $username, $password, $dbname);
    if ($connection->connect_error) die("Connection failed: " . $connection->connect_error);
    $sql = "INSERT INTO sensordata (temperature , humidity)
    VALUES (" . $temperature . ", " . $humidity . ")";
    if ($connection->query($sql) === True) echo "Data recorded successfully!";
    else die("Error occured" . $connection->error);
} else die("Only POST request allowed!");

?>