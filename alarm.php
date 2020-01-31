<?php
include_once("php/homeAssistant.php");

//Get all the devices
$devices = testHA();
echo $devices;
?>