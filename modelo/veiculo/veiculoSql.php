<?php
	require_once ("/../banco.php");
	require_once ("veiculo.php");
	


	class VeiculoSql {
			//Método responsável em adicionar um determinado veículo
		public static function adicionar(Veiculo $veiculo) {
		
			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributos da classe veiculo sendo definidas em uma variável, obtidas em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco
			$placa 				= mysql_real_escape_string($veiculo->getPlaca(), $conexao);
			$capacidadeKg 		= mysql_real_escape_string($veiculo->getCapacidadeKg(), $conexao);
			$capacidadeM3 		= mysql_real_escape_string($veiculo->getCapacidadeM3(), $conexao);
			$ano 				= mysql_real_escape_string($veiculo->getAno(), $conexao);
			$tipo 				= mysql_real_escape_string($veiculo->getTipo(), $conexao);

			//Inserção na tabela de veiculo relacionada ao banco de dados systransporte
		    $sql    = "insert into veiculos (placa, capacidadeKg, capacidadeM3, ano, tipo) values ('$placa',
								  '$capacidadeKg', '$capacidadeM3', '$ano', '$tipo')";			
		    $resultado = @mysql_query($sql, $conexao);
		    return ($resultado === true);
		}

		//Método responsável em alterar um determinado veículo
		public static function alterar(Veiculo $veiculo) {
			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributos da classe veiculo sendo definidas em uma variável, obtidas em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco	
			$id 				= mysql_real_escape_string($veiculo->getIdVeiculo(), $conexao);
			$placa 				= mysql_real_escape_string($veiculo->getPlaca(), $conexao);
			$capacidadeKg 		= mysql_real_escape_string($veiculo->getCapacidadeKg(), $conexao);
			$capacidadeM3 		= mysql_real_escape_string($veiculo->getCapacidadeM3(), $conexao);
			$ano 				= mysql_real_escape_string($veiculo->getAno(), $conexao);
			$tipo 				= mysql_real_escape_string($veiculo->getTipo(), $conexao);

			///Alteração na tabela de veiculo relacionada ao banco de dados systransporte
			$sql  = "update veiculos set placa='$placa', capacidadeKg='$capacidadeKg', capacidadeM3='$capacidadeM3',
								  ano='$ano', tipo='$tipo' where id = $id ";			
		    $resultado = @mysql_query($sql, $conexao);

		    return ($resultado === true);
		}

		//Método responsável em remover um determinado veículo
		public static function remover(Veiculo $veiculo) {
			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributo da classe veiculo sendo definida em uma variável, obtida em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco de dados
			$id 				= mysql_real_escape_string($veiculo->getIdVeiculo(), $conexao);

			//Remoção na tabela de veiculo relacionada ao banco de dados systransporte
			$sql       			= "delete from veiculos where id = '$id' ";			
		    $resultado = @mysql_query($sql, $conexao);

		    return ($resultado === true);
		}

		/*//Método responsável em pesquisar um determinado veículo
		public static function pesquisar(Veiculo $veiculo) {
			//Criando a conexão com o banco de dados
			$conexao 			= Conexao :: getInstance() -> getConexao();

			//Atributo da classe veiculo sendo definida em uma variável, obtida em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco de dados
			$placa 				= mysql_real_escape_string($veiculo->getPlaca(), $conexao);

			//Pesquisa na tabela de veiculo relacionada ao banco de dados systransporte
			$sql       			= "select * from veiculos where placa like '%".$placa."%'";			
			$resultado = @mysql_query($sql, $conexao);

			//Validação com o intúito de verificar se o veículo foi ou não pesquisado
			if ($resultado) {
				echo "O veículo pesquisado foi o de placa: " + $resultado;
			} else {
				echo "O veículo de placa " + $resultado + " não foi identificado";
			}
			
			//Responsável por fechar a conexão com o banco de dados
			mysql_close();
				
			//Retorno do método pesquisar
			return ($resultado === true);
		}*/

		public static function carregarLista() {
	      //Conexão com o banco
	      $conexao = Conexao::getInstance()->getConexao();     

			$rs = mysql_query('select * from veiculos');
			$result = array();
			while($row = mysql_fetch_object($rs)){
				array_push($result, $row);
			}
			echo json_encode($result);
        }
      


    }
		
	
?>