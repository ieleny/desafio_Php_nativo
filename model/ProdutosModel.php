<?php

namespace Model;

use Util\Connection;
use Util\Crud;

class ProdutosModel extends Crud
{

    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }

    public function listar()
    {
        $query = $this->conn->query('select * from produtos')->fetchAll();
        return $query;
    }

    public function inserir($dados)
    {

        try{
            
            $sql = $this->conn->prepare("  INSERT INTO produtos
                                                        (sku_produtos, quantidade_produtos, preco_produtos, nome_produtos, descricao_produtos)
                                            VALUES (:sku, :quantidade, :preco , :nome, :descricao) ");


            $sql->bindValue(":sku",$dados['sku']);
            $sql->bindValue(":quantidade",$dados['quantity']);
            $sql->bindValue(":preco",$dados['price']);
            $sql->bindValue(":nome",$dados['name']);
            $sql->bindValue(":descricao",$dados['description']);

            $sql->execute();

            return [$sql->rowCount() , $this->lastInsertId() ]; 

        }catch(PDOException $Exception){
            throw new $Exception->getMessage() ." ". (int)$Exception->getCode();
        }

    }

    public function atualizar($dados)
    {

        try{
            
            $sql = $this->conn->prepare("   UPDATE produtos  SET 
                                                sku_produtos = :sku_produtos, 
                                                quantidade_produtos = :quantidade_produtos, 
                                                preco_produtos = :preco_produtos,
                                                nome_produtos = :nome_produtos, 
                                                descricao_produtos = :descricao_produtos                              
                                            WHERE id_produtos = :id ");

            $sql->bindValue(":sku_produtos",$dados['sku']);
            $sql->bindValue(":quantidade_produtos",$dados['quantity']);
            $sql->bindValue(":preco_produtos",$dados['price']);
            $sql->bindValue(":nome_produtos",$dados['name']);
            $sql->bindValue(":descricao_produtos",$dados['description']);
            $sql->bindValue(":id",$dados['id']);
            
            $sql->execute();

            return $sql->rowCount(); 

        }catch(PDOException $Exception){
            throw new $Exception->getMessage() ." ". (int)$Exception->getCode();
        }

    }

    public function deletar($id)
    {
        try{
            
            $sql = $this->conn->prepare("DELETE FROM produtos WHERE id_produtos = :id");

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
            
            $sql = $this->conn->prepare("   SELECT  
                                                produtos.*,
                                                produtos_categoria.categoria_id_categoria,
                                                categoria.nome_categoria
                                            FROM produtos.produtos AS produtos 
                                            INNER JOIN produtos.produtos_has_categoria  as produtos_categoria ON produtos.id_produtos = produtos_categoria.produtos_id_produtos
                                            INNER JOIN produtos.categoria 				as categoria ON produtos_categoria.categoria_id_categoria = categoria.id_categoria
                                            WHERE id_produtos = :id ");

            $sql->bindValue(":id",$id);
            $sql->execute();

            return $sql->fetchAll(); 
        }catch(PDOException $Exception){
            throw new $Exception->getMessage() ." ". (int)$Exception->getCode();
        }

    }


    public function lastInsertId()
    {
        return $this->conn->query("SELECT LAST_INSERT_ID()")->fetchColumn();
        
    }


    
}