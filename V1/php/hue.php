<?php
include_once ("MainHelper.php");

$user = "hI5h45SfpDgZRc4PIzsoYeGJus5a5iCiPj6aeawm";
$baseUrl = "http://192.168.178.157/api/".$user;
$getLight = $baseUrl."/lights/";

//Function to get info from a light
function getLightInfo($id){
    global $getLight;
    $result = cUrl($getLight.$id);
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
