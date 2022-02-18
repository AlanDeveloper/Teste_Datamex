<?php

namespace App;

include "app/config.php";

use \App\Migration\CreatePeople;
use \App\Migration\CreateChildren;

use \App\Seed\SeederPeople;
use \App\Seed\SeederChildren;

class Migration {
	
	public static function createTables() {
		CreatePeople::up();
		CreateChildren::up();
	}
	
	public static function deleteTables() {
		CreateChildren::down();
		CreatePeople::down();
	}

	public static function seedTables() {
		SeederPeople::run();
		SeederChildren::run();
	}
}