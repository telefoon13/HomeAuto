<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Home Automation By Mike</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css.css">
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
            <a href="#">
                <i style="font-size: 80px;" class="fas fa-toolbox"></i>
                <h3>Info & Options</h3>
            </a>
        </div>
    </div>

    <?php
    include_once ("../Helpers/Vaillant.php");

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
    ?>

    <div class="row" style="height: 200px">

        <div class="col-3 align-self-center text-center">
            <a href="Valve/?room=0" <?php iconColor($devices[0]['operationMode']); ?>>
                <i style="font-size: 80px;" class="fas fa-couch"></i>
                <h3><?php echo $devices[0]["name"]; ?></h3>
                <h3><?php echo $devices[0]["currentTemperature"]." / ".$devices[0]["temperatureSetpoint"]?>&deg;C</h3>
            </a>
        </div>

        <div class="col-3 align-self-center text-center">
            <a href="#" style="<?php iconColor($devices[1]['operationMode']); ?>">
                <i style="font-size: 80px;" class="fas fa-utensil-spoon"></i>
                <h3><?php echo $devices[1]["name"]; ?></h3>
                <h3><?php echo $devices[1]["currentTemperature"]." / ".$devices[1]["temperatureSetpoint"]?>&deg;C</h3>
            </a>
        </div>

        <div class="col-3 align-self-center text-center">
            <a href="#" style="<?php iconColor($devices[2]['operationMode']); ?>">
                <i style="font-size: 80px;" class="fas fa-utensils"></i>
                <h3><?php echo $devices[2]["name"]; ?></h3>
                <h3><?php echo $devices[2]["currentTemperature"]." / ".$devices[2]["temperatureSetpoint"]?>&deg;C</h3>
            </a>
        </div>

        <div class="col-3 align-self-center text-center">
            <a href="#" style="<?php iconColor($devices[3]['operationMode']); ?>">
                <i style="font-size: 80px;" class="fas fa-keyboard"></i>
                <h3><?php echo $devices[3]["name"]; ?></h3>
                <h3><?php echo $devices[3]["currentTemperature"]." / ".$devices[3]["temperatureSetpoint"]?>&deg;C</h3>
            </a>
        </div>

    </div>

    <div class="row" style="height: 200px">

        <div class="col-3 align-self-center text-center" style="">
            <a href="#" style="<?php iconColor($devices[4]['operationMode']); ?>">
                <i style="font-size: 80px;" class="fas fa-bath"></i>
                <h3><?php echo $devices[4]["name"]; ?></h3>
                <h3><?php echo $devices[4]["currentTemperature"]." / ".$devices[4]["temperatureSetpoint"]?>&deg;C</h3>
            </a>
        </div>

        <div class="col-3 align-self-center text-center" style="">
            <a href="#">
                <i style="font-size: 80px;" class="fas fa-bed"></i>
                <h3>Julie room</h3>
                <h3><?php ?>&deg;C</h3>
            </a>
        </div>

        <div class="col-3 align-self-center text-center" style="">
            <a href="#">
                <i style="font-size: 80px;" class="fas fa-suitcase"></i>
                <h3>Guest room</h3>
                <h3><?php ?>&deg;C</h3>
            </a>
        </div>

        <div class="col-3 align-self-center text-center" style="">
            <a href="#">
                <i style="font-size: 80px;" class="fas fa-bed"></i>
                <h3>Master bedroom</h3>
                <h3><?php ?>&deg;C</h3>
            </a>
        </div>
    </div>

</div>

</body>
</html>