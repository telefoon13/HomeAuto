<?php
include_once("php/MainHelper.php");
include_once("php/hue.php");
if (!checkFilled($_GET["id"])){
    header('Location: index.php');
}
$spot = getLightInfo($_GET["id"]);

?>
<script src="js/html5kellycolorpicker.js"></script>
<form method="post" action="hueChange.php">
    <input type="hidden" id="spotId" name="spotId" value="<?= $_GET["id"]; ?>">
<div class="row" id="R2">
    <div class="col-sm-6 col-12 align-self-center text-center" id="R2C1">
        <canvas id="picker"></canvas><br>
        <input type="hidden" id="color" value="<?= $spot['rgb']; ?>" name="color">
        <script>
            new KellyColorPicker({
                place : 'picker',
                input : 'color',
                method : 'triangle',
                size : 380});
        </script>
    </div>
    <div class="col-sm-6 col-12 align-self-center text-center" id="R2C2">
        <!-- https://proto.io/freebies/onoff/ -->
        <div class="onoffswitch">
            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" <?= ($spot['on']) ? "checked" : "" ?>>
            <label class="onoffswitch-label" for="myonoffswitch">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
            </label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</div>
</form>