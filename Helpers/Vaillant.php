<?php
include_once ("Debugger.php");

class Vaillant
{
    //Base url to place before every other URL
    private $baseURL = "https://smart.vaillant.com/mobile/api/v4/";
    private $smartphoneId = "HomeAutoMike1";
    private $username = "mikedhoore";
    private $password = "****";
    private $CookieJar = "/tmp/Vaillant_cookie.txt";


      //------------------------------------//
     //          Account functions         //
    //------------------------------------//

    //Login function combination of get token & get cookies
    private static function login(){
        $authToken = self::getToken();
        self::getCookies($authToken);
    }

    //Function to get a token based on login & Pass
    private static function getToken(){
        //Body to send in POST
        $body = array(
            "smartphoneId" => (new self)->smartphoneId,
            "username"=> (new self)->username,
            "password"=> (new self)->password
        );
        //Encode body in JSON
        $bodyJSON = json_encode($body);
        //Complete URL
        $newTokeURL = (new self)->baseURL . "account/authentication/v1/token/new";
        //Do the call
        $call = self::cUrl($newTokeURL, "POST", $bodyJSON);
        //Only return the data if HTTP code equals 200 else return HTTP code
        if ($call[0] == "200"){
            return $call[1]["body"]["authToken"];
        } else {
            return $call[0];
        }
    }

    //Function to get the cookies based on login & Token
    private static function getCookies($authToken){
        //Body to send in POST
        $body = array(
            "smartphoneId" => (new self)->smartphoneId,
            "username"=> (new self)->username,
            "authToken"=> $authToken
        );
        //Encode body in JSON
        $bodyJSON = json_encode($body);
        //Complete URL
        $newCookies = (new self)->baseURL . "account/authentication/v1/authenticate";
        //Do the call
        $call = self::cUrl($newCookies, "POST", $bodyJSON);
        //Return the HTTP code
        return $call[0];
    }

    //Function to LogOut
    private static function logOut(){
        //Complete URL
        $logOut = (new self)->baseURL . "account/authentication/v1/logout";
        //Do the call
        $call = self::cUrl($logOut, "POST", null);
        //Return the HTTP code
        return $call[0];
    }

    //Function to check if online
    private static function isLoggedIn(){
        //Complete URL
        $checkOnline = (new self)->baseURL . "facilities";
        //Do the call
        $call = self::cUrl($checkOnline, "GET", null);
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

    public static function getMainSystemInfo(){
        //Check if isLogged in and else login
        if (!self::isLoggedIn()){
            self::login();
        }
        //Complete URL
        $getSystemInfo = (new self)->baseURL . "facilities";
        //Do the call
        $call = self::cUrl($getSystemInfo, "GET", null);
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

    public static function getAllDevices(){
        //Check if isLogged in and else login
        if (!self::isLoggedIn()) {
            self::login();
        }
        $serialNumber = self::getMainSystemInfo()["serialNumber"];
        //Complete URL
        $getAllDevices = (new self)->baseURL . "facilities/".$serialNumber."/rbr/v1/rooms";
        //Do the call
        $call = self::cUrl($getAllDevices, "GET", null);
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
                    "icon"=>self::iconForValve($value["roomIndex"])
                );
                $rooms[$device["roomIndex"]] = $device;
            }
            return $rooms;
        } else {
            return $call[0];
        }
    }

    public static function getOneDevice($roomID){
        //Check if isLogged in and else login
        if (!self::isLoggedIn()) {
            self::login();
        }
        $serialNumber = self::getMainSystemInfo()["serialNumber"];
        //Complete URL
        $getOneDevice = (new self)->baseURL . "facilities/".$serialNumber."/rbr/v1/rooms/".$roomID;
        //Do the call
        $call = self::cUrl($getOneDevice, "GET", null);
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
                    "icon"=>self::iconForValve($call[1]["body"]["roomIndex"])
                );
            return $device;
        } else {
            return $call[0];
        }
    }


      //------------------------------------//
     //         Universal functions        //
    //------------------------------------//

    //Universal cUrl method to do the API calls
    private static function cUrl($url,$method,$body){
        //Initialise cUrl
        $cUrl = curl_init();
        //Make sure the returns goes to the variable
        curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);
        //Setup the chosen method
        switch ($method){
            case "GET":
                break;
            case "POST":
                curl_setopt($cUrl, CURLOPT_POST, true);
                curl_setopt($cUrl, CURLOPT_POSTFIELDS, $body);
                break;
            case "PUT":
                curl_setopt($cUrl, CURLOPT_PUT, true);
                curl_setopt($cUrl, CURLOPT_POSTFIELDS, $body);
                break;
            case "DELETE":
                curl_setopt($cUrl, CURLOPT_CUSTOMREQUEST, $method);
                break;
        }
        //HTTP header JSON
        curl_setopt($cUrl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        //Setup the URL to go to
        curl_setopt($cUrl, CURLOPT_URL, $url);
        //Setup the cookieJar & File
        curl_setopt($cUrl, CURLOPT_COOKIEJAR, (new self)->CookieJar);
        curl_setopt($cUrl, CURLOPT_COOKIEFILE, (new self)->CookieJar);
        //Execute the cUrl
        $cUrlReturn = curl_exec($cUrl);
        //Get the HTTP response Code
        $httpCode = curl_getinfo($cUrl, CURLINFO_HTTP_CODE);
        //The return
        $cUrlReturn = json_decode($cUrlReturn,true);
        //Debugger::debug_to_console($url.$method.$body.$httpCode);

        return array($httpCode,$cUrlReturn);
    }

    private static function iconForValve($id){
        $icons = array(
            "0"=>"couch",
            "1"=>"utensil-spoon",
            "2"=>"utensils",
            "3"=>"keyboard",
            "4"=>"bath",
            "5"=>"bed",
            "6"=>"suitcase",
            "7"=>"bed",
        );
        return $icons[$id];
    }

}
?>