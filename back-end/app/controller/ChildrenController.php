<?php

namespace App\Controller;

use \App\Http\Response;
use App\Model\Model_Children;

class ChildrenController {

	public static function index() {
		$childrens = Model_Children::find();
		return new Response(200, $childrens);
	}
	
	public static function store() {
		$children = Model_Children::add();
		return new Response(201, $children);
    }

	public static function show($nome) {
		$children = Model_Children::findOne($nome);
		return new Response(200, $children);
    }
}