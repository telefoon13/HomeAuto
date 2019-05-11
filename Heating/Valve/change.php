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
</head>
<body>
<?php
    include_once ("../../Helpers/Vaillant.php");
    $roomID = $_GET["room"];
    $mode = $_GET["mode"];
    $temp = $_GET["temp"];
    $time = $_GET["time"];
    $childLock = $_GET["childLock"];
    $message = "Something went wrong !!";

    if ($mode == 1 || $mode == 2){
        if ($mode == 1){
            $modeFull = "OFF";
        } elseif ($mode == 2){
            $modeFull = "AUTO";
        }
        $code = Vaillant::changeOperationMode($roomID,$modeFull);
        if ($code == "200"){
            $message = "Valve changed to ".$modeFull;
        }
    }elseif ($mode == 3){
        $code1 = Vaillant::changeOperationMode($roomID,"AUTO");
        if ($code1 == "200"){
            $code2 = Vaillant::setBoostToValve($roomID,$temp,$time);
            if ($code2 == "200"){
                $message = "Boost set to ".$temp."°C for ".$time."min";
            }
        }
    }elseif ($mode == 4){
        $code1 = Vaillant::changeOperationMode($roomID,"MANUAL");
        if ($code1 == "200"){
            $code2 = Vaillant::setManualTempValve($roomID,$temp);
            if ($code2 == "200"){
                $message = "Valve changed to MANUAL with ".$temp."°C";
            }
        }
    }elseif ($mode == 5){
        if($childLock == 1){
            $setChildLockTo = false;
            $lock = "unlocked";
        } elseif ($childLock == 0){
            $setChildLockTo = true;
            $lock = "locked";
        }
        $code = Vaillant::changechildLock($roomID,$setChildLockTo);
        if ($code == "200"){
            $message = "Child lock changed to ".$lock;
        }
    }
    ?>
<div class="container-fluid">
    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            &emsp;
        </div>
        <div class="col-6 align-self-center text-center">
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
        <div class="col-3 align-self-center text-center">
            &emsp;
        </div>
    </div>

    <div class="row" style="height: 200px">
        <div class="col-2 align-self-center text-center">
            &emsp;
        </div>
        <div class="col-8 align-self-center text-center">
            <h2><?= $message; ?></h2>
            <script>
                window.setTimeout(function(){window.location.href = "../"}, 2500);
            </script>
        </div>
        <div class="col-2 align-self-center text-center">
            &emsp;
        </div>
    </div>
</div>

</body>
</html>