<?php
include_once "php/data/Category.php";
include_once "DatabaseFactory.php";

class CategoryDB
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
        return new Category(
            $row["id"],
            $row["name"],
			$row["svg"],
			$row["place"],
			$row["type"]
        );
    }

    //PUBLIC CRUD functions
/*
    //CREATE
    public static function create($category)
    {
        return self::getConnection()->executeQuery(
            "INSERT INTO category (category) VALUES ('?')",
            array($category->category));
    }
*/
    //READ ALL
    public static function getAll()
    {
        //sql query maken en uit DB halen
        $result = self::getConnection()->executeQuery(
            "SELECT * FROM category ORDER BY place");
        //Lege array maken
        $resultArray = array();
        //Loop over de result
        for ($i = 0; $i < $result->num_rows; $i++) {
            //Haal rows uit de db
            $row = $result->fetch_array();
            //Maak een category element
            $category = self::convertRowToObject($row);
            //voeg category toe aan array
            $resultArray[$i] = $category;
        }
        return $resultArray;
    }
/*
    //READ by id
    public static function getById($id)
    {
        $result = self::getConnection()->executeQuery(
            "SELECT * FROM categories WHERE categoryId='?'",
            array($id));
        if ($result->num_rows != 1) {
            return false;
        }
        $row = $result->fetch_array();
        $category = self::convertRowToObject($row);
        return $category;
    }

    //UPDATE
    public static function update($category)
    {
        return self::getConnection()->executeQuery(
            "UPDATE categories SET category='?' WHERE categoryId='?'",
            array($category->category, $category->categoryId));
    }

    //DELETE by ID
    public static function delete($id)
    {
        return self::getConnection()->executeQuery(
            "DELETE FROM categories WHERE categoryId='?'",
            array($id));
    }
*/
}

?>