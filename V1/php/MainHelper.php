<?php
//Function to check if a field is set and not empty
function checkFilled($input)
{
    if (isset($input) && !empty($input) && $input != "") {
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

function switchSonOffLight($ip, $port){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, "http://".$ip."/cm?cmnd=Power".$port."%20TOGGLE");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    $result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $result;
}