<?php

namespace Model;

use Util\Connection;

class ProdutosModel
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


    
}