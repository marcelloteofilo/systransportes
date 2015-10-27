<?php
  require_once("/../banco.php");  
  require_once("frete.php");  

 class FreteSql {  
  



    /*public static function alterarFrete(Frete $frete) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $codCarga = mysql_real_escape_string($carga->getCodCarga(), $conexao); 
	  $statusCarga = mysql_real_escape_string($carga->getStatusCarga(), $conexao);
	  $frete = mysql_real_escape_string($carga->getFrete(), $conexao);
	  $distancia = mysql_real_escape_string($carga->getDistancia(), $conexao);
	  $prazo = mysql_real_escape_string($carga->getPrazo(), $conexao);
   
  	  //Update para a tabela de Usuários do banco de dados
	  $sql = "update cargas set statusCarga='$statusCarga',prazo='$prazo',distancia=$distancia,frete=$frete where codCarga=$codCarga";
      echo($sql);
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }*/

	
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
				$frete->setOrigem($row["codigoOrigem"]);
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
