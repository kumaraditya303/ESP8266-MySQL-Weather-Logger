/*******************************************************************************************************************
 * @file main.cpp
 * @author Kumar Aditya
 * @version 1.0
 * @date 15-05-2020
 * @rahuladitya303
********************************************************************************************************************/

/*******************************************************************************************************************
 * @include Arduino.h
 * @include ESP8266WiFi.h
 * @include ESP8266HTTPClient.h
 * @include Adafruit_BME280.h
 * @include Adafruit_Sensor.h
********************************************************************************************************************/

#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <Adafruit_BME280.h>
#include <Adafruit_Sensor.h>

/**
 * setting up WiFi credentials
 * replace with your credentials
*/

const char *ssid = "********";     // Replace ssid
const char *password = "********"; // Replace password
const long delayTime = 300000;
/**
 * setting up server URL
 * replace with your server url
*/

const String server = "http://********.000webhostapp.com/post-sensor-data.php"; // Replace url

/**
 * create class of BME280 sensor
*/

Adafruit_BME280 bme;

/*******************************************************************************************************************
 * Function Name  :   postSensorData
 * Description    :   post the sensor data from BME280
 * Parameters     :   server name
 * Returns        :   none
********************************************************************************************************************/

void ICACHE_RAM_ATTR postSensorData(String server)
{
  // create HTTPClient object
  HTTPClient http;
  // connect to server
  http.begin(server);
  Serial.println("\r\n**************************************************************************************************");
  Serial.println("Create HTTPClient & connect to --> " + server);
  Serial.println("Setting up headers!");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  Serial.println("Posting sensor data!");
  String sensorData = "temperature=" + String(bme.readTemperature()) + "&humidity=" + String(bme.readHumidity());
  // post sensor data
  int httpResponseCode = http.POST(sensorData);
  Serial.println(http.getString());
  if (httpResponseCode > 0)
  {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
  }
  else
  {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }
  // Free resources
  Serial.println("HTTPClient closed!");
  Serial.println("**************************************************************************************************");
  http.end();
}

void setup()
{
  // Start serial port
  Serial.begin(115200);
  bool status = bme.begin(0x76);
  if (!status)
  {
    Serial.println("Could not find a valid BME280 sensor, check wiring!");
    while (1)
      ;
  }
  // Connect to Wi-Fi
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.print("\nConnecting to WiFi");
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(1000);
    Serial.print(".");
  }
  Serial.printf("\nConnected to the WiFi network: %s\n", WiFi.SSID().c_str());
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop()
{
  // Call function
  postSensorData(server);
  delay(delayTime);
}