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
    $lastValue = round(MeterDB::getHighestBytype("gas")->value,2);
    $now = new DateTime('now');
    $nowMinus24h = new DateTime('-1day');
    $nowMinus7d = new DateTime('-7day');
    $nowMinus1m = new DateTime('-1month');
    $nowMinus1y = new DateTime('-1year');
    $gasToday = round(MeterDB::GetUsedBetweenByType("gas", $nowMinus24h->format('Y-m-d H:i:s'), $now->format('Y-m-d H:i:s')),2);
    $gasTodayPrice = round($gasToday*MeterDB::$gasPrice,2);
    $gasThisWeek = round(MeterDB::GetUsedBetweenByType("gas", $nowMinus7d->format('Y-m-d H:i:s'), $now->format('Y-m-d H:i:s')),2);
    $gasThisWeekPrice = round($gasThisWeek*MeterDB::$gasPrice,2);
    $gasThisMonth = round(MeterDB::GetUsedBetweenByType("gas", $nowMinus1m->format('Y-m-d H:i:s'), $now->format('Y-m-d H:i:s')),2);
    $gasThisMonthPrice = round($gasThisMonth*MeterDB::$gasPrice,2);
    $gasThisYear = round(MeterDB::GetUsedBetweenByType("gas", $nowMinus1y->format('Y-m-d H:i:s'), $now->format('Y-m-d H:i:s')),2);
    $gasThisYearPrice = round($gasThisYear*MeterDB::$gasPrice,2);
    ?>
    <div class="row" id="R2">
        <div class="col-sm-6 col-12 align-self-center text-center" id="R2C1">
            <h1>Gas</h1>
            <?php
            $last24hours = MeterDB::getAllBetweenByType("gas" ,$nowMinus24h->format('Y-m-d H:i:s'), $now->format('Y-m-d H:i:s'));
            foreach ($last24hours as $entry){
                echo $entry->value ." / ".$entry->dateti."<br>";
            }
            ?>
        </div>
        <div class="col-sm-3 col-6 align-self-center text-right" id="R2C2">
            <br>
            <h3>Huidige stand :</h3>
            <br>
            <h5>Verbruik 1 dag :</h5>
            <h5>Verbruik 7 dagen :</h5>
            <h5>Verbruik 1 maand :</h5>
            <h5>Verbruik 1 jaar :</h5>
            <br><br>
            <a href="?page=usageLive&type=gas" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Live beeld</a>
        </div>
        <div class="col-sm-3 col-6 align-self-center text-left" id="R2C3">
            <br>
            <h3><?= $lastValue; ?> M³</h3>
            <br>
            <h5><?= $gasToday; ?> M³ / € <?= $gasTodayPrice; ?></h5>
            <h5><?= $gasThisWeek; ?> M³ / € <?= $gasThisWeekPrice; ?></h5>
            <h5><?= $gasThisMonth; ?> M³ / € <?= $gasThisMonthPrice; ?></h5>
            <h5><?= $gasThisYear; ?> M³ / € <?= $gasThisYearPrice; ?></h5>
            <br><br>
            <a href="?page=usageNow&type=gas" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Meet nu</a>
        </div>
    </div>
    <?php
}
?>
