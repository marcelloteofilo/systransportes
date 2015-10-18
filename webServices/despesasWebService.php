<?php
	require_once("../modelo/despesas/despesasSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);


	if ($_GET["editSave"] == "incluirDespesas"){			
		
		$despesas = new despesas();	

		$despesas->setDescricao($descricao);
		$despesas->setValor($valor); 
		$despesas->setData($data);
		
		if (DespesasSql::adicionar($despesas)){
			echo json_encode(array('success'=>true));		
		}	
		
		//echo(json_encode($resultado ));			
	}
	
	if ($_GET["editSave"] == "alterarDespesas"){	
		
		$despesas = new despesas();	

		$despesas->setId($_REQUEST['id']); 
		$despesas->setDescricao($_REQUEST['descricao']); 
		$despesas->setValor($_REQUEST['valor']); 
		$despesas->setData($_REQUEST['data']); 			
		
		if (DespesasSql::alterar($despesas)){
			echo json_encode(array('success'=>true));		
		}	
		
		//echo(json_encode($resultado ));						
	}	

	
	if ($_GET["editSave"] == "deletarDespesas"){	
		$despesas = new despesas();	

		$despesas->setId($_REQUEST['id']);  

		if (DespesasSql::remover($despesas)){
			echo json_encode(array('success'=>true));		
		}			
		//echo( json_encode( $resultado ) );				
	}

	if ($_GET["editSave"] == "carregarDespesas") {			
			
			$despesas = new despesas();	

			$listaDespesas = DespesasSql::carregarLista($despesas);
			for ($i=0; $i<count($listaDespesas); $i++ ){											
				$resultado[] = array(				
					'id'	=>  $listaDespesas[$i]->getId(),					
					'descricao'	=>   $listaDespesas[$i]->getDescricao(),				
					'valor'	=>  $listaDespesas[$i]->getValor(),				
					'data'	=>   $listaDespesas[$i]->getData()				
				);
			}
			echo( json_encode( $resultado ) );	
			return $resultado;
	}



	

?>