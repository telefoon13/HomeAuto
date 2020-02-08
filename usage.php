<?php
include_once("php/MainHelper.php");
include_once("php/database/MeterDB.php");

$now = new DateTime('now');
$nowMinus24h = new DateTime('-1day');

$gasToday = round(MeterDB::GetUsedBetweenByType("gas", $nowMinus24h->format('Y-m-d H:i:s'), $now->format('Y-m-d H:i:s')), 2);
$gasTodayPrice = round($gasToday * MeterDB::$gasPrice, 2);
$serverToday = round(getPOW("192.168.178.156")["Today"], 2);
$serverTodayPrice = round($serverToday * 0.2, 2);
?>
<div class="row" id="R2">
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C1">
        <a href="index.php?page=usageDetail&id=elekday">
            <img src="img/elek.svg" alt="elek" class="w-75">
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C2">
        <p>Dag</p>
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
        <a href="index.php?page=usageDetail&id=gas">
            <h3>Gas</h3>
            <h4> <?= $gasToday; ?> M&sup3;</h4>
            <h6>&euro; <?= $gasTodayPrice; ?></h6>
        </a>
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
        <a href="index.php?page=usageDetail&id=server">
        <h3>Server</h3>
        <h4><?= $serverToday; ?> kWh</h4>
        <h6>&euro; <?= $serverTodayPrice; ?></h6>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C5">
        &emsp;
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C6">
        &emsp;
    </div>
</div>