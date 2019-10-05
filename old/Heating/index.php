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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/timeanddate.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="/HomeAuto">
                <i style="font-size: 80px; " class="fas fa-arrow-left"></i>
                <h3>Back</h3>
            </a>
        </div>
        <div class="col-6 align-self-center text-center">
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="options.php">
                <i style="font-size: 80px;" class="fas fa-toolbox"></i>
                <h3>Info & Options</h3>
            </a>
        </div>
    </div>

    <?php
    include_once("../Helpers/Vaillant.php");

    $devices = Vaillant::getAllDevices();

    function iconColor($deviceOperationMode){
        switch ($deviceOperationMode) {
            case "OFF":
                echo "color:gray;";
                break;
            case "MANUAL":
                echo "color:goldenrod;";
                break;
        }
    }

    function showValve($id){
        global $devices;
        ?>
        <div class="col-3 align-self-center text-center">
            <?php
            $beginMelding = "<div class=\"meldingValve\"><i class=\"fas fa-";
            $eindMelding = "\"></i></div>";
            if($devices[$id]["isWindowOpen"]){
                echo $beginMelding."wind".$eindMelding;
            }elseif($devices[$id]["isBatteryLow"]){
                echo $beginMelding."battery-quarter".$eindMelding;
            }elseif($devices[$id]["isRadioOutOfReach"]){
                echo $beginMelding."signal".$eindMelding;
            }elseif ($devices[$id]["remainingQuickVeto"] != null){
                echo $beginMelding."clock".$eindMelding;
            }
            ?>
            <a href="Valve?room=<?php echo $devices[$id]['roomIndex']; ?>" style="<?php echo iconColor($devices[$id]['operationMode']); ?>">
                <i style="font-size: 80px;" class="fas fa-<?php echo $devices[$id]["icon"]; ?>"></i>
                <h3><?php echo $devices[$id]["name"]; ?></h3>
                <h3><?php echo $devices[$id]["currentTemperature"]." / ".$devices[$id]["temperatureSetpoint"]?>&deg;C</h3>
            </a>
        </div>
    <?php
    }
    ?>

    <div class="row" style="height: 200px">
        <?php
        for ($i = 0; $i <= 3; $i++){
            showValve($i);
        }
        ?>
    </div>

    <div class="row" style="height: 200px">
        <?php
        for ($i = 4; $i <= 4; $i++){
            showValve($i);
        }
        ?>
    </div>

</div>

</body>
</html>