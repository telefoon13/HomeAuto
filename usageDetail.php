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