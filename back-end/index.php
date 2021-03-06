<?php

require __DIR__.'/vendor/autoload.php';

use \App\Router;
use \App\Controller\Controller;
use \App\Controller\PeopleController;
use \App\Controller\ChildrenController;

$router = new Router;

$router->get('/', function() {
    return Controller::index();
});

$router->get('/people', function() {
    return PeopleController::index();
});
$router->get('/people/{nome}', function($nome) {
    return PeopleController::show($nome);
});
$router->post('/people', function() {
    return PeopleController::store();
});
$router->delete('/people/{nome}', function($nome) {
    return PeopleController::delete($nome);
});

$router->get('/children', function() {
    return ChildrenController::index();
});
$router->get('/children/{nome}', function($nome) {
    return ChildrenController::show($nome);
});
$router->post('/children', function() {
    return ChildrenController::store();
});

$router->run()->sendResponse();