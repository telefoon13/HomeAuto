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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/timeanddate.js"></script>
</head>
<body>
<?php
include_once ("../Helpers/Vaillant.php");
$system = Vaillant::getMainSystemInfo();
$system2 = Vaillant::getMainSystemInfo2();
?>
<div class="container-fluid">
    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="../Heating">
                <i style="font-size: 80px; " class="fas fa-arrow-left"></i>
                <h3>Back</h3>
            </a>
        </div>
        <div class="col-6 align-self-center text-center">
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
        <div class="col-3 align-self-center text-center">
            &emsp;
        </div>
    </div>

    <div class="row" style="height: 100px">
        <div class="col-2 align-self-center text-center">
            &emsp;
        </div>
        <div class="col-8 align-self-center text-center">
            <h2><?= $system["name"]; ?></h2>
        </div>
        <div class="col-2 align-self-center text-center">
            &emsp;
        </div>
    </div>

    <div class="row" style="height: 300px">
        <div class="col-6 align-self-center text-right">
            serialNumber :
            <br>
            responsibleCountryCode :
            <br>
            supportedBrand :
            <br>
            capabilities :
            <br>
            macAddressEthernet :
            <br>
            macAddressWifiAccessPoint :
            <br>
            macAddressWifiClient :
            <br>
            firmwareVersion :
            <br>
            facilityTime :
            <br>
            facilityTimeZone :
        </div>
        <div class="col-6 align-self-center text-left">
            <?php
            echo
            $system["serialNumber"].
            "</br>".
            $system["responsibleCountryCode"].
            "</br>".
            $system["supportedBrand"].
            "</br>".
            $system["capabilities"].
            "</br>".
            $system["macAddressEthernet"].
            "</br>".
            $system["macAddressWifiAccessPoint"].
            "</br>".
            $system["macAddressWifiClient"].
            "</br>".
            $system["firmwareVersion"].
            "</br>".
            $system2["facilityTime"].
            "</br>".
            $system2["facilityTimeZone"].
            "</br>"
            ?>
        </div>
    </div>
</div>

</body>
</html>