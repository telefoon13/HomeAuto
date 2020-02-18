
<div class="row" id="R2">
    <div class="col-12 align-self-center text-center" id="R2C1">
        <h3>Uw meeting word nu uitgevoerd.</h3>
        <h3>Gelieven 15seconden te wachten</h3>
    </div>
</div>
<?php
include_once("php/MainHelper.php");
if (!empty($_GET['type'])){
    if ($_GET['type'] == "gas"){
        //ob_flush();
        //flush();
        $out = shell_exec('python3 /var/www/html/Meters/takePictureGas.py');
        //$out = shell_exec('bash /var/www/html/Meters/test.sh');
        echo $out;
    }
    header( "refresh:15;url=index.php?page=usageDetail&id=".$_GET['type'] );
} else {
    header( "url=index.php" );
}
?>