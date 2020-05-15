<?php
$servername = "localhost";
$dbname = "id13473327_data";
$username = "id13473327_esp8266";
$password = "dLT6D&8qo0UBRvwe";
$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) 
    die("Connection failed: " . $conn->connect_error);
