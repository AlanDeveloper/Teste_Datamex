<?php

namespace App\Seed;

use \App\Model\Model;

class SeederPeople extends Model {

	private static $table = 'pessoas';

	private static $columns = ["id", "nome", "idade"];

	public static function run() {
		$conn = self::connect();
		$sql = "INSERT INTO " . self::$table . " (" . implode(", ", self::$columns) . ") VALUES 
			(1, 'Alan', 21), (2, 'Fulano', 26), (2, 'Ciclano', 17), (1, 'Julia', 24), (3, 'Ciclana', 35), (4, 'Zeca', 31)";
		$query = $conn->prepare($sql);
		$query->execute();
	}
}