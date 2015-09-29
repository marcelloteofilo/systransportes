<?php
  require_once("/../banco.php");  
  require_once("cte.php");  

 class CteSql {  
  
     public static function adicionar(Cte $cte) {
      
      	$conexao = Conexao::getInstance()->getConexao();    	  
	  
	 	$id 					= mysql_real_escape_string($cte->getId(), $conexao);  
	  	$cotacao 				= mysql_real_escape_string($cte->getCotacao(), $conexao); 
	  	$manifesto 				= mysql_real_escape_string($cte->getManifesto(), $conexao);
	  	$faturamento 			= mysql_real_escape_string($cte->getFaturamento(), $conexao);
	  	$remetente 				= mysql_real_escape_string($cte->getRemetente(), $conexao); 
	  	$destinatario 			= mysql_real_escape_string($cte->getDestinatario(), $conexao);                
	  	$emissao 				= mysql_real_escape_string($cte->getEmissao(), $conexao);   
	  	$status 				= mysql_real_escape_string($cte->getStatus(), $conexao); 
	  	$dataEntrega 			= mysql_real_escape_string($cte->getDataEntrega(), $conexao); 
	  	$horaEntrega 			= mysql_real_escape_string($cte->getHoraEntrega(), $conexao);    
  
	  	$sql = "insert into cte (id ,idCotacao, idManifesto, idFaturamento, idRemetente, idDestinatario, 
	  				emissao, status, dataEntrega, HoraEntrega) values ($id, $cotacao, $manifesto, $faturamento,
	  					$remetente, $destinatario, '$emissao', '$status', '$dataEntrega','$horaEntrega')";	  

      	$resultado = @mysql_query($sql, $conexao);

      	return ($resultado === true);
    }

     public static function alterar(Cte $cte) {

      	$conexao = Conexao::getInstance()->getConexao();     
	  
	  	$id 					= mysql_real_escape_string($cte->getId(), $conexao);  
	  	$cotacao 				= mysql_real_escape_string($cte->getCotacao(), $conexao); 
	  	$manifesto 				= mysql_real_escape_string($cte->getManifesto(), $conexao);
	  	$faturamento 			= mysql_real_escape_string($cte->getFaturamento(), $conexao);
	  	$remetente 				= mysql_real_escape_string($cte->getRemetente(), $conexao); 
	  	$destinatario 			= mysql_real_escape_string($cte->getDestinatario(), $conexao);                
	  	$emissao 				= mysql_real_escape_string($cte->getEmissao(), $conexao);   
	  	$status 				= mysql_real_escape_string($cte->getStatus(), $conexao); 
	  	$dataEntrega 			= mysql_real_escape_string($cte->getDataEntrega(), $conexao); 
	  	$horaEntrega 			= mysql_real_escape_string($cte->getHoraEntrega(), $conexao);      
	 
	  	$sql = "update cte set id=$id, idContacao=$contacao, idManifesto=$manifesto, idFaturamento=faturamento,
	  		 		idRemetente=$remetente, idDestinatario=$destinatario, emissao='$emissao', status='$status', 
	  		 			dataEntrega='$dataEntrega', horaEntrega='$horaEntrega' where id=$id";
      
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
		while($row = mysql_fetch_object($rs)){
			array_push($result, $row);
		}
		echo json_encode($result);
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
			$objCte->setHoraEntrega($row['horaEntrega']);
			$result[] = $objCte;
		}

		return $result;
	}
	
	}
  
  }

?>
