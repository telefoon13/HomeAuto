<?php
include_once "php/database/Database.php";
include_once "php/.secrets.php";
class DatabaseFactory
{

    //Make singleton met static
    private static $connection;

    public static function getDatabase()
    {
        if (self::$connection == null) {
            global $db_url;
            global $db_user;
            global $db_pass;
            global $db_db;
            self::$connection = new Database($db_url, $db_user, $db_pass, $db_db);
        }
        return self::$connection;
    }
}

?>
