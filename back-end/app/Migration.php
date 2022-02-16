<?php

namespace App;

use \App\Migration\CreatePeople;

class Migration {
	
	public static function createTables() {
		include "app/config.php";

		CreatePeople::up();
	}
	
	public static function deleteTables() {
		include "app/config.php";

		CreatePeople::down();
	}
}