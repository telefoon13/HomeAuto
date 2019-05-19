<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Home Auto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
    <script src="js/timeanddate.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row" id="R1">
        <div class="d-block col-sm-2 col-6 align-self-center" id="R1C1">

        </div>
        <div class="d-none d-sm-block col-sm-4 align-self-center" id="R1C2">
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
        <div class="d-none d-sm-block col-sm-2 align-self-center text-right" id="R1C3">
            <h4>IN : 20&deg;C</h4>
            <h4>OUT : 13&deg;C</h4>
        </div>
        <div class="d-none d-sm-block col-sm-2 align-self-center" id="R1C4">
            <img alt="Sun" src="img/weather/sun.svg" width="100px" height="100px">
        </div>
        <div class=" col-sm-2 col-6 align-self-center" id="R1C5">E</div>
    </div>
    <div class="row" id="R2">
        <div class="col-sm-2 col-6 align-self-center" id="R2C1">F</div>
        <div class="col-sm-2 col-6 align-self-center" id="R2C2">G</div>
        <div class="col-sm-2 col-6 align-self-center" id="R2C3">H</div>
        <div class="col-sm-2 col-6 align-self-center" id="R2C4">I</div>
        <div class="col-sm-2 col-6 align-self-center" id="R2C5">J</div>
        <div class="col-sm-2 col-6 align-self-center" id="R2C6">K</div>
    </div>
    <div class="row" id="R3">
        <div class="col-sm-2 col-6 align-self-center" id="R3C1">L</div>
        <div class="col-sm-2 col-6 align-self-center" id="R3C2">M</div>
        <div class="col-sm-2 col-6 align-self-center" id="R3C3">N</div>
        <div class="col-sm-2 col-6 align-self-center" id="R3C4">O</div>
        <div class="col-sm-2 col-6 align-self-center" id="R3C5">P</div>
        <div class="col-sm-2 col-6 align-self-center" id="R3C6">Q</div>
    </div>
    <!--
    <div class="row" id="R4">
        <div class="col-sm-2 col-6 align-self-center" id="R4C1">R</div>
        <div class="col-sm-2 col-6 align-self-center" id="R4C2">S</div>
        <div class="col-sm-2 col-6 align-self-center" id="R4C3">T</div>
        <div class="col-sm-2 col-6 align-self-center" id="R4C4">U</div>
        <div class="col-sm-2 col-6 align-self-center" id="R4C5">V</div>
        <div class="col-sm-2 col-6 align-self-center" id="R4C6">W</div>
    </div>
    -->
</div>
</body>
</html>

