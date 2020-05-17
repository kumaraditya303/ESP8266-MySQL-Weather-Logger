# **ESP8266 MySQL Weather Logger**

**Monitors the temperature and humidity with BME280 Sensor and posts the sensor data to the database hosted with webserver. We can see the graphs of the sensor data along with sensor data in tabular format.**

# Screenshot
![Screenshot](https://github.com/rahuladitya303/ESP8266-MySQL-Weather-Logger/raw/master/include/screenshot.png)

___

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

___

## Configuring project and credentials
-    Copy the database credentials and paste it in credentials.php file
```php
$dbname = "********";       // replace with dbname
$password = "********";     // replace with password
$username = "********";     // replace with username
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
const String server = "http://*********.000webhostapp.com/post-sensor-data.php"; // Replace url
```

___

## Build and upload project
-    Download [Project](https://github.com/rahuladitya303/ESP8266-MySQL-Weather-Logger/releases/download/v1.0/ESP8266.MySQL.Weather.Logger.zip)
-    Upload the project with Arduino IDE  
### **You can also open this project in Visual Studio Code with PlatformIO and upload it! Download source code from [here](https://github.com/rahuladitya303/ESP8266-MySQL-Weather-Logger/archive/master.zip).**

___

# Project Structure
```html
.
├── _config.yml
├── include
│   └── README
├── lib
│   └── README
├── LICENSE
├── platformio.ini
├── README.md
├── src
│   ├── credentials.php
│   ├── esp-chart.php
│   ├── esp-data.php
│   ├── main.cpp
│   ├── post-sensor-data.php
│   └── schema.sql
└── test
    └── README

4 directories, 13 files

```
## Project made and maintained by *Kumar Aditya* 

___