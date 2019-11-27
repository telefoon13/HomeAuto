<?php
include_once("php/database/ScriptsDB.php");
include_once('php/Crontab.php');

if (checkFilled($_GET['id'])) {
	?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1"><h2>EDIT</h2></div>
    </div>
	<?php
} elseif (checkFilled($_GET['delete'])) {
	if ($_GET['sure'] == "yes") {
		$script = ScriptsDB::getById($_GET['delete']);
		//Verwijder file
		unlink("automationScripts/" . $script->name . "." . $script->type);
		//Verwijder uit DB
		ScriptsDB::delete($script->id);
		//Verwijder uit crontab
		$program = "";
		if ($script->type == "php") {
			$program = "php";
		} elseif ($script->type == "py") {
			$program = "python";
		} elseif ($script->type == "sh") {
			$program = "bash";
		}
		$cronTab = $script->minute . " " . $script->hour . " " . $script->dayOfMonth . " " . $script->month . " " . $script->dayOfWeek . " " . $program . " /var/www/html/automationScripts/" . $script->name . "." . $script->type;
		Crontab::removeJob($cronTab);
		//Ga naar index
		header("Location: index.php");
	} else {
		?>
        <div class="row" id="R2">
            <div class="col-12 align-self-center text-center" id="R2C1">
                <h3>Bent u zeker dat u dit automatisatie script wilt verwijderen ?</h3>
                <br><br><br>
                <a href="index.php?page=editScript&delete=<?= $_GET['delete']; ?>&sure=yes"
                   class="btn btn-danger btn-lg danger" role="button" aria-pressed="true">Ja !</a>
            </div>
        </div>
		<?php
	}
} elseif
(checkFilled($_GET['new'])) {
	if ($_GET['new'] == "new") {
		?>
        <form method="get" action="index.php">
            <input type="hidden" name="page" value="editScript"/>
            <input type="hidden" name="new" value="add"/>
            <div class="row" id="R2">
                <div class="col-6 align-self-center text-left" style="min-height: 40px" id="R2C1">
                    <label><h5>Name :</h5> <input type="text" class="form-control" name="name" size="60"></label>
                </div>
                <div class="col-6 align-self-center text-left" style="min-height: 40px" id="R2C1">
                    <label><h5>Crontab :</h5>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="minute" class="form-control" size="3">
                            </div>
                            <div class="col">
                                <input type="text" name="hour" class="form-control" size="3">
                            </div>
                            <div class="col">
                                <input type="text" name="dayOfMonth" class="form-control" size="3">
                            </div>
                            <div class="col">
                                <input type="text" name="month" class="form-control" size="3">
                            </div>
                            <div class="col">
                                <input type="text" name="dayOfWeek" class="form-control" size="3">
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-9 align-self-center text-left" id="R2C2">
                    <label><h5>Script :</h5><textarea name="script" rows="10" cols="93" class="form-control"></textarea></label>
                </div>
                <div class="col-3 align-self-center text-left" style="min-height: 40px" id="R2C3">
                    <h5>Type :</h5>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="type" value="php" checked> PHP
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="type" value="sh"> BASH
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="type" value="py"> Python
                        </label>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </div>
            </div>
        </form>
		<?php
	} elseif ($_GET['new'] == "add") {
		if (checkFilled($_GET['script']) && checkFilled($_GET['name']) && checkFilled($_GET['minute']) && checkFilled($_GET['hour']) && checkFilled($_GET['dayOfMonth']) && checkFilled($_GET['month']) && checkFilled($_GET['dayOfWeek'])) {
			$content = $_GET['script'];
			$file = "automationScripts/" . $_GET['name'] . ".". $_GET['type'];
			$regexMinute = "/^((\*\/)?[1-5]?[0-9])$|^(\*)$/";
			$regexHour = "/^((\*\/)?(2[0-3]|1[0-9]|[0-9]))$|^(\*)$/";
			$regexDayOfMonth = "/^((\*\/)?(3[01]|[12][0-9]|[1-9]))$|^(\*)$/";
			$regexMonth = "/^((\*\/)?(1[0-2]|[1-9]))$|^(\*)$/";
			$regexDayOfWeek = "/^((\*\/)?([0-6]))$|^(\*)$/";
			if (preg_match($regexMinute, $_GET['minute']) && preg_match($regexHour, $_GET['hour']) && preg_match($regexDayOfMonth, $_GET['dayOfMonth']) && preg_match($regexMonth, $_GET['month']) && preg_match($regexDayOfWeek, $_GET['dayOfWeek'])) {
				if (!file_exists($file)) {
					$script = new Script(0, $_GET['type'], $_GET['name'], $_GET['minute'], $_GET['hour'], $_GET['dayOfMonth'], $_GET['month'], $_GET['dayOfWeek']);
					if ($script) {
						$addScript = ScriptsDB::create($script);
						if ($addScript) {
							$fp = fopen($file, "w+");
							fwrite($fp, $content);
							fclose($fp);
							$program = "";
							if ($_GET['type'] == "php") {
								$program = "php";
							} elseif ($_GET['type'] == "py") {
								$program = "python";
							} elseif ($_GET['type'] == "sh") {
								$program = "bash";
							}
							$cronTab = $_GET['minute'] . " " . $_GET['hour'] . " " . $_GET['dayOfMonth'] . " " . $_GET['month'] . " " . $_GET['dayOfWeek'] . " " . $program . " /var/www/html/automationScripts/" . $_GET['name'] . "." . $_GET['type'];
							Crontab::addJob($cronTab);
							//shell_exec("chmod 777 /var/www/html/automationScripts/" . $_GET['name'] . "." . $_GET['type']);
							$message = "Script werd aangemaakt en in crontab geplaatst.";
							echo "<script>window.setTimeout(function(){window.location.href = \"index.php\"}, 1000);</script>";
						} else {
							$message = "Er ging iets mis bij de database.";
						}
					} else {
						$message = "Er ging iets mis bij class aanmaken.";
					}
				} else {
					$message = "Bestand bestaat al.";
				}
			} else {
				$message = "Crontab mag enkel uit de correcte Cron Regex bestaan (* of */00 of 00).";
			}
		} else {
			$message = "Er werd iets niet ingevuld.";
		}
		?>
        <div class="row" id="R2">
            <div class="col-12 align-self-center text-center" id="R2C1"><h4><?= $message; ?></h4></div>
        </div>
		<?php
	}
} else {
	?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1"><h4>Er is iets mis gegaan.</h4></div>
    </div>
	<?php
}
?>