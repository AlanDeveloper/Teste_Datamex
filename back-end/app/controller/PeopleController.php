<?php

namespace App\Controller;

use \App\Http\Response;
use App\Model\Model_People;
use App\Model\Model_Children;

class PeopleController {

	public static function index() {
		$peoples = Model_People::find();
		for ($i=0; $i < count($peoples); $i++) { 
			$peoples[$i]["nFilhos"] = Model_Children::findById($peoples[$i]["id"]);
		}
		return new Response(200, $peoples);
	}
	
	public static function store() {
		$people = Model_People::add();
		return new Response(201, $people);
    }

	public static function show($nome) {
		$peoples = Model_People::findMany($nome);
		for ($i=0; $i < count($peoples); $i++) { 
			$peoples[$i]["nFilhos"] = Model_Children::findById($peoples[$i]["id"]);
		}
		return new Response(200, $peoples);
    }

	public static function delete($nome) {
		Model_People::delete($nome);
		return new Response(204, null);
    }
}