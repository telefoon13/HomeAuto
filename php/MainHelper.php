<?php
//Function to check if a field is set and not empty
function checkFilled($input)
{
    if (isset($input) && !empty($input) && $input != "" && $input != null) {
        return true;
    } else {
        return false;
    }
}

//Function to check text inputs on special characters and lenght
function checkIndexUrl($input)
{
    $regex = "/^[0-9a-zA-Z\?\=\&]{1,}.$/";
    if (preg_match($regex, $input)) {
        return false;
    } else {
        return true;
    }
}

//Function to swhitch the SonOff lights
function switchSonOffLight($ip, $port, $state){
    if (!checkFilled($state)){
        $state = "TOGGLE";
    }
    $url = "http://".$ip."/cm?cmnd=Power".$port."%20".$state;
    $result = cUrl($url);
    return $result[0];
}

//Universal cUrl method to do the API calls
function cUrl($url,$method = "GET",$body = null, $useCookie=false, $header = null){
    //Initialise cUrl
    $cUrl = curl_init();
    //Make sure the returns goes to the variable
    curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);
    //Setup the chosen method
    switch ($method){
        case "POST":
            curl_setopt($cUrl, CURLOPT_POST, true);
            curl_setopt($cUrl, CURLOPT_POSTFIELDS, $body);
            break;
        case "PUT":
            curl_setopt($cUrl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($cUrl, CURLOPT_POSTFIELDS, $body);
            break;
        case "DELETE":
            curl_setopt($cUrl, CURLOPT_CUSTOMREQUEST, $method);
            break;
        default:
            break;
    }
    //HTTP header JSON
    if (checkFilled($header)){
        curl_setopt($cUrl, CURLOPT_HTTPHEADER, array($header));
    } else {
        curl_setopt($cUrl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    }

    //Setup the URL to go to
    curl_setopt($cUrl, CURLOPT_URL, $url);
    //Setup the cookieJar & File
    if ($useCookie){
        $CookieJar = "/tmp/HomeAuto_cookieJar.txt";
        curl_setopt($cUrl, CURLOPT_COOKIEJAR, $CookieJar);
        curl_setopt($cUrl, CURLOPT_COOKIEFILE, $CookieJar);
    }
    //Execute the cUrl
    $cUrlReturn = curl_exec($cUrl);
    //Get the HTTP response Code
    $httpCode = curl_getinfo($cUrl, CURLINFO_HTTP_CODE);
    //The return
    $cUrlReturn = json_decode($cUrlReturn,true);
    //debug_to_console($url.$method.$body.$httpCode);
    return array($httpCode,$cUrlReturn);
}

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}