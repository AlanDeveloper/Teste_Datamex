<?php

namespace App\Controller;

use \App\Http\Response;

class Controller {

    public static function index() {
		return new Response(200, array("teste" => "oi"));
    }

	public static function teste($id) {
		return new Response(200, $id);
	}
}