<script src="js/toggleCamLight.js"></script>
<?php
include_once("php/MainHelper.php");

if (!empty($_GET['type'])){
    $type = $_GET['type'];
    if($type == "gas"){
        $camIP = "192.168.178.105";
        $lightIP = "192.168.178.168";
    }elseif ($type == "elekNight" || $type == "elekDay"){
        $camIP = "";
        $lightIP = "";
    }elseif($type == "water"){
        $camIP = "";
        $lightIP = "";
    } else {
        header('Location: index.php');
    }
    ?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1">
            <img src="https://root:ismart12@<?= $camIP; ?>/cgi-bin/currentpic.cgi" alt="live" id="liveImage" class="w-75""><br/>
            <a href="192.168.178.168" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="toggleLight">Schakel licht</a>
        </div>
    </div>
<?php
} else {
    header('Location: index.php');
}