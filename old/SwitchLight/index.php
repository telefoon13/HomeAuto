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
<?php
include_once ("../Helpers/LightSwitch.php");
$IP = $_GET['IP'];
$PORT = $_GET['PORT'];
$STATUS = $_GET['STATUS'];
$FROM = $_GET['FROM'];
$LIGHT = $_GET['LIGHT'];
$RETURN = true;
$message = "Something went wrong !!";


$result = LightSwitch::switchLight($IP, $PORT, $STATUS, $RETURN);

if ($result == "{\"POWER".$PORT."\":\"". $STATUS."\"}"){
    $message = $LIGHT . " light is switched";
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
        <div class="col-4 align-self-center text-center">
            &emsp;
        </div>
        <div class="col-4 align-self-center text-center">
            <h2><?= $message; ?></h2>
            <script>
                window.setTimeout(function(){window.location.href = "../<?= $FROM; ?>"}, 1000);
            </script>
        </div>
        <div class="col-4 align-self-center text-center">
            &emsp;
        </div>
    </div>
</div>

</body>
</html>