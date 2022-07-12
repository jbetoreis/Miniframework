<?php
namespace MF\Controller;

abstract class Action {  // Classe com requisitos não funcionais que podem ser utilizados para qualquer aplicação
    protected $view;
    
    public function __construct(){
        $this->view = new \stdClass();
    }

    protected function render($layout, $view) {
        $this->view->page = $view;
        $arquivo = "../App/views/" . $layout . ".phtml";
        if(file_exists($arquivo)){
            require_once $arquivo;
        }else{
            $this->content();
        }
    }

    protected function content(){
        $controlador = get_class($this);
        $controlador = str_replace('App\\Controllers\\', '', $controlador);
        $controlador = strtolower(str_replace('Controller', '', $controlador));

        // Recuperando a view solicitada a patir da execução do método de action executado a partir da rota
        require_once "../App/views/" . $controlador . "/" . $this->view->page . ".phtml";
    }
}

?>