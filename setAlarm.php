<?php
include_once("php/homeAssistant.php");

$code = $_POST["code"];
$submit = $_POST["submit"];

if (codeOk($code)) {
    if ($submit == "Gaan slapen") {
        $entity_id = "input_boolean.alarmstatepre";
        $state = "on";
        $message = "Alarm werd ingeschakeld.<br><br>U heeft nog<div id='seconds'>60 seconden</div> om de beneden verdiepeing te verlaten.";
    } elseif ($submit == "Buiten huis") {
        $entity_id = "input_boolean.alarmstatepre";
        $state = "on";
        $message = "Alarm werd ingeschakeld.<br><br>U heeft nog<div id='seconds'>60 seconden</div> om het gebouw te verlaten.";
    } elseif ($submit == "Uitschakelen") {
        $entity_id = "input_boolean.alarmstate";
        $state = "off";
        $message = "Alarm werd uitgeschakeld.";
    }
    $setAlarm = postStateEntity($entity_id,$state);
    if ($setAlarm == "200"){
        header( "refresh:60;url=index.php" );
    } else {
        $message = "Er ging iets mis.<br>Alarm werd niet ingeschakeld.<br>".$setAlarm;
        header( "refresh:10;url=index.php" );
    }
} else {
    $message = "Foutieve code!!<br>Dit incident werd door gegeven aan Mike.";
    header( "refresh:10;url=index.php" );
}

function codeOk ($theCode){
    global $alarmCodes;
    foreach ($alarmCodes as $alarmCode){
        if ($theCode == $alarmCode){
            return true;
        }
    }
}
?>
<div class="row" id="R2">
    <div class="col-12 align-self-center text-center" id="R2C1">
        <h2><?= $message; ?></h2>
    </div>
</div>
