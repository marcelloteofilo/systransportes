<?php
	require_once("/../modelo/coleta/coletaSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	

	if ($_GET["editSave"] == "carregarColeta") {

		$coleta = new Coleta();

		$listaColeta = coletaSql::carregarLista($coleta);
		
		for ($i=0; $i<count($listaColeta); $i++ ){											
			$resultado[] = array(
			    'codColeta'	=>  $listaColeta[$i]->getCodColeta(),					
				'codCarga'	=>  $listaColeta[$i]->getCodCarga(),					
				'codMotorista'	=>   $listaColeta[$i]->getCodMotorista(),				
				'codVeiculo'	=>  $listaColeta[$i]->getCodVeiculo(),				
				'data'	=>   $listaColeta[$i]->getData(),				
				'hora'	=>  $listaColeta[$i]->getHora(),
				'coletada'	=>  $listaColeta[$i]->getColetada(),
				'telefone'	=>  $listaColeta[$i]->getTelefone(),					
				'logradouro'	=>  $listaColeta[$i]->getLogradouro(),					
				'bairro'	=>  $listaColeta[$i]->getBairro(),					
				'numero'	=>  $listaColeta[$i]->getNumero(),					
				'estado'	=>  $listaColeta[$i]->getEstado(),					
				'cidade'	=>  $listaColeta[$i]->getCidade(),	
				'observacao'	=>  $listaColeta[$i]->getObservacao(),														
			);
		}
			//var_dump($resultado);
		//die;
		echo( json_encode( $resultado ) );	
		return $resultado;	
	}

	if ($_GET["editSave"] == "carregarColetaAprovados") {

		$coleta = new Coleta();

		$listaColeta = coletaSql::carregarListaAprovados($coleta);
		
		for ($i=0; $i<count($listaColeta); $i++ ){											
			$resultado[] = array(
			    'codColeta'	=>  $listaColeta[$i]->getCodColeta(),					
				'codCarga'	=>  $listaColeta[$i]->getCodCarga(),					
				'codMotorista'	=>   $listaColeta[$i]->getCodMotorista(),				
				'codVeiculo'	=>  $listaColeta[$i]->getCodVeiculo(),				
				'data'	=>   $listaColeta[$i]->getData(),				
				'hora'	=>  $listaColeta[$i]->getHora(),
				'coletada'	=>  $listaColeta[$i]->getColetada(),
				'telefone'	=>  $listaColeta[$i]->getTelefone(),					
				'logradouro'	=>  $listaColeta[$i]->getLogradouro(),					
				'bairro'	=>  $listaColeta[$i]->getBairro(),					
				'numero'	=>  $listaColeta[$i]->getNumero(),					
				'estado'	=>  $listaColeta[$i]->getEstado(),					
				'cidade'	=>  $listaColeta[$i]->getCidade(),	
				'observacao'	=>  $listaColeta[$i]->getObservacao(),														
			);
		}
			//var_dump($resultado);
		//die;
		echo( json_encode( $resultado ) );	
		return $resultado;	
	}			
	if ($_GET["editSave"] == "carregarColetasColetadas") {

		$coleta = new Coleta();

		$listaColeta = coletaSql::carregarListaColetadas($coleta);
		
		for ($i=0; $i<count($listaColeta); $i++ ){											
			$resultado[] = array(
			    'codColeta'	=>  $listaColeta[$i]->getCodColeta(),					
				'codCarga'	=>  $listaColeta[$i]->getCodCarga(),					
				'codMotorista'	=>   $listaColeta[$i]->getCodMotorista(),				
				'codVeiculo'	=>  $listaColeta[$i]->getCodVeiculo(),				
				'data'	=>   $listaColeta[$i]->getData(),				
				'hora'	=>  $listaColeta[$i]->getHora(),
				'coletada'	=>  $listaColeta[$i]->getColetada(),
				'telefone'	=>  $listaColeta[$i]->getTelefone(),					
				'logradouro'	=>  $listaColeta[$i]->getLogradouro(),					
				'bairro'	=>  $listaColeta[$i]->getBairro(),					
				'numero'	=>  $listaColeta[$i]->getNumero(),					
				'estado'	=>  $listaColeta[$i]->getEstado(),					
				'cidade'	=>  $listaColeta[$i]->getCidade(),	
				'observacao'	=>  $listaColeta[$i]->getObservacao(),														
			);
		}
			//var_dump($resultado);
		//die;
		echo( json_encode( $resultado ) );	
		return $resultado;	
	}	
	






?>
	
	