<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\Connection;
use App\Models\Produto;

class IndexController extends Action{  // Classe com os requisitos funcionais da aplicação em questão
    // Definindo  métodos action
    public function index(){
        $conn = Connection::getDb();
        $produto = new Produto($conn);
        $retorno = $produto->getProdutos();
        
        $this->view->dados = $retorno;

        $this->render("layout01", "index");
    }
    public function sobreNos(){
        $conn = Connection::getDb();
        $produto = new Produto($conn);
        $retorno = $produto->getProdutos();

        $this->view->dados = $retorno;

        $this->render("layout02", "sobreNos");
    }
}

?>