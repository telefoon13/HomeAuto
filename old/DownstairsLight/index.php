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
            <a href="../SwitchLight/?IP=192.168.178.150&PORT=1&STATUS=ON&FROM=DownstairsLight&LIGHT=Entry">
                <i style="font-size: 80px; " class="fas fa-door-closed"></i>
                <h3>Entry</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight/?IP=192.168.178.150&PORT=2&STATUS=ON&FROM=DownstairsLight&LIGHT=TV%20room">
                <i style="font-size: 80px; " class="fas fa-tv"></i>
                <h3>Tv room</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight/?IP=192.168.178.150&PORT=3&STATUS=ON&FROM=DownstairsLight&LIGHT=Living%20Room">
                <i style="font-size: 80px; " class="fas fa-couch"></i>
                <h3>Living room</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight/?IP=192.168.178.150&PORT=4&STATUS=ON&FROM=DownstairsLight&LIGHT=Kitchen">
                <i style="font-size: 80px; " class="fas fa-utensil-spoon"></i>
                <h3>Kitchen</h3>
            </a>
        </div>
    </div>

    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight/?IP=192.168.178.151&PORT=1&STATUS=ON&FROM=DownstairsLight&LIGHT=Dinner%20room">
                <i style="font-size: 80px; " class="fas fa-utensils"></i>
                <h3>Dinner room</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight/?IP=192.168.178.151&PORT=2&STATUS=ON&FROM=DownstairsLight&LIGHT=Toilet">
                <i style="font-size: 80px; " class="fas fa-toilet"></i>
                <h3>Toilet</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight/?IP=192.168.178.151&PORT=3&STATUS=ON&FROM=DownstairsLight&LIGHT=Terrace">
                <i style="font-size: 80px; " class="fas fa-umbrella-beach"></i>
                <h3>Terrace</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <!--
            <a href="../SwitchLight/?IP=192.168.178.151&PORT=4&STATUS=ON&FROM=DownstairsLight&LIGHT=Garden">
                <i style="font-size: 80px; " class="fas fa-tree"></i>
                <h3>Garden</h3>
            </a>
            -->
            <a href="../SwitchLight/?IP=192.168.178.155&PORT=1&STATUS=TOGGLE&FROM=DownstairsLight&LIGHT=Standing%20light">
                <i style="font-size: 80px; " class="fas fa-grip-lines-vertical"></i>
                <h3>Standing light</h3>
            </a>
        </div>
    </div>
</div>

</body>
</html>