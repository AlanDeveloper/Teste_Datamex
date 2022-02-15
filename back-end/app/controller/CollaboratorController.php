<?php

namespace App\Controller;

use App\Model\Model_Collaborator;

class CollaboratorController {

    public static function index() {
        $result = Model_Collaborator::find();
        return $result;
    }
}