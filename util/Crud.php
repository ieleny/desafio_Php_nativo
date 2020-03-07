<?php

namespace Util;

abstract class Crud
{
    
    abstract public function listar();
    abstract public function inserir($dados);
    abstract public function buscar($id);
    abstract public function atualizar($dados);
    abstract public function deletar($id);

}

