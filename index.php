<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Home Auto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/timeanddate.js"></script>
    <script src="js/weather.js"></script>
</head>
<body>
<?php
    include_once("php/MainHelper.php");
    //Check if there is a page request
    if (!checkFilled($_GET['page'])) {
        $page = 'home';
        //Check if there are only accepted characters in the request
    } elseif (checkIndexUrl($_GET['page'])) {
        $page = 'home';
        //Check if there is a file named like the request
    } elseif (!file_exists($_GET['page'] . ".php")) {
        $page = 'home';
    } else {
        $page = $_GET['page'];
    }
    ?>

<div class="container-fluid">
    <?php
    //Dont show menu whem large view camera
    if (empty($_GET['camid']) && $page != "3dprinter") {
		?>
        <div class="row" id="R1">
            <div class="col-sm-2 col-6 align-self-center text-center" id="R1C1">
				<?php
				if ($page == "home") {
					echo '<a href="index.php?page=sos"><img src="img/sos.svg" alt="SOS" class="w-50">
                        <!--<h5>SOS</h5>-->
                      </a>';
				} else {
					echo '<a href="index.php"><img src="img/back.svg" alt="Back" class="w-75">
                        <!--<h5>Home</h5>-->
                      </a>';
				}
				?>
            </div>
            <div class="d-none d-sm-block col-sm-4 align-self-center text-center" id="R1C2">
                <span id="date_time"></span>
                <script type="text/javascript">window.onload = date_time('date_time');</script>
            </div>
            <div class="d-none d-sm-block col-sm-2 align-self-center text-right" id="R1C3">
                TEMP loading
            </div>
            <div class="d-none d-sm-block col-sm-2 align-self-center text-left" id="R1C4">
                <img alt="Question" src="img/weather/question.svg" class="w-50">
            </div>
            <div class="col-sm-2 col-6 align-self-center text-center" id="R1C5">
                <a href="index.php?page=exit"><img src="img/exit.svg" alt="Exit" class="w-50">
                    <!--<h5>Exit</h5>-->
                </a>
            </div>
        </div>
		<?php
	}
    ?>

    <!-- Main of the page -->
    <?php
    //Show the requested page
    include_once($page . '.php');
    ?>
</div>
</body>
</html>

