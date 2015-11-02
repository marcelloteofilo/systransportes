﻿<?php
    require_once("../../modelo/carga/cargaSql.php");
    require_once("../../modelo/mercadoria/mercadoriaSql.php");
//require_once("/opt/lampp/htdocs/systransportes/modelo/carga/cargaSql.php");
//require_once("/opt/lampp/htdocs/systransportes/modelo/mercadoria/mercadoriaSql.php");
    session_start();

    extract($_REQUEST);
    extract($_SESSION);


    if($_GET["editSave"] == "incluir")
    {
       
        $objCarga = new Carga();
       
        $objCarga->setObjUsuario($_REQUEST['idUsuario']);
        $objCarga->setObjCidadeOrigem($_REQUEST['cidadeOrigem']);
        $objCarga->setObjCidadeDestino($_REQUEST['cidadeDestino']);
        $objCarga->setAltura($_REQUEST['altura']);
        $objCarga->setLargura($_REQUEST['largura']);
        $objCarga->setPeso($_REQUEST['peso']);
        $objCarga->setComprimento($_REQUEST['comprimento']);
        $objCarga->setQuantidade($_REQUEST['quantidade']);
        $objCarga->setValor($_REQUEST['valor']);
        $objCarga->setTelefone($_REQUEST['telefone']);
        $objCarga->setLogradouro($_REQUEST['logradouro']);
        $objCarga->setBairro($_REQUEST['bairro']);
        $objCarga->setUf($_REQUEST['estado']);
        $objCarga->setCidade($_REQUEST['cidade']);
        $objCarga->setNumero($_REQUEST['numero']);
        $objCarga->setObservacao($_REQUEST['observacao']);
        $objCarga->setNaturezaCarga($_REQUEST['naturezaCarga']);
        $objCarga->setDataPedido($_REQUEST['dataPedido']);
        $objCarga->setDistancia($_REQUEST['distancia']);
        $objCarga->setPrazo($_REQUEST['prazo']);
        $objCarga->setFrete($_REQUEST['frete']);

        $ultimoId = CargaSql::adicionar($objCarga);

        // inserindo mercadorias
        $qtdMercadorias = $_REQUEST['item'];

        for($i = 0; $i < count($qtdMercadorias); $i++)
        {

            $objMercadoria = new Mercadoria();

            $objMercadoria->setDescricaoMercadoria($_REQUEST['descricaoMercadoria'][$i]);
            $objMercadoria->setPeso($_REQUEST['pesoMercadoria'][$i]);
            $objMercadoria->setObjCarga($ultimoId);
            $objMercadoria->setValorMercadoria($_REQUEST['valorMercadoria'][$i]);
            $objMercadoria->setQuantidade($_REQUEST['quantidadeMercadoria'][$i]);

            MercadoriaSql::adicionar($objMercadoria);
        }

        echo json_encode(array('success' => true));
      
    }

    if($_GET["editSave"] == "aprovarCliente")
    {
        $carga = new Carga();

        //Atributos da classe Usuário/Valores
        $carga->setCodCarga($_REQUEST['codCarga']);
        $carga->setStatusCarga($_REQUEST['statusCarga']);
        $carga->setColetada('Aprovado');

        if(cargaSql::alterarCargaCliente($carga))
        {
            echo json_encode(array('success' => true));
        }

        //echo(json_encode($resultado ));
    }

    if($_GET["editSave"] == "aprovarAtendente")
    {
        $carga = new Carga();

        //Atributos da classe Usuário/Valores
        $carga->setCodCarga($_REQUEST['codCarga']);
        $carga->setCotado($_REQUEST['cotado']);
        $carga->setDistancia($_REQUEST['distancia']);
        $carga->setFrete($_REQUEST['frete']);
        $carga->setPrazo($_REQUEST['prazo']);

        if(cargaSql::alterarCargaAtendente($carga))
        {
            echo json_encode(array('success' => true));
        }

        //echo(json_encode($resultado ));
    }


    if($_GET["editSave"] == "carregarTodos")
    {

        $carga = new Carga();

        $listaCarga = cargaSql::carregarLista($carga);

        for($i = 0; $i < count($listaCarga); $i++)
        {
            $resultado[] = array(
                'codCarga' => $listaCarga[$i]->getCodCarga(),
                'origem' => $listaCarga[$i]->getObjCidadeOrigem(),
                'destino' => $listaCarga[$i]->getObjCidadeDestino(),
                'pessoaFisica' => $listaCarga[$i]->getPessoaFisicaNome(),
                'pessoaJuridica' => $listaCarga[$i]->getPessoaJuridicaNome(),
                'altura' => $listaCarga[$i]->getAltura(),
                'largura' => $listaCarga[$i]->getLargura(),
                'peso' => $listaCarga[$i]->getPeso(),
                'comprimento' => $listaCarga[$i]->getComprimento(),
                'quantidade' => $listaCarga[$i]->getQuantidade(),
                'valor' => $listaCarga[$i]->getValor(),
                'telefone' => $listaCarga[$i]->getTelefone(),
                'logradouro' => $listaCarga[$i]->getLogradouro(),
                'bairro' => $listaCarga[$i]->getBairro(),
                'uf' => $listaCarga[$i]->getUf(),
                'cidade' => $listaCarga[$i]->getCidade(),
                'numero' => $listaCarga[$i]->getNumero(),
                'observacao' => $listaCarga[$i]->getObservacao(),
                'naturezaCarga' => $listaCarga[$i]->getNaturezaCarga(),
                'dataPedido' => $listaCarga[$i]->getDataPedido(),
                'distancia' => $listaCarga[$i]->getDistancia(),
                'frete' => $listaCarga[$i]->getFrete(),
                'prazo' => $listaCarga[$i]->getPrazo(),
                'coletada' => $listaCarga[$i]->getColetada(),
                'statusCarga' => $listaCarga[$i]->getStatusCarga(),
                'cotado' => $listaCarga[$i]->getCotado(),
            );
        }
        //var_dump($resultado);
        //die;

        echo(json_encode($resultado));
        return $resultado;
    }

    if($_GET["editSave"] == "carregarAprovados")
    {

        $carga = new Carga();

        $listaCarga = cargaSql::carregarListaAprovados($carga);

        for($i = 0; $i < count($listaCarga); $i++)
        {
            $resultado[] = array(
                'codCarga' => $listaCarga[$i]->getCodCarga(),
                'origem' => $listaCarga[$i]->getObjCidadeOrigem(),
                'destino' => $listaCarga[$i]->getObjCidadeDestino(),
                'pessoaFisica' => $listaCarga[$i]->getPessoaFisicaNome(),
                'pessoaJuridica' => $listaCarga[$i]->getPessoaJuridicaNome(),
                'altura' => $listaCarga[$i]->getAltura(),
                'largura' => $listaCarga[$i]->getLargura(),
                'peso' => $listaCarga[$i]->getPeso(),
                'comprimento' => $listaCarga[$i]->getComprimento(),
                'quantidade' => $listaCarga[$i]->getQuantidade(),
                'valor' => $listaCarga[$i]->getValor(),
                'telefone' => $listaCarga[$i]->getTelefone(),
                'logradouro' => $listaCarga[$i]->getLogradouro(),
                'bairro' => $listaCarga[$i]->getBairro(),
                'uf' => $listaCarga[$i]->getUf(),
                'cidade' => $listaCarga[$i]->getCidade(),
                'numero' => $listaCarga[$i]->getNumero(),
                'observacao' => $listaCarga[$i]->getObservacao(),
                'naturezaCarga' => $listaCarga[$i]->getNaturezaCarga(),
                'dataPedido' => $listaCarga[$i]->getDataPedido(),
                'distancia' => $listaCarga[$i]->getDistancia(),
                'frete' => $listaCarga[$i]->getFrete(),
                'prazo' => $listaCarga[$i]->getPrazo(),
                'coletada' => $listaCarga[$i]->getColetada(),
                'statusCarga' => $listaCarga[$i]->getStatusCarga(),
                'cotado' => $listaCarga[$i]->getCotado(),
            );
        }
        //var_dump($resultado);
        //die;

        echo(json_encode($resultado));
        return $resultado;
    }

    if($_GET["editSave"] == "carregarAtendimento")
    {

        $carga = new Carga();

        $listaCarga = cargaSql::carregarListaAtendimento($carga);

        for($i = 0; $i < count($listaCarga); $i++)
        {
            $resultado[] = array(
                'codCarga' => $listaCarga[$i]->getCodCarga(),
                'origem' => $listaCarga[$i]->getObjCidadeOrigem(),
                'destino' => $listaCarga[$i]->getObjCidadeDestino(),
                'pessoaFisica' => $listaCarga[$i]->getPessoaFisicaNome(),
                'pessoaJuridica' => $listaCarga[$i]->getPessoaJuridicaNome(),
                'altura' => $listaCarga[$i]->getAltura(),
                'largura' => $listaCarga[$i]->getLargura(),
                'peso' => $listaCarga[$i]->getPeso(),
                'comprimento' => $listaCarga[$i]->getComprimento(),
                'quantidade' => $listaCarga[$i]->getQuantidade(),
                'valor' => $listaCarga[$i]->getValor(),
                'telefone' => $listaCarga[$i]->getTelefone(),
                'logradouro' => $listaCarga[$i]->getLogradouro(),
                'bairro' => $listaCarga[$i]->getBairro(),
                'uf' => $listaCarga[$i]->getUf(),
                'cidade' => $listaCarga[$i]->getCidade(),
                'numero' => $listaCarga[$i]->getNumero(),
                'observacao' => $listaCarga[$i]->getObservacao(),
                'naturezaCarga' => $listaCarga[$i]->getNaturezaCarga(),
                'dataPedido' => $listaCarga[$i]->getDataPedido(),
                'distancia' => $listaCarga[$i]->getDistancia(),
                'frete' => $listaCarga[$i]->getFrete(),
                'prazo' => $listaCarga[$i]->getPrazo(),
                'coletada' => $listaCarga[$i]->getColetada(),
                'statusCarga' => $listaCarga[$i]->getStatusCarga(),
                'cotado' => $listaCarga[$i]->getCotado(),
            );
        }
        //var_dump($resultado);
        //die;

        echo(json_encode($resultado));
        return $resultado;
    }

    if($_GET["editSave"] == "carregarConcluidos")
    {

        $carga = new Carga();

        $listaCarga = cargaSql::carregarListaConcluidos($carga);

        for($i = 0; $i < count($listaCarga); $i++)
        {
            $resultado[] = array(
                'codCarga' => $listaCarga[$i]->getCodCarga(),
                'origem' => $listaCarga[$i]->getObjCidadeOrigem(),
                'destino' => $listaCarga[$i]->getObjCidadeDestino(),
                'pessoaFisica' => $listaCarga[$i]->getPessoaFisicaNome(),
                'pessoaJuridica' => $listaCarga[$i]->getPessoaJuridicaNome(),
                'altura' => $listaCarga[$i]->getAltura(),
                'largura' => $listaCarga[$i]->getLargura(),
                'peso' => $listaCarga[$i]->getPeso(),
                'comprimento' => $listaCarga[$i]->getComprimento(),
                'quantidade' => $listaCarga[$i]->getQuantidade(),
                'valor' => $listaCarga[$i]->getValor(),
                'telefone' => $listaCarga[$i]->getTelefone(),
                'logradouro' => $listaCarga[$i]->getLogradouro(),
                'bairro' => $listaCarga[$i]->getBairro(),
                'uf' => $listaCarga[$i]->getUf(),
                'cidade' => $listaCarga[$i]->getCidade(),
                'numero' => $listaCarga[$i]->getNumero(),
                'observacao' => $listaCarga[$i]->getObservacao(),
                'naturezaCarga' => $listaCarga[$i]->getNaturezaCarga(),
                'dataPedido' => $listaCarga[$i]->getDataPedido(),
                'distancia' => $listaCarga[$i]->getDistancia(),
                'frete' => $listaCarga[$i]->getFrete(),
                'prazo' => $listaCarga[$i]->getPrazo(),
                'coletada' => $listaCarga[$i]->getColetada(),
                'statusCarga' => $listaCarga[$i]->getStatusCarga(),
                'cotado' => $listaCarga[$i]->getCotado(),
            );
        }
        //var_dump($resultado);
        //die;

        echo(json_encode($resultado));
        return $resultado;
    }
?>