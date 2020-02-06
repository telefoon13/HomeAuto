<?php
include_once "php/data/meter.php";
include_once "DatabaseFactory.php";

class MeterDB
{
    //PRIVATE help functions

    //Make DB connection
    private static function getConnection()
    {
        return DatabaseFactory::getDatabase();
    }

    //Convert to object
    private static function convertRowToObject($row)
    {
        return new meter(
            $row["id"],
            $row["datetime"],
            $row["type"],
            $row["value"]
        );
    }

    //PUBLIC CRUD functions

    //CREATE
    public static function create($meter)
    {
        $high = self::getHighestBytype($meter->type);
        if ($high->value > $meter->value){
            return false;
        }
        if (($high->value-$meter->value) > ($high->value/100)*10){
            return false;
        }
        return self::getConnection()->executeQuery(
            "INSERT INTO meters (dateti, type, value) VALUES ('?','?','?')",
            array($meter->dateti, $meter->type, $meter->value));
    }

    //getHighestBytype
    public static function getHighestBytype($type)
    {
        $result = self::getConnection()->executeQuery("SELECT * FROM meters WHERE type='".$type."' AND value=(SELECT MAX(value) FROM meters WHERE type='".$type."')");
        if ($result->num_rows != 1) {
            return false;
        }
        $row = $result->fetch_array();
        $meter = self::convertRowToObject($row);
        return $meter;
    }

    //GetUsedTodayByType
    public static function GetUsedThisXXByType($type, $xx)
    {
        if ($xx == "day"){
            $format = "Y-m-d";
        } elseif ($xx =="month") {
            $format = "Y-m";
        } elseif ($xx == "year") {
            $format = "Y";
        } else {
            return false;
        }
        $today = date($format);
        $lowest = self::getConnection()->executeQuery("SELECT * FROM meters WHERE type='".$type."' AND value=(SELECT MIN(value) FROM meters WHERE type='".$type."' AND dateti LIKE '".$today."%')");
        if ($lowest->num_rows != 1) {
            return false;
        }
        $rowL = $lowest->fetch_array();
        $meterL = self::convertRowToObject($rowL);
        $highest = self::getConnection()->executeQuery("SELECT * FROM meters WHERE type='".$type."' AND value=(SELECT MAX(value) FROM meters WHERE type='".$type."' AND dateti LIKE '".$today."%')");
        if ($highest->num_rows != 1) {
            return false;
        }
        $rowH = $highest->fetch_array();
        $meterH = self::convertRowToObject($rowH);
        return $meterH->value-$meterL->value;
    }

    //GetUsedBetweenDateByType
    public static function GetUsedBetweenByType($type, $from,$to)
    {
        $lowest = self::getConnection()->executeQuery("SELECT * FROM meters WHERE type='".$type."' AND value=(SELECT MIN(value) FROM meters WHERE type='".$type."' AND dateti BETWEEN '".$from."%' AND '".$to."%')");
        if ($lowest->num_rows != 1) {
            return false;
        }
        $rowL = $lowest->fetch_array();
        $meterL = self::convertRowToObject($rowL);
        $highest = self::getConnection()->executeQuery("SELECT * FROM meters WHERE type='".$type."' AND value=(SELECT MAX(value) FROM meters WHERE type='".$type."' AND dateti BETWEEN '".$from."%' AND '".$to."%')");
        if ($highest->num_rows != 1) {
            return false;
        }
        $rowH = $highest->fetch_array();
        $meterH = self::convertRowToObject($rowH);
        return $meterH->value-$meterL->value;
    }

    //GetAllByType
    public static function getAllByType($type)
    {
        //sql query maken en uit DB halen
        $result = self::getConnection()->executeQuery(
            "SELECT * FROM meters WHERE type='?' ORDER BY id",
            array($type));
        //Lege array maken
        $resultArray = array();
        //Loop over de result
        for ($i = 0; $i < $result->num_rows; $i++) {
            //Haal rows uit de db
            $row = $result->fetch_array();
            //Maak een meterstand element
            $meter = self::convertRowToObject($row);
            //voeg meterstand toe aan array
            $resultArray[$i] = $meter;
        }
        return $resultArray;
    }

    //GetAllByType
    public static function getAllBetweenByType($type, $from,$to)
    {
        //sql query maken en uit DB halen
        $result = self::getConnection()->executeQuery(
            "SELECT * FROM meters WHERE type='?' AND dateti BETWEEN '?' AND '?' ORDER BY dateti",
            array($type, $from, $to));
        //Lege array maken
        $resultArray = array();
        //Loop over de result
        for ($i = 0; $i < $result->num_rows; $i++) {
            //Haal rows uit de db
            $row = $result->fetch_array();
            //Maak een meterstand element
            $meter = self::convertRowToObject($row);
            //voeg meterstand toe aan array
            $resultArray[$i] = $meter;
        }
        return $resultArray;
    }
}