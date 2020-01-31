<?php
include_once("php/homeAssistant.php");

//Get all the sensors
//Array of all sensors that need to be clear before turning on Alarm(To add in DB)
$binary_sensors = array("binary_sensor.reedvoordeur","binary_sensor.vibration_11","binary_sensor.water_12","");
$alarmClear = true;
$message = "";
foreach ($binary_sensors as $binary_sensor){
    $sensor = getStateEntity($binary_sensor);
    if ($sensor["state"] == "on"){
        $alarmClear = false;
        $message .= "<li>".$sensor["name"] . " is niet klaar.</li>";
    }
}
if (!$alarmClear){
    echo "
            <div class=\"row\" id=\"R2\">
                <div class=\"col-12 align-self-center text-center\" id=\"R2C1\">
                <h2>Alarm kan niet geactiveerd worden.</h2>
                <hr>
                <ul>
                <h3>".$message."</h3>
                </ul>
                </div>
            </div>";
} else {
    //Hier code klavier
    ?>
    <div class="row" id="R2">
        <div class="d-none d-sm-block col-sm-1 align-self-center text-center" id="R2C0">
            &emsp;
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C2">
            <div id="one">
                <img src="img/numbers/one.svg" alt="one">
            </div>
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C3">
            <div id="two">
                <img src="img/numbers/two.svg" alt="two">
            </div>
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C4">
            <div id="three">
                <img src="img/numbers/three.svg" alt="three">
            </div>
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C5">
            <div id="four">
                <img src="img/numbers/four.svg" alt="four">
            </div>
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C6">
            <div id="five">
                <img src="img/numbers/five.svg" alt="five">
            </div>
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C7">
            <div id="six">
                <img src="img/numbers/six.svg" alt="six">
            </div>
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C8">
            <div id="seven">
                <img src="img/numbers/seven.svg" alt="seven">
            </div>
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C9">
            <div id="eight">
                <img src="img/numbers/eight.svg" alt="eight">
            </div>
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C10">
            <div id="nine">
                <img src="img/numbers/nine.svg" alt="nine">
            </div>
        </div>
        <div class="d-block d-sm-none col-4 align-self-center text-center" id="R2C11">
            &emsp;
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C1">
            <div id="zero">
                <img src="img/numbers/zero.svg" alt="zero">
            </div>
        </div>
        <div class="d-none d-sm-block col-sm-1 align-self-center text-center" id="R2C11">
            &emsp;
        </div>
    </div>
    <div class="row" id="R3">
        <div class="col-sm-12 col-12 align-self-center text-center" id="R3C1">

        </div>
    </div>
<?php
}

?>