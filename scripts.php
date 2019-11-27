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
        <div class="row" style="min-height: 40px; border-bottom: 1px #02529F solid;" id="R2">
            <div class="col-6 align-self-center text-center" id="R2C3">
                <a href="index.php?page=editScript&id=<?= $script->id; ?>">
                    <h5 style="margin-bottom: 0"><?= $script->name . "." . $script->type; ?></h5>
                </a>
            </div>
            <div class="col-1 align-self-center text-center" style="border-right: 1px #02529F solid" id="R2C4">
                <h5 style="margin-bottom: 0">
					<?= $script->minute; ?>
                </h5>
            </div>
            <div class="col-1 align-self-center text-center" style="border-right: 1px #02529F solid" id="R2C5">
                <h5 style="margin-bottom: 0">
					<?= $script->hour; ?>
                </h5>
            </div>
            <div class="col-1 align-self-center text-center" style="border-right: 1px #02529F solid" id="R2C6">
                <h5 style="margin-bottom: 0">
					<?= $script->dayOfMonth; ?>
                </h5>
            </div>
            <div class="col-1 align-self-center text-center" style="border-right: 1px #02529F solid" id="R2C7">
                <h5 style="margin-bottom: 0">
					<?= $script->month; ?>
                </h5>
            </div>
            <div class="col-1 align-self-center text-center"  id="R2C8">
                <h5 style="margin-bottom: 0">
					<?= $script->dayOfWeek; ?>
                </h5>
            </div>
            <div class="col-1 align-self-center text-center" id="R2C9">
                <a href="index.php?page=editScript&delete=<?= $script->id; ?>"><img src="img/delete.svg" alt="delete" class="w-50"></a>
            </div>
        </div>
		<?php
	}
}
?>
<div class="row" style="min-height: 40px;" id="R3">
    <div class="col-12 align-self-center text-right" id="R3C1">
        <a href="index.php?page=editScript&new=new">
            <h5 style="margin-bottom: 0">Nieuw script</h5>
        </a>
    </div>
</div>
