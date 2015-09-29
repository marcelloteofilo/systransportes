<?php
	require_once("../modelo/cte/cteSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	

	if ($_GET["editSave"] == "incluirCte") {			
		$cte = new Cte();	

		$cte->setId($id); 
		$cte->setCotacao($cotacao); 
		$cte->setManifesto($manifesto); 
		$cte->setFaturamento($faturamento); 
		$cte->setRemetente($remetente); 
		$cte->setDestinatario($destinatario); 
		$cte->setStatus($status); 
		$cte->setDataEntrega($dataEntrega); 
		$cte->setHoraEntrega($horaEntrega);			
		
		if (CteSql::adicionar($cte)) {
			$resultado[] = array(				
					'oka'	=>  'oks',						
			);			
		}			
		echo(json_encode($resultado ));	
	}


	if ($_GET["editSave"] == "alterarCte") {	
		$cte = new Cte();	

		$cte->setId($id); 
		$cte->setCotacao($cotacao); 
		$cte->setManifesto($manifesto); 
		$cte->setFaturamento($faturamento); 
		$cte->setRemetente($remetente); 
		$cte->setDestinatario($destinatario); 
		$cte->setStatus($status); 
		$cte->setDataEntrega($dataEntrega); 
		$cte->setHoraEntrega($horaEntrega);			

		if (CteSql::alterar($cte)) {
			$resultado[] = array(				
					'oka'	=>  'oks',						
			);			
		}
		echo(json_encode($resultado));	
	}


	if ($_GET["editSave"] == "deletarCte") {	
		$cte = new Cte();

		$cheque->setId($_REQUEST['id']);  

		if (ChequeSql::deletar($cte)) {
			$resultado[] = array(				
				'ok'	=>  'ok',						
			);			
		}			
		echo(json_encode($resultado));				
	}

	if ($_GET["editSave"] == "carregarCte") {			
		
		$listaCtes = CteSql::carregarLista();

		for ($i=0; $i<count($listaCheques); $i++) {
			$resultado[] = array(				
				'id' => $listaCtes[$i]->getId(),	
				'idCotacao' => $listaCtes[$i]->getCotacao(),
				'idManifesto' => $listaCtes[$i]->getManifesto(),
				'idFaturamento' => $listaCtes[$i]->getFaturamento(),
				'idRemetente' => $listaCtes[$i]->getRemetente(),
				'idDestinatario' => $listaCtes[$i]->getDestinatario(),
				'emissao' => $listaCtes[$i]->getEmissao(),
				'status' => $listaCtes[$i]->getStatus(),
				'dataEntrega' => $listaCtes[$i]->getDataEntrega(),	
				'HoraEntrega' => $listaCtes[$i]->getHoraEntrega(),				
			);
		}	
		echo(json_encode($resultado));		
	}

?>
	
	