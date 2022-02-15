<?php

namespace App\Controller;

use App\Model\Model_Docs;
use App\Model\Model_Attach;

class AttachController {

    public static function index() {
        $result = Model_Docs::find();
        $attachs = Model_Attach::find($_GET['colaborador']);
        return array(
            'docs' => $result,
            'attachs' => $attachs
        );
    }

    public static function store() {
        Model_Attach::add(array(
            'id_colaborador' => $_GET['colaborador'],
            'id_tipo_documento' => $_POST["id_tipo_documento"],
            'caminho_documento' => $_POST['caminho_documento'],
        ));
        return "teste";
    }
    
    public static function delete($id) {
        Model_Attach::delete($id);
        return "teste";
    }
}