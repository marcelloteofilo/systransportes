<?php
	require_once ("/../banco.php");
	require_once ("despesas.php");
	


	class DespesasSql {
			
		public static function adicionar(Despesas $despesas) {
		
			
			$conexao = Conexao::getInstance()->getConexao();

			$descricao 				= mysql_real_escape_string($despesas->getDescricao(), $conexao);
			$valor 		= mysql_real_escape_string($despesas->getValor(), $conexao);
			$data 		= mysql_real_escape_string($despesas->getData(), $conexao);

			$dataFormatada = explode("-", $data);
			$dataAmericana = $dataFormatada[2]."-".$dataFormatada[1]."-".$dataFormatada[0];

			
		    $sql    = "insert into despesas (descricao, valor, data) values ('$descricao',
								  $valor, '$dataAmericana')";		

		    $resultado = @mysql_query($sql, $conexao);
		    return ($resultado === true);
		}

		
		public static function alterar(Despesas $despesas) {
			
			$conexao = Conexao::getInstance()->getConexao();

			
			$id 				= mysql_real_escape_string($despesas->getId(), $conexao);
			$descricao 				= mysql_real_escape_string($despesas->getDescricao(), $conexao);
			$valor 		= mysql_real_escape_string($despesas->getValor(), $conexao);
			$data 		= mysql_real_escape_string($despesas->getData(), $conexao);

			$dataFormatada = explode("-", $data);
			$dataAmericana = $dataFormatada[2]."-".$dataFormatada[1]."-".$dataFormatada[0];
			
			
			$sql  = "update despesas set descricao='$descricao', valor=$valor, data='$dataAmericana' where id = $id ";			
		    $resultado = @mysql_query($sql, $conexao);

		    return ($resultado === true);
		}

		
		public static function remover(Despesas $despesas) {
		
			$conexao = Conexao::getInstance()->getConexao();

		
			$id 				= mysql_real_escape_string($despesas->getId(), $conexao);

		
			$sql       			= "delete from despesas where id = '$id' ";			
		    $resultado = @mysql_query($sql, $conexao);

		    return ($resultado === true);
		}

      	public static function carregarLista(){
      		$conexao = Conexao::getInstance()->getConexao();





      		$rs = mysql_query('select * from despesas');
      		$result = array();

      		while ($row = mysql_fetch_array($rs)) {
      			$objDespesas =  new Despesas();
      			$objDespesas->setId($row['id']);
      			$objDespesas->setDescricao($row['descricao']);
      			$objDespesas->setValor($row['valor']);

      			$dataFormatada = explode("-", $row['data']);
				$dataBrasileira = $dataFormatada[2]."-".$dataFormatada[1]."-".$dataFormatada[0];


      			$objDespesas->setData($dataBrasileira);
      			$result[] = $objDespesas;
      			
      		}

      		return $result;

      	}


    }
		
	
?>