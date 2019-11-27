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
			$row["type"],
			$row["name"],
			$row["minute"],
			$row["hour"],
			$row["dayOfMonth"],
			$row["month"],
			$row["dayOfWeek"]
		);
	}


	//PUBLIC CRUD functions

		//CREATE
		public static function create($script)
		{
			return self::getConnection()->executeQuery(
				"INSERT INTO scripts (type,name,minute,hour,dayOfMonth,month,dayOfWeek) VALUES ('?','?','?','?','?','?','?')",
				array($script->type,$script->name,$script->minute,$script->hour,$script->dayOfMonth,$script->month,$script->dayOfWeek));
		}

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

		//READ by id
		public static function getById($id)
		{
			$result = self::getConnection()->executeQuery(
				"SELECT * FROM scripts WHERE id='?'",
				array($id));
			if ($result->num_rows != 1) {
				return false;
			}
			$row = $result->fetch_array();
			$script = self::convertRowToObject($row);
			return $script;
		}

		//UPDATE
		public static function update($script)
		{
			return self::getConnection()->executeQuery(
				"UPDATE scripts SET type='?',name='?',minute='?',hour='?',dayOfMonth='?',month='?',dayOfWeek='?' WHERE id='?'",
				array($script->type,$script->name,$script->minute,$script->hour,$script->dayOfMonth,$script->month,$script->dayOfWeek, $script->categoryId));
		}

		//DELETE by ID
		public static function delete($id)
		{
			return self::getConnection()->executeQuery(
				"DELETE FROM scripts WHERE id='?'",
				array($id));
		}

}