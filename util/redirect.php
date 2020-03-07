<?php

namespace foo;
require __DIR__. '../../vendor/autoload.php';


//Inserir
if(isset($_POST) && isset($_POST['nome']) && empty($_POST['id']) && !isset($_POST['acao'])){

    $classe = "Controller\\{$_POST["nome"]}Controller";

    $classeIntanciada = new $classe();
    $quantidadeLinha  = $classeIntanciada->inserir($_POST);

    if($quantidadeLinha >= 1){
        echo 1;
    }else{
        echo 0;
    }

}else if(isset($_POST) && isset($_POST['nome']) && !empty($_POST['id']) && !isset($_POST['acao'] )){

    //Atualizar

    $classe = "Controller\\{$_POST["nome"]}Controller";

    $classeIntanciada = new $classe();
    $quantidadeLinha  = $classeIntanciada->atualizar($_POST);

    if($quantidadeLinha >= 1){
        echo 1;
    }else{
        echo 0;
    }

}else if(isset($_POST) && isset($_POST['nome']) && $_POST['acao'] == 'listar'){
    //Listar
    
    $classe = "Controller\\{$_POST["nome"]}Controller";
    
    //include_once __DIR__."../../controller/{$classe}.php";

    $classeIntanciada = new $classe;
    return $classeIntanciada->listar();

}else if(isset($_POST) && isset($_POST['nome']) && $_POST['acao'] == 'buscar' && isset($_POST['id'])){
    
    //Buscar
    $classe = "Controller\\{$_POST["nome"]}Controller";

    $classeIntanciada = new $classe();
    return $classeIntanciada->buscar($_POST['id']);

}else if(isset($_POST) && isset($_POST['nome']) && $_POST['acao'] == 'delete' && isset($_POST['id'])){
    
    //Delete
    $classe = "Controller\\{$_POST["nome"]}Controller";

    $classeIntanciada = new $classe();
    return $classeIntanciada->deletar($_POST['id']);

}else if(isset($_POST) && isset($_POST['nome']) && $_POST['acao'] == 'listarMultiplo'){

    //Listar Multiplo
    $classe = "Controller\\{$_POST["nome"]}Controller";

    $classeIntanciada = new $classe();
    return $classeIntanciada->listarMultiplo();

}