<?php
include_once ("php/database/ScriptsDB.php");

if (checkFilled($_GET['play'])) {
	?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1"><h2>PLAY</h2></div>
    </div>
	<?php
} elseif (checkFilled($_GET['stop'])) {
	?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1"><h2>STOP</h2></div>
    </div>
	<?php
} elseif (checkFilled($_GET['id'])) {
	?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1"><h2>EDIT</h2></div>
    </div>
	<?php
} elseif (checkFilled($_GET['delete'])) {
	?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1"><h2>DELETE</h2></div>
    </div>
	<?php
} elseif (checkFilled($_GET['new'])) {
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
                    <label><h5>Time :</h5>
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
                    <h5>Status :</h5>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="state" id="on" value="1"> ON
                        </label>
                        <label class="btn btn-primary active">
                            <input type="radio" name="state" id="off" value="0" checked> OFF
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
			$file = "automationScripts/" . $_GET['name'] . ".php";
			$regexMinute = "";
			$regexHour = "";
			$regexDayOfMonth = "";
			$regexMonth = "";
			$regexDayOfWeek = "";
			if (!file_exists($file)) {
				$script = new Script(0, $_GET['state'], $file, $_GET['minute'], $_GET['hour'], $_GET['dayOfMonth'], $_GET['month'], $_GET['dayOfWeek']);
				if ($script) {
					$addScript = ScriptsDB::create($script);
					if ($addScript) {
						$fp = fopen($file, "w");
						fwrite($fp, $content);
						fclose($fp);
						$message = "Script werd aangemaakt.";
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
			$message = "Er werd iets niet ingevuld.";
		}
		?>
        <div class="row" id="R2">
            <div class="col-12 align-self-center text-center" id="R2C1"><h2><?= $message; ?></h2></div>
        </div>
		<?php
	}
} else {
	?>
    <div class="row" id="R2">
        <div class="col-12 align-self-center text-center" id="R2C1"><h2>Er is iets mis gegaan.</h2></div>
    </div>
	<?php
}
?>