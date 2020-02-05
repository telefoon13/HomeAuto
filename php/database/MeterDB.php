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
        return self::getConnection()->executeQuery(
            "INSERT INTO meters (dateti, type, value) VALUES ('?','?','?')",
            array($meter->dateti,$meter->type,$meter->value));
    }
}