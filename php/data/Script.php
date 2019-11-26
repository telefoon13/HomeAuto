<?php
class script
{
	public $id;
	public $state;
	public $name;
	public $minute;
	public $hour;
	public $dayOfMonth;
	public $month;
	public $dayOfWeek;


	public function __construct($id, $state, $name, $minute, $hour, $dayOfMonth, $month, $dayOfWeek)
	{
		$this->id = $id;
		$this->state = $state;
		$this->name = $name;
		$this->minute = $minute;
		$this->hour = $hour;
		$this->dayOfMonth = $dayOfMonth;
		$this->month = $month;
		$this->dayOfWeek = $dayOfWeek;
	}


}