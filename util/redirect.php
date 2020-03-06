<?php

require __DIR__. '../../vendor/autoload.php';

//Inserir
if(isset($_POST) && isset($_POST['nome']) && isset($_POST['category-name']) && isset($_POST['category-code']) && empty($_POST['id']) ){

    $classe = $_POST['nome'].'Controller';
    
    include_once __DIR__."../../controller/{$classe}.php";

    unset($_POST["nome"]);
    unset($_POST["id"]);

    $classeIntanciada = new $classe();
    $quantidadeLinha  = $classeIntanciada->inserir($_POST);

    if($quantidadeLinha >= 1){
        echo 1;
    }else{
        echo 0;
    }

}

//Listar
if(isset($_POST) && isset($_POST['nome']) && $_POST['acao'] == 'listar'){

    $classe = $_POST['nome'].'Controller';
    
    include_once __DIR__."../../controller/{$classe}.php";

    $classeIntanciada = new $classe();
    return $classeIntanciada->listar();

}

//Editar
if(isset($_POST) && isset($_POST['nome']) && $_POST['acao'] == 'buscar' && isset($_POST['id'])){

    $classe = $_POST['nome'].'Controller';
    
    include_once __DIR__."../../controller/{$classe}.php";

    $classeIntanciada = new $classe();
    return $classeIntanciada->buscar($_POST['id']);

}