<?php
include_once ('php/netatmo.php');
$netatmo = getWeatherStationInfo();
?>
<div class="row" id="R2">
	<div class="col-sm-2 col-12 align-self-center text-center" id="R2C1">
		<img src="img/Netatmo/Netatmo_Station.png" alt="Netatmo_Station" class="w-75">
        <h5><?= $netatmo['stationInfo']['module_name']; ?></h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-right" id="R2C2">
		<h5>Temperatuur :</h5>
        <h5>CO2 :</h5>
        <h5>Vochtigheid :</h5>
        <h5>Geluid :</h5>
        <h5>Druk :</h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-left" id="R2C3">
        <h5><?= $netatmo['stationInfo']['temperature']; ?> &deg;C</h5>
        <h5><?= $netatmo['stationInfo']['co2']; ?> ppm</h5>
        <h5><?= $netatmo['stationInfo']['humidity']; ?> %</h5>
        <h5><?= $netatmo['stationInfo']['noise']; ?> dB</h5>
        <h5><?= $netatmo['stationInfo']['pressure']; ?> mbar</h5>
	</div>
	<div class="col-sm-2 col-12 align-self-center text-center" id="R2C4">
		<img src="img/Netatmo/Netatmo_Module.png" alt="Netatmo_Module" class="w-75">
        <h5><?= $netatmo['stationInfo']['module_name_OUT']; ?></h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-right" id="R2C5">
        <h5>Temperatuur :</h5>
        <h5>Vochtigheid :</h5>
        <h5>Signaal :</h5>
        <h5>Baterij :</h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-left" id="R2C6">
        <h5><?= $netatmo['stationInfo']['temperature_OUT']; ?> &deg;C</h5>
        <h5><?= $netatmo['stationInfo']['humidity_OUT']; ?> %</h5>
        <h5><?= $netatmo['stationInfo']['rf_status_OUT']; ?> %</h5>
        <h5><?= $netatmo['stationInfo']['battery_percent_OUT']; ?> %</h5>
	</div>
</div>
<div class="row" id="R3">
	<div class="col-sm-2 col-12 align-self-center text-center" id="R3C1">
		<img src="img/Netatmo/Netatmo_Pluvio.png" alt="Netatmo_Pluvio" class="w-75">
        <h5>To be added</h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-right" id="R3C2">
		<h5></h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-left" id="R3C3">
		<h5></h5>
	</div>
	<div class="col-sm-2 col-12 align-self-center text-center" id="R3C1">
		<img src="img/Netatmo/Netatmo_Anemo.png" alt="Netatmo_Anemo" class="w-75">
        <h5>To be added</h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-right" id="R3C5">
		<h5></h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-left" id="R3C6">
		<h5></h5>
	</div>
</div>