<?php
include_once("php/MainHelper.php");
include_once("php/database/MeterDB.php");

$dateti = $_GET['dateti'];
$type = $_GET['type'];
$value = $_GET['value']/100;

if (!empty($dateti) && !empty($type) && !empty($value)){
    $meter = new meter(0,$dateti,$type,$value);
    if ($meter){
        $meterDB = MeterDB::create($meter);
        if ($meterDB){
            echo "OK";
        } else {
            echo "Fout in DB";
        }
    }else{
        echo "Object niet gemaakt";
    }
} else {
    echo "Iets leeg";
}
