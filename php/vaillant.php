<?php
//Includes
include_once("MainHelper.php");
include_once(".secrets.php");
//Vars out of the secret file
$smartphoneId = $vaillant_SmartphoneId;
$username = $vaillant_Username;
$password = $vaillant_Password ;
$CookieJar = $vaillant_CookieJar;
$serialnumber = $vaillant_Serialnumber;
//URL's used
$baseURL = "https://smart.vaillant.com/mobile/api/v4/";
$account = $baseURL . "account/authentication/v1/";
$newTokeURL = $account . "token/new";
$newCookies = $account . "authenticate";
$logOut = $account . "logout";
$facilities = $baseURL . "facilities/";
$facilitiesAndSerial = $facilities . $serialnumber . "/";
$systemDetails = $facilitiesAndSerial . "system/v1/details";
$facilitiesRooms = $facilitiesAndSerial . "rbr/v1/rooms/";
//------------------------------------//
//          Account functions         //
//------------------------------------//

//Login function combination of get token & get cookies
function login()
{
	$authToken = getToken();
	getCookies($authToken);
}

//Function to get a token based on login & Pass
function getToken(){
	global $smartphoneId;
	global $username;
	global $password;
	global $newTokeURL;
	//Body to send in POST
	$body = array(
		"smartphoneId" => $smartphoneId,
		"username"=> $username,
		"password"=> $password
	);
	//Encode body in JSON
	$bodyJSON = json_encode($body);
	//Do the call
	$call = cUrl($newTokeURL, "POST", $bodyJSON, true);
	//Only return the data if HTTP code equals 200 else return HTTP code
	if ($call[0] == "200"){
		return $call[1]["body"]["authToken"];
	} else {
		return $call[0];
	}
}

//Function to get the cookies based on login & Token
function getCookies($authToken){
	global $smartphoneId;
	global $username;
	global $newCookies;
	//Body to send in POST
	$body = array(
		"smartphoneId" => $smartphoneId,
		"username"=> $username,
		"authToken"=> $authToken
	);
	//Encode body in JSON
	$bodyJSON = json_encode($body);
	//Do the call
	$call = cUrl($newCookies, "POST", $bodyJSON, true);
	//Return the HTTP code
	return $call[0];
}

//Function to LogOut
function logOut(){
	global $logOut;
	//Do the call
	$call = cUrl($logOut, "POST", null,true);
	//Return the HTTP code
	return $call[0];
}

//Function to check if online
function isLoggedIn(){
	global $facilities;
	//Do the call
	$call = cUrl($facilities, "GET", null, true);
	//Return the true when 200 else false
	if ($call[0] == "200"){
		return true;
	} else {
		return false;
	}
}

//------------------------------------//
//           System functions         //
//------------------------------------//

function getMainSystemInfo(){
	global $facilities;
	//Check if isLogged in and else login
	if (!isLoggedIn()){
		login();
	}
	//Do the call
	$call = cUrl($facilities, "GET", null, true);
	//Only return the data if HTTP code equals 200 else return HTTP code
	if ($call[0] == "200"){
		$values = $call[1];
		$sysInfoArray = array(
			"serialNumber"=>$values['body']['facilitiesList'][0]['serialNumber'],
			"name"=>$values['body']['facilitiesList'][0]['name'],
			"responsibleCountryCode"=>$values['body']['facilitiesList'][0]['responsibleCountryCode'],
			"supportedBrand"=>$values['body']['facilitiesList'][0]['supportedBrand'],
			"capabilities"=>$values['body']['facilitiesList'][0]['capabilities'][0] . " + ". $values['body']['facilitiesList'][0]['capabilities'][1],
			"macAddressEthernet"=>$values['body']['facilitiesList'][0]['networkInformation']['macAddressEthernet'],
			"macAddressWifiAccessPoint"=>$values['body']['facilitiesList'][0]['networkInformation']['macAddressWifiAccessPoint'],
			"macAddressWifiClient"=>$values['body']['facilitiesList'][0]['networkInformation']['macAddressWifiClient'],
			"firmwareVersion"=>$values['body']['facilitiesList'][0]['firmwareVersion']
		);
		return $sysInfoArray;
	} else {
		return $call[0];
	}
}

function getMainSystemInfo2(){
	global $systemDetails;
	//Check if isLogged in and else login
	if (!isLoggedIn()){
		login();
	}
	//Do the call
	$call = cUrl($systemDetails, "GET", null,true);
	//Only return the data if HTTP code equals 200 else return HTTP code
	if ($call[0] == "200"){
		$values = $call[1];
		$sysInfoArray = array(
			"facilityName"=>$values['body']['facilityDetails']['facilityName'],
			"facilityTime"=>$values['body']['facilityDetails']['facilityTime'],
			"facilityTimeZone"=>$values['body']['facilityDetails']['facilityTimeZone']
		);
		return $sysInfoArray;
	} else {
		return $call[0];
	}
}

//------------------------------------//
//           Device functions         //
//------------------------------------//

function getAllDevices(){
	global $facilitiesRooms;
	//Check if isLogged in and else login
	if (!isLoggedIn()) {
		login();
	}
	//Do the call
	$call = cUrl($facilitiesRooms, "GET", null, true);
	if ($call[0] == "200"){
		$values = $call[1];
		$rooms = [];
		foreach ($values["body"]["rooms"] as $value){
			$device = array(
				"roomIndex"=>$value["roomIndex"],
				"name"=>$value["configuration"]["name"],
				"temperatureSetpoint"=>$value["configuration"]["temperatureSetpoint"],
				"operationMode"=>$value["configuration"]["operationMode"],
				"currentTemperature"=>$value["configuration"]["currentTemperature"],
				"childLock"=>$value["configuration"]["childLock"],
				"isWindowOpen"=>$value["configuration"]["isWindowOpen"],
				"isBatteryLow"=>$value["configuration"]["devices"][0]["isBatteryLow"],
				"isRadioOutOfReach"=>$value["configuration"]["devices"][0]["isRadioOutOfReach"],
				"remainingQuickVeto"=>$value["configuration"]["quickVeto"]["remainingDuration"],
				"icon"=>getDeviceIcon($value["roomIndex"])
			);
			$rooms[$device["roomIndex"]] = $device;
		}
		return $rooms;
	} else {
		return $call[0];
	}
}

function getOneDevice($roomID){
	global $facilitiesRooms;
	//Check if isLogged in and else login
	if (!isLoggedIn()) {
		login();
	}
	//Complete URL
	$getOneDevice = $facilitiesRooms . $roomID;
	//Do the call
	$call = cUrl($getOneDevice, "GET", null, true);
	if ($call[0] == "200"){
		$device = array(
			"roomIndex"=>$call[1]["body"]["roomIndex"],
			"name"=>$call[1]["body"]["configuration"]["name"],
			"temperatureSetpoint"=>$call[1]["body"]["configuration"]["temperatureSetpoint"],
			"operationMode"=>$call[1]["body"]["configuration"]["operationMode"],
			"currentTemperature"=>$call[1]["body"]["configuration"]["currentTemperature"],
			"childLock"=>$call[1]["body"]["configuration"]["childLock"],
			"isWindowOpen"=>$call[1]["body"]["configuration"]["isWindowOpen"],
			"isBatteryLow"=>$call[1]["body"]["configuration"]["devices"][0]["isBatteryLow"],
			"isRadioOutOfReach"=>$call[1]["body"]["configuration"]["devices"][0]["isRadioOutOfReach"],
			"remainingQuickVeto"=>$call[1]["body"]["configuration"]["quickVeto"]["remainingDuration"],
			"icon"=>getDeviceIcon($call[1]["body"]["roomIndex"])
		);
		return $device;
	} else {
		return $call[0];
	}
}

function getDeviceIcon($deviceId){
	$icon = "";
	switch ($deviceId){
		case 0:
			$icon = "downStairs/couch";
			break;
		case 1:
			$icon = "downStairs/kitchen";
			break;
		case 2:
			$icon = "downStairs/restaurant";
			break;
		case 3:
			$icon = "upStairs/desk";
			break;
		case 4:
			$icon = "upStairs/shower";
			break;
		case 5:
			$icon = "upStairs/bedSimple";
			break;
		case 6:
			$icon = "upStairs/bed";
			break;
		case 7:
			$icon = "upStairs/Masterbedroom";
			break;
	}
	return $icon;
}
//------------------------------------//
//         Universal functions        //
//------------------------------------//

?>