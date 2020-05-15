<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Sensor Data</title>
</head>

<body>
    <h1 class="bg-dark display-4 text-light pl-4 text-center">ESP8266 Weather Data</h1>
    <?php
    $servername = "localhost";
    $dbname = "********";       // replacewith dbname
    $password = "********";     // replacewith password
    $username = "********";     // replacewith username
    $connection = new mysqli($servername, $username, $password, $dbname);
    if ($connection->connect_error)
        die("Connection failed: " . $conn->connect_error);
    $sql = "SELECT * FROM sensordata;";
    echo '<table cellspacing="5" cellpadding="5" class="table table-dark table-bordered">
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
            $row_reading_time = $row["datetime"];
            echo '<tr> 
        <td>' . $row_id . '</td> 
        <td>' . $row_temperature . '</td> 
        <td>' . $row_humidity . '</td> 
        <td>' . $row_reading_time . '</td> 
      </tr>';
        }
    }
    ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>