<?php

namespace App\Seed;

use \App\Model\Model;

class SeederChildren extends Model {

	private static $table = 'filhos';

	private static $columns = ["pessoas_id", "nome", "idade"];

	public static function run() {
		$conn = self::connect();
		$sql = "INSERT INTO " . self::$table . " (" . implode(", ", self::$columns) . ") VALUES 
			(1, 'Joana', 11), (1, 'Mario', 8), (1, 'Guilherme', 15), (3, 'Ana', 18), (4, 'Helena', 3)";
		$query = $conn->prepare($sql);
		$query->execute();
	}
}