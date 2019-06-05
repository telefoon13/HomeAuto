<?php
include_once("MainHelper.php");
include_once(".secrets.php");
$appname = $netatmo_Appname;
$clientId = $netatmo_ClientId;
$clientSecret = $netatmo_ClientSecret;
$email = $netatmo_Email;
$pass = $netatmo_Pass;
$scope = "read_station";
$header = "Content-type: application/x-www-form-urlencoded";
$baseUrl = "https://api.netatmo.com/";
$authUrl = $baseUrl."oauth2/token";
$userInfoUrl = $baseUrl."api/getuser?access_token=";
$stationInfoUrl = $baseUrl."api/getstationsdata";

function getToken(){
    global $authUrl;
    global $clientId;
    global  $clientSecret;
    global $email;
    global $pass;
    global $scope;
    global $header;
    //Body to send in POST
    $body = array(
        'grant_type' => "password",
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'username' => $email,
        'password' => $pass,
        'scope' => $scope
    );
    //Encode body in HTTP build query
    $body = http_build_query($body);
    //Do the call
    $call = cUrl($authUrl,"POST", $body, false, $header);
    if ($call[0] == "200"){
        return $call[1]['access_token'];
    } else {
        return $call[0];
    }
}

function getUserInfo(){
    global $userInfoUrl;
    global $header;
    //Get the OauthToken
    $token = getToken();
    //Complete URL
    $userInfoUrlWithToken = $userInfoUrl . $token;
    //Do the call
    $call = cUrl($userInfoUrlWithToken,null,false,$header);
    //Return the user info when 200 else false
    if ($call[0] == "200"){
        $values = $call[1];
        $user = array(
            "id" => $values["body"]["_id"],
            "email" => $values["body"]["mail"],
            "device" => $values["body"]["devices"][0],
            "status" => $values["status"],
            "access_Token" => $token
        );
        return $user;
    } else {
        return $call[0];
    }
}

function getWeatherStationInfo(){
    global $stationInfoUrl;
    global $header;
    //Get the user info
    $user = getUserInfo();
    //Body to send in POST
    $body = array(
        'access_token' => $user["access_Token"],
        'device_id' => $user["device"]
    );
    //Encode body in HTTP build query
    $body = http_build_query($body);
    //Do the call
    $call = cUrl($stationInfoUrl,"POST", $body, false, $header);
    if ($call[0] == "200"){
        $values = $call[1];
        $info = array(
            "module_name" => $values["body"]["devices"][0]["module_name"],
            "wifi_status" => $values["body"]["devices"][0]["wifi_status"],
            "station_name" => $values["body"]["devices"][0]["station_name"],
            "temperature" => $values["body"]["devices"][0]["dashboard_data"]["Temperature"],
            "co2" => $values["body"]["devices"][0]["dashboard_data"]["CO2"],
            "humidity" => $values["body"]["devices"][0]["dashboard_data"]["Humidity"],
            "noise" => $values["body"]["devices"][0]["dashboard_data"]["Noise"],
            "pressure" => $values["body"]["devices"][0]["dashboard_data"]["Pressure"],
            "absolutePressure" => $values["body"]["devices"][0]["dashboard_data"]["AbsolutePressure"],
            "module_name_OUT" => $values["body"]["devices"][0]["modules"][0]["module_name"],
            "reachable_OUT" => $values["body"]["devices"][0]["modules"][0]["reachable"],
            "temperature_OUT" => $values["body"]["devices"][0]["modules"][0]["dashboard_data"]["Temperature"],
            "humidity_OUT" => $values["body"]["devices"][0]["modules"][0]["dashboard_data"]["Humidity"],
            "rf_status_OUT" => $values["body"]["devices"][0]["modules"][0]["rf_status"],
            "battery_percent_OUT" => $values["body"]["devices"][0]["modules"][0]["battery_percent"],
        );
        $stationInfo["stationInfo"] = $info;
        return $stationInfo;
    } else {
        return $call[0];
    }
}

$jsonToReturn = json_encode(getWeatherStationInfo());
echo $jsonToReturn;