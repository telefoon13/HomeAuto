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
    <script src="../../js/timeanddate.js"></script>
</head>
<?php
include_once ("../../Helpers/GetPOW.php");
?>
<body>
<div class="container-fluid">
    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="../../PowerUsages">
                <i style="font-size: 80px; " class="fas fa-arrow-left"></i>
                <h3>Back</h3>
            </a>
        </div>
        <div class="col-6 align-self-center text-center">
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
        <div class="col-3 align-self-center text-center">
            <!--<a href="#">
                <i style="font-size: 80px; " class="fas fa-door-open"></i>
                <h3>Leave home</h3>
            </a>-->
        </div>
    </div>

    <div class="row" style="height: 400px">
        <div class="col-5 align-self-center text-center">
                <i style="font-size: 190px; " class="fas fa-server"></i>
        </div>

        <div class="col-3 align-self-center text-right">
            <h4>Voltage</h4>
            <h4>Current</h4>
            <h4>Power</h4>
            <h4>Factor</h4>
            <h4>Usage Today</h4>
            <h4>Usage Yesterday</h4>
            <h4>Usage Total</h4>
        </div>
        <div class="col-2 align-self-center text-right">
            <?= GetPOW::getAll("192.168.178.156"); ?>
        </div>
        <div class="col-2 align-self-center text-left">
            <h4>V</h4>
            <h4>A</h4>
            <h4>W</h4>
            <h4>&emsp;</h4>
            <h4>kWh</h4>
            <h4>kWh</h4>
            <h4>kWh</h4>
        </div>
    </div>

</div>
</body>
</html>
