<script src="js/alarmKeyPad.js"></script>
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
$statusAlarm = getStateEntity("input_boolean.alarmstate");
$statusAlarmPre = getStateEntity("input_boolean.alarmstatepre");
if (!$alarmClear && $statusAlarm["state"] == "off" && $statusAlarmPre["state"] == "off"){
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
    <form method="post" action="index.php?page=setAlarm">
    <div class="row" id="R2">
        <div class="d-none d-sm-block col-sm-1 align-self-center text-center" id="R2C0">
            &emsp;
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C2">
                <img src="img/numbers/one.svg" alt="one" id="1" class="numbers">
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C3">
                <img src="img/numbers/two.svg" alt="two" id="2" class="numbers">
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C4">
                <img src="img/numbers/three.svg" alt="three" id="3" class="numbers">
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C5">
                <img src="img/numbers/four.svg" alt="four" id="4" class="numbers">
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C6">
                <img src="img/numbers/five.svg" alt="five" id="5" class="numbers">
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C7">
                <img src="img/numbers/six.svg" alt="six" id="6" class="numbers">
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C8">
                <img src="img/numbers/seven.svg" alt="seven" id="7" class="numbers">
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C9">
                <img src="img/numbers/eight.svg" alt="eight" id="8" class="numbers">
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C10">
                <img src="img/numbers/nine.svg" alt="nine" id="9" class="numbers">
        </div>
        <div class="d-block d-sm-none col-4 align-self-center text-center" id="R2C11">
            &emsp;
        </div>
        <div class="col-sm-1 col-4 align-self-center text-center" id="R2C1">
                <img src="img/numbers/zero.svg" alt="zero" id="0" class="numbers">
        </div>
        <div class="d-none d-sm-block col-sm-1 align-self-center text-center" id="R2C11">
            &emsp;
        </div>
    </div>
    <div class="row" id="R3">
        <div class="d-none d-sm-block col-sm-2 align-self-center text-center" id="R2C11">
            &emsp;
        </div>
        <div class="d-block d-sm-none col-12 align-self-center text-center" id="R2C11">
            &emsp;
        </div>
        <div class="col-sm-3 col-12 align-self-center text-center" id="R3C0">
            <?php
            if ($statusAlarm["state"] == "on" OR $statusAlarmPre["state"] == "on"){
                echo "&emsp;";
            } else {
                //echo "<input type='image' src='img/moon.svg' alt='moon' name='Submit4' value='moon'>";
                echo "<input type='submit' name='submit' value='Gaan slapen' class=\"btn btn-primary\" style=\"height: 70px; text-align: center; font-size: 25px\">";
            }
            ?>
        </div>
        <div class="col-sm-2 col-12 align-self-center text-center" id="R3C1">
            <input type="text" autofocus pattern="\d*" maxlength="4" minlength="4" name="code" id="code" class="form-control" style="height: 70px; text-align: center; font-size: 25px">
        </div>
        <div class="col-sm-3 col-12  align-self-center text-center" id="R3C0">
            <?php
            if ($statusAlarm["state"] == "on" OR $statusAlarmPre["state"] == "on"){
                //echo "<img src=\"img/unlocked.svg\" alt=\"unlocked\">";
                echo "<input type='submit' name='submit' value='Uitschakelen' class=\"btn btn-primary\" style=\"height: 70px; text-align: center; font-size: 25px\">";
            } else {
                //echo "<img src=\"img/exit.svg\" alt=\"exit\">";
                echo "<input type='submit' name='submit' value='Buiten huis' class=\"btn btn-primary\" style=\"height: 70px; text-align: center; font-size: 25px\">";
            }
            ?>
        </div>
        <div class="d-none d-sm-block col-sm-2 align-self-center text-center" id="R2C11">
            &emsp;
        </div>
    </div>
    </form>
<?php
}

?>