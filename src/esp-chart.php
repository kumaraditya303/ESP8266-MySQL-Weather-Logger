<!-- /*******************************************************************************************************************
 * @file esp-chart.php
 * @author Kumar Aditya
 * @version 1.0
 * @date 15-05-2020
 * @rahuladitya303
********************************************************************************************************************/
 -->
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
    include("credentials.php");
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

            var chart = new CanvasJS.Chart("charttemphumi", {
                animationEnabled: true,
                theme: "dark2",
                zoomEnabled: true,
                title: {
                    text: "Temperature & Humidity"
                },
                subtitles: [{}],
                axisY: {
                    title: "Temperature",
                    titleFontColor: "#4F81BC",
                    lineColor: "#4F81BC",
                    labelFontColor: "#4F81BC",
                    tickColor: "#4F81BC"
                },
                axisY2: {
                    title: "Humidity",
                    titleFontColor: "#C0504E",
                    lineColor: "#C0504E",
                    labelFontColor: "#C0504E",
                    tickColor: "#C0504E",
                    includeZero: false
                },
                legend: {
                    cursor: "pointer",
                    dockInsidePlotArea: true
                },
                data: [{
                        type: "spline",
                        markerSize: 5,
                        name: "Temperature",
                        showInLegend: true,
                        toolTipContent: "Temperature: {y} °C <br>Time: {label}",
                        dataPoints: <?php echo json_encode($temperature, JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "spline",
                        axisYType: "secondary",
                        name: "Humidity",
                        showInLegend: true,
                        toolTipContent: "Humidity: {y}% <br>Time: {label}",
                        dataPoints: <?php echo json_encode($humidity, JSON_NUMERIC_CHECK); ?>
                    }
                ]
            });
            chart.render();
        }
    </script>
    <div id="charttemphumi" style="height: 100%; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>