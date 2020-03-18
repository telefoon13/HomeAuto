<?php
if ($_GET['camid'] == null || empty($_GET['camid'])){
?>
    <div class="row" id="R2">
        <div class="col-sm-6 col-12 align-self-center text-center" id="R2C1">
            <a href="index.php?page=camera&camid=4">
                <img width="320px" height="180px" src="
            http://192.168.178.204/zm/cgi-bin/nph-zms?mode=jpeg&monitor=4&scale=100&maxfps=30&buffer=1000&user=viewer&pass=viewer
            " ></a>
        </div>
        <div class="col-sm-6 col-12 align-self-center text-center" id="R2C2">
            <a href="index.php?page=camera&camid=1">
                <img width="320px" height="180px" src="
            http://192.168.178.204/zm/cgi-bin/nph-zms?mode=jpeg&monitor=1&scale=100&maxfps=30&buffer=1000&user=viewer&pass=viewer
            " >
            </a>
        </div>
    </div>

    <div class="row" id="R2">
        <div class="col-sm-6 col-12 align-self-center text-center" id="R3C1" >
            <a href="index.php?page=camera&camid=3">
                <img width="320px" height="180px" src="
            http://192.168.178.204/zm/cgi-bin/nph-zms?mode=jpeg&monitor=3&scale=100&maxfps=30&buffer=1000&user=viewer&pass=viewer
            " ></a>
        </div>
        <div class="col-sm-6 col-12 align-self-center text-center" id="R3C2" style="padding-left: 5px;">
           <a href="index.php?page=camera&camid=2">
                <img width="320px" height="180px" src="
            http://192.168.178.204/zm/cgi-bin/nph-zms?mode=jpeg&monitor=2&scale=100&maxfps=30&buffer=1000&user=viewer&pass=viewer
            " >
            </a>
        </div>
    </div>
<?php
} else {
?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1" style="padding-top: 11px; padding-left: 0">
            <a href="index.php?page=camera">
                <img width="1024px" height="578px" src="
            http://192.168.178.204/zm/cgi-bin/nph-zms?mode=jpeg&monitor=<?= $_GET['camid']; ?>&scale=100&maxfps=30&buffer=1000&user=viewer&pass=viewer
            " ></a>

        </div>
    </div>
<?php
}