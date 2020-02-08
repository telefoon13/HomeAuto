<?php
include_once("php/MainHelper.php");
if (!empty($_GET['type'])){
    if ($_GET['type'] == "gas"){
        $out = shell_exec('/usr/bin/python3 /var/www/html/Meters/takePictureGas.py');
    }
    header( "refresh:15;url=index.php?page=usageDetail&id=".$_GET['type'] );
} else {
    header( "url=index.php" );
}
?>
<div class="row" id="R2">
    <div class="col-12 align-self-center text-center" id="R2C1">
        <h3>Uw meeting word nu uitgevoerd.</h3>
        <h3>Gelieven 15seconden te wachten</h3>
    </div>
</div>
