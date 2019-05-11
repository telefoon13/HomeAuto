$(document).ready(function () {
    var time = parseInt(document.getElementById("theRealTime").value);
    var temp = parseFloat(document.getElementById("theRealTemp").value);
    var range = document.getElementById("myRange").value;
    var blockTime;
    var blockTemp;

    updateTemp();
    updateTime();
    sliderChanges(range);

    function updateTime(){
        if(time < 0){
            time = 0;
        }
        if(time > 720){
            time = 720;
        }
        $('.theTime').text(time+"min");
    }

    function updateTemp(){
        if(temp < 0){
            temp = 0;
        }
        if(temp > 30){
            temp = 30;
        }
        $('.theTemp').text(temp+ "°C");
    }

    function sliderChanges(value){
        if(value === "1"){
            $('.minTemp').css("color" ,"gray");
            $('.plusTemp').css("color" ,"gray");
            $('.minTime').css("color" ,"gray");
            $('.plusTime').css("color" ,"gray");
            $('.theTime').css("color" ,"gray");
            $('.theTemp').css("color" ,"gray");
            blockTemp = true;
            blockTime = true;
            updateURL();
        }else if(value === "2"){
            $('.minTemp').css("color" ,"gray");
            $('.plusTemp').css("color" ,"gray");
            $('.minTime').css("color" ,"gray");
            $('.plusTime').css("color" ,"gray");
            $('.theTime').css("color" ,"gray");
            $('.theTemp').css("color" ,"gray");
            blockTemp = true;
            blockTime = true;
            updateURL();
        }else if(value === "3"){
            $('.minTemp').css("color" ,"#02529F");
            $('.plusTemp').css("color" ,"#02529F");
            $('.minTime').css("color" ,"#02529F");
            $('.plusTime').css("color" ,"#02529F");
            $('.theTime').css("color" ,"#02529F");
            $('.theTemp').css("color" ,"#02529F");
            blockTemp = false;
            blockTime = false;
            updateURL();
        }else if(value === "4"){
            $('.minTemp').css("color" ,"#02529F");
            $('.plusTemp').css("color" ,"#02529F");
            $('.minTime').css("color" ,"gray");
            $('.plusTime').css("color" ,"gray");
            $('.theTime').css("color" ,"gray");
            $('.theTemp').css("color" ,"#02529F");
            blockTemp = false;
            blockTime = true;
            updateURL();
        }
    }

    function updateURL(){
        var roomID = document.getElementById("roomID").value;
        var mode = document.getElementById("myRange").value;
        $('#confirm').attr("href", "?room="+roomID+"&mode="+mode+"&temp="+temp+"&time="+time);
    }

    $('.plusTemp').on("click", function (e) {
        if(!blockTemp){
            temp += 0.5;
            updateTemp();
            updateURL();
        }
    });

    $('.minTemp').on("click", function (e) {
        if(!blockTemp) {
            temp -= 0.5;
            updateTemp();
            updateURL();
        }
    });

    $('.plusTime').on("click", function (e) {
        if(!blockTime) {
            time += 15;
            updateTime();
            updateURL();
        }
    });

    $('.minTime').on("click", function (e) {
        if(!blockTime) {
            time -= 15;
            updateTime();
            updateURL();
        }
    });

    $('#myRange').change(function (e) {
       sliderChanges(this.value);
    });

});