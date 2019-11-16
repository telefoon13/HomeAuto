<?php
class Category
{
	public $id;
	public $name;
	public $svg;
	public $place;
	public $type;

	public function __construct($id, $name, $svg, $place, $type)
	{
		$this->id = $id;
		$this->name = $name;
		$this->svg = $svg;
		$this->place = $place;
		$this->type = $type;
	}

}
?>