<?php
include_once("php/homeAssistant.php");

//Get all the sensors
//binary_sensor.reedvoordeur
$sensor = getStateEntity("binary_sensor.vibration_11");
echo $sensor["name"]."<br>".$sensor["state"];

?>