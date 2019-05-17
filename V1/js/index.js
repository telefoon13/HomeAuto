$(document).ready(function () {
    homePage();

    $('#sosButton').click(function (e) {
        //Block the standard behavior
        e.preventDefault();
        sosPage();
    });

    $('#homeButton').click(function (e) {
        //Block the standard behavior
        e.preventDefault();
        homePage();
    });
});
    function homePage() {
        clearPage();
        $('#R1C1').html('<a href="" id="sosButton"><img src="img/sos.svg" alt="SOS" width="100px" height="100px"></a>');
        $('#R2C1').html('<a href="" id="lightDownButton"><img src="img/light.svg" alt="SOS" width="100px" height="100px"><h3>Beneden</h3></a>');
        $('#R2C2').html('<a href="" id="lightUpButton"><img src="img/light.svg" alt="SOS" width="100px" height="100px"><h3>Boven</h3></a>');
    }

    function sosPage() {
        clearPage();
        makeCenterInfo();
        addHomeButton();
        $('#R3C6').html('<h1>SOS is actief</h1>');
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
        $('#R4C1').html('');
        $('#R4C2').html('');
        $('#R4C3').html('');
        $('#R4C4').html('');
        $('#R4C5').html('');
        $('#R4C6').html('');
    }

    function makeCenterInfo() {
        $('#R3C1').remove();
        $('#R3C2').remove();
        $('#R3C3').remove();
        $('#R3C4').remove();
        $('#R3C5').remove();
        $('#R3C6').removeClass('col-sm-2 col-6').addClass('col-12 text-center');
    }
    
    function addHomeButton() {
        $('#R1C1').html('<a href="" id="homeButton"><img src="img/home.svg" alt="SOS" width="100px" height="100px"></a>');
    }
