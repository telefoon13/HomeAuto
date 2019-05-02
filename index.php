<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Home Automation By Mike</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/timeanddate.js"></script>
<body>

<div class="container-fluid">
    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="SoS">
                <i style="font-size: 80px; " class="fas fa-exclamation-triangle"></i>
                <h3>SOS</h3>
            </a>
        </div>
        <div class="col-6 align-self-center text-center">
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="#">
                <i style="font-size: 80px; " class="fas fa-door-open"></i>
                <h3>Leave home</h3>
            </a>
           </div>
    </div>

    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="DownstairsLight">
                <i style="font-size: 80px; " class="fas fa-lightbulb"></i>
                <h3>Downstairs</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="UpstairsLight">
                <i style="font-size: 80px; " class="fas fa-lightbulb"></i>
                <h3>Upstairs</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="#">
                <!--<i style="font-size: 80px; " class="fas fa-lightbulb"></i>
                <h3>2th floor</h3>-->
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="PowerUsages">
                <i style="font-size: 80px; " class="fas fa-chart-area"></i>
                <h3>Power usages</h3>
            </a>
        </div>
    </div>

    <div class="row" style="height: 200px">
        <div class="col-3 align-self-center text-center">
            <a href="#">
                <i style="font-size: 80px; " class="fas fa-temperature-high"></i>
                <h3>Heating</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="Camera">
                <i style="font-size: 80px; " class="fas fa-video"></i>
                <h3>Cameras</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="#">
                <i style="font-size: 80px; " class="fas fa-tree"></i>
                <h3>Garden</h3>
            </a>
        </div>
        <div class="col-3 align-self-center text-center">
            <a href="#">
                <i style="font-size: 80px; " class="fas fa-arrow-right"></i>
                <h3>Next page</h3>
            </a>
        </div>
    </div>
</div>

</body>
</html>