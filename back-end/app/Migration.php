<?php

namespace App;

use \App\Migration\CreatePeople;
use \App\Migration\CreateChildren;

class Migration {
	
	public static function createTables() {
		include "app/config.php";

		CreatePeople::up();
		CreateChildren::up();
	}
	
	public static function deleteTables() {
		include "app/config.php";

		CreatePeople::down();
		CreateChildren::down();
	}
}