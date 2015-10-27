<?php
  require_once("banco.php");  
  require_once("coleta.php");  

  class ColetaSql {   
     


    public static function carregarLista(Coleta $coleta) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select cl.*,
					idMotorista.id as idMotorista,nomeMotorista.nomeCompleto as nomeMotorista,
					idVeiculo.id as idVeiculo,placaVeiculo.placa as placaVeiculo,
					telefone.telefone as telefone,logradouro.logradouro as logradouro,bairro.bairro as bairro,uf.uf as uf,cidade.cidade as cidade,numero.numero as numero,observacao.observacao as observacao,coletada.coletada as coletada
						from coleta as cl
							INNER JOIN usuarios as nomeMotorista ON cl.codMotorista = nomeMotorista.id
							INNER JOIN usuarios as idMotorista ON cl.codMotorista = idMotorista.id
							INNER JOIN veiculos as placaVeiculo ON cl.codVeiculo = placaVeiculo.id
							INNER JOIN veiculos as idVeiculo ON cl.codVeiculo = idVeiculo.id
							INNER JOIN cargas as telefone ON cl.codCarga = telefone.codCarga
							INNER JOIN cargas as logradouro ON cl.codCarga = logradouro.codCarga
							INNER JOIN cargas as bairro ON cl.codCarga = bairro.codCarga
							INNER JOIN cargas as uf ON cl.codCarga = uf.codCarga
							INNER JOIN cargas as cidade ON cl.codCarga = cidade.codCarga
							INNER JOIN cargas as numero ON cl.codCarga = numero.codCarga
							INNER JOIN cargas as observacao ON cl.codCarga = observacao.codCarga
							INNER JOIN cargas as coletada ON cl.codCarga = coletada.codCarga';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$coleta = new Coleta();
				$coleta->setCodCarga($row["codCarga"]);

				//
				$coleta->setCodMotorista($row["nomeMotorista"]);
				$coleta->setCodVeiculo($row["placaVeiculo"]);

				//
				$coleta->setData($row["data"]);
				$coleta->setHora($row["hora"]);

				//
				$coleta->setColetada($row["coletada"]);
				$coleta->setTelefone($row["telefone"]);
				$coleta->setLogradouro($row["logradouro"]);
				$coleta->setBairro($row["bairro"]);
				$coleta->setNumero($row["numero"]);
				$coleta->setEstado($row["uf"]);
				$coleta->setCidade($row["cidade"]);
				$coleta->setObservacao($row["observacao"]);
			
				$retorno[] = $coleta;
         }
        return ($retorno);
      } 
      else
        return null;
    }

    public static function carregarListaAprovados(Coleta $coleta) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select cl.*,
					idMotorista.id as idMotorista,nomeMotorista.nomeCompleto as nomeMotorista,
					idVeiculo.id as idVeiculo,placaVeiculo.placa as placaVeiculo,
					telefone.telefone as telefone,logradouro.logradouro as logradouro,bairro.bairro as bairro,uf.uf as uf,cidade.cidade as cidade,numero.numero as numero,observacao.observacao as observacao,coletada.coletada as coletada
						from coleta as cl
							INNER JOIN usuarios as nomeMotorista ON cl.codMotorista = nomeMotorista.id
							INNER JOIN usuarios as idMotorista ON cl.codMotorista = idMotorista.id
							INNER JOIN veiculos as placaVeiculo ON cl.codVeiculo = placaVeiculo.id
							INNER JOIN veiculos as idVeiculo ON cl.codVeiculo = idVeiculo.id
							INNER JOIN cargas as telefone ON cl.codCarga = telefone.codCarga
							INNER JOIN cargas as logradouro ON cl.codCarga = logradouro.codCarga
							INNER JOIN cargas as bairro ON cl.codCarga = bairro.codCarga
							INNER JOIN cargas as uf ON cl.codCarga = uf.codCarga
							INNER JOIN cargas as cidade ON cl.codCarga = cidade.codCarga
							INNER JOIN cargas as numero ON cl.codCarga = numero.codCarga
							INNER JOIN cargas as observacao ON cl.codCarga = observacao.codCarga
							INNER JOIN cargas as coletada ON cl.codCarga = coletada.codCarga
							where coletada.coletada  = "Aprovado"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$coleta = new Coleta();
				$coleta->setCodCarga($row["codCarga"]);

				//
				$coleta->setCodMotorista($row["nomeMotorista"]);
				$coleta->setCodVeiculo($row["placaVeiculo"]);

				//
				$coleta->setData($row["data"]);
				$coleta->setHora($row["hora"]);

				//
				$coleta->setColetada($row["coletada"]);
				$coleta->setTelefone($row["telefone"]);
				$coleta->setLogradouro($row["logradouro"]);
				$coleta->setBairro($row["bairro"]);
				$coleta->setNumero($row["numero"]);
				$coleta->setEstado($row["uf"]);
				$coleta->setCidade($row["cidade"]);
				$coleta->setObservacao($row["observacao"]);
			
				$retorno[] = $coleta;
         }
        return ($retorno);
      } 
      else
        return null;
    }

    public static function carregarListaColetadas(Coleta $coleta) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select cl.*,
					idMotorista.id as idMotorista,nomeMotorista.nomeCompleto as nomeMotorista,
					idVeiculo.id as idVeiculo,placaVeiculo.placa as placaVeiculo,
					telefone.telefone as telefone,logradouro.logradouro as logradouro,bairro.bairro as
					 bairro,uf.uf as uf,cidade.cidade as cidade,numero.numero as numero,observacao.observacao as
					  observacao,coletada.coletada as coletada
						from coleta as cl
							INNER JOIN usuarios as nomeMotorista ON cl.codMotorista = nomeMotorista.id
							INNER JOIN usuarios as idMotorista ON cl.codMotorista = idMotorista.id
							INNER JOIN veiculos as placaVeiculo ON cl.codVeiculo = placaVeiculo.id
							INNER JOIN veiculos as idVeiculo ON cl.codVeiculo = idVeiculo.id
							INNER JOIN cargas as telefone ON cl.codCarga = telefone.codCarga
							INNER JOIN cargas as logradouro ON cl.codCarga = logradouro.codCarga
							INNER JOIN cargas as bairro ON cl.codCarga = bairro.codCarga
							INNER JOIN cargas as uf ON cl.codCarga = uf.codCarga
							INNER JOIN cargas as cidade ON cl.codCarga = cidade.codCarga
							INNER JOIN cargas as numero ON cl.codCarga = numero.codCarga
							INNER JOIN cargas as observacao ON cl.codCarga = observacao.codCarga
							INNER JOIN cargas as coletada ON cl.codCarga = coletada.codCarga
							where coletada.coletada  = "Coletado"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$coleta = new Coleta();
				$coleta->setCodCarga($row["codCarga"]);

				//
				$coleta->setCodMotorista($row["nomeMotorista"]);
				$coleta->setCodVeiculo($row["placaVeiculo"]);

				//
				$coleta->setData($row["data"]);
				$coleta->setHora($row["hora"]);

				//
				$coleta->setColetada($row["coletada"]);
				$coleta->setTelefone($row["telefone"]);
				$coleta->setLogradouro($row["logradouro"]);
				$coleta->setBairro($row["bairro"]);
				$coleta->setNumero($row["numero"]);
				$coleta->setEstado($row["uf"]);
				$coleta->setCidade($row["cidade"]);
				$coleta->setObservacao($row["observacao"]);
			
				$retorno[] = $coleta;
         }
        return ($retorno);
      } 
      else
        return null;
    }

  }
?>
