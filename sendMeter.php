<?php
include_once("php/MainHelper.php");
include_once("php/database/MeterDB.php");

ini_set('display_errors', 1);
$dateti = $_GET['dateti'];
$type = $_GET['type'];
$value = $_GET['value'];

if (!empty($dateti) && !empty($type) && !empty($value)){
    $meter = new meter(0,$dateti,$type,$value);
    //echo $meter->value;
    if ($meter){
        $meterDB = MeterDB::create($meter);
        if ($meterDB){
            echo "OK";
        }
    }
}
