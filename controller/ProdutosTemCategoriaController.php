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

        return $this->produtosTemCategoriaModel->buscar($id);
        
    }

}