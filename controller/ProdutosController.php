<?php 

use Model\ProdutosModel;
use Controller\ProdutosTemCategoriaController;
use Util\Crud;

class ProdutosController extends Crud
{

    private $produtosModel;
    private $produtosTemCategoria;
    
    public function __construct()
    {
        $this->produtosModel        = new ProdutosModel();
        $this->produtosTemCategoria = new ProdutosTemCategoriaController();
    }


    public function listar()
    {

        $produtos               = $this->produtosModel->listar();
        $tbody                  = '';


        foreach($produtos AS $produtos){

            $tbody .= "<tr class=data-row>";

                $tbody .= " <td class=data-grid-td>";
                $tbody .= "  <span class=data-grid-cell-content>{$produtos["nome_produtos"]}</span>";
                $tbody .= " </td>";
                
                $tbody .= " <td class=data-grid-td>";
                $tbody .= "  <span class=data-grid-cell-content>{$produtos["sku_produtos"]}</span>";
                $tbody .= " </td>";

                $tbody .= " <td class=data-grid-td>";
                $tbody .= "  <span class=data-grid-cell-content>{$produtos["preco_produtos"]}</span>";
                $tbody .= " </td>";

                $tbody .= " <td class=data-grid-td>";
                $tbody .= "  <span class=data-grid-cell-content>{$produtos["quantidade_produtos"]}</span>";
                $tbody .= " </td>";

                $tbody .= " <td class=data-grid-td>";            

                foreach($this->produtosTemCategoria->buscar($produtos['id_produtos']) AS $categoria){
                    $tbody .= " <span class=data-grid-cell-content>{$categoria['nome_categoria']}</span>";
                }

                $tbody .= " </td>";

                $tbody .= "<td class=data-grid-td>";
                $tbody .= " <div class=actions>";
                $tbody .= "     <button type='button' onclick=edit({$produtos["id_produtos"]}); ><span>Edit</span></button>";
                $tbody .= "     <button type='button' onclick=deleteId({$produtos["id_produtos"]}); ><span>Delete</span></button>";
                $tbody .= " </div>";
                $tbody .= "</td>";

            $tbody  .= "</tr>";
        }
        

        echo $tbody;
        
    }

    public function inserir($dados)
    {
        // Primeiro inserir o produtos
        $insert = $this->produtosModel->inserir($dados);

        // Pegar o Id, do produto para salvar no produtos_has_categoria
        if($insert[0] >= 1){
            
            $this->produtosTemCategoria->inserir( [ $dados['category'] , $insert ] );

        }


        var_dump($dados);
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

}

