<?php
include_once ("php/hue.php");
$spot1 = getLightInfo(1);
$spot2 = getLightInfo(2);
$spot3 = getLightInfo(3);
$spot4 = getLightInfo(4);
$spot5 = getLightInfo(5);
$spot6 = getLightInfo(6);
?>
<div class="row" id="R2">
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C1">
        <a href="index.php?page=switchlight&ip=192.168.178.150&port=1">
            <img src="img/downStairs/spotlight.svg" alt="spotlight" class="w-75" style="transform: rotate(90deg) scaleX(-1);">
            <h5><?= $spot1['name']; ?></h5>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C2">
        <a href="index.php?page=switchlight&ip=192.168.178.150&port=2">
            <img src="img/downStairs/spotlight.svg" alt="spotlight" class="w-75">
            <h5><?= $spot2['name']; ?></h5>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C3">
        <a href="index.php?page=switchlight&ip=192.168.178.155&port=1">
            <img src="img/downStairs/spotlight.svg" alt="spotlight" class="w-75">
            <h5><?= $spot3['name']; ?></h5>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C4">
        <a href="index.php?page=switchlight&ip=192.168.178.150&port=3">
            <img src="img/downStairs/spotlight.svg" alt="spotlight" class="w-75">
            <h5><?= $spot4['name']; ?></h5>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C5">
        <a href="index.php?page=switchlight&ip=192.168.178.150&port=4">
            <img src="img/downStairs/spotlight.svg" alt="spotlight" class="w-75">
            <h5><?= $spot5['name']; ?></h5>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C6">
        <a href="index.php?page=switchlight&ip=192.168.178.151&port=1">
            <img src="img/downStairs/spotlight.svg" alt="spotlight" class="w-75">
            <h5><?= $spot6['name']; ?></h5>
        </a>
    </div>
</div>
<div class="row" id="R3">
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C1">
        &emsp;
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C2">
        &emsp;
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C3">
        &emsp;
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C4">
        &emsp;
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C5">
        &emsp;
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C6">
        &emsp;
    </div>
</div>
