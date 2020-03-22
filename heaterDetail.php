<script src="js/heaterDetail.js"></script>
<?php
include_once("php/vaillant.php");
$heaterid = $_GET['heaterid'];


//If the confirm button is clicked
if (!empty($_GET['modus'])){
    $getModus = $_GET['modus'];
    $getTemp = $_GET['temp'];
	$getTime = $_GET['time'];
    if(is_numeric($heaterid)) {
        if ($getModus == "MANUAL") {
            $code = changeOperationMode($heaterid, $getModus);
            if ($code == "200") {
                $code2 = setManualTempValve($heaterid, $getTemp);
                if ($code2 == "200") {
                    $message = "Radiator modus aangepast naar MANUAL met " . $getTemp . "°C";
                }
            }
        } elseif ($getModus == "BOOST") {
            $code = changeOperationMode($heaterid, "AUTO");
            if ($code == "200") {
                $code2 = setBoostToValve($heaterid, $getTemp, $getTime);
                if ($code2 == "200") {
                    $message = "Boost staat op " . $getTemp . "°C voor " . $getTime . "min";
                }
            }
        } elseif ($getModus == "AUTO") {
            $code = changeOperationMode($heaterid, $getModus);
            if ($code == "200") {
                $message = "Radiator modus aangepast naar " . $getModus;
            }
        } elseif ($getModus == "OFF") {
            $code = changeOperationMode($heaterid, $getModus);
            if ($code == "200") {
                $message = "Radiator modus aangepast naar " . $getModus;
            }
        } elseif ($getModus == "childlock") {
            $getChildlock = $_GET['childlock'];
            $code = changechildLock($heaterid, $getChildlock);
            if ($code == "200") {
                $message = "Kinderslot aangepast naar " . $getChildlock;
            }
        }
    } elseif ($heaterid == "all" || $heaterid == "down" || $heaterid == "up"){
        $down = array(0,1,2);
        $up = array(3,4,5,6);
        $all = array_merge($down, $up);
        if ($heaterid == "all"){
            $arr = $all;
            $room = "Het volledige huis";
        } elseif ($heaterid == "down"){
            $arr = $down;
            $room = "De beneden verdieping";
        } elseif ($heaterid == "up"){
            $arr = $up;
            $room = "De boven verdiepingen";
        }

        foreach ($arr as $dev){
            if ($getModus == "MANUAL"){
                $code = changeOperationMode($dev, $getModus);
                if ($code == "200") {
                    $code2 = setManualTempValve($dev, $getTemp);
                }
            } elseif ($getModus == "BOOST"){
                $code = changeOperationMode($dev, "AUTO");
                if ($code == "200") {
                    $code2 = setBoostToValve($dev, $getTemp, $getTime);
                }
            } elseif ($getModus == "AUTO"){
                $code = changeOperationMode($dev, $getModus);
            } elseif ($getModus == "OFF"){
                $code = changeOperationMode($dev, $getModus);
            }
        }

        $message = $room . " werd op de modus " . $getModus . " gezet.";
    }
	echo '<div class="row" id="R2">
    <div class="col-12 align-self-center text-center" id="R2C1"><h1>'.$message.'</h1></div>
    <script>
        window.setTimeout(function(){window.location.href = "index.php"}, 1000);
    </script>
</div>';
	exit;
}


//Not yet submited

if(is_numeric($heaterid)){
    //Get the device with a call
    $device = getOneDevice($heaterid);
    //On error go back to index
    if (is_numeric($device)){
        header('Location: index.php');
    }

    // Check on what modus the device is now
    if($device['operationMode'] == "OFF" && $device['remainingQuickVeto'] == null){
        $modusDevice = "OFF";
    }elseif($device['operationMode'] == "AUTO" && $device['remainingQuickVeto'] == null){
        $modusDevice = "AUTO";
    }elseif($device['remainingQuickVeto'] != null){
        $modusDevice = "BOOST";
        $boostValue = $device['remainingQuickVeto'];
    }elseif($device['operationMode'] == "MANUAL" && $device['remainingQuickVeto'] == null){
        $modusDevice = "MANUAL";
    }
} else {
    $modusDevice = "AUTO";
    $device['currentTemperature'] = 21;
    $boostValue = 180;
}



//Build the page
?>

<div class="row" id="R2">
	<div class="col-sm-4 col-12 align-self-center text-center" id="R2C1" >
        <h5>Modus :</h5>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-primary <?= ($modusDevice == "MANUAL") ? 'active' : ''; ?>">
                <input type="radio" name="modus" id="MANUAL" <?= ($modusDevice == "MANUAL") ? 'checked' : ''; ?>> MANUAL
            </label>
            <label class="btn btn-primary <?= ($modusDevice == "BOOST") ? 'active' : ''; ?>">
                <input type="radio" name="modus" id="BOOST" <?= ($modusDevice == "BOOST") ? 'checked' : ''; ?>> BOOST
            </label>
            <label class="btn btn-primary <?= ($modusDevice == "AUTO") ? 'active' : ''; ?>">
                <input type="radio" name="modus" id="AUTO" <?= ($modusDevice == "AUTO") ? 'checked' : ''; ?>> AUTO
            </label>
            <label class="btn btn-primary <?= ($modusDevice == "OFF") ? 'active' : ''; ?>">
                <input type="radio" name="modus" id="OFF" <?= ($modusDevice == "OFF") ? 'checked' : ''; ?>> OFF
            </label>
        </div>
<br><br>
	</div>
	<div class="col-sm-6 col-12 align-self-center text-center" id="R2C3" >
        <div id="tempsetting">
        <h5>Temperatuur :</h5>
        <div class="slidecontainer">
            <input type="range" min="10.0" max="30.0" value="<?= $device["currentTemperature"]; ?>" step="0.5" class="slider" id="tempRange">
            <h5><span id="tempValue"></span> &deg;C</h5>
        </div>
        </div>

        <div id="timesetting">
        <h5>Tijd :</h5>
        <div class="slidecontainer">
            <input type="range" min="15" max="360" value="<?= $boostValue; ?>" step="15" class="slider" id="timeRange">
            <h5><span id="timeValue"></span>min</h5>
        </div>
        </div>
	</div>

	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C5">
        <a id="confirm" href=""">
        <input type="hidden" id="heaterid" value="<?= $heaterid; ?>">
        <img src="img/confirm.svg" alt="unlocked" class="w-50">
		<h5>Bevestig</h5>
        </a>
	</div>
</div>

<?php
if(is_numeric($heaterid)) {
    ?>
    <div class="row" id="R3">
        <a href="index.php?page=heaterDetail&heaterid=<?= $heaterid; ?>&modus=childlock&childlock=<?= ($device['childLock']) ? 'false' : 'true'; ?>">
            <div class="col-sm-2 col-6 align-self-center text-center" id="R3C1">
                <img src="img/<?= ($device['childLock']) ? 'locked' : 'unlocked'; ?>.svg" alt="childlock" class="w-50">
                <h5>Kinderslot</h5>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C2">
        <a href="index.php?page=heaterSchedule&heaterid=<?= $heaterid; ?>">
            <img src="img/schedule.svg" alt="schedule" class="w-50">
            <h5>Schema</h5>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C3">
        <img src="img/<?= ($device['isBatteryLow']) ? 'batteryLow' : 'battery'; ?>.svg" alt="battery" class="w-50">
        <h5>Batterij</h5>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C4">
        <img src="img/<?= ($device['isRadioOutOfReach']) ? 'no-signal' : 'full-signal'; ?>.svg" alt="signal"
             class="w-50">
        <h5>Signaal</h5>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C5">
        <?= ($device['isWindowOpen']) ? '<img src="img/openWindow.svg" alt="openWindow" class="w-50"><h5>Open window</h5>' : '&emsp;'; ?>

    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C6">
        <h1><?= $device["currentTemperature"]; ?> &degC</h1>
        <h5>Live temp</h5>
    </div>
    </div>
    <?php
}
        ?>