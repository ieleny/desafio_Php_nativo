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

        $sql = $this->conn->prepare(" INSERT INTO produtos_has_categoria (produtos_id_produtos, categoria_id_categoria) VALUES (?, ?) ");

        try{

                $this->conn->beginTransaction();

                    foreach($dados[0] AS $linha){
                        $sql->execute([$dados[1],$linha]); 
                    }        

                $this->conn->commit();    

            return $sql->rowCount(); 

        }catch(\Exception $Exception){
            $this->conn->rollback(); 
            throw $Exception;
        }

    }

    public function atualizar($dados)
    {

        $sql = $this->conn->prepare(" INSERT INTO produtos_has_categoria (produtos_id_produtos, categoria_id_categoria) VALUES (?, ?) ");

        try{

                $this->conn->beginTransaction();

                    foreach($dados["category"] AS $linha){
                        $sql->execute([$dados['id'],$linha]); 
                    }        

                $this->conn->commit();    

            return $sql->rowCount(); 

        }catch(\Exception $Exception){
            $this->conn->rollback(); 
            throw $Exception;
        }

    }

    public function deletar($id)
    {
        try{
            
            $sql = $this->conn->prepare("DELETE FROM produtos_has_categoria WHERE produtos_id_produtos = :id");

            $sql->bindValue(":id",$id);
            $sql->execute();

            return $sql->rowCount(); 

        }catch(PDOException $Exception){
            throw new $Exception->getMessage() ." ". (int)$Exception->getCode();
        }
        
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