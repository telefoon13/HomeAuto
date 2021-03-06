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
            <a href="../SwitchLight?IP=192.168.178.152&PORT=1&STATUS=ON&FROM=UpstairsLight&LIGHT=Julie%20room">
                <i style="font-size: 80px; " class="fas fa-bed"></i>
                <h3>Julie room</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight?IP=192.168.178.152&PORT=2&STATUS=ON&FROM=UpstairsLight&LIGHT=Guest%20room">
                <i style="font-size: 80px; " class="fas fa-suitcase"></i>
                <h3>Guest room</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight?IP=192.168.178.152&PORT=3&STATUS=ON&FROM=UpstairsLight&LIGHT=Stair%20way">
                <i style="font-size: 80px; " class="fas fa-sort-amount-up"></i>
                <h3>Stair way</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight?IP=192.168.178.152&PORT=4&STATUS=ON&FROM=UpstairsLight&LIGHT=Bathroom">
                <i style="font-size: 80px; " class="fas fa-bath"></i>
                <h3>Bathroom</h3>
            </a>
        </div>
    </div>

    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight?IP=192.168.178.153&PORT=1&STATUS=ON&FROM=UpstairsLight&LIGHT=Mirror%20bathroom">
                <i style="font-size: 80px; " class="fas fa-tooth"></i>
                <h3>Mirror bathroom</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight?IP=192.168.178.153&PORT=2&STATUS=ON&FROM=UpstairsLight&LIGHT=Desk">
                <i style="font-size: 80px; " class="fas fa-keyboard"></i>
                <h3>Desk</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight?IP=192.168.178.153&PORT=3&STATUS=ON&FROM=UpstairsLight&LIGHT=Master%20bedroom">
                <i style="font-size: 80px; " class="fas fa-bed"></i>
                <h3>Master bedroom</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="../SwitchLight?IP=192.168.178.153&PORT=4&STATUS=ON&FROM=UpstairsLight&LIGHT=Dressing">
                <i style="font-size: 80px; " class="fas fa-tshirt"></i>
                <h3>Dressing</h3>
            </a>
        </div>
    </div>
</div>

</body>
</html>