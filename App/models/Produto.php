<?php
    namespace App\Models;
    use PDO;

    class Produto{
        protected $db;

        public function __construct(PDO $db){
            $this->db = $db;
        }

        public function getProdutos(){
            $sql = "select * from tb_produtos";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            $dados = $statement->fetchAll();
            echo $dados;
            exit;
            return $dados;
        }
    }
?>