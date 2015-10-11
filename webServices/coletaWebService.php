<?php
	require_once("/../modelo/coleta/coletaSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	
	
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
	
?>
	
	