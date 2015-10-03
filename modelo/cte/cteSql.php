<?php
  require_once("/../banco.php");  
  require_once("cte.php");  

 class CteSql {  
  
    public static function adicionar(Cte $cte) {
      
      	$conexao = Conexao::getInstance()->getConexao();    	  
	  
	  	$cotacao 				= mysql_real_escape_string($cte->getCotacao(), $conexao); 
	  	$manifesto 				= mysql_real_escape_string($cte->getManifesto(), $conexao);
	  	$faturamento 			= mysql_real_escape_string($cte->getFaturamento(), $conexao);
	  	$usuario 				= mysql_real_escape_string($cte->getUsuario(), $conexao); 
	  	$veiculo      			= mysql_real_escape_string($cte->getVeiculo(), $conexao);                
	  	$emissao 				= mysql_real_escape_string($cte->getEmissao(), $conexao);   
	  	$status 				= mysql_real_escape_string($cte->getStatus(), $conexao); 
	  	$dataEntrega 			= mysql_real_escape_string($cte->getDataEntrega(), $conexao); 
	  	$horaEntrega 			= mysql_real_escape_string($cte->getHoraEntrega(), $conexao);    
  
	  	$sql = "insert into cte (idCotacao, idManifesto, idFaturamento, idUsuario, idVeiculo, 
	  				emissao, status, dataEntrega, HoraEntrega) values ($cotacao, $manifesto, $faturamento,
	  					$usuario, $veiculo, '$emissao', '$status', '$dataEntrega','$horaEntrega')";	  

      	$resultado = @mysql_query($sql, $conexao);

      	return ($resultado === true);
    }

    public static function alterar(Cte $cte) {

      	$conexao = Conexao::getInstance()->getConexao();     
	  
	  	$id 					= mysql_real_escape_string($cte->getId(), $conexao);  
	  	$cotacao 				= mysql_real_escape_string($cte->getCotacao(), $conexao); 
	  	$manifesto 				= mysql_real_escape_string($cte->getManifesto(), $conexao);
	  	$faturamento 			= mysql_real_escape_string($cte->getFaturamento(), $conexao);
	  	$usuario 				= mysql_real_escape_string($cte->getUsuario(), $conexao); 
	  	$veiculo      			= mysql_real_escape_string($cte->getVeiculo(), $conexao);                
	  	$emissao 				= mysql_real_escape_string($cte->getEmissao(), $conexao);   
	  	$status 				= mysql_real_escape_string($cte->getStatus(), $conexao); 
	  	$dataEntrega 			= mysql_real_escape_string($cte->getDataEntrega(), $conexao); 
	  	$horaEntrega 			= mysql_real_escape_string($cte->getHoraEntrega(), $conexao);      
	 
	  	$sql = "update cte set id=$id, idContacao=$contacao, idManifesto=$manifesto, idFaturamento=faturamento,
	  		 		idUsuario=$usuario, idVeiculo=$veiculo, emissao='$emissao', status='$status', 
	  		 			dataEntrega='$dataEntrega', horaEntrega='$HoraEntrega' where id=$id";
      
      	$resultado = @mysql_query($sql, $conexao);

      	return ($resultado === true);
    }

    public static function deletar(Cte $cte) {
     
      	$conexao = Conexao::getInstance()->getConexao();     
	  
	  	$id = mysql_real_escape_string($cte->getId(), $conexao);

	  	$sql = "delete from cte where id=$id";
      
      	$resultado = @mysql_query($sql, $conexao);

      	return ($resultado === true);
    }

    public static function carregarLista() {

		$conexao = Conexao::getInstance()->getConexao();

		$rs = mysql_query('select * from cte');

		$result = array();
			
		while($row = mysql_fetch_array($rs)) {

			$objCte = new Cte();
			$objCte->setId($row['id']);
			$objCte->setCotacao($row['idContacao']);
			$objCte->setManifesto($row['idManifesto']);
			$objCte->setFaturamento($row['idFaturamento']);
			$objCte->setRemetente($row['idRemetente']);
			$objCte->setDestinatario($row['idDestinatario']);
			$objCte->setEmissao($row['emissao']);
			$objCte->setStatus($row['status']);
			$objCte->setDataEntrega($row['dataEntrega']);
			$objCte->setHoraEntrega($row['HoraEntrega']);
			$result[] = $objCte;
		}

		return $result;
	}
	
	}

?>
