<?php
//Includes
include_once("MainHelper.php");
include_once(".secrets.php");
//Vars out of the secret file
$smartphoneId = $vaillant_SmartphoneId;
$username = $vaillant_Username;
$password = $vaillant_Password ;
$CookieJar = $vaillant_CookieJar;
//URL's used
$baseURL = "https://smart.vaillant.com/mobile/api/v4/";
$newTokeURL = $baseURL . "account/authentication/v1/token/new";
$newCookies = $baseURL . "account/authentication/v1/authenticate";
$logOut = $baseURL . "account/authentication/v1/logout";
$facilities = $baseURL . "facilities";
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

?>