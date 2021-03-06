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
            <!--<a href="#">
                <i style="font-size: 80px; " class="fas fa-door-open"></i>
                <h3>Leave home</h3>
            </a>-->
        </div>
    </div>

    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="Power">
                <h3>Power</h3>
                <i style="font-size: 80px; " class="fas fa-bolt"></i>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="Gas">
                <h3>Gas</h3>
                <i style="font-size: 80px; " class="fas fa-burn"></i>
            </a>
        </div>

        <div class="col-3 align-self-center text-center">
            <a href="Water">
                <h3>Water</h3>
                <i style="font-size: 80px; " class="fas fa-tint"></i>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="PowerServer">
                <h3>Power Server</h3>
                <i style="font-size: 80px; " class="fas fa-server"></i>
            </a>
        </div>
    </div>
    <?php
    include_once("../Helpers/GetPOW.php");
    ?>
    <div class="row"  style="height: 200px">
        <div class="col-3 align-self-center  text-center">
            <h4>Day power today</h4>
            <h4>xx.xx kWh</h4>
            <h4>Night power today</h4>
            <h4>xx.xx kWh</h4>
        </div>
        <div class="col-3 align-self-center  text-center">
            <h4>Gas usage today</h4>
            <h4>xx.xx M³</h4>
        </div>
        <div class="col-3 align-self-center  text-center">
            <h4>Water usage today</h4>
            <h4>xx.xx M³</h4>
        </div>
        <div class="col-3 align-self-center  text-center">
            <h4>Power usage today</h4>
            <h4><?= GetPOW::getPowerToday("192.168.178.156"); ?> kWh</h4>
        </div>
    </div>
</div>

</body>
</html>