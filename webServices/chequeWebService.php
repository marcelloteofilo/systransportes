<?php
	require_once("../modelo/cheque/chequeSql.php");
	session_start();

	extract ($_REQUEST);
	extract ($_SESSION);

	if ($_GET["editSave"] == "incluirCheque") {
		$cheque = new Cheque();

		$cheque->setParcela($_REQUEST['parcela']);
		$cheque->setNumero($_REQUEST['numero']);
		$cheque->setValor($_REQUEST['valor']);
		$cheque->setVencimento($_REQUEST['vencimento']);

		if (ChequeSql::adicionar($cheque)) {
			$resultado[] = array(
					'oka' => 'oks',
			);
		}
		echo(json_encode($resultado));
	}

	if ($_GET["editSave"] == "alterarCheque") {	
		$cheque = new Cheque();	
		
		$cheque->setId($_REQUEST['id']); 
		$cheque->setParcela($_REQUEST['parcela']);
		$cheque->setNumero($_REQUEST['numero']);
		$cheque->setValor($_REQUEST['valor']);
		$cheque->setVencimento($_REQUEST['vencimento']); 				
		
		if (ChequeSql::alterar($cheque)) {
			$resultado[] = array(				
				'oka'	=>  'oks',						
			);			
		}			
		echo(json_encode($resultado));						
	}	

	if ($_GET["editSave"] == "deletarCheque") {	
		$cheque = new Cheque();

		$cheque->setId($_REQUEST['id']);  

		if (ChequeSql::remover($cheque)) {
			$resultado[] = array(				
				'ok'	=>  'ok',						
			);			
		}			
		echo(json_encode($resultado));				
	}

	if ($_GET["editSave"] == "carregarCheque") {			
		
		$listaCheques = ChequeSql::carregarLista();

		for ($i=0; $i<count($listaCheques); $i++) {
			$resultado[] = array(				
				'id' => $listaCheques[$i]->getId(),	
				'parcela' => $listaCheques[$i]->getParcela(),
				'numero' => $listaCheques[$i]->getNumero(),
				'valor' => $listaCheques[$i]->getValor(),
				'vencimento' => $listaCheques[$i]->getVencimento(),					
			);
		}	
		echo(json_encode($resultado));		
	}

?>