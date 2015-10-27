<?php
  require_once("/../banco.php");  
  require_once("frete.php");  

 class FreteSql {  
  



    public static function alterarFrete(Frete $frete) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $codFrete = mysql_real_escape_string($frete->getCodFrete(), $conexao); 
	  $codVeiculo = mysql_real_escape_string($frete->getCodVeiculo(), $conexao);
	  $codMotorista = mysql_real_escape_string($frete->getCodMotorista(), $conexao);
	  $origem = mysql_real_escape_string($frete->getOrigem(), $conexao);
	  $destino = mysql_real_escape_string($frete->getDestino(), $conexao);

	  $statusFrete = mysql_real_escape_string($frete->getStatusFrete(), $conexao);
	  $codTransp = mysql_real_escape_string($frete->getCodTransp(), $conexao);
   
  	  //Update para a tabela de Usuários do banco de dados
	  $sql = "update frete set statusCarga='$statusCarga',prazo='$prazo',distancia=$distancia,frete=$frete where codCarga=$codCarga";
      echo($sql);
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }

	
    public static function carregarLista(Frete $frete) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select ft.*,
cidadeOrigem.descricao as cidadeOrigem,cidadeOrigem.uf as ufOrigem, cidadeOrigem.codigo as codigoOrigem,
cidadeDestino.descricao as cidadeDestino,cidadeDestino.uf as ufDestino, cidadeDestino.codigo as codigoDestino,
usuarioMotorista.id as idMotorista,usuarioMotorista.nomeCompleto as nomeMotorista,
veiculo.id as idVeiculo,veiculo.placa as placaVeiculo
from frete as ft
INNER JOIN cidades as cidadeOrigem ON ft.origem = cidadeOrigem.codigo
INNER JOIN cidades as cidadeDestino ON ft.destino = cidadeDestino.codigo
INNER JOIN usuarios as usuarioMotorista ON ft.codMotorista = usuarioMotorista.id
INNER JOIN veiculos as veiculo ON ft.codVeiculo = veiculo.id;';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$frete = new Frete();
				$frete->setCodFrete($row["codFrete"]);

				$frete->setCodVeiculo($row["codVeiculo"]);
				$frete->setCodMotorista($row["codMotorista"]);
				$frete->setOrigem($row["ufOrigem"]);
				$frete->setDestino($row["codigoDestino"]);

				$frete->setStatusFrete($row["statusFrete"]);
				$frete->setCodTransp($row["codTransp"]);

				$retorno[] = $frete;
         }
        return ($retorno);
      } 
      else
        return null;
    }


  }
?>
