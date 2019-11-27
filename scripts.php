<?php
include_once "php/database/ScriptsDB.php";
$results = ScriptsDB::getAll();
if (empty($results)) {
	?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1"><h2>Er werden nog geen scripts aangemaakt</h2></div>
    </div>
	<?php
} else {
foreach ($results as $script) {
	?>
    <div class="row" style="min-height: 40px; border-bottom: 1px #000000 solid;" id="R2">
        <div class="col-1 align-self-center text-center" id="R2C1">
            <a href="index.php?page=editScript&stop=<?= $script->id; ?>"><img src="img/stop.svg" alt="stop" class="w-25"></a>
            &emsp;
            <a href="index.php?page=editScript&play=<?= $script->id; ?>"><img src="img/play-button.svg" alt="play" class="w-25"></a>
        </div>
        <div class="col-6 align-self-center text-left" id="R2C3">
            <a href="index.php?page=editScript&id=<?= $script->id; ?>">
                <h5 style="margin-bottom: 0"><?= $script->name; ?></h5>
            </a>
        </div>
        <div class="col-4 align-self-center text-center" id="R2C4">
            <h5 style="margin-bottom: 0">
                <?= $script->minute; ?>
                &emsp;
                <?= $script->hour; ?>
                &emsp;
                <?= $script->dayOfMonth; ?>
                &emsp;
                <?= $script->month; ?>
                &emsp;
                <?= $script->dayOfWeek; ?>
            </h5>
        </div>
        <div class="col-1 align-self-center text-center" id="R2C9">
            <a href="index.php?page=editScript&delete=ID"><img src="img/delete.svg" alt="delete" class="w-25"></a>
        </div>
    </div>
	<?php
}
}
?>
<div class="row"  style="min-height: 40px;" id="R3">
    <div class="col-12 align-self-center text-right" id="R3C1">
        <a href="index.php?page=editScript&new=new">
            <h5 style="margin-bottom: 0">Nieuw script</h5>
        </a>
    </div>
</div>
