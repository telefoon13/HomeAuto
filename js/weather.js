//If the page is fully loaded
$(document).ready(function () {

    //Make an empty array for the info
    var stationInfo = [];

    //
    var openWeatherInfo = "img/weather/question.svg";

        getWeatherStationInfo();
        getOpenWeatherInfo();

});
    //Get the weather station info
    function getWeatherStationInfo() {
        $.ajax({
            url: 'php/netatmo.php',
            data: {"ajax": "1"},
            dataType: 'json',
            success: onSuccess,
            error: function (err) {
                console.log('Fout: ', err);
            }
        });
        setTimeout(getWeatherStationInfo, 1800000);
    }

    //Fill the empty array with info when there was a suc6
    function onSuccess(data) {
        stationInfo = data.stationInfo;
        buildDivsTemps();
    }

    function buildDivsTemps() {
        var divs = '';
        if (typeof stationInfo === 'undefined'){
            divs = "Error loading";
        } else {
            divs += '<a href="?page=netatmo"><h2>';
            divs += stationInfo.temperature_OUT.toFixed(1);
            divs += '&deg;C';
            divs += '</h2></a> ';
        }

        $('#R1C3').html(divs);
        //setInterval('getWeatherStationInfo();', '600000');
    }

function getOpenWeatherInfo() {
    $.ajax({
        url: 'php/openWeatherMap.php',
        dataType: 'json',
        success: onSuccessOpenWeatherMap,
        error: function (err) {
            console.log('Fout: ', err);
        }
    });
    setTimeout(getOpenWeatherInfo, 1800000);
}

//Fill the empty string with info when there was a suc6
function onSuccessOpenWeatherMap(data) {
    openWeatherInfo = data.openWeatherInfo;
    buildDivOpenWeather();
}

function buildDivOpenWeather() {
    var divs = '';
    if (typeof openWeatherInfo === 'undefined'){
        divs = "<img alt=\"Question\" src=\"img/weather/question.svg\" class=\"w-50\">";
    } else {
        divs = '<img src="' +
            openWeatherInfo.svg +
            '" class="w-50" alt="WeatherIcon"> ';
    }

    $('#R1C4').html(divs);
    //setInterval('getOpenWeatherInfo();', '600000');
}