<?php
if ($_GET['camid'] == null || empty($_GET['camid'])){
?>
    <div class="row" id="R2">
        <div class="col-6 align-self-center text-center" id="R2C1" style="padding-left: 5px;">
            <a href="camera.php?camid=1">
                <img width="500px" height="283px" src="
            http://192.168.178.204/cgi-bin/nph-zms?mode=jpeg&monitor=1&scale=100&maxfps=30&buffer=1000&user=viewer&pass=viewer
            " ></a>
        </div>
        <div class="col-6 align-self-center text-center" id="R2C1" style="padding-left: 5px;">
            <a href=camera.php?camid=2">
                <img width="500px" height="283px" src="
            http://192.168.178.204/cgi-bin/nph-zms?mode=jpeg&monitor=2&scale=100&maxfps=30&buffer=1000&user=viewer2&pass=viewer2
            " >
            </a>
        </div>
    </div>
<?php
} else {
?>
    <div class="row" id="R2">
        <div class="col-6 align-self-center text-center" id="R2C1">
            <a href="index.php?page=camera">
                <img width="1000px" height="565px" src="
            http://192.168.178.204/cgi-bin/nph-zms?mode=jpeg&monitor=<?= $_GET['camid']; ?>&scale=100&maxfps=30&buffer=1000&user=viewer&pass=viewer
            " ></a>
        </div>
<?php
}