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
        var_dump('teste3');
    }


    public function lastInsertId()
    {
        return $this->conn->query("SELECT LAST_INSERT_ID()")->fetchColumn();
        
    }


    
}