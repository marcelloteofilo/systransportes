<?php
	require_once("/../modelo/coleta/coletaSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	

	/*if ($_GET["editSave"] == "alterarColeta"){	
		$coleta = new Coleta();	

		//Atributos da classe Usuário/Valores 
		$coleta->setIdColeta($_REQUEST['id']); 
		$coleta->setCodCarga($_REQUEST['codCarga']); 
		$coleta->setCodMotorista($_REQUEST['codMotorista']); 
		$coleta->setCodVeiculo($_REQUEST['codVeiculo']); 
		$coleta->setData($_REQUEST['data']);
		$coleta->setHora($_REQUEST['hora']);
		$coleta->setStatusCarga($_REQUEST['statusCarga']); 
		$coleta->setTelefone($_REQUEST['telefone']);  				
		$coleta->setlogradouro($_REQUEST['logradouro']);  				
		$coleta->setBairro($_REQUEST['bairro']);  				
		$coleta->setNumero($_REQUEST['numero']);  				
		$coleta->setEstado($_REQUEST['estado']);  				
		$coleta->setCidade($_REQUEST['cidade']);  				
		$coleta->setObservacao($_REQUEST['observacao']);  				

		
		if (ColetaSql::alterar($coleta)){
			echo json_encode(array('success'=>true));	
		}	
		
		//echo(json_encode($resultado ));						
	}*/

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

?>
	
	