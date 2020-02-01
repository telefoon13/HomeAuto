<?php
//Includes
include_once("MainHelper.php");
include_once(".secrets.php");
//Vars out of the secret file
$Bearertoken = "Authorization: Bearer ".$homeAssistant_token;
//URL's used
$baseURL = "http://192.168.178.207:8123/api/";

function getStateEntity($entity_id){
    global $Bearertoken;
    global $baseURL;
    //Do the call
	$call = cUrl($baseURL."states/$entity_id", "GET", null, false, null, $Bearertoken);
	//Only return the data if HTTP code equals 200 else return HTTP code
	if ($call[0] == "200"){
        $values = $call[1];
        $info=array(
            "name"=>$values["attributes"]["friendly_name"],
            "state"=>$values["state"]
        );
        return $info;
    } else {
        return $call[0];
    }
}

function postStateEntity($entity_id, $state){
    global $Bearertoken;
    global $baseURL;
    $body = "
    {
        \"state\": \"".$state."\"
    s}";
    $call = cUrl($baseURL."state/".$entity_id, "POST", $body , false,null, $Bearertoken);
    return $call[0];
}
?>