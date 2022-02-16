<?php

namespace App\Controller;

use \App\Http\Response;
use App\Model\Model_People;

class PeopleController {

	public static function index() {
		$peoples = Model_People::find();
		return new Response(200, $peoples);
	}
	
	public static function store() {
		$people = Model_People::add();
		return new Response(201, $people);
    }

	public static function show($nome) {
		$people = Model_People::findOne($nome);
		return new Response(200, $people);
    }

	public static function delete($nome) {
		Model_People::delete($nome);
		return new Response(204, null);
    }
}