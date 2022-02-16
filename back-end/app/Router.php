<?php

namespace App;

use App\Http\Response;

class Router {
    
    private $routes = [];

    public function get($route, $action) {
        self::add('GET', $route, $action);
    }

    public function post($route, $action) {
        self::add('POST', $route, $action);
    }

    public function delete($route, $action) {
        self::add('DELETE', $route, $action);
    }
    public function put($route, $action) {
        self::add('PUT', $route, $action);
    }

    private function add($method, $route, $action) {
        $this->routes[$method][$route] = $action;
    }

    private function getMethod() {
        // DETECTAR MÉTODO PUT E DELETE
        if (isset($_REQUEST['_method'])) return strtoupper($_REQUEST['_method']);
        
        return $_SERVER['REQUEST_METHOD'];
    }

    public function run() {
        $method = self::getMethod();
        $route = $_SERVER['REQUEST_URI'];

        $route = explode('?', $route)[0];
        if($method === 'GET' || $method === 'DELETE' || $method === 'PUT') {
            $args = ['id' => filter_var($route, FILTER_SANITIZE_NUMBER_INT)];
        } else {
            $args = [];
        }
        
        $route = preg_replace('/\d+/u', '{id}', $route);

        if (!isset($this->routes[$method])) return new Response(500, array("error" => ["message" => "Método não registrado!"]));
        if (!isset($this->routes[$method][$route])) return new Response(404, array("error" => ["message" => "Página não encontrada!"]));

        return call_user_func_array($this->routes[$method][$route], $args);
    }
}