<?php
    require_once("/../banco.php");  
	require_once("cheque.php");

	class ChequeSQL {

		//Método responsável em adicionar um determinado cheque
		public static function adicionar(Cheque $cheque) {

			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributos da classe cheque sendo definidas em uma variável, obtidas em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco
			$id = mysql_real_escape_string($cheque->getId(), $conexao);
			$parcela = mysql_real_escape_string($cheque->getParcela(), $conexao);
			$numero = mysql_real_escape_string($cheque->getNumero(), $conexao);
			$valor = mysql_real_escape_string($cheque->getValor(), $conexao);
			$vencimento = mysql_real_escape_string($cheque->getVencimento(), $conexao);

			//$dataFormatada = explode("-", $vencimento);
			//$novaData = $dataFormatada[2]."-".$dataFormatada[1]."-".$dataFormatada[0];

			//Inserção na tabela de cheque relacionada ao banco de dados systransporte
			$sql = "insert into cheques (parcela, numero, valor, vencimento) 
				values ('$parcela', '$numero', '$valor', '$vencimento')";

			echo($sql);
			$resultado =@mysql_query($sql, $conexao);

			return ($resultado === true); 
		}

		//Método responsável em alterar um determinado cheque
		public static function alterar(Cheque $cheque) {

			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributos da classe cheque sendo definidas em uma variável, obtidas em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco
			$id = mysql_real_escape_string($cheque->getId(), $conexao);
			$parcela = mysql_real_escape_string($cheque->getParcela(), $conexao);
			$numero = mysql_real_escape_string($cheque->getNumero(), $conexao);
			$valor = mysql_real_escape_string($cheque->getValor(), $conexao);
			$vencimento = mysql_real_escape_string($cheque->getVencimento(), $conexao);
			
			//$dataFormatada = explode("-", $vencimento);
			//$novaData = $dataFormatada[2]."-".$dataFormatada[1]."-".$dataFormatada[0];			

			///Alteração na tabela de cheque relacionada ao banco de dados systransporte
			$sql = "update cheques set parcela='$parcela', numero='$numero',
				 valor=$valor, vencimento='$vencimento' where id=$id";

			$resultado =@mysql_query($sql, $conexao);

			return ($resultado === true);
		}

		//Método responsável em remover um determinado cheque
		public static function remover(Cheque $cheque) {

			//Criando a conexão com o banco de dados
			 $conexao = Conexao::getInstance()->getConexao();

			 //Atributo da classe cheque sendo definidas em uma variável, obtidas em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco
			 $id = mysql_real_escape_string($cheque->getId(), $conexao);

			 //Remoção na tabela de cheque relacionada ao banco de dados systransporte
			 $sql = "delete from cheques where id = $id";

			 $resultado =@mysql_query($sql, $conexao);

			 return ($resultado === true);
		}

		//Método responsável em carregar a lista de um determinado cheque
		public static function carregarLista() {

			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//cerragr lista na tabela de cheque relacionada ao banco de dados systransporte
			$rs = mysql_query('select * from cheques');

			//Atribuição de um array a variável
			$result = array();

			//Retorna um objeto com propriedades que correspondem a linha			
			while($row = mysql_fetch_array($rs)) {

				$objCheque = new Cheque();
				$objCheque->setId($row['id']);
				$objCheque->setParcela($row['parcela']);
				$objCheque->setNumero($row['numero']);
				$objCheque->setValor($row['valor']);
				$objCheque->setVencimento($row['vencimento']);
				$result[] = $objCheque;
			}
			return $result;
		}
	}
?>