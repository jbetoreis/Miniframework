<?php
namespace MF\Init;

abstract class Bootstrap {
    private $routes;

    public function __construct(){
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    abstract protected function initRoutes();

    public function getRoutes(){
        return $this->routes;
    }

    public function setRoutes(array $routes){
        $this->routes = $routes;
    }

    protected function run($url){  // Executando o controlador com base na rota que está sendo acessada
        foreach($this->getRoutes() as $key => $value){
            if($url == $value['route']){
                // Especificando o namespace e a classe controladora
                $class = "App\\Controllers\\" . ucfirst($value['controller']);  // Concatenando namespace com valor controller da rota
                $controller = new $class;
                // Obtendo a ação de forma dinâmica e a executando
                $action = $value['action'];
                $controller->$action();
            }
        }
    }

    protected function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}

?>