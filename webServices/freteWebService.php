<?php
	require_once("../modelo/frete/freteSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);


	
	if ($_GET["editSave"] == "alterarFrete"){	
		$frete = new Frete();	

		//Atributos da classe Usuário/Valores 
		$frete->setCodFrete($_REQUEST['codFrete']); 
		$frete->setOrigem($_REQUEST['ufOrigem']);
		$frete->setDestino($_REQUEST['ufDestino']);
		$frete->setCodMotorista($_REQUEST['motorista']);
		$frete->setCodVeiculo($_REQUEST['veiculo']);
		$frete->setStatusFrete($_REQUEST['statusFrete']);
		$frete->setCodTransp($_REQUEST['codTransp']);

		if (freteSql::alterarFrete($frete)){
			echo json_encode(array('success'=>true));
		}	
		
		//echo(json_encode($resultado ));						
	}
	
	if ($_GET["editSave"] == "carregarTodos") {

		$frete = new Frete();

		$listaFrete = freteSql::carregarLista($frete);
		
		for ($i=0; $i<count($listaFrete); $i++ ){											
			$resultado[] = array(
			    'codFrete'	=>  $listaFrete[$i]->getCodFrete(),

			    'ufOrigem'	=>  $listaFrete[$i]->getOrigem(),	
				'ufDestino'	=>  $listaFrete[$i]->getDestino(),		
				'motorista'	=>  $listaFrete[$i]->getCodMotorista(),	
				'veiculo'	=>  $listaFrete[$i]->getCodVeiculo(),					

				'statusFrete'	=>  $listaFrete[$i]->getStatusFrete(),					
				'codTransp'	=>   $listaFrete[$i]->getCodTransp(),								
			);
		}
			//var_dump($resultado);
		    //die;

		echo(json_encode($resultado));	
		return $resultado;	
	}
	

?>