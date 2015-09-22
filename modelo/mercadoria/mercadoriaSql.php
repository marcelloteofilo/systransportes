<?php
	require_once ("/../banco.php");
	require_once ("mercadoria.php");



	class MercadoriaSql {
			//Método responsável em adicionar um determinado veículo
		public static function adicionar(Mercadoria $mercadoria) {

			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributos da classe Mercadoria sendo definidas em uma variável, obtidas em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco

			$idCotacao		= mysql_real_escape_string($mercadoria-> getObjCotacao() -> getId(), $conexao);
			$descricao 		= mysql_real_escape_string($mercadoria->getDescricaoMercadoria(), $conexao);
			$peso 			= mysql_real_escape_string($mercadoria->getPeso(), $conexao);

			//Inserção na tabela de Mercadoria relacionada ao banco de dados systransporte
		    $sql    = "insert into mercadorias (idCotacoes, descricao, peso) values ('$idCotacao', '$descricao', '$peso')";
		    $resultado = @mysql_query($sql, $conexao);
		    return ($resultado === true);
		}

		//Método responsável em alterar um determinado veículo
		public static function alterar(Mercadoria $mercadoria) {
			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributos da classe Mercadoria sendo definidas em uma variável, obtidas em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco
			$id 				= mysql_real_escape_string($mercadoria->getId(), $conexao);
			$idCotacao			= mysql_real_escape_string($mercadoria-> getObjCotacao() -> getId(), $conexao);
			$descricaoMercadoria 		= mysql_real_escape_string($mercadoria->getDescricaoMercadoria(), $conexao);
			$peso 				= mysql_real_escape_string($mercadoria->getPeso(), $conexao);


			///Alteração na tabela de Mercadoria relacionada ao banco de dados systransporte
			$sql  = "update mercadorias set idCotacoes='$idCotacao', descricao='$descricaoMercadoria', peso = '$peso' where id = $id ";
		    $resultado = @mysql_query($sql, $conexao);

		    return ($resultado === true);
		}

		//Método responsável em remover um determinado veículo
		public static function remover(Mercadoria $mercadoria) {
			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributo da classe Mercadoria sendo definida em uma variável, obtida em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco de dados
			$id 				= mysql_real_escape_string($mercadoria->getId(), $conexao);

			//Remoção na tabela de Mercadoria relacionada ao banco de dados systransporte
			$sql       			= "delete from mercadorias where id = '$id' ";
		    $resultado = @mysql_query($sql, $conexao);

		    return ($resultado === true);
		}

		public static function carregarLista()
		{
		      //Conexão com o banco
		      $conexao = Conexao::getInstance()->getConexao();

			$rs = mysql_query('select * from mercadorias');
			$resultado = array();
			while($row = mysql_fetch_object($rs))
			{
				array_push($resultado, $row);
			}
			echo json_encode($resultado);
        }
    }


?>