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
           <!-- <a href="#">
                <i style="font-size: 80px; " class="fas fa-door-open"></i>
                <h3>Leave home</h3>
            </a>-->
        </div>
    </div>

        <div class="row" style="height: 20px">
            <div class="col-12">&emsp;</div>
        </div>

    <div class="row">
        <div class="col-6 align-self-center text-center" style="padding-left: 5px;">
            <a href="1">
            <img width="500px" height="283px" src="
            http://192.168.178.204/cgi-bin/nph-zms?mode=jpeg&monitor=1&scale=100&maxfps=30&buffer=1000&user=viewer&pass=viewer
            " ></a>
        </div>
        <div class="col-6 align-self-center text-center" style="padding-left: 5px; padding-right: 5px;">
            <a href="2">
            <img width="500px" height="283px" src="
            http://192.168.178.204/cgi-bin/nph-zms?mode=jpeg&monitor=2&scale=100&maxfps=30&buffer=1000&user=viewer2&pass=viewer2
            " >
            </a>
        </div>
    </div>
</div>
</body>
</html>