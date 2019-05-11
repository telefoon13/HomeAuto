<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Home Automation By Mike</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../../js/timeanddate.js"></script>
    <script src="../../js/SetValve.js"></script>
</head>
<body>
    <?php
    include_once ("../../Helpers/Vaillant.php");

    $device = Vaillant::getOneDevice($_GET["room"]);
    ?>

<div class="container-fluid">
    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="/HomeAuto/Heating">
                <i style="font-size: 80px; " class="fas fa-arrow-left"></i>
                <h3>Back</h3>
            </a>
        </div>
        <div class="col-6 align-self-center text-center">
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
        <div class="col-3 align-self-center text-center">
            <input type="hidden" id="roomID" value="<?= $device['roomIndex']; ?>">
            <a id="confirm" href="#">
                <i style="font-size: 80px;" class="fas fa-check"></i>
                <h3>Confirm</h3>
            </a>
        </div>
    </div>

    <div class="row" style="height: 133px">
        <div class="col-3 align-self-center text-right">
            <i style="font-size: 80px;" class="fas fa-<?php echo $device['icon']; ?>"></i>
        </div>

        <div class="col-3 align-self-center text-left">
            <h3><?php echo $device['name']; ?></h3>
            <h3><?php echo $device["currentTemperature"]." / ".$device["temperatureSetpoint"]?>&deg;C</h3>
        </div>


        <div class="col-6 align-self-center text-center slidecontainer">
            <?php
            if($device['operationMode'] == "OFF" && $device['remainingQuickVeto'] == null){
                    $rangeValue = 1;
            }elseif($device['operationMode'] == "AUTO" && $device['remainingQuickVeto'] == null){
                $rangeValue = 2;
            }elseif($device['remainingQuickVeto'] != null){
                $rangeValue = 3;
            }elseif($device['operationMode'] == "MANUAL" && $device['remainingQuickVeto'] == null){
                $rangeValue = 4;
            }
            ?>
            <input type="range" name="myRange" min="1" max="4" value="<?php echo $rangeValue; ?>" class="slider" id="myRange">
            <h4>OFF &emsp;&emsp; AUTO &emsp;&emsp;&emsp; BOOST &emsp;&emsp; MAN</h4>
        </div>
    </div>


    <div class="row" style="height: 133px">
        <div class="col-3 align-self-center text-right">
            <h3><i class="fas fa-<?php
             if($device['childLock']){
                echo "lock";
             }elseif (!$device['childLock']){
                 echo "lock-open";
             }else{
                 echo "question";
             }
            ?>"> Child lock</i></h3>
        </div>
        <div class="col-3 align-self-center text-left">
            <h3><i class="fas fa-<?php
                if($device['isBatteryLow']){
                    echo "battery-quarter\" style=\"color: red;";
                }elseif (!$device['isBatteryLow']){
                    echo "battery-full";
                }else{
                    echo "question";
                }
                ?>"> Battery</i></h3>
        </div>


        <div class="col-2 align-self-center text-center">
            <h1><i class="fas fa-minus minTemp"></i></h1>
        </div>
        <div class="col-2 align-self-center text-center">
            <input type="hidden" id="theRealTemp" value="<?php echo round($device["currentTemperature"] *2)/2; ?>">
            <h1><div class="theTemp" id="theTemp"></div></h1>
        </div>
        <div class="col-2 align-self-center text-center">
            <h1><i class="fas fa-plus plusTemp"></i></h1>
        </div>
    </div>


    <div class="row" style="height: 133px">
        <div class="col-3 align-self-center text-right">
            <h3><?php
                if($device['isWindowOpen']){
                    echo "<i class=\"fas fa-window\"> Open window</i>";
                }elseif (!$device['isWindowOpen']){
                    echo "";
                }else{
                    echo "<i class=\"fas fa-question\"> Open window</i>";
                }
                ?></h3>
        </div>
        <div class="col-3 align-self-center text-left">
            <h3><i class="fas fa-<?php
                if($device['isRadioOutOfReach']){
                    echo "times-circle\" style=\"color: red;";
                }elseif (!$device['isRadioOutOfReach']){
                    echo "signal";
                }else{
                    echo "question";
                }
                ?>"> Signal</i></h3>
        </div>


        <div class="col-2 align-self-center text-center">
            <h1><i class="fas fa-minus minTime"></i></h1>
        </div>
        <div class="col-2 align-self-center text-center">
            <input type="hidden" id="theRealTime" value="<?php if($device['remainingQuickVeto'] != null){ echo $device["remainingQuickVeto"]; } else { echo "60"; }  ?>">
            <h1><div class="theTime" id="theTime"></div></h1>
        </div>
        <div class="col-2 align-self-center text-center">
            <h1><i class="fas fa-plus plusTime"></i></h1>
        </div>
    </div>