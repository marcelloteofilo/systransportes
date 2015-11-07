<?php

require_once("../modelo/mercadoria/mercadoriaSql.php");
session_start();
extract($_REQUEST);
extract($_SESSION);

if ($_GET["editSave"] == "incluirMercadoria") {
    //Classe de Mercadoria
    $mercadoria = new Mercadoria();

    //Atributos da classe Mercadoria/Valores
    $mercadoria->getObjCarga()->setCodCarga($_REQUEST['codCarga']);
    $mercadoria->setDescricaoMercadoria($_REQUEST['descricao']);
    $mercadoria->setPeso($_REQUEST['pesoMercadoria']);
    $mercadoria->setValorMercadoria($_REQUEST['valorMercadoria']);
    $mercadoria->setQuantidade($_REQUEST['quantidade']);

    if (mercadoriaSql::adicionar($mercadoria)) {

        echo json_encode(array('success' => true));

//        $resultado[] = array(
//            'oka' => 'oks',
//        );
    }

    echo(json_encode($resultado));
}

if ($_GET["editSave"] == "alterarMercadoria") {
    $mercadoria = new Mercadoria();

    //Atributos da classe Mercadoria/Valores
    $mercadoria->setId($_REQUEST['id']);
    $mercadoria->getObjCarga()->setCodCarga($_REQUEST['codCarga']);
    $mercadoria->setDescricaoMercadoria($_REQUEST['descricao']);
    $mercadoria->setPeso($_REQUEST['pesoMercadoria']);
    $mercadoria->setValorMercadoria($_REQUEST['valorMercadoria']);
    $mercadoria->setQuantidade($_REQUEST['quantidade']);

    if (mercadoriaSql::alterar($mercadoria)) {
        $resultado[] = array(
            'oka' => 'oks',
        );
    }

    echo(json_encode($resultado));
}


if ($_GET["editSave"] == "deletarMercadoria") {
    $mercadoria = new Mercadoria();

    $mercadoria->setId($_REQUEST['id']);

    if (mercadoriaSql::remover($mercadoria)) {
        $resultado[] = array(
            'ok' => 'ok',
        );
    }
    echo( json_encode($resultado) );
}


if ($_GET["editSave"] == "carregarMercadoria") {

    $listaMercadoria = mercadoriaSql::carregarLista();

    for ($i = 0; $i < count($listaMercadoria); $i++) {
        $resultado[] = array(
            'id' => $listaMercadoria[$i]->getId(),
            'codCarga' => $listaMercadoria[$i]->getObjCarga()->getCodCarga(),
            'descricao' => $listaMercadoria[$i]->getDescricaoMercadoria(),
            'pesoMercadoria' => $listaMercadoria[$i]->getPeso(),
            'valorMercadoria' => $listaMercadoria[$i]->getValorMercadoria(),
            'quantidade' => $listaMercadoria[$i]->getQuantidade()
        );
    }

    echo (json_encode($resultado));

    return $resultado;
}


//////////////////////////////////////////////////////////////////////////////////////////
if ($_GET["editSave"] == "carregarMercadoriaColeta") {

    //$codigoCarga = $_REQUEST['codigoCarga'];
    //echo($_REQUEST['codigoCarga']);
    $mercadoria = new Mercadoria();
    $mercadoria->setCodCarga($_REQUEST['codigoCarga']);

    $listaMercadoria = mercadoriaSql::carregarListaColeta($mercadoria);

    for ($i = 0; $i < count($listaMercadoria); $i++) {
        $resultado[] = array(
            'id' => $listaMercadoria[$i]->getId(),
            'codCarga' => $listaMercadoria[$i]->getCodCarga(),
            'descricao' => $listaMercadoria[$i]->getDescricaoMercadoria(),
            'pesoMercadoria' => $listaMercadoria[$i]->getPeso(),
            'valorMercadoria' => $listaMercadoria[$i]->getValorMercadoria(),
            'quantidade' => $listaMercadoria[$i]->getQuantidade(),
/*
            'numPedido' => $listaMercadoria[$i]->getNumPedido(),

            'nomeCompleto' => $listaMercadoria[$i]->getNomeCompleto(),
            'telefone' => $listaMercadoria[$i]->getTelefone(),
            'email' => $listaMercadoria[$i]->getEmail(),

            'logradouro' => $listaMercadoria[$i]->getLogradouro(),
            'bairro' => $listaMercadoria[$i]->getBairro(),
            'numero' => $listaMercadoria[$i]->getNumero(),
            'cep' => $listaMercadoria[$i]->getCep(),
            'estado' => $listaMercadoria[$i]->getEstado(),
            'estado' => $listaMercadoria[$i]->getCidade()*/
        );
    }

    echo (json_encode($resultado));
    return $resultado;
}

/*if ($_GET["editSave"] == "alterarMercadoriaColeta") {
    $mercadoria = new Mercadoria();

    //Atributos da classe Mercadoria/Valores
    $mercadoria->setId($_REQUEST['id']);
    //$mercadoria->setCodCarga($_REQUEST['codCarga']);
    //$mercadoria->setDescricaoMercadoria($_REQUEST['descricao']);
    //$mercadoria->setPeso($_REQUEST['pesoMercadoria']);
    //$mercadoria->setValorMercadoria($_REQUEST['valorMercadoria']);
    //$mercadoria->setQuantidade($_REQUEST['quantidade']);

    $mercadoria->setNumPedido($_REQUEST['numPedido']);

    $mercadoria->setNomeCompleto($_REQUEST['nomeCompleto']);
    $mercadoria->setTelefone($_REQUEST['telefone']);
    $mercadoria->setEmail($_REQUEST['email']);

    $mercadoria->setLogradouro($_REQUEST['logradouro']);
    $mercadoria->setBairro($_REQUEST['bairro']);
    $mercadoria->setNumero($_REQUEST['numero']);
    $mercadoria->setCep($_REQUEST['cep']);
    $mercadoria->setEstado($_REQUEST['estado']);
    $mercadoria->setCidade($_REQUEST['estado']);

    if (mercadoriaSql::alterarColeta($mercadoria)) {
        $resultado[] = array(
            'oka' => 'oks',
        );
    }

    echo(json_encode($resultado));
}*/

?>