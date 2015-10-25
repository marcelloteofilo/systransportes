<?php
	require_once("/../modelo/coleta/coletaSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	

	if ($_GET["editSave"] == "alterarColeta"){	
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
			/*$resultado[] = array(				
				'oka'	=>  'oks',						
			);	*/		
		}	
		
		//echo(json_encode($resultado ));						
	}

	if ($_GET["editSave"] == "carregarColeta") {

		$coleta = new Coleta();

		$listaColeta = coletaSql::carregarLista($coleta);
		
		for ($i=0; $i<count($listaVeiculo); $i++ ){											
			$resultado[] = array(
			    'id'	=>  $listaColeta[$i]->getIdColeta(),					
				'codCarga'	=>  $listaColeta[$i]->getCodCarga(),					
				'codMotorista'	=>   $listaColeta[$i]->getCodMotorista(),				
				'codVeiculo'	=>  $listaColeta[$i]->getCodVeiculo(),				
				'data'	=>   $listaColeta[$i]->getData(),				
				'hora'	=>  $listaColeta[$i]->getHora(),
				'statusCarga'	=>  $listaColeta[$i]->getStatusCarga(),
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




















	/*
	$dataDia = date("Y-m-d");	 

	//CONSULTA COLETA
	if ($_GET["editSave"] == "incluirColeta"){	
		// MUDA O FORMATO DA DATA DE CADASTRO MYSQL		
		$dia = SUBSTR($dataAgendada, 0,2); 	   
		$mes = SUBSTR($dataAgendada, 3,2);  
		$ano = SUBSTR($dataAgendada, 6,4);      
		$dataFinal = ($ano.'-'.$mes.'-'.$dia);	 
		//
		$coleta = new Coleta();	
		$coleta->setEmissao($dataDia); 
		$coleta->getObjRemetente()->setId($idRemetente);
		$coleta->getObjDestinatario()->setId($idDestinatario);
		$coleta->getObjMotorista()->setId($idMotorista);
		$coleta->getObjCotacao()->setId($idCotacao);
		$coleta->getObjVeiculo()->setPlaca($placaVeiculo);
		$coleta->setDataAgendada($dataFinal); 
		$coleta->setHoraAgendada($horaAgendada); 	
		$coleta->setObs($obs); 
		$coleta->setStatus($status); 
		
		if (ColetaSql::adicionar($coleta)){
			$resultado[] = array(				
				'ok'	=>  'ok',						
			);		
			echo( json_encode( $resultado ) );							
		}			
	}
	*/
?>
	
	