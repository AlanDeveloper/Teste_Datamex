<?php

namespace App;

use \App\Migration\CreateProducts;

class Migration {
	
	public static function createTables() {
		include "app/config.php";

		CreateProducts::up();
	}
	
	public static function deleteTables() {
		include "app/config.php";

		CreateProducts::down();
	}
}