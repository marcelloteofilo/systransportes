<?php
  require_once("/../banco.php");  
  require_once("cte.php");  

 class CteSql { 


 	public static function carregarLista() {

 		$conexao = Conexao::getInstance()->getConexao();

 		$rs = mysql_query('select ct.*,
						   fretes.codTransp as numTransp,
						   cidadeOrigem.descricao as cidadeOrigem,
						   cidadeDestino.descricao as cidadeDestino,
						   usuario.nomeCompleto as nomeCompleto,
						   usuario.razaoSocial as razaoSocial,
						   usuario.telefone1 as telefone,
						   usuario.email as email
						   from ctes as ct
						   INNER JOIN frete as fretes ON ct.codFrete = fretes.codFrete
						   
						   INNER JOIN cargas as carga ON ct.codCarga = carga.codCarga
						   INNER JOIN cidades as cidadeOrigem ON carga.origem = cidadeOrigem.codigo
						   INNER JOIN cidades as cidadeDestino ON carga.destino = cidadeDestino.codigo
						   INNER JOIN usuarios as usuario ON carga.codUsuario = usuario.id');

		$result = array();

		while($row = mysql_fetch_array($rs)) {

			$objCte = new Cte();
			$objCte->setNumeroCte($row['numcte']);
			$objCte->setCodigoCarga($row['codCarga']);
			$objCte->setCodigoRota($row['codFrete']);
			$objCte->setSituacao($row['situacao']);
			$objCte->setChaveAcesso($row['chaveAcesso']);
			$objCte->setStatusCte($row['statuscte']);
			$objCte->setEmissao($row['emissao']);
			$objCte->setNumTransp($row['numTransp']);
			$objCte->setChaveCgm($row['chave_gcm']);

			$objCte->setOrigemCarga($row['cidadeOrigem']);
			$objCte->setDestinoCarga($row['cidadeDestino']);
			$objCte->setNomeCompleto($row['nomeCompleto']);
			$objCte->setRazaoSocial($row['razaoSocial']);
			$objCte->setTelefone($row['telefone']);
			$objCte->setEmail($row['email']);
			$result[] = $objCte;
		}

		return $result;
 	}


 	public static function alterar(Cte $cte) {

 		$conexao 				= Conexao::getInstance()->getConexao();

 		$numeroCte 				= mysql_real_escape_string($cte->getNumeroCte(), $conexao);  
 		$codigoCarga			= mysql_real_escape_string($cte->getCodigoCarga(), $conexao); 
 		$codigoRota				= mysql_real_escape_string($cte->getCodigoRota(), $conexao); 
 		$situacao				= mysql_real_escape_string($cte->getSituacao(), $conexao);
 		$chaveAcesso			= mysql_real_escape_string($cte->getChaveAcesso(), $conexao);
 		$statusCte				= mysql_real_escape_string($cte->getStatusCte(), $conexao);
 		$emissao				= mysql_real_escape_string($cte->getEmissao(), $conexao);
 		$chaveCgm 				= mysql_real_escape_string($cte->getChaveCgm(), $conexao);

 		$sql = "update ctes set codFrete=$codigoRota, situacao='$situacao', chaveAcesso='$chaveAcesso',
 					 	 statuscte='$statusCte', emissao='$emissao', chave_gcm='$chaveCgm' where numcte=$numeroCte";
	    $resultado = @mysql_query($sql, $conexao);

      	return ($resultado === true);
 	}



 	

 }

?> 