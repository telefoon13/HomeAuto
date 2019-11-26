<?php
include_once "php/data/Script.php";
include_once "DatabaseFactory.php";

class ScriptsDB
{
	//Make DB connection
	private static function getConnection()
	{
		return DatabaseFactory::getDatabase();
	}

	//Convert to object
	private static function convertRowToObject($row)
	{
		return new Script(
			$row["id"],
			$row["state"],
			$row["name"],
			$row["minute"],
			$row["hour"],
			$row["dayOfMonth"],
			$row["month"],
			$row["dayOfWeek"]
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
			"SELECT * FROM scripts ORDER BY id");
		//Lege array maken
		$resultArray = array();
		//Loop over de result
		for ($i = 0; $i < $result->num_rows; $i++) {
			//Haal rows uit de db
			$row = $result->fetch_array();
			//Maak een script element
			$script = self::convertRowToObject($row);
			//voeg script toe aan array
			$resultArray[$i] = $script;
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