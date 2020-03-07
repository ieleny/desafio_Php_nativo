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


    public function inserir($dados)
    {

        try{
            
            $sql = $this->conn->prepare("  INSERT INTO produtos_has_categoria
                                                        (produtos_id_produtos, categoria_id_categoria)
                                            VALUES (:id_produtos, :id_categoria) ");


            $sql->bindValue(":id_produtos",$dados[0]);
            $sql->bindValue(":id_categoria",$dados[1]);

            $sql->execute();

            return $sql->rowCount(); 

        }catch(PDOException $Exception){
            throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
        }

    }

    public function atualizar($dados)
    {

    }

    public function deletar($id)
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