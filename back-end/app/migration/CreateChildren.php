<?php

namespace App\Migration;

use App\Model\Model;

class CreateChildren extends Model {

	private static $table = 'filhos';

	public static function up() {
		$conn = self::connect();
		$sql = "CREATE TABLE IF NOT EXISTS " . self::$table . " (
			pessoas_id INT NOT NULL,
			nome VARCHAR(45) NOT NULL,
			idade INT NOT NULL CHECK(idade >= 0),
			PRIMARY KEY (nome),
			FOREIGN KEY (pessoas_id) REFERENCES pessoas (id)
		) ENGINE=InnoDB";
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