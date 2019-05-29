<?php
include_once ("php/MainHelper.php");
$return = switchSonOffLight($_GET['ip'], $_GET['port']);
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