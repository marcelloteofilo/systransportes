<?php
  require_once("banco.php");  
  require_once("coleta.php");  

  class ColetaSql {   
     




    public static function carregarLista(Coleta $coleta) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select * from coleta';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$carga = new Carga();
				$carga->setCodCarga($row["codCarga"]);

				$carga->setObjCidadeOrigem($row["origem"]);
				$carga->setObjCidadeDestino($row["destino"]);

				$carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
				$carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);

				$carga->setAltura($row["altura"]);
				$carga->setLargura($row["largura"]);
				$carga->setPeso($row["peso"]);
				$carga->setComprimento($row["comprimento"]);
				$carga->setQuantidade($row["quantidade"]);
				$carga->setValor($row["valor"]);

				$carga->setTelefone($row["telefone"]);
				$carga->setLogradouro($row["logradouro"]);
				$carga->setBairro($row["bairro"]);
				$carga->setUf($row["uf"]);
				$carga->setCidade($row["cidade"]);
				$carga->setNumero($row["numero"]);
				$carga->setObservacao($row["observacao"]);

				$carga->setNaturezaCarga($row["naturezaCarga"]);
				$carga->setDataPedido($row["dataPedido"]);
				$carga->setDistancia($row["distancia"]);
				$carga->setPrazo($row["prazo"]);
				$carga->setFrete($row["frete"]);

				$carga->setColetada($row["coletada"]);
				$carga->setStatusCarga($row["statusCarga"]);
				
				$retorno[] = $carga;
         }
        return ($retorno);
      } 
      else
        return null;
    }
  }
?>
