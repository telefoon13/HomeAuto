$(document).ready(function () {
    homePage();

    $('#sosButton').click(function (e) {
        e.preventDefault();
        sosPage();
    });

    $('#homeButton').click(function (e) {
        e.preventDefault();
        homePage();
    });

   $('#lightDownButton').click(function (e) {
        e.preventDefault();
        downStairsLightsPage();
    });

    $('#entryLightButton').click(function (e) {
        alert("hallo");
        e.preventDefault();
        switchLightPage();
    });

});
    function homePage() {
        clearPage();
        $('#R1C1').html('<a href="" id="sosButton"><img src="img/sos.svg" alt="SOS" width="100px" height="100px"></a>');
        $('#R2C1').html('<a href="" id="lightDownButton"><img src="img/light.svg" alt="light" width="100px" height="100px"><h3>Beneden</h3></a>');
        $('#R2C2').html('<a href="" id="lightUpButton"><img src="img/light.svg" alt="light" width="100px" height="100px"><h3>Boven</h3></a>');
        $('#R2C3').html('<a href="" id="usageButton"><img src="img/meter.svg" alt="meter" width="100px" height="100px"><h3>Verbruik</h3></a>');
        $('#R2C4').html('<a href="" id="cameraButton"><img src="img/cctv.svg" alt="cctv" width="100px" height="100px"><h3>Camera\'s</h3></a>');
        $('#R2C5').html('<a href="" id="heaterButton"><img src="img/heater.svg" alt="heater" width="100px" height="100px"><h3>Verwarming</h3></a>');
    }

    function downStairsLightsPage() {
        clearPage();
        addHomeButton();
        $('#R2C1').html('<a href="" id="entryLightButton" class="lightSwitch"><img src="img/downStairs/door.svg" alt="door" width="100px" height="100px"></a>');
        $('#R2C2').html('<a href="" id="livingLightButton"><img src="img/downStairs/couch.svg" alt="couch" width="100px" height="100px"></a>');
        $('#R2C3').html('<a href="" id="standingLightButton"><img src="img/downStairs/bedside-table.svg" alt="bedside" width="100px" height="100px"></a>');
        $('#R2C4').html('<a href="" id="playLightButton"><img src="img/downStairs/abc-block.svg" alt="abc" width="100px" height="100px"></a>');
        $('#R2C5').html('<a href="" id="kitchenLightButton"><img src="img/downStairs/kitchen.svg" alt="kitchen" width="100px" height="100px"></a>');
        $('#R2C6').html('<a href="" id="dinnerLightButton"><img src="img/downStairs/restaurant.svg" alt="kitchen" width="100px" height="100px"></a>');
        $('#R3C1').html('<a href="" id="toiletLightButton"><img src="img/downStairs/toilet-paper.svg" alt="kitchen" width="100px" height="100px"></a>');
        $('#R3C2').html('<a href="" id="terraceLightButton"><img src="img/downStairs/terrace.svg" alt="kitchen" width="100px" height="100px"></a>');
        $('#R3C3').html('<a href="" id="gardenLightButton"><img src="img/downStairs/grass.svg" alt="kitchen" width="100px" height="100px"></a>');
        $('#R3C4').html('<a href="" id="shedLightButton"><img src="img/downStairs/shed.svg" alt="kitchen" width="100px" height="100px"></a>');
    }

    function sosPage() {
        clearPage();
        makeCenterInfo();
        addHomeButton();
        $('#R2C6').html('<h1>SOS is actief</h1>');
    }

    function switchLightPage(){
        clearPage();
        makeCenterInfo();
        addHomeButton();
        //var id = e.target.id;
        $('#R2C6').html(' is switched');
    }

    function clearPage() {
        $('#R1C1').html('');
        $('#R1C5').html('');
        $('#R2C1').html('');
        $('#R2C2').html('');
        $('#R2C3').html('');
        $('#R2C4').html('');
        $('#R2C5').html('');
        $('#R2C6').html('');
        $('#R3C1').html('');
        $('#R3C2').html('');
        $('#R3C3').html('');
        $('#R3C4').html('');
        $('#R3C5').html('');
        $('#R3C6').html('');
        /*$('#R4C1').html('');
        $('#R4C2').html('');
        $('#R4C3').html('');
        $('#R4C4').html('');
        $('#R4C5').html('');
        $('#R4C6').html('');*/
    }

    function makeCenterInfo() {
        $('#R2C1').remove();
        $('#R2C2').remove();
        $('#R2C3').remove();
        $('#R2C4').remove();
        $('#R2C5').remove();
        $('#R2C6').removeClass('col-sm-2 col-6').addClass('col-12 text-center');
    }
    
    function addHomeButton() {
        $('#R1C1').html('<a href="" id="homeButton"><img src="img/home.svg" alt="SOS" width="100px" height="100px"></a>');
    }
