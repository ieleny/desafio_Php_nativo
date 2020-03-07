<?php 

namespace Controller;
use Model\ProdutosTemCategoriaModel;

class ProdutosTemCategoriaController
{

    private $produtosTemCategoriaModel;
    
    public function __construct()
    {
        $this->produtosTemCategoriaModel = new ProdutosTemCategoriaModel();
    }


    public function inserir($dados)
    {
        return $this->produtosTemCategoriaModel->inserir($dados);
    }

    public function atualizar($dados)
    {
        return $this->produtosTemCategoriaModel->atualizar($dados);
    }

    public function deletar($id)
    {
        return $this->produtosTemCategoriaModel->deletar($id);
    }

    public function buscar($id)
    {   

        return $this->produtosTemCategoriaModel->buscar($id);
        
    }

}