<?php 

namespace Model;

use Util\Crud;
use Util\Connection;

class CategoriaModel extends Crud
{

    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }

    public function listar()
    {
        $query = $this->conn->query('SELECT * FROM categoria')->fetchAll();
        return $query;
    }

    public function inserir($dados)
    {
        try{
            
            $sql = $this->conn->prepare("INSERT INTO categoria (nome_categoria, codigo_categoria) VALUES (:nome_categoria,:codigo_categoria)");

            $sql->bindValue(":nome_categoria",$dados['category-name']);
            $sql->bindValue(":codigo_categoria",$dados['category-code']);

            $sql->execute();

            return $sql->rowCount(); 

        }catch(PDOException $Exception){
            throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
        }
    }

    public function buscar($id)
    {
        try{
            
            $sql = $this->conn->prepare("SELECT nome_categoria,codigo_categoria FROM categoria WHERE id_categoria = :id");

            $sql->bindValue(":id",$id);
            $sql->execute();

            return $sql->fetch(); 
        }catch(PDOException $Exception){
            throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
        }
    }

    public function atualizar($dados)
    {
        try{
            
            $sql = $this->conn->prepare("UPDATE categoria SET nome_categoria = :nome_categoria , codigo_categoria = :codigo_categoria WHERE id_categoria = :id_categoria ");

            $sql->bindValue(":nome_categoria",$dados['category-name']);
            $sql->bindValue(":codigo_categoria",$dados['category-code']);
            $sql->bindValue(":id_categoria",$dados['id']);

            $sql->execute();

            return $sql->rowCount(); 

        }catch(PDOException $Exception){
            throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
        }
    }

    public function deletar($id)
    {

        try{
            
            $sql = $this->conn->prepare("DELETE FROM categoria WHERE id_categoria = :id");

            $sql->bindValue(":id",$id);
            $sql->execute();

            return $sql->rowCount(); 

        }catch(PDOException $Exception){
            throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
        }

    }


}