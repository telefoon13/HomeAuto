<?php
include_once("php/vaillant.php");
login();
$test = isLoggedIn();
if ($test){
	$ok = "Alles ok";
} else {
	$ok = "Error";
}
?>
<div class="row" id="R2">
	<div class="col-12 align-self-center text-center" id="R2C1"><h1><?php echo $ok; ?></h1></div>
</div>