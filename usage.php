<?php
include_once("php/MainHelper.php");
include_once("php/database/MeterDB.php");

$gasToday = round(MeterDB::GetUsedThisXXByType("gas", "day"),2);
$serverToday = round(getPOW("192.168.178.156")["Today"],2);
?>
<div class="row" id="R2">
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C1">
		<a href="index.php?page=usageDetail&id=elekday">
			<img src="img/elek.svg" alt="elek" class="w-75">
		</a>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C2">
		<p>Dag</>
		<h4>xx.xx kWh</h4>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C3">
        <a href="index.php?page=usageDetail&id=eleknight">
            <img src="img/elek.svg" alt="elek" class="w-75">
        </a>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C4">
        <p>Nacht</p>
        <h4>xx.xx kWh</h4>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C5">
        <a href="index.php?page=usageDetail&id=gas">
            <img src="img/gas.svg" alt="gas" class="w-75">
        </a>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C6">
        <p>Gas</p>
        <h4> <?= $gasToday; ?> M&sup3;</h4>
	</div>
</div>
<div class="row" id="R3">
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C1">
        <a href="index.php?page=usageDetail&id=water">
            <img src="img/water.svg" alt="water" class="w-75">
        </a>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C2">
        <p>Water</p>
        <h4>xx.xx M&sup3;</h4>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C3">
        <a href="index.php?page=usageDetail&id=server">
            <img src="img/server.svg" alt="server" class="w-75">
        </a>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C4">
        <p>Server</p>
        <h4> <?= $serverToday; ?> kWh</h4>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C5">
		&emsp;
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C6">
		&emsp;
	</div>
</div>