<?php
	require_once("../modelo/veiculo/veiculoSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);


	if ($_GET["editSave"] == "incluirVeiculo"){			
		//Classe de Usuário
		$veiculo = new veiculo();	

		//Atributos da classe Usuário/Valores 
		$veiculo->setPlaca($_REQUEST['placa']); 
		$veiculo->setCapacidadeKg($_REQUEST['capacidadeKg']); 
		$veiculo->setCapacidadeM3($_REQUEST['capacidadeM3']); 
		$veiculo->setAno($_REQUEST['ano']);
		$veiculo->setTipo($_REQUEST['tipo']); 				
		
		if (VeiculoSql::adicionar($veiculo)){
			$resultado[] = array(				
				'oka'	=>  'oks',						
			);			
		}	
		
		echo(json_encode($resultado ));			
	}
	
	if ($_GET["editSave"] == "alterarVeiculo"){	
		$veiculo = new veiculo();	

		//Atributos da classe Usuário/Valores 
		$veiculo->setIdVeiculo($_REQUEST['id']); 
		$veiculo->setPlaca($_REQUEST['placa']); 
		$veiculo->setCapacidadeKg($_REQUEST['capacidadeKg']); 
		$veiculo->setCapacidadeM3($_REQUEST['capacidadeM3']); 
		$veiculo->setAno($_REQUEST['ano']);
		$veiculo->setTipo($_REQUEST['tipo']); 				
		
		if (VeiculoSql::alterar($veiculo)){
			$resultado[] = array(				
				'oka'	=>  'oks',						
			);			
		}	
		
		echo(json_encode($resultado ));						
	}	

	
	if ($_GET["editSave"] == "deletarVeiculo"){	
		$veiculo = new veiculo();	

		$veiculo->setIdVeiculo($_REQUEST['id']);  

		if (VeiculoSql::remover($veiculo)){
			$resultado[] = array(				
				'ok'	=>  'ok',						
			);			
		}			
		echo( json_encode( $resultado ) );				
	}

	
	if ($_GET["editSave"] == "carregarVeiculo") {			
		
		if (VeiculoSql::carregarLista()){
			$resultado[] = array(				
				'oka'	=>  'oks',						
			);			
		}			
	}

	

?>