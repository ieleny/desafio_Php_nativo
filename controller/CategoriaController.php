<?php

use Util\Crud;
use Model\CategoriaModel;

class CategoriaController extends Crud
{
    private $categoriaModel;
    
    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
    }
    
    public function listar()
    {
        $categorias = $this->categoriaModel->listar();
        $tbody      = '';

        foreach($categorias AS $dados){
            $tbody .= "<tr class=data-row>";
            $tbody .= "<td class=data-grid-td>";
            $tbody .= " <span class=data-grid-cell-content>{$dados["nome_categoria"]}</span>";
            $tbody .= "<td class=data-grid-td>";
            $tbody .= " <span class=data-grid-cell-content>{$dados["codigo_categoria"]}</span>";
            $tbody .= "</td>";
            $tbody .= "<td class=data-grid-td>";
            $tbody .= " <div class=actions>";
            $tbody .= "     <button type='button' onclick=edit({$dados["id_categoria"]}); ><span>Edit</span></button>";
            $tbody .= "     <button type='button' onclick=deleteId({$dados["id_categoria"]}); ><span>Delete</span></button>";
            $tbody .= " </div>";
            $tbody .= "</td>";
        }

        echo $tbody;
    }

    public function inserir($dados)
    {
        return $this->categoriaModel->inserir($dados);
    }

    public function buscar($id)
    {
        $buscar = $this->categoriaModel->buscar($id);
        echo json_encode(["nome_categoria" => $buscar["nome_categoria"] , "codigo_categoria" => $buscar["codigo_categoria"]]);
    }

    public function atualizar($dados)
    {

    }

    public function deletar()
    {

    }

}