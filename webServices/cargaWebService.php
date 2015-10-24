<?php
	require_once("../modelo/carga/cargaSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);


	/*if ($_GET["editSave"] == "incluirVeiculo"){			
		//Classe de Usuário
		$veiculo = new veiculo();	

		//Atributos da classe Usuário/Valores 
		$veiculo->setPlaca($_REQUEST['placa']); 
		$veiculo->setCapacidadeKg($_REQUEST['capacidadeKg']); 
		$veiculo->setCapacidadeM3($_REQUEST['capacidadeM3']); 
		$veiculo->setAno($_REQUEST['ano']);
		$veiculo->setTipo($_REQUEST['tipo']);
		$veiculo->setUf($_REQUEST['uf']); 
		$veiculo->setCidade($_REQUEST['cidade']);  				
		
		if (VeiculoSql::adicionar($veiculo)){
			echo json_encode(array('success'=>true));
		
		}	
		
		//echo(json_encode($resultado ));			
	}*/
	
	if ($_GET["editSave"] == "alterarCargaCliente"){	
		$carga = new carga();	

		//Atributos da classe Usuário/Valores 
		$carga->setCodCarga($_REQUEST['codCarga']); 
		$carga->setStatusCarga($_REQUEST['statusCarga']);
		
		if (cargaSql::alterarCargaCliente($carga)){
			echo json_encode(array('success'=>true));
		}	
		
		//echo(json_encode($resultado ));						
	}	

	
	if ($_GET["editSave"] == "carregarTodos") {

		$carga = new Carga();

		$listaCarga = cargaSql::carregarLista($carga);
		
		for ($i=0; $i<count($listaCarga); $i++ ){											
			$resultado[] = array(
			    'codCarga'	=>  $listaCarga[$i]->getCodCarga(),					

				'altura'	=>  $listaCarga[$i]->getAltura(),					
				'largura'	=>   $listaCarga[$i]->getLargura(),				
				'peso'	=>  $listaCarga[$i]->getPeso(),				
				'comprimento'	=>   $listaCarga[$i]->getComprimento(),				
				'quantidade'	=>  $listaCarga[$i]->getQuantidade(),
				'valor'	=>  $listaCarga[$i]->getValor(),

				'telefone'	=>  $listaCarga[$i]->getTelefone(),
				'logradouro'	=>  $listaCarga[$i]->getLogradouro(),
				'bairro'	=>  $listaCarga[$i]->getBairro(),
				'uf'	=>  $listaCarga[$i]->getUf(),
				'cidade'	=>  $listaCarga[$i]->getCidade(),
				'numero'	=>  $listaCarga[$i]->getNumero(),
				'observacao'	=>  $listaCarga[$i]->getObservacao(),
				
				'naturezaCarga'	=>  $listaCarga[$i]->getNaturezaCarga(),
				'dataPedido'	=>  $listaCarga[$i]->getDataPedido(),
				'distancia'	=>  $listaCarga[$i]->getDistancia(),
				'frete'	=>  $listaCarga[$i]->getFrete(),
				'prazo'	=>  $listaCarga[$i]->getPrazo(),
				
				'coletada'	=>  $listaCarga[$i]->getColetada(),
				'statusCarga'	=>  $listaCarga[$i]->getStatusCarga(),					
			);
		}
			var_dump($resultado);
		    //die;

		echo( json_encode( $resultado ) );	
		return $resultado;	
	}

	

?>