<?php
include_once("MainHelper.php");
include_once(".secrets.php");
$apiKey = $openWeatherMap_APIkey;
$baseUrl = "http://api.openweathermap.org/data/2.5/";
$weatherURL = $baseUrl."weather?q=temse,be&appid=".$apiKey;

function getOpenWeather(){
    global $weatherURL;
    $result = cUrl($weatherURL);
    if ($result[0] == "200"){
        $values = $result[1];
        $info = array(
            "id" => $values['weather'][0]['id'],
            "main" => $values['weather'][0]['main'],
            "description" => $values['weather'][0]['description'],
            "icon" => $values['weather'][0]['icon'],
            "svg" => iconConversion($values['weather'][0]['icon'])
        );
        $openWeatherInfo["openWeatherInfo"] = $info;
        return $openWeatherInfo;
    } else {
        return $result[0];
    }
}

function iconConversion($icon){
    switch ($icon){
        case "01d" :
            return "img/weather/sun.svg";
            break;
        case "01n" :
            return "img/weather/moon.svg";
            break;
        case "02d" :
            return "img/weather/cloudy.svg";
            break;
        case "02n" :
            return "img/weather/cloudy-night.svg";
            break;
        case "03d" :
            return "img/weather/cloud.svg";
            break;
        case "03n" :
            return "img/weather/cloud.svg";
            break;
        case "04d" :
            return "img/weather/wind-1.svg";
            break;
        case "04n" :
            return "img/weather/wind.svg";
            break;
        case "09d" :
            return "img/weather/rain-3.svg";
            break;
        case "09n" :
            return "img/weather/rain-2.svg";
            break;
        case "10d" :
            return "img/weather/rain-3.svg";
            break;
        case "10n" :
            return "img/weather/rain-2.svg";
            break;
        case "11d" :
            return "img/weather/lightning.svg";
            break;
        case "11n" :
            return "img/weather/lightning-1.svg";
            break;
        case "13d" :
            return "img/weather/snow.svg";
            break;
        case "13n" :
            return "img/weather/snow-1.svg";
            break;
        case "50d" :
            return "img/weather/foggy.svg";
            break;
        case "50n" :
            return "img/weather/foggy.svg";
            break;
        default :
            return "img/weather/question.svg";
            break;
    }
}

$jsonToReturn = json_encode(getOpenWeather());
echo $jsonToReturn;
?>