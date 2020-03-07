<?php

namespace Model;

use Util\Connection;

class ProdutosTemCategoriaModel
{

    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }


    protected function inserir($dados)
    {

    }

    protected function atualizar($dados)
    {

    }

    protected function deletar($id)
    {

    }

    public function buscar($id)
    {

        try{
            
            $sql = $this->conn->prepare(" SELECT * from produtos.categoria AS categoria 
                                            INNER JOIN produtos.produtos_has_categoria AS produtos_categoria ON produtos_categoria.categoria_id_categoria = categoria.id_categoria 
                                          WHERE produtos_id_produtos = :id");

            $sql->bindValue(":id",$id);
            $sql->execute();

            return $sql->fetchAll(); 
            
        }catch(PDOException $Exception){
            throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
        }

        
    }

}