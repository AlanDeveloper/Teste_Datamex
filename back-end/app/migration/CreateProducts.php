<?php

namespace App\Migration;

use App\Model\Model;

class CreateProducts extends Model {

	private static $table = 'products';

	public static function up() {
		$conn = self::connect();
		$sql = "CREATE TABLE IF NOT EXISTS " . self::$table . " (
			id INT AUTO_INCREMENT,
			name VARCHAR(100) NOT NULL,
			PRIMARY KEY (id)
		)";
		$query = $conn->prepare($sql);
		$query->execute();
	}

	public static function down() {
		$conn = self::connect();
		$sql = "DROP TABLE IF EXISTS " . self::$table;
		$query = $conn->prepare($sql);
		$query->execute();
	}
}