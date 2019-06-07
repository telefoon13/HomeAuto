<?php
include_once("php/MainHelper.php");
include_once("php/hue.php");
$return = switchSonOffLight($_GET['ip'], $_GET['port'], "");
//Alles uit dan ook staande lamp & Hue spots
if ($_GET['ip'] == "192.168.178.154" && $_GET['port'] == "2"){
    $return2 = switchSonOffLight("192.168.178.155", "1", "off");
    $return3 = updateGroup(1,false);
    if ($return == "200" && $return2 == "200" && $return3 == "200"){
        $return = "200";
    } else {
        $return = "500";
    }
}
//Alles aan dan ook staande lamp & Hue spots
if ($_GET['ip'] == "192.168.178.154" && $_GET['port'] == "1"){
	$return2 = switchSonOffLight("192.168.178.155", "1", "on");
	$return3 = updateGroup(1,true);
	if ($return == "200" && $return2 == "200" && $return3 == "200"){
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