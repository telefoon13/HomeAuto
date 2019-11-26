<?php
if (checkFilled($_GET['play'])){
	?>
	<div class="row" id="R2">
		<div class="col-12 align-self-center text-center" id="R2C1"><h2>PLAY</h2></div>
	</div>
	<?php
} elseif (checkFilled($_GET['stop'])){
	?>
	<div class="row" id="R2">
		<div class="col-12 align-self-center text-center" id="R2C1"><h2>STOP</h2></div>
	</div>
	<?php
} elseif (checkFilled($_GET['id'])){
	?>
	<div class="row" id="R2">
		<div class="col-12 align-self-center text-center" id="R2C1"><h2>EDIT</h2></div>
	</div>
	<?php
} elseif (checkFilled($_GET['delete'])){
	?>
	<div class="row" id="R2">
		<div class="col-12 align-self-center text-center" id="R2C1"><h2>DELETE</h2></div>
	</div>
	<?php
} elseif (checkFilled($_GET['new'])){
	?>
	<div class="row"id="R2">
		<div class="col-6 align-self-center text-left"  style="min-height: 40px"  id="R2C1">
			<label><h5>Name :</h5> <input type="text" name="name" style="border: 1px black solid;" size="60"></label>
		</div>
		<div class="col-6 align-self-center text-left"  style="min-height: 40px"  id="R2C1">
			<label><h5>CroneTime :</h5>
			<input type="text" name="minute" style="border: 1px black solid;" size="3">
			<input type="text" name="hour" style="border: 1px black solid;" size="3">
			<input type="text" name="dayOfMonth" style="border: 1px black solid;" size="3">
			<input type="text" name="month" style="border: 1px black solid;" size="3">
			<input type="text" name="dayOfWeek" style="border: 1px black solid;" size="3">
			</label>
		</div>
		<div class="col-12 align-self-center text-left" id="R2C2">
			<label><h5>Script :</h5><textarea name="script" rows="7" cols="63" style="border: 1px black solid;" ></textarea></label>
		</div>
		<div class="col-12 align-self-center text-left"  style="min-height: 40px"  id="R2C3">
			<label><h5>ON</h5> <input type="radio" name="stat" value="1"></label>
			&emsp;
 			<label><h5>OFF</h5><input type="radio" name="stat" value="0" checked></label>
		</div>
		<div class="col-12 align-self-center text-left"  style="min-height: 40px"  id="R2C4">
			<input type="submit" name="save" value="Save">
		</div>
	</div>
	<?php
} else{
	?>
	<div class="row" id="R2">
		<div class="col-12 align-self-center text-center" id="R2C1"><h2>Er is iets mis gegaan.</h2></div>
	</div>
	<?php
}
?>