<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Sensor Data</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $dbname = "id13473327_data";
    $username = "id13473327_esp8266";
    $password = "dLT6D&8qo0UBRvwe";
    $connection = new mysqli($servername, $username, $password, $dbname);
    if ($connection->connect_error)
        die("Connection failed: " . $conn->connect_error);
    $sql = "SELECT * FROM sensordata;";
    echo '<table cellspacing="5" cellpadding="5" class="table table-bordered">
    <tr> 
      <td colspan="1">ID</td> 
      <td colspan="1">Temperature</td> 
      <td colspan="1">Humidity</td>
      <td colspan="1">Timestamp</td> 
    </tr>';
    if ($result = $connection->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $row_id = $row["id"];
            $row_temperature = $row["temperature"];
            $row_humidity = $row["humidity"];
            $row_reading_time = $row["reading_time"];
            echo '<tr> 
        <td>' . $row_id . '</td> 
        <td>' . $row_temperature . '</td> 
        <td>' . $row_humidity . '</td> 
        <td>' . $row_reading_time . '</td> 
      </tr>';
        }
    }
    ?>