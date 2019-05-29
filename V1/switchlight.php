<?php
include_once ("php/MainHelper.php");
$return = switchSonOffLight($_GET['ip'], $_GET['port']);
//Alles uit dan ook staande lamp
if ($_GET['ip'] == "192.168.178.154" && $_GET['port'] == "2"){
    $return2 = switchSonOffLight("192.168.178.155", "1");
    if ($return == "200" && $return2 == "200"){
        $return = "200";
    } else {
        $return = "500";
    }
}
if ($return == "200"){
    $message = "Licht is geschakeld";
} else {
    $message = "Er ging iets mis";
}
?>
<div class="row" id="R2">
    <div class="col-12 align-self-center text-center" id="R2C1"><h1><?= $message; ?></h1></div>
    <script>
        window.setTimeout(function(){window.location.href = "index.php"}, 1000);
    </script>
</div>