<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="60">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Sensor Chart</title>
</head>

<body>
    <h1 class="bg-dark display-4 text-light pl-4 text-center">ESP8266 Weather Chart</h1>
    <?php
    $servername = "localhost";
    $dbname = "********";       // replacewith dbname
    $password = "********";     // replacewith password
    $username = "********";     // replacewith username
    $connection = new mysqli($servername, $username, $password, $dbname);
    if ($connection->connect_error)
        die("Connection failed: " . $conn->connect_error);
    $sql = "SELECT * FROM sensordata;";
    $temperature = array();
    $humidity = array();
    if ($result = $connection->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $jsonarray = array();
            $jsonarray2 = array();
            $jsonarray["y"] = $row["temperature"];
            $jsonarray["label"] = $row["datetime"];
            $jsonarray2["y"] = $row["humidity"];
            $jsonarray2["label"] = $row["datetime"];
            array_push($temperature, $jsonarray);
            array_push($humidity, $jsonarray2);
        }
    }
    ?>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("charttemp", {
                title: {
                    text: "Temperature"
                },
                subtitles: [{}],
                axisY: {
                    title: "Time",
                    includeZero: false
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($temperature, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            var chart = new CanvasJS.Chart("charthumi", {
                title: {
                    text: "Humidity"
                },
                subtitles: [{}],
                axisY: {
                    title: "Time",
                    includeZero: false
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($humidity, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <div id="charttemp" style="height: 370px; width: 100%;"></div>
    <div id="charthumi" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>