<?php
	require_once("../modelo/mercadoria/mercadoriaSql.php");
	session_start();

	extract ($_REQUEST);
	extract ($_SESSION);


	if ($_GET["editSave"] == "incluirMercadoria"){
		//Classe de Mercadoria
		$mercadoria = new Mercadoria();

		//Atributos da classe Mercadoria/Valores
		$mercadoria -> getObjCotacao() -> setId($_REQUEST['idCotacoes']);
		$mercadoria -> setDescricaoMercadoria($_REQUEST['descricao']);
		$mercadoria -> setPeso($_REQUEST['peso']);

		if (mercadoriaSql::adicionar($mercadoria)){
			$resultado[] = array(
				'oka'	=>  'oks',
			);
		}

		echo(json_encode($resultado ));
	}

	if ($_GET["editSave"] == "alterarMercadoria"){
		$mercadoria = new Mercadoria();

		//Atributos da classe Mercadoria/Valores
		$mercadoria->setId($_REQUEST['id']);
		$mercadoria->getObjCotacao() -> setId($_REQUEST['idCotacoes']);
		$mercadoria->setDescricaoMercadoria($_REQUEST['descricao']);
		$mercadoria->setPeso($_REQUEST['peso']);

		if (mercadoriaSql::alterar($mercadoria)){
			$resultado[] = array(
				'oka'	=>  'oks',
			);
		}

		echo(json_encode($resultado ));
	}


	if ($_GET["editSave"] == "deletarMercadoria"){
		$mercadoria = new Mercadoria();

		$mercadoria->setId($_REQUEST['id']);

		if (mercadoriaSql::remover($mercadoria)){
			$resultado[] = array(
				'ok'	=>  'ok',
			);
		}
		echo( json_encode( $resultado ) );
	}


	if ($_GET["editSave"] == "carregarMercadoria")
	{

		if (mercadoriaSql::carregarLista())
		{
			$resultado[] = array(
				'oka'	=>  'oks',
			);
		}
	}
?>