<?php
include_once("php/vaillant.php");
?>
<div class="row" id="R2">
	<div class="col-6 align-self-center text-center" id="R2C1">Serial number : </div>
	<div class="col-6 align-self-center text-center" id="R2C1"><?= getMainSystemInfo()["serialNumber"]; ?></div>
</div>