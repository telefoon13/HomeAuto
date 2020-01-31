<?php
//Includes
include_once("MainHelper.php");
include_once(".secrets.php");
//Vars out of the secret file
$Bearertoken = "Authorization: Bearer ".$homeAssistant_token;
//URL's used
$baseURL = "http://192.168.178.207:8123/api/";

function testHA(){
    global $Bearertoken;
    global $baseURL;
    //Do the call
	$call = cUrl($baseURL, "GET", null, true, null, $Bearertoken);
	//Only return the data if HTTP code equals 200 else return HTTP code
	if ($call[0] == "200"){
        $values = $call[1];
        return var_dump($values);
    } else {
        return $call[0];
    }
}
?>