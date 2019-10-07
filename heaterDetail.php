<div class="row" id="R2">
	<div class="col-sm-4 col-12 align-self-center text-center" id="R2C1" >
        <h5>Modus :</h5>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-primary active">
                <input type="radio" name="modus" id="Manueel" autocomplete="off" checked> Manueel
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="modus" id="Boost" autocomplete="off"> Boost
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="modus" id="Automatisch" autocomplete="off"> Automatisch
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="modus" id="Off" autocomplete="off"> Off
            </label>
        </div>
<br><br>
	</div>
	<div class="col-sm-4 col-12 align-self-center text-center" id="R2C3" >
		<!--<div style="display: flex; justify-content: space-around">
		<div >
			<h1>-</h1>
		</div>
		<div >

			<h2><div class="theTemp" id="theTemp">23.0&deg;C</div></h2>
		</div>
		<div >
			<h1>+</i></h1>
		</div>
		</div>

		<div  style="display: flex; justify-content: space-around">
			<div>
			<h1>-</h1>
		</div>
		<div>

			<h2><div class="theTime" id="theTime">30min</div></h2>
		</div>
		<div >
			<h1>+</h1>
		</div>
		</div>
		-->
        <h5>Temperatuur :</h5>
        <div class="slidecontainer">
            <input type="range" min="10.0" max="30.0" value="21.0" step="0.5" class="slider" id="tempRange">
            <h5><span id="tempValue"></span> &deg;C</h5>
        </div>

        <h5>Tijd :</h5>
        <div class="slidecontainer">
            <input type="range" min="15" max="180" value="60" step="15" class="slider" id="timeRange">
            <h5><span id="timeValue"></span>min</h5>
        </div>


	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C4">
		&emsp;
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C5">
        <img src="img/confirm.svg" alt="unlocked" class="w-50">
		<h5>Bevestig</h5>
	</div>
</div>
<div class="row" id="R3">
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C1">
        <img src="img/unlocked.svg" alt="unlocked" class="w-50">
		<h5>Lock</h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C2">
        <img src="img/schedule.svg" alt="unlocked" class="w-50">
		<h5>Schema</h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C3">
        <img src="img/battery.svg" alt="unlocked" class="w-50">
		<h5>Batterij</h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C4">
        <img src="img/full-signal.svg" alt="unlocked" class="w-50">
		<h5>Signaal</h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C5">
        <img src="img/openWindow.svg" alt="unlocked" class="w-50">
        <h5>Open window</h5>
	</div>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R3C6">
        <h1>23.5 &degC</h1>
        <h5>Live temp</h5>
	</div>
</div>
<script>
    var sliderTemp = document.getElementById("tempRange");
    var outputTemp = document.getElementById("tempValue");
    var sliderTime = document.getElementById("timeRange");
    var outputTime = document.getElementById("timeValue");

    outputTemp.innerHTML = Number(sliderTemp.value).toFixed(1);
    outputTime.innerHTML = sliderTime.value;

    sliderTemp.oninput = function() {
        outputTemp.innerHTML = Number(this.value).toFixed(1);
    };
    sliderTime.oninput = function() {
        outputTime.innerHTML = this.value;
    };
</script>