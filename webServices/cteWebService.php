<?php

    define("BASEPATH", dirname(dirname(__FILE__)));
    
    require_once(BASEPATH."/funcoes.php");
    require_once(BASEPATH.MODELO."cte/cteSql.php");

//	require_once("../modelo/cte/cteSql.php");

    session_start();
    extract($_REQUEST);
    extract($_SESSION);


    if($_GET["editSave"] == "alterarCte")
    {
        $cte = new Cte();

        $cte->setNumeroCte($_REQUEST['numcte']);
        $cte->setCodigoRota($_REQUEST['codFrete']);
        $cte->setSituacao($_REQUEST['situacao']);
        $cte->setChaveAcesso($_REQUEST['chaveAcesso']);
        $cte->setStatusCte($_REQUEST['statuscte']);
        $cte->setEmissao($_REQUEST['emissao']);
        $cte->setChaveCgm($_REQUEST['chave_gcm']);


        if(CteSql::alterar($cte))
        {
            echo json_encode(array('success' => true));
        }
    }


    if($_GET["editSave"] == "carregarCte")
    {

        $cte = new Cte();

        $listaCtes = CteSql::carregarLista();

        for($i = 0; $i < count($listaCtes); $i++)
        {
            $resultado[] = array(
                'numcte' => $listaCtes[$i]->getNumeroCte(),
                'codCarga' => $listaCtes[$i]->getCodigoCarga(),
                'codFrete' => $listaCtes[$i]->getCodigoRota(),
                'numTransp' => $listaCtes[$i]->getNumTransp(),
                'situacao' => $listaCtes[$i]->getSituacao(),
                'chaveAcesso' => $listaCtes[$i]->getChaveAcesso(),
                'statuscte' => $listaCtes[$i]->getStatusCte(),
                'emissao' => $listaCtes[$i]->getEmissao(),
                'chave_gcm' => $listaCtes[$i]->getChaveCgm(),
                'cidadeOrigem' => $listaCtes[$i]->getOrigemCarga(),
                'cidadeDestino' => $listaCtes[$i]->getDestinoCarga(),
                'nomeCompleto' => $listaCtes[$i]->getNomeCompleto(),
                'razaoSocial' => $listaCtes[$i]->getRazaoSocial(),
                'telefone' => $listaCtes[$i]->getTelefone(),
                'email' => $listaCtes[$i]->getEmail(),
            );
        }
        echo(json_encode($resultado));
    }
?>

