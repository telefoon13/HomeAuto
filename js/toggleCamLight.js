$(document).ready(function () {
    var button = $("#toggleLight");

    button.click(function (e) {
        e.preventDefault();
        $.get("http://"+button.attr("src")+"/cm?cmnd=Power%20Toggle");
        $("#liveImage").attr("src",$("#liveImage").getAttribute("src")+Math.random());
    });
});