
<div class="row" id="R2">
	<div class="col-12 align-self-center text-center" id="R2C1"><h1>KnightRider</h1></div>
</div>
<div class="row" id="R3">
	<div class="col-2 align-self-center text-center" id="R3C1">&emsp;</div>
	<div class="col-2 align-self-center text-center" id="R3C2">&emsp;</div>
	<div class="col-2 align-self-center text-center" id="R3C3">&emsp;</div>
	<div class="col-2 align-self-center text-center" id="R3C4">&emsp;</div>
	<div class="col-2 align-self-center text-center" id="R3C5">&emsp;</div>
	<div class="col-2 align-self-center text-center" id="R3C6">&emsp;</div>
</div>

<?php
ob_flush();
flush();
include_once("php/hue.php");
$color = "#FF0000";
$time = 350000;
for ($i = 0; $i < 4; $i++){
			updateLight(1, true, $color);
			usleep($time);

			updateLight(1, false);
			updateLight(2, true, $color);
			usleep($time);

			updateLight(2, false);
			updateLight(3, true, $color);
			usleep($time);

			updateLight(3, false);
			updateLight(4, true, $color);
			usleep($time);

			updateLight(4, false);
			updateLight(5, true, $color);
			usleep($time);

			updateLight(5, false);
			updateLight(6, true, $color);
			usleep($time);

			updateLight(6, false);
			updateLight(5, true, $color);
			usleep($time);

			updateLight(5, false);
			updateLight(4, true, $color);
			usleep($time);

			updateLight(4, false);
			updateLight(3, true, $color);
			usleep($time);

			updateLight(3, false);
			updateLight(2, true, $color);
			usleep($time);

			updateLight(2, false);
			updateLight(1, true, $color);
}
usleep($time);
updateLight(1, false);
?>
<!--
<script >
blink();
async function blink(){
        var i = 0;
        while (i < 4) {
            var time = 400;
            document.getElementById("R3C1").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C1").style.backgroundColor = "";
            document.getElementById("R3C2").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C2").style.backgroundColor = "";
            document.getElementById("R3C3").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C3").style.backgroundColor = "";
            document.getElementById("R3C4").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C4").style.backgroundColor = "";
            document.getElementById("R3C5").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C5").style.backgroundColor = "";
            document.getElementById("R3C6").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C6").style.backgroundColor = "";
            document.getElementById("R3C5").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C5").style.backgroundColor = "";
            document.getElementById("R3C4").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C4").style.backgroundColor = "";
            document.getElementById("R3C3").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C3").style.backgroundColor = "";
            document.getElementById("R3C2").style.backgroundColor = "red";
            await sleep(time);
            document.getElementById("R3C2").style.backgroundColor = "";
            document.getElementById("R3C1").style.backgroundColor = "red";
            i++;
        }
        await sleep(time);
        document.getElementById("R3C1").style.backgroundColor = "";
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
</script>
-->