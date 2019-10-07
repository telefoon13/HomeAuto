<?php
include_once("php/vaillant.php");
//$test = getMainSystemInfo();
//echo $test["serialNumber"];
function getDevice($deviceId){
$device = getOneDevice($deviceId);
if ($device == "401"){
	return "Error 401";
} else {
	$theReturn = '<a href="index.php?page=heaterDetail&heaterid='.$device['roomIndex'].'">'.
		'<img src="img/'.$device["icon"].'.svg" alt="'.$device["icon"].'" class="w-75">'.
		'<h5>'.$device["name"].'</h5>'.
		'<h5>'.$device["currentTemperature"].' / '.$device["temperatureSetpoint"].'°C</h5>'.
		'</a>';

	return $theReturn;
}
}
?>
<div class="row" id="R2">
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C1">
		<?php
		echo getDevice(0);
		?>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C2">
		<?php
		echo getDevice(1);
		?>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C3">
		<?php
		echo getDevice(2);
		?>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C4">
		<?php
		echo getDevice(3);
		?>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C5">
		<?php
		echo getDevice(4);
		?>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C6">
		<?php
		echo getDevice(5);
		?>
	</div>
</div>
<div class="row" id="R3">
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C1">
		<?php
		echo getDevice(6);
		?>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C2">
		<?php
		//echo getDevice(7);
		?>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C3">
		&emsp;
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C4">
		&emsp;
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C5">
		&emsp;
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C6">
		&emsp;
	</div>
</div>