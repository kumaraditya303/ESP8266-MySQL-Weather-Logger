# **ESP8266 MySQL Weather Logger**

**Monitors the temperature and humidity with BME280 Sensor and posts the sensor data to the database hosted with webserver. We can see the graphs of the sensor data along with sensor data in tabular format.**


# Getting Started
## Creating account and database
-    Create your account on your preferred web hosting service
-    Here [000webhost](https://www.000webhost.com/) is used
-    Click on other project & create a website& remember your password
-    Use upload your site button
-    Click on your project and select Manage Website
-    From Sidebar select tools --> Database Manager 
-    Click on New Database and create a new database
-    **Done!**

## Configuring project and credentials
-    Copy the database credentials and paste it in the php files
```php
$dbname = "********";       // replacewith dbname
$password = "********";     // replacewith password
$username = "********";     // replacewith username
```
-    Create the table with the included schema
```sql
CREATE TABLE `sensordata` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `temperature` FLOAT NOT NULL,
    `humidity` FLOAT NOT NULL,
    `datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
```
-    Upload the php files with File manager
-    Update the credentials in the main.cpp file
```cpp
const char *ssid = "**************";// Replace ssid
const char *password = "**************"; // Replace password
const String server = "http://YOUR_HOST/post-sensor-data.php"; // Replace url
```
## Build and upload project
-    Download [Project](https://github.com/rahuladitya303/ESP8266-MySQL-Weather-Logger/releases/download/v1.0/ESP8266.MySQL.Weather.Logger.zip)
-    Upload the project with Arduino IDE  
### **You can also open this project in Visual Studio Code with PlatformIO and upload it! Download source code from [here](https://github.com/rahuladitya303/ESP8266-MySQL-Weather-Logger/archive/master.zip).**

## Project made and maintained by *Kumar Aditya* Dont't forget to start repository