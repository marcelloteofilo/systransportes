<?php
  require_once("banco.php");  
  require_once("coleta.php");  

  class ColetaSql {   
     public static function adicionar(Coleta $coleta) {
      $conexao = Conexao::getInstance()->getConexao();     
	  $emissao = mysql_real_escape_string($coleta->getEmissao(), $conexao);   
	  $idRemetente = mysql_real_escape_string($coleta->getObjRemetente()->getId(), $conexao);   
	  $idDestinatario = mysql_real_escape_string($coleta->getObjDestinatario()->getId(), $conexao);   
	  $idMotorista = mysql_real_escape_string($coleta->getObjMotorista()->getId(), $conexao);   
	  $idCotacao = mysql_real_escape_string($coleta->getObjCotacao()->getId(), $conexao);   
	  $placaVeiculo = mysql_real_escape_string($coleta->getObjVeiculo()->getPlaca(), $conexao);   
	  $dataAgendada = mysql_real_escape_string($coleta->getDataAgendada(), $conexao);   
	  $horaAgendada = mysql_real_escape_string($coleta->getHoraAgendada(), $conexao);   
	  $obs = mysql_real_escape_string($coleta->getObs(), $conexao);   	  
	  $status = mysql_real_escape_string($coleta->getStatus(), $conexao);   
	  	   
	  $sql = "insert into coleta (emissao, IdRemetente, idDestinatario, idMotorista, idCotacao, placaVeiculo, dataAgendada, horaAgendada, obs, status) values ('$emissao',$idRemetente, $idDestinatario, $idMotorista, $idCotacao, '$placaVeiculo', '$dataAgendada', '$horaAgendada', '$obs', $status)";	 	  	  
    
      $resultado = @mysql_query($sql, $conexao);
      return ($resultado === true);
    }
  }
?>
