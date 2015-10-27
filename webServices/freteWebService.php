<?php
	require_once("../modelo/frete/freteSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);


	
	if ($_GET["editSave"] == "alterarFrete"){	
		$carga = new Carga();	

		//Atributos da classe Usuário/Valores 
		$carga->setCodCarga($_REQUEST['codCarga']); 
		$carga->setStatusCarga('Aprovado Cliente');
		$carga->setColetada('Aprovado');

		if (cargaSql::alterarCargaCliente($carga)){
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