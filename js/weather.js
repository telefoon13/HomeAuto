//If the page is fully loaded
$(document).ready(function () {

    //Make an empty array for the info
    var stationInfo = [];

    getThemAll();
});
    //Get the weather station info
    function getThemAll() {
        $.ajax({
            url: 'php/netatmo.php',
            dataType: 'json',
            success: onSuccess,
            error: function (err) {
                console.log('Fout: ', err);
            }
        });
    }

    //Fill the empty array with info when there was a suc6
    function onSuccess(data) {
        stationInfo = data.stationInfo;
        buildDivs();
    }

    function buildDivs() {
        console.log("buildTheDivs");
        var divs = '';
        if (typeof stationInfo === 'undefined'){
            divs = "Error loading";
        } else {
            divs += '<h4>';
            divs += '<img src="img/weather/inside.svg" width="23px" alt="inside"> ';
            divs += stationInfo.temperature.toFixed(1);
            divs += '&deg;C';
            divs += '</h4>';
            divs += '<h4>';
            divs += '<img src="img/weather/outside.svg" width="23px" alt="inside"> ';
            divs += stationInfo.temperature_OUT.toFixed(1);
            divs += '&deg;C';
            divs += '</h4>';
        }
        $('#R1C3').html(divs);
        // setInterval('getThemAll();', '600000');
    }