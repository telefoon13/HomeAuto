<?php
class meter
{
    public $id;
    public $dateti;
    public $type;
    public $value;

    public function __construct($id, $dateti, $type, $value)
    {
        $this->id = $id;
        $this->dateti = $dateti;
        $this->type = $type;
        $this->value = $value;
    }


}