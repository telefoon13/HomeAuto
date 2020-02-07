<?php
include_once("php/MainHelper.php");
include_once("php/database/MeterDB.php");

if ($_GET['id'] == "server") {
    ?>
    <div class="row" id="R2">
        <div class="col-sm-4 col-12 align-self-center text-center" id="R2C1">
            <img src="img/server.svg" alt="server" class="w-50">
        </div>
        <div class="col-sm-4 col-6 align-self-center text-center" id="R2C1">
            <h4>Voltage</h4>
            <h4>Stroom</h4>
            <h4>Wattage</h4>
            <h4>Factor</h4>
            <h4>Verbruik vandaag</h4>
            <h4>Verbruik gisteren</h4>
            <h4>Verbruik totaal</h4>
        </div>
        <div class="col-sm-4 col-6 align-self-center text-center" id="R2C1">
            <h4><?= getPOW("192.168.178.156")["Voltage"]; ?> V</h4>
            <h4><?= getPOW("192.168.178.156")["Current"]; ?> A</h4>
            <h4><?= getPOW("192.168.178.156")["Power"]; ?> W</h4>
            <h4><?= getPOW("192.168.178.156")["Factor"]; ?></h4>
            <h4><?= getPOW("192.168.178.156")["Today"]; ?> kWh</h4>
            <h4><?= getPOW("192.168.178.156")["Yesterday"]; ?> kWh</h4>
            <h4><?= getPOW("192.168.178.156")["Total"]; ?> kWh</h4>
        </div>
    </div>
    <?php
} elseif ($_GET['id'] == "gas") {
    ?>
    <div class="row" id="R2">
        <div class="col-sm-6 col-12 align-self-center text-center" id="R2C1">
            <h1>Gas</h1>
            <?php

            $to = new DateTime('now');
            $from1 = new DateTime('now');
            $from = $from1->modify('-6 hour');

            //echo $to->format('Y-m-d H:i:s') . "<br>" . $from->format('Y-m-d');
            $last24hours = MeterDB::getAllBetweenByType("gas" ,$from->format('Y-m-d H:i:s'), $to->format('Y-m-d H:i:s'));
            //var_dump($last24hours);
            foreach ($last24hours as $entry){
                echo $entry->value . "<br>";
            }
            ?>
        </div>
        <div class="col-sm-3 col-6 align-self-center text-right" id="R2C2">
            <br>
            <h6>Laatste meterstand :</h6>
            <h6>Verbruik laatste 24 uur :</h6>
            <h6>Verbruik laatste week :</h6>
            <h6>Verbruik laatste maand :</h6>
            <h6>Verbruik laatste jaar :</h6>
            <br><br>
            <a href="?page=usageLive&type=gas" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Live beeld</a>
        </div>
        <div class="col-sm-3 col-6 align-self-center text-left" id="R2C3">
            <br>
            <h6>6315.54 M³</h6>
            <h6>3.01 M³ / € 1.28</h6>
            <h6>3.01 M³ / € 1.28</h6>
            <h6>3.01 M³ / € 1.28</h6>
            <h6>3.01 M³ / € 1.28</h6>
            <br><br>
            <a href="?page=usageNow&type=gas" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Meet nu</a>
        </div>
    </div>
    <?php
}
?>
