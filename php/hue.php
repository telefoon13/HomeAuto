<?php
include_once("MainHelper.php");
include_once(".secrets.php");
$user = $hue_User;
$baseUrl = "http://192.168.178.157/api/".$user;
$getLightUrl = $baseUrl."/lights/";
$getGroupUrl = $baseUrl."/groups/";

//Function to get info from a light
function getLightInfo($id){
    global $getLightUrl;
    $result = cUrl($getLightUrl.$id);
    if ($result[0] == "200"){
        $values = $result[1];
        $lightInfo = array(
            "on" => $values['state']['on'],
            "bri" => $values['state']['bri'],
            "hue" => $values['state']['hue'],
            "sat" => $values['state']['sat'],
            "effect" => $values['state']['effect'],
            "x" => $values['state']['xy'][0],
            "y" => $values['state']['xy'][1],
            "rgb" => xyBriToRgb($values['state']['xy'][0],$values['state']['xy'][1],$values['state']['bri']),
            "swupdate_state" => $values['swupdate']['state'],
            "name" => $values['name']
        );
        return $lightInfo;
    } else {
        return $result[0];
    }
}

function updateLight($id, $state, $RGB = null){
    global $getLightUrl;
    //Body to send in PUT
    $body = array(
        "on" => $state
    );
    if (checkFilled($RGB)){
        $xybri = rgbToXyBri($RGB);
        $xy = array($xybri["x"],$xybri["y"]);
        $body["xy"] = $xy;
        //$body["bri"] = $xybri["bri"];
    }
    //Encode body in JSON
    $bodyJSON = json_encode($body);
    //Complete URL
    $fullURL = $getLightUrl.$id."/state";
    //Do the call
    $call = cUrl($fullURL, "PUT", $bodyJSON);
    return $call[0];
}

//Function to get info from a light
function getGroupInfo($id){
	global $getGroupUrl;
	$result = cUrl($getGroupUrl.$id);
	if ($result[0] == "200"){
		$values = $result[1];
		$groupInfo = array(
			"on" => $values['action']['on'],
			"bri" => $values['action']['bri'],
			"hue" => $values['action']['hue'],
			"sat" => $values['action']['sat'],
			"effect" => $values['action']['effect'],
			"x" => $values['action']['xy'][0],
			"y" => $values['action']['xy'][1],
			"rgb" => xyBriToRgb($values['action']['xy'][0],$values['action']['xy'][1],$values['action']['bri']),
			"lights" => $values['lights'],
			"any_on" => $values['state']['any_on'],
			"all_on" => $values['state']['all_on'],
		);
		return $groupInfo;
	} else {
		return $result[0];
	}
}

function updateGroup($id, $state, $RGB = null){
	global $getGroupUrl;
	//Body to send in PUT
	$body = array(
		"on" => $state
	);
	if (checkFilled($RGB)){
		$xybri = rgbToXyBri($RGB);
		$xy = array($xybri["x"],$xybri["y"]);
		$body["xy"] = $xy;
		//$body["bri"] = $xybri["bri"];
	}
	//Encode body in JSON
	$bodyJSON = json_encode($body);
	//Complete URL
	$fullURL = $getGroupUrl.$id."/action";
	//Do the call
	$call = cUrl($fullURL, "PUT", $bodyJSON);
	return $call[0];
}


//Function to convert the x,y and bri to a HEX color
//Source : https://stackoverflow.com/questions/22894498/philips-hue-convert-xy-from-api-to-hex-or-rgb
function xyBriToRgb($x,$y,$bri)
{
    $z = 1.0 - $x - $y;
    $Y = $bri / 255.0;
    $X = ($Y / $y) * $x;
    $Z = ($Y / $y) * $z;

    $r = $X * 1.612 - $Y * 0.203 - $Z * 0.302;
    $g = ($X * -1) * 0.509 + $Y * 1.412 + $Z * 0.066;
    $b = $X * 0.026 - $Y * 0.072 + $Z * 0.962;

    $r = $r <= 0.0031308 ? 12.92 * $r : (1.0 + 0.055) * pow($r, (1.0 / 2.4)) - 0.055;
    $g = $g <= 0.0031308 ? 12.92 * $g : (1.0 + 0.055) * pow($g, (1.0 / 2.4)) - 0.055;
    $b = $b <= 0.0031308 ? 12.92 * $b : (1.0 + 0.055) * pow($b, (1.0 / 2.4)) - 0.055;

    $maxValue = max( $r , $g, $b );

    $r = $r / $maxValue;
    $g = $g / $maxValue;
    $b = $b / $maxValue;

    $r = $r * 255; if ($r < 0) $r = 255;
    $g = $g * 255; if ($g < 0) $g = 255;
    $b = $b * 255; if ($b < 0) $b = 255;

    $r = dechex(round($r));
    $g = dechex(round($g));
    $b = dechex(round($b));

    if (strlen($r) < 2)     $r = "0" . $r;
    if (strlen($g) < 2)     $g = "0" . $g;
    if (strlen($b) < 2)     $b = "0" . $b;

    return "#".$r.$g.$b;
}
//Function to get the X, Y and Bri to send to hue
//Source https://gist.github.com/lgladdy/da584d3a1228fa197c6c
function rgbToXyBri($hex) {
    //Get the hex and make it into an array (RGB)
    $hex = str_replace("#", "", $hex);
    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgb = array('r'=>($r / 255),'g'=>($g / 255),'b'=>($b / 255));
    //Take the TGB array an make it into an HUE compatible format
    $r = $rgb['r'];
    $g = $rgb['g'];
    $b = $rgb['b'];
    if ($r < 0 || $r > 1 || $g < 0 || $g > 1 || $b < 0 || $b > 1) {
        throw new Exception('Invalid RGB array');
    }

    $rt = ($r > 0.04045) ? pow(($r + 0.055) / (1.0 + 0.055), 2.4) : ($r / 12.92);
    $gt = ($g > 0.04045) ? pow(($g + 0.055) / (1.0 + 0.055), 2.4) : ($g / 12.92);
    $bt = ($b > 0.04045) ? pow(($b + 0.055) / (1.0 + 0.055), 2.4) : ($b / 12.92);
    $cie_x = $rt * 0.649926 + $gt * 0.103455 + $bt * 0.197109;
    $cie_y = $rt * 0.234327 + $gt * 0.743075 + $bt * 0.022598;
    $cie_z = $rt * 0.0000000 + $gt * 0.053077 + $bt * 1.035763;

    $hue_x = $cie_x / ($cie_x + $cie_y + $cie_z);
    $hue_y = $cie_y / ($cie_x + $cie_y + $cie_z);
    $hue_bri = round($cie_y*255);

    return array('x'=>$hue_x,'y'=>$hue_y,'bri'=>$hue_bri);
}