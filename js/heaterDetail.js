$(document).ready(function () {

    //JS to set the value of temp and time equal to the slider
    var sliderTemp = document.getElementById("tempRange");
    var outputTemp = document.getElementById("tempValue");
    var sliderTime = document.getElementById("timeRange");
    var outputTime = document.getElementById("timeValue");

    outputTemp.innerHTML = Number(sliderTemp.value).toFixed(1);
    outputTime.innerHTML = sliderTime.value;

    sliderTemp.oninput = function() {
        outputTemp.innerHTML = Number(this.value).toFixed(1);
    };
    sliderTime.oninput = function() {
        outputTime.innerHTML = this.value;
    };

    //JS to show or hide the temp and/or time dependig on modus choise
    var modus = $('input[name="modus"]');
    var tempsetting = $("#tempsetting");
    var timesetting = $("#timesetting");
    var theModus;

    for (var i = 0, length = modus.length; i < length; i++) {
        if (modus[i].checked) {
            modusChanges(modus[i].id);
        }
    }

    function modusChanges(value) {
        if (value === "OFF" || value === "AUTO"){
            tempsetting.hide();
            timesetting.hide();
        } else if  (value === "MANUAL"){
            tempsetting.show();
            timesetting.hide();
        } else if  (value === "BOOST"){
            tempsetting.show();
            timesetting.show();
        }
        theModus = value;
    }

    modus.change(function (e) {
        modusChanges(this.id);
    });

    //When confirm link is clicked
    $('#confirm').click(function (e) {
       e.preventDefault();
        let heaterid = $("#heaterid")[0].value;
        console.log(heaterid);
        window.location.href = "index.php?page=heaterDetail&heaterid="+heaterid+"&modus="+theModus+"&temp="+parseFloat(sliderTemp.value)+"&time="+parseInt(sliderTime.value);
    });
});