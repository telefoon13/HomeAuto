<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<?php
include_once("php/vaillant.php");
//Get all the devices
$devices = getAllDevices();

//Function to get one device from the array of all devices
function getDevice($deviceId){
	//Get All devices
	global $devices;
	//Select the device from Array
	$device = $devices[$deviceId];

	//If there is an error add an red icon
	$beginMelding = "<div class=\"meldingValve\"><i class=\"fas fa-";
	$eindMelding = "\"></i></div>";
	if($devices[$deviceId]["isWindowOpen"]){
		echo $beginMelding."wind".$eindMelding;
	}else if($devices[$deviceId]["isBatteryLow"]){
		echo $beginMelding."battery-quarter".$eindMelding;
	}else if($devices[$deviceId]["isRadioOutOfReach"]){
		echo $beginMelding."signal".$eindMelding;
	} elseif ($devices[$deviceId]["remainingQuickVeto"] != null){
		echo $beginMelding."clock".$eindMelding;
	}

	//Build the Icon & text to show
	$theReturn = '<a href="index.php?page=heaterDetail&heaterid='.$device['roomIndex'].'" style="'.iconColor($device["operationMode"]).'">'.
		'<img src="img/'.$device["icon"].'.svg" alt="'.$device["icon"].'" class="w-75">'.
		'<h5>'.$device["name"].'</h5>'.
		'<h5>'.$device["currentTemperature"].' / '.$device["temperatureSetpoint"].'°C</h5>'.
		'</a>';

	return $theReturn;

}

//Function to set the text color
function iconColor($deviceOperationMode){
	switch ($deviceOperationMode) {
		case "OFF":
			return "color:gray;";
			break;
		case "MANUAL":
			return "color:goldenrod;";
			break;
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