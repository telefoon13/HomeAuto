<div class="row" id="R2">
<?php
include_once "php/database/CategoryDB.php";
$results = CategoryDB::getAll();
foreach ($results as $category) {
	?>
	<div class="col-sm-2 col-6 align-self-center text-center" id="R2C<?= $category->place;?>>">
		<a href="index.php?page=category&id=<?= $category->id;?>">
			<img src="img/light.svg" alt="light" class="w-75">
			<h5><?= $category->name;?></h5>
		</a>
	</div>
	<?php
}
?>
</div>